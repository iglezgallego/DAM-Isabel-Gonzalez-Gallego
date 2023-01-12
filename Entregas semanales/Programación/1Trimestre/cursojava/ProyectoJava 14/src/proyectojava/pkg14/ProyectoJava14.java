
package proyectojava.pkg14;

public class ProyectoJava14 {

    public static void main(String[] args) {
      
        // Programación orientada a objetos:
        // A partir de una clase creo objetos. ej: cada una de las copias de esa persona
        
        Persona Rita = new Persona();
        Persona Jorge = new Persona();
        //Indicamos que Rita y Jorge son datos de tipo Persona
        
        System.out.println("El nombre ahora mismo de Rita es: "+Rita.nombre);
        
        Rita.nombre = "Rita";
        Rita.edad = 27;
        Jorge.nombre = "Jorge";
        Jorge.edad = 22;
        /*
        System.out.println("El nombre ahora mismo de Rita es: "+Rita.nombre);
        System.out.println("La edad ahora mismo de Rita es: "+Rita.edad);
        System.out.println("El nombre ahora mismo de Jorge es: "+Jorge.nombre);
        System.out.println("La edad ahora mismo de Jorge es: "+Jorge.edad);
        */
        
        Rita.saluda();
        Jorge.saluda();
       
        
    }
    
}
