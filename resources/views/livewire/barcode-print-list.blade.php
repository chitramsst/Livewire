<div>
<button wire:click="generateBarcodes">Generate Barcodes</button>

@foreach($barcodeList as $barcode)
    <div>
        <span>{{ $barcode['id'] }}</span>
        <img src="{{ asset('uploads/barcodes/' . basename($barcode['imagePath'])) }}" alt="Barcode">
    </div>
@endforeach
</div>
