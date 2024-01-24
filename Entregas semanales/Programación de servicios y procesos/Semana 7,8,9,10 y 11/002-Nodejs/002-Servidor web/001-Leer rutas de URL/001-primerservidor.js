var servidor = require('http');
//Es un archivo JS que contiene HTML y no al revés como habíamos visto hasta ahora
servidor.createServer(function(req,res){
    res.writeHead(200,{'Content-Type':'text/html'});
    //Escribo un h1 desde el servidor
    res.end("<h1>Hola mundo desde Node.js</h1>");
    console.log("Alguien ha cargado la web")
}).listen(8080)