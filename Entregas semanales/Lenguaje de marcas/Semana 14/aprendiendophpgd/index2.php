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
    for($i = 0;$i<1000;$i++){
        $x = rand(0, 512);
        $y = rand(0, 512);
        imagefilledrectangle($im, $x, $y, $x + 50, $y + 50, imagecolorallocate($im, round(rand(0, 255)), round(rand(0, 255)), round(rand(0, 255))));
        }
    // Guardar la imagen
    imagepng($im);
    //liberar memoria
    imagedestroy($im);

?>