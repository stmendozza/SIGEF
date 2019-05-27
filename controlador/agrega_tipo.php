<?php 
 
include('../connections/config.php');

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$nombre = $_POST['nom_tipo'];


// $fecha = $_POST['fecha_registro'];

//$fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO



switch($proceso){

	case 'Registro':

		$registro = ("INSERT INTO tb_tipos_productos (nom_tipo)VALUES('$nombre')");

		$resultado = mysqli_query($conexion, $registro);


		// $registro = ("INSERT INTO tb_provedores (cod_usuario_prove)VALUES('$usuario')");

		// $resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

		$edicion = ("UPDATE tb_tipos_productos SET nom_tipo = '$nombre' WHERE cod_tipo = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

	break;

}
?>