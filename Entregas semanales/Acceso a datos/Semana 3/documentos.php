<?php
    //trabajo con sesiones
    session_start();
?>
<html>
    <head>
        <!-- Carga JQuery -->
       <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
        <script>
        //me lea lo que hay en la carpeta de documentos para que aparezca en el archivo principal
            $(document).ready(function(){
                //sobre carpetaactual carga leercarpeta y añadimos el usuario que queremos leer
                $("#carpetaactual").load("leecarpeta.php?user=<?php echo $_SESSION['user'] ?>")
                //cuando haga click sobre item - lo escribo asi porque es un elemento cargado dinamicamente desde ajax
                $(document).on("click",".item",function(){
                    //si filetype es igual a html 
                    if($(this).attr("filetype") == "html"){
                        //llevame a documento/index.php + el nombre del archivo
                        window.location = "documento/index.php?file="+$(this).attr("filename")
                        
                    }
                })
            })
            
        </script>
        <style>
            .item{
                width: 300px;
                height: 300px;
                padding:5px;
                margin:5px;
                border:1px solid grey;
                border-radius:10px;
                float:left;
                position:relative;
                display:table-cell;
                text-align: center;
                vertical-align: middle;
            }
            /* poner el nombre del documento abajo del div item */
            .documentname{
                position:absolute;
                bottom:5px;
                width: 100%;
                left:5px;
            }
            .iconfile, .iconfolder{
                width:100%;
                margin:auto;
            }
            .iconfile img, .iconfolder img{
                width:60%;
                margin:auto;
            }
        </style>
    </head>
    <body>
        <header>
        </header>
        <main>
            <h3>Listado de documentos</h3>
            <div id="carpetaactual">
            </div>
        </main>
        <footer>
        </footer>
    </body>
</html>