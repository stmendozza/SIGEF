<?php

include('../connections/config.php');

$id = $_POST['id-prod'];

$proceso = $_POST['pro'];

$nombre = $_POST['nom_categ'];


//fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO

switch($proceso){

	case 'Registro':

		$registro = ("INSERT INTO tb_categorias_productos (nom_categ)VALUES('$nombre')");

		$resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

		$edicion = ("UPDATE tb_categorias_productos SET nom_categ = '$nombre' WHERE cod_categ = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

	break;

}
?>