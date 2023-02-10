<div class="margenes">
    <label for='nombre'>Nombre </label>
    <input type='text' id='nombre' name='nombre' value='{{ $proveedor->nombre ?? '' }}' />
    <br><br>
    <label for='correo_electronico'>Correo electrónico </label>
    <input type='text' id='correo_electronico' name='correo_electronico' value='{{ $proveedor->correo_electronico ?? '' }}' />
    <br><br>
    <label for='direccion'>Dirección </label>
    <input type='text' id='direccion' name='direccion' value='{{ $proveedor->direccion ?? '' }}' />
    <br><br>
</div>
