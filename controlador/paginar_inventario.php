 <?php

  // require_once '../connections/config.php';

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

                            
              $sql="SELECT * FROM  tb_productos ";
              include('../connections/config.php');
              $resultado = $conexion->query( $sql );
              echo "  <table class='table table-condensed display' id='inventario'> 
                  <thead>
                  <tr>
                    <th width='20'>#</th>
                    <th width='100'>Cod.Producto</th>
                    <th width='300'>Descripcion</th>
                    <th width='20'>Cantidad</th>
                    <th width='50' >Estado</th>
                    <th width='100'>Costo</th>  
                    <th width='50' >KARDEX</th>
                    <th width='60'>Lote</th> 
                    <th width='150'>Fecha Caducidad</th>
                      
                  </tr>
                  </thead>";
              $i=1;
              while ($row=mysqli_fetch_row($resultado)){
        if ($row[5]=='disponible' ) {
            $color='badge-success';
        }
        if ($row[5]=='agotandose') {
            $color='badge-secondary';
        }
        if ($row[5]=='en cuarentena') {
        $color='badge-danger';
        }
        if ($row[5]=='agotado') {
        $color='badge-dark';
        }
                echo "
                    <tr>
                      <td>".$i++."</td>
                    <td>".$row[0]."</td>
                    <td>".utf8_decode($row[1])."</td>
                    <td>".$row[3]."</td>
                    <td align='center' style='font-size:18px;'><span class='badge $color'>".utf8_decode($row[5])."</span></td>
                    <td>".$row[4]."</td>
                    <td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#mostar-kardex'><span style='color: #384C87;' class='fa fa-eye'></span></button></td>   
                     
                    <td>".$row[8]."</td>
                    <td  style='background-color:#C9302C; color:white;'><center>".fechaNormal($row[9])."</center></td>                  
                  </tr>";

              }
              echo "  </table>
                  ";  
?>