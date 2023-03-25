<?php
    //Se comporta como si hubiera cargado una imagen en el navegador, saca la imagen por pantalla
    header("Content-type: image/png");
    // Crear una imagen de 512 x 512
    $im = imagecreatetruecolor(512, 512);
    // Asignar colores
    $blanco = imagecolorallocate($im, 255, 255, 255);
    $rojo = imagecolorallocate($im, 255, 0, 0);
    //Dibujar un fondo blanco (rectangulo blanco)
    imagefilledrectangle($im, 0, 0, 512, 512, $blanco);
    // Dibujar un rectángulo rojo
    imagefilledrectangle($im, 4, 4, 50, 50, $rojo);
    // Guardar la imagen
    imagepng($im);
    //liberar memoria
    imagedestroy($im);

?>