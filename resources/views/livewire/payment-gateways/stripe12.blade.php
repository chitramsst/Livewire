<div>
    <form id="payment-form">
        <div class="mx-64 flex flex-col pt-52" id="card-element"><!-- placeholder for Elements --></div>
        <button id="card-button">Submit Payment</button>
        <p id="payment-result"><!-- we'll pass the response from the server here --></p>
    </form>

    @push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            const stripe = Stripe('pk_test_51NThAcSEMAXsEqdSE8BfHTtUoBzEH0cHOfDk9zsfElRgbtHfRg3jrPxAsewbDYf996UkMaiPFgYMaQpfoQKt5cqY00tYjC1aN8');
            const elements = stripe.elements();
            const style = {
  base: {
    color: "#32325d",
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: "antialiased",
    fontSize: "16px",
    "::placeholder": {
      color: "#aab7c4"
    }
  },
  invalid: {
    color: "#fa755a",
    iconColor: "#fa755a"
  },
};
            const cardElement = elements.create('card', {style});
            cardElement.mount('#card-element');
        })
    </script>
    @endpush
</div>