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

				<div class="row">

				<form class="col l9 m12 s12" method="POST" action="categoria.php">

				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input id="icon_prefix" type="text" name="nombre" class="validate">
					<label for="icon_prefix">Nombre</label>
				</div>
				<div class="input-field col s12">
				<i class="material-icons prefix">description</i>
				<input id="icon_telephone" type="tel" name="descripcion" class="validate">
				<label for="icon_telephone">Descripción</label>
				</div>
				</div>
<div class="center" >
  <input type="submit" name="insert" value="INSERTAR DATOS" class="btn">
</div>


<div id="altura_blanco"></div>



				</form>





<?php
if(isset($_POST['insert'])){
$cat=$_POST['nombre'];
$des=$_POST['descripcion'];

$insertar="INSERT INTO categoria(nombre,descripcion) VALUES ('$cat','$des')";

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




  <table class="centered">
 <thead>
   <tr>
       <th>ID</th>
       <th>NOMBRE </th>
       <th>DESCRIPCION</th>
       <th>EDITAR</th>
       <th>BORRAR</th>

   </tr>
 </thead>

 <tbody>
<?php
$consulta="select * from categoria";
$ejecutar=sqlsrv_query($conn,$consulta);
$i=0;
while ($fila=sqlsrv_fetch_array($ejecutar)) {
  // code...
 $id1=$fila['id'];
 $nom1=$fila['nombre'];
 $des1=$fila['descripcion'];
$i++;


 ?>

<!---cuerpo de tabla --->
   <tr>
     <td><?php echo $id1 ?></td>
     <td><?php echo $nom1 ?></td>
     <td><?php echo $des1?></td>
     <td><a href="categoria.php?editar=<?php echo $id1?>">Editar</a></td>
     <td><a href="categoria.php?borrar=<?php echo $id1?>">Borrar</a></td>

   </tr>
 <!---final del cuerpo de tabla--->

 </tbody>
<?php } ?>
</table>


<?php
 if(isset($_GET['editar'])){
echo '<div id="altura_blanco"></div>';
  include("editar_categoria.php");
}
?>

<?php
if(isset($_GET['borrar'])){
$borrar_id=$_GET['borrar'];
$consulta="DELETE from categoria where id='$borrar_id'";
$ejecutar=sqlsrv_query($conn,$consulta);

if($ejecutar){
  echo "<script>alert('Registro Eliminado')</script>";
  echo "<script>window.open('categoria.php','_self')</script>";
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
