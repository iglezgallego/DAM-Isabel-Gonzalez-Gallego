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
    
