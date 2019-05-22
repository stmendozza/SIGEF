<?php
include('../connections/config.php');
function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = ("SELECT * FROM tb_productos WHERE cod_prod LIKE '%$dato%' OR descripcion LIKE '%$dato%' ORDER BY cod_prod ASC");
$resultado = mysqli_query($conexion, $registro);
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo "<table class='table table-striped table-condensed table-hover'>
        	<tr>
                <th width='20'>#</th>
				<th width='100'>Cod.Producto</th>
				<th width='300'>Descripcion</th>
				<th width='20'>Cantidad</th>
				<th width='50' >Estado</th>
				<th width='100'>Costo</th>	
				<th width='50' ><center>KARDEX</center></th>
				<th width='60'>Lote</th>	
				<th width='150'>Fecha Caducidad</th>				
            </tr>";
if(!empty($resultado)){
	$i=1;
	while($registro2 = mysqli_fetch_array($resultado)){
		if ($registro2['estado']=='disponible' ) {
			$color='badge-success';
		}
		if ($registro2['estado']=='agotandose') {
			$color='badge-warning';
		}
		if ($registro2['estado']=='en cuarentena') {
      	$color='badge-danger'; 
    	}
        if ($registro2['estado']=='agotado') {
      	$color='badge-default';
    	}
		echo "<tr>
				<td>".$i++."</td>
				<td>".$registro2['cod_prod']."</td>
				<td>".$registro2['descripcion']."</td>
				<td>".$registro2['cantidad']."</td>
				<td align='center' style='font-size:18px;'><span  class='badge $color'>".utf8_decode($registro2['estado'])."</span></td>
				<td>".$registro2['precio_costo']."</td>
				
				<td><button type='button' class='col-xs-12 btn btn-link' data-toggle='modal' data-target='#mostar-kardex'><span style='color: #384C87;' class='fa fa-eye'></span></button></td>

				<td>".$registro2['lote']."</td>
				<td  style='background-color:#C9302C; color:white;'><center>".fechaNormal($registro2['fecha_vencimiento'])."</center></td>	

				</tr>";
	 
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
		  </tr>';
}
echo '</table>';
?>


<!-- <center><a href='javascript:visualizarkardex(".$registro2['cod_prod'].");' class='glyphicon glyphicon-eye-open' style='color:black;'></a></center> -->