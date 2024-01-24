var archivos = require('fs');
//Para sobreescribir en el archivo uso writeFile
archivos.writeFile("nuevo.txt",'Hola, te he sobreescrito \n',function(err){
    if(err) throw err;
    console.log("Misión cumplida")
})