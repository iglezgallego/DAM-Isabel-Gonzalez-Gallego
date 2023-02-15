<form action="procesaactualizar.php" method="POST">
    <?php

        include "conexiondb.php";
    
        $peticion = "SELECT * FROM usuarios
        WHERE Identificador = ".$_GET['id']."
        ";
        $resultado = mysqli_query($enlace,$peticion);

        while ($fila = $resultado->fetch_assoc()) {
            echo '<tr>
            <input type="hidden" name="Identificador" value="'.$fila['Identificador'].'">
                Usuario: <input type="text" name="usuario" value="'.$fila['usuario'].'"><br>

                Contraseña: <input type="text" name="password" value="'.$fila['password'].'"><br>

                Nombre: <input type="text" name="nombre" value="'.$fila['nombre'].'"><br>

                Apellidos: <input type="text" name="apellidos" value="'.$fila['apellidos'].'"><br>
                <br><input type="submit" value="Enviar">
                ';

        }
    ?>
<br>
    </form>
<a href="paneldecontrol.php">Volver a la página anterior</a>