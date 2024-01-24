class Persona{
    //constructor se ejecuta directamente sin tener que llamarlo
    constructor(){
        this.edad = 0
        //creo la propiedad nombre sin valor
        this.nombre = "";
    }
}
//instancio persona1 de Persona - recibe todo lo que tenga Persona
var persona1 = new Persona();
console.log(persona1)