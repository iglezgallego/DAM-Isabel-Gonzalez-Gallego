var mongoose = require('mongoose');
// npm install mongoose

//Pongo la coleccion de mongodb a la que me quiero conectar
const conexion = 'mongodb://127.0.0.1/contacto'

//Preparo un esquema para indicar que es lo que le voy a pedir a la bbdd, el modelo de datos que tiene nuestra bbdd
const formularioSchema = new mongoose.Schema({
    nombre:String,
    asunto:String,
    mensaje:String,
    fecha:String
})

const Formulario = mongoose.model("Formulario",formularioSchema)

//Me conecto a la conexión
mongoose.connect(conexion,{useNewUrlParser:true,useUnifiedTopology:true}).then(function(){
    console.log("conectado a mongo")
    //Hacemos la petición para encontrar elementos
    Formulario.find({})
    //ejecuta
        .exec()
    //y luego saca los datos de la coleccion por pantalla
        .then(function(formularios){
            console.log(formularios)
        })
})