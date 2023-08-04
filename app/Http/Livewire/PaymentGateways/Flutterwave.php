<?php

namespace App\Http\Livewire\PaymentGateways;

use Exception;
use Livewire\Component;

class Flutterwave extends Component
{
    public function render()
    {
        return view('livewire.payment-gateways.flutterwave');
    }
    public function pay(){

        $amount = 11300;
        $first_name = "test";
        $last_name = "test";
       $email = "chitra.xfortech.com";
       $redirect_url = route('success');

        try {
          $request = [
            'tx_ref' => time(),
            'amount' => $amount,
            'currency' => 'NGN',
            // 'payment_options' => 'card,banktransfer',
            "public_key" => 'FLWPUBK_TEST-8768b19c69023f35db2bb0b46ba25479-X',
            'redirect_url' => $redirect_url, //replace with yours
            'customer' => [
                'email' => $email,
                'name' => $first_name. ' '.$last_name
            ],
            'meta' => [
                'price' => $amount
            ],
            'customizations' => [
                'title' => 'Paying for a service', //Set your title
                'description' => 'Level'
            ]
        ];
        //* Call fluterwave endpoint
        $curl = curl_init();  
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments', //don't change this
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK_TEST-38055b828de8e4635ed0cd35c799cc02-X',
            'Content-Type: application/json'
        ),
        ));
    
        $response = curl_exec($curl);
    

        curl_close($curl);
        
        $res = json_decode($response);
        if($res->status == 'success')
        {
            $link = $res->data->link;
            return redirect($link);
            // header('Location: '.$link);
        }
        else
        {
            // echo 'We can not process your payment';
            dd($res);
        }
    } 


        // try{
        // $data = [
        //     "public_key" => 'FLWPUBK_TEST-8768b19c69023f35db2bb0b46ba25479-X',
        //     'payment_options' => 'card,banktransfer',
        //     'amount' => 500,
        //     'email' => 'test@gmail.com',
        //   //  'tx_ref' => $reference,
        //     'currency' => "NGN",
        //     'redirect_url' => route('test'),
        //     'customer' => [
        //         'email' => "test@gmail.com",
        //         "phone_number" => '123456',
        //         "name" => 'name'
        //     ],

        //     "customizations" => [
        //         "title" => 'Movie Ticket',
        //         "description" => "20th October"
        //     ]
        // ];
        // return redirect('https://checkout.flutterwave.com/v3/hosted/pay',$data);
    // } 
    catch(Exception $e) {
         dd($e);
    }
    }

    public function success(){
        dd("yes");
    }
}
