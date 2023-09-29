<?php
//definimos una variable para la url de la carpeta
$path = 'vault/users/isabel/';
//condicion para que me lea todo lo que contenga la carpeta
if ($handle = opendir($path)) {
    //mientras existan archivos en el directorio
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            //filetype será el nombre de la extesion y file name el nombre del archivo 
            echo "<div class='item' filetype='".explode(".",$entry)[1]."' filename ='".$entry."'>";
            //si es una carpeta que muestre el icono carpeta
            if (is_dir($path . '/' . $entry)) {
                    echo "<div class='iconfolder'><img src='img/bootstrap-icons-1.11.1/folder2-open.svg'></div>";
                //en caso contrario es un documento que muestre icono de documento
                }else{
                    //coge el segundo elemento del array, es decir, la extension. El array se crea con explode donde separa los elementos por el .
                    echo "<div class='iconfile'><img src='img/bootstrap-icons-1.11.1/filetype-".explode(".",$entry)[1].".svg'></div>";
            }
            echo "
            <span class='documentname'>".$entry."</span></div>";
        }
    }
    //cerramos el directorio
    closedir($handle);
}

?>