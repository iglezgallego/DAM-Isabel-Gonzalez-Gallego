
package proyectojava7;

public class ProyectoJava7 {

    public static void main(String[] args) {
        
        //LIBRERÍA MATEMÁTICA
        
        //Para calcular cual es número mayor
        int edad1 = 42;
        int edad2 = 25;
        int maximo = Math.max(edad1, edad2);
        System.out.println("El maximo es: "+maximo);
        //Para hacer un redondeo natural
        double numero = 45.5;
        double redondeonatural = Math.round(numero);
        System.out.println("El redondeo natural es: "+redondeonatural);
        //Para hacer un redondeo a la baja
        double numero1 = 45.8;
        double redondeobaja = Math.floor(numero1);
        System.out.println("El redondeo a la baja es: "+redondeobaja);
        //Para hacer un redondeo a la alza
        double numero2 = 45.2;
        double redondeoalza = Math.ceil(numero2);
        System.out.println("El redondeo a la alza es: "+redondeoalza);
        
        //Trigonometría (en radianes)
        //PI=180º
        
        //Calcular el seno, coseno 
        double angulo = Math.PI;
        double seno = Math.sin(angulo);
        double coseno = Math.cos(angulo);
        System.out.println("El coseno es: "+coseno);
        
        
        
        
        
        
        
        
        
      
        
    }
    
}
