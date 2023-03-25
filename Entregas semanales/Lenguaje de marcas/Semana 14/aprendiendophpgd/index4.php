<?php
//cargo la imagen
$im = @imagecreatefromjpeg("isabel.jpg");
//obtener los datos de la imagen
$tamano = getimagesize("isabel.jpg");
var_dump($tamano);
echo "<br>";
echo "Que sepas que la imagen tiene unas dimensiones de: ".$tamano[3]."<br>";
echo "Que sepas que la imagen tiene una anchura de: ".imagesx($im)."<br>";
echo "Que sepas que la imagen tiene una altura de: ".imagesy($im)."<br>";


?>