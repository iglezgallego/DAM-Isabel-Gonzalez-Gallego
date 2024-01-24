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
    //Hago la petición para actualizar seleccionando el registro que quiero actualizar
    conexion.query(`
        UPDATE entradas
        SET titulo = 'Titulo modificado por nodejs'
        WHERE id = 1
    `,function(err,result){
        if(err) throw err;
        //si no hay error saca el siguiente mensaje
        console.log("Se ha actualizado el registro")
    })
})