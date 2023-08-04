<?php

namespace App\Http\Livewire\PaymentGateways;

use Exception;
use Livewire\Component;
use Auth;

class Flutterwave extends Component
{
    //protected $queryString = ['status'];
    public $amount;

    public function render()
    {
        return view('livewire.payment-gateways.flutterwave');
    }
    public function pay()
    {

        $this->amount = 11300;
        $first_name = "test";
        $last_name = "test";
        $email = "chitra.xfortech@gmail.com";
        $redirect_url = route('success');

        try {
            $request = [
                'tx_ref' => time(),
                'amount' => $this->amount,
                'currency' => 'NGN',
                // 'payment_options' => 'card,banktransfer',
                "public_key" => 'FLWPUBK_TEST-8768b19c69023f35db2bb0b46ba25479-X',
                'redirect_url' => $redirect_url, //replace with yours
                'customer' => [
                    'email' => $email,
                    'name' => $first_name . ' ' . $last_name,
                    'user_id' => '3333'
                ],
                'meta' => [
                    'price' => $this->amount
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
            if ($res->status == 'success') {
                $link = $res->data->link;
                return redirect($link);
                // header('Location: '.$link);
            } else {
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
        catch (Exception $e) {
            dd($e);
        }
    }

    public function success()
    {
        //status=successful&tx_ref=1691124886&transaction_id=4504446
        // http://127.0.0.1:8000/success?status=successful&tx_ref=1691125222&transaction_id=4504449
        $status = request()->status;
        $amount = 11300;
        $tx_ref = request()->tx_ref;
        //if payment is successful
        if ($status ==  'successful') {
            if (isset(request()->transaction_id)) {
                $transaction_id = request()->transaction_id;

                $query = array(
                    "SECKEY" => getenv('FLW_SECRET_KEY'),
                    "txref" => $tx_ref
                );


                $data_string = json_encode($query);

                $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                $response = curl_exec($ch);

                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $header = substr($response, 0, $header_size);
                $body = substr($response, $header_size);

                curl_close($ch);

                $response = json_decode($response, true);
                
                //if($response->status == )
                $paymentStatus = $response['data']['status'];
                $chargeResponsecode = $response['data']['chargecode'];
                $chargeAmount = $response['data']['amount'];
                $chargeCurrency = $response['data']['currency'];

                if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == 'NGN')) {
                    // transaction was successful...
                  // please check other things like whether you already gave value for this ref
                    // if the email matches the customer who owns the product etc
                    //Give Value and return to Success page
                    //   var_dump($resp);
                    //header('location: success.html');
                    // Auth::attempt(['email'=>'admin@admin.com','password'=>'123456']) {
                    //     dd("success")                         
                    // }
                    return redirect()->route('success-page');
                  } else {
                    //Dont Give Value and return to Failure page
                    // var_dump($resp);
                    dd("errror");
                  }


                //$flw = new \Flutter
                //dd(getenv('FLW_SECRET_KEY'));
                // $flw = new \Flutterwave\Flutterwave\Rave(getenv('FLW_SECRET_KEY')); // Set `PUBLIC_KEY` as an environment variable
                // $transactions = new \Flutterwave\Transactions();
                // $response = $transactions->verifyTransaction(['id' => $transaction_id]);
                // dd($response);

                // if (
                //     $response['data']['status'] === "successful"
                //     && $response['data']['amount'] === $amount
                //     // && $response['data']['currency'] === $expectedCurrency
                // ) {
                //     // Success! Confirm the customer's payment
                // } else {
                //     // Inform the customer their payment was unsuccessful
                // }
            }
        } elseif ($status ==  'cancelled') {
            dd("cancelled");
        } else {
            dd("something went wrong");
        }
    }
}
