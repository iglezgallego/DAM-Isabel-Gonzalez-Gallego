
package conector;
//Importo todo y aseguro que tengo la librería SQL incluida
import java.sql.*;

public class Conector {

    
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/pruebaconector";
        String usuario = "pruebaconector";
        String contrasena = "pruebaconector";
        
        try{
            //Importo la clase correspondiente a la libreria que se ha importado que es el conector jdbc
             Class.forName("com.mysql.cj.jdbc.Driver");
             //Me conecto a la base de datos
             Connection miconexion = DriverManager.getConnection(url,usuario,contrasena);
             Statement peticion = miconexion.createStatement();
             String cadena = "SELECT * FROM personas";
             ResultSet resultado = peticion.executeQuery(cadena);
             //Hasta que resultado tenga un siguiente registro
             while(resultado.next()){
                 //devuelvelo por consola
                 String nombre = resultado.getString("nombre");
                 String apellidos = resultado.getString("apellidos");
                 String email = resultado.getString("email");
                 System.out.println(nombre+" "+apellidos+" "+email);
             }
             //Cerramos recursos
             resultado.close();
             peticion.close();
             miconexion.close();
             
        //Capturo el error
        }catch(ClassNotFoundException | SQLException e){
        e.printStackTrace();
        }
        
    }
}
