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
    //Hago la petición para eliminar un registro indicando que registro quiero eliminar mediante el id
    conexion.query(`
        DELETE FROM entradas
        WHERE id = 5
    `,function(err,result){
        if(err) throw err;
        //si no hay error saca el siguiente mensaje
        console.log("Se ha eliminado el registro")
    })
})