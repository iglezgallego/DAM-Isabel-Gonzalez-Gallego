package proyectojava24;

import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.RenderingHints;
import javax.swing.JFrame;
import javax.swing.JPanel;
import java.util.Random;

public class ProyectoJava24 extends JPanel {
                                                                                //Creo un objeto de la clase Persona llamado bolita
    float x = 200;                                                              //Defino una posición incial
    float y = 200;                                                              
    float direccion = 0;                                                        //Defino una direccion inicial
    
    @Override                                                                   
    public void paint(Graphics g){                                              //Sobreescribo el método de pintura por defecto 
        super.paint(g);                                                         //Pinto en la ventana principal
        Graphics2D graf2d = (Graphics2D) g;                                     //Creo un nuevo elemento de graficos 2D
        graf2d.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);  //Activo el suavizado de las lineas
        graf2d.fillOval((int)x, (int)y, 20, 20);                     //Dibujo un ovalo
        }
    public void mueveBola(){                                                    //Esta funcion mueve la bola
        double min = -0.5;                                                      //Establezco un minimo
        double max = 0.5;                                                       //Establezco un maximo
        double random = min + Math.random() * (max - min);                      //Creo un numero aleatorio entre el minimo y el maximo
        direccion += random;                                                    //Vario la direccion de forma aleatoria
        x += Math.cos(direccion);                                             //Aumento la x en base a la direccion y su coseno
        y += Math.sin(direccion);                                             //Aumento la y en base a la direccion y su seno
        if(x > 400){direccion += Math.PI;}                                      //En caso de que x sea mayor que 400, pega la vuelta al colisionar
        if(x < 0){direccion += Math.PI;}                                        //Pega la vuelta al colisionar
        if(y > 400){direccion += Math.PI;}                                      //Pega la vuelta al colisionar
        if(y < 0){direccion += Math.PI;}                                        //Pega la vuelta al colisionar
    }
    public static void main(String[] args) throws InterruptedException {        //Esta es la funcion principal
        
        JFrame marco = new JFrame("animacion");                            //Creo un marco de swing
        ProyectoJava24 animacion = new ProyectoJava24();                        //Creo una instancia del propio proyecto
        marco.add(animacion);                                               //Al marco le añado el proyecto
        marco.setSize(400,400);                                      // Especifico las dimensiones de la ventana
        marco.setVisible(true);                                               //Le digo que quiero que la ventana sea visible
        marco.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);           //Instrucción para cerrar el proceso al cerrar la ventana
    
    while(true){                                                                //Entramos en el bucle infinito
        animacion.mueveBola();                                                  //Ejecuto la funcion mueve la bola
        animacion.repaint();                                                    //Repinta lo que hay en pantalla
        Thread.sleep(10);                                                 //Para la ejecución un cierto tiempo para que el bucle este controlado
        }
    }
}
