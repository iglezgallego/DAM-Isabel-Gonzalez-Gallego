<?php
    if(isset($_GET['error']) && $_GET['error']=="si"){
        echo '<script>alert("El usuario o el email ya existe")</script>';
    //Si existe "error" y es igual a "si" saca una pestaña emergente con el mensaje
    }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YourGoals - Registrarse</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
      <!--icono de la pestaña-->
    <link rel="icon" href="assets/brand/bootstrap-logo.ico">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
        body{
            background: rgb(205,178,205);
            background: linear-gradient(90deg, rgba(205,178,205,1) 46%, rgba(161,78,149,1) 100%);
        }
        #atras{
            background: none !important;
            border: none !important;
            font-weight: 400;
            font-size: 19px;
            color:#382E41;
        }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin w-100 m-auto">
    <!-- Formulario para el singin con el metodo post y conectado a conf_singin.php -->
        <form action="conf_singin.php" method="post">
            <img class="mb-4" src="assets/brand/bootstrap-logo.png" alt="" width="90" height="90">
            <br>
            <h2 class="h3 mb-3 fw-normal" style="font-size:20px;">Crea tu cuenta</h2>

            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="Tu nombre de usuario" name="usuario" required>
              <label for="floatingInput">Introduce tu nombre de usuario</label>
            </div>
            <br>
            <div class="form-floating">
              <input type="email" class="form-control" id="floatingPassword" placeholder="Tu email" name="email" required style="border-radius:5px 5px 5px 5px;">
              <label for="floatingPassword">Introduce tu email</label>
            </div>
            <br>
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Tu contraseña" name="contrasena" required style="border-radius:5px 5px 5px 5px;">
              <label for="floatingPassword">Introduce tu nueva contraseña</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" style="background:#736C74; color:white; border:0px;">Registrarse</button>
        </form>
        <br><br>
        <a href="home.php"><button id="atras" style="width:150px;"><span style="font-size:20px;font-weight:600;">⇦</span> Volver</button></a>
        <br>
        <!-- Pie de pagina -->
        <p class="mt-5 mb-3 text-muted">&copy; Isabel González-Gallego 2022</p>
    </main>

  </body>
</html>
