<?php
header("Content-type: image/png");
//Antes de cargar la imagen tengo que recibirla
move_uploaded_file($_FILES["imagen"]["tmp_name"], "mifoto.jpg");

//Implementar filtros a la imagen
$im = imagecreatefromjpeg('mifoto.jpg');
imagefilter($im, IMG_FILTER_GRAYSCALE);

//Definir colores
$morado = imagecolorallocate($im, 72, 0, 133);
$moradotrans = imagecolorallocatealpha($im, 72, 0, 133, 100);

//Definir fuente
$fuente = 'arial.ttf';

//Creamos marcas de agua por toda la imagen
for($x = 0;$x<512;$x+=55){
    for($y = 0;$y<512;$y+=7){
        imagettftext($im, 5, 0, $x, $y, $moradotrans, $fuente, "Isabel González");
    }
}

//Poner texto en la imagen con pixeles
//imagettftext($im, 10, 0, 10, 20, $moradotrans, $fuente, "Isabel González");

//Muestra la imagen con el filtro por pantalla
imagepng($im)
?>