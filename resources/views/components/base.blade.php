<html>
<div>
    <div id='capaPadre'>
        <link rel='stylesheet' href='/css/app.css'>
        <title>{{ $titulo ?? 'Tienda' }}</title>

        </head>

        <body>
        <x-info-users></x-info-users>
        <x-menu/>
        {{ $slot }}
    </div>

    </body>
</html>
