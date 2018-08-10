<?php
if(isset($_GET['editar'])){
$editar_id=$_GET['editar'];
$consulta="select * from categoria where id='$editar_id'";
$ejecutar=sqlsrv_query($conn,$consulta);
$fila=sqlsrv_fetch_array($ejecutar);

$nombre= $fila['nombre'];
$descrip= $fila['descripcion'];

  }
?>
<br/>


<div style="position:fixed; top:8%; left:100; width:1000px;">
<form class="card  blue-grey lighten-5 z-depth-5" method="POST" action="" style="height:280px";>

<div class="input-field col s12">
  <i class="material-icons prefix">account_circle</i>
  <input id="icon_prefix" type="text" name="nombre" value="<?php echo $nombre ?>" class="validate">
  <!--label for="icon_prefix">Nombre</label--->
</div>
<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="descripcion"value="<?php echo $descrip ?>" class="validate">
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
$actualizar_des=$_POST['descripcion'];

$consulta="UPDATE categoria SET nombre='$actualizar_nombre',descripcion='$actualizar_des'
WHERE id='$editar_id'";
$ejecutar=sqlsrv_query($conn,$consulta);

if($ejecutar){
  echo "<script>alert('Datos actualizados')</script>";
  echo "<script>window.open('categoria.php','_self')</script>";
    }
  }

 ?>
