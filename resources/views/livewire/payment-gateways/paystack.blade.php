<div>
    <!-- sk_test_197800143f6cb4c0067a9a71b2cb6cc494647b92
pk_test_d4f9824b28526f6981685c37fe817e37e29c764c
https://dashboard.paystack.com/#/get-started
chitra.xfortech@gmail.com
Test@12345#

https://paystack.com/docs/payments/accept-payments/
-->


    <!-- <div class="mx-64 pt-20">
        <form >
            <div class="mb-6">
        
            <div class="w-full flex flex-row justify-between space-x-4 mb-6">

            </div>
            <input type="hidden" name="user_email" value="chitra.xfortech@gmail.com"> 
            <input type="hidden" name="amount" value="10000"> 
            
            <button wire:click.prevent="pay"  class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pay Now</button>

        </form>
    </div> -->


    <form id="paymentForm" class="mx-64 pt-20">
        <div class="w-full flex flex-row justify-between space-x-4 mb-6">
            <div class="w-4/6">
                <label for="cardnumber" maxlenght="16" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Email Address</label>
                <input id="email-address" type="text"  maxlength="19" class="card-number number shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="w-2/6">
                <label for="card-cvc" class="card-cvc block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Amount</label>
                <input type="text" id="amount" placeholder='ex. 311' maxlength='4' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
        </div>

        <div class="form-submit">
            <!-- <button type="submit" onclick="payWithPaystack()"> Pay </button> -->
            <button type="submit" wire:click.prevent="$emit('payWithPaystack')"> Pay </button>
        </div>
    </form>

    <script src="https://js.paystack.co/v1/inline.js"></script>
</div>

@push('js')
<script>
    Livewire.on('payWithPaystack', () => {
        const paymentForm = document.getElementById('paymentForm');
    // paymentForm.addEventListener("submit", payWithPaystack, false);

    // function payWithPaystack(e) {
    //     e.preventDefault();

        let handler = PaystackPop.setup({
            key: 'pk_test_d4f9824b28526f6981685c37fe817e37e29c764c', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let message = 'Payment complete! Reference: ' + response.reference;
                alert(response);
                @this.call('processData',response);
            }
        });

        handler.openIframe();
    // }
    });
   
</script>
@endpush