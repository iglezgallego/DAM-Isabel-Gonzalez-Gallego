var servidor = require('http');
//Tengo cargada la librería para modificar archivos
var archivos = require('fs');
servidor.createServer(function(req,res){
   res.writeHead(200,{'Content-Type':'text/html'})
   
   switch(req.url){
        case "/":
            archivos.readFile('inicio.html',function(err,data){
                res.write(data)
                res.end("")
            });
            break;
        case "/sobremi":
            archivos.readFile('sobremi.html',function(err,data){
                res.write(data)
                res.end("")
            });
            break;
        case "/contacto":
            archivos.readFile('contacto.html',function(err,data){
                res.write(data)
                res.end("")
            });
            break;
        default:
            res.end("Página no encontrada");
    } 
    
    //Cada vez que alguien pida algo en la web que no sea el recurso favicon.ico , ya que no es una URL
    if(req.url != "/favicon.ico"){
        //Entro en el archivo y escribo la URL que han visitado
        archivos.appendFile("registro.txt",req.url+"\n",function(err){
            if(err) throw err;
        })
    }
    
}).listen(8080)