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
})