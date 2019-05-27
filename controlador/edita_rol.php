<?php
include('../connections/config.php');

$id = $_POST['id'];
//OBTENEMOS LOS VALORES
$valores = ("SELECT * FROM tb_roles WHERE cod_rol = '$id'");

$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);

$datos = array(
	0 => $valores2['nom_rol'], 
	1 => $valores2['responsabilidades'],
);
echo json_encode($datos);
?>