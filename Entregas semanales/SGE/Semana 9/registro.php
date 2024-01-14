<?php
/*
    //Primero analizo lo que viene por formulario antes de añadirlo para que si detecta un intento de ataque lo bloquee y podamos saber quien ha intentado hacer el ataque
    foreach($_REQUEST as $nombre_campo => $valor){
        //Para los nombres de los campos
        if(preg_match('~\b(delete|drop|truncate)\b~i',$nombre_campo)){
            //vuelca los datos introducidos + la IP + el navegador
            $volcado = implode(",", $_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";
            //creo el archivo en modo append
            $myfile = fopen("volcado.txt", "a");
            //escribo en el archivo $myfile el $volcado 
            fwrite($myfile, $volcado);
            //deten la ejecución
            die("ejecución detenida por el registro");
        }
        //Para los valores
        if(preg_match('~\b(delete|drop|truncate)\b~i',$valor)){
            //vuelca todos los datos
            $volcado = implode(",", $_REQUEST).",".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_USER_AGENT']."\n";
            //creo el archivo en modo append
            $myfile = fopen("volcado.txt", "a");
            //escribo en el archivo $myfile el $volcado 
            fwrite($myfile, $volcado);
            //deten la ejecución
            die("ejecución detenida por el registro");
        }
    }
    */
    include "config.php";
    $mysqli = new mysqli($mydbserver, $mydbuser, $mydbpassword, $mydb);
    
    //para atrapar la url en la variable
    $url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

    //Atrapo los datos de POST nombre campo y valor y los pongo en la cadena
    $cadena = '';
    foreach($_REQUEST as $nombre_campo => $valor){$cadena .= $nombre_campo.":".$valor."|";}


    //Va meter un registro vacío en Identificador y el resto de valores y columnas los inserta normal en la bbdd
    $consulta = "INSERT INTO registros VALUES 
    (NULL,
    '".date('U')."',
    '".$url."',
    '".$_SERVER['REMOTE_ADDR']."',
    '".$_SERVER['HTTP_USER_AGENT']."',
    '".$cadena."')
    ";
    
    //lanzo la consulta
    $mysqli->query($consulta);

?>