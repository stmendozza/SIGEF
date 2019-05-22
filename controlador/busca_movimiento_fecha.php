<?php
include('config.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}
function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = "SELECT * FROM tb_movimientos WHERE fecha_movimiento BETWEEN '$desde' AND '$hasta' ORDER BY cod_movimiento ASC";
$resultado=mysqli_query($conexion,$registro);
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="50">#</th>
            	<th width="150">CODIGO </th>
                <th width="300">ITEM</th>
               	<th width="150">STOCK</th>
               	<th width="150">MOVIMIENTO</th>
               	<th width="150">VALOR</th>
               	<th width="150">FECHA</th>
                <th width="150"> FACTURA </th>
                <th width="150"> EXTERNO  </th>
                <th width="150">ADMIN</th>
                
                
            </tr>';
            // <th width="50">Opciones</th>

if(!empty($resultado)){
	while($array = mysqli_fetch_array($resultado)){
		echo '<tr>
				<td>'.$array['cod_movimiento'].'</td>
				<td>'.$array['cod_producto'].'</td>
				<td>'.$array['descripcion'].'</td>
				<td>'.$array['cantidad'].'</td>
				<td>'.$array['tipo_movimiento'].'</td>
				<td>S/. '.$array['valor_movimiento'].'</td>
				<td>'.fechaNormal($array['fecha_movimiento']).'</td>
				<td>'.$array['factura'].'</td>
				<td>'.$array['identificacion_externo'].'</td>
				<td>'.$array['usuario'].'</td>
				
				
				
				</tr>';
				// <td><a href="javascript:editarProducto('.$array['cod_producto'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$array['cod_producto'].');" class="glyphicon glyphicon-remove-circle"></a></td>
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>