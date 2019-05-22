<?php 

include('../connections/config.php');

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$nom_usu = $_POST['nom_usu'];

$telefono_usu = $_POST['telefono_usu'];

$email = $_POST['email'];

$direccion_usu = $_POST['direccion_usu'];

$usuario = $_POST['usuario'];

$cod_rol_usu = 9;


// $fecha = $_POST['fecha_registro'];

//$fecha = date('Y-m-d');

//VERIFICAMOS EL PROCESO



switch($proceso){

	case 'Registro':

		$registro = ("INSERT INTO tb_usuarios ( cod_rol_usu, usuario, nom_usu, telefono_usu, email, direccion_usu)VALUES( '$cod_rol_usu', '$usuario', '$nom_usu', '$telefono_usu', '$email','$direccion_usu')");

		$resultado = mysqli_query($conexion, $registro);

		$registro = ("INSERT INTO tb_clientes (cod_usuario_clie)VALUES('$usuario')");

		$resultado = mysqli_query($conexion, $registro);
	break;

	

	case 'Edicion':

		$edicion = ("UPDATE tb_clientes SET cod_clie = '$cod_clie', nom_usu = '$nom_usu', telefono_usu = '$telefono_usu', direccion_usu = '$direccion_usu' WHERE cod_clie = '$id'");

		$resultado = mysqli_query($conexion, $edicion);

	break;

}





//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



$registro = ("SELECT * FROM tb_clientes, tb_usuarios WHERE cod_usuario_clie = usuario ORDER BY cod_clie ASC");

$resultado = mysqli_query($conexion, $registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX




echo '<table class="table table-striped table-condensed table-hover">

        	<tr>

		      <th width="20">Codigo</th>
              <th width="25">Usuario</th>
              <th width="100">Nombre</th>
              <th width="50">Telefono</th>
              <th width="200">Direccion</th>
              <th width="200">Correo Electromico</th>
              <th width="150">F. de registro</th>
              <th width="10">Opciones</th>

            </tr>';

	while($registro2 = mysqli_fetch_array($resultado)){

		echo '<tr>

				<td>'.$registro2['cod_clie'].'</td>

				<td>'.$registro2['usuario'].'</td>

				<td>'.$registro2['nom_usu'].'</td>

				<td>'.$registro2['telefono_usu'].'</td>

				<td>'.$registro2['direccion_usu'].'</td>

				<td>'.$registro2['email'].'</td>

				<td>'.$registro2['fecha_registro_usu'].'</td>


				<td><a href="javascript:editarCliente('.$registro2['cod_clie'].');" class="fal fa-edit"></a> <a href="javascript:eliminarCliente('.$registro2['cod_clie'].');" class="fal fa-trash-alt icon3"></a></td>

				</tr>';	

				

	}

echo '</table>';

?>