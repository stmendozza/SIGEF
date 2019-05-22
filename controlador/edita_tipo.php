<?php
 
include('../connections/config.php');



$id = $_POST['id'];



//OBTENEMOS LOS VALORES DEL PRODUCTO



$valores = ("SELECT * FROM tb_tipos_productos WHERE cod_tipo = '$id'");

$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

				0 => $valores2['nom_tipo'], 

				);

echo json_encode($datos);

?>