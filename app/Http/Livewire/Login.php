<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.login')->extends('layouts.login_layout')->section('content');
    }
    public function login(){
        return redirect('/dashboard');
    }
}
