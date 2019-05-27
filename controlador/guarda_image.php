<?php 

include('config.php');

$image= addcslashes(file_get_contents($_FILES['file']['tmp_name']));



$sql= "INSERT INTO tb_usuarios imagen VALUES ('$image')";

$resultado = mysql_query($conexion,$sql);

?>