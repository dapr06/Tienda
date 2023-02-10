<x-base>
    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>
    <link rel='stylesheet' href='../../../public/css/estilos.css'>


    <h2>Listado de productos</h2>
    <table border="1">
        <tr>

            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <th>Eliminar</th>
            <th>Añadir al carrito</th>
        </tr>

        @foreach ($productos as $producto)
            <tr>

                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->nombre }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->marca }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->modelo }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->descripcion }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->precio }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->stock }}</a></td>
                <td><a href='{{ route('proveedores.show', $producto->proveedor) }}'>{{ $producto->proveedor->nombre }}</a></td>

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
