<?php 

include('../connections/config.php');

function fechaNormal($fecha){

	$nfecha = date('d/m/Y',strtotime($fecha));

	return $nfecha;

}

$id = $_POST['id-prod']; 

$proceso = $_POST['pro'];

$nombre = $_POST['nombre'];

$responsabilidades = $_POST['responsabilidades'];


//VERIFICAMOS EL PROCESO

switch($proceso){

	case 'Registro':

	$registro = ("INSERT INTO tb_roles(nom_rol, responsabilidades)VALUES('$nombre', '$responsabilidades')");

	$resultado = mysqli_query($conexion, $registro);

	break;

	

	case 'Edicion':

	$edicion = ("UPDATE tb_roles SET nom_rol = '$nombre', responsabilidades = '$responsabilidades'  WHERE cod_rol = '$id'");

	$resultado = mysqli_query($conexion, $edicion);

	break;

}






// //ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//     $registro = ("SELECT * FROM tb_roles");

//     $resultado = mysqli_query($conexion,$registro);

//     echo '<table class="table table-striped table-condensed table-hover" id="roles">
//               <thead>
//                   <tr>
//                       <th width="100">Cod. Rol</th>
//                       <th width="300">Nombre</th>
//                       <th width="450">Responsabilidades</th>
//                       <th width="10">Opciones</th>
//                   </tr>
//               </thead>';

//   if(!empty($resultado)){   

//   while($registro2 = mysqli_fetch_array($resultado)){

//     echo '<tr>
//               <td>'.$registro2['cod_rol'].'</td>
//               <td>'.utf8_decode($registro2['nom_rol']).'</td>
//               <td>'.utf8_decode($registro2['responsabilidades']).'</td>                 
//               <td>
//                   <a href="javascript:editarRol('.$registro2['cod_rol'].');" class="fal fa-edit"></a> 
//                   <a href="javascript:eliminarRol('.$registro2['cod_rol'].');" class="fal fa-trash-alt icon3"></a>
//               </td>          
//           </tr>';   
//   }
//  echo '</table>';
//   }
// ?>