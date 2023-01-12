
package proyectojava22;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.sql.*;
import java.sql.Statement;
import javax.imageio.ImageIO;

public class ProyectoJava22 {

    public static void main(String[] args) throws SQLException, IOException {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); 
            Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
            Statement peticion = conexion.createStatement();
            
            ResultSet resultado = peticion.executeQuery("SELECT * FROM cursos");    //Leer la tabla cursos
            int numero = 1;                                                               //Declarar variable para que el while se comporte como for
            
            while(resultado.next()){                                                       //Mientras que el resultado tenda líneas
                System.out.println(resultado.getString(3));                             //Imprimir por consola la columna 3
                
                /////////////////////////////////////////////////////
                
            int altura = 400;                                                               //altura que tendrá la imagen
            int anchura = 800;                                                              //anchura que tendrá la imagen


            BufferedImage imagencacheada = new BufferedImage(anchura,altura,BufferedImage.TYPE_INT_RGB); //creo una imagen con su altura, su anchura y tipo de color

            Graphics2D graficos = imagencacheada.createGraphics();                          //Voy pintar cosas dentro la imagen cacheada

            ///////EN ESTA PARTE SE PUEDE PINTAR/////////
            
            graficos.setColor(Color.WHITE);                                               //Dibujo un fondo blanco
            graficos.fillRect(0, 0, anchura, altura);   
            

            BufferedImage imagen = null;
            imagen = ImageIO.read(new File("logos/"+resultado.getString(7)));               //Importo los logos
            graficos.drawImage(imagen, 0, 0, 400, 400, null);       //Añado una sobrecarga para que el logo no se vea tan pequeño ¿Que es una sobrecarga?
            
            BufferedImage imagen2 = null;
            imagen2 = ImageIO.read(new File("fotos/Fotos Jose Vicente Carratala "+String.format("%05d", numero)+".jpg"));  //Importo las imgénanes incrementando el numero para que en cada imagen salga una diferente
            graficos.drawImage(imagen2, 400, 0, 400, 400, null);  
            
            graficos.setColor(Color.white);                                                 //pintar franja blanca
            graficos.fillRect(390, 0, 20, 400);
            Color negrotransparente = new Color(0, 0, 0,127);                        //crear el color negro transparente
            graficos.setColor(negrotransparente);                                          // pintar el color
            graficos.fillRect(0, 370, anchura, 400);                           //dibujar franja negro transparente abajo
            
            
            graficos.setColor(Color.white);                                                 //ponemos el color del texto
            graficos.setFont(new Font("Arial", Font.ITALIC, 28));               //modificar el tamaño y tipo de fuente
            graficos.drawString(resultado.getString(3), 10, 395);                   //Pintar texto encima de la franja negra transparente

       ///////EN ESTA PARTE SE PUEDE PINTAR/////////
       
       //////EN ESTA PARTE CIERRO /////////
       
       graficos.dispose();                                                                  //Cierro-libero el recurso
       
       File archivo = new File("guardado/"+String.format("%05d", numero)+""+resultado.getString(2)+".png");   //Creamos los nuevos archivo 
       ImageIO.write(imagencacheada,"png", archivo);                        //Con la libreria correspondiente guardo el png en ese archivo
       numero++;                                                                            //Hacer que el while se comporte como for
                
                ////////////////////////////////////////////////////
            } 
        } catch (ClassNotFoundException ex) {
        }
    }
    
}
