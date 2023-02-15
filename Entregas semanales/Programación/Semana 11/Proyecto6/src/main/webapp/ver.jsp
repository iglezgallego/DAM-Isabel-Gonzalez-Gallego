<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    <%@ page import = "java.sql.Connection" %>
    <%@ page import = "java.sql.DriverManager" %>
    <%@ page import = "java.sql.Statement" %>
    <%@ page import = "java.sql.ResultSet" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<h1>Informe de uno de los registros</h1>
	<% 
		try {
		        Class.forName("com.mysql.cj.jdbc.Driver"); 
		        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
		        Statement peticion = conexion.createStatement();
		        ResultSet resultado = peticion.executeQuery("SELECT * FROM usuarios WHERE Identificador = "+request.getParameter("id")+"");
		        while(resultado.next()){
		        	
		            out.println("Usuario: "+resultado.getString("usuario")+"<br>");
		            out.println("Contraseña: "+resultado.getString("contrasena")+"<br>");
		            out.println("Nombre: "+resultado.getString("nombre")+"<br>");
		        } 
		    } catch (ClassNotFoundException ex) {
		    	ex.printStackTrace();
		    }
	%>
	
	<a href="paneldecontrol.jsp">Volver a la pantalla anterior</a>
</body>
</html>