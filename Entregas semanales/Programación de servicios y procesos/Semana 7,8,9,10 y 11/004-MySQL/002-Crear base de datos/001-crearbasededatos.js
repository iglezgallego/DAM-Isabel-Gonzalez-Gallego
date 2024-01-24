//Para conectarme a la bbdd
var mysql = require('mysql')
//se requiere instalar: npm install mysql

var conexion = mysql.createConnection({
    host:"localhost",
    user:"nodejs",
    password:"nodejs"
});

conexion.connect(function(err){
    if(err) throw err;
    console.log("conectado")
    
    //Creo la base de datos en la query
    conexion.query('CREATE DATABASE nodejs',function(err,result){
        if(err) throw err;
        console.log("Se ha creado la base de datos")
    })
})