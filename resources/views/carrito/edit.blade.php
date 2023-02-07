<form action="{{ route('lineaPedido.update', $lineaPedido->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $lineaPedido->cantidad }}">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<a href='{{ route('lineaPedido.index') }}'>Volver al carriro</a>ib
