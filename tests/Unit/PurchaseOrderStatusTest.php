<?php

namespace Tests\Unit;

use App\Enum\PurchaseOrderStatus;
use PHPUnit\Framework\TestCase;

class PurchaseOrderStatusTest extends TestCase
{
    public function test_paid_orders_are_treated_as_paid(): void
    {
        $this->assertTrue(PurchaseOrderStatus::isPaid(PurchaseOrderStatus::PAID));
        $this->assertFalse(PurchaseOrderStatus::isPaid(PurchaseOrderStatus::NEW));
    }
}
