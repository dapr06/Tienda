
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

        <a href='{{route('registeredUser.edit-direccion')}}'> Editar direccion de envio</a>
    </h2>

    <h2> Metodo de pago</h2>

    <a href='{{route('lineaPedido.confirmado')}}'> <button>Confirmar pedido</button></a>


</div>

<br><br>

<a href='lineaPedido'>Volver al carrito</a>









