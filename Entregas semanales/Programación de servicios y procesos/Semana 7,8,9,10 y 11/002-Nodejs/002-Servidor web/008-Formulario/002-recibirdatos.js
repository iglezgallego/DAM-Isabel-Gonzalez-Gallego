var servidor = require('http');
var ruta = require('url');

servidor.createServer(function(req,res){
   res.writeHead(200,{'Content-Type':'text/html'})

   switch(req.url){
        case "/":
            res.write(`
                <form action="/procesa" method="POST" enctype="application/x-www-form-urlencoded">
                    <input type="text" name="nombre">
                    <input type="submit">
                </form>
            `)
            break;
           
           //Al enviar el formulario cargamos los datos en el terminal
        case "/procesa":
           let datos = '';
           //req.on es un evento que tiene js en el lado del servidor
           req.on('data',parte=>{
               datos += parte.toString();
           })
           req.on('end',()=>{
               console.log(datos)
           })
            break;
       
    } 
    res.end("")
    
}).listen(8080)