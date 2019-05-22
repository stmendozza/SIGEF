<?php

include('../connections/config.php');



$id = $_POST['id'];



//OBTENEMOS LOS VALORES DEL PRODUCTO



$valores = ("SELECT * FROM tb_productos WHERE cod_prod = '$id'");



$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

				0 => $valores2['codigo_producto'], 

				1 => $valores2['descripcion'], 

				2 => $valores2['precio_costo'], 

				3 => $valores2['categoria'],

				4 => $valores2['tipo'],

				);

echo json_encode($datos);

?>