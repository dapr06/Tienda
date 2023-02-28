<x-base>
    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>
    <link rel='stylesheet' href='../../../public/css/estilos.css'>


    <h2>Listado de productos</h2>
    <table border="1">
        <tr>

            <th>Estado</th>

        </tr>

        @foreach ($pedidos as $pedido)
            <tr>

                <td><a href='{{ route('pedidos.show', $pedidos) }}'>{{ $pedido->estado }}</a></td>

                <td>
                    <form action='{{ route('productos.destroy', $producto) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit' ><img src="delete.png" width="35" height="35"></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('lineaPedido.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $producto->id }}">
                        <input type="hidden" name="cant" value="1">
                        <button type="submit"><img src="addCarrito.jpg" width="35" height="35"></button>
                    </form>
                </td>


            </tr>

        @endforeach

    </table><br><br>

    <button><a href='{{ route('productos.create') }}'>Crear</a></button><br><br>

    <a href='{{ route('proveedores.index') }}'>Listado de proveedores.</a>

</x-base>
