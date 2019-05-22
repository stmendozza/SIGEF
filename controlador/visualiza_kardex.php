<?php

include('../connections/config.php');



$id = $_POST['id'];



//OBTENEMOS LOS VALORES DEL PRODUCTO



$valores = ("SELECT * FROM tb_kardex WHERE cod_kardex = '$id'");



$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

				0 => $valores2['cod_producto'], 

				1 => $valores2['descripcion'], 

				2 => $valores2['precio_compra'], 

				3 => $valores2['fecha_registro'],

				);

echo json_encode($datos);

?>