<?php

include('../connections/config.php');



$id = $_POST['id'];


//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = ("SELECT * FROM tb_usuarios WHERE usuario = '$id'");

$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

	0 => $valores2['usuario'],

	1 => $valores2['nom_usu'], 

	2 => $valores2['telefono_usu'], 

	3 => $valores2['direccion_usu'],

	4 => $valores2['email']

);
echo json_encode($datos);
?>