<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Vericacion Codigo</title>
</head>
<body>
<div class="cont1">
    <div class="form sign-in" id = "prueba">
      <h2>Verifica</h2>
      <form action="/verificacion" method="POST">
        @csrf
        <label>
            <span>Codigo de verificacion</span>
            <input type="text" name="code" placeholder="Escribe el codigo" required>
        </label>
        <button class="submit" type="submit" value="">Enviar</button>
      </form>
    </div>
</div>
</body>
</html>