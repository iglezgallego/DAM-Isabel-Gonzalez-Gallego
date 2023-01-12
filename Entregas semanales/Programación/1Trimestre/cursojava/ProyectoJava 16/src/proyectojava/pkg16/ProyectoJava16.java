
package proyectojava.pkg16;


public class ProyectoJava16 {

    public static void main(String[] args) {
        
        //Array de dos dimensiones:
       
        String agenda [][] = {{"Rita", "Sofia", "Maribel", "Juana"},{"1234","3456","6789","9876"}};
        for(int i = 0; i<agenda[0].length;i++){
            System.out.println("Que sepas que el nombre de este contacto es: "+agenda [0][i]);
            System.out.println("Que sepas que el telefono de este contacto es: "+agenda [1][i]);
            System.out.println("///////////////////////////////////////");
        }
            
    }
    
}
