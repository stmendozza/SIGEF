<?php 

	

	require '../connections/config.php';

	require 'funciones.php';

	

	$user_id = $conexion->real_escape_string($_POST['user_id']);

	$token = $conexion->real_escape_string($_POST['token']);

	$password = $conexion->real_escape_string($_POST['password']);

	$con_password = $conexion->real_escape_string($_POST['con_password']);

	

	if(validacontraseñas($password, $con_password))

	{

		

		$pass_hash = hashcontraseña($password);

		

		if(cambiaPassword($pass_hash, $user_id, $token))

		{

			echo "Contrase&ntilde;a Modificada <br> <a href='../index.php' >Iniciar Sesion</a>";

			} else {

			

			echo "Error al modificar contrase&ntilde;a";

			

		}

		

		} else {

		

		echo 'Las contraseñas no coinciden';

		

	}

	

?>	