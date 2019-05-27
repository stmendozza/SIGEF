 <?php

 include('../connections/config.php');

 function fechaNormal($fecha){

  $nfecha = date('d/m/Y',strtotime($fecha));

  return $nfecha;

}

$registro = ("SELECT * FROM tb_categorias_productos");

$resultado = mysqli_query($conexion,$registro);

echo '<table class="table table-striped table-condensed table-hover" id="categorias">
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

    <td>'.$registro2['cod_categ'].'</td>

    <td>'.$registro2['nom_categ'].'</td>

    <td><a href="javascript:editarCategoria('.$registro2['cod_categ'].');" class="fal fa-edit"></a> <a href="javascript:eliminarCategoria('.$registro2['cod_categ'].');" class="fal fa-trash-alt icon3"></a></td>

    </tr>';   

  }
  echo '</table>';
}
?>