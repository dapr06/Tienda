<x-base>
    <x-slot:tituloHead>Carrito</x-slot:tituloHead>
    <x-slot:tituloVisible>Linea de pedido</x-slot:tituloVisible>


    <h2>Carrito</h2>
    <table border="1">
        <tr>

            <th>Producto</th>
            <!--ver--><th>Precio unidad</th><!--ver-->
            <th>Cantidad</th>
            <!--ver--><th>Precio Total</th>

            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        <!--ver--><input type="hidden" name="total_cantidad" value="{{ $total_cantidad = 0 }}">

    @foreach ($lineaPedido as $linea)

        <tr>
            <!--ver--><td><a>{{ $linea->producto->nombre}}</a></td>
            <!--ver--><td><a>{{$linea->producto->precio}}</a></td>
            <td><a>{{ $linea->cantidad }}</a></td>
            <!--ver--><td><a>{{$linea->producto->precio * $linea->cantidad }}</a></td>


            <!--ver--><input type="hidden" name="total_cantidad" value="{{ $total_cantidad += $linea->cantidad }}">


                <td><a href='{{ route('lineaPedido.edit', $linea->id) }}'><img src="/img/edit.png" width="20" height="20"></a></td>
                <td>
                    <form action="{{ route('lineaPedido.destroy', $linea->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="image" src="/img/delete.png" width="20" height="20">

                </form>
            </td>
        </tr>

        @endforeach

        <!--ver--><label>Total productos: {{$total_cantidad}}</label>

        <!--mensaje de eliminada correctamente-->
        @if (session('eliminada'))
            <div class="alert alert-success">
                <!--es una expresión de Blade en Laravel que permite mostrar un
                mensaje en la vista que proviene de la sesión.-->
                {{ session('eliminada') }}
                <form action="{{ route('lineaPedidos.recover') }}" method="GET">
                    @csrf
                    <input type="submit" value="Deshacer">
                </form>
            </div>
        @endif

    </table>


</div>
<br><br>
<div>

        <a href='{{route('productos.index')}}'><button>Volver a productos</button></a>
        <!--ver--><a href='{{route('lineaPedidos.pago')}}'><button>Tramitar pedido</button></a>

    </div>

</x-base>



