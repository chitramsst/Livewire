<?php

namespace App\Http\Livewire\PaymentGateways;

use Livewire\Component;
use Stripe as StripeComponent;

class Stripe extends Component
{
  public $token;
  public function render()
  {
    $this->emit('test');
    return view('livewire.payment-gateways.stripe');
  }

  public function check(){
    \Stripe\Stripe::setApiKey('sk_test_51NThAcSEMAXsEqdS1m8Av7JZVyDLgoYiaOskSeiOQeccmAjFR0HSFUGjIpuanVQLR4pTU0KvpcQO0ZNZgwqiW1ry00EwyEW8Vt');
    try {
        // Create the PaymentIntent
      $intent = \Stripe\PaymentIntent::create([
        'amount' => 90000,
        'currency' => 'INR',
        'payment_method_types' => [ 
          'card' 
      ] ,
        // 'confirmation_method' => 'manual',
        // 'confirm' => true,
        // A PaymentIntent can be confirmed some time after creation,
        // but here we want to confirm (collect payment) immediately.
       // 'confirm' => true,
  
        // If the payment requires any follow-up actions from the
        // customer, like two-factor authentication, Stripe will error
        // and you will need to prompt them for a new payment method.
      //  'error_on_requires_action' => true,
      ]);
      $this->generateResponse($intent);
    } catch (\Stripe\Exception\ApiErrorException $e) {
      // Display error on client
      echo json_encode(['error' => $e->getMessage()]);
    }
  }


  // public function generateResponse($intent) {
  //   dd($intent);
  //   if ($intent->status == 'succeeded') {
  //     dd("success");
  //     // Handle post-payment fulfillment
  //     echo json_encode(['success' => true]);
  //   } else {
  //     dd("not success");
  //     // Any other status would be unexpected, so error
  //     echo json_encode(['error' => 'Invalid PaymentIntent status']);
  //   }
  // }


  function generateResponse($intent) {
    dd($intent->status);
    # Note that if your API version is before 2019-02-11, 'requires_action'
    # appears as 'requires_source_action'.
    if ($intent->status == 'requires_action' &&
        $intent->next_action->type == 'use_stripe_sdk') {
      # Tell the client to handle the action
      echo json_encode([
        'requires_action' => true,
        'payment_intent_client_secret' => $intent->client_secret
      ]);
    } else if ($intent->status == 'succeeded') {
      # The payment didn’t need any additional actions and completed!
      # Handle post-payment fulfillment
      echo json_encode([
        "success" => true
      ]);
    } else {
      # Invalid status
      http_response_code(500);
      echo json_encode(['error' => 'Invalid PaymentIntent status']);
    }
  }

  /* stripe payment section (after transaction) */
  public function stripePost()
  {

    $stripe = new \Stripe\StripeClient('sk_test_51NThAcSEMAXsEqdS1m8Av7JZVyDLgoYiaOskSeiOQeccmAjFR0HSFUGjIpuanVQLR4pTU0KvpcQO0ZNZgwqiW1ry00EwyEW8Vt');

    $status = $stripe->paymentIntents->create([
      'amount' => 90000,
      'currency' => 'INR',
      'payment_method' => 'pm_card_visa',
    ]);

    dd($status);
    //$this->emit('success',$status);
    
    //return redirect('/success');


    // $settings = new MasterSetting();
    // $site = $settings->siteData();
    $site_currency_code = 'INR';
    //  $id = $request->id;
    //  $email = $request->email;
    //  $settings=new MasterSetting();
    //  $site=$settings->siteData();
    // $stripe = new \StripeComponent\StripeClient('sk_test_51NThAcSEMAXsEqdS1m8Av7JZVyDLgoYiaOskSeiOQeccmAjFR0HSFUGjIpuanVQLR4pTU0KvpcQO0ZNZgwqiW1ry00EwyEW8Vt');


    // StripeComponent\Stripe::setApiKey("sk_test_51NThAcSEMAXsEqdS1m8Av7JZVyDLgoYiaOskSeiOQeccmAjFR0HSFUGjIpuanVQLR4pTU0KvpcQO0ZNZgwqiW1ry00EwyEW8Vt");

    // // try {
    //       $charge =   StripeComponent\Charge::create ([
    //         "amount" => 50000,
    //         "currency" => "USD",
    //         //"source" => $this->token,
    //         "source" => "tok_mastercard",
    //         "description" => "customer payment"

    //     ]);
    //  $customer = (Session::has('customer')) ? Session::get('customer') : "";

    // if ($charge->status == "succeeded") {
      /* if the payment is success */
      $amount = 50000;
      /* stripe payment hist ory updation */
      //   $payment_history = new CustomerPaymentHistory();
      //   $payment_history->invoice_number=generate_customerinvoicenumber();
      //   $payment_history->invoice_id=$request->id;
      //   $payment_history->payment_id=$charge->id;
      //   $payment_history->email=$request->email;
      //   $payment_history->date=\Carbon\Carbon::today()->toDateString();
      //   $payment_history->amount_paid= $request->amount;
      //   $payment_history->invoice_amount= $request->amount;
      //   $payment_history->payment_status=$charge->status;
      //   $payment_history->save();
      /*get customer details */
      //    $invoice = Invoice::find($request->id);
      //   /*payment updation*/
      //   $payment = new Payment();
      //   $payment->customer_id =$invoice->customer_id;
      //   $payment->paid_date = \Carbon\Carbon::today()->toDateString();
      //   $payment->paid =  $request->amount;
      //   $payment->payment_mode = 'stripe';
      //   $payment->invoice_number =  $invoice->invoice_number;
      //   $payment->payment_number = generate_paymentnumber();
      //   $payment->note = "Payment done by customer";
      //   $payment->save();

      /* update payment amount to invoice table */
      //  $invoice->invoice_status = ($invoice->total - ($invoice->paid + $request->amount) == 0) ? '1' : '0';
      //  $invoice->paid = $invoice->paid + $request->amount;
      //  $invoice->save();
      //  if(!empty($customer)) {
      //    return redirect('/customer/invoices')->with('message', 'Payment Sent Successfully.');
      //  } else {
      //    return view('transaction-success');
      //  }
      // } else
      // {
      //   /* if transaction is not successful */
      //   if(!empty($customer)) {
      //     return redirect('/customer/invoices')->with('error', 'Something went wrong. Please contact support team.');
      //   } else {
      //     return view('transaction-failure');
      //   }
      // }
    }

    // } catch ( \Exception $e ) {
    //     dd($e);
    //       /* if transaction has any issues */
    //     //   if(!empty($customer)) {
    //     //           return redirect('/customer/invoices')->with('error', 'Something went wrong. Please contact support team.');
    //     //   } else {
    //     //           return view('transaction-failure');
    //     //   }
    //  }

  // }
}
