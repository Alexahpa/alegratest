<div wire:poll.1s="update" wire:init="update">
    <h4>Pedidos en curso</h4>
    <ul>
        @foreach ($orders as $order)
            <li>Order ID: {{ $order->id }} - {{ $order->plate->name }}</li>
        @endforeach
    </ul>
</div>
