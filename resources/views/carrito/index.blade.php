<div class="container">
    <h2>Carrito</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Pedido</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>


    @foreach ($linea_pedido as $linea)

        <tr>
            <td><a>{{ $linea->id }}</a></td>
            <td><a>{{ $linea->producto_id }}</a></td>
            <td><a>{{ $linea->cantidad }}</a></td>
            <td><a>{{ $linea->pedido_id }}</a></td>
            <td><a href='{{ route('lineas_pedidos.edit', $linea->id) }}'><img src="edit.png" width="20" height="20"></a></td>
            <td>
                <form action="{{ route('lineas_pedidos.destroy', $linea->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="image" src="delete.png" width="20" height="20">

                </form>
            </td>
        </tr>

    @endforeach
        <!--mensaje de eliminada correctamente-->
        @if (session('eliminada'))
            <div class="alert alert-success">
                <!--es una expresión de Blade en Laravel que permite mostrar un
                mensaje en la vista que proviene de la sesión.-->
                {{ session('eliminada') }}
                <form action="{{ route('lineas_pedidos.recover') }}" method="GET">
                    @csrf
                    <input type="submit" value="Deshacer">
                </form>
            </div>
        @endif

    </table>
</div>
<br><br>
<div>
    <button><a href='{{ route('lineas_pedidos.create') }}'>Agregar producto</a></button>
    <a href='{{route('productos.index')}}'><button>Productos</button></a>
</div>




