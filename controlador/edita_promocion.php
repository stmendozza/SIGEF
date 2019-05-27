<?php

include('../connections/config.php');



$id = $_POST['id'];



//OBTENEMOS LOS VALORES DEL PRODUCTO



$valores = ("SELECT * FROM tb_promociones WHERE cod_promo = '$id'");

$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

	0 => $valores2['descripcion_promo'], 

);

echo json_encode($datos);

?>