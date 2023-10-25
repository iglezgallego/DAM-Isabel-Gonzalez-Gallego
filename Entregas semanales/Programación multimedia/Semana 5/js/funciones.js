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
    
        //vuelvo a crear tantos personajes NPC como elementos del array tenga
        for(var i =0;i<numeropersonajes;i++){
        arraypersonajes[i] = new Personaje;
        }
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
        for(var i =0;i<numeropersonajes;i++){
        arraypersonajes[i] = new Personaje;
        }
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
        //si el pixel que encuentras es opaco
        if(ca == 255){
            
           //dibuja el bloque9 donde encuentra esos pixeles negros teniendo en cuenta el desfase
            contextofondo.drawImage(bloque9,isox(x*anchurabloque,y*anchurabloque)+desfasex,isoy(x*anchurabloque,y*anchurabloque)+desfasey,anchuradibujo,anchuradibujo);
        }
    }
}
    
