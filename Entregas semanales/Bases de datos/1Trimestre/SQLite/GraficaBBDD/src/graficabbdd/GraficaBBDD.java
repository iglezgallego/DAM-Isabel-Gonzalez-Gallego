
package graficabbdd;
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
//IMPORTANTE AÑADIR LA LIBRERÍA DE CONEXION SQLITE

public class GraficaBBDD extends JPanel{
    
    //Pintamos la gráfica
    @Override public void paint(Graphics g){                                    //Sobrescribo en el metodo de pintura
        super.paint(g);                                                         //Pintame en la ventana principal
        Graphics2D misgraficos = (Graphics2D) g;                                //Creo un nuevo elemento de graficos2D
        int basegrafica = 360;                                                  //Asigno un valor a la base de la gráfica
        //empiezo a dibujar
        misgraficos.drawLine(10, 10,10, basegrafica);                //Eje vertical
        misgraficos.drawLine(10, basegrafica,360, basegrafica);      //Eje horizontal    
        //int [] barras = new int[]{100,300,200,200,100,200,50,200,100,50,60};  //Creo una matriz con el valor de las barras
        int[] barras = new int[10];                                             //Creo una matriz de 10 elementos (o los que tenga la bbdd)
        
        
       //Establecemos la conexion con la base de datos y le pedimos cosas
       
        String url = "jdbc:sqlite:C://sqlite/registros.db";                     //indico la ruta del archivo (cambiar aquí la URL)
        Connection conn;                                                        //declaro la variable conn
        
        try {
             String sql = "SELECT * FROM logmeses";                             //String con el nombre de la vista de la bbdd (Cambiar)
             conn = DriverManager.getConnection(url);                           //Establezco la conexion
             Statement stmt = conn.createStatement();                           //Establezco la conexion
             ResultSet rs = stmt.executeQuery(sql);                       //Lanzo la petición a la base de datos
             int contador = 0;                                                  //Establezco la variable para el inicio de la matriz
             
             while (rs.next()) {
                System.out.println(rs.getInt("mes") + "\t" +                    //Sácame el mes de la base de datos
                                   rs.getString("numero"));                     //Sácame el número de la base de datos
                barras[contador] = Integer.parseInt(rs.getString("numero"))/10; //Sácame las barras con los valores de la base de datos
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
        JFrame marco = new JFrame("grafica");                              //Creo un marco de swing
        GraficaBBDD mimarco = new GraficaBBDD();                                //Creo una instancia del propio proyecto
        marco.add(mimarco);                                                 //Al marco le añado el proyecto
        marco.setSize(400, 400);                                      //Especifico las dimensiones de la ventana
        marco.setVisible(true);                                               //Le digo que la ventana sea visible
        marco.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);           //Le digo que termine el proceso al cerrar la ventana
    }
    
}
