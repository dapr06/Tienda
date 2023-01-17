<x-base>

    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>

    <p>{{$producto->nombre}}</p>
    <p>{{$producto->marca}}</p>
    <p>{{$producto->modelo}}</p>
    <p>{{$producto->descripcion}}</p>
    <p>{{$producto->precio}}</p>
    <p>{{$producto->stock}}</p>


    <a href='{{ route('productos.edit', $producto) }}'>Editar producto</a>

    <br/><br/>

    <form id='{{ $producto->id }}' action='{{ route('productos.destroy', $producto) }}'
          method='post'>
        @method('delete')

        <input class='button' type='submit' name='crear' value='Eliminar producto' />
    </form>

    <br>

    <a href='{{ route('productos.index') }}'>Volver al listado de productos.</a>

</x-base>

