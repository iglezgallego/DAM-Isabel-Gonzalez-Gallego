//Pasar de vista axonometrica a vista isométrica
function isox(x,y){
    return(x-y);
}
function isoy(x,y){
    return((x+y)/2);
}
//FUNCION REINICIAR para cuando el personaje se quede sin vida empezar de cero
function reiniciar(){
    nivel = 1;
    //redeclaro la coleccion de NPCs    
    numeropersonajes = 5;
    arraypersonajes = new Array();

    //Redeclaro propiedades protagonista
    posx = 1000;
    posy = 200;
    estadoanimacion = 0;
    angulo = 0;
    velocidad = 5;
    direccion = 0;
    energia = 100;

    //Redeclaro las condicones del terrreno para los NPC
    terrenox1 = 600;
    terrenoy1 = -200;
    terrenox2 = 1400;
    terrenoy2 = 600;
    
    //redeclaro la pausa
    pausa = false;
    /*
        //vuelvo a crear tantos personajes NPC como elementos del array tenga
        for(var i =0;i<numeropersonajes;i++){
            arraypersonajes[i] = new Personaje;
        }
        */
}

//FUNCION SUBIR DE NIVEL
function subirnivel(){
    
    //activo la pausa
    pausa = true;
    //sube un nivel
    nivel++;
    //muestra el nivel en una pantalla
    $("#dimenivel").html(nivel)
    $("#pantallanivel").fadeIn("slow")
    contexto.clearRect(0,0,anchuranavegador,alturanavegador);
    //En 3 segundo desaparece la pantalla
    setTimeout(function(){
        $("#pantallanivel").fadeOut("slow")
        //desactiva la pausa
        pausa = false;
        //vuelve a ejecutar el bucle
        bucle();
    },3000)
    
    //redeclaro la coleccion de NPCs    
    numeropersonajes += 5;
    arraypersonajes = new Array();

    //Redeclaro propiedades protagonista
    posx = 1000;
    posy = 200;
    estadoanimacion = 0;
    angulo = 0;
    velocidad = 5;
    direccion = 0;
    energia = 100;

    //Redeclaro las condicones del terrreno para los NPC
    terrenox1 = 600;
    terrenoy1 = -200;
    terrenox2 = 1400;
    terrenoy2 = 600;
    
    //redeclaro la pausa
    //pausa = false;
    
    
        //vuelvo a crear tantos personajes NPC como elementos del array tenga
    /*
        for(var i =0;i<numeropersonajes;i++){
        arraypersonajes[i] = new Personaje;
        }
        */
    //Para que el premio cambie de sitio al subir de nivel
    premiox = Math.random()*(terrenox2-terrenox1)+terrenox1;
    premioy = Math.random()*(terrenoy2-terrenoy1)+terrenoy1;

} 

//el mapa que dibujemos se convierte en un terreno en isometrico
function dibujaterreno(){
    contextofondo.clearRect(0,0,anchuranavegador, alturanavegador)
    var anchurabloque = 50;
    var anchuradibujo = 120;
    //dibuja el mapa
    contextomapa.drawImage(mapa,0,0);
    //que me de los datos de los pixeles que hay en ese mapa
    var pixeles = contextomapa.getImageData(0,0,512,512);
    //vamos recorriendo la imagen en bloques de 4, ya que cada 4 datos equivale un pixel
    for(var i = 0; i<pixeles.data.length; i+=4){
        //componente rojo
        var cr = pixeles.data[i];
        //componente verde
        var cg = pixeles.data[i+1];
        //componente azul
        var cb = pixeles.data[i+2];
        //componente transparencia-alfa
        var ca = pixeles.data[i+3];
        //variables para saber la posicion de cada pixel
        var x = (((i)%(512))/4);
        var y = Math.floor((i/512)/4);
        //si el pixel que encuentras es opaco, es decir, el componente alfa está en 255
        if(ca == 255){
            //condicion para que solo se pinte el terreno que se esta mostrando en la pantalla ese momento
            if(
                isox(x*anchurabloque,y*anchurabloque)+desfasex > -100
                && 
                isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador
                &&
                desfasex,isoy(x*anchurabloque,y*anchurabloque)+desfasey > -100
                &&
                desfasex,isoy(x*anchurabloque,y*anchurabloque)+desfasey < alturanavegador
            ){
                //en ese caso, dibuja los componentes del terreno donde encuentre esos pixeles teniendo en cuenta el desfase
                var array = contextomapacolores.getImageData(x,y,1,1).data
                
                //si el componente RGB es 42,42,42 es asfalto
                if(array[0] == 42 && array[1] == 42 && array[2] == 42 ){
                   contextofondo.drawImage(
                       bloqueasfalto,
                       isox(x*anchurabloque,y*anchurabloque)+desfasex,
                       isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez,
                       anchuradibujo,
                       anchuradibujo
                    );
               }
                //si el componente RGB es 67,66,66 es bloqueacera
                if(array[0] == 67 && array[1] == 66 && array[2] == 66 ){
                   contextofondo.drawImage(
                       bloqueacera,
                       isox(x*anchurabloque,y*anchurabloque)+desfasex,
                       isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez,
                       anchuradibujo,
                       anchuradibujo
                    );
               }
                //si el componente RGB es 90,90,90 es bloquepavimento
                if(array[0] == 90 && array[1] == 90 && array[2] == 90 ){
                   contextofondo.drawImage(
                       bloquepavimento,
                       isox(x*anchurabloque,y*anchurabloque)+desfasex,
                       isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez,
                       anchuradibujo,
                       anchuradibujo
                    );
               }
                //si el componente RGB es 138,138,138 es bloquepavimentocasa
                if(array[0] == 138 && array[1] == 138 && array[2] == 138 ){
                   contextofondo.drawImage(
                       bloquepavimentocasa,
                       isox(x*anchurabloque,y*anchurabloque)+desfasex,
                       isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez,
                       anchuradibujo,
                       anchuradibujo
                    );
               }
                //si el componente RGB es 65,96,54 es bloquejardin
                if(array[0] == 65 && array[1] == 96 && array[2] == 54 ){
                   contextofondo.drawImage(
                       bloquejardin,
                       isox(x*anchurabloque,y*anchurabloque)+desfasex,
                       isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez,
                       anchuradibujo,
                       anchuradibujo
                    );
               }
                //si el componente RGB es 111,133,104 es bloquevallajardin
               if(array[0] == 111 && array[1] == 133  && array[2] == 104 ){
                   contextofondo.drawImage(
                       bloquevallajardin,
                       isox(x*anchurabloque,y*anchurabloque)+desfasex,
                       isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez,
                       anchuradibujo,
                       anchuradibujo
                    );
               }
                //pintar los elementos arquitectonicos
                
                var centro = contextomapaarquitectura.getImageData(x,y,1,1).data
                var arriba = contextomapaarquitectura.getImageData(x,y-1,1,1).data
                var abajo = contextomapaarquitectura.getImageData(x,y+1,1,1).data
                var derecha = contextomapaarquitectura.getImageData(x+1,y,1,1).data
                var izquierda = contextomapaarquitectura.getImageData(x-1,y,1,1).data
                
                // BLOQUE EN X //
                   
               if(centro[3] == 255){
                   if(arriba[3] == 255 && abajo[3] == 255 && izquierda[3] == 255 && derecha[3] == 255){
                       //Para que solo dibuje lo del centro o lo de la periferia
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                       contextofondo.drawImage(
                           bloquearquitecturaxa,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                        );
                           }else{
                               contextofondo.drawImage(
                               bloquearquitecturax,
                               isox(x*anchurabloque,y*anchurabloque)+desfasex,
                               isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                               anchuradibujo,
                               anchuradibujo*3
                            );
                               
                           }
                   }
                   
                   //BLOQUES SIMPLES //
                   
                   if(arriba[3] == 255 && abajo[3] == 255 && izquierda[3] == 0 && derecha[3] == 0 ){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                       contextofondo.drawImage(
                           bloquearquitecturasimple1a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                               contextofondo.drawImage(
                               bloquearquitecturasimple1,
                               isox(x*anchurabloque,y*anchurabloque)+desfasex,
                               isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                               anchuradibujo,
                               anchuradibujo*3
                                );
                           }
                   }
                   if(arriba[3] == 0 && abajo[3] == 0 && izquierda[3] == 255 && derecha[3] == 255 ){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitecturasimple2a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                       }else{
                            contextofondo.drawImage(
                           bloquearquitecturasimple2,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                       }
                   }
                   
                   // PUERTA //
                   if(centro[0] == 255 && centro[1] == 0 && centro[2] == 0){
                       
                   }
                   
                   
                   // VENTANAS //
                   
                   if(arriba[3] == 255 && abajo[3] == 255 && izquierda[3] == 0 && derecha[3] == 0 && centro[0] == 0 && centro[1] == 255 && centro[2] == 0){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitecturaventana1a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturaventana1,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 0 && abajo[3] == 0 && izquierda[3] == 255 && derecha[3] == 255 && centro[0] == 0 && centro[1] == 255 && centro[2] == 0){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                       contextofondo.drawImage(
                           bloquearquitecturaventana2a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturaventana2,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 0 && abajo[3] == 0 && izquierda[3] == 255 && derecha[3] == 255){
                        if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                       contextofondo.drawImage(
                           bloquearquitecturasimple2a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturasimple2,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   
                   // T //
                   
                   if(arriba[3] == 255 && abajo[3] == 255 && izquierda[3] == 255 && derecha[3] == 0){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitecturat4a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturat4,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 255 && abajo[3] == 0 && izquierda[3] == 255 && derecha[3] == 255){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                       contextofondo.drawImage(
                           bloquearquitecturat3a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturat3,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 0 && abajo[3] == 255 && izquierda[3] == 255 && derecha[3] == 255){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitecturat1a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturat1,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 255 && abajo[3] == 255 && izquierda[3] == 0 && derecha[3] == 255){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitecturat2a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitecturat2,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   
                   // L //
                   
                   if(arriba[3] == 255 && abajo[3] == 0 && izquierda[3] == 255 && derecha[3] == 0){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                       contextofondo.drawImage(
                           bloquearquitectural4a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitectural4,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 255 && abajo[3] == 0 && izquierda[3] == 0 && derecha[3] == 255){
                        if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitectural3a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitectural3,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 0 && abajo[3] == 255 && izquierda[3] == 255 && derecha[3] == 0){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitectural1a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitectural1,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   if(arriba[3] == 0 && abajo[3] == 255 && izquierda[3] == 0 && derecha[3] == 255){
                       if(
                        (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                            ||
                           isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75) 
                        &&
                            (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 < alturanavegador*0.25
                            ||
                            isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300 > alturanavegador*0.75)
                        ){
                       
                            contextofondo.drawImage(
                           bloquearquitectural2a,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }else{
                            contextofondo.drawImage(
                           bloquearquitectural2,
                           isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                            );
                           }
                   }
                   
                   
               }
                // TECHO //
                
                var techo = contextomapatechos.getImageData(x,y,1,1).data
                //si la componente blue es 255
               if(techo[3] == 255){
                   //en ese caso dibuja el techo
                    if(
                         (isox(x*anchurabloque,y*anchurabloque)+desfasex < anchuranavegador*0.25
                           ||
                        isox(x*anchurabloque,y*anchurabloque)+desfasex > anchuranavegador*0.75)
                        &&
                           (isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez+400 < alturanavegador * 0.25
                           || 
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez+400 > alturanavegador * 0.75)
                       ){
                   contextofondo.drawImage(
                           bloquetecho,
                          isox(x*anchurabloque,y*anchurabloque)+desfasex,
                           isoy(x*anchurabloque,y*anchurabloque)+desfasey-pixeles.data[i]*alturabloquez-300,
                           anchuradibujo,
                           anchuradibujo*3
                        ); 
                    }
               }
                    
            }
        }
    }
}
    
function posinicialjugador(){
    contextomapapersonajes.drawImage(mapapersonajes,0,0)
    //creamos la variable pixeles con los del mapa
    var pixeles = contextomapapersonajes.getImageData(0,0,512,512);
    //vamos recorriendo la imagen en bloques de 4, ya que cada 4 datos equivale un pixel
    for(var i = 0; i<pixeles.data.length; i+=4){
        //componente rojo
        var cr = pixeles.data[i];
        //componente verde
        var cg = pixeles.data[i+1];
        //componente azul
        var cb = pixeles.data[i+2];
        //componente transparencia-alfa
        var ca = pixeles.data[i+3];
        //variables para saber la posicion de cada pixel
        var x = (((i)%(512))/4);
        var y = Math.floor((i/512)/4);
        //si el pixel que encuentras es opaco
        if(ca == 255){
            //y si el pixel que encuentras es verde
            if(cr == 0 && cg == 255 && cb == 0 && ca == 255){
                posx = x*50;
                posy = y*50;
                console.log("he encontrado al jugador");
            }
           
        }
    }
    
}

function creaenemigos(){
    //creamos la variable pixeles con los del mapa
    var pixeles = contextomapapersonajes.getImageData(0,0,512,512);
    //vamos recorriendo la imagen en bloques de 4, ya que cada 4 datos equivale un pixel
    for(var i = 0; i<pixeles.data.length; i+=4){
        //componente rojo
        var cr = pixeles.data[i];
        //componente verde
        var cg = pixeles.data[i+1];
        //componente azul
        var cb = pixeles.data[i+2];
        //componente transparencia-alfa
        var ca = pixeles.data[i+3];
        //variables para saber la posicion de cada pixel
        var x = (((i)%(512))/4);
        var y = Math.floor((i/512)/4);
        //si el pixel que encuentras es opaco
        if(ca == 255){
            //y si el pixel que encuentras es verde
            if(cr == 255 && cg == 0 && cb == 0 && ca == 255){
                //creo tantos personajes como numeropersonajes existan
                arraypersonajes[numeropersonajes] = new Personaje;
                //Posiciones de los personajes
                arraypersonajes[numeropersonajes].x = x*50;
                arraypersonajes[numeropersonajes].y = y*50;
                //arraypersonajes[numeropersonajes].z = 0
                console.log("La del z del personaje es: "+arraypersonajes[numeropersonajes].z)
                //Aumenta el numero de personajes
                numeropersonajes++;
            }
           
        }
    }
    
}

function creaprops(){
    contextomapaprops.drawImage(mapaprops,0,0)
    //creamos la variable pixeles con los del mapa
    var pixeles = contextomapaprops.getImageData(0,0,512,512);
    //vamos recorriendo la imagen en bloques de 4, ya que cada 4 datos equivale un pixel
    for(var i = 0; i<pixeles.data.length; i+=4){
        //componente rojo
        var cr = pixeles.data[i];
        //componente verde
        var cg = pixeles.data[i+1];
        //componente azul
        var cb = pixeles.data[i+2];
        //componente transparencia-alfa
        var ca = pixeles.data[i+3];
        //variables para saber la posicion de cada pixel
        var x = (((i)%(512))/4);
        var y = Math.floor((i/512)/4);
        //si el pixel que encuentras es opaco
        if(ca == 255){
            //y si el pixel que encuentras es verde
            if(cr == 255 && ca == 255){
                console.log("creo un prop")
                //creo tantos personajes como numeropersonajes existan
                arrayprops[numeroprops] = new Props;
                //Posiciones de los personajes
                arrayprops[numeroprops].x = x*50-50;
                arrayprops[numeroprops].y = y*50-50;
                arrayprops[numeroprops].z = contextomapa.getImageData(x,y,1,1).data[0];
                //Aumenta el numero de personajes
                numeroprops++;
            }
           
        }
    }
    
}

function crearecogibles(){
    contextomaparecogibles.drawImage(maparecogibles,0,0)
    //creamos la variable pixeles con los del mapa
    var pixeles = contextomaparecogibles.getImageData(0,0,512,512);
    //vamos recorriendo la imagen en bloques de 4, ya que cada 4 datos equivale un pixel
    for(var i = 0; i<pixeles.data.length; i+=4){
        //componente rojo
        var cr = pixeles.data[i];
        //componente verde
        var cg = pixeles.data[i+1];
        //componente azul
        var cb = pixeles.data[i+2];
        //componente transparencia-alfa
        var ca = pixeles.data[i+3];
        //variables para saber la posicion de cada pixel
        var x = (((i)%(512))/4);
        var y = Math.floor((i/512)/4);
        //si el pixel que encuentras es opaco
        if(ca == 255){
            //y si el pixel que encuentras es rojo
            if(cr == 255 && ca == 255){
                console.log("creo un recogible")
                //creo tantos recogibles como numerorecogibles existan
                arrayrecogibles[numerorecogibles] = new Recogibles;
                //Posiciones
                arrayrecogibles[numerorecogibles].x = x*50-50;
                arrayrecogibles[numerorecogibles].y = y*50-50;
                arrayrecogibles[numerorecogibles].z = contextomapa.getImageData(x,y,1,1).data[0];
                //Aumenta el numero de recogibles
                numerorecogibles++;
            }
           
        }
    }
    
}

function creaobjetivo(){
    //creamos la variable pixeles con los del mapa
    var pixeles = contextomapapersonajes.getImageData(0,0,512,512);
    //vamos recorriendo la imagen en bloques de 4, ya que cada 4 datos equivale un pixel
    for(var i = 0; i<pixeles.data.length; i+=4){
        //componente rojo
        var cr = pixeles.data[i];
        //componente verde
        var cg = pixeles.data[i+1];
        //componente azul
        var cb = pixeles.data[i+2];
        //componente transparencia-alfa
        var ca = pixeles.data[i+3];
        //variables para saber la posicion de cada pixel
        var x = (((i)%(512))/4);
        var y = Math.floor((i/512)/4);
        //si el pixel que encuentras es opaco
        if(ca == 255){
            //y si el pixel que encuentras es verde
            if(cr == 0 && cg == 0 && cb == 255 && ca == 255){
                premiox = x*50;
                premioy = y*50;
                
            }
           
        }
    }
    
}