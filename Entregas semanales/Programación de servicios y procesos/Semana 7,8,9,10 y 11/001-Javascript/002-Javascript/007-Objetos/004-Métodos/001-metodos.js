class Persona{
    constructor(){
        this.edad = 0
        this.nombre = "";
    }
    //Creo el metodo saluda
    saluda(){
        console.log("Hola, me llamo "+this.nombre+" y tengo "+this.edad)
    }
}

var persona1 = new Persona();
console.log(persona1);
//el objeto persona1 llama al método saluda
persona1.saluda();