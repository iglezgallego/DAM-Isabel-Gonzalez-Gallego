<!doctype html>
<html>
    <head>
        <style>
            body{
                font-family:sans-serif;
                background-image: url('fondoformulario4.jpg');
                background-size:cover;
                background-position: center;
                text-align: center;
            }
            #formulario{
                width: 40%;
                background:white;
                margin:auto;
                padding:20px;
                box-shadow:0px 10px 20px rgba(0,0,0,0.5);
                border-radius:15px;
                margin-top: 90px;
            }
            
            .campo input{
                padding:5px;
                border:none;
                background: #FAF5EC;
                margin:4px;
                width: 60%;
            }
            #formulario h1{
                color: #9587AD;
                font-size: 20px;
                padding: 0px;
                margin-top:10px;
                text-align: center;
            }
            #formulario p{
                font-size: 12px;
                color: #584575;
                text-align: center;
                margin-bottom:20px;
            }
            #formulario img{
                width: 8%;
                height: 8%
            }
            .campo{
                margin-bottom:5px;
            }
            .campo label{
                color: #584575;
                font-size: 1.1em;
                padding:0px;
                margin:0px;
                
            }
            .campo p{
                font-size:0.6em;
                padding:0px;
                margin:0px;
            }
            .placeholder-extension::placeholder{
                font-size: 8.5px; /* Puedes ajustar el tamaño del texto */
                letter-spacing: 0.2px;
                width: 400px;
            }
            .enviar{
                padding: 10px 20px;
                margin-bottom: 20px;
                background-color: #584575;
                color: white; 
                border: none;
                border-radius: 5px;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div id="formulario">
            <img src="bootstrap-logo.ico">
            <h1>Introduce tus datos en este formulario</h1>
                <p>En este formulario puedes enviar la práctica correspondiente rellenando los campos requeridos</p>
            <!-- Incluimos el controlador para el formulario -->
            <?php
                //incluimos el archivo controlador.php donde tenemos la clase
                include "controlador.php";
                //Creamos una instancia de la clase Supercontrolador
                $miformulario = new Supercontrolador();

                //Si se esta enviando un campo por POST llamado clave y el campo clave es igual a procesaformulario
                if(isset($_POST['clave']) && $_POST['clave'] = 'procesaformulario'){
                    //llamo al metodo procesaformulario que hay en Supercontrolador 
                    $miformulario->procesaformulario("entregas");
                //en caso contrario
                }else{
                    //llamo al metodo formulario que hay en Supercontrolador y le digo que la variable que le paso es la tabla entregas
                    $miformulario->formulario("entregas"); 
                }
        ?>
        </div>       
    </body>
</html>

