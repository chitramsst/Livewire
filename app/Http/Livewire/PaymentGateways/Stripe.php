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
    $stripe = new \Stripe\StripeClient('sk_test_51NThAcSEMAXsEqdS1m8Av7JZVyDLgoYiaOskSeiOQeccmAjFR0HSFUGjIpuanVQLR4pTU0KvpcQO0ZNZgwqiW1ry00EwyEW8Vt');

    $test = $stripe->paymentLinks->create([
      'line_items' => [
        [
          'price' => '300',
          'quantity' => 1,
        ],
      ],
    ]);
  dd($test);

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
