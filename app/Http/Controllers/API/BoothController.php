<?php

namespace App\Http\Controllers\API;

use App\Cache\CacheRepository;
use App\Enum\BookingConfirmationStatus;
use App\Enum\BookingStatus;
use App\Enum\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * This class is responsible for handling booth actions
 * @author Freddy Genicho
 * @since v1.o
 */
class BoothController extends Controller
{
    const GREEN_BOOTHS = [
        "row1", "row2", "row3", "row4", "row5"
    ];

    const COLOR_PENDING = "#0A7873";
    const COLOR_RESERVED = "#797979";
    const COLOR_BOOKED = "#E9B911";
    const COLOR_AVAILABLE = "#0A7873";
    const COLOR_AVAILABLE_GREEN = "#F3F3F3";

    /**
     * Retrieves a list of all available booths
     * @return JsonResponse
     * @throws Exception
     * @author Freddy Genicho
     */
    public function index(): JsonResponse
    {
        $summit = get_current_summit();

        $summitId = $summit->id;

        $booths = Booth::query()
            ->leftJoin('bookings', function ($join) use ($summitId) {
                $join->on('booths.id', '=', 'bookings.booth_id')
                    ->where('bookings.summit_id', '=', $summitId)
                    ->whereIn('bookings.payment_status', [
                        PaymentStatus::SETTLED->value,
                        PaymentStatus::PENDING->value
                    ]);
            })
            ->leftJoin('users', function ($join) {
                $join->on('users.id', '=', 'bookings.user_id');
            })
            ->select(['booths.*',
                'bookings.id AS booking_id',
                'bookings.booking_status AS booking_status',
                'bookings.created_at AS booked_on',
                'users.institution'
            ])
            ->get()
            ->map(function (Booth $booth) {

                $bookingStatus = $booth->booking_status;

                //check if booth is available in cache
                if (is_null($bookingStatus)) {
                    $bookingStatus = CacheRepository::cache()->cacheHasKey("reserved_booths$booth->id")
                        ? BookingStatus::RESERVED
                        : BookingStatus::AVAILABLE;

                } elseif ($bookingStatus == BookingStatus::PENDING->value) {
                    $bookingStatus = BookingStatus::RESERVED;
                }

                if (is_string($bookingStatus)) {
                    $bookingStatus = BookingStatus::from($bookingStatus);
                }

                $bookedBy = null;
                $bookedOn = null;

                if ($bookingStatus == BookingStatus::RESERVED or $bookingStatus == BookingStatus::BOOKED) {
                    $bookedBy = $booth->institution;
                    if (!empty($booth->booked_on)) {
                        $bookedOn = format_date($booth->booked_on);
                    }
                }

                $extra = $this->getExtraColor($bookingStatus, $booth->row_name, $bookedBy, $bookedOn);

                return [
                    "id" => $booth->id,
                    "label" => $booth->label,
                    "kes_price" => (float)$booth->kes_price,
                    "usd_price" => (float)$booth->usd_price,
                    "description" => $booth->description,
                    "booking_status" => $bookingStatus,
                    "uuid" => $booth->uuid,
                    "row_name" => $booth->row_name,
                    "room_no" => $booth->room_no,
                    "room_size" => $booth->room_size,
                    "room_size_per_sqm" => $booth->room_size_per_sqm,
                    "open_to_public" => $booth->open_to_public,
                    "category" => $booth->category,
                    "status" => $booth->status,
                    "meta" => $booth->meta,
                    "booking_id" => $booth->booking_id,
                    "booked_by" => $bookedBy,
                    "booked_on" => $bookedOn,
                    "is_booked" => $bookingStatus == BookingStatus::BOOKED,
                    ...$extra
                ];
            })
            ->groupBy("row_name");

        return new JsonResponse([
            "data" => $booths,
            "meta" => [
                "services" => get_payment_services("booth", ["id", "name", "type", "code", "currency"]),
                "color_codes" => [
                    [
                        "label" => "Available",
                        "color" => self::COLOR_AVAILABLE_GREEN
                    ],
                    [
                        "label" => "Available",
                        "color" => self::COLOR_AVAILABLE
                    ],
                    [
                        "label" => "Reserved",
                        "color" => self::COLOR_RESERVED
                    ],
                    [
                        "label" => "Booked",
                        "color" => self::COLOR_BOOKED
                    ]
                ]
            ]
        ]);
    }

    public function getExtraColor(
        BookingStatus $status,
        string        $row,
        ?string       $bookedBy = null,
        ?string       $bookedOn = null
    ): array
    {
        $isGreen = in_array($row, self::GREEN_BOOTHS);
        $title = "";

        switch ($status) {
            case BookingStatus::PENDING:
            case BookingStatus::EXPIRED:
                $color = self::COLOR_PENDING;
                break;

            case BookingStatus::RESERVED:
                $color = self::COLOR_RESERVED;
                $title = "Reserved by $bookedBy on $bookedOn";
                break;

            case BookingStatus::BOOKED:
                $color = self::COLOR_BOOKED;
                $title = "Booked by $bookedBy on $bookedOn";
                break;

            default:
                $color = $isGreen ? self::COLOR_AVAILABLE : self::COLOR_AVAILABLE_GREEN;
                break;
        }

        return [
            "color" => $color,
            "title" => $title,
            "disabled" => $status != BookingStatus::AVAILABLE
        ];
    }

    /**
     * Queries user booths
     * @param Request $request
     * @return JsonResponse
     */
    public function mine(Request $request): JsonResponse
    {
        $bookings = Booking::query()
            ->select([
                "id", "booth_id", "order_id", "booking_status", "payment_status",
                "confirmation_status", "notes", "created_at", "updated_at"
            ])
            ->with([
                "order:id,total_amount,reference,currency",
                "booth:id,label,room_no"
            ])
            ->when(request("summit_id"))
            ->where("summit_id", $request->summit_id)
            ->when(request("booking_status"))
            ->where("booking_status", $request->booking_status)
            ->when(request("payment_status"))
            ->where("payment_status", $request->payment_status)
            ->when(request("confirmation_status"))
            ->where("confirmation_status", $request->confirmation_status)
            ->where("user_id", Auth::id())
            ->orderByDesc("id")
            ->get();

        return new JsonResponse([
            "data" => $bookings,
            "meta" => [
                "filters" => [
                    "booking_status" => BookingStatus::cases(),
                    "payment_status" => PaymentStatus::cases(),
                    "confirmation_status" => BookingConfirmationStatus::cases(),
                ]
            ]
        ]);
    }

    /**
     * Manages the booth status
     *
     * @param $boothId
     * @param Request $request
     * @return JsonResponse|string
     */
    public function blockBooth($boothId, Request $request): JsonResponse|string
    {
        $cacheKey = "reserved_booths" . $boothId;

        if ($request->filled("action")) {
            $action = $request->action;
            if ($action == "unblock") {
                CacheRepository::cache()->forgetKey($cacheKey);

                return new JsonResponse([
                    "message" => "Booth no {$boothId} removed from your list"
                ]);
            }
        }

        CacheRepository::cache()->remember($cacheKey, 5, fn() => $boothId);
        return new JsonResponse([
            "message" => "Booth no {$boothId} added to your payment list"
        ]);
    }
}
