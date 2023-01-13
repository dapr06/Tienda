<x-base>

    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>

    <table>

        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <!--<th>Id_Proveedor</th>-->
            <th>Eliminar</th>
        </tr>

        @foreach ($productos as $producto)
            <tr>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->id }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->nombre }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->marca }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->modelo }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->descripcion }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->precio }}</a></td>
                <td><a href='{{ route('productos.show', $producto) }}'>{{ $producto->stock }}</a></td>

                <td>
                    <form action='{{ route('productos.destroy', $producto) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>(X)</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>

    <button><a href='{{ route('productos.create') }}'>Crear</a></button><br><br>

    <a href='{{ route('productos.index') }}'>Listado de productos</a>

</x-base>
