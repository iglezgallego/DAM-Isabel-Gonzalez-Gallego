
package proyectojava4;

public class ProyectoJava4 {

    
    public static void main(String[] args) {
       
        float operador1 = 4;
        float operador2 = 3;
        
        // SUMA
        float suma = operador1 + operador2;
        System.out.println("La suma es: "+suma);
        // RESTA
        float resta = operador1 - operador2;
        System.out.println("La resta es: "+resta);
        // MULTIPLICACIÓN
        float multiplicacion = operador1 * operador2;
        System.out.println("La multiplicación es: "+multiplicacion);
        // DIVISIÓN
        float division = operador1 / operador2;
        System.out.println("La división es: "+division);
        
        
        // Operador comparación de igualdad
        boolean igualdad = operador1 == operador2;
        System.out.println("La comparación es: "+igualdad);
        // Operador comparación de no igualdad
        boolean noigualdad = operador1 != operador2;
        System.out.println("La comparación es: "+noigualdad);
        // Operador comparación de menor que
        boolean menorque = operador1 < operador2;
        System.out.println("La comparación es: "+menorque);
        // Operador comparación de mayor que
        boolean mayorque = operador1 > operador2;
        System.out.println("La comparación es: "+mayorque);
        
    }
    
}
