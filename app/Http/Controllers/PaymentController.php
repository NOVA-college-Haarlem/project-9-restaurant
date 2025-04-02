<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        
    return view('payment.index'); // Zorg ervoor dat deze view bestaat

    }


    public function showPaymentPage()
    {
        return view('payment.index');  
    }

    public function processPayment(Request $request)
    {
        $amount = $request->amount;
        $paymentMethod = $request->payment_method;

        return redirect()->route('payment.page')->with('success', 'Betaling van €' . $amount . ' via ' . $paymentMethod . ' is succesvol!');
    }

    public function splitBill(Request $request)
    {
        $totalAmount = $request->total_amount;
        $splitBill = $request->split_bill;

        $amountPerPerson = $totalAmount / $splitBill;

        return redirect()->route('payment.page')->with('success', 'De rekening is gesplitst! Elk persoon moet het volgende betalen: € ' . number_format($amountPerPerson, 2));
    }

    public function addTip(Request $request)
    {
        $amount = $request->amount;
        $tip = $request->tip;

        $totalAmount = $amount + $tip;

        return redirect()->route('payment.page')->with('success', 'Betaling van €' . number_format($totalAmount, 2) . ' inclusief een fooi van €' . number_format($tip, 2) . ' is succesvol!');
    }
}
