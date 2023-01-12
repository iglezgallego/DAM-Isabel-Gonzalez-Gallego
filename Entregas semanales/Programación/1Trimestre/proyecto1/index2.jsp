<html>
<head>
    <style>
        .dia{
            width:100px;
            height:100px;
            border:1px;
            border:1px solid black;
            float:left;
        }
    </style>
</head>
<body>
    <h1>Calendario</h1>
        <%
            for(int i=1;i<=30;i++){
                out.println("<div class='dia'>"+i+"</div>");
            }
       
        %>
        
</body>

</html>