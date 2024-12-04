<?php
 require_once 'includes/redireccion.php'; 
 require_once 'includes/cabecera.php'; 
 require_once 'includes/lateral.php';  ?>

<!-- CAJA PRINCIPAL -->
 <div id="principal"> 
 	<h1>Crear entradas </h1>

 	<p> Añade nuevas entradas al blog para que lo usuarios puedan leerlas y disfrutar de tu contenido.</p>
 	<br/>
 	<form action="guardar-entradas.php" method="POST" />


 		<label for="titulo">Título de la entrada:</label>
 		<input type="text" name="titulo" />
        <!-- MOSTRAR ERRORES CON FUNCIÓN mostrarErrores() de helpers.php, igual que anteriormente en el formulario de login -->
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>



        <label for="descripcion">Contenido de la entrada:</label>
        <textarea name="descripcion" required> </textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>



        <label for="categoria">Categoría</label>
        <select name="categoria">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>





        <!-- Usamos función de helpers.php conseguirCategorías para listarlas -->
            
        <?php $categorias = conseguirCategorias($db);
        if(!empty($categorias)):
        // Bucle para recorrer todas las categorías que obtiene la consulta a la BBDD
            while($categoria = mysqli_fetch_assoc($categorias)):
        ?> 

        <option value="<?=$categoria['id']?>"> <?=$categoria['nombre']?></option>

        <?php
            endwhile;
        endif;
        ?>
        </select>

 		<input type="submit" value="Crear" />
 	</form>

    <?php borrarErrores(); ?>   <!-- función en helpers.php --> 

</div> 
		
<?php require_once('includes/pie.php'); ?>

