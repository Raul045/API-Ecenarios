<!DOCTYPE html>
<html>
<head>
	<title>Login and register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont">
    <div class="form sign-in">
      <h2>Inicia Sesion</h2>
      <form action="/Login" method="POST">
        @csrf
        <label>
            <span>Correo electronico</span>
            <input type="email" name="email" placeholder="Escribe tu correo" required>
        </label>
        <label>
            <span>Contraseña</span>
            <input type="password" name="password" placeholder="contraseña..." required>
        </label>
        <button class="submit" type="submit" value="">iniciar sesion</button>
      </form>
      <div class="social-media">
        <ul>
          <li><img src="./imagenes/facebook.png"></li>
          <li><img src="./imagenes/twitter.png"></li>
          <li><img src="./imagenes/linkedin.png"></li>
          <li><img src="./imagenes/instagram.png"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Eres nuevo?</h2>
          <p>Registrate con nosotros para formar parte de la comunidad</p>
        </div>
        <div class="img-text m-in">
          <h2>Ya tienes cuenta?</h2>
          <p>Si ya tienes cuenta entonces inicia sesion</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Registrarse</span>
          <span class="m-in">Iniciar</span>
        </div>
      </div>
      <div class="form sign-up">
      <h2>Registrate</h2>
          <form action="/Registro" method="POST">
            @csrf
            <label>
                <span>Nombre</span>
                <input type="text" name="name" placeholder="Nombre..." required>
            </label>
            <label>
                <span>Email</span>
                <input type="email" name="email" placeholder="Correo..." required>
            </label>
            <label>
                <span>Contraseña</span>
                <input type="password" name="password" placeholder="Contraseña..." required>
            </label>
            <button type="submit" class="submit">Registrarse</button>
          </form>
      </div>
    </div>
  </div>
<script type="text/javascript" src="{{ asset('./jsquerys/animacion.js') }}"></script>
</body>
</html>