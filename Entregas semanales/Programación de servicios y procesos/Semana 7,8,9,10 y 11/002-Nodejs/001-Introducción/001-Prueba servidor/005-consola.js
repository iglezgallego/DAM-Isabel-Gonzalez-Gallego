var servidor = require('http');

servidor.createServer(function(req,res){
    res.writeHead(200,{'Content-Type':'text/html'});
    res.end("Hola mundo desde Node.js");
    //Al cargar la web, sale este mensaje en el terminal
    console.log("Alguien ha cargado la web")
    //Cojo el puerto 8080 (localhost:8080)
}).listen(8080)
