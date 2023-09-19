<?php
    // Abre o crea el archivo "nombredocumento.html" en modo escritura, o muestra un mensaje de error si no se puede abrir
    //Le paso el nombre del documento por ajax
    $midocumento = fopen("vault/users/isabel/".$_POST['nombredocumento'].".html", "w") or die ("No se ha podido abrir el archivo");
    // Obtiene los datos enviados a través de una solicitud POST, los descodifica y los almacena en la variable $contenido
    $contenido = $_POST['datos'];
    // Escribe el contenido de $txt en el archivo "documento.html" en formato html
    fwrite($midocumento, $contenido);
    // Cierra el archivo "documento.html" después de escribir en él
    fclose($midocumento);

?>