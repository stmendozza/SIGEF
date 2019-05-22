<?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$id = $_POST['id'];

//ELIMINAMOS ROL

$eliminar = ("DELETE FROM tb_roles WHERE cod_rol = '$id'");

$resultado = mysqli_query($conexion, $eliminar);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS



// $registro = ("SELECT * FROM tb_roles ORDER BY cod_rol ASC");

// $resultado = mysqli_query($conexion, $registro);

// //CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

// echo '<table class="table table-striped table-condensed table-hover">

//         	<tr>
//               <th width="100">Cod. Rol</th>
//               <th width="300">Nombre</th>
//               <th width="450">Responsabilidades</th>
//               <th width="10">Opciones</th>
//             </tr>';



// if(!empty($resultado)){

// 	while($array = mysqli_fetch_array($resultado)){

// 		echo '<tr>

//               <td>'.$array['cod_rol'].'</td>
//               <td>'.utf8_decode($array['nom_rol']).'</td>
//               <td>'.utf8_decode($array['responsabilidades']).'</td>                 
//               <td>
//                   <a href="javascript:editarRol('.$array['cod_rol'].');" class="glyphicon glyphicon-edit"></a> 
//                   <a href="javascript:eliminarRol('.$array['cod_rol'].');" class="glyphicon glyphicon-remove-circle icon3"></a>
//               </td>   

// 			  </tr>';

// 	}

// }else{

// 	echo '<tr>

// 				<td colspan="6">No se encontraron resultados</td>

// 			</tr>';

// }

// echo '</table>';

// ?>