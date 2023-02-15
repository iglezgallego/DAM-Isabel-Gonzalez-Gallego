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
	<title>Panel de control</title>
	<script src="https://kit.fontawesome.com/dc05bdbd15.js" crossorigin="anonymous"></script>
</head>
<body>
	Bienvenid@ al panel de control<br><br>
	
	<h1>Gestión de usuarios</h1>
	<table border="1">
		<tr><th>Usuario</th><th>Contraseña</th><th>Nombre</th></tr>
		<tr>
			<form action="insertar.jsp" method="POST">
				<td><input type="text" name="usuario" placeholder="usuario"></td>
				<td><input type="text" name="password" placeholder="contraseña"></td>
				<td><input type="text" name="nombre" placeholder="nombre"></td>
				<td><input type="submit" value="Enviar"></td>
			</form>
		</tr>
		<%
		
		try {
	        Class.forName("com.mysql.cj.jdbc.Driver"); 
	        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
	        Statement peticion = conexion.createStatement();
	        ResultSet resultado = peticion.executeQuery("SELECT * FROM usuarios");
	        while(resultado.next()){
	        	//READ : Saco los datos de la tabla usuarios y le digo que me los muestre en pantalla
	            out.println("<tr><td>"+resultado.getString("usuario")+"</td><td>"+resultado.getString("contrasena")+"</td><td>"+resultado.getString("nombre")+"</td>");
	        	//VER
	        	out.println("<td><a href='ver.jsp?id="+resultado.getString("Identificador")+"'><i class='fa-solid fa-eye'></i></a></td>");
	        	//ACTUALIZAR
	        	out.println("<td><a href='actualizar.jsp?id="+resultado.getString("Identificador")+"'><i class='fa-solid fa-pen-to-square'></i></a></td>");
	        	//ELIMINAR
	        	out.println("<td><a href='eliminar.jsp?id="+resultado.getString("Identificador")+"'><i class='fa-sharp fa-solid fa-trash'></i></a></td>");
	            out.println("</tr>");
	        } 
	    } catch (ClassNotFoundException ex) {
	    	ex.printStackTrace();
	    }
		%>
	</table>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <%
          try {
    	        Class.forName("com.mysql.cj.jdbc.Driver"); 
    	        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
    	        Statement peticion = conexion.createStatement();
    	        ResultSet resultado = peticion.executeQuery("SELECT * FROM apellidos WHERE apellido LIKE '%EZ%' ORDER BY ap1 DESC LIMIT 10");
    	        while(resultado.next()){
    	            out.println("['"+resultado.getString("apellido")+"',"+resultado.getString("ap1")+"],");
    	        } 
    	    } catch (ClassNotFoundException ex) {
    	    	ex.printStackTrace();
    	    }
          %>
          ['', 0]
        ]);

        var options = {
          title: 'Apellidos que tienen EZ en el propio apellido'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <%
          try {
    	        Class.forName("com.mysql.cj.jdbc.Driver"); 
    	        Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/cursojava", "cursojava", "cursojava");
    	        Statement peticion = conexion.createStatement();
    	        ResultSet resultado = peticion.executeQuery("SELECT * FROM apellidos WHERE apellido LIKE '%MART%' ORDER BY ap1 DESC LIMIT 10");
    	        while(resultado.next()){
    	            out.println("['"+resultado.getString("apellido")+"',"+resultado.getString("ap1")+"],");
    	        } 
    	    } catch (ClassNotFoundException ex) {
    	    	ex.printStackTrace();
    	    }
          %>
          ['', 0]
        ]);

        var options = {
          title: 'Apellidos que tienen MART en el propio apellido'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
	
	<div id="piechart" style="width: 900px; height: 500px;"></div>
	<!-- Creo otro gráfico con el nombre de piechart2 -->
	<div id="piechart2" style="width: 900px; height: 500px;"></div>
	
</body>
</html>