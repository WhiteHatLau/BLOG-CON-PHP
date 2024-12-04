<?php

function mostrarError($errores, $campo){

	$alerta = '';

	if (isset($errores[$campo]) && !empty($campo)) {
		$alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";	
	}

	return $alerta;
}





function borrarErrores() {
	$borrado = false;

	if (isset($_SESSION['errores'])) {
		$_SESSION['errores'] = null;	
	//	unset($_SESSION['errores']);				quitado porque puede ocasionar problemas, ya que borra sesiones de más y no funciona del todo bien
		$borrado = true;
	}

	if (isset($_SESSION['completado'])) {
		$_SESSION['completado'] = null;
	//	unset($_SESSION['completado']);
		$borrado = true;
	}

	if (isset($_SESSION['errores_entrada'])) {
		$_SESSION['errores_entrada'] = null;

		$borrado = true;
	}
		if (isset($_SESSION['error_login'])) {
		$_SESSION['error_login'] = null;	
	//	unset($_SESSION['error_login']);
		$borrado = true;
	}

	return $borrado;
}




// Hacer consulta a las categorías para listarlas y ponerlas en el menú
function conseguirCategorias($conexion){
	$sql = "SELECT * FROM categorias ORDER BY id ASC";
	$categorias = mysqli_query($conexion, $sql);

	$resultado = array();
	if($categorias && mysqli_num_rows($categorias) >=1){
		$resultado = $categorias;
	}

	return $resultado;
}




// consulta para listar las entradas por categoría seleccionada

function conseguirCategoria($conexion, $id){
	$sql = "SELECT * FROM categorias WHERE id = '$id'; ";
	$categorias = mysqli_query($conexion, $sql);

	$resultado = array();
	if($categorias && mysqli_num_rows($categorias) >=1){
		$resultado = mysqli_fetch_assoc($categorias);
	}

	return $resultado;	
}




/*

function conseguirUltimasEntradas($conexion){
	$sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
			" INNER JOIN categorias c ON e.categoria_id = c.id " .
			" ORDER BY e.id DESC LIMIT 6 " ;


	$entradas = mysqli_query($conexion, $sql);		

	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}

	return $resultado;
}




function conseguirTodasLasEntradas($conexion){
	$sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
			" INNER JOIN categorias c ON e.categoria_id = c.id " .
			" ORDER BY e.id DESC " ;


	$entradas = mysqli_query($conexion, $sql);		

	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}

	return $resultado;
}

*/

// Función para conseguir entradas, con segundo parámetro para solo tener que hacer una función

function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
			" INNER JOIN categorias c ON e.categoria_id = c.id ";

	if (!empty($categoria)) {
		$sql .= "WHERE c.id = $categoria ";
	}

	if (!empty($busqueda)) {
		$sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
	}


	$sql .= " ORDER BY e.id DESC " ;


	if ($limit) {		// if $limit = true
		$sql .= " LIMIT 4 ";
	}		


	$entradas = mysqli_query($conexion, $sql);		

	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
			$resultado = $entradas;	
	}
	
	return $resultado;
	
}

function conseguirEntrada($conexion, $id){
	$sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradas e " .
			" INNER JOIN categorias c ON e.categoria_id = c.id " .
			" INNER JOIN usuarios u ON e.usuario_id = u.id " .
			" WHERE e.id = $id ";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if ($entrada && mysqli_num_rows($entrada) >= 1) {
		$resultado = mysqli_fetch_assoc($entrada);
			}		
	return $resultado;
}

?>