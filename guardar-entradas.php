<?php

if (isset($_POST)) {
	// Conexión a BBDD
	require_once 'includes/conexion.php';	// Ya tiene session_start() dentro


	// Comprobar si llegan datos desde formulario
	$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
	$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
	$usuario = $_SESSION['usuario']['id'];		// Sesión que guarda array con datos de usuario logueado (mirar login.php linea 43)



	// ARRAY DE ERRORES
	$errores = array();

	
	// VALIDAR DATOS ANTES DE GUARDARLOS EN LA BBDD
	if (empty($titulo)) {
		$errores['titulo'] = "El título no es válido";
	}

	if (strlen($descripcion) <= 1) {
		$errores['descripcion'] = "El contenido no es válido";
	}

	if (empty($categoria) || !is_numeric($categoria)) {
		$errores['categoria'] = "La categoría no es válida";
	}



	if (count($errores) == 0) {

		// If para editar entrada ya creada, reutilizar código
		if(isset($_GET['editar'])){
			$entrada_id = $_GET['editar'];
			$usuario_id = $_SESSION['usuario']['id'];
			$sql = "UPDATE entradas SET titulo='$titulo', descripcion = '$descripcion', categoria_id = $categoria ".
			"WHERE id = $entrada_id AND usuario_id = $usuario_id ";

		}else{
			$sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
		}

		
		$guardar = mysqli_query($db, $sql); 

		// Redirección
		header("Location: index.php");
	}else{
		$_SESSION['errores_entrada'] = $errores;
		if(isset($_GET['editar'])){
			header("Location: editar-entrada.php?id=" . $_GET['editar']);
		}else{
			header("Location: crear-entradas.php");
		}
		
	}

}



?>