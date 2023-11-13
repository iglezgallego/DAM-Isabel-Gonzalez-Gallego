<?php
    
    $cabeceras .= 'From: ysaquepercal@gmail.com' . "\r\n" .
    'Reply-To: ysaquepercal@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $cabeceras .= 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    mail(
        "iglezgallego@gmail.com",
        "Este es el asunto del mensaje",
        "<h1>Título</h1><p>Este es el cuerpo del mensaje</p>",
        $cabeceras
    );
        
?>