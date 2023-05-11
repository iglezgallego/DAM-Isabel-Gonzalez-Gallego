<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <!--boton de atras -->
    <nav class="navbar navbar-dark bg-dark">
      <div class="ml-auto">
        <button class="btn btn-secondary" onclick="window.location.href='escritorio.php'">Atrás</button>
      </div>
      </nav>
      
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Actualizar registro</h2>
    <p class="lead"></p>
  </div>

  <div class="row"></div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3"></h4>
      <form class="needs-validation" novalidate method="POST" action="procesaactualizar.php">
          
          <!-- input para saber que tabla y que id estamos pasando -->
        <input type="hidden" class="form-control" id="address2" name="tabla" value="<?php echo $_GET['tabla']?>"> 
          
        <input type="hidden" class="form-control" id="address2" name="id" value="<?php echo $_GET['id']?>"> 
        <?php
                include "conexiondb.php";
                $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
                $resultado = mysqli_query($enlace,$peticion);

                while ($fila = $resultado->fetch_assoc()) {
                        //no mostrar el identificador en el cuestionario
                        if ($fila['Field'] == "Identificador") {
                            continue;
                        }
                    //en el primer label le decimos que nos coja las columnas de la tabla automaticamente
                    //Hacemos otra peticion2 y en el input le decimos que queremos que nos aparezcan los valores correspondientes a esos campos
                    echo '
                    <div class="mb-3">
                      <label for="address2" style="text-transform:capitalize;">'.$fila['Field'].'<span class="text-muted"></span></label>';
                    
                    //////////////////////////////////////////////////////////
                    $peticion2 = "SELECT ".$fila['Field']." AS columna FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'].";";
                    $resultado2 = mysqli_query($enlace,$peticion2);
                    while ($fila2 = $resultado2->fetch_assoc()) {
                    echo '
                        <input type="text" name="'.$fila['Field'].'" class="form-control" id="address2" value="'.$fila2['columna'].'">
                        ';
                    }
                    /////////////////////////////////////////////////////////
                          echo '
                    </div>

                    ';
                }
            ?>

        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Actualizar</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script></body>
</html>
