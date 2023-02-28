<x-base>
    <x-slot:tituloHead>Pago</x-slot:tituloHead>
    <x-slot:tituloVisible>Pago</x-slot:tituloVisible>
    <link rel='stylesheet' href='../../../public/css/estilos.css'>
{{-- Tramitar pedido--}}

    <input type="hidden" name="total_cantidad" value="{{ $total_cantidad = 0 }}">
    @foreach ($lineaPedido as $linea)
        <input type="hidden" name="total_cantidad" value="{{ $total_cantidad += $linea->cantidad }}">
    @endforeach

    {{-- Div ponerlo luego desde css mejor --}}

    <h1 style="text-align:center;">Tramitar producto: ({{$total_cantidad}} productos)</h1>

    <div>
        <h2> Envio: {{ Auth::user()->name}}  </h2>
        <h2> Direccion: {{Auth::user()->direccion}}

            <a href='{{route('registeredUser.edit-direccion')}}'> Editar dirección de envio</a>
        </h2>

        <h2> Método de pago</h2>

        <a href='{{route('lineaPedido.confirmado')}}'> <button>Confirmar pedido</button></a>
    </div>
    <br><br>

    <a href='lineaPedido'>Volver al carrito</a>
</x-base>







