
package javasqlite;
import java.sql.*;


public class JavaSQLite {
    public static void main(String[] args) throws SQLException {
       
        System.out.println("Hola SQLite");
        Connection conexion = null;
        
        //Declaro las variables en las que guardo la información
        int windows = 0;
        int mac = 0;
        int ubuntu = 0;
        int android = 0;
        int ios = 0;
        
        String nwindows = "";
        String nmac = "";
        String nubuntu = "";
        String nandroid = "";
        String nios = "";
        
        try{
            String ruta = "jdbc:sqlite:/Users/iglez/Desktop/DAM CAPITOL/Bases de datos/SQLite/registros.db";
            conexion = DriverManager.getConnection(ruta);
            Statement peticion = conexion.createStatement();
            
            //Pido cosas a la base de datos
            
                //Ejecuto para windows
                String consulta = "SELECT * FROM visitaswindows";
                ResultSet resultados = peticion.executeQuery(consulta);
                while(resultados.next()){windows = resultados.getInt("numero");}
                //Ejecuto para mac
                consulta = "SELECT * FROM visitasmac";
                resultados = peticion.executeQuery(consulta);
                while(resultados.next()){mac = resultados.getInt("numero");}
                //Ejecuto para ubuntu
                consulta = "SELECT * FROM visitasubuntu";
                resultados = peticion.executeQuery(consulta);
                while(resultados.next()){ubuntu = resultados.getInt("numero");}
                //Ejecuto para android
                consulta = "SELECT * FROM visitasandroid";
                resultados = peticion.executeQuery(consulta);
                while(resultados.next()){android = resultados.getInt("numero");}
                //Ejecuto para iOS
                consulta = "SELECT * FROM visitasios";
                resultados = peticion.executeQuery(consulta);
                while(resultados.next()){ios = resultados.getInt("numero");}
                
        //Establezco que por cada valor 1000 desde 0 de las variables int, las variables string sean un #
            for(int i=0;i<windows;i+=1000){nwindows += "#";}
            for(int i=0;i<mac;i+=1000){nmac += "#";}
            for(int i=0;i<ubuntu;i+=1000){nubuntu += "#";}
            for(int i=0;i<android;i+=1000){nandroid += "#";}
            for(int i=0;i<ios;i+=1000){nios += "#";}
            
            //Le digo que me lo saque por pantalla, los datos más la gráfica 
            
        System.out.println("Windows:\t"+String.valueOf(windows)+" "+nwindows);
        System.out.println("Mac:\t\t"+String.valueOf(mac)+" "+nmac);
        System.out.println("Ubuntu:\t\t"+String.valueOf(ubuntu)+" "+nubuntu);
        System.out.println("Android:\t"+String.valueOf(android)+" "+nandroid);
        System.out.println("iOS:\t\t"+String.valueOf(ios)+" "+nios);
           
            
        }catch(SQLException e){
        System.out.println(e.getMessage());}
    }
    
}
