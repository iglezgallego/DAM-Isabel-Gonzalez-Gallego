<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@ page import = "java.io.File" %>
    <%@ page import = "java.io.FileWriter" %>
    <%@ page import = "java.io.IOException" %>
    
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	Aquí voy a procesar la informacion que me has enviado<br>
	
	<%
		String nombre = request.getParameter("nombre");
		String apellido = request.getParameter("apellido");
		String email = request.getParameter("email");
		String telefono = request.getParameter("telefono");
		String resultado = "Que sepas que el nombre es: "+nombre+" y el apellido es: "+apellido+" y el telefono es: "+telefono+" y el email es: "+email;
		out.println(resultado);
		
		/*
		try {
		      File myObj = new File("C/archivos/filename.txt");
		      if (myObj.createNewFile()) {
		        out.println("File created: " + myObj.getName());
		      } else {
		        out.println("File already exists.");
		      }
		    } catch (IOException e) {
		      System.out.println("An error occurred.");
		      e.printStackTrace();
		    }
		*/
		
		try {
		      FileWriter myWriter = new FileWriter("C:/archivos/filename.txt");
		      myWriter.write(resultado);
		      myWriter.close();
		      out.println("Successfully wrote to the file.");
		    } catch (IOException e) {
		      out.println("An error occurred.");
		      e.printStackTrace();
		    }
		
	%>
</body>
</html>