<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class Ordercontroller extends Controller
{

    public function payment(Orders $order){


        return view('orders.payment', compact('order'));

    }
}
