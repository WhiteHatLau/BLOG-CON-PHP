	<?php require_once 'includes/redireccion.php'; ?>		<!-- IMPORTANTE PARA HACER PÁGINA ACCESIBLE SOLO A USUARIOS REGISTRADOS -->
	<?php require_once 'includes/conexion.php'; ?>
	<?php require_once 'includes/helpers.php'; ?>

	<?php
		$entrada_actual = conseguirEntrada($db, $_GET['id']);
		if(!isset($entrada_actual['id'])){
			header('Location: index.php');
		}
	?>

	<?php require_once('includes/cabecera.php'); ?>
	<?php require_once('includes/lateral.php'); ?>
		
	<!-- CAJA PRINCIPAL -->
 <div id="principal"> 
 	<h1>Editar entrada</h1>

 	<p> Edita tu entrada  <?=$entrada_actual['titulo'];?></p>
 	<br/>
 	<form action="guardar-entradas.php?editar=<?=$entrada_actual['id'];?>" method="POST" />		<!-- PARÁMETRO POR GET PARA HACER UN IF EN guardar-entrada.php Y ASÍ REUTILIZAR EL CÓDIGO -->


 		<label for="titulo">Título de la entrada:</label>
 		<input type="text" name="titulo" value="<?=$entrada_actual['titulo'];?>" />
        <!-- MOSTRAR ERRORES CON FUNCIÓN mostrarErrores() de helpers.php, igual que anteriormente en el formulario de login -->
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>



        <label for="descripcion">Contenido de la entrada:</label>
        <textarea name="descripcion" required > <?=$entrada_actual['descripcion'];?> </textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>



        <label for="categoria">Categoría</label>
        <select name="categoria" >
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>





        <!-- Usamos función de helpers.php conseguirCategorías para listarlas -->
            
        <?php $categorias = conseguirCategorias($db);
        if(!empty($categorias)):
        // Bucle para recorrer todas las categorías que obtiene la consulta a la BBDD
            while($categoria = mysqli_fetch_assoc($categorias)):
        ?> 

        <option value="<?=$categoria['id']?>"
        	<?= // IF, PARA QUE SI EL ID COINCIDA CON EL DE LA CATEGORÍA GUARDADA EN LA BBDD, APAREZCA COMO VALOR PREDETERMINADO
        	($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected = "selected"' : '' ?>
        > <!-- CIERRE DE LA ETIQUETA DE APERTURA DE option --> 
        	<?=$categoria['nombre']?> 
        </option>

        <?php
            endwhile;
        endif;
        ?>
        </select>

 		<input type="submit" value="Guardar cambios" />
 	</form>

    <?php borrarErrores(); ?>   <!-- función en helpers.php --> 

</div> 

			
<!-- PIE DE PAGINA -->
<?php require_once('includes/pie.php'); ?>
</body>
</html>





