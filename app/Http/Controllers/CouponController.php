<?php

namespace App\Http\Controllers;

use App\DataTables\CouponDataTable;

class CouponController extends Controller
{
    public function index(CouponDataTable $dataTable)
    {
        return  $dataTable->render('pages.apps.coupon-management.manage-coupon');
    }
}
