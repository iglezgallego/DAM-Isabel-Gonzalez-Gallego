<?php

     include "isabeldb.php";
    //llamamos a la clase definida en isabeldb.php y creamos una conexion llamada clientes
    $conexion = new ISABELDB("crm");
    /*
    //CREAR E INSERTAR DATOS EN LA TABLA CLIENTES
    //$conexion->peticion("CREATE TABLE clientes (id,nombre,apellidos,email,telefono)");
    $conexion->peticion('INSERT INTO clientes VALUES ("4","Isabel","Gonzalez","isa@mail.com","678415269")');
    
    //CREAR E INSERTAR DATOS EN LA TABLA PRODUCTOS
    //$conexion->peticion("CREATE TABLE productos (id,nombreproducto,precio,dimensiones)");
    //$conexion->peticion('INSERT INTO productos VALUES ("1","ratón","30","6x8x4")');
    */
    
    //VER TABLA clientes
    /* $datos = $conexion->peticion("SELECT * FROM clientes");
    echo '<table border="1">';
    echo "<tr><td>nombre</td><td>apellidos</td><td>telefono</td><td>email</td></tr>";
    for($i=0;$i<count($datos);$i++){
        echo "<tr><td>".$datos[$i]['nombre']."</td><td>".$datos[$i]['apellidos']."</td><td>".$datos[$i]['telefono']."</td><td>".$datos[$i]['email']."</td></tr>"; 
    }
    echo "</table>";
    */

    //BORRAR DATOS
    /*    $datos = $conexion->peticion("DELETE * FROM clientes WHERE apellidos = 'Gonzalez'");
    
    echo "Vamos a ver lo que queda despues de eliminar<br>";
    //Para volver a ver la tablas tras eliminar el dato seleccionado

    $datos = $conexion->peticion("SELECT * FROM clientes");
    echo '<table border="1">';
    //echo "<tr><td>nombre</td><td>apellidos</td><td>telefono</td><td>email</td></tr>";
    for($i=0;$i<count($datos);$i++){
        echo "<tr><td>".$datos[$i]['nombre']."</td><td>".$datos[$i]['apellidos']."</td><td>".$datos[$i]['telefono']."</td><td>".$datos[$i]['email']."</td></tr>";
    }
    echo "</table>";
    */
    
    //ORDER BY//

    //LEER EL ARCHIVO CSV Y ALMACENAR DATOS EN UNA MATRIZ
    $clientes = [];
    if($file = fopen("db/crm/clientes.csv","r")){
        while($datos = fgetcsv($file, 1000, ",")){
            $clientes[] = $datos;
        }
        fclose($file);
    }
    //ORDENAR LOS DATOS POR ID
    $datos = $conexion->peticion("SELECT * FROM clientes ORDER BY id DESC");
    array_multisort(array_column($clientes, 0), SORT_ASC, $clientes);
    $datos = $conexion->peticion("SELECT * FROM clientes");
    echo '<table border="1">';
    echo "<tr><td>id</td><td>nombre</td><td>apellidos</td><td>telefono</td><td>email</td></tr>";
    //PARA VER CON ORDER BY
    foreach ($clientes as $cliente) {
        //mientras que el id sea un valor numérico, muestrame los datos
        while (is_numeric($cliente[0])) {
            echo "<tr><td>{$cliente[0]}</td><td>{$cliente[1]}</td><td>{$cliente[2]}</td><td>{$cliente[3]}</td><td>{$cliente[4]}</td></tr>";
            break;
            }
        }
    echo "</table>";
?>
 