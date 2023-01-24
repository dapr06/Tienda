<x-base>


<x-slot:titulo>Edita proveedor</x-slot:titulo>
<H1> Edita proveedor {{$proveedor->nombre}}</H1>
<br>
<form action = '{{route('proveedor.update',$proveedor)}}' method='post'>
    @method('put')

    <label for='nombre'>Nombre </label>
    <input id='nombre' name ='nombre' type='text' value='{{$proveedor->nombre}}' >

    <br><br>

    <label for='correo_electronico'>Correo</label>
    <input id='correo_electronico' name='correo_electronico' type='text' value='{{ $proveedor->correo_electronico }}'>
    <br><br>

    <label for='direccion'>Direccion</label>
    <input id='direccion' name='direccion' type='text' value='{{ $proveedor->direccion }}'>
    <br><br>


    <button type='submit'>Actualizar</button>
</form>

<a href='{{ route('proveedor.index') }}'>Ir al listado de proveedores</a>
</x-base>
