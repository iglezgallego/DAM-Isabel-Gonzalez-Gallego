var id;
var otros;
//recibe el id de cada trabajador
onmessage = function(datos){
    id = datos.data.id;
    //recibe la posicion de los otros personajes
    otros = datos.data.otros
    //console.log(otros)
}

var temporizador;
inicio();

//el worker se encarga de las posiciones y no el archivo principal
//posicion aleatoria teniendo en cuenta que la dimension del proyecto es 512
var posx = Math.random()*512;
var posy = Math.random()*512;
//defino los colores rojo verde y azul
var cr = Math.round(Math.random()*256);
var cg = Math.round(Math.random()*256);
var cb = Math.round(Math.random()*256);
//defino el tamaño
var tam = 2
//defino la direccion 
var direccion = Math.random()*Math.PI*2
//defino la velocidad
var velocidad = Math.random()/2

function inicio(){
    temporizador = setTimeout("bucle()",1000)
}
function colisionabordes(){
    if(posx<0 || posx>512 || posy<0 || posy>512){
        //da la vuelta de 180 grados
        direccion += Math.PI; 
        
    }
}
//defino funcion para moverse
function mueve(){
    //nueva x y aleatorias
    posx += Math.cos(direccion)*velocidad
    posy += Math.sin(direccion)*velocidad
}
//defino función cambiar de direccion
function cambiadireccion(){
    //cambia de direccion aleatoriamente
    direccion += (Math.random()-0.5)/4
    //para que vayan más rapido cuando cambian de direccion
    posx += Math.cos(direccion)*velocidad*3
    posy += Math.sin(direccion)*velocidad*3
}
//defino funcion para que los personajes se eviten entre si
function evitarse(){
    for(var i = 0;i<otros.length;i++){
        //las posiciones x
        var a = posx - otros[i].x;
        //las posiciones y
        var b = posy - otros[i].y;
        //la distancia
        var distancia = Math.sqrt(a*a + b*b);
        //si la distancia a otro es pequeña o no soy yo mismo
        if(distancia < 20 && otros.id != id && distancia > 4){
            //dar la vuelta
            direccion += Math.PI
            //aumenta el tamaño
            tam = 5
            
        }
    }
}

//cada uno de los workers dice estoy en el bucle
function bucle(){
    //tamaño es igual a 2
    tam = 2;
    //llamo a las funciones para que se ejecute en el bucle
    colisionabordes();
    cambiadireccion();
    mueve();
    evitarse();
    //envía la información
    postMessage({id:id,x:posx,y:posy,mir:cr,mig:cg,mib:cb,tam:tam})
    //limpio el temporizador
    clearTimeout(temporizador)
    //ejecuta un nuevo temporizador
    temporizador = setTimeout("bucle()",33)
}