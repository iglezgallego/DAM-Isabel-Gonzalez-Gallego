
<div id="contienearticulos">
    <?php

        $mysqli = new mysqli("localhost", "docs", "docs", "docs");
        $consulta = "SELECT * FROM blog";
        $resultado = $mysqli->query($consulta);
        //lanzo la consulta
        while($fila = $resultado->fetch_assoc()){
            echo '
            <div class="articuloblog">
                <h4>'.$fila['titulo'].'</h4>
                <p>'.$fila['contenido'].'</p>
            </div>
            ';   
        }
    ?>
</div>
<aside>
    Contenido adiccional del blog
</aside>
