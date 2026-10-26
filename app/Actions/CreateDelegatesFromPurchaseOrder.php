<?php

namespace App\Actions;

use App\Enum\PurchaseOrderStatus;
use App\Models\Category;
use App\Models\Delegate;
use App\Models\Event;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateDelegatesFromPurchaseOrder
{
    use AsAction;

    public function handle(PurchaseOrder $purchaseOrder): int
    {
        if (! PurchaseOrderStatus::isPaid($purchaseOrder->status)) {
            return 0;
        }

        $purchaseOrder->loadMissing('user');
        $tickets = is_array($purchaseOrder->tickets)
            ? $purchaseOrder->tickets
            : (json_decode($purchaseOrder->tickets, true) ?: []);
        $defaultEventId = Event::query()
            ->orderByDesc('start_date')
            ->orderByDesc('created_at')
            ->value('id');
        $created = 0;

        DB::transaction(function () use ($purchaseOrder, $tickets, $defaultEventId, &$created) {
            foreach ($tickets as $ticket) {
                if (! is_array($ticket)) {
                    continue;
                }

                $eventId = $ticket['event_id'] ?? $defaultEventId;
                $category = $this->categoryForTicket($ticket);
                $user = $purchaseOrder->user;
                $firstName = $user?->first_name;
                $lastName = $user?->last_name;
                $email = $user?->email;

                if (! $firstName || ! $lastName || ! $email || ! $eventId || ! $category) {
                    Log::warning('Skipping delegate creation for incomplete paid purchase ticket.', [
                        'purchase_order_id' => $purchaseOrder->id,
                        'has_name' => (bool) ($firstName && $lastName),
                        'has_email' => (bool) $email,
                        'has_event' => (bool) $eventId,
                        'has_category' => (bool) $category,
                    ]);
                    continue;
                }

                if (Delegate::query()
                    ->where('email', $email)
                    ->where('event_id', $eventId)
                    ->where('category_id', $category->id)
                    ->exists()) {
                    continue;
                }

                Delegate::create([
                    'salutation' => $user->salutation,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'mobile' => $user->mobile ?? $purchaseOrder->payment_phone,
                    'id_number' => $user->id_number,
                    'gender' => $user->gender,
                    'event_id' => $eventId,
                    'organization' => $user->organization,
                    'position' => $user->position,
                    'category_id' => $category->id,
                    'has_ticket_type' => true,
                    'ticket_type' => $ticket['type'] ?? $ticket['ticket_type'] ?? $category->title,
                    'country_id' => $user->country_id,
                    'county_id' => $user->county_id,
                ]);
                $created++;
            }
        });

        return $created;
    }

    private function categoryForTicket(array $ticket): ?Category
    {
        if (isset($ticket['category_id'])) {
            return Category::query()->find($ticket['category_id']);
        }

        $type = trim((string) ($ticket['type'] ?? $ticket['ticket_type'] ?? ''));
        $categoryTitle = match (strtolower($type)) {
            'group registration', 'virtual ticket', 'student ticket' => 'Individual Delegate',
            'exhibition booth' => 'Exhibitor',
            default => $type,
        };

        return $categoryTitle === ''
            ? null
            : Category::query()->where('title', $categoryTitle)->first();
    }
}
