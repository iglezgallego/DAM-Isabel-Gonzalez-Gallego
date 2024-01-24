//Dentro de las funciones existe el valor return que hace que la función returne algo
function saluda(nombre,edad,email){
    cadena = "";
    cadena += "Me llamo "+nombre+".\n";
    cadena += "Tengo "+edad+" años\n"
    cadena += "Mi correo es "+email+"\n"
    return cadena;
}

//saco el valor que me devuelve por consola
console.log(saluda("Isabel",31,"iglez@gmail.com"));
console.log(saluda("Juan",33,"juan@gmail.com"));
console.log(saluda("Sara",40,"sara@gmail.com"));