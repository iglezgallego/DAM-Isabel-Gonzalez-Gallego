//FUNCION DE BUCLE - cargamos todo lo que se va a ir repetiendo durante el juego
function bucle(){
    //borra el lienzo anterior para que no se forme un rastro
    contexto.clearRect(0,0,anchuranavegador,alturanavegador);
    
    ////////////////DIBUJAR LOS PERSONAJES NPC///////////////////////////
    //iteramos en todo los elementos del array 
    for(var i =0;i<numeropersonajes;i++){
    //ejecutamos el metodo mueve a todos los personajes NPC uno a uno
    arraypersonajes[i].mueve();        
    //Atrapa los 4 ángulos(y) diferentes del sprite
    var ytemp;
    if(arraypersonajes[i].direccionisometrica == 0){ytemp = 0;}
    if(arraypersonajes[i].direccionisometrica == 1){ytemp = 512;}
    if(arraypersonajes[i].direccionisometrica == 2){ytemp = 1024;}
    if(arraypersonajes[i].direccionisometrica == 3){ytemp = 1536;}
        
    //Dibujamos a cada uno de los personajes NPC
    //con drawImage tiene imagen, x, y  opcional anchura y altura de la imagen
    contexto.drawImage(
        imagennpc1,
        // 4 parametros source x - es la animacion del personaje
        arraypersonajes[i].estadoanim*256,
        ytemp+256,
        256,
        256,
        // 4 parámetros destination y - es el angulo del personaje
        isox(arraypersonajes[i].x, arraypersonajes[i].y),
        isoy(arraypersonajes[i].x, arraypersonajes[i].y),
        128,
        128
    );
        
    //dibuja la barra de la vida encima de cada personaje NPC
    contexto.fillStyle = "black";
    contexto.fillRect(
        isox(arraypersonajes[i].x,arraypersonajes[i].y)+32,
        isoy(arraypersonajes[i].x,arraypersonajes[i].y),
        64,10
        )
    //dibujar la vida de color verde dentro de la barra negra de vida
    contexto.fillStyle = "green"
    contexto.fillRect(
        isox(arraypersonajes[i].x,arraypersonajes[i].y)+32+2,
        isoy(arraypersonajes[i].x,arraypersonajes[i].y+2),
        60*(arraypersonajes[i].energia/100)
        ,6
        )
    }
    ///////////////////DIBUJAR EL PERSONAJE PROTAGONISTA/////////////////////////
    estadoanimacion++;
    if(estadoanimacion > 7){
       estadoanimacion = 0;
    }
    contexto.drawImage(
        imagenpersonaje,
        // 4 parametros source x - es la animacion del personaje
        estadoanimacion*256,
        angulo+256,
        256,
        256,
        // 4 parámetros destination y - es el angulo del personaje
        isox(posx,posy),
        isoy(posx,posy),
        128,
        128
    );
    
    //Condiciones para los controles del movimiento y que el personaje se mueva de forma fluida
    if (direccion == 1){
        posy -= velocidad; angulo = 512;} 
    if (direccion == 2){
        posy += velocidad; angulo = 1536;} 
    if (direccion == 3){
        posx -= velocidad; angulo = 0;} 
    if (direccion == 4){
        posx += velocidad; angulo = 1024;} 
    
    
    //borramos el anterior temporizador
    clearTimeout(temporizador);
    //llamamos a un nuevo temporizador para volver a ejecutar el bucle. fotogramas por minuto
    temporizador = setTimeout("bucle()",43);
}