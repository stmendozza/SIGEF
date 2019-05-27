<?php 
/*conexion a base de datos*/
$conexion=  new mysqli ('localhost', 'root', '' ,'bd_sigefp');
if ($conexion->connect_error) {
	die('Error en la conexion' . $conexion->connect_error);
}

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>