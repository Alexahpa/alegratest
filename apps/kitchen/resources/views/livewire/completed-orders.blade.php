<div wire:poll.1s="update" wire:init="update">
    <h4>Pedidos completados</h4>
    <ul>
        @foreach ($orders as $order)
            <li>Order ID: {{ $order->id }} - {{ $order->plate->name }}</li>
        @endforeach
    </ul>
</div>
