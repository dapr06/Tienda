<x-base>

    <x-slot:tituloHead>Proveedores</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de proveedores</x-slot:tituloVisible>

    <p>{{$proveedor->nombre}}</p>
    <p>{{$proveedor->correo_electronico}}</p>
    <p>{{$proveedor->direccion}}</p>


    <a href='{{ route('proveedor.edit', $proveedor) }}'>Editar producto</a>

    <br/><br/>

    <form id='{{ $proveedor->id }}' action='{{ route('proveedor.destroy', $proveedor) }}'
    method='post'>
    @method('delete')

    <input class='button' type='submit' name='crear' value='Eliminar producto' />
    </form>

    <br>

    <a href='{{ route('proveedor.index') }}'>Volver al listado de productos.</a>

</x-base>
