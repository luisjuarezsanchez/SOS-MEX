<?php
#Autor: Luis Jair
#Fecha: Junio 2021
# Codigo PHP que lleva acabo la validacion de las credenciales de acceso del formulario de inicio de sesion para brigadistas, para acceder al Bot de brigadistas
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","sosmex");

$consulta="SELECT*FROM topos where usuario='$usuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
	header("location:chatbotb.php");
}else{
	?>
	<?php
	include("Login.php");
	?>
	<script>
			alert("Usuario o contraseña incorrectos");
	</script>
	
	<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
