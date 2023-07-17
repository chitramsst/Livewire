<?php

namespace App\Http\Livewire\PaymentGateways;

use Livewire\Component;

class Stripe extends Component
{
    public function render()
    {
        return view('livewire.payment-gateways.stripe');
    }
}
