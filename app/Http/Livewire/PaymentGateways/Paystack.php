<?php

namespace App\Http\Livewire\PaymentGateways;

use Paystack as PaystackComponent;
use Livewire\Component;

class Paystack extends Component
{
    public function render()
    {
        return view('livewire.payment-gateways.paystack');
    }

    public function processData($data){
       dd($data['status']);
    }
    public function pay()
    {
        try {
            //return PaystackComponent::getAuthorizationUrl()->redirectNow();
            $url = "https://api.paystack.co/transaction/initialize";

            $fields = [
                'email' => "customer@email.com",
                'amount' => "20000",
                'userid' => "test1234"
            ];

            $fields_string = http_build_query($fields);

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer sk_test_197800143f6cb4c0067a9a71b2cb6cc494647b92",
                "Cache-Control: no-cache",
            ));

            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);
            dd($result);
            // "{"status":true,"message":"Authorization URL created","data":{"authorization_url":"https://checkout.paystack.com/mlr4ng2eb20gwnd","access_code":"mlr4ng2eb20gwnd","reference":"3nsvds74jh"}}
        } catch (\Exception $e) {
            dd($e);
            // return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }
}
