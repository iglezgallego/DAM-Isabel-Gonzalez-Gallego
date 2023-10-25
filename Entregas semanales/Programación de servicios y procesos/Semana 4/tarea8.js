//cargamos la variables que corresponderá con la info que va a recibir
var id;
var otros;
var comida;

//esta funcion se ejecuta al recibir un mensaje
onmessage = function(datos){
    //recibe el id de cada trabajador
    id = datos.data.id;
    //recibe la posicion de los otros puntos
    otros = datos.data.otros;
    //recibe la posicion de la comida
    comida = datos.data.comida;
}

//varible temporizador para controlar el bucle
var temporizador;
//inicializa la funcion inicio que se ejecuta una vez
inicio();

//el worker se encarga de las posiciones y no el archivo principal
//crea una posicion aleatoria teniendo en cuenta que la dimension del proyecto es 512
var posx = Math.random()*512;
var posy = Math.random()*512;
//defino los colores rojo verde y azul y les digo que sean aleatorios
var cr = Math.round(Math.random()*256);
var cg = Math.round(Math.random()*256);
var cb = Math.round(Math.random()*256);
//defino el tamaño inicial
var tam = 2
//defino la direccion inicial aleataria entre 0 y 360 grados
var direccion = Math.random()*Math.PI*2
//defino la velocidad inicia aleatoria
var velocidad = Math.random()/2+0.3
//defino la variable energia inicial y cada personaje tenga un valor diferente
var energia = Math.random()*50+50;
//defino la variable hambre inicial y cada personaje tenga un valor diferente
var hambre = 100 - Math.random()*50+50;
//defino la variable muerto que será inicialmente falso
var muerto = false;
//defino la variable dormido que será inicialmente falso
var dormido = false;
//defino la variable hambriento que será inicialmente falso
var hambriento = false;

//defino funcion de inicio
function inicio(){
    //que llama al bucle
    temporizador = setTimeout("bucle()",1000)
}

//defino la función 
function colisionabordes(){
    //cuando la pelota colisione con los bordes del lienzo
    if(posx<0 || posx>512 || posy<0 || posy>512){
        //da la vuelta de 180 grados
        direccion += Math.PI; 
    }
}
//defino funcion para gestionar el movimiento del personaje
function mueve(){
    //defino nuevas X e Y aleatorias en base al coseno/seno trigonometrico de la direccion por la velocidad
    posx += Math.cos(direccion)*velocidad
    posy += Math.sin(direccion)*velocidad
    //la energía decrece al moverse
    energia-=0.1;
    //el hambre crece al moverse
    hambre+=0.1;
}
//defino función para que el personaje cambie de direccion
function cambiadireccion(){
    //cambia de direccion aleatoriamente
    direccion += (Math.random()-0.5)/4
    //para que vayan más rapido cuando cambian de direccion
    //posx += Math.cos(direccion)*velocidad*3
    //posy += Math.sin(direccion)*velocidad*3
}
//funcion para que el personaje busque la comida
function buscocomida(){
    //solo se ejecuta si el personaje está hambriento
   if(hambriento == true){
       console.log("tengo hambre")
       //calculo la distancia que hay del personaje a la comida
       for(var i=0; i<comida.length; i++){
           //las posiciones x horizontal
            var a = posx - comida[i].x;
            //las posiciones y vertical
            var b = posy - comida[i].y;
            //obtengo la distancia con esta formula
            var distancia = Math.sqrt(a*a + b*b);
            //si la distancia a la comida es menor a 60, que esté cerca
            if(distancia < 60){
                //que los personajes se acerquen a la comida
                var angleRadians = Math.atan2(comida[i].y - posy, comida[i].x - posx);
                //actualiza la direccion
                direccion = angleRadians;
                //si la distancia es menor que 10, es decir, poca
               if(distancia < 10){
                   //disminuye el hambre, es decir, el personaje esta comiendo
                   hambre=-0.5
            }
            }
       }
   } 
}

//defino funcion para que los personajes se eviten entre si
function evitarse(){
    //miro donde estan cada uno de los otros personajes
    for(var i = 0;i<otros.length;i++){
        //las posiciones x horizontal
        var a = posx - otros[i].x;
        //las posiciones y vertical
        var b = posy - otros[i].y;
        //obtengo la distancia con esta formula
        var distancia = Math.sqrt(a*a + b*b);
        //si la distancia a otro es pequeña Y no soy yo mismo Y no esta hambriento , es decir, el personaje esta cerca
        if(distancia < 5 && otros.id != id && distancia > 3 && hambriento == false){
            //huir hacia otra direccion
            var angleRadians = Math.atan2(posy - comida[i].y, posx - comida[i].x);
            direccion = angleRadians+Math.PI/2
            //actualizo posiciones X e Y con respecto a la nueva direccion
            posx += Math.cos(direccion)*velocidad
            posy += Math.sin(direccion)*velocidad
            //temporalmente aumenta el tamaño para que se sepa que el personaje a colisionado
            tam = 5
            
        }
    }
}
//defino la funcion duerme
function duerme(){
    //incrementa la energía del personaje
    energia+=0.3;
    //y sube el hambre
    hambre+=0.1;
}
//funcion para que el personaje muera
function muerte(){
    //si el personaje tiene mucha hambre
    if(hambre > 100){
        //la variable muerte se pone en verdadero
        muerto = true;
        //cambia a color negro
        cr = 0;
        cg = 0;
        cb = 0;
    }
}
//esta es la función bucle que se repite constantemente para cada uno de los workers
function bucle(){
    //pone un valor minimo 0 a hambre
    if(hambre < 0){hambre = 0}
    //pone un valor maximo 10 de energia
    if(energia > 100){energia = 100}
    
    //si el personaje esta vivo
    if(muerto == false){
        
        //su tamaño en funcion de la energia
        tam = energia/10;
        //llamo a las funciones para que se ejecute en el bucle
        colisionabordes();
        cambiadireccion();
        buscocomida();

        //PARA QUE EL PERSONAJE SE QUEDE SIN ENERGIA Y AL DORMIR LA RECUPERE
        //si la energía es menor que 20
        if(energia < 20){
            //la variable dormido es verdadera
            dormido = true;
        }
        //si dormido es verdadero
        if(dormido == true){
            //el personaje duerme
            duerme();
        }
        //si energia es mayor que 80
        if(energia > 80){
            //la variable dormido es falsa
            dormido = false;
        }
        //si la variable dormido es falsa
        if(dormido == false){
            //el personaje se mueve
             mueve();
        }
        //si hambre es mayor que 80
        if(hambre > 80){
            //el personaje esta hambriento
            hambriento = true;
        }
        //si hambre es menor que 20
        if(hambre < 20){
            //el personaje no esta hambriento
            hambriento = false;
            //vuelve a mover en la direccion
            direccion = Math.random()*Math.PI*2;
        }
        
        //inica la funcion evitarse
        evitarse();
    }
    
    //envía la información del personaje al archivo principal
    postMessage({id:id,x:posx,y:posy,mir:cr,mig:cg,mib:cb,tam:tam})
    //limpia el temporizador anterior
    clearTimeout(temporizador)
    //ejecuta un nuevo temporizador recursivo que se llama a sí mismo para hacer otra vuelta del bucle
    temporizador = setTimeout("bucle()",33)
}