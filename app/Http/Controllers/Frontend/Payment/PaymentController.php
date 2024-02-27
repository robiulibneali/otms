<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout()
    {
        if (auth()->check())
        {
            return 'logged in';
        } else {
            return 'You Need to LOG IN';
        }
    }
}
