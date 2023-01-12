
package javaapplication8;

public class JavaApplication8 {

    public static void main(String[] args) {
      
        //Control condicional
        
        /*ESTRUCTURA DE CONTROL IF:
        Le das dos ordenes: if y else --> te va ejecutar una u otra.
        */
        
        int edad = 30;
        
        if (edad < 20){
            if (edad < 10){
                System.out.println("Eres un niño");
            }else{
                System.out.println("Eres un adolescente");
            }
        }else{
            if (edad < 30){
                System.out.println("Eres un joven");
            }else{
                System.out.println("Ya no eres un joven");
            }
  
        }
       // se pueden anidar niveles dentro de otros
    }
        
}
    
