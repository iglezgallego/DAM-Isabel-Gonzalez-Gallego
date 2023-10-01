//FUNCION DE INICIALIZACION cargamos todas las condiciones iniciales del juego
function inicio(){
    //Para crear los 100 personajes al inicio del juego. Creo una instancia del objeto o personaje para cada uno de los elementos del array
    for(var i =0;i<numeropersonajes;i++){
        arraypersonajes[i] = new Personaje;
}
    //Lanzo la ejecución del bucle en un tiempo, en este caso 1000 milisegundos
    temporizador = setTimeout("bucle()",1000);
    
    //Para los controles de movimiento y que el personaje protagonista vaya más fluido
    //cuando pulse una tecla sobre el documento
    $(document).keydown(function(e){
        if(e.key == "w"){direccion = 1;}
        if(e.key == "s"){direccion = 2;}
        if(e.key == "a"){direccion = 3;}
        if(e.key == "d"){direccion = 4;}
    })
    //cuando la tecla no esté pulsada
    $(document).keyup(function(e){
        if(e.key == "w"){direccion = 0;}
        if(e.key == "s"){direccion = 0;}
        if(e.key == "a"){direccion = 0;}
        if(e.key == "d"){direccion = 0;}
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
}


