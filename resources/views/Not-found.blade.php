<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Document</title>
</head>
<body>
    <form action="/welcome" method="POST">
        @csrf
        <div class="mensaje">
            <h1>Lo sentimos pero los datos no son correctos</h1>
        </div>
        <br><br>    
        <div class="link">
            <button class="submit" type="submit" value="">Regresar</button>
        </div>
    </form>
</body>
</html>