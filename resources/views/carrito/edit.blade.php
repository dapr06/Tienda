<form action="{{ route('lineas_pedidos.update', $linea_pedido->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $linea_pedido->cantidad }}">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<a href='{{ route('lineas_pedidos.index') }}'>Volver al carriro</a>
