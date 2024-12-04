
<?php require_once('includes/cabecera.php'); ?>



		<!-- BARRA LATERAL -->
	<?php require_once('includes/lateral.php'); ?>
		
		<!-- CAJA PRINCIPAL -->

		<div id="principal"> 
			<!-- MISMO PROCEDIMIENTO QUE CON CATEGORIAS DEL MENU -->
			<h1>Últimas entradas</h1>

			<?php
				$entradas = conseguirEntradas($db, true);
				if(!empty($entradas)) :
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
				endif;		

			?>



			<!--
		
			<article class="entrada">
				<a href="">
					<h2>Título de mi entrada</h2>
					<p> 
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
				consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. 
					</p>
				</a>
			</article>

						<article class="entrada">
				<a href="">
					<h2>Título de mi entrada</h2>
					<p> 
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
				consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. 
					</p>
				</a>
			</article>


			<article class="entrada">
				<a href="">
					<h2>Título de mi entrada</h2>
					<p> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
				consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. 
					</p>
				</a>
			</article>


			<article class="entrada">
				<a href="">
					<h2>Título de mi entrada</h2>
					<p> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
				consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. 
					</p>
				</a>
			</article>


			<article class="entrada">
				<a href="">
					<h2>Título de mi entrada</h2>
					<p> 
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
				consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. 
					</p>
				</a>
			</article>


			<article class="entrada">
				<a href="">
					<h2>Título de mi entrada</h2>
					<p> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
				consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. 
					</p>
				</a>
			</article>

		-->
			<div id="ver-todas">	<a href="entradas.php"> Ver todas las entradas</a>  </div>	

			

		</div>	<!-- FIN PRINCIPAL -->

			
		</div> <!-- FIN CONTENEDOR -->
		<!-- PIE DE PAGINA -->
		<?php require_once('includes/pie.php'); ?>
</body>
</html>





