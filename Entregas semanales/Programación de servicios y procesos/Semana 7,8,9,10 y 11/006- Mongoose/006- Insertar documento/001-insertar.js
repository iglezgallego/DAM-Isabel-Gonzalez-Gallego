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
//Creo el modelo
const Formulario = mongoose.model("Formulario",formularioSchema)

//Aqui indico los datos que voy a insertar
const NuevoFormulario = new Formulario({
    nombre:"Isabel",
    asunto:"Este es un mensaje desde node",
    mensaje:"Este es el cuerpo del mensaje",
    fecha:"2024-01-20"
})
//Me conecto a la conexión
mongoose.connect(conexion,{useNewUrlParser:true,useUnifiedTopology:true}).then(function(){
    console.log("conectado a mongo")
    //Hacemos la petición para insertar un elemento en la bbdd con .save
    NuevoFormulario.save()
        .then(function(){
        //y luego saca este mensaje por pantalla
            console.log("Insertado")
        })
})