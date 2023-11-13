//FUNCION DE BUCLE - cargamos todo lo que se va a ir repetiendo durante el juego
function bucle(){
    //borra el lienzo anterior para que no se forme un rastro
    contexto.clearRect(0,0,anchuranavegador,alturanavegador);
    //borro el lienzo anterior de contextopunto 
    contextopunto.clearRect(0,0,512,512);
    //pinta el punto rojo que representa el personaje
    contextopunto.fillRect(posx/50,posy/50,5,5)
    
    //función para que dibuje el terreno cada vez en el bucle
    dibujaterreno();
    //función para que el personaje colisione con el terreno
    colisionpersonajeterreno();
    //función para calcular el desfase
    calculodesfase();
    
    //funcion para pintar el npc
    pintanpc();
    //funcion para pintar los recogibles
    pintarecogibles();
    //funcion para pintar los props
    pintaprops();
    //función para pintar el personaje principal
    pintapersonaje();
    
    //funcion de colision con los props
    colisionprops();
    //funcion para pintar el premio
    pintopremio();
    //funcion para que el personaje pueda morir
    muere();
    
    //borramos el anterior temporizador
    clearTimeout(temporizador);
    //si pausa es igual a false ejecuta el bucle
    if(pausa == false){
        //llamamos a un nuevo temporizador para volver a ejecutar el bucle. fotogramas por minuto
        temporizador = setTimeout("bucle()",33);
    }
}