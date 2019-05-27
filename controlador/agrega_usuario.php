<?php

include('../connections/config.php');

function fechaNormal($fecha){

	$nfecha = date('d/m/Y',strtotime($fecha));

	return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$usuario = $_POST['usuario'];

$nombre = $_POST['nom_usu'];

$telefono = $_POST['telefono_usu'];

// $rol = $_POST['rol'];

$direccion = $_POST['direccion_usu'];

$correo = $_POST['email'];

//$fecha = date('Y-m-d');


//VERIFICAMOS EL PROCESO
switch($proceso){

	case 'Registro':


	$registro = ("INSERT INTO tb_usuarios (usuario, nom_usu, telefono_usu, email, direccion_usu)VALUES('$usuario', '$nombre', '$telefono', '$correo','$direccion')");

	$resultado = mysqli_query($conexion, $registro);

	

	break;

	

	case 'Edicion':

	$registro = ("UPDATE tb_usuarios SET usuario = '$usuario', nom_usu = '$nombre', telefono_usu = '$telefono', email = '$correo', direccion_usu = '$direccion' WHERE usuario = '$id'");

	$resultado = mysqli_query($conexion, $registro);

	break;

}
?>