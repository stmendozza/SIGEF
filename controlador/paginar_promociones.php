 <?php

  include('../connections/config.php');

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

    $registro = ("SELECT * FROM tb_promociones");

    $resultado = mysqli_query($conexion,$registro);

    echo '<table class="table table-striped table-condensed table-hover" id="promos">
              <thead>
                  <tr>

                      <th width="50">Codigo</th>

                      <th width="300">Nombre</th>

                      <th width="100">F. de Registro</th>

                      <th width="50">Opciones</th>

                  </tr>
              </thead>';

  if(!empty($resultado)){   

  while($registro2 = mysqli_fetch_array($resultado)){

    echo '<tr>

              <td>'.$registro2['cod_promo'].'</td>
              <td>'.utf8_decode($registro2['descripcion_promo']).'</td>
              <td>'.utf8_decode($registro2['fecha_registro_promo']).'</td>
              <td><a href="javascript:editarPromocion('.$registro2['cod_promo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarPromocion('.$registro2['cod_promo'].');" class="fal fa-trash-alt icon3"></a></td>

              </tr>';   

  }
 echo '</table>';
  }
?>