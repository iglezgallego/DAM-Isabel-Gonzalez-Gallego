
package proyectojava21;

import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;

public class ProyectoJava21 {

    public static void main(String[] args) throws IOException {                 //Programación defensiva
        //Trabajar con imágenes:
        
        /////EN ESTA PARTE ARRANCO EL DIBUJO //////
       int altura = 400;                                                        //altura que tendrá la imagen
       int anchura = 800;                                                       //anchura que tendrá la imagen
       
                                                 
       BufferedImage imagencacheada = new BufferedImage(anchura,altura,BufferedImage.TYPE_INT_RGB); //creo una imagen con su altura, su anchura y tipo de color
             
       Graphics2D graficos = imagencacheada.createGraphics();                   //Voy pintar cosas dentro la imagen cacheada
       
       ///////EN ESTA PARTE SE PUEDE PINTAR/////////
       graficos.setColor(Color.WHITE);                                        //Dibujo un fondo blanco
       graficos.fillRect(0, 0, anchura, altura);
       
       graficos.setColor(Color.blue);                                          //lo que voy a pintar es de color azul
       graficos.fillRect(30, 30, 300, 300);                      //pinto un rectángulo
       
       graficos.setColor(Color.green);
       graficos.drawString("Programa de Isa", 300, 200);                //Dibujo una cadena de texto (string int)
       
       BufferedImage imagen = null;
       imagen = ImageIO.read(new File("logos/logo_java.png"));           //Importo el logo
     
       graficos.drawImage(imagen, 0, 0, 400, 400, null);  //Añado una sobrecarga para que el logo no se vea tan pequeño ¿Que es una sobrecarga?

       ///////EN ESTA PARTE SE PUEDE PINTAR/////////
       
       //////EN ESTA PARTE CIERRO /////////
       
       graficos.dispose();                                                      //Cierro-libero el recurso
       for(int i = 0;i<10; i++){                                                //Inicio en 0, finalización <10 imágenes, incremento+1
       File archivo = new File("guardado/primeraprueba"+i+".png");              //Apunto a un nuevo archivo
       ImageIO.write(imagencacheada,"png", archivo);           //Con la libreria correspondiente guardo el png en ese archivo
       }
    }
    
}
