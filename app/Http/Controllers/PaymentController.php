<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.details');
    }


    public function processPayment()
    {

        return redirect()->route('dashboard')->with('success', 'Payment processed successfully and Order is Successfull!');
    }

}

