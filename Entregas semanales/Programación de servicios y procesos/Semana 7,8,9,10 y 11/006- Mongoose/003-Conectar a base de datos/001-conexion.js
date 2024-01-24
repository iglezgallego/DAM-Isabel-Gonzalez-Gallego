var mongoose = require('mongoose');
// npm install mongoose

//Pongo la coleccion de mongodb a la que me quiero conectar
const conexion = 'mongodb://127.0.0.1/contacto'

//Me conecto a la conexión
mongoose.connect(conexion,{useNewUrlParser:true,useUnifiedTopology:true}).then(function(){
    console.log("conectado a mongo")
})