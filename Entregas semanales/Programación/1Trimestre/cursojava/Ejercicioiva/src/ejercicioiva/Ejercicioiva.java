
package ejercicioiva;

public class Ejercicioiva {

    public static void main(String[] args) {
       
        // Primero declaramos las variables
        // No se porque no me deja poner float en vez de double
        
        float iva = 0.21f;
        float base = 384;
        
        float ivacalculado;
        float totalimporte;
        
        //Ahora realizo cálculos
        //Operaciones aritméticas con las variables
        // Primero calculo el IVA
        
        ivacalculado = base*iva;
        totalimporte = base+ivacalculado;
        
        // Ahora queremos que el programa nos devuelva el resultado
        
        System.out.println("El iva de la factura es de "+ivacalculado);
        System.out.println("El total de la factura es de "+totalimporte);
        
       
        
        
        
        
        
      
        
       
    }
    
}
