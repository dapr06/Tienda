<x-base>
    <x-slot:tituloHead>Proveedores</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de proveedores</x-slot:tituloVisible>

    <h2>Listado de proveedores</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Dirección</th>
            <!--<th>Id_Proveedor</th>-->
            <th>Eliminar</th>
        </tr>

        @foreach ($proveedores as $proveedor)
            <tr>
                <td><a href='{{ route('proveedor.show', $proveedor) }}'>{{ $proveedor->id }}</a></td>
                <td><a href='{{ route('proveedor.show', $proveedor) }}'>{{ $proveedor->nombre }}</a></td>
                <td><a href='{{ route('proveedor.show', $proveedor) }}'>{{ $proveedor->correo_electronico }}</a></td>
                <td><a href='{{ route('proveedor.show', $proveedor) }}'>{{ $proveedor->direccion }}</a></td>

                <td>
                    <form action='{{ route('proveedor.destroy', $proveedor) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>(X)</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>

    <button><a href='{{ route('proveedor.create') }}'>Crear</a></button><br><br>

    <a href='{{ route('producto.index') }}'>Listado de productos.</a>

</x-base>
