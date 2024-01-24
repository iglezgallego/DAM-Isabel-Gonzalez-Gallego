var archivos = require('fs');
//Para eliminar el archivo uso unlink más el nombre del archivo
archivos.unlink('cambio.txt',function(err){
    if(err) throw err;
    console.log("Misión cumplida")
})