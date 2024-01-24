//Para conectarme a la bbdd
var mysql = require('mysql')
// npm install mysql

var conexion = mysql.createConnection({
    host:"localhost",
    user:"nodejs",
    password:"nodejs",
    //seleccio la base de datos
    database:"nodejs"
});

conexion.connect(function(err){
    if(err) throw err;
    console.log("conectado")
    //Hago la petición para crear la tabla con sus campos correspondientes
    conexion.query(`
        CREATE TABLE entradas 
        ( 
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(255),
            texto TEXT,
            fecha VARCHAR(255)
        )
    `,function(err,result){
        if(err) throw err;
        //si no hay error saca el siguiente mensaje
        console.log("Se ha creado la tabla")
    })
})