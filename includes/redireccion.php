<?php 
// Hacer páginas solo accesibles cuando se está registrado en la página
if(!isset($_SESSION)){
	session_start();
}

if (!isset($_SESSION['usuario'])) {
	header("Location: index.php");
}

?>