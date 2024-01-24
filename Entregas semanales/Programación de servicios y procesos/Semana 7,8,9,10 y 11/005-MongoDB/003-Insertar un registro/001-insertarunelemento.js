//Insertar un documento con sus parámetros
//Node le asigna un id a este documento en forma de hash
db.formularios.insertOne({
    nombre:"Isabel",
    asunto:"Este es el primer correo",
    mensaje:"Este es el cuerpo del mensaje",
    fecha:"2024-01-20"
});