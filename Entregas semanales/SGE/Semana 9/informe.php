<!doctype html>
<html>
    <head>
        <style>
            body{
                background-image: url('fondoformulario4.jpg');
                font-family:sans-serif;
                background-size:cover;
                background-position: center;
            }
            table{
                width:1200px;
                margin:auto;
                background: white;
                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4);
                padding:30px;
                border-radius:15px;
                color:#744D8C;
                
            }
            h1{
                text-align: center;
                margin-top:40px;
                color: #9587AD;
            }
            
        </style>
    </head>
    <body>
        <!-- Incluyo el codificador -->
        <?php include "codificador.php"; ?>
        <!-- Descodifico la clave -->
        <h1>Entregas de las prácticas <?php echo descodifica($_GET['clave']) ?></h1>
        <table>
            <tr><th>URL:</th><th>Asignatura:</th><th>Práctica:</th><th>Fecha:</th><th>Video:</th></tr>
        <?php
            include "config.php";

            //Desactivar temporalmente las advertencias
            error_reporting(E_ERROR | E_PARSE);

            //establece la conexion a la base de datos 
            $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
            //la consulta será que coja todos los registros de entregas donde el email sea la clave para que el informe sea seguro
            $consulta = "SELECT * FROM entregas WHERE email = '".descodifica($_GET['clave'])."'";
            $resultado = $mysqli->query($consulta);
            while($fila = $resultado->fetch_assoc()){
                //Para coger solo la v de la URL y pegarla en el iframe para el video de youtube
                $parts = parse_url($fila['url']);
                parse_str($parts['query'], $query);
                $miparte = $query['v'];
                //echo $miparte;

                echo '<tr>';
                //introduzco los valores de la bbdd en la tabla + el iframe del video
                echo '<td><a href="'.$fila['url'].'">'.$fila['url'].'</a></td>';
                echo '<td>'.$fila['asignatura'].'</td>';
                echo '<td>'.$fila['practica'].'</td>';
                echo '<td>'.$fila['epoch'].'</td>';
                echo '<td>';
                //Introuzco el iframe para el video de youtube
                echo '<iframe width="300" height="200" src="https://www.youtube.com/embed/'.$miparte.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                echo '</td>';
                echo "</tr>";
            }
        ?>
        </table>
    </body>
</html>
