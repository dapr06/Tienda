<x-base>
    <x-slot:tituloHead>Proveedores</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de proveedores</x-slot:tituloVisible>

    <h2>Listado de proveedores</h2>
    <table border="1">
        <tr>

            <th>Nombre</th>
            <th>Correo</th>
            <th>Dirección</th>

            <th>Eliminar</th>
        </tr>

        @foreach ($proveedores as $proveedor)
            <tr>

                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->nombre }}</a></td>
                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->correo_electronico }}</a></td>
                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->direccion }}</a></td>

                <td>
                    <form action='{{ route('proveedores.destroy', $proveedor) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>(X)</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>

    <button><a href='{{ route('proveedores.create') }}'>Crear</a></button><br><br>

    <a href='{{ route('productos.index') }}'>Listado de productos.</a>

</x-base>
