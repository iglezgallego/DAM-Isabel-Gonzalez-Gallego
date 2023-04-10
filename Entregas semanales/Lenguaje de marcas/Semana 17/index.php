<html>
	<head>
		<style>
            body{font-family:sans-serif;text-align: center;}
			select{width:90%;margin-top:4px;margin-bottom:4px;padding:4px;}
            h2{font-size:14px;font-weight: normal;}
		</style>
		<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
	</head>
	<body>
        <?php
            $mysqli = new mysqli("localhost", "formularios", "formularios", "formularios");
            $consulta = "SELECT * FROM formulario WHERE clave = '".$_GET['formulario']."'";
            $resultado = $mysqli->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
                    echo '<h1>'.$fila['titulo'].'</h1>';
                    echo '<h2>'.$fila['descripcion'].'</h2>';
                }
            ?>
		<div id="formularios">
			<div id="ajaxinicio"></div>
		</div>
		
		<script>
		//formulario que va creciendo segun marcas una opcion
			$(document).ready(function(){
				$("#ajaxinicio").load("cargainicio.php?formulario=<?php echo $_GET['formulario']?>")
				$("body").on("change","select",function(){
					//$("#formularios").append('<select id="primero"><option></option><option>animal</option><option>vegetal</option><option>mineral</option></select>')
					$.ajax({
						url : 'cargadesplegable.php',
						data : "idparent="+$(this).val(),
						type : 'POST',
						dataType : 'text',
						success : exito,
						error : error
					});
				})
			})
			function error(){
				console.log("error")
			}
			function exito(data){
				console.log(data)
				$("#formularios").append(data)
			}
		</script>
	</body>
</html>