<!doctype html>
<html>
    <head>
        
        <style>
            
            body{
                font-family:sans-serif;
                background-image: url('fondoformulario4.jpg');
                background-size:cover;
                background-position: center;
            }
            #formulario{
                width: 50%;
                background:white;
                margin:auto;
                padding:20px;
                box-shadow:0px 10px 20px rgba(0,0,0,0.5);
                border-radius:15px;
                text-align: center;
                margin-top: 10px;
            }
            #formulario h1{
                color: #9587AD;
                font-size: 20px;
                padding: 0px;
                margin: 0px;
                margin-bottom:20px;
            }
            #formulario h3{
                text-align: left;
                color:#744D8C;
                margin:0px;
                padding:0px;
            }
            #formulario p{
                font-size: 10px;
                color: #584575;
                text-align: left;
            }
            
            .campo input{
                padding:5px;
                border:none;
                background: #FAF5EC;
                margin:0px;
                width: 80%;
                clear:both;
            }
            
            img.logo{
                width: 8%;
                height: 8%;
                margin-bottom:10px;
                
            }
            .campo{
                margin-bottom:20px;
            }
            .campo label{
                color: #584575;
                font-size: 2em;
                padding:0px;
                margin:0px;
                
            }
            .campo p{
                font-size:0.6em;
                padding:0px;
                margin:0px;
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
            input{
                transition: all 1s;
            }
            input:focus{
               outline:none;
                background:white;
            }
            .contienecampo input{
                width:98%;
                float:left;
                margin-right:0px;
                height:20px;
                border-radius:5px 0px 0px 5px;
                box-shadow: 0px 4px 8px rgba(0,0,0,0.1) inset;
            }
            .contienecampo .tipocampo{
                float:right;
                width: 100%;
                background:#EAE4C5;
                line-height: 30px;
                margin-top:0px;
                border-radius:0px 5px 5px 0px;
                
            }
            img.icon{
                width: 15px;
                height: 15px;
                
            }
            .clearfix{
                clear:both;
            }
            .contienecampo table{
               width:100%; 
            }
            
        </style>
    </head>
    <body>
        <div id="formulario">
            <img src="forma-abstracta.png" class="logo">
            <h1>Introduce tus datos en este formulario</h1>
                <p>En este formulario puedes enviar la práctica correspondiente rellenando los campos requeridos</p>
            <!-- Incluimos el controlador para el formulario -->
            <?php
                //incluimos el archivo controlador.php donde tenemos las funciones para codificar y descodificar
                include "codificador.php";
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
                include "registro.php";
        ?>
        </div>       
    </body>
</html>

