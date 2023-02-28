<x-base>
    <x-slot:tituloHead>Confirmado</x-slot:tituloHead>
    <x-slot:tituloVisible>Pedido confirmado</x-slot:tituloVisible>
    <link rel='stylesheet' href='../../../public/css/estilos.css'>
    <h3> Pedido enviado a dirección : {{ Auth::user()->direccion }} </h3>

    <a href='{{ route('productos.index') }}'>Volver</a>
</x-base>
