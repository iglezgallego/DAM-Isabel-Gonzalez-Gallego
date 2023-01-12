
package proyectojava25;

public class Persona {                                                          
    //Voy a declarar propiedades de la clase (encapsuladas en Persona)
    double minx = 0;                                                            //Establezco un minimo para x
    double maxx = 400;                                                          //Establezco un máximo para x
        double randomx = minx + Math.random() * (maxx - minx);                  //Creo un numero aleatorio entre el minimo y el maximo  
    public double x = randomx;                                                  //Establezco el valor de x, que será el aleatorio
    
    double miny = 0;                                                            //Establezco un minimo para y 
    double maxy = 400;                                                          //Establezco un maximo para y
        double randomy = miny + Math.random() * (maxy - miny);                  //Creo un numero aleatorio entre el minimo y el maximo
    public double y = randomy;                                                  //Establezco el valor de y, que será el aleatorio
    
    public float direccion = 0;                                                 //Establezco la dirección
    
    public void mueveBola(){                                                    //Establezco la FUNCION mueve la bola
        double min = -0.5;                                                      //Establezco un minimo
        double max = 0.5;                                                       //Establezco un maximo
        double random = min + Math.random() * (max - min);                      //Creo un numero aleatorio entre el minimo y el maximo
        direccion += random;                                                    //Vario la direccion de forma aleatoria
        x += Math.cos(direccion);                                             //Aumento la x en base a la direccion y su coseno
        y += Math.sin(direccion);                                             //Aumento la y en base a la direccion y su seno
        if(x > 400){direccion += Math.PI;}                                      //En caso de que x sea mayor que 400, pega la vuelta al colisionar
        if(x < 0){direccion += Math.PI;}                                        //Pega la vuelta al colisionar
        if(y > 400){direccion += Math.PI;}                                      //Pega la vuelta al colisionar
        if(y < 0){direccion += Math.PI;}                                        //Pega la vuelta al colisionar
    }
}
