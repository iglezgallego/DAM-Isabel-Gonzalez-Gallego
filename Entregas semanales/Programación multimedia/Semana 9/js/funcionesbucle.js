function colisionpersonajeterreno(){
    //Colicision del personaje principal con el terreno - el persaje se cae
    var pixelpersonaje = contextomapa.getImageData(Math.round(posx/50)+1,Math.round(posy/50)+1,1,1)
    for(var i = 0; i<pixelpersonaje.data.length; i+=4){
        //componente rojo
        var cr = pixelpersonaje.data[i];
        //componente verde
        var cg = pixelpersonaje.data[i+1];
        //componente azul
        var cb = pixelpersonaje.data[i+2];
        //componente transparencia-alfa
        var ca = pixelpersonaje.data[i+3];
        //la posición z 
        posz = cr*alturabloquez;
        //si el pixel que encuentras no es opaco
        if(ca == 0){
            //en ese caso 
            console.log("te has caido")
            //aumento la velocidad de la caída
            velocidadz *= 1.3;
            //aumento la posción posz multiplicando la velocidad
            posz -= velocidadz;
            }
        }
        //si posz es mayor a 800, el personaje se ha caído
        if(posz < -800){
            //vuelve a empezar el juego
            window.location = window.location;
        }
}

function calculodesfase(){
    /*
    //para crear el desfase siga al personaje
    if(isox(posx,posy)+desfasex <= mediopantallax){desfasex+=velocidaddesfase;}else{desfasex-=velocidaddesfase}
    if(isoy(posx,posy)+desfasey <= mediopantallay){desfasey+=velocidaddesfase;}else{desfasey-=velocidaddesfase}
    */
    //creo una variable para establecer el medio de la pantalla
    var mediopantallax = anchuranavegador/2;
    var mediopantallay = alturanavegador/2;
    //para crear el desfase siga al personaje y no vibre
    desfasex = mediopantallax - isox(posx,posy)
    desfasey = mediopantallay - isoy(posx,posy)
}

function pintanpc(){
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

    var ytemp;

    //Atrapa los 4 ángulos(y) diferentes del sprite
    if(arraypersonajes[i].direccionisometrica == 0){ytemp = 0;}
    if(arraypersonajes[i].direccionisometrica == 1){ytemp = 512;}
    if(arraypersonajes[i].direccionisometrica == 2){ytemp = 1024;}
    if(arraypersonajes[i].direccionisometrica == 3){ytemp = 1536;}


    //Dibujamos a cada uno de los personajes NPC
    //Para crear los diferentes personajes de colores NPCs
    if(arraypersonajes[i].color == 0){ 
    }
    else if(arraypersonajes[i].color == 1){

    }
    else if(arraypersonajes[i].color == 2){

    }
    else if(arraypersonajes[i].color == 3){

    }
    else if(arraypersonajes[i].color == 4){

    }
    else if(arraypersonajes[i].color == 5){

    }
    //solo si los personajes estan dentro de lo que vemos en la pantalla
    if(
        isox(arraypersonajes[i].x, arraypersonajes[i].y)+desfasex > -100
        && 
        isox(arraypersonajes[i].x, arraypersonajes[i].y)+desfasex < anchuranavegador
        &&
        isoy(arraypersonajes[i].x, arraypersonajes[i].y)+desfasey > -100
        &&
        isoy(arraypersonajes[i].x, arraypersonajes[i].y)+desfasey < alturanavegador
    ){
        //dibujo al personaje con drawImage. tiene imagen, x, y  opcional anchura y altura de la imagen
        contexto.drawImage(
        imagennpc1,
        // 4 parametros source x - es la animacion del personaje
        arraypersonajes[i].estadoanim*256,
        ytemp+256,
        256,
        256,
        // 4 parámetros destination y - es el angulo del personaje
        isox(arraypersonajes[i].x, arraypersonajes[i].y)+desfasex,
        //en la componente y añadimos la componente z
        isoy(arraypersonajes[i].x, arraypersonajes[i].y)+desfasey-arraypersonajes[i].z*alturabloquez,
        //-arraypersonajes[i].z*alturabloquez,
        128,
        128
        );

        //dibuja la barra de la vida encima de cada personaje NPC
        contexto.fillStyle = "black";
        contexto.fillRect(
            isox(arraypersonajes[i].x,arraypersonajes[i].y)+32+desfasex,
            isoy(arraypersonajes[i].x,arraypersonajes[i].y)+desfasey-arraypersonajes[i].z*alturabloquez,
            //-arraypersonajes[i].z*alturabloquez,
            64,
            10
            )
        //dibujar la vida de color verde dentro de la barra negra de vida
        contexto.fillStyle = "green"
        contexto.fillRect(
            isox(arraypersonajes[i].x,arraypersonajes[i].y)+32+2+desfasex,
            isoy(arraypersonajes[i].x,arraypersonajes[i].y+2)+desfasey-arraypersonajes[i].z*alturabloquez,
            //-arraypersonajes[i].z*alturabloquez,
            60*(arraypersonajes[i].energia/100)
            ,6
            )
        }
    } 
}

function pintarecogibles(){
////////////////DIBUJAR LOS RECOGIBLES///////////////////////////
    for(var i =0;i<numerorecogibles;i++){
        //mido la distancia que hay del personaje a los recogibles
        var a = posx - arrayrecogibles[i].x;
        var b = posy - arrayrecogibles[i].y;
        var distancia = Math.sqrt( a*a + b*b )
        //si el personaje esta cerca del recogible
        if(distancia < 50){
            console.log("Estas cerca del recogible")
            //elimino un elemento de la matriz de recogibles
            arrayrecogibles.splice(i, 1);
            //el sistema reconozca que tengo un elemento menos de la matriz
            numerorecogibles--;
            //sube la energía del personaje
            energia += 20;
        }

        if(arrayrecogibles[i].tipo == 1){
            //dibujo el recogible 1
        contexto.drawImage(
            imagenrecogible1,
            // 4 parámetros destination y - es el angulo del personaje
            isox(arrayrecogibles[i].x, arrayrecogibles[i].y)+desfasex,
            //en la componente y añadimos la componente z
            isoy(arrayrecogibles[i].x, arrayrecogibles[i].y)+desfasey-arrayrecogibles[i].z*alturabloquez,
            //arrayrecogibles[i].z*alturabloquez,
            128,
            128
            );  
        }
        if(arrayrecogibles[i].tipo == 2){
            //dibujo el recogible 2
        contexto.drawImage(
            imagenrecogible2,
            // 4 parámetros destination y - es el angulo del personaje
            isox(arrayrecogibles[i].x, arrayrecogibles[i].y)+desfasex,
            //en la componente y añadimos la componente z
            isoy(arrayrecogibles[i].x, arrayrecogibles[i].y)+desfasey-arrayrecogibles[i].z*alturabloquez,
            //arrayrecogibles[i].z*alturabloquez,
            128,
            128
            );  
        }
        if(arrayrecogibles[i].tipo == 3){
            //dibujo recogible 3
        contexto.drawImage(
            imagenrecogible3,
            // 4 parámetros destination y - es el angulo del personaje
            isox(arrayrecogibles[i].x, arrayrecogibles[i].y)+desfasex,
            //en la componente y añadimos la componente z
            isoy(arrayrecogibles[i].x, arrayrecogibles[i].y)+desfasey-arrayrecogibles[i].z*alturabloquez,
            //arrayrecogibles[i].z*alturabloquez,
            128,
            128
            );  
        }
    }
}

function pintaprops(){
////////////////DIBUJAR LOS PROPS///////////////////////////
    for(var i =0;i<numeroprops;i++){
        
        //dibujo al personaje con drawImage. tiene imagen, x, y  opcional anchura y altura de la imagen
        contexto.drawImage(
            imagenprop1,
            // 4 parámetros destination y - es el angulo del personaje
            isox(arrayprops[i].x, arrayprops[i].y)+desfasex,
            //en la componente y añadimos la componente z
            isoy(arrayprops[i].x, arrayprops[i].y)+desfasey-arrayprops[i].z*alturabloquez,
            //arrayprops[i].z*alturabloquez,
            128,
            128
        );  
    }
}

function pintapersonaje(){
///////////////////DIBUJAR EL PERSONAJE PROTAGONISTA/////////////////////////
    //si saltando es true
    if(saltando == true){
        //
        saltopersonaje += velocidadsaltoz;
        velocidadsaltoz -= 5;
        //si ya ha saltado
        if(saltopersonaje < 0){
            //saltando es igual a 0
            saltando = 0;
        }
    }
    //si es cierto que el personaje se está moviendo
    if(moviendo == true) {
        //el estado animación se mueve
        estadoanimacion++;
    if(estadoanimacion > 7){
       estadoanimacion = 0;}
        //en caso de que el personaje este parado
    }else{
        //el estado animacion es la imagen 3 - aunque ponemos 2 xq cuenta el 0 - donde el personaje está parado
        estadoanimacion = 2;
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
        //en la y dibujo tambien la posz para el efecto de la caida si sale del terreno
        isoy(posx,posy)+desfasey-posz-saltopersonaje,
        128,
        128
    );

    //dibuja la barra de la vida encima del protagonista
    contexto.fillStyle = "black";
    contexto.fillRect(
        isox(posx,posy)+32+desfasex,
        isoy(posx,posy)+desfasey-posz-saltopersonaje,
        64,10
    )
    //dibujar la vida de color verde dentro de la barra negra de vida
    contexto.fillStyle = "green"
    contexto.fillRect(
        isox(posx,posy)+32+2+desfasex,
        isoy(posx,posy+2)+desfasey-posz-saltopersonaje,
        60*(energia/100)
        ,6
    )
}
function colisionprops(){
    //Condiciones para los controles del movimiento y que el personaje no se mueva cuando se encuentre un prop
    if (direccion == 1){
        //miramos los datos x y del mapa de los props en el alfa
        var solido = contextomapaprops.getImageData(Math.floor(posx/50),Math.floor(posy/50),1,1).data[3]
        //si no hay prop
        if (solido == 0){
            //el personaje se puede mover
            posy -= velocidad; angulo = 512;
        }
    }
    if (direccion == 2){
        //miramos los datos x y del mapa de los props en el alfa
        var solido = contextomapaprops.getImageData(Math.floor(posx/50),Math.floor(posy/50),1,1).data[3]
        //si no hay prop
        if (solido == 0){
            posy += velocidad; angulo = 1536;
        }
    }
    if (direccion == 3){
        //miramos los datos x y del mapa de los props en el alfa
        var solido = contextomapaprops.getImageData(Math.floor(posx/50),Math.floor(posy/50),1,1).data[3]
        //si no hay prop
        if (solido == 0){
            posx -= velocidad; angulo = 0;
        }
    }
    if (direccion == 4){
        //miramos los datos x y del mapa de los props en el alfa
        var solido = contextomapaprops.getImageData(Math.floor(posx/50),Math.floor(posy/50),1,1).data[3]
        //si no hay prop
        if (solido == 0){
            posx += velocidad; angulo = 1024;
        } 
    }
}
        
function pintopremio(){
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
}
    
function muere(){
//cuando el personaje se quede sin energía
    if(energia < 0){
        //el juego empieza de nuevo
        $("#pantallainicial").fadeIn("slow")
        reiniciar();
        contexto.clearRect(0,0,anchuranavegador,alturanavegador);
        pausa = true;
    }
}
