<?php

include('../connections/config.php');

function fechaNormal($fecha){

	$nfecha = date('d/m/Y',strtotime($fecha));

	return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$nombre = $_POST['nombre'];

$telefono = $_POST['telefono'];

$correo = $_POST['correo'];

$direccion = $_POST['direccion'];

$usuario = $_POST['usuario'];

// $fecha = $_POST['fecha_registro'];

//$fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO



switch($proceso){

	case 'Registro':

	$registro = ("INSERT INTO tb_usuarios ( usuario, nom_usu, telefono_usu, email, direccion_usu)VALUES( '$usuario', '$nombre', '$telefono', '$correo','$direccion')");

	$resultado = mysqli_query($conexion, $registro);

	$registro = ("INSERT INTO tb_provedores (cod_usuario_prove)VALUES('$usuario')");

	$resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

	$edicion = ("UPDATE tb_provedores SET cod_prove = '$cod_prove', nom_prove = '$nombre', telefono_prove = '$telefono', direccion_prove = '$direccion' WHERE cod_prove = '$id'");

	$resultado = mysqli_query($conexion, $edicion);

	break;

}





//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_provedores, tb_usuarios WHERE cod_usuario_prove = usuario ORDER BY cod_prove ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX




echo '<table class="table table-striped table-condensed table-hover">

<tr>

<th width="20">Codigo</th>
<th width="200">Nombre</th>
<th width="100">telefono</th>
<th width="300">Email</th>
<th width="300">Direccion</th>
<th width="10">Opciones</th>

</tr>';

while($registro2 = mysqli_fetch_array($resultado)){

	echo '<tr>

	<td>'.$registro2['cod_prove'].'</td>
	<td>'.$registro2['nom_usu'].'</td>
	<td>'.$registro2['telefono_usu'].'</td>
	<td>'.$registro2['email'].'</td>
	<td>'.$registro2['direccion_usu'].'</td>

	<td><a href="javascript:editarProvedor('.$registro2['cod_prove'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProvedor('.$registro2['cod_prove'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

	</tr>';	

	

}

echo '</table>';

// ?>