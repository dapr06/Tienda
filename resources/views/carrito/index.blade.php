<div class="container">
    <h2>Detalle de linea de pedidos</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Pedido</th>
        </tr>


    @foreach ($linea_pedido as $linea)

        <tr>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->id }}</a></td>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->producto_id }}</a></td>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->cantidad }}</a></td>
            <td><a href='{{ route('lineas_pedidos.show', $linea) }}'>{{ $linea->pedido_id }}</a></td>
        </tr>

    @endforeach


    </table>
</div>
<br><br>
<div>
    <button><a href='{{ route('lineas_pedidos.create') }}'>Agregar producto</a></button>
    <a href='{{route('productos.index')}}'><button>Productos</button></a>
</div>




