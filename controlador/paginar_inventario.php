 <?php

  // require_once '../connections/config.php';

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

                            
              $sql="SELECT * FROM  tb_productos ORDER BY descripcion ASC";
              include('../connections/config.php');
              $resultado = $conexion->query( $sql );
              echo "  <table class='table table-condensed display' id='inventario'> 
                  <thead>
                  <tr>
                    
                    <th width='100'>Cod.Producto</th>
                    <th width='300'>Descripcion</th>
                    <th width='20'>STOCK</th>
                    <th width='80' ><center>Estado</center></th>
                    <th width='50'>Costo</th>  
                    <th width='50' >KARDEX</th>
                    <th width='60'>Lote</th> 
                    <th width='150'>Fecha Caducidad</th>
                      
                  </tr>
                  </thead>";
              $i=1;
              while ($row=mysqli_fetch_row($resultado)){
        if ($row[6]=='disponible' ) {
            $color="badge-success";
        }
        if ($row[6]=='agotandose') {
            $color='badge-secondary';
        }
        if ($row[6]=='en cuarentena') {
        $color='badge-danger';
        }
        if ($row[6]=='agotado') {
        $color='badge-dark';
        }
                echo '
                    <tr>
                   
                    <td>'.$row[1].'</td>
                    <td>'.utf8_decode($row[2]).'</td>
                    <td>'.$row[5].'</td>
                    <td align="center" style="font-size:18px;"><span class=" badge '.$color.'">'.utf8_decode($row[6]).'</span></td>                    
                    <td>'.$row[3].'</td>
                    <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#mostar-kardex"><span style="color: #384C87;" class="fa fa-eye"></span></button>
                    </td>   
                     
                    <td>'.$row[9].'</td>
                    <td  style="background-color:#C9302C; color:white;"><center>'.fechaNormal($row[10]).'</center></td>                  
                  </tr>';

              }
              echo "  </table>
                ";  
?>