<div class="container">
    <h2>Carrito</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Pedido</th>
        </tr>

        <input type="hidden" name="total_cantidad" value="{{ $total_cantidad = 0 }}">

    @foreach ($linea_pedido as $linea)

        <tr>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->id }}</a></td>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->producto_id }}</a></td>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->cantidad }}</a></td>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->pedido_id }}</a></td>
        </tr>

            <input type="hidden" name="total_cantidad" value="{{ $total_cantidad += $linea->cantidad }}">

        @endforeach

    </table>
</div>
<br><br>
<div>
    <button><a href='{{ route('lineas_pedidos.create') }}'>Agregar producto</a></button>
    <a href='{{route('productos.index')}}'><button>Productos</button></a>

    <br><br>
    <label>Total productos: {{$total_cantidad}}</label>
    <br><br>
    <button><a href='{{ route('lineas_pedidos.index') }}'>Tramitar pedido</a></button>


</div>




