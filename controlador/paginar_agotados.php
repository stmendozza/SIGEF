 <?php
  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}             
              $sql="SELECT * FROM tb_productos WHERE cantidad <= cantidad_min ORDER BY cantidad ASC";
              include('../connections/config.php');
              $resultado = $conexion->query( $sql );
              echo "  <table class='table table-condensed display' id='agotados'> 
                  <thead>
                  <tr>
                      <th width='30'>Codigo</th>

                      <th width='200'>Nombre</th>

                      <th width='100'>Precio Distribuidor</th>

                      <th width='10'>Cantidad</th>

                      <th width='200'>Fecha Registro</th>

                      
                  </tr>
                  </thead>";

              while ($row=mysqli_fetch_row($resultado)) 
              {
                echo "
                    <tr>
                      <td>".$row[0]."</td>

                      <td>".utf8_decode($row[1])."</td>

                      <td>S/. ".$row[2]."</td>

                      <td align='center' style='font-size:18px;''><span class='badge badge-dark'>".$row[4]."</span></td>

                      <td>".fechaNormal($row[9])."</td>
                  </tr>";

              }
              echo "</table>";  
?>