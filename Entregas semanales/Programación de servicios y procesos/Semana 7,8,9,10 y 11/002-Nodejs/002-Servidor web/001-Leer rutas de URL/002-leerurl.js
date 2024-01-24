var servidor = require('http');

servidor.createServer(function(req,res){
    res.writeHead(200,{'Content-Type':'text/html'});
    //Escribo un h1 desde el servidor
    res.write("<h1>Hola mundo desde Node.js</h1>");
    //El ultimo mensaje va a ser req.url
    res.end(req.url);
    console.log("Alguien ha cargado la web")
}).listen(8080)