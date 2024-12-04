<?php

if (isset($_POST)) {
	// Conexión a BBDD
	require_once 'includes/conexion.php';	// Ya tiene session_start() dentro


	// Comprobar si llega nombre de la categoría
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;


	// ARRAY DE ERRORES
	$errores = array();

	
	// VALIDAR DATOS ANTES DE GUARDARLOS EN LA BBDD
	if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}


	if (count($errores) == 0) {
		$sql = "INSERT INTO categorias VALUES(null, '$nombre');";
		$guardar = mysqli_query($db, $sql); 
	}

}

// Redirección
header("Location: index.php");

?>