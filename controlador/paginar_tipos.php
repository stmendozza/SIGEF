 <?php

  include('../connections/config.php');

  function fechaNormal($fecha){

    $nfecha = date('d/m/Y',strtotime($fecha));

    return $nfecha;

}

    $registro = ("SELECT * FROM tb_tipos_productos");

    $resultado = mysqli_query($conexion,$registro);

    echo '<table class="table table-striped table-condensed table-hover" id="tipos">
              <thead>
                  <tr>

                      <th width="50">Codigo</th>

                      <th width="300">Nombre</th>

                      <th width="50">Opciones</th>

                  </tr>
              </thead>';

  if(!empty($resultado)){   

  while($registro2 = mysqli_fetch_array($resultado)){

    echo '<tr>

              <td>'.$registro2['cod_tipo'].'</td>
              <td>'.utf8_decode($registro2['nom_tipo']).'</td>
              <td><a href="javascript:editarTipo('.$registro2['cod_tipo'].');" class="fal fa-edit"></a> <a href="javascript:eliminarTipo('.$registro2['cod_tipo'].');" class="fal fa-trash-alt icon3"></a></td>

              </tr>';   

  }
 echo '</table>';
  }
?>