<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Milon\Barcode\DNS1D;

class BarcodePrintList extends Component
{
    public $barcodeList=[];
    public function render()
    {
        return view('livewire.barcode-print-list');
    }

    public function generateBarcodes()
    {
        // Your logic to fetch data and generate barcodes
        // For demonstration purposes, using an array of product IDs
        $productIds = [101, 102, 103];
        if (!file_exists('uploads/barcodes')) {
            mkdir('uploads/barcodes', 0777, true);
        }

        foreach ($productIds as $productId) {
            $barcode = new DNS1D();
          //  $barcode->setStorPath(storage_path('app/public/barcodes'));
            $barcode->setStorPath(public_path('uploads/barcodes/'));
//dd($productId);
            $barcodeList[] = [
                'id' => $productId,
               // 'imagePath' => $barcode->getBarcodePNGPath($productId, 'C128'),
                'imagePath' =>$barcode->getBarcodePNGPath((string) $productId, 'C128')
            ];
        }
        $this->barcodeList = $barcodeList;
    }
}
