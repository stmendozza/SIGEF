<?php
function fechaNormal($fecha){

  $nfecha = date('d/m/Y',strtotime($fecha));

  return $nfecha;

}    
$sql="SELECT * FROM tb_productos WHERE estado = 'en cuarentena' ORDER BY fecha_vencimiento ASC";
include('../connections/config.php');
$resultado = $conexion->query( $sql );
echo "  <table class='table table-condensed display' id='en_cuarentena'> 
<thead>
<tr>
<th width='30'>Codigo</th>
<th width='300'>Descripcion</th>
<th width='200'>Precio Distribuidor</th>
<th width='200'>Estado</th>                     
<th width='200'>Fecha Vencimiento</th>
</tr>
</thead>";

while ($row=mysqli_fetch_row($resultado)) 
{
  echo "
  
  <tr>
  <td>".$row[1]."</td>
  <td>".utf8_decode($row[2])."</td>
  <td>S/. ".$row[3]."</td>
  <td align='center' style='font-size:18px;''><span class='badge badge-danger'>".$row[6]."</span></td>
  <td>".fechaNormal($row[10])."</td>
  </tr>
  ";
}
echo "</table>";  
?>