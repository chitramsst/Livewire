<?php

namespace App\Http\Livewire\PaymentGateways;

use Livewire\Component;
use Razorpay\Api\Api;

class Razor extends Component
{
    public $total = 5000,$currencyCode="INR";
    public function render()
    {
        return view('livewire.payment-gateways.razor');
    }
    public function callRazorpay(){
        $this->emit('initiateRazorpay',$this->total,$this->currencyCode);
    }
    public function successRazorpay($payment_id){
        $razorpay_payment_id = $payment_id;
       // $api = new Api("","");

        $api = new Api("rzp_test_C41YfYlN97GRAH","3PYPQyIeO8YGSibmULJC4nnG");
        $payment = $api->payment->fetch($razorpay_payment_id);
        if(!empty($razorpay_payment_id)) {
            try {
                $response = $api->payment->fetch($razorpay_payment_id)->capture(array('amount' => $payment['amount']));
                dd($response);
            } catch (\Exception $e) {
                return $e->getMessage();
                // \Session::put('error', $e->getMessage());
                return redirect()->back();
            }
    }
}
}
