
package proyectojava9;


public class ProyectoJava9 {

    public static void main(String[] args) {
        
// Control condiconal:  

    // ESTRUCTURA DE CONTROL SWITCH:
    
    //Las preguntas no se contestan con true o false. Varias respuestas verdaderas posibles.
    
    String diadelasemana = "jueves";
    
    switch(diadelasemana){
        case "lunes":
            System.out.println("Hoy es el peor dia de la semana");break;
        case "martes":
            System.out.println("Hoy es el segundo peor dia de la semana");break;
        case "miercoles":
            System.out.println("Ya estamos a mitad");break;
        case "jueves":
            System.out.println("Ya casi es viernes");break;
        case "viernes":
            System.out.println("Hoy es el mejor dia de la semana");break;
        case "sabado":
            System.out.println("Hoy es el super mejor dia de la semana");break;
        case "domingo":
            System.out.println("Mañana ya es lunes de nuevo");break;
        default:
            System.out.println("Yo no se lo que has escrito, pero eso no es un dia de la semana");break;
    }
    }
        //break; --> para terminar 
        //default: --> para crear una opcion de respuesta que no hemos establecido 
}
