<x-base>

    <x-slot:tituloHead>Crear producto</x-slot:tituloHead>


    <form action='{{ route('productos.store') }}' method='post'>
        @method('post')
        @csrf

        <x-productos_campos/>

        <input class='button' type='submit' name='crear' value='Crear productos' />
    </form><br/>

    <a href='{{ route('productos.index') }}'>Volver al listado</a>

</x-base>

