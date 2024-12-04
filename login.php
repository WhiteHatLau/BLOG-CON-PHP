<?php

// Iniciar sesión y conexión a la base de datos

require_once 'includes/conexion.php';


// Recoger datos del formulario

if(isset($_POST)){
	// Borrar sesión de error (de intentos fallidos de login anteriores)
	if(isset($_SESSION['error_login'])){
	session_unset($_SESSION['error_login']);
	}


	// Recoger datos del formulario

	$email = trim($_POST['email']);
	$password = $_POST['password'];


	
	// Consulta a la BBDD para ver si email y contraseña introducidos coinciden con los registros de la BBDD y si coinciden logear


	// Consulta para comprobar credenciales del usuario
	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$login = mysqli_query($db, $sql);

	// Comprueba si login da true y si el nº de filas que devuelve la consulta es en este caso 1
	if($login && mysqli_num_rows($login) == 1){

		$usuario = mysqli_fetch_assoc($login);			// Saca array asociativo con los datos que devuelve la consulta
	

			// Comprobar la contraseña / cifrar

			$verify = password_verify($password, $usuario['contrasena']); 		// Saca contraseña del array asociativo de antes (la que está en la BBDD, y la compara con la que acabamos de introducir en el login)

			if($verify){
				// Utilizar sesión para guardar datos del usuario logeado
				$_SESSION['usuario'] = $usuario;


			}else{
				// Si algo falla crear sesión con el fallo
				$_SESSION['error_login'] = "Login incorrecto.";
			}

	}else{
		// Mensaje de error
		$_SESSION['error_login'] = "Login incorrecto.";
	}
}




// Redirigir al index.php
header('location: index.php');

?>