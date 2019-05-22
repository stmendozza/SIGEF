<?php

include('../connections/config.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = ("SELECT * FROM tb_provedores WHERE cod_prove = '$id'");

$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

				// 0 => $valores2['nombre'], 

				// 1 => $valores2['telefono'], 

				// 2 => $valores2['correo'],

				// 3 => $valores2['direccion'],

				0 => $valores2['usuario'],

				);

echo json_encode($datos);

?>