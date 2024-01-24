var servidor = require('http');
var ruta = require('url');
var procesador = require('querystring');
var archivos = require('fs');

var mensajes = []

// Crea un servidor HTTP 
servidor.createServer(function(req,res){
    // Configura la cabecera de la respuesta
   res.writeHead(200,{'Content-Type':'text/html'});
    
    console.log(req.url)
        // Manejar diferentes rutas de la solicitud
       if(req.url == "/"){
           console.log("principal");   
            // Lee el contenido del archivo 'front.html' y lo envía como respuesta
           archivos.readFile('front.html',function(err,data){
               if(err) throw err
                res.end(data)
            });
       }
        else if(req.url == "/recibe"){
           console.log("recibe");
            
            //Envia - atrapa el parámetro de la URL
        }else if(req.url.includes("/envia")){
           console.log("envía");
            //Parsea los parámetros de la URL y muestra el valor del parámetro 'mensaje' en la consola
            var parametros = ruta.parse(req.url,true).query;
            console.log(parametros.mensaje);
            //Obtiene la fecha actual en milisegundos en formato UNIX
            var fechaformateada = Date.now();
            //Agrega en formato json el mensaje junto con su fecha al array
            mensajes.push({
                fecha:fechaformateada
                ,mensaje:parametros.mensaje})
            //Muestra el array 'mensajes' en la consola
            console.log(mensajes)
            //Finaliza la respuesta con una cadena vacía
            res.end("")
        }   
       //res.end("")
}).listen(8080);

//http://localhost:8080/envia?mensaje=hola