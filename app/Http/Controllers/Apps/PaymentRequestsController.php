<?php

namespace App\Http\Controllers\Apps;

use App\Enum\Currency;
use App\Enum\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Pesaflow\PesaflowRequest;
use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $query = PesaflowRequest::query()
            ->select([
                'id',
                'invoice_number',
                'amount_expected',
                'status',
                'currency',
                'purchase_order_id',
                'created_at',
            ])
            ->with([
                'purchase_order:id,reference,tickets,user_id',
                'purchase_order.user:id,first_name,last_name,country_id',
                'purchase_order.user.country:id,name',
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
            [$type, $value] = explode('|', $filters['ticket_type'], 2);

            $query->whereHas('purchase_order', function (Builder $purchaseOrderQuery) use ($type, $value) {
                $ticketField = $type === 'category' ? 'category_id' : 'type';
                $purchaseOrderQuery->whereJsonContains('tickets', [$ticketField => $value]);
            });
        }

        $paymentRequests = $query->latest()->paginate(25)->withQueryString();
        $categories = Category::query()->pluck('title', 'id');
        $countries = Country::query()->orderBy('name')->get(['id', 'name']);

        return view('pages.apps.event-management.payment-requests', [
            'paymentRequests' => $paymentRequests,
            'ticketTypes' => $ticketTypes,
            'categories' => $categories,
            'countries' => $countries,
            'statuses' => PaymentStatus::cases(),
            'currencies' => Currency::cases(),
        ]);
    }

    /**
     * @return array<string, string>
     */
    private function ticketTypeOptions(): array
    {
        $categories = Category::query()->pluck('title', 'id');
        $options = [];

        foreach ($categories as $id => $title) {
            $options['category|' . $id] = $title;
        }

        PurchaseOrder::query()
            ->select(['id', 'tickets'])
            ->whereNotNull('tickets')
            ->chunkById(500, function ($orders) use (&$options, $categories) {
                foreach ($orders as $order) {
                    foreach ($order->tickets ?? [] as $ticket) {
                        if (!is_array($ticket)) {
                            continue;
                        }

                        if (!empty($ticket['category_id'])) {
                            $categoryId = (string) $ticket['category_id'];
                            $options['category|' . $categoryId] ??=
                                $categories->get($categoryId, 'Category ' . $categoryId);
                        } elseif (!empty($ticket['type'])) {
                            $ticketType = (string) $ticket['type'];
                            $options['type|' . $ticketType] = $ticketType;
                        }
                    }
                }
            });

        asort($options, SORT_NATURAL | SORT_FLAG_CASE);

        return $options;
    }
}
