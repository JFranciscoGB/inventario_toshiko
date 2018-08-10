<?php
if(isset($_GET['editar'])){
$editar_serie=$_GET['editar'];
$consulta="select * from producto where serie='$editar_serie'";
$ejecutar=sqlsrv_query($conn,$consulta);
$fila=sqlsrv_fetch_array($ejecutar);

$serie=$fila['serie'];
$nombre=$fila['nombre'];
$precio=$fila['precio'];
$stock=$fila['stock'];
$marca=$fila['marca'];
$modelo=$fila['modelo'];
$garantia=$fila['garantia'];
$cod_pro=$fila['proveedor'];
$foto=$fila['ruta'];

  }
?>
<br/>


<div style="position:fixed; top:8%; left:10%; width:1100px;">
<form class="card  blue-grey lighten-5 z-depth-5" method="POST" action="" style="height:550px";>


<div class="row">

<div class="input-field col l4 m6 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="serie" value="<?php echo $serie ?>" class="validate">
</div>

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="nombre" value="<?php echo $nombre?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="precio" value="<?php echo $precio?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

</div>

<div class="row">

<div class="input-field col l4 s12">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="stock"value="<?php echo $stock ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="marca"value="<?php echo $marca?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="modelo"value="<?php echo $modelo ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>
</div>

<div class="row">

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="garantia"value="<?php echo $garantia?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="proveedor"value="<?php echo $cod_pro ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>

<div class="input-field col l4 s6">
<i class="material-icons prefix">description</i>
<input id="icon_telephone" type="tel" name="foto"value="<?php echo $foto ?>" class="validate">
<!---label for="icon_telephone">Descripción</label--->
</div>
</div>

<div class="center">
<input type="submit" name="actualizar" value="ACTUALIZAR DATOS" class="btn">
</div>
</form>
</div>
<?php
if(isset($_POST['actualizar'])){

$actualizar_serie=$_POST['serie'];
$actualizar_nombre=$_POST['nombre'];
$actualizar_precio=$_POST['precio'];
$actualizar_stock=$_POST['stock'];
$actualizar_marca=$_POST['marca'];
$actualizar_modelo=$_POST['modelo'];
$actualizar_garantia=$_POST['garantia'];
$actualizar_proveedor=$_POST['proveedor'];
$actualizar_foto=$_POST['foto'];



$consulta="UPDATE producto SET nombre='$actualizar_nombre',precio=$actualizar_precio,stock=$actualizar_stock,
marca='$actualizar_marca' ,modelo='$actualizar_modelo',garantia=$actualizar_garantia ,proveedor='$actualizar_proveedor',ruta='$actualizar_foto'
WHERE serie='$editar_serie'";
$ejecutar=sqlsrv_query($conn,$consulta);

if($ejecutar){
  echo "<script>alert('Datos actualizados')</script>";
  echo "<script>window.open('producto.php','_self')</script>";
    }
    else{
      echo"algo falla" ;
    }
  }

 ?>
