<?php 
//si no se ha enviado una variable de sesion elementosporpagina en ese caso es 20
if(!isset($_SESSION['elementosporpagina'])){$_SESSION['elementosporpagina']=20;}
//si no se ha definido la variable página, en ese caso es igual a 0
if(!isset($_SESSION['pagina'])){$_SESSION['pagina']=0;}
?>