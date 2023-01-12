
package proyectojava6;

public class ProyectoJava6 {

    public static void main(String[] args) {
        
        // Crear un clase: String (con la inicial en mayuscula)
        // char para declarar un caracter, solo se puede poner un caracter
        
       String diadelasemana = "jueves";
       long edad = 789654;
       char caracter = 'a';
       char diadelasemanachar = 'v';
       
       System.out.println("La cadena es: "+diadelasemana);
       System.out.println("La cadena es: "+diadelasemana.length());
       System.out.println("La cadena es: "+(diadelasemana == "jueves"));
       
      // no debería funcionar con == por que los Stings se comparan con el método equals
      

      System.out.println("La cadena es: "+(diadelasemana.equals("jueves")));
       
       
       
    }
    
}
