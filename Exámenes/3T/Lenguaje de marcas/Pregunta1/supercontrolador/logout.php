<?php
//elimino session y redirijo a index.html
    session_start();
    session_destroy();
    
    header('Location:index.html');

?>