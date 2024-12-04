<?php require_once 'includes/helpers.php'; ?>

	<!-- BARRA LATERAL -->


		<aside id="sidebar">

			<!-- BUSCADOR -->

			<div id="buscador" class="bloque">
				<h3>Buscar entrada</h3>
				<form action="buscar.php" method="POST">
					<input type="text" name="busqueda" />
					<input type="submit" value="Buscar" />
				</form>
			</div>



			<!-- MOSTRAR DATOS DE SESIÓN INICIADA -->
			<?php if(isset($_SESSION['usuario'])): ?>
			<div id="usuario-logueado" class="bloque">
				<h3>Bienvenido/a, <?=$_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
			

				<!-- BOTONES -->
				<a href="crear-entradas.php" class="boton boton-verde"> Crear entrada </a>
				<a href="crear-categoria.php" class="boton"> Crear categoría </a>
				<a href="mis-datos.php" class="boton boton-naranja"> Mis datos </a>
				<a href="cerrar.php" class="boton boton-rojo"> Cerrar sesión </a>
		

			</div>


			<?php endif; ?>





			<!-- OCULTAR PANELES CUANDO LA SESIÓN ESTÁ INICIADA -->
			<?php if(!isset($_SESSION['usuario'])) : ?>

			<div id="login" class="bloque">


				<h3>Identifícate</h3>


			<!-- MOSTRAR ERROR AL INICIAR SESION -->
			<?php if(isset($_SESSION['error_login'])): ?>
			<div  class="alerta alerta-error">
				
				<h3> Error en el inicio de sesión </h3>
			</div>

			<?php endif; ?>

				<form action="login.php" method="POST">
					<label for="email">Email</label>
					<input type="email" name="email" />

					<label for="password">Contraseña</label>
					<input type="password" name="password" />

					<input type="submit" value="Entrar" />
				</form>

			</div>


			<div id="register" class="bloque">




				<h3>Regístrate</h3>

				<!-- MOSTRAR ERRORES -->
				<?php if(isset($_SESSION['completado'])): ?>
					<div class="alerta alerta-exito">	
					<?=$_SESSION['completado'] ?>
					</div>	


				<?php elseif(isset($_SESSION['errores']['general'])): ?>
					<div class="alerta alerta-error">	
					<?=$_SESSION['errores']['general']?>
					</div>

				<?php endif; ?>	

				<form action="registro.php" method="POST">


					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" />

					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>


					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" />

					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>




					<label for="email">Email</label>
					<input type="email" name="email" />

					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>



					<label for="password">Contraseña</label>
					<input type="password" name="password" />

					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>




					<input type="submit" name="submit" value="Registrar" />
				</form>


					<?php  borrarErrores(); ?>


			</div>

		<?php endif; ?>
		</aside>