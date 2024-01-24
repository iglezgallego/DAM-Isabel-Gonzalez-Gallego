class Persona{
    constructor(){
        this.edad = 0
        this.nombre = "";
    }
    saluda(){
        console.log("Hola, me llamo "+this.nombre+" y tengo "+this.edad)
    }
}

// Esto no es muy limpio porque no hay encapsulación
var persona1 = new Persona();
persona1.edad = 31;
persona1.nombre = "Isabel";
console.log(persona1);
persona1.saluda();