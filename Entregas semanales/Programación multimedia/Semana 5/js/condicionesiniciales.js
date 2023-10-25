//Para coger un elemento del html segun su id y guardarlo en la variable y crear un contexto para trabajar en dos dimensiones
var contexto = document.getElementById("lienzo").getContext("2d");
var contextofondo = document.getElementById("lienzofondo").getContext("2d");
var contextomapa = document.getElementById("lienzomapa").getContext("2d");
var contextopunto = document.getElementById("lienzopunto").getContext("2d");
//contexto es una instancia de getContext con sus metodos y sus propiedades

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
//variable para coger la imagen del personaje npc
var imagennpc1 = new Image();
imagennpc1.src = "img/gatogris.png";
//variable para coger la imagen del personaje protagonista
var imagenpersonaje = new Image();
imagenpersonaje.src = "img/gatonaranja.png";
//variable para coger la imagen del mapa
var mapa = new Image();
mapa.src = "img/mapas/mapa0.png";
//variable para coger la imagen del terreno
var bloque9 = new Image();
bloque9.src = "img/terreno/terreno9.png";
//variable para coger la imagen del premio
var imagenpremio = new Image();
imagenpremio.src = "img/pez3.png";

//Creo 100 personajes NPC con sus propiedades y su metodo
var numeropersonajes = 5;
var arraypersonajes = new Array();

//PROPIEDADES PROTAGONISTA
var posx = 1000;
var posy = 200;
var estadoanimacion = 0;
var angulo = 0;
var velocidad = 5;
var direccion = 0;
var energia = 100;

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

var velocidaddesfase = 1;