<?php
    //trabajar con sesiones
    session_start();
    //me conecto a la base de datos
    $mysqli = new mysqli("localhost","documentos","documentos","documentos");
    //hago la consulta
    $consulta = "SELECT * FROM usuarios WHERE user = '".$_POST['user']."' AND password = '".$_POST['password']."'";
    //lanzo la consulta
    $resultado = $mysqli->query($consulta);
    //creo la variable pasas
    $pasas = false;
    //mientras coincida el resultado
    while ($fila = $resultado->fetch_assoc()){
        //pasas será true
        $pasas = true;
        $_SESSION['user'] = $fila['user'];
    }
    //si pasas es true
    if($pasas == true){
        echo "OK. Te doy acceso a la aplicación";
        //redirige a documentos.php
        echo '<meta http-equiv="Refresh" content="3; url=documentos.php" />';
        
    //en caso contrario     
    }else{
        echo "Credenciales incorrectas, vuelve a intentarlo";
        //redirige a index.php
        echo '<meta http-equiv="Refresh" content="3; url=index.php" />';
    }

?>