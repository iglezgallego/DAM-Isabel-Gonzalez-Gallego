
package ejercicio1;

import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JFrame;
import javax.swing.JPanel;
import java.util.Random;
import java.util.concurrent.ThreadLocalRandom;
import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Ejercicio1 extends JPanel {
@Override public void paint(Graphics g){                                    //Sobrescribo en el metodo de pintura
        super.paint(g);                                                         //Pintame en la ventana principal
        Graphics2D misgraficos = (Graphics2D) g;                                //Creo un nuevo elemento de graficos2D
        int basegrafica = 360;                                                  //Asigno un valor a la base de la gráfica
        //empiezo a dibujar
        misgraficos.drawLine(10, 10,10, basegrafica);                //Eje vertical
        misgraficos.drawLine(10, basegrafica,760, basegrafica);      //Eje horizontal  (CAMBIAR x2 SI LA GRAFICA ES MAS GRANDE)
        //int [] barras = new int[]{100,300,200,200,100,200,50,200,100,50,120};    //Creo una matriz con el valor de las barras
       int[] barras = new int[24];                                               //Creo una matriz de X elementos (CAMBIAR los que tenga la bbdd)
        
        
        //Establecemos la conexion con la base de datos y le pedimos cosas
       
        String url = "jdbc:sqlite:C://sqlite/registros.db";                     //indico la ruta del archivo (CAMBIAR aquí la URL)
        Connection conn;                                                        //declaro la variable conn
        
        try {
             String sql = "SELECT * FROM horasdias";                       //String con el nombre de la vista de la bbdd (CAMBIAR NOMBRE VISTA)
             conn = DriverManager.getConnection(url);                           //Establezco la conexion
             Statement stmt = conn.createStatement();                           //Establezco la conexion
             ResultSet rs = stmt.executeQuery(sql);                             //Lanzo la petición a la base de datos
             int contador = 0;                                                  //Establezco la variable para el inicio de la matriz
             
             while (rs.next()) {
                System.out.println(rs.getString("hora") + "\t" +                 //Sácame el mes de la base de datos (CAMBIAR nombre columna)
                                   rs.getString("numero"));                     //Sácame el número de la base de datos (CAMBIAR nombre columna)
                barras[contador] = Integer.parseInt(rs.getString("numero"))/10; //Sácame las barras con los valores de la base de datos (CAMBIAR)
                contador++;                                                     //Incremento
             }
             
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
      
       
       //i<barras.length o i<10
        for(int i=0;i<barras.length;i++){                                                  //Defino el inicio, el fin y el incremento
            //int randomNum = ThreadLocalRandom.current().nextInt(10,300+1);    //Establezco numeros al azar entre el 10 y el 300
            int randomNum = barras[i];                                          //Creo una variable que contiene la matriz
            misgraficos.fillRect(i*30+20, basegrafica-randomNum, 20, randomNum);   //Pinto las barras
            }
}
    public static void main(String[] args) {
        // TODO code application logic here
         JFrame marco = new JFrame("grafica");                                //Creo un marco de swing
        Ejercicio1 mimarco = new Ejercicio1();                                  //Creo una instancia del propio proyecto
        marco.add(mimarco);                                                 //Al marco le añado el proyecto
        marco.setSize(800, 400);                                      //Especifico las dimensiones de la ventana (CAMBIAR SI ES MAS GRANDE)
        marco.setVisible(true);                                               //Le digo que la ventana sea visible
        marco.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);           //Le digo que termine el proceso al cerrar la ventana
    }
    
   }
    

