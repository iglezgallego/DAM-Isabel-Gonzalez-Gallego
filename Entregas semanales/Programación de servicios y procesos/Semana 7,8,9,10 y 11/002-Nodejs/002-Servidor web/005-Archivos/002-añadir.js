var archivos = require('fs');
//Añado lo que escriba al archivo que ya esta creado con ese nombre
archivos.appendFile("nuevo.txt",'\n Que tal estas?\n',function(err){
    if(err) throw err;
    console.log("Misión cumplida")
})