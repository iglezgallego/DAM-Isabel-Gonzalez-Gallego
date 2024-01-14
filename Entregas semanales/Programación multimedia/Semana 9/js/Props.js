//PLANTILLA PARA PERSONAJES
//Creamos clases para trabajar con programacion orientada a objetos y crear metodos y propiedades

class Props{
    //propiedades que tiene el Personaje NPC al nacer
    constructor(x,y,z,tipo){
        //proporciona unos valores de inicio a la instancia
        
        this.x = Math.random()*(terrenox2 - terrenox1)+terrenox1;
        this.y = Math.random()*(terrenoy2 - terrenoy1)+terrenoy1;
        this.z = 0;
        
    }
}