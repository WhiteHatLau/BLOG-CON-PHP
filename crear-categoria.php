<?php
 require_once 'includes/redireccion.php'; 
 require_once 'includes/cabecera.php'; 
 require_once 'includes/lateral.php';  ?>

<!-- CAJA PRINCIPAL -->
 <div id="principal"> 
 	<h1>Crear categorías </h1>

 	<p> Añade nuevas categorías al blog para que lo usuarios puedan utilizarlas al crear sus entradas.</p>
 	<br/>
 	<form action="guardar-categoria.php" method="POST" />
 		<label for="nombre">Nombre de la categoría</label>
 		<input type="text" name="nombre" />

 		<input type="submit" value="Crear" />
 	</form>

</div> 
		
<?php require_once('includes/pie.php'); ?>
