<div wire:poll.1s="update">
    <h1>Stock del almacen</h1>
    <ul>
        @foreach ($storage as $item)
            <li>Ingrediente: {{ $item->ingredient->name }} : {{ $item->stock }}</li>
        @endforeach
    </ul>
</div>
