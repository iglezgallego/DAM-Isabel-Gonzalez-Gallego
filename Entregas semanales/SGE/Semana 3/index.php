<?php

    $mysqli = new mysqli("localhost", "docs", "docs", "docs");
    $consulta = "SELECT * FROM cms";
    $resultado = $mysqli->query($consulta);
    //lanzo la consulta
    while($fila = $resultado->fetch_assoc()){
        //meto todo el contenido de cms en una matriz
        $cms[$fila['elemento']] = $fila['contenido'];
    }

?>

<!doctype html>
<html>
    <head>
        <link rel="Stylesheet" href="inc/estilo.css">
    </head>
    
    <body>
        <header>
            <h1>
                <?php
                    echo $cms['titulo']
                ?>
            </h1>
            <h2>
                <?php
                    echo $cms['subtitulo']
                ?>
            </h2>
            <nav>
                <ul>
                    <!-- Enlace al mismo sitio, a nada -->
                    <li><a href="?">Inicio</a></li>
                    <!-- Enlace a productos -->
                    <li><a href="?p=productos">Productos</a></li>
                    <!-- Enlace a blog -->
                    <li><a href="?p=blog">Blog</a></li>
                    <!-- Enlace a contacto -->
                    <li><a href="?p=contacto">Contacto</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
                //si existe p
                if(isset($_GET['p'])){
                    //ve al elemento p seleccionado
                    include "inc/".$_GET['p'].".php";
                }else{
                    //ve a inicio.php
                    include "inc/inicio.php";
                }
                
            ?>   
        </main>
        <footer>
            <?php
                echo $cms['copyright']
            ?>
        </footer>
    </body>
</html>

