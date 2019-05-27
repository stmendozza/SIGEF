 <?php 

 include('../connections/config.php');

 function fechaNormal($fecha){ 

 	$nfecha = date('d/m/Y',strtotime($fecha));

 	return $nfecha;

 }

 $dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



 $registro="SELECT * FROM tb_promociones WHERE cod_promo LIKE '%$dato%' OR descripcion_promo LIKE '%$dato%' ORDER BY cod_promo ASC";



 $resultado=mysqli_query($conexion,$registro);



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



 echo '<table class="table table-striped table-condensed table-hover" id=mitabla"">

 <tr>

 <th width="50">Codigo</th>
 <th width="500">Descripcion Promo</th>
 <th width="200">F. de Registro</th>
 <th width="50">Opciones</th>

 </tr>';



 if(!empty($resultado)){

 	while($row=mysqli_fetch_array($resultado)){

 		echo '<tr>

 		<td>'.$row['cod_promo'].'</td>
 		<td>'.utf8_decode($row['descripcion_promo']).'</td>
 		<td>'.fechaNormal($row['fecha_registro_promo']).'</td>
 		<td><a href="javascript:editarPromocion('.$row ['cod_promo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarPromocion('.$row ['cod_promo'].');" class="fal fa-trash-alt icon3"></a></td>

 		</tr>';

 	}

 }else{

 	echo '<tr>

 	<td colspan="6">No se encontraron resultados</td>

 	</tr>';

 }

 echo '</table>';

 ?>