<?php
    //trabajo con sesiones
    session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <!--Cargamos JQUERY desde el CDN -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!--Cargamos el archivo css del estilo -->
        <link rel="Stylesheet" href="estilo/estilo.css">
        <!--Cargamos el archivo js -->
        <script src="js/codigo.js"></script>
    </head>
    
    <body>
        <table border=0 width=100% height=100%>
            <tr id="menu" height=20px>
                <td>
                    Menu
                </td>
            </tr>
            <!--Barra para insertar el nombre del documento -->
            <tr id="barranombredocumento" height=20px>
                <td>
                    <!--Para que se quede el nombre del documento cuando lo abra desde index.html -->
                    <input type="text" id="documentname" placeholder="nombre del documento" value='<?php echo explode(".",$_GET['file'])[0] ?>'>
                    
                </td>
            </tr>
            
            <tr id="herramientas" height=50px>
                <td>
                    <!--Botón para guardar la informacion -->
                    <button id="guardar"><img src="../img/bootstrap-icons-1.11.1/save.svg" class="icon"></button>
                    <!--Opciones de encabezado -->
                    <select id="tipotexto">
                        <option value="p">Texto de párrafo</option>
                        <option value="h1">Encabezado 1</option>
                        <option value="h2">Encabezado 2</option>
                        <option value="h3">Encabezado 3</option>
                        <option value="h4">Encabezado 4</option>
                        <option value="h5">Encabezado 5</option>
                        <option value="h6">Encabezado 6</option>
                        <option value="pre">Texto preformateado</option>
                    </select>
                    <!--Opciones de fuente -->
                    <select id="selectfont">
                        <option value="Arial">Arial</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Trebuchet MS">Trebuchet MS</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Garamond">Garamond</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Brush Script MT">Brush Script MT</option>
                    </select>
                    <!--Elegir el tamaño de letra -->
                    <input type="number" id="fontsize" value="10">
                    <!--Elegir entre negrita cursiva y subrayado -->
                    <button id="bold"><img src="../img/bootstrap-icons-1.11.1/type-bold.svg" class="icon"></button>
                    <button id="cursive"><img src="../img/bootstrap-icons-1.11.1/type-italic.svg" class="icon"></button>
                    <button id="underline"><img src="../img/bootstrap-icons-1.11.1/type-underline.svg" class="icon"></button>
                    <!--Seleccionar el color de la letra -->
                    <input type="color" id="fontcolor">
                    <!-- Hacer listas ordenadas y no ordenadas -->
                    <button id="orderedlist"><img src="../img/bootstrap-icons-1.11.1/list-ol.svg" class="icon"></button>
                    <button id="unorderedlist"><img src="../img/bootstrap-icons-1.11.1/list-ul.svg" class="icon"></button>
                    <!-- Texto derecha izquierda centrado o justificado -->
                    <button id="alignleft"><img src="../img/bootstrap-icons-1.11.1/text-left.svg" class="icon"></button>
                    <button id="alignright"><img src="../img/bootstrap-icons-1.11.1/text-right.svg" class="icon"></button>
                    <button id="aligncenter"><img src="../img/bootstrap-icons-1.11.1/text-center.svg" class="icon"></button>
                    <button id="alignjustify"><img src="../img/bootstrap-icons-1.11.1/justify-left.svg" class="icon"></button>
                </td>
            </tr>
            <tr>
                <td id = "fondopagina">
                    <!--Con conteneditable podemos editar texto en la pagina dentro de la web -->
                    <div id ="pagina" contenteditable="true">
                         <!-- Paso la ubicacion del archivo file a través de GET para que pueda actualizar los cambios -->
                        <?php include "../vault/users/".$_SESSION['user']."/".$_GET['file'] ?>
                    </div>
                </td>
            </tr>
        
        </table>
    </body>
</html>