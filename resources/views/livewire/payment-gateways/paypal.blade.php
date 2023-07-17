<div>
<!-- https://medium.com/geekculture/paypal-payment-gateway-integration-with-laravel-ebebc7ccf470
https://www.itsolutionstuff.com/post/laravel-58-paypal-integration-tutorialexample.html

chitra.msst.office@gmail.com
Tanishka@123#


https://developer.paypal.com/dashboard/applications/sandbox
create app
merchant laundry

client id 
AQx-J2n4CAnQGmojk9ikvvC2NyuBvlqsBQBUqXIelxh4RtidGxBCgNaEshOzhtfF_p8s6Bs9Id4k_N_G
secret 
EB_o9pPZy3vmbCOSCKrWDXeJLOc71IrDYLNj8CfRfY6WIQ6-Zt58MH0Ml71d9arKAH2cocsgaz_5BpEI


appname : laundry
client Id : 
AVjw_2I9ORDA0wLLXvRtjr3sVZmyv3rFd9PJH4gvnnoJb-DldnCytEiB5FK96HuKDXePdhQSdCIHn413

secret key
EN71xrHSK__AQry9tAb79DmzFPM2SZGDyjqnNxPbTf5dhIRsuYV3oz-tF2ii_i-e2WJV0xk0-j5RxWFf



php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"


sandbox account
business account
https://developer.paypal.com/tools/sandbox/accounts/
https://www.sandbox.paypal.com/in/home
 -->


 <div class="flex-center position-ref full-height">
  
  <div class="content">
    
      <a wire:click.prevent="payment('100')" class="btn btn-success">Pay $100 from Paypal</a>

  </div>
</div>
</div>
