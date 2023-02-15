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
	try {
        Class.forName("com.mysql.cj.jdbc.Driver"); //"com.mysql.cj.jdbc.Driver"
        //Ahora establezco la conexion
        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
        Statement peticion = conexion.createStatement();
        peticion.execute("DELETE FROM usuarios WHERE Identificador = "+request.getParameter("id")+"");
    } catch (Exception e) {
    	e.printStackTrace();
    }
		out.println("<meta http-equiv='refresh' content='2; url=paneldecontrol.jsp'>");
	%>
</body>
</html>