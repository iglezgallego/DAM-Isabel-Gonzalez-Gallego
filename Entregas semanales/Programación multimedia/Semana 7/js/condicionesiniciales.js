//Para coger un elemento del html segun su id y guardarlo en la variable y crear un contexto para trabajar en dos dimensiones
//contexto es una instancia de getContext con sus metodos y sus propiedades
var contexto = document.getElementById("lienzo").getContext("2d");
var contextofondo = document.getElementById("lienzofondo").getContext("2d");
var contextomapa = document.getElementById("lienzomapa").getContext("2d");
var contextomapapersonajes = document.getElementById("lienzomapapersonajes").getContext("2d");
var contextomapaprops = document.getElementById("lienzomapaprops").getContext("2d");
var contextomaparecogibles = document.getElementById("lienzomaparecogibles").getContext("2d");
var contextopunto = document.getElementById("lienzopunto").getContext("2d");
//variable para coger los datos del mapa
var pixelesmapa = contextomapa.getImageData(0,0,512,512);

//digo que el punto que representa el personaje va a ser de color rojo
contextopunto.fillStyle = "red";

// VARIABLES GLOBALES DEL TODO EL PROGRAMA
var temporizador;
//capturo las dimensiones de la pantalla
var anchuranavegador = window.innerWidth;
var alturanavegador = window.innerHeight;
//aplico las dimesiones de la pantalla al lienzo
document.getElementById("lienzo").height = alturanavegador;
document.getElementById("lienzo").width = anchuranavegador;
//aplico las dimensiones de la pantalla al lienzofondo
document.getElementById("lienzofondo").height = alturanavegador;
document.getElementById("lienzofondo").width = anchuranavegador;
//aplico las dimesiones de la pantalla al fondo
document.getElementById("fondo").height = alturanavegador;
document.getElementById("fondo").width = anchuranavegador;
//aplico las dimesiones de la pantalla al contenedor
document.getElementById("contenedor").height = alturanavegador;
document.getElementById("contenedor").width = anchuranavegador;

//CARGAMOS IMAGENES PARA EL VIDEOJUEGO
//variable para coger las imagenes de los personajes npc
var imagennpc = new Image();
var imagennpc1 = new Image();
imagennpc1.src = "img/personajes/gatogris.png";
var imagennpc2 = new Image();
imagennpc2.src = "img/personajes/gatocyan.png";
var imagennpc3 = new Image();
imagennpc3.src = "img/personajes/gatofucsia.png";
var imagennpc4 = new Image();
imagennpc4.src = "img/personajes/gatomorado.png";
var imagennpc5 = new Image();
imagennpc5.src = "img/personajes/gatorojo.png";
var imagennpc6 = new Image();
imagennpc6.src = "img/personajes/gatoverde.png";

//variable para coger la imagen del personaje protagonista
var imagenpersonaje = new Image();
imagenpersonaje.src = "img/personajes/gatoblanco.png";
//variable para coger la imagen del mapa 
var mapa = new Image();
mapa.src = "img/mapas/mapa0.2.png";
//variable para coger la imagen del mapa con los personajes
var mapapersonajes = new Image();
mapapersonajes.src = "img/mapas/mapa0personajes.png";
//variable para coger la imagen del mapa con los recogibles
var maparecogibles = new Image();
maparecogibles.src = "img/mapas/mapa0recogibles.png";
//variable para coger la imagen del mapa con los props
var mapaprops = new Image();
mapaprops.src = "img/mapas/mapa0props.png";
//variable para coger la imagen del terreno
var bloque9 = new Image();
bloque9.src = "img/terreno/terreno9.png";
//variable para coger la imagen del premio
var imagenpremio = new Image();
imagenpremio.src = "img/pez3.png";
//variable para coger la imagen del recogible
var imagenrecogible1 = new Image();
imagenrecogible1.src = "img/recogibles/pocion.png";
//variable para coger la imagen del recogible
var imagenrecogible2 = new Image();
imagenrecogible2.src = "img/recogibles/pocion2.png";
//variable para coger la imagen del recogible
var imagenrecogible3 = new Image();
imagenrecogible3.src = "img/recogibles/pocion3.png";
//variable para coger la imagen del prop
var imagenprop1 = new Image();
imagenprop1.src = "img/props/prop1.png";


//Creo un array para los personajes NPC con sus propiedades y su metodo
var numeropersonajes = 0;
var arraypersonajes = new Array();
//Creo un array para props con sus propiedades y su metodo
var numeroprops = 0;
var arrayprops = new Array();
//Creo un array para props con sus propiedades y su metodo
var numerorecogibles = 0;
var arrayrecogibles = new Array();


//PROPIEDADES PROTAGONISTA
var posx = 1000;
var posy = 200;
//creo un parámetro z para simular la caida del personaje
var posz = 0;
//creo un parámetro para la velocidad de la caída
var velocidadz = 1;
var estadoanimacion = 0;
var angulo = 0;
var velocidad = 5;
var direccion = 0;
var energia = 100;
var moviendo = false;
var saltopersonaje = 0;
var velocidadsaltoz = 0;
var saltando = false;

//CONDICIONES DEL TERRENO - Aqui introducimos las coordenadas min y max del terreno en el cual se van a mover los NPC
var terrenox1 = 500;
var terrenoy1 = -375;
var terrenox2 = 1350;
var terrenoy2 = 400;
//defino las posiciones iniciales del premio
var premiox = 800;
var premioy = 400;
//defino el nivel en el que se empieza
var nivel = 1;
//defino que la pausa al comenzar no está activada
var pausa = false;

//defino las posiciones iniciales del desfase y su velocidad
var desfasex = 420;
var desfasey = 0;

var velocidaddesfase = 3;

var alturabloquez = 1;