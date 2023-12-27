<div>
<label for="barcodeData">Enter Data:</label>
    <input type="text" wire:model="barcodeData" id="barcodeData" placeholder="Enter data">

    <button wire:click="generateBarcode">Generate Barcode</button>

    @if($barcodeData1)
        <img src="{{ asset('uploads/barcodes/test.png') }}" alt="Barcode">
    @endif
</div>
