//FUNCION DE BUCLE - cargamos todo lo que se va a ir repetiendo durante el juego
function bucle(){
    //borra el lienzo anterior para que no se forme un rastro
    contexto.clearRect(0,0,anchuranavegador,alturanavegador);
    //borro el lienzo anterior de contextopunto 
    contextopunto.clearRect(0,0,512,512);
    //pinta el punto rojo que representa el personaje
    contextopunto.fillRect(posx/50,posy/50,5,5)
    
    //para que dibuje el terreno cada vez en el bucle
    dibujaterreno();
    
    //creo una variable para establecer el medio de la pantalla
    var mediopantallax = anchuranavegador/2;
    var mediopantallay = alturanavegador/2;
    //para crear el desfase siga al personaje
    if(isox(posx,posy)+desfasex < mediopantallax){desfasex+=velocidaddesfase;}else{desfasex-=velocidaddesfase}
    if(isoy(posx,posy)+desfasey < mediopantallay){desfasey+=velocidaddesfase;}else{desfasey-=velocidaddesfase}
    
    ////////////////DIBUJAR LOS PERSONAJES NPC///////////////////////////
    //iteramos en todo los elementos del array 
    for(var i =0;i<numeropersonajes;i++){
        
    //mido la distancia de cada NPC con el personaje principal
        var a = posx - arraypersonajes[i].x;
        var b = posy - arraypersonajes[i].y;
        var distancia = Math.sqrt( a*a + b*b )
        //si la distancia es menor de 40
        if (distancia < 400){
                //ejecutamos el metodo persigue para los NPC
                arraypersonajes[i].persigue();
            //en caso contrario
            }else{
                //ejecutamos el metodo mueve a todos los personajes NPC uno a uno
                arraypersonajes[i].mueve();
            }
        if(distancia < 20){
            energia--;
        }
     
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
            isox(arraypersonajes[i].x, arraypersonajes[i].y)+desfasex,
            isoy(arraypersonajes[i].x, arraypersonajes[i].y)+desfasey,
            128,
            128
        );

        //dibuja la barra de la vida encima de cada personaje NPC
        contexto.fillStyle = "black";
        contexto.fillRect(
            isox(arraypersonajes[i].x,arraypersonajes[i].y)+32+desfasex,
            isoy(arraypersonajes[i].x,arraypersonajes[i].y)+desfasey,
            64,10
            )
        //dibujar la vida de color verde dentro de la barra negra de vida
        contexto.fillStyle = "green"
        contexto.fillRect(
            isox(arraypersonajes[i].x,arraypersonajes[i].y)+32+2+desfasex,
            isoy(arraypersonajes[i].x,arraypersonajes[i].y+2)+desfasey,
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
            isox(posx,posy)+desfasex,
            isoy(posx,posy)+desfasey,
            128,
            128
        );
        
        //dibuja la barra de la vida encima del protagonista
        contexto.fillStyle = "black";
        contexto.fillRect(
            isox(posx,posy)+32+desfasex,
            isoy(posx,posy)+desfasey,
            64,10
        )
        //dibujar la vida de color verde dentro de la barra negra de vida
        contexto.fillStyle = "green"
        contexto.fillRect(
            isox(posx,posy)+32+2+desfasex,
            isoy(posx,posy+2)+desfasey,
            60*(energia/100)
            ,6
        )

        //Condiciones para los controles del movimiento y que el personaje se mueva de forma fluida
        if (direccion == 1){
            posy -= velocidad; angulo = 512;} 
        if (direccion == 2){
            posy += velocidad; angulo = 1536;} 
        if (direccion == 3){
            posx -= velocidad; angulo = 0;} 
        if (direccion == 4){
            posx += velocidad; angulo = 1024;} 
        
        //Dibuja el premio
        contexto.drawImage(imagenpremio,isox(premiox,premioy)+desfasex,isoy(premiox,premioy)+desfasey);
        a = posx - premiox;
        b = posy - premioy;
        distancia = Math.sqrt( a*a + b*b )
        //si el personaje está cerca del premio
        if(distancia < 70){
            //sube de nivel
            //console.log("premio")
            subirnivel();
        }
    
        
        //cuando el personaje se quede sin energía
        if(energia < 0){
            //el juego empieza de nuevo
            $("#pantallainicial").fadeIn("slow")
            reiniciar();
            contexto.clearRect(0,0,anchuranavegador,alturanavegador);
            pausa = true;
        }

        //borramos el anterior temporizador
        clearTimeout(temporizador);
        //si pausa es igual a false ejecuta el bucle
        if(pausa == false){
            //llamamos a un nuevo temporizador para volver a ejecutar el bucle. fotogramas por minuto
            temporizador = setTimeout("bucle()",33);
        }
}