<?php 

session_start();

include "../connections/config.php";

	// si el usuario esta conectado muestra el sitio de chat si no lo redirige al index para que se logee o se registre

if (isset($_SESSION['usuario']))

{

	$usuario=$_POST['usuario'];

	$nombre=$_POST['nombre'];

	$celular=$_POST['celular'];

	$direccion=$_POST['direccion'];

	$correo=$_POST['correo'];



		include ('../controlador/funciones.php');//llamo la funciones





		$sql = "update tb_usuarios set usuario= '$usuario', nom_usu= '$nombre', telefono_usu='$celular', direccion_usu='$direccion', email='$correo' where usuario= '".$_SESSION['usuario']."'";

		//echo $sql;

		//indico cuales seran los campos a modificar con sus respectivos valores siguiendo con los parametros que se asigno en la funcion de actualizar

		// include("../connections/config.php");

		$resultado = $conexion->query( $sql );

		if( $conexion->affected_rows > 0 )

			{	session_destroy();

				session_start();

				
				$_SESSION['usuario'] = $usuario;
				$_SESSION['nom_usu'] = $nombre;
					// $_SESSION['cod_usuario'] = $cod_usuario;
					echo "<script>location.href='../controlador/usuario.php'</script>";//me retorna a la pantalla inicial



				}else{

					echo "<script> alert ('Error: no se han actualizado los datos de la tabla en la base de datos.') </script>";

						echo "<script>location.href='../controlador/usuario.php'</script>";//me retorna a la pantalla inicial

					}

//echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

				}else{

					

					header("location: ../index.php");

				} 

				?>