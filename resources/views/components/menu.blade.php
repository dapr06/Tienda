<div id='capaPadre'>

    <div id='inter'>
        <a class='principal' href='{{route('productos.index')}}'><img class='inicioFoto' src='/img/logoProyecto.png'></a>
        <div id='hid'>juhtgyfrionlsrtn</div>
        <div class='botones'>

            <a href='{{route('productos.index')}}'><button>Productos</button></a>
            <a href='{{route('productos.create')}}'><button>Crear productos</button></a>
            <a href='{{route('proveedores.index')}}'><button>Proveedores</button></a>
            <a href='{{route('proveedores.create')}}'><button>Crear proveedores</button></a>
            <a href='{{route('contacto')}}'>Contacto</a>


        </div>
        <a href='{{ route('lineaPedido.index') }}'><img class='carroP' src='/img/carrito.png'></a><x-user/>
    </div>

</div>
