<?php
if(isset($_GET['editar'])){
$editar_dni=$_GET['editar'];
$consulta="select * from trabajador where dni='$editar_dni'";
$ejecutar=sqlsrv_query($conn,$consulta);
$fila=sqlsrv_fetch_array($ejecutar);

$dni= $fila['dni'];
$nombre= $fila['nombre'];
$telefono= $fila['telefono'];
$direccion= $fila['direccion'];
$email= $fila['correo'];


  }
?>
<br/>


<div style="position:fixed; top:8%; left:100; width:1000px;">
<form class="card  blue-grey lighten-5 z-depth-5" method="POST" action="" style="height:480px";>



<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="nombre"value="<?php echo $nombre ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="telefono"value="<?php echo $telefono ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="direccion"value="<?php echo $direccion ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="email"value="<?php echo $email ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>
<div class="center">
<input type="submit" name="actualizar" value="ACTUALIZAR DATOS" class="btn">
</div>
</form>
</div>
<?php
if(isset($_POST['actualizar'])){

$actualizar_nombre=$_POST['nombre'];
$actualizar_telefono=$_POST['telefono'];
$actualizar_direccion=$_POST['direccion'];
$actualizar_email=$_POST['email'];



$consulta="UPDATE trabajador SET nombre='$actualizar_nombre',telefono='$actualizar_telefono',direccion='$actualizar_direccion',correo='$actualizar_email'
WHERE dni='$editar_dni'";
$ejecutar=sqlsrv_query($conn,$consulta);

if($ejecutar){
  echo "<script>alert('Datos actualizados')</script>";
  echo "<script>window.open('trabajador.php','_self')</script>";
    }
  }

 ?>
