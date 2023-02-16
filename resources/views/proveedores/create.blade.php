<x-base>

    <x-slot:tituloHead>Crear proveedor</x-slot:tituloHead>


    <form action='{{ route('proveedores.store') }}' method='post'>
        @method('post')
        @csrf

        <x-proveedores_campos/>

        <input class='button' type='submit' name='crear' value='Crear proveedor' />
    </form><br/>

    <a href='{{ route('proveedores.index') }}'>Volver al listado</a>

</x-base>

