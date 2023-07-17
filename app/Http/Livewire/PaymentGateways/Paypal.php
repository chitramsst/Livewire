<?php

namespace App\Http\Livewire\PaymentGateways;

use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class Paypal extends Component
{
    public function render()
    {
        return view('livewire.payment-gateways.paypal');
    }
    public function payment($amount){
                $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('admin.razor'),
                "cancel_url" => route('admin.stripe'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1000.00"
                    ]
                ]
            ]
        ]);
        dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            // return redirect()
            //     ->route('createTransaction')
            //     ->with('error', 'Something went wrong.');
        } else {
            // return redirect()
            //     ->route('createTransaction')
            //     ->with('error', $response['message'] ?? 'Something went wrong.');
        }

    }
}
