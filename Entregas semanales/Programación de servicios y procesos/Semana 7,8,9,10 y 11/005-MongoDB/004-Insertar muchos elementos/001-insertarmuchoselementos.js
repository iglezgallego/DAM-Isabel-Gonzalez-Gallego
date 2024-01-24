//Para insertar varios documentos de forma simultánea. Creo un array con varios json dentro
db.formularios.insertMany([
    {
    nombre:"Isabel",
    asunto:"Este es el segundo correo",
    mensaje:"Este es el cuerpo del mensaje",
    fecha:"2024-01-20"
},
    {
    nombre:"Isabel",
    asunto:"Este es el tercer correo",
    mensaje:"Este es el cuerpo del mensaje",
    fecha:"2024-01-20"
},
    {
    nombre:"Isabel",
    asunto:"Este es el cuarto correo",
    mensaje:"Este es el cuerpo del mensaje",
    fecha:"2024-01-20"
}
]);