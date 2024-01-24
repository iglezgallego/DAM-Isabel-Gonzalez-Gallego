var archivos = require('fs');
//Para cambiar de nombre al archivo uso rename, nombre antigua, y nombre nuevo
archivos.rename("nuevo.txt",'cambio.txt',function(err){
    if(err) throw err;
    console.log("Misión cumplida")
})