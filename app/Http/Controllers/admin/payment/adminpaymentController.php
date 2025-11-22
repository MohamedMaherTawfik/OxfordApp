<?php

namespace App\Http\Controllers\admin\payment;

use App\Http\Controllers\Controller;
use App\Models\visaenable;
use Illuminate\Http\Request;

class adminpaymentController extends Controller
{
    public function index()
    {
        $visa = visaenable::where('id', 1)->first();
        return view('admin.payment.index', compact('visa'));
    }

    public function edit()
    {
        $data = request()->except('_token');
        $vsa = visaenable::where('id', 1)->first();
        if ($data['type'] == 'visa') {
            $vsa->update(['visa_enable' => $data['status']]);
            return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully!');
        } else if ($data['type'] == 'cash') {
            $vsa->update(['cash_enable' => $data['status']]);
            return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully!');
        }
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully!');
    }
}