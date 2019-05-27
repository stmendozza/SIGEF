<?php 



/*manejando sesiones siempre va de primero el session para no mostrar el sitio si no hay un usuario conectado*/ 

session_start();

require '../connections/config.php';

require '../controlador/funciones.php';	



	// si el usuario esta conectado muestra el sitio de chat si no lo redirige al index para que se logee o se registre

if (isset($_SESSION['usuario']))

{			 



	

	$actualpass= $conexion->real_escape_string($_POST['actualpass']);

	$nuevapass= $conexion->real_escape_string($_POST['nuevapass']);

	$confirmapass= $conexion->real_escape_string($_POST['confirmapass']);



	global $conexion;

	

	$stmt = $conexion->prepare("SELECT pass FROM tb_usuarios WHERE usuario = ? LIMIT 1");

	$stmt->bind_param("s", $_SESSION['usuario']);

	$stmt->execute();

	$stmt->store_result();

	$rows = $stmt->num_rows;

	

	if($rows > 0) 

	{			

		$stmt->bind_result($passwd);

		$stmt->fetch();

		

		$validaPassw = password_verify($actualpass, $passwd);

		

		if($validaPassw)

		{

			if(validacontraseñas($nuevapass, $confirmapass))

			{

				$id=$_SESSION['usuario'];

				$pass_hash = hashcontraseña($nuevapass);

				$sql = "update tb_usuarios set pass= '$pass_hash'  where usuario='$id'";

						//indico cuales seran los campos a modificar con sus respectivos valores siguiendo con los parametros que se asigno en la funcion de actualizar

				include("../connections/config.php");

				$resultado = $conexion->query( $sql );

				if( $conexion->affected_rows > 0 )

				{	

					echo "<script> alert ('Contraseña Modificada.') </script>";

									echo "<script>location.href='../controlador/usuario.php'</script>";//me retorna a la pantalla inicial

									



								}else

								{

									echo "<script> alert ('Error: no se han actualizado los datos, Verifique la informacion que desea ingresar.') </script>";

										echo "<script>location.href='../controlador/usuario.php'</script>";//me retorna a la pantalla inicial

										

									}	

								}else

								{

									$errors[] = "Las contraseñas no coinciden";

								}

						// if ($nuevapass==$confirmapass) {

								

						// 	$sql = "update tb_usuarios set pass= '$nuevapass'  where usuario='$id'";

						// 	//indico cuales seran los campos a modificar con sus respectivos valores siguiendo con los parametros que se asigno en la funcion de actualizar

						// 	include("config.php");

						// 		$resultado = $conexion->query( $sql );

						// 		if( $conexion->affected_rows > 0 )

						// 			{	

						// 				echo "<script> alert ('Contraseña Modificada.') </script>";

						// 				echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

								



						// 			}else{

						// 					echo "<script> alert ('Error: no se han actualizado los datos, Verifique la informacion que desea ingresar.') </script>";

						// 					echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

								

						// 				}

						// }else

						// {

						// echo "<script> alert('Las contraseñas no coinciden'); </script>";

						// echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

						// }



					//$_SESSION['tipo_usuario'] = $id_tipo;

								

					//header("location: stockdispo.php");

							} else 

							{

								$errors = "La contrase&ntilde;a es incorrecta";

							}

						} else

						{

							echo "<script> alert('la consulta no se realizo'); </script>";

						}

						

	// 	$id=$_SESSION['usuario'];

	// 	$sql = "select * from tb_usuarios where usuario = '$id'";

						

	// 	include("config.php");

	// 	$resultado = $conexion->query( $sql );

	// 	$row = mysqli_fetch_row($resultado);



	// 	if ($actualpass==$row[1]) {

	// 		if ($nuevapass==$confirmapass) {

						

	// 			$sql = "update tb_usuarios set pass= '$nuevapass'  where usuario='$id'";

	// 			//indico cuales seran los campos a modificar con sus respectivos valores siguiendo con los parametros que se asigno en la funcion de actualizar

	// 			include("config.php");

	// 				$resultado = $conexion->query( $sql );

	// 				if( $conexion->affected_rows > 0 )

	// 					{	

	// 						echo "<script> alert ('Contraseña Modificada.') </script>";

	// 						echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

						



	// 					}else{

	// 							echo "<script> alert ('Error: no se han actualizado los datos, Verifique la informacion que desea ingresar.') </script>";

	// 							echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

						

	// 						}

	// 		}else

	// 		{

	// 		echo "<script> alert('Las contraseñas no coinciden'); </script>";

	// 		echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

	// 		}

	// 	}else

	// 	{

	// 		echo "<script> alert('Contraseña incorrecta'); </script>";

	// 		echo "<script>location.href='usuario.php'</script>";//me retorna a la pantalla inicial

	// 	}

					}else{

						

						header("location: ../index.php");

					}



					?>