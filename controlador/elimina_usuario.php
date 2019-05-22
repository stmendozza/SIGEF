<?php

include('../connections/config.php');

$id = $_POST['id'];

//ELIMINAMOS USUARIO

$eliminar = ("DELETE FROM tb_usuarios WHERE usuario = '$id'");

$resultado = mysqli_query($conexion, $eliminar);

?>