
<?php
// COMPROBAR SI LLEGAN DATOS DEL FORMULARIO
if(!isset($_POST['busqueda'])){
	header('Location: index.php');
}

	
?>

<?php require_once('includes/cabecera.php'); ?>
	<!-- BARRA LATERAL -->
<?php require_once('includes/lateral.php'); ?>
		
<!-- CAJA PRINCIPAL -->

		<div id="principal"> 
		


			<h1>Búsqueda: <?=$_POST['busqueda'];?></h1>

			<?php
				$entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);		// mirar en helpers.php, el cuarto parámetro es el que entra en el if que hace la consulta con comodines para buscar
				if(!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
					while ($entrada = mysqli_fetch_assoc($entradas)) :	?>

			<article class="entrada">
			
				<a href="entrada.php?id=<?=$entrada['id']?>">
					<h2><?=$entrada['titulo']?></h2>
					<span class="fecha"><?=$entrada['categoria'] . " | " . $entrada['fecha']?></span>
					<p> 
						<?= substr($entrada['descripcion'],  0, 240) . ' ...'?>
					</p>
				</a>
			</article>


			<?php	
					endwhile;
				else: 			// Alerta para cuando no hay entradas de esa categoría

			?>

			<div class="alerta alerta-error"> Todavía no hay ninguna entrada en esta categoría</div>


			<?php endif; ?>
			</div>	<!-- FIN PRINCIPAL -->

			
		</div> <!-- FIN CONTENEDOR -->
		<!-- PIE DE PAGINA -->
		<?php require_once('includes/pie.php'); ?>
</body>
</html>





