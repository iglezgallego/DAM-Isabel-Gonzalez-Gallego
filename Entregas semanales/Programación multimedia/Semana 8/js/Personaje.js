//PLANTILLA PARA PERSONAJES
//Creamos clases para trabajar con programacion orientada a objetos y crear metodos y propiedades

class Personaje{
    //propiedades que tiene el Personaje NPC al nacer
    constructor(x,y,z,direccion,direccionisometrica,color,tiemponacimiento,estadoanim,energia){
        //proporciona unos valores de inicio a la instancia
        this.tiemponacimiento = 0;
        this.x = Math.random()*(terrenox2 - terrenox1)+terrenox1;
        this.y = Math.random()*(terrenoy2 - terrenoy1)+terrenoy1;
        this.z = 0
        //parámetro de direccion hacia la que se mueven los personajes en este caso direccion aleatoria
        this.direccion = Math.PI*2*Math.random();
        this.direccionverdadera = Math.PI*2*Math.random();
        this.direccionisometrica = Math.floor(Math.random()*4);
        this.color = Math.round(Math.random()*5);
        this.estadoanim = Math.floor(Math.random()*8);
        //energía que tiene el personaje al nacer
        this.energia = 100;
    }
    //declaramos el metodo mueve para gestionar el movimiento del personaje
    mueve(){
        //el personaje va envenjeciendo
        this.tiemponacimiento += 1;
        /*
        //llamamos al metodo cambiadireccion
        if(this.tiemponacimiento % 100 == 0){
            this.cambiadireccion();
        }
        */
        
        //Actualizamos el angulo en radianes segun la nomenclatura de angulos de 0 a 3
        if(this.direccionisometrica == 0){
            this.direccion = 0;
        }else if(this.direccionisometrica == 1){
            this.direccion = Math.PI/2;
        }else if(this.direccionisometrica == 2){
            this.direccion = Math.PI;
        }else if(this.direccionisometrica == 3){
            this.direccion = Math.PI*1.5;
        }
        
        //esto actualiza la dirección del personaje
        this.x -= Math.cos(this.direccion);
        this.y -= Math.sin(this.direccion);
        
        //va cambiando el estado de la animacion para caminar
        this.estadoanim++;
        //Cuando estadoanim llegue a 8 vuelve a 0
        if(this.estadoanim > 7){this.estadoanim = 0;}
        
        //llamamos al metodo pierdeenergia para que vaya perdiendo energía con el tiempo
        if(this.tiemponacimiento % 100 == 0){
            //cada 100 segundos pierde un punto de energía
            this.pierdeenergia();
        }
        //llamamos al metodo colisiona
        this.colisiona();
    }
    
    //declaramos metodo para que los NCP cambien sigan al personaje principal
    persigue(){
        
        this.estadoanim++;
        if(this.estadoanim > 7){this.estadoanim = 0;}
        //para acercar los NPCs al personaje, va a dar diagonales
        this.x -= (this.x - posx)/100
        this.x -= (this.x - posx)/100
       
        this.x -= Math.cos(this.direccion);
        this.y -= Math.sin(this.direccion);
        //llamo al metodo colisiona tambien al perseguir
        this.colisiona()
        
    }
    
    cambiadireccion(){
        //Aqui indicamos al programa que el personaje cambie de direccion cada 100 unidades de vida
        if(this.tiemponacimiento % 100 == 0){
            this.direccionisometrica = Math.floor(Math.random()*4);}
    }
    
    //declaramos el metodo colisiona para que los personajes reboten en las paredes
    colisiona(){
        /*
        //para que los personajes colisionen con el terreno cuadrado
        if(
            this.x > terrenox2 
           ||
           this.x < terrenox1 
           ||
           this.y > terrenoy2 
           ||
           this.y < terrenoy1
          ){
            //dar la vuelta
            if(this.direccionisometrica == 1){this.direccionisometrica = 3;}
            else if(this.direccionisometrica == 3){this.direccionisometrica = 1;}
            else if(this.direccionisometrica == 0){this.direccionisometrica = 2;}
            else if(this.direccionisometrica == 2){this.direccionisometrica = 0;}
            }
        */
       //para que los personajes colisionen con los bordes que tenemos en el mapa
        //averiguar la x y la y de los personajes
        var colisionapixel = contextomapa.getImageData(this.x/50+1,this.y/50+1,1,1);
        //almacenamos el componente transparencia/alpha en la variable
        var alpha = colisionapixel.data[3];
        //almacenamos el canal en canal rojo en componente
        var componente = colisionapixel.data[0];
        //si el pixel es transparente
        if(alpha == 0){
            //el personaje colisiona y da la vuelta
            if(this.direccionisometrica == 1){this.direccionisometrica = 3;}
            else if(this.direccionisometrica == 3){this.direccionisometrica = 1;}
            else if(this.direccionisometrica == 0){this.direccionisometrica = 2;}
            else if(this.direccionisometrica == 2){this.direccionisometrica = 0;}
        }
        //el eje z, que el la altura, será igual a componente
        this.z = componente;
    }
    
    //declaramos el metodo pierdeenergia
    pierdeenergia(){
        this.energia -= 1;
    }
}