//Importa los módulos necesarios para crear un servidor HTTP, manejar rutas de URL, procesar parámetros y realizar operaciones de archivo
var servidor = require('http');
var ruta = require('url');
var procesador = require('querystring');
var archivos = require('fs');

//Crea un arreglo para almacenar mensajes
var mensajes = [];

//Crea un servidor HTTP y establece un manejador de eventos para las solicitudes
servidor.createServer(function(req, res) {
    //Muestra la URL de la solicitud en la consola del servidor
    console.log(req.url);

    //Maneja diferentes rutas de la solicitud
    if (req.url == "/") {
        // Configura la cabecera de la respuesta con el código de estado 200 y el tipo de contenido HTML
        res.writeHead(200, {'Content-Type': 'text/html'});
        console.log("principal");

        //Lee el contenido del archivo 'front.html' y lo envía como respuesta
        archivos.readFile('front.html', function(err, data) {
            if (err) throw err;
            res.end(data);
        });
    } else if (req.url == "/recibe") {
        //Muestra un mensaje en la consola indicando que se está manejando la ruta "/recibe"
        console.log("recibe");

        //Configura la cabecera de la respuesta con el código de estado 200 y el tipo de contenido JSON
        res.writeHead(200, {'Content-Type': 'text/json'});

        //Convierte los mensajes a formato JSON y los envía como respuesta
        res.end(JSON.stringify(mensajes));
    } else if (req.url.includes("/envia")) {
        //Muestra un mensaje en la consola indicando que se está manejando la ruta "/envia"
        console.log("envía");

        //Parsea los parámetros de la URL y muestra el valor del parámetro 'mensaje' en la consola
        var parametros = ruta.parse(req.url, true).query;
        console.log(parametros.mensaje);

        //Obtiene la fecha actual en milisegundos en formato UNIX
        var fechaformateada = Date.now();

        //Agrega en formato JSON el mensaje junto con su fecha al array 'mensajes'
        mensajes.push({
            fecha: fechaformateada,
            mensaje: parametros.mensaje
        });

        //Muestra el array 'mensajes' en la consola
        console.log(mensajes);

        //Finaliza la respuesta con una cadena vacía
        res.end("");
    }
}).listen(8080); //El servidor escucha en el puerto 8080