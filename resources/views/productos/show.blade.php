<x-base>

    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>

    <p>Nombre: {{$producto->nombre}}</p>
    <p>Marca: {{$producto->marca}}</p>
    <p>Modelo: {{$producto->modelo}}</p>
    <p>Descripcion: {{$producto->descripcion}}</p>
    <p>Precio: {{$producto->precio}}</p>
    <p>Stock: {{$producto->stock}}</p>
    <p>Proveedor: {{$producto->proveedor->nombre}}</p>


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

