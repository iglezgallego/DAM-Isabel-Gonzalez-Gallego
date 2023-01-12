
package proyectojava15;

public class ProyectoJava15 {

    public static void main(String[] args) {
        
        /*Array: Sirve para guardar más de un registro.
        Se escribe con  []
        */
       
       String[] agendanombre = {"Rita", "Sofia", "Maribel", "Juana", "Fani"};
       for(int i = 0; i<agendanombre.length;i++){
            System.out.println("El contenido de la agenda es: "+agendanombre[i]);
        }
       
       //Con FOR: reproducimos todos los elementos del array. 
       //i = 0 --> inicio, i<agendanombre.lenght --> finalización, i++ --> incremento
       //se usa i --> iterador
    }
    
}
