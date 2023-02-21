<x-base>


<x-slot:titulo>Edita producto</x-slot:titulo>
<H1> Edita producto {{$producto->nombre}}</H1>
<br>
<form action = '{{route('productos.update',$producto)}}' method='post'>
    @method('put')

    <label for='nombre'>Nombre </label>
    <input id='nombre' name ='nombre' type='text' value='{{$producto->nombre}}' >

    <br><br>

    <label for='marca'>Marca</label>
    <input id='marca' name='marca' type='text' value='{{ $producto->marca }}'>
    <br><br>

    <label for='modelo'>Modelo</label>
    <input id='modelo' name='modelo' type='text' value='{{ $producto->modelo }}'>
    <br><br>

    <label for='descripcion'>Descripcion</label>
    <input id='descripcion' name='descripcion' type='text' value='{{ $producto->descripcion }}'>
    <br><br>

    <label for='precio'>Precio</label>
    <input id='precio' name='precio' type='text' value='{{ $producto->precio }}'>
    <br><br>

    <label for='stock'>Stock</label>
    <input id='stock' name='stock' type='text' value='{{ $producto->stock }}'>
    <br><br>

    <label for='proveedor_id'>Proveedor</label>
    <select id='proveedor_id' name='proveedor_id'>
        <optgroup label='Proveedor'>
            @foreach($proveedores as $proveedor)
                <option @selected($proveedor-> id == ($producto->proveedor_id ?? '')) value='{{ $proveedor->id}}'> {{ $proveedor->nombre }}</option>
            @endforeach
        </optgroup><br><br>
    </select>

    <br><br>
    <button type='submit'>Actualizar</button>
</form>

<a href='{{ route('productos.index') }}'>Ir al listado de categorias</a>
</x-base>
