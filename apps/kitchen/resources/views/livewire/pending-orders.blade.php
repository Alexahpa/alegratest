<div wire:poll.1s="update">
    <h1>Pedidos en curso</h1>
    <ul>
        @foreach ($orders as $order)
            <li>Order ID: {{ $order->id }} - {{ $order->plate->name }}</li>
        @endforeach
    </ul>
</div>