<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require_once "scripts.php"; ?>
</head>
<body >
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading"style="text-align: center;">Iniciar Sesión</div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/uta.jpg" height="250">
					</div>
					<p></p>
					<label>Usuario</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Contraseña</label>
					<input type="password" id="password" class="form-control input-sm" name="">
					<p></p>
					<span class="btn btn-primary" id="entrarSistema">Ingresar</span>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Complete el campo de usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Complete el campo de password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){

							if(r==1){

							alert('Bienvenido '+ $('#usuario').val()+'  Gracias Por Acceder al Sistema');
							window.location="indexAdmin.php";
							session_start();

							} else if(r==2){
							alert('Bienvenida Secretaria: '+ $('#usuario').val()+'  Gracias Por Acceder al Sistema');
							window.location="indexSecretaria.php";
							session_start();
							}
							else{
							alertify.alert("Usuario y/o Contraseña Incorrectos");
							}
						}
					});
		});	
	});
</script>