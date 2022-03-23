<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Bienvenido</title>
</head>
<body>
    <div class="bienv">
        <h1>Bienvenido: {{ auth()->name }} </h1>
    </div>
    <br><br>
    <div class="booton">
        <form action="/LogOut" method='DELETE'>
            <button class="submit" type="submit" value="">Cerrar Sesion</button>
        </form>
    </div>
</body>
</html>