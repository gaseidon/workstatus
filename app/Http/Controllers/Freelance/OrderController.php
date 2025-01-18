<?php

namespace App\Http\Controllers\Freelance;

use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function index(){
        return view('orders.orders');
    }
}
