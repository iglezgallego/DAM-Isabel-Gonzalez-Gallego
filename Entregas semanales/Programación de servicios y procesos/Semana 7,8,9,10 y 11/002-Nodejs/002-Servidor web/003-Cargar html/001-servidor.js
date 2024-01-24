var servidor = require('http');
//fs de file system, va a ser capaz de leer y escribir archivos
var archivos = require('fs');

servidor.createServer(function(req,res){
   //cuando cargue el archivo html va a ejecutar una función
    archivos.readFile('inicio.html',function(err,data){
        //tendrá una posibilidad de error y datos
        res.writeHead(200,{'Content-Type':'text/html'});
        res.write(data)
        res.end("")
    });
    
    
}).listen(8080)