<?php

namespace App\Http\Livewire\Admin\Services;

use Livewire\Component;

class Services extends Component
{
    public  $options = [
      'Option 1', 'Option 2', 'Option 3'
    ];
    public $data=[];
    
    public function render()
    {
        return view('livewire.admin.services.services');
    }
    public function show(){
       dd(count($this->data));
    }
}
