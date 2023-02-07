<div class="container">
    <form action="{{ route('lineaPedido.store') }}" method="post">
        @csrf
        <label for="product_id">producto:</label>
        <select name="product_id">
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
        <br>
        <label for="cant">Cantidad:</label>
        <input type="number" name="cant" value="1">
        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
    </form>
    <a href='{{ route('lineaPedido.index') }}'>Volver a linea de pedido</a>
</div>
