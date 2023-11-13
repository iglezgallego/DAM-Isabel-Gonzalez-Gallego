//FUNCION DE INICIALIZACION cargamos todas las condiciones iniciales del juego
function inicio(){
    //Para crear los 100 personajes al inicio del juego de forma aleatoria. Creo una instancia del objeto o personaje para cada uno de los elementos del array
    /*for(var i =0;i<numeropersonajes;i++){
        arraypersonajes[i] = new Personaje;
        } */
    
    
    
    //Para los controles de movimiento y que el personaje protagonista vaya más fluido
    //cuando pulse una tecla sobre el documento
    $(document).keydown(function(e){
        if(e.key == "w"){direccion = 1;moviendo = true;}
        if(e.key == "s"){direccion = 2;moviendo = true;}
        if(e.key == "a"){direccion = 3;moviendo = true;}
        if(e.key == "d"){direccion = 4;moviendo = true;}
        //tecla para el salto y decirle que no puede saltar otra vez hasta que haya dejado de darle a la tecla
        if(e.key == "z" && saltando == false){saltando = true;velocidadsaltoz = 30;}
    })
    //cuando la tecla no esté pulsada
    $(document).keyup(function(e){
        if(e.key == "w"){direccion = 0;moviendo = false}
        else if(e.key == "s"){direccion = 0;moviendo = false;}
        else if(e.key == "a"){direccion = 0;moviendo = false;}
        else if(e.key == "d"){direccion = 0;moviendo = false;}
    })
    //volver al menu principal y pausar el juego
    $(document).keydown(function(e){
        //si presiono la tecla de esc
        if(e.keyCode == 27){
            pausa = true;
            //Aparezca la pantalla inicial medio
            $("#pantallainicialmedio").fadeIn("slow");
            //aparezca el juego desenfocado
            $("#contenedor").addClass("difuminado");
            
        }
    })
    
    //Para que las dimensiones del juego se adapten al tamaño de la ventana al reescalarla
    //cuando la ventana cambie de tamaño
    $(window).resize(function(){
        anchuranavegador = window.innerWidth;
        alturanavegador = window.innerHeight;
        document.getElementById("lienzo").height = alturanavegador;
        document.getElementById("lienzo").width = anchuranavegador;
        document.getElementById("fondo").height = alturanavegador;
        document.getElementById("fondo").width = anchuranavegador;
        document.getElementById("contenedor").height = alturanavegador;
        document.getElementById("contenedor").width = anchuranavegador;
    })
    
    //Llamo a la función que sitúa al personaje principal en el inicio del mapa
    posinicialjugador()
    //Llamo a la función que crea a los enemigos en el medio del mapa
    creaenemigos()
    //Llamo a la función que sitúa el premio al final de mapa
    creaobjetivo()
    //Llamo a la función que sitúa el premio al final de mapa
    creaprops()
    //Llamo a la función que sitúa el premio al final de mapa
    crearecogibles()
    
    
    //Lanzo la ejecución del bucle en un tiempo, en este caso 1000 milisegundos
    temporizador = setTimeout("bucle()",1000);
}


