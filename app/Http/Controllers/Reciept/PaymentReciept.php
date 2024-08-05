<?php

namespace App\Http\Controllers\Reciept;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentReciept extends Controller
{
    //
    public function index($payment)
    {
        $data = Payment::with('employee')->where("id", $payment)->first();
        // $pdf = PDF::loadView('reciept.recieptPdf',$getPayment);
        // return view('reciept.reciept', ['paymentData' => $data]);
        return PDF::loadView(view('reciept.reciept')->name(), ['paymentData' => $data])
            ->setPaper('a5', 'portrait')
            ->stream('receipt.pdf');
    }
}
