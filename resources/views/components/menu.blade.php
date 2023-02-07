<link rel='stylesheet' href='resources/css/estilos.css'>
<div
    style='background-color: lightgreen'
>
    <a href='{{route('productos.index')}}'><button>Productos</button></a>
    <a href='{{route('productos.create')}}'><button>Crear productos</button></a>
    <a href='{{route('proveedores.index')}}'><button>Proveedores</button></a>
    <a href='{{route('proveedores.create')}}'><button>Crear proveedores</button></a>
    <a href='{{ route('lineaPedido.index') }}'><button>Carrito</button></a>

    <x-user/>
</div>

