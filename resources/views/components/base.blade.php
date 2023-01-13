<html>
    <head>
        <title>{{ $titulo ?? 'Tienda' }}</title>
    </head>
    <x-menu/>
    <body>
        <h1>{{ $titulo ?? 'Tienda' }}</h1>
        <hr/>
        {{ $slot }}
    </body>
</html>
