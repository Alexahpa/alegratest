<div wire:poll.1s="update">
    <h1>Historial de Compras</h1>
    <ul>
        @foreach ($purchases as $purchase)
            <li>Id Compra: {{ $purchase->id }} - {{ $purchase->ingredient->name }} | Cantidad :{{ $purchase->amount }}</li>
        @endforeach
    </ul>
</div>
