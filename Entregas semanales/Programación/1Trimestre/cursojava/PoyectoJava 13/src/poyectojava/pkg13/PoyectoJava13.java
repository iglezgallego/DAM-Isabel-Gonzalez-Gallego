
package poyectojava.pkg13;

public class PoyectoJava13 {

    public static void main(String[] args) {
        

// MÉTODOS:
       
       saluda("Isa");
       saluda("Alberto");
       saluda("Maria");
       saluda("Rosa");
       saluda("Rita");
       saluda("Margarita", "miercoles");
    
    }
    
    public static void saluda(String nombre){
        System.out.println("Hola "+nombre+" que tal?");
    }
    
    
    public static void saluda(String nombre, String dia){
        System.out.println("Hola, "+nombre+", que tal? Sabes que hoy es "+dia+"?");
    }
    
    
    //los métodos empiezan por minusculas ej: "saluda"
    //nos permite personalizar la función con: (String...) 
    //podemos sobrecargar una función con varios parámetros (ej:día y nombre)
}

