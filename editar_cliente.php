<?php
if(isset($_GET['editar'])){
$editar_ruc=$_GET['editar'];
$consulta="select * from cliente where ruc='$editar_ruc'";
$ejecutar=sqlsrv_query($conn,$consulta);
$fila=sqlsrv_fetch_array($ejecutar);

$ruc1=$fila['ruc'];
$razon_s1=$fila['razon_social'];
$tel=$fila['telefono'];
$atencion=$fila['contacto_referencia'];
$correo=$fila['correo'];
$dire=$fila['direccion'];

echo $ruc1."-".$tel;
  }
?>
<br/>


<div style="position:fixed; top:8%; left:100; width:1000px;">
<form class="card  blue-grey lighten-5 z-depth-5" method="POST" action="" style="height:540px";>



<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="ruc"value="<?php echo $ruc1 ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="razon_s"value="<?php echo $razon_s ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="telefono"value="<?php echo $tel ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="atencion"value="<?php echo $atencion ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="email"value="<?php echo $correo ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>
<div class="input-field col s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="direccion"value="<?php echo $dire ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="center">
<input type="submit" name="actualizar" value="ACTUALIZAR DATOS" class="btn">
</div>
</form>
</div>
<?php
if(isset($_POST['actualizar'])){

$actualizar_razon_s=$_POST['razon_s'];
$actualizar_telefono=$_POST['telefono'];
$actualizar_atencion=$_POST['atencion'];
$actualizar_email=$_POST['email'];
$actualizar_direccion=$_POST['direccion'];




$consulta="UPDATE cliente SET razon_social='$actualizar_razon_s',telefono='$actualizar_telefono',contacto_referencia='$actualizar_atencion',correo='$actualizar_email',direccion='$actualizar_direccion'
WHERE ruc='$editar_ruc'";
$ejecutar=sqlsrv_query($conn,$consulta);

if($ejecutar){
  echo "<script>alert('Datos actualizados')</script>";
  echo "<script>window.open('cliente.php','_self')</script>";
    }
  }

 ?>
