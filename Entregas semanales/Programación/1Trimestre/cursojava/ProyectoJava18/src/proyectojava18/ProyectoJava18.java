
package proyectojava18;

    import java.sql.*;
    import java.sql.Statement;
    
public class ProyectoJava18 {
    
    
    public static void main(String[] args) throws SQLException {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); //"com.mysql.cj.jdbc.Driver"
            //Ahora establezco la conexion
            Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
            Statement peticion = conexion.createStatement();
            peticion.execute("INSERT INTO agenda VALUES(NULL,'Juan','Garcia','1234','juan@correo.com')");
            //Usamos executeQuery cuando esperamos que se nos devuelva información. Si no, usamos execute
            /*
            *Create - INSERT (execute)
            *Read - SELECT [executeQuery (porque queremos información de vuelta)]
            *Update - UPDATE (execute)
            *Delete - DELETE (execute)
             */
        } catch (Exception ex) {
        }
    }
    
}
