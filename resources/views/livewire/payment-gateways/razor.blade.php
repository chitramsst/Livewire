<div>
<!-- https://medium.com/@laraveltuts/laravel-9-integrate-razorpay-payment-gateway-491569c13a99
https://dashboard.razorpay.com/app/customers
https://razorpay.com/docs/payments/payment-gateway/web-integration/standard/test-integration/
https://razorpay.com/docs/payments/server-integration/php/payment-gateway/build-integration/
Tanishka@12345#
key_id,key_secret
rzp_test_C41YfYlN97GRAH,3PYPQyIeO8YGSibmULJC4nnG -->
<button id="rzp-button1" wire:click="callRazorpay">Pay</button>

@push('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    "use strict" 
window.livewire.on('initiateRazorpay', (total,currencyCode) => {
    alert(currencyCode);
var options = {
    "key": "rzp_test_C41YfYlN97GRAH", // Enter the Key ID generated from the Dashboard
    "amount": total, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": currencyCode,
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    //"order_id": "order_123", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
   // "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "handler": function (response){
        console.log(response);
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
        if(response.razorpay_payment_id) {
            @this.successRazorpay(response.razorpay_payment_id);
        } else {
            alert("error");
        }
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
// rzp1.on('payment.failed', function (response){
//         alert(response.error.code);
//         alert(response.error.description);
//         alert(response.error.source);
//         alert(response.error.step);
//         alert(response.error.reason);
//         alert(response.error.metadata.order_id);
//         alert(response.error.metadata.payment_id);
// });
// document.getElementById('rzp-button1').onclick = function(e){
//     rzp1.open();
//     e.preventDefault();
// }

    console.log("rghrhgrh")
    rzp1.open();
})
</script>
@endpush
</div>