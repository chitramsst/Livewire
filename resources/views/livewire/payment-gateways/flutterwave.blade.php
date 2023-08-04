<div>
    <!-- https://codebrisk.com/blog/implement-flutterwave-rave-payment-gateway-with-laravel-8 -->
    <!-- https://laravelrave.netlify.app/getting-started/installation.html#prerequisite -->

    <!-- public key  FLWPUBK_TEST-8768b19c69023f35db2bb0b46ba25479-X
secret key  FLWSECK_TEST-38055b828de8e4635ed0cd35c799cc02-X
encryption key    FLWSECK_TESTc8533144dc9c
https://dev.to/ejiro/integrating-flutterwaves-secure-payment-gateway-into-your-website-using-php-4187
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