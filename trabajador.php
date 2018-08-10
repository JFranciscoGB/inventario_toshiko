<!DOCTYPE html>
<?php
include("conexion.php");
include("header.html");
?>
<html lang="en">

<body>
<div class="container">
<div class="section">

      <!--   Icon Section   -->

<div id="altura_blanco"></div>

				<!--   1 fila   -->
				<div class="row">
				<form method="POST" actio="trabajador.php" class="col l12 s12">

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">code</i>
					<input id="icon_prefix" type="text" name="dni" class="validate">
					<label for="icon_prefix">DNI</label>
				</div>

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">person_add</i>
					<input id="icon_prefix" type="text" name="nombre" class="validate">
					<label for="icon_prefix">NOMBRE </label>
				</div>
				</div>


				<!--   2 fila   -->
				<div class="row">
				<form class="col l12 s12">

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">phone</i>
					<input id="icon_prefix" type="text" name="telefono" class="validate">
					<label for="icon_prefix">Telefono</label>
				</div>

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">home</i>
					<input id="icon_telephone" type="tel" name="direccion" class="validate">
					<label for="icon_telephone">Direccion</label>
				</div>
				</div>



				<!--   3 fila   -->
				<div class="row">
				<form class="col l12 s12">

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">email</i>
					<input id="icon_prefix" type="text" name="email" class="validate">
					<label for="icon_prefix">Correo</label>
				</div>
				</div>


        <div class="center" >
          <input type="submit" name="insert" value="REGISTRAR DATOS" class="btn">
        </div>

				</form>

        <?php
        if(isset($_POST['insert'])){
        $dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $email=$_POST['email'];

        $insertar="INSERT INTO trabajador(dni,nombre,telefono,direccion,correo) VALUES
          ('$dni','$nombre','telefono','$direccion','$email')";

        $ejecutar = sqlsrv_query($conn,$insertar);
        if($ejecutar){
        //  echo "<h3>INSERTADO CORRECTAMENTE</h3>";
        }
        else {
          echo "<h3>NO INSERTADO ERRORRRRRR</h3>";
        }// QUESTION: 8
        }
        else{
          //echo "<h3>SIN ACCION</h3>";
        }
         ?>

<div id="altura_blanco"></div>



				<div>
				 <table class="responsive-table">
        <thead>
          <tr>
              <th>DNI</th>
              <th>NOMBRE </th>
              <th>Telefono</th>
			        <th>Direccion</th>
              <th>Correo</th>

          </tr>
        </thead>
 <tbody>
        <?php
        $consulta="select * from trabajador";
        $ejecutar=sqlsrv_query($conn,$consulta);
        $i=0;
        while ($fila=sqlsrv_fetch_array($ejecutar)) {
          // code...
         $dni=$fila['dni'];
         $nom=$fila['nombre'];
        $tel=$fila['telefono'];
         $dir=$fila['direccion'];
         $email=$fila['correo'];

        $i++;


         ?>

        <!---cuerpo de tabla --->
           <tr>
             <td><?php echo $dni ?></td>
             <td><?php echo $nom ?></td>
             <td><?php echo $tel?></td>
             <td><?php echo $dir ?></td>
             <td><?php echo $email ?></td>
             <td><a href="trabajador.php?editar=<?php echo $dni?>">Editar</a></td>
             <td><a href="trabajador.php?borrar=<?php echo $dni?>">Borrar</a></td>

           </tr>
         <!---final del cuerpo de tabla--->

         </tbody>
        <?php } ?>
        </table>
				</div>




<?php
 if(isset($_GET['editar'])){
echo '<div id="altura_blanco"></div>';
  include("editar_trabajador.php");
}
?>

<?php
if(isset($_GET['borrar'])){
$borrar_dni=$_GET['borrar'];
$consulta="DELETE from trabajador where dni='$borrar_dni'";
$ejecutar=sqlsrv_query($conn,$consulta);

if($ejecutar){
  echo "<script>alert('Registro Eliminado')</script>";
  echo "<script>window.open('trabajador.php','_self')</script>";
    }

  }
?>


 </div>

</div>
<?php
include("footer.html");
 ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
