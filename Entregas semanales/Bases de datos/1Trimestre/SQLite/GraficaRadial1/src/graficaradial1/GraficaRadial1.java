
package graficaradial1;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import static java.lang.Math.round;
import javax.swing.JFrame;
import javax.swing.JPanel;
import java.util.Random;
import java.util.concurrent.ThreadLocalRandom;
import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

public class GraficaRadial1 extends JPanel{
    private static int getRandomNumberInRange(int min, int max) {               //Método para crear numeros aleatorios

		if (min >= max) {
			throw new IllegalArgumentException("max must be greater than min");
                }
		Random r = new Random();
		return r.nextInt((max - min) + 1) + min;
	}
    
     //PINTAMOS LA GRAFICA
    @Override public void paint(Graphics g){                                    //Sobrescribo en el metodo de pintura
        super.paint(g);                                                         //Pintame en la ventana principal
        Graphics2D misgraficos = (Graphics2D) g;                                //Creo un nuevo elemento de graficos2D
        float [] barras = new float[]{33, 33, 33, 33, 45, 34, 23, 87};          //Creo un conjunto de datos en un array
        List misbarras = new ArrayList();
        
        /*float suma = 0;
        for(int i=0;i<barras.length;i++){
            suma += barras[i];                                                  //Sumamos los elementos del array
        }*/
        //System.out.println("Que sepas que la suma de las porciones es: "+suma);
        int acontinuacion = 0;                                                  //creamos la variable acontinuacion
        
        //ME CONECTO A LA BASE DE DATOS Y LE PIDO COSAS
        String url = "jdbc:sqlite:C://sqlite/registros.db";                     //indico la ruta del archivo (cambiar aquí la URL)
        Connection conn = null;                                                  //declaro la variable conn
        try {
             String sql = "SELECT * FROM horasdeldia";                              //String con el nombre de la vista de la bbdd (Cambiar)
             conn = DriverManager.getConnection(url);                           //Establezco la conexion
             Statement stmt = conn.createStatement();                           //Establezco la conexion
             ResultSet rs = stmt.executeQuery(sql);                       //Lanzo la petición a la base de datos
             while (rs.next()) {
                misbarras.add(Integer.parseInt(rs.getString("numero"))); //Sácame los quesitos  con los valores de la base de datos
             }
                /*sql = "SELECT * FROM mac";                                      //Hago la peteción para mac
                rs = stmt.executeQuery(sql);                              // Lanzo la peticicion
                while (rs.next()) {
                misbarras.add(Integer.parseInt(rs.getString("numero"))); //Sácame los quesitos con los valores de la base de datos 
             }
                sql = "SELECT * FROM ubuntu";                                      //Hago la peteción para mac
                rs = stmt.executeQuery(sql);                              // Lanzo la peticicion
                while (rs.next()) {
                misbarras.add(Integer.parseInt(rs.getString("numero"))); //Sácame los quesitos con los valores de la base de datos 
             }
                sql = "SELECT * FROM android";                                      //Hago la peteción para mac
                rs = stmt.executeQuery(sql);                              // Lanzo la peticicion
                while (rs.next()) {
                misbarras.add(Integer.parseInt(rs.getString("numero"))); //Sácame los quesitos con los valores de la base de datos 
             }
                sql = "SELECT * FROM iphone";                                      //Hago la peteción para mac
                rs = stmt.executeQuery(sql);                              // Lanzo la peticicion
                while (rs.next()) {
                misbarras.add(Integer.parseInt(rs.getString("numero"))); //Sácame los quesitos con los valores de la base de datos 
             }*/
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        
        int tamanio = misbarras.size();                                         //Creamos las variables tamanio que es el tamaño de los quesitos
        float suma = 0;                                     
        for(Object numero : misbarras){
            System.out.println(numero);
            suma += (int)numero;                                                //Establecemos la suma de todos los quesitos
        }
        System.out.println("La suma es "+suma);
        System.out.println(misbarras.size());
      
        //DIBUJO LA GRAFICA
       
        //for(int i=0;i<barras.length;i++){
        for(Object numero : misbarras){                                         //Para cada uno de los elementos del quesito
            
            int rojo = getRandomNumberInRange (0, 255);                  //Creamos numero aleatorios para red
            int verde = getRandomNumberInRange (0, 255);                 //Creamos numero aleatorios para green
            int azul = getRandomNumberInRange (0, 255);                  //Creamos numero aleatorios para blue
            Color micolor = new Color (rojo, verde, azul);                //Indicamos que micolor serán colores aleatorios (rgb)
                misgraficos.setColor(micolor);                                //Pon color los colores aleatorios en los quesitos
                
            int angulo = (int)(round(((int)numero/suma)*360));                  //Convierto los valores del array en angulos
            //System.out.println("quesito"+ angulo);
            
            misgraficos.fillArc(0, 10, 380, 380, acontinuacion, angulo); //Pintamos los quesitos de la grafica
            acontinuacion += angulo;                                            //Definir el principio del siguiente angulo, que empieza cuando acaba el último que hemos pintado
        }
        misgraficos.setColor(Color.white);
        misgraficos.fillArc(150, 160, 80, 80, 0, 360); //Dibujo un circulo blanco en el centro
    }       
    


    public static void main(String[] args) {
        // TODO code application logic here
        JFrame marco = new JFrame("grafica");                              //Creo un marco de swing
        GraficaRadial1 mimarco = new GraficaRadial1();                                //Creo una instancia del propio proyecto
        marco.add(mimarco);                                                 //Al marco le añado el proyecto
        marco.setSize(400, 400);                                      //Especifico las dimensiones de la ventana
        marco.setVisible(true);                                               //Le digo que la ventana sea visible
        marco.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);           //Le digo que termine el proceso al cerrar la ventana
    }
    
}
