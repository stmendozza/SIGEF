<?php
include('config.php');
function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro="SELECT * FROM tb_movimientos WHERE cod_producto LIKE '%$dato%' OR descripcion LIKE '%$dato%' ORDER BY cod_movimiento DESC";

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

if(!empty($resultado)){
	while($row=mysqli_fetch_array($resultado)){
		echo '<tr>
              <td>'.$row['cod_movimiento'].'</td>
              <td>'.$row['cod_producto'].'</td>
              <td>'.$row['descripcion'].'</td>
              <td>'.$row['cantidad'].'</td>
              <td>'.$row['tipo_movimiento'].'</td>
              <td>S/. '.$row['valor_movimiento'].'</td>
              <td>'.fechaNormal($row['fecha_movimiento']).'</td>
              <td>'.$row['factura'].'</td>
              <td>'.$row['identificacion_externo'].'</td>
              <td>'.$row['usuario'].'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';

?>	