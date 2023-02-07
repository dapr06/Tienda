<html>
    <head>
        <title>{{ $titulo ?? 'Tienda' }}</title>
    </head>

    <body>
<x-info-users></x-info-users>
    <x-menu/>


   
        <h1>{{ $titulo ?? 'Tienda' }}</h1>
        <hr/>
        {{ $slot }}

    </body>
</html>
