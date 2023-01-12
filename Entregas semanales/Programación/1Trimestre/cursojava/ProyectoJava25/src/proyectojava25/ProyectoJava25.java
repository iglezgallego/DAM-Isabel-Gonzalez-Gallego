package proyectojava25;

import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.RenderingHints;
import javax.swing.JFrame;
import javax.swing.JPanel;
import java.util.Random;

public class ProyectoJava25 extends JPanel {
    int numerobolas = 30;                                                       ////Defino una variable con el numero de bolas
    Persona bolita[] = new Persona[numerobolas];                                ////Creo una array de tipo persona, con un tamaño correspondiente: la variable numerobolas
    
    public void inicio(){                                                       ////Creo una función de incio manualmente
        for (int i=0;i<numerobolas;i++){                                        
            bolita[i] = new Persona();                                          ////Creo un objeto de tipo Persona dentro de cada una de las posiciones del array bolita 
            //System.out.println("Asignando bolita: "+bolita[i].x);             ////Utilizo este elemento para comprobar que funciona
        }
    }
    
    @Override                                                                   
    public void paint(Graphics g){                                              //Sobreescribo el método de pintura por defecto 
        super.paint(g);                                                         //Pintame en la ventana principal
        Graphics2D graf2d = (Graphics2D) g;                                     //Creo un nuevo elemento de graficos 2D
        graf2d.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);  //Activo el suavizado de las lineas
        for(int i = 0;i<numerobolas;i++){
            graf2d.fillOval((int)bolita[i].x, (int)bolita[i].y, 20, 20);  ////Pintame los 30 ovalos, correpondientes a cada bolita 
        }
    }
    public void muevete(){                                                      ////Establezco la función para mover las 30 bolas
        for(int i = 0;i<numerobolas;i++){
            bolita[i].mueveBola();                                              ////Llamando al método muevebola
        }
    }
    
    public static void main(String[] args) throws InterruptedException {        //Esta es la funcion principal, que nos permite entrar en un bucle infinito controlado por Interrupted..
        
        JFrame marco = new JFrame("animacion");                            //Creo un marco de swing
        ProyectoJava25 animacion = new ProyectoJava25();                        //Creo una instancia del propio proyecto
        marco.add(animacion);                                               //Al marco le añado el proyecto
        marco.setSize(400,400);                                      // Especifico las dimensiones de la ventana
        marco.setVisible(true);                                               //Le digo que quiero que la ventana sea visible
        marco.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);           //Instrucción para cerrar el proceso al cerrar la ventana
        animacion.inicio();                                                     //Invoco la función incio
        
    while(true){                                                                //Entramos en el bucle infinito
        animacion.muevete();                                                    ////Ejecuta la funcion muevete
        animacion.repaint();                                                    //Repinta lo que hay en pantalla
        Thread.sleep(10);                                                 //Parar la ejecución un cierto tiempo para que el bucle este controlado
        }
    }
}

