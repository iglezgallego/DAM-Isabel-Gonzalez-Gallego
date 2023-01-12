<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@ page import = "java.io.File" %>
    <%@ page import = "java.io.FileNotFoundException" %>
    <%@ page import = "java.util.Scanner" %>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Insert title here</title>
	</head>
	<body>
		<%
		try {
		      File myObj = new File("C:/archivos/filename.txt");
		      Scanner myReader = new Scanner(myObj);
		      while (myReader.hasNextLine()) {
		        String data = myReader.nextLine();
		        out.println(data);
		      }
		      myReader.close();
		    } catch (FileNotFoundException e) {
		      out.println("An error occurred.");
		      e.printStackTrace();
		    }
		%>
	</body>
</html>