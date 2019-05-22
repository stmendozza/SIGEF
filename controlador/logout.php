<?php 
	session_start();
	unset($_SESSION['usuario']);
	session_destroy();
	echo  "<script>location.href='../index.php'</script>";
?>