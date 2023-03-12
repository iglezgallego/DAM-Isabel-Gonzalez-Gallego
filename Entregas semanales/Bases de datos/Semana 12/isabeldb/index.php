<?php

     include "isabeldb.php";
    //llamamos a la clase definida en isabeldb.php y creamos una conexion llamada clientes
    $conexion = new ISABELDB("crm");

    //CREAR E INSERTAR DATOS EN LA TABLA CLIENTES
    //$conexion->peticion("CREATE TABLE clientes (id,nombre,apellidos,email,telefono)");
    //$conexion->peticion('INSERT INTO clientes VALUES ("1","Isabel","Gonzalez","isa@mail.com","654789632")');
    
    //CREAR E INSERTAR DATOS EN LA TABLA PRODUCTOS
    //$conexion->peticion("CREATE TABLE productos (id,nombreproducto,precio,dimensiones)");
    //$conexion->peticion('INSERT INTO productos VALUES ("1","ratón","30","6x8x4")');

    //Vomita todo lo que haya aqui dentro
    $datos = $conexion->peticion("SELECT * FROM clientes");
    echo '<table border="1">';
    //echo "<tr><td>nombre</td><td>apellidos</td><td>telefono</td><td>email</td></tr>";
    for($i=0;$i<count($datos);$i++){
        echo "<tr><td>".$datos[$i]['nombre']."</td><td>".$datos[$i]['apellidos']."</td><td>".$datos[$i]['telefono']."</td><td>".$datos[$i]['email']."</td></tr>";
    }
    echo "</table>";
?>
 