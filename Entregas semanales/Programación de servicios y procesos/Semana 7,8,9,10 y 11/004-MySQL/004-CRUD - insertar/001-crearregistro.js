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
    //Hago la petición para insertar un registro
    conexion.query(`
        INSERT INTO entradas VALUES(
            NULL,
            'Titulo nuevo de la entrada',
            'Texto nuevo de la entrada',
            '2023-08-25'
        )
    `,function(err,result){
        if(err) throw err;
        //si no hay error saca el siguiente mensaje
        console.log("Se ha insertado el registro")
    })
})