//Creo una variable llamada servidor
//y uso el modulo http
var servidor = require('http');
//creo una funcion local de Js y creo un request y un response
servidor.createServer(function(req,res){
    //el tipo de contenido que voy a devolver es text/html
    res.writeHead(200,{'Content-Type':'text/html'})
    res.end("Hola mundo desde Node.js")
    //uso el puerto 80 de escucha (lo vemos en localhost)
}).listen(80)

//Ejecuto en consola y luego voy a localhost donde aparece el mensaje