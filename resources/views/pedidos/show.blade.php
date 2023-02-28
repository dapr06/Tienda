<x-base>

    <x-slot:tituloHead>Productos</x-slot:tituloHead>
    <x-slot:tituloVisible>Listado de productos</x-slot:tituloVisible>

    <p> {{$pedido->id}}</p>
    <p>{{$producto->estado}}</p>
    <p> {{$producto->user_id}}</p>
    <p> {{$producto->created_at}}</p>
    <p> {{$producto->updated_at}}</p>

    <a href='{{ route('productos.edit', $producto) }}'>Editar producto</a>

    <br/><br/>


</x-base>

