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
	<form action="procesaactualizar.jsp" method="POST">
		<% 
		try {
		        Class.forName("com.mysql.cj.jdbc.Driver"); 
		        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
		        Statement peticion = conexion.createStatement();
		        ResultSet resultado = peticion.executeQuery("SELECT * FROM usuarios WHERE Identificador = "+request.getParameter("id")+"");
		        while(resultado.next()){
		        	//con type=hyden creo un campo oculto que coja el Identificador para que al entrar en id que corresponde
		        	out.println("<input type='hidden' name='identificador' value='"+resultado.getString("Identificador")+"'>");
		            out.println("Usuario:<input type='text' name='usuario' value='"+resultado.getString("usuario")+"'> <br>");
		            out.println("Contraseña:<input type='text' name='contrasena' value='"+resultado.getString("contrasena")+"'> <br>");
		            out.println("Nombre:<input type='text' name='nombre' value='"+resultado.getString("nombre")+"'> <br>");
		        } 
		    } catch (ClassNotFoundException ex) {
		    	ex.printStackTrace();
		    }
	%>
	<input type="submit" value="Enviar">
	
	</form>
</body>
</html>