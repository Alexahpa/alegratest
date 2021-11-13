<div wire:poll.1s="update">
    <h4>Stock del almacen</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Ingrediente</th>
                <th>Stock Disponible</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($storage as $item)
                <tr>
                    <td> {{ $item->ingredient->name }}</td>
                    <td>{{ $item->stock }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>


</div>
