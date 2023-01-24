<x-base>
    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>
    <link rel='stylesheet' href='resources/css/estilos.css'>


    <h2>Listado de productos</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <th>Eliminar</th>
        </tr>

        @foreach ($productos as $producto)
            <tr>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->id }}</a></td>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->nombre }}</a></td>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->marca }}</a></td>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->modelo }}</a></td>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->descripcion }}</a></td>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->precio }}</a></td>
                <td><a href='{{ route('producto.show', $producto) }}'>{{ $producto->stock }}</a></td>
                <td><a href='{{ route('proveedor.show', $producto->proveedor) }}'>{{ $producto->proveedor->nombre }}</a></td>

                <td>
                    <form action='{{ route('producto.destroy', $producto) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit' >(X)</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table><br><br>

    <button><a href='{{ route('producto.create') }}'>Crear</a></button><br><br>

    <a href='{{ route('proveedor.index') }}'>Listado de proveedores.</a>

</x-base>
