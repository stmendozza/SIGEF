<?php

include('../connections/config.php');



$id = $_POST['id'];



//OBTENEMOS LOS VALORES DEL PRODUCTO



$valores = ("SELECT cod_clie, usuario, nom_usu, telefono_usu, direccion_usu, email,  fecha_registro_usu  FROM tb_clientes, tb_usuarios WHERE cod_usuario_clie = usuario AND cod_clie = '$id'");

$resultado = mysqli_query($conexion, $valores);

$valores2 = mysqli_fetch_array($resultado);



$datos = array(

				0 => $valores2['usuario'], 

				1 => $valores2['nom_usu'], 

				2 => $valores2['telefono_usu'], 

				3 => $valores2['email'],

				4 => $valores2['direccion_usu'],

				);

echo json_encode($datos);

?>