
package proyectojava19;
    import java.sql.*;
    

public class ProyectoJava19 {

    public static void main(String[] args)throws SQLException {
       try {
            Class.forName("com.mysql.cj.jdbc.Driver"); 
            Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
            Statement peticion = conexion.createStatement();
            //A continuación le pedimos algo a la base de datos y lo guardamos dentro de un objeto (como si fuese una variable)
            ResultSet resultado = peticion.executeQuery("SELECT * FROM agenda");
            //Mientras que el resultado tenda líneas
            while(resultado.next()){
                //Imprime en pantalla el resultado
                System.out.println(resultado.getString(1)+"-"+resultado.getString(2)+"-"+resultado.getString(3)+"-"+resultado.getString(4));
            } 
        } catch (ClassNotFoundException ex) {
        }
    }
    
}
