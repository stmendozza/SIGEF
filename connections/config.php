<?php  
/*conexion a base de datos*/
$conexion=  new mysqli ('localhost', 'root', '' ,'bd_sigef');
if ($conexion->connect_error) {
	die('Error en la conexion' . $conexion->connect_error);
}

/**
 * 
 */
// class conectar{
	
// 	public function conexion(){
// 		$conexion=mysqli_connect('localhost','root','','bd_sigef');
// 		$conexion->set_charset('utf8');
// 		return $conexion;
// 	}
// }

?>
