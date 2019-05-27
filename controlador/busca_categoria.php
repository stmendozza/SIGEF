 <?php

 include('../connections/config.php');

 function fechaNormal($fecha){

 	$nfecha = date('d/m/Y',strtotime($fecha));

 	return $nfecha;

 }

 $dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



 $registro="SELECT * FROM tb_categorias_productos WHERE cod_categ LIKE '%$dato%' OR nom_categ LIKE '%$dato%' ORDER BY cod_categ ASC";



 $resultado=mysqli_query($conexion,$registro);



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



 echo '<table class="table table-striped table-condensed table-hover" id=mitabla"">

 <tr>

 <th width="50">Codigo</th>

 <th width="300">Nombre</th>

 <th width="50">Opciones</th>

 </tr>';



 if(!empty($resultado)){

 	while($row=mysqli_fetch_array($resultado)){

 		echo '<tr>

 		<td>'.$row['cod_categ'].'</td>

 		<td>'.$row['nom_categ'].'</td>

 		<td><a href="javascript:editarCategoria('.$row['cod_categ'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarCategoria('.$row['cod_categ'].');" class="glyphicon glyphicon-remove-circle icon3"></a></td>

 		</tr>';

 	}

 }else{

 	echo '<tr>

 	<td colspan="6">No se encontraron resultados</td>

 	</tr>';

 }

 echo '</table>';

 ?>