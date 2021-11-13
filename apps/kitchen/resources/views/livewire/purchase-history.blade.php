<div wire:poll.1s="update" wire:init="update">
    <h4>Historial de Compras</h4>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ingrediente</th>
                <th>Cantidad comprada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td> {{ $purchase->id }}</td>
                    <td> {{ $purchase->ingredient->name }}</td>
                    <td>{{ $purchase->amount }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>

</div>
