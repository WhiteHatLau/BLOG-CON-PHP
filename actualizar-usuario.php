<?php 


if (isset($_POST)) {

	// CARGAR CONEXIÓN A BBDD
	require_once 'includes/conexion.php';



	// RECOGER VALORES DEL FORMULARIO DE ACTUALIZACIÓN

	if (isset($_POST['nombre'])) {
			$nombre =  mysqli_real_escape_string($db, $_POST['nombre']) ;
	}else{
		$nombre = false;
	}

	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;		
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email']))  : false;
	

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

	// Comprobar si hay errores
	$guardar_usuario = false;
	if (count($errores) == 0) {
		$usuario = $_SESSION['usuario'];
		$guardar_usuario = true;



		// Comprobar si el email introducido ya existe para no repetirlo en la bbdd
		$sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
		$isset_email = mysqli_query($db, $sql);
		$isset_user = mysqli_fetch_assoc($isset_email);	// array asociativo con datos del usuario

		
		// Comprobar si la consulta devuelve solo un resultado, es decir, el email no existe


		if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {	// mirar si id de la sesión es igual a id del usuario que se intenta registrar, o si "$isset_user" está vacío porque no existe el usuario
		// Es decir, si el email es el mismo, tiene que ser porque no se está cambiando, no porque sea el de otro usuario
			

			// Actualizar datos del usuario en la base de datos


			// RECOGER OBJETO USUARIO QUE ESTÁ GUARDADO EN LA SESIÓN
			
			$sql = "UPDATE usuarios SET " . " nombre = '$nombre', " .
			"apellidos = '$apellidos', " .
			"email = '$email' " .
			"WHERE id = " . $usuario['id'] . " ;";

			$guardar = mysqli_query($db, $sql);



			if($guardar){
				// Actualizar la sesión del usuario con los datos actuales
				$_SESSION['usuario']['nombre'] = $nombre;
				$_SESSION['usuario']['apellidos'] = $apellidos;
				$_SESSION['usuario']['email'] = $email;


				$_SESSION['completado'] = "Los datos de tu perfil se han actualizado correctamente.";
			}else{
				$_SESSION['errores']['general'] = "Fallo al actualizar los datos.";
			}
		}else{
			$_SESSION['errores']['email'] = "El usuario ya existe.";
		}
		
	}else{
		$_SESSION['errores'] = $errores;
	}
}
header('Location: mis-datos.php');
?>