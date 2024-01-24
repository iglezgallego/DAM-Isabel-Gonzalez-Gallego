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
    //Hago la petición para seleccionar registros y añado el parámetro fields
    conexion.query(`
        SELECT * FROM entradas
    `,function(err,result,fields){
        if(err) throw err;
        console.log(result)
    })
})