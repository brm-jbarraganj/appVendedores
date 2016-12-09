<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require("db/requires.php");
$General = new General();
$error=-1;
$data="";
switch ($_POST['accion']) {

	/* Inserta categorías y subcategorías */
	case 'setCategoria':
		if (isset($_POST['nombre']) && $_POST['nombre'] != "" && 
			isset($_POST['imagen']) && $_POST['imagen'] != "") {
			$Categoria = new General();
			$Categoria->nombre = $_POST['nombre'];
			$Categoria->imagen = $_POST['imagen'];
			$Categoria->idPadre = (isset($_POST['idCategoria']) && $_POST['idCategoria'] > 0) ? $_POST['idCategoria'] : 0;
			$Categoria->fechaMod = date("Y-m-d H:i:s");
			$idCategoria = $Categoria->setInstancia('VenCategoria');
			if ($idCategoria > 0) {
				$data = $idCategoria;
				$error = 1;
			} else {
				$error = 0;
			}
		}else{
			$error=3;
		}
	
	break;

	/* Lista categorías */
	case 'getCategorias':
		$categorias = $General->getTotalDatos('VenCategoria',null,array('idPadre'=>0));
		if (count($categorias) > 0) {
			$data = $categorias;
			$error = 1;
		}else{
			$error = 2;
		}
	break;

	/* Lista subcategorías */
	case 'getSubcategorias':
		if (isset($_POST['idCategoria']) && $_POST['idCategoria'] > 0) {
			$idCategoria = $_POST['idCategoria'];
			$subcategorias = $General->getTotalDatos('VenCategoria',null,array('idPadre'=>$idCategoria));
			if (count($subcategorias) > 0) {
				$data = $subcategorias;
				$error = 1;
			}else{
				$error = 2;
			}
		} else {
			$error = 3;
		}
	break;

	/* Inserta Noticias */
	case 'setNoticia':
		if (isset($_POST['idSubCategoria']) && $_POST['idSubCategoria'] > 0 &&
			isset($_POST['idUsuarioAdmin']) && $_POST['idUsuarioAdmin'] > 0 &&
			isset($_POST['titulo']) && $_POST['titulo'] != "" &&
			isset($_POST['subtitulo']) && $_POST['subtitulo'] != "" &&
			isset($_POST['contenido']) && $_POST['contenido'] != "" &&
			isset($_POST['imagen']) && $_POST['imagen'] != "" &&
			isset($_POST['tipoTemplate']) && $_POST['tipoTemplate'] != "") {
			$idSubCategoria = $_POST['idSubCategoria'];
			$idUsuarioAdmin = $_POST['idUsuarioAdmin'];
			$Noticia = new General();
			$Noticia->idCategoria=$idSubCategoria;
			$Noticia->idUsuarioAdmin=$idUsuarioAdmin;
			$Noticia->titulo=$_POST['titulo'];
			$Noticia->subtitulo=$_POST['subtitulo'];
			$Noticia->contenido=$_POST['contenido'];
			$Noticia->imagen=$_POST['imagen'];
			$Noticia->tipoTemplate=$_POST['tipoTemplate'];
			$Noticia->fechaMod = date("Y-m-d H:i:s");
			$idNoticia = $Noticia->setInstancia('VenNoticia');
			if ($idNoticia > 0) {
				$data = $idNoticia;
				$error = 1;
			}else{
				$error = 0;
			}
		} else {
			$error = 3;
		}
	break;

	/* Lista noticias */
	case 'getSubcategorias':
		if (isset($_POST['idSubcategoria']) && $_POST['idSubcategoria'] > 0) {
			$idSubcategoria = $_POST['idSubcategoria'];
			$noticia = $General->getTotalDatos('VenNoticia',null,array('idCategoria'=>$idSubcategoria));
			if (count($noticia) > 0) {
				$data = $noticia;
				$error = 1;
			}else{
				$error = 2;
			}
		} else {
			$error = 3;
		}
	break;
	
	/* Login */
	case 'login':
		if (isset($_POST['usuario']) && $_POST['usuario'] != "" &&
			isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
			$usuario=$_POST['usuario'];
			$contrasena=$_POST['contrasena'];
			$user = $General->getTotalDatos('VenUsuario',null,array('usuario'=>$usuario,'contrasena'=>$contrasena));
			if (!$user) {
			  	$error = 2;
			}else{
			  	$data = $user;
				$error = 1;
			}
		} else {
			$error = 3;
		}
	break;
}

/* 
// Errores
-1 = No se existe la acción
0 = No se realizó la acción correctamente
1 = La acción se realizó correctamente
2 = La acción se realizó correctamente pero no hay datos
3 = Campos incorrectos 

*/
$result['data'] = $data;
$result['error'] = $error;
echo json_encode($result);