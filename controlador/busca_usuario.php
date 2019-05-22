 <?php

include('../connections/config.php');

function fechaNormal($fecha){

		$nfecha = date('d/m/Y',strtotime($fecha));

		return $nfecha;

}

$dato = $_POST['dato'];



//EJECUTAMOS LA CONSULTA DE BUSQUEDA



$registro="SELECT * FROM tb_usuarios,tb_roles WHERE cod_rol_usu = cod_rol AND cod_rol = cod_rol_usu AND  usuario LIKE '%$dato%' OR nom_usu LIKE '%$dato%' ORDER BY usuario ASC";



$resultado=mysqli_query($conexion,$registro);



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX



echo '<table class="table table-striped table-condensed table-hover">

                  <tr>
                      <th width="60">Usuario</th>
                      <th width="220">Nombre</th>
                      <th width="50">Telefono</th>
                      <th width="50">rol</th>
                      <th width="150">Correo Electronico</th>
                      <th width="150">Accesos</th>
                      <th width="150">Opciones</th>
                      <th width="100">Fecha Registro</th>
                  </tr>';



if(!empty($resultado)){

	while($row=mysqli_fetch_array($resultado)){

		echo '<tr>

              <td>'.$row['usuario'].'</td>
              <td>'.utf8_decode($row['nom_usu']).'</td>
              <td>'.$row['telefono_usu'].'</td>
              <td>'.$row['nom_rol'].'</td>
              <td>'.$row['email'].'</td>
              <td><select name="select">
                  <option value="Facturar">Facturar</option> 
                  <option value="Inventario" selected>Inventario</option>
                  <option value="usuario">Usuario</option>
                  </select> 
              </td>                   
              <td>
                  <a href="javascript:editarUsuario('.$row['usuario'].');" class="glyphicon glyphicon-edit"></a> 
                  <a href="javascript:eliminarUsuario('.$row['usuario'].');" class="glyphicon glyphicon-remove-circle icon3"></a>
              </td>          
              <td>'.fechaNormal($row['fecha_registro_usu']).'</td>



              </tr>';   

	}

}else{

	echo '<tr>

				<td colspan="6">No se encontraron resultados</td>

			</tr>';

}

echo '</table>';

?>