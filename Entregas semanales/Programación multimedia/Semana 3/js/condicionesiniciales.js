//Para coger un elemento del html segun su id y guardarlo en la variable y crear un contexto para trabajar en dos dimensiones
var contexto = document.getElementById("lienzo").getContext("2d");
//contexto es una instancia de getContext con sus metodos y sus propiedades

// VARIABLES GLOBALES DEL TODO EL PROGRAMA
var temporizador;
//capturo las dimensiones de la pantalla
var anchuranavegador = window.innerWidth;
var alturanavegador = window.innerHeight;
//aplico las dimesiones de la pantalla al lienzo
document.getElementById("lienzo").height = alturanavegador;
document.getElementById("lienzo").width = anchuranavegador;
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

var premiox = 800;
var premioy = 400;

var nivel = 1;

var pausa = false;
