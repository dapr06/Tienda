<x-base>
    <x-slot:tituloHead>Proveedores</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de proveedores</x-slot:tituloVisible>

    <table>

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
                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->id }}</a></td>
                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->nombre }}</a></td>
                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->correo_electronico }}</a></td>
                <td><a href='{{ route('proveedores.show', $proveedor) }}'>{{ $proveedor->dirección }}</a></td>

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

    <a href='{{ route('proveedores.index') }}'>Listado de proveedores</a>

</x-base>
