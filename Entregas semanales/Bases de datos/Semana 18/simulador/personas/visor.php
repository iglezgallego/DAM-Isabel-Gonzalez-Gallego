<?php

// crear una imagen en blanco
$imagen = imagecreatetruecolor(512, 512);

// rellenar el color de fondo 
$fondo = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $fondo);
// elegir un color para la elipse
$col_ellipse = imagecolorallocate($imagen, 255, 0, 0);

//Buscar el directorio registros
if ($handle = opendir('registros')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            //echo "$entry\n";
            $myfile = fopen("registros/".$entry, "r") or die("Unable to open file!");
            $linea = fread($myfile,filesize("registros/".$entry));
            fclose($myfile);
            $partido = explode(",",$linea);
            /*
            // Dividir la línea en coordenadas x e y
            $coordenadas = explode(",", $linea);
            $coordenada_x = intval($coordenadas[0]);
            $coordenada_y = intval($coordenadas[1]);
            */
            // Dibujar la elipse
            imagefilledellipse($imagen, $partido[0], $partido[1], 50, 50, $col_ellipse);
            
        }
    }

    closedir($handle);
}


// imprimir la imagen
header("Content-type: image/png");
imagepng($imagen);
header("Refresh: 1; url='?'");

?>