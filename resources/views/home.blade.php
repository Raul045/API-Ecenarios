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

    <form action="/LogOut" method='POST'>
     @csrf
        <label for=""><h1>Bienvenido {{ auth()->user()->name }}</h1></label>    
        <button class="submit" type="submit" value="">Cerrar Sesion</button>
    </form>
</body>
</html>