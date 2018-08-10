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
				<form method="POST" action="cliente.php" class="col l12 s12">

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">code</i>
					<input id="icon_prefix" type="text" name="ruc" class="validate">
					<label for="icon_prefix">RUC</label>
				</div>

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">business</i>
					<input id="icon_telephone" type="text" name="razon_social" class="validate">
					<label for="icon_telephone">Razon Social</label>
				</div>
				</div>


				<!--   2 fila   -->
				<div class="row">
				<form class="col l12 s12">

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">phone</i>
					<input id="icon_prefix" type="text" name="telefono"class="validate">
					<label for="icon_prefix">Telefono</label>
				</div>

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">contacts</i>
					<input id="icon_telephone" type="tel" name="atencion" class="validate">
					<label for="icon_telephone">Atención</label>
				</div>
				</div>



				<!--   3 fila   -->
				<div class="row">
				<form class="col l12 s12">

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">email</i>
					<input id="icon_prefix" type="text"name="email" class="validate">
					<label for="icon_prefix">Correo</label>
				</div>

				<div class="input-field col l6 s12">
					<i class="material-icons prefix">home</i>
          <input id="icon_telephone" type="text" name="direccion" class="validate">
					<label for="icon_telephone">Direccion</label>
				</div>


				</div>

        <div class="center" >
          <input type="submit" name="insert" value="INSERTAR DATOS" class="btn">
        </div>
        <div id="altura_blanco"></div>

				</form>

<div id="altura_blanco"></div>
<?php
if(isset($_POST['insert'])){

$ruc=$_POST['ruc'];
$razon_s=$_POST['razon_social'];
$tel=$_POST['telefono'];
$ate=$_POST['atencion'];
$ema=$_POST['email'];
$dir=$_POST['direccion'];



$insertar="INSERT INTO cliente(ruc,razon_social,telefono,contacto_referencia,correo,direccion)
 VALUES ('$ruc','$razon_s','$tel','$ate','$ema','$dir')";

$ejecutar = sqlsrv_query($conn,$insertar);
if($ejecutar){
  echo "<h3>INSERTADO CORRECTAMENTE</h3>";
}
else {
 echo "<h3>NO INSERTADO ERRORRRRRR</h3>";
}
}
else{
  //echo "<h3>SIN ACCION</h3>";
}
 ?>




				<div>
				 <table class="responsive-table">
        <thead>
          <tr>
              <th>RUC</th>
              <th>Razon Social </th>
              <th>Telefono</th>
			        <th>Atención</th>
              <th>Correo</th>
              <th>Direccion</th>

          </tr>
        </thead>

        <tbody>
          <?php
          $consulta="select * from cliente";
          $ejecutar=sqlsrv_query($conn,$consulta);
          $i=0;
          while ($fila=sqlsrv_fetch_array($ejecutar)) {
            // code...
           $ruc=$fila['ruc'];
           $razon_s=$fila['razon_social'];
           $tel=$fila['telefono'];
           $atencion=$fila['contacto_referencia'];
           $correo=$fila['correo'];
           $dire=$fila['direccion'];


           $i++;


           ?>

          <!---cuerpo de tabla --->
          <tr>
            <td><?php echo $ruc ?></td>
            <td><?php echo $razon_s ?></td>
            <td><?php echo $tel?></td>
            <td><?php echo $atencion?></td>
            <td><?php echo $correo ?></td>
            <td><?php echo $dire?></td>

            <td><a href="cliente.php?editar=<?php echo $ruc?>">Editar</a></td>
            <td><a href="cliente.php?borrar=<?php echo $ruc?>">Borrar</a></td>

          </tr>
          <!---final del cuerpo de tabla--->

        </tbody>
          <?php } ?>
      </table>
				</div>


        <?php
         if(isset($_GET['editar'])){
        echo '<div id="altura_blanco"></div>';
          include("editar_cliente.php");
        }
        ?>

        <?php
        if(isset($_GET['borrar'])){
        $borrar_id=$_GET['borrar'];
        $consulta="DELETE from cliente where ruc='$borrar_id'";
        $ejecutar=sqlsrv_query($conn,$consulta);

        if($ejecutar){
          echo "<script>alert('Registro Eliminado')</script>";
          echo "<script>window.open('cliente.php','_self')</script>";
            }

          }
        ?>



        </div>

        </div>

        <?php
        include("footer.html");
         ?>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
