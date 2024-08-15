<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'can:access-delegate-endpoint']);
    }

    /**
     * Show the Exports page.
     */
    public function index()
    {
        return view('website.exports');
    }

    public function export(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:coupon,ticket',
            'range' => 'required',
        ]);

        return (new UsersExport($request->all()))->download(trim($request->range) . '.xlsx');
    }
}
