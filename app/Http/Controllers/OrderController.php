<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function request()
    {
        return view('orders.request');
    }

    public function sales()
    {
        return view('orders.sales');
    }

    public function sell()
    {
        return view('orders.sell');
    }

    public function salesHistory()
    {
        return view('history.sales');
    }

    public function purchasesHistory()
    {
        return view('history.purchases');
    }
}