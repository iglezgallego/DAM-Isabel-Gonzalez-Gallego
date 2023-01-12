
package ejercicio3;

public class Ejercicio3 {

    public static void main(String[] args) {
        // TODO code application logic here
        //DECLARO VARIABLES
        
        float base = 1000;
        float irpf = 15;
        float iva = 21;
        float irpfcalculado;
        float ivacalculado;
        float subtotal;
        float total;
        
        //HAGO LOS CALCULOS
        
        irpfcalculado = base*(irpf/100);
        subtotal = base - (irpfcalculado);
        ivacalculado = subtotal * (iva/100);
        total = subtotal + ivacalculado;
        
        //LOS MUESTRO EN PANTALLA
        
        System.out.println("El IRPF de la base es: "+irpfcalculado);
        System.out.println("El subtotal es: "+subtotal);
        System.out.println("El IVA es: "+irpfcalculado);
        System.out.println("El total es: "+total);
        
        
    }
    
}
