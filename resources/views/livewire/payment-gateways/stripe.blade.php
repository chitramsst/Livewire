<div>
    <!-- https://dashboard.stripe.com/login
chitra.msst.office@gmail.com
Tanishka@12345#

publishable key: pk_test_51NThAcSEMAXsEqdSE8BfHTtUoBzEH0cHOfDk9zsfElRgbtHfRg3jrPxAsewbDYf996UkMaiPFgYMaQpfoQKt5cqY00tYjC1aN8
secret key: sk_test_51NThAcSEMAXsEqdS1m8Av7JZVyDLgoYiaOskSeiOQeccmAjFR0HSFUGjIpuanVQLR4pTU0KvpcQO0ZNZgwqiW1ry00EwyEW8Vt 
https://stripe.com/docs/payments/without-card-authentication

https://stripe.com/docs/payments/accept-a-payment-synchronously
-->

    <div class="mx-64 pt-20">
        <form class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51NThAcSEMAXsEqdSE8BfHTtUoBzEH0cHOfDk9zsfElRgbtHfRg3jrPxAsewbDYf996UkMaiPFgYMaQpfoQKt5cqY00tYjC1aN8" id="payment-form">
            <div class="mb-6">
                <label for="cardname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Name on Card</label>
                <input autocomplete="off" type="text" id="cardname" maxlength="19" class="card-name shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="w-full flex flex-row justify-between space-x-4 mb-6">
                <div class="w-4/6">
                    <label for="cardnumber" maxlenght="16" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Card Number</label>
                    <input type="text" id="cardnumber" maxlength="19" class="card-number number shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
                <div class="w-2/6">
                    <label for="card-cvc" class="card-cvc block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">CVV</label>
                    <input type="text" id="card-cvc" placeholder='ex. 311' maxlength='4' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
            </div>
            <div class="w-full flex flex-row justify-between space-x-4 mb-6">
                <div class="w-1/2">
                    <label for="card-expiry-month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Card Expiry Month</label>
                    <input type="text" maxlength="2" id="card-expiry-month" class="card-expiry-month shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
                <div class="w-1/2">
                    <label for="card-expiry-year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Card Expiry Year</label>
                    <input type="text" maxlength="4" id="card-expiry-year" class="card-expiry-year shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
            </div>
            <button wire:click.prevent="$emit('setToken')" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pay Now</button>
        </form>
    </div>
</div>

<script src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


@push('js')
<script>
    Livewire.on('setToken', () => {
        
        Stripe.setPublishableKey("pk_test_51NThAcSEMAXsEqdSE8BfHTtUoBzEH0cHOfDk9zsfElRgbtHfRg3jrPxAsewbDYf996UkMaiPFgYMaQpfoQKt5cqY00tYjC1aN8");
        Stripe.card.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val(),
           // address_zip: $('.address_zip').val(),
        }, stripeResponseHandler);

       

        function stripeResponseHandler(status, response) {
            alert(JSON.stringify(response));
            'use strict';
            if (response.error) {
                /* if the response has error */
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* if the response has success */
                var token = response['id'];
                @this.set('token', token);
                alert(token)
                @this.check();
            }
        }
    });
</script>

<script type="text/javascript">
    /* enable spacing for credit card number     */
    $('#cardnumber').on('keyup', function(e) {
        var val = $(this).val();
        var newval = '';
        val = val.replace(/\s/g, '');
        for (var i = 0; i < val.length; i++) {
            if (i % 4 == 0 && i > 0) newval = newval.concat(' ');
            newval = newval.concat(val[i]);
        }
        $(this).val(newval);
    });
</script>
@endpush

</html>