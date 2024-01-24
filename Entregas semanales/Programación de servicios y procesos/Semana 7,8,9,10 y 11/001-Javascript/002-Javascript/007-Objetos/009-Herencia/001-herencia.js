class Animal{
    //metodo constructor
    constructor(){
        
    }
    respira(){
        return "El animal está respirando";
    }
}
//Persona es una clase hija de animal y hereda todo lo que tenga animal
class Persona extends Animal{
    constructor(){
        //super se pone dentro del constructor siempre que una clase hereda de otra
        super();
        this.edad = 0
        this.nombre = "";
    }
    setEdad(nuevaedad){
        this.edad = nuevaedad
    }
    getEdad(){
        return this.edad
    }
    setNombre(nuevonombre){
        this.nombre = nuevonombre
    }
    getNombre(){
        return this.nombre
    }
    saluda(){
        return "Hola, me llamo "+this.nombre+" y tengo "+this.edad
    }
}

var persona1 = new Persona();
persona1.setEdad(31);
persona1.setNombre("Isabel");
console.log(persona1);
console.log(persona1.saluda());
console.log(persona1.respira())