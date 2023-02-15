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
	<%
		//out.println("Que sepas que el usuario que has enviado es:<br>");
		//out.println(request.getParameter("usuario")+"<br>");
		//out.println("Que sepas que el password que has enviado es:<br>");
		//out.println(request.getParameter("password")+"<br>");
		boolean entras = false; //la variable entras tiene valor false, es decir, no entras
		try {
	        Class.forName("com.mysql.cj.jdbc.Driver"); 
	        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
	        Statement peticion = conexion.createStatement();
	        //A continuación le pedimos algo a la base de datos y lo guardamos dentro de un objeto (como si fuese una variable)
	        //Selecciona aquellos usuarios que coincida nombre y contraseña del formulario con los de la base de datos
	        ResultSet resultado = peticion.executeQuery("SELECT * FROM usuarios WHERE usuario = '"+request.getParameter("usuario")+"' AND contrasena = '"+request.getParameter("password")+"'");
	        //Si hay algun usuario que cumple esto, entras será igual a true
	        while(resultado.next()){
	            entras = true;
	        } 
	    } catch (ClassNotFoundException ex) {
	    	ex.printStackTrace();
	    }
		//En el caso de que entras sea igual a true
		
		if(entras == true){
			out.println("vas a entrar en la aplicación");
			//redirige a panel de control
			out.println("<meta http-equiv='refresh' content='2; url=paneldecontrol.jsp'>");
			//en caso de que entras NO sea igual a true
		}else{
			out.println("NO tienes permiso para entrar en la aplicación");
			//redirige a index
			out.println("<meta http-equiv='refresh' content='2; url=index.html'>");
		}
	%>
</body>
</html>