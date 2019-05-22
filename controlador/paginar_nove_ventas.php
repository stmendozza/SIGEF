 <?php

  // require_once '../connections/config.php';

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

                            
              $sql="SELECT * FROM  tb_productos ";
              include('../connections/config.php');
              $resultado = $conexion->query( $sql );
              echo "  <table class='table table-condensed display' id='nove_ventas'> 
                  <thead>
                  <tr>
                      <th>Codigo Producto</th>
                      <th>Descripcion</th>
                      <th>Precio de compra</th> 
                      <th>Fecha registro</th> 
                      <th>Opciones</th>
                      
                  </tr>
                  </thead>";

              while ($row=mysqli_fetch_row($resultado)) 
              {
                echo "
                    <tr>
                      <td>".$row[0]."</td>
                      <td>".$row[1]."</td>  
                      <td>".$row[2]."</td>
                      <td>".$row[3]."</td>
                      <td align='center'><a href='javascript:editarIngreso(".$row[0].");' class='fal fa-edit'></a> 
                  <a href='javascript:eliminarIngreso(".$row[0].");' class='fal fa-trash-alt icon3'></a></td>
                  </tr>";

              }
              echo "  </table>
                  ";  
?>