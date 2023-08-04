<div>
    <!-- https://codebrisk.com/blog/implement-flutterwave-rave-payment-gateway-with-laravel-8 -->
    <!-- https://laravelrave.netlify.app/getting-started/installation.html#prerequisite -->

    <!-- public key  FLWPUBK_TEST-8768b19c69023f35db2bb0b46ba25479-X
secret key  FLWSECK_TEST-38055b828de8e4635ed0cd35c799cc02-X
encryption key    FLWSECK_TESTc8533144dc9c
https://dev.to/ejiro/integrating-flutterwaves-secure-payment-gateway-into-your-website-using-php-4187
https://codeflarelimited.com/blog/flutterwave-payment-integration-with-php/#:~:text=FlutterWave%20payment%20integration%20with%20PHP%20can%20be%20a%20tedious%20process,users%20to%20make%20online%20payments.

test card in flutter wave

Card Number: 5531 8866 5214 2950.
PIN: 3310.
CVV: 564.
Expiry Date: 09/32.
OTP: 12345.
-->

    <form id="paymentForm" class="mx-64 pt-20">

        <!-- <input type="hidden" name="public_key" value="FLWPUBK_TEST-8768b19c69023f35db2bb0b46ba25479-X" /> -->
        <input type="hidden" name="tx_ref" value="bitethtx-019203" />
        <input type="hidden" name="amount" value="3400" />
        <input type="hidden" name="currency" value="NGN" />
        <input type="hidden" name="meta[token]" value="54" />
        <input type="hidden" name="redirect_url" value="https://google.com" />

        <div class="form-submit">
            <!-- <button type="submit" onclick="payWithPaystack()"> Pay </button> -->
            <button  id="start-payment-button" wire:click.prevent="pay"> Pay </button>
        </div>
    </form>

</div>

@push('js')
<script>
Livewire.on('payment',()=>{
    const paymentForm = document.getElementById('paymentForm');
    window.url('https://checkout.flutterwave.com/v3/hosted/pay');
})
</script>
@endpush