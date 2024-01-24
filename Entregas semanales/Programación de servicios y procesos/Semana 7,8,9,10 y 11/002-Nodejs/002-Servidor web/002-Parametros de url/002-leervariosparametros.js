//Cargamos las librerias
var servidor = require('http');
var ruta = require('url');

servidor.createServer(function(req,res){
    res.writeHead(200,{'Content-Type':'text/html'});
    
    var parametros = ruta.parse(req.url,true).query;
    
    //obtener varios parametros de la url
    res.write("Tu nombre es: "+parametros.nombre)
    res.write("<br>")
    res.write("Tus apellidos son: "+parametros.apellidos)
    res.end("")
}).listen(8080)

//Le pasas los parametros por la URL de esta forma localhost:8080/?nombre=Isabel&apellidos=Gonzalez Gallego