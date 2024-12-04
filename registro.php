<?php 

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';




if (isset($_POST)) {

	// CARGAR CONEXIÓN A BBDD
	require_once 'includes/conexion.php';

	// INICIAR SESIÓN
	if(!isset($_SESSION)){
		session_start();
	}





	// RECOGER VALORES DEL FORMULARIO DE REGISTRO

	// ESCAPAR(no interpretar como parte del lenguaje) DATOS PARA EVITAR SQL INJECTION - FUNCIÓN ESCAPE STRING, primer parámetro hay que pasar la conexión a la base de datos		AUMENTA MUCHO LA SEGURIDAD DE LA BBDD

	if (isset($_POST['nombre'])) {
			$nombre =  mysqli_real_escape_string($db, $_POST['nombre']) ;
	}else{
		$nombre = false;
	}

	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;		// Mismo con operador ternario
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email']))  : false;
	$password = isset($_POST['password']) ?  mysqli_real_escape_string($db, trim($_POST['password'])) : false;


	// ARRAY DE ERRORES
	$errores = array();

	
	// VALIDAR DATOS ANTES DE GUARDARLOS EN LA BBDD


	// VALIDACIÓN DEL NOMBRE
	if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}


	// VALIDACIÓN DE LOS APELLIDOS
		if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)) {
		$apellidos_validado = true;
	}else{
		$apellidos_validado = false;
		$errores['apellidos'] = "Los apellidos no son válidos";
	}


	// VALIDAR EL EMAIL
		if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['email'] = "El email no es válido";
	}

	// VALIDAR LA CONTRASEÑA
		if (!empty($password)) {
		$password_validada = true;
	}else{
		$password_validada = false;
		$errores['password'] = "Introduce contraseña";
	}

	// Comprobar si hay errores
	$guardar_usuario = false;
	if (count($errores) == 0) {
		$guardar_usuario = true;


	// Cifrar la contraseña antes de guardarla
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


	//	var_dump($password_segura);

	//	echo password_verify($password, $password_segura);
	//	die();


		// Insertar usuario en la base de datos

		$sql = "INSERT INTO usuarios VALUES(null, '$nombre' , '$apellidos', '$email', '$password_segura', CURDATE());";

		$guardar = mysqli_query($db, $sql);



		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado correctamente.";
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario.";
		}

	}else{
		$_SESSION['errores'] = $errores;
		
	}
}
header('Location: index.php');
?>