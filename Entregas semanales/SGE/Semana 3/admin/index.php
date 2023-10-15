<html>
    <head>
        <style>
            body{
                background: #EDE6F2;
            }
            form{
                width: 400px;
                height: 400px;
                padding: 20px;
                margin: auto;
                background:white;
                box-shadow:0px 10px 20px rgba(0,0,0,0.3);
                border-radius: 10px;
            }
            input{
                width:100%;
                margin-top:10px;
                margin-bottom:10px;
                border:1px solid #EDE6F2;
                padding-top:5px;
                padding-bottom:5px;
            }
        </style>
    </head>
    <body>
        <form action="login.php" method="POST">
            <input type="test" name="usuario">
            <input type="password" name="contrasena">
            <input type="submit">
        </form>
    </body>
</html>