//fs de file system, va a ser capaz de leer y escribir archivos
var archivos = require('fs');

//Para escribir dentro de un archivo .txt
archivos.appendFile("nuevo.txt",'Hola, buenos dias',function(err){
    //si tengo un error, lanzalo
    if(err) throw err;
    //si no hay error, que diga que esta bien
    console.log("Archivo escrito correctamente")
})