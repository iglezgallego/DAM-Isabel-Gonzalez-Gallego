
package proyectojava17;                                                         //Importo una librería para trabajar con archivos
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;                                                     //Captura errores que se puedan producir al abrir archivos
import java.util.Scanner;

public class ProyectoJava17 {

    public static void main(String[] args) {
        try{                                                                    //Primero intenta hacer algo    
            FileWriter miarchivo = new FileWriter("archivo.txt");        //Abre el archivo
            miarchivo.write("Hola que sepas que esto se ha escrito desde Java"); //Le escrivo algo de contenido
            miarchivo.close();                                                  //Cierra los recursos despues de usarlos
        }catch(IOException e){                                                  //En el caso de que el try falle, dime en que ha fallado
            e.printStackTrace();
        }
        /////////////////////////////////////////////////////////////////////
        try{
            File miotroarchivo = new File("archivo.txt");                //Primero intento hacer algo
            Scanner lector = new Scanner(miotroarchivo);                  //Abro el archivo
        while(lector.hasNextLine()){                                            //Mientras que el archivo tenga lineas de texto
            System.out.println(lector.nextLine());                            //Imprimeme la linea actual en la pantalla
        }
        }catch(IOException e){                                                  //En el caso que de error de lectura
           e.printStackTrace();
        }
    }
}
