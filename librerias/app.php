<?
// require_once 'controlador/error.php';

// class App {
	
// 	function __construct(){
// 		echo "<p>Nueva app</p>";

// 		$url = $_GET['url'];
// 		$url = rtrim($url, '/');
// 		$url = explode('/', $url);

// 		// var_dump($url);

// 		$archivoControlador = 'controlador/' . $url[0] . '.php';

// 		if (file_exists($archivoControlador)) {
// 			require_once $archivoControlador;
// 			$controlador = new $url[0];
// 			if (isset($url[1])) {
// 				$controlador->{$url[1]}()
// 			}
// 		} else{
// 			$controlador = new Error();
// 		}
// 	}
// }

?>