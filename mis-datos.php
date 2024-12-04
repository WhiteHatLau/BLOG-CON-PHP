<?php
 require_once 'includes/redireccion.php'; 
 require_once 'includes/cabecera.php'; 
 require_once 'includes/lateral.php';  ?>


<div id="principal">
    
<h1> Mis datos</h1>

    <form action="actualizar-usuario.php" method="POST">


      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>" />   <!-- HACER QUE POR DEFECTO SALGAN EN EL FORMULARIO LOS DATOS ACTUALES -->

      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>


      <label for="apellidos">Apellidos</label>
      <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']?>"/>

      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>




       <label for="email">Email</label>
       <input type="email" name="email" value="<?=$_SESSION['usuario']['email']?>"/>

       <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>


       <input type="submit" name="submit" value="Actualizar" />

    </form>




</div>
    

 <?php
 require_once 'includes/pie.php'; 
  ?>