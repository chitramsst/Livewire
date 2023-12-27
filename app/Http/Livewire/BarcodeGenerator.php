<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Milon\Barcode\DNS1D;


class BarcodeGenerator extends Component
{
    public $barcodeData;
    public $barcodeData1;
    public function render()
    {
        return view('livewire.barcode-generator');
    }
    public function generateBarcode()
    {
        // Generate barcode and save to a file or use it as needed
        $barcode = new DNS1D();
        $barcode->setStorPath(storage_path('app/public/barcodes'));

        $barcode->getBarcodePNGPath($this->barcodeData, 'C128');

        if ($barcode) {
            /* if request has image */
            if (!file_exists('uploads/barcodes')) {
                mkdir('uploads/barcodes', 0777, true);
            }
            
            $barcode->setStorPath(public_path('uploads/barcodes/'));

            $barcode->getBarcodePNGPath($this->barcodeData, 'C128',0.2,33,array(255,255,0));
        }
        $this->barcodeData1 = "barcodestest";
    }
}
