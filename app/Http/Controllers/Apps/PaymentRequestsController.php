<?php

namespace App\Http\Controllers\Apps;

use App\Enum\Currency;
use App\Enum\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Pesaflow\PesaflowRequest;
use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentRequestsExport;

class PaymentRequestsController extends Controller
{
    public function index(Request $request)
    {
        $ticketTypes = $this->ticketTypeOptions();

        $filters = $request->validate([
            'status' => ['nullable', 'string', Rule::in(array_column(PaymentStatus::cases(), 'value'))],
            'ticket_type' => ['nullable', 'string', Rule::in(array_keys($ticketTypes))],
            'currency' => ['nullable', 'string', Rule::in(array_column(Currency::cases(), 'value'))],
            'country' => ['nullable', 'string', Rule::exists('countries', 'id')],
        ]);

        $query = $this->applyFilters(PesaflowRequest::query(), $filters, $ticketTypes);

        $paymentRequests = $query->latest()->paginate(25)->withQueryString();
        $categories = Category::query()->pluck('title', 'id');
        $countries = Country::query()
            ->whereIn('id', User::query()->select('country_id')->whereNotNull('country_id'))
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('pages.apps.event-management.payment-requests', [
            'paymentRequests' => $paymentRequests,
            'ticketTypes' => $ticketTypes,
            'categories' => $categories,
            'countries' => $countries,
            'statuses' => PaymentStatus::cases(),
            'currencies' => Currency::cases(),
        ]);
    }

    public function export(Request $request)
    {
        $ticketTypes = $this->ticketTypeOptions();
        $filters = $request->validate([
            'status' => ['nullable', 'string', Rule::in(array_column(PaymentStatus::cases(), 'value'))],
            'ticket_type' => ['nullable', 'string', Rule::in(array_keys($ticketTypes))],
            'currency' => ['nullable', 'string', Rule::in(array_column(Currency::cases(), 'value'))],
            'country' => ['nullable', 'string', Rule::exists('countries', 'id')],
        ]);

        return Excel::download(
            new PaymentRequestsExport($this->applyFilters(PesaflowRequest::query(), $filters, $ticketTypes)),
            'payment-requests-' . now()->format('Ymd-His') . '.xlsx'
        );
    }

    private function applyFilters(Builder $query, array $filters, array $ticketTypes): Builder
    {
        $query->select([
            'id',
            'invoice_number',
            'amount_expected',
            'status',
            'currency',
            'purchase_order_id',
            'created_at',
        ]);

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['currency'])) {
            $query->where('currency', $filters['currency']);
        }

        if (!empty($filters['country'])) {
            $query->whereHas('purchase_order.user', function (Builder $userQuery) use ($filters) {
                $userQuery->where('country_id', $filters['country']);
            });
        }

        if (!empty($filters['ticket_type'])) {
            $ticketType = $ticketTypes[$filters['ticket_type']];

            $query->whereHas('purchase_order', function (Builder $purchaseOrderQuery) use ($ticketType) {
                $purchaseOrderQuery->where(function (Builder $ticketsQuery) use ($ticketType) {
                    foreach ($ticketType['category_ids'] as $categoryId) {
                        $ticketsQuery
                            ->orWhereJsonContains('tickets', ['category_id' => $categoryId])
                            ->orWhereJsonContains('tickets', ['category_id' => (int) $categoryId]);
                    }

                    foreach ($ticketType['types'] as $type) {
                        $ticketsQuery->orWhereJsonContains('tickets', ['type' => $type]);
                    }
                });
            });
        }

        return $query->with([
            'purchase_order:id,reference,tickets,user_id',
            'purchase_order.user:id,first_name,last_name,country_id',
            'purchase_order.user.country:id,name',
        ]);
    }

    /**
     * @return array<string, array{label: string, category_ids: array<int, string>, types: array<int, string>}>
     */
    private function ticketTypeOptions(): array
    {
        $categories = Category::query()->pluck('title', 'id');
        $options = [];

        PurchaseOrder::query()
            ->select(['id', 'tickets'])
            ->whereNotNull('tickets')
            ->whereHas('pesaflow_request')
            ->chunkById(500, function ($orders) use (&$options, $categories) {
                foreach ($orders as $order) {
                    foreach ($order->tickets ?? [] as $ticket) {
                        if (!is_array($ticket)) {
                            continue;
                        }

                        if (!empty($ticket['category_id'])) {
                            $categoryId = (string) $ticket['category_id'];
                            $label = (string) $categories->get($categoryId, 'Category ' . $categoryId);
                            $key = base64_encode(Str::lower(trim($label)));
                            $options[$key] ??= ['label' => $label, 'category_ids' => [], 'types' => []];
                            $options[$key]['category_ids'][$categoryId] = $categoryId;
                        } elseif (!empty($ticket['type'])) {
                            $label = trim((string) $ticket['type']);
                            $key = base64_encode(Str::lower($label));
                            $options[$key] ??= ['label' => $label, 'category_ids' => [], 'types' => []];
                            $options[$key]['types'][$label] = $label;
                        }
                    }
                }
            });

        foreach ($options as &$option) {
            $option['category_ids'] = array_values($option['category_ids']);
            $option['types'] = array_values($option['types']);
        }
        unset($option);

        uasort($options, fn (array $a, array $b) => strnatcasecmp($a['label'], $b['label']));

        return $options;
    }
}
