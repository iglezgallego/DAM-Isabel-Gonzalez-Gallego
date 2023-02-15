<html>
    <head>
        <script src="https://kit.fontawesome.com/dc05bdbd15.js" crossorigin="anonymous"></script>
        <style>
            body,html{
                background:white;
                font-family:sans-serif;
                padding:0px;
                margin:0px;
            } 
            header{
                background:black;
                color:white;
                padding:10px;
                width:100%;
                height:20px;
                text-align: right;
            }
            header a{
                color:inherit;
                text-decoration: none;
            }
            table tr:nth-child(odd){
                background:rgb(220,220,220);
                padding:5px;
            }
            table tr td{
                padding:5px;
            }
        </style>
    </head>
    <body>
<?php
    session_start();
    if(!isset($_SESSION['pasas']) || $_SESSION['pasas'] == false){
        die("Te has intentado colar en el panel de control sin permiso");
    }
    echo "<header>Bienvenido, ".$_SESSION['nombre']." ".$_SESSION['apellidos']." - ";
echo "<a href='logout.php'>Cerrar sesión</a></header>";
?>


<h1>Gestión de usuarios</h1>

<table cellpadding=0 cellspacing=0>
<tr>
    <th>Usuario</th>
    <th>Contraseña</th>
    <th>Nombre</th>
    <th>Apellidos</th>
</tr>

    <?php
    include "conexiondb.php";
    
    $peticion = "SELECT * FROM usuarios";
    $resultado = mysqli_query($enlace,$peticion);
    
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>
                <td>'.$fila['usuario'].'</td>
                <td>'.$fila['password'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['apellidos'].'</td>
                <td><a href="ver.php?id='.$fila['Identificador'].'"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="actualizar.php?id='.$fila['Identificador'].'"><i class="fa-solid fa-arrows-rotate"></i></a></td>
                <td><a href="eliminar.php?id='.$fila['Identificador'].'"><i class="fa-solid fa-trash"></i></a></td>
            </tr>';
    }
    ?>
    <tr>
        <form action="insertar.php" method="POST">
            <td><input type="text" name="usuario" placeholder="usuario"></td>
            <td><input type="text" name="password" placeholder="password"></td>
            <td><input type="text" name="nombre" placeholder="nombre"></td>
            <td><input type="text" name="apellidos" placeholder="apellidos"></td>
            <td><input type="submit" value="Enviar"></td>
        </form>
    </tr>
</table>
        </body>
</html>