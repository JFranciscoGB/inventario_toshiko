<!DOCTYPE html>
<?php
include("conexion.php");
include("header.html");
include('session.php');
?>

<body>

	<script>

		function habilitar(value){
		if(value=="23" || value=="29" ||  value=="31" || value=="36" ||value==true){
		// habilitamos
			document.getElementById("ip").disabled=false;
		//	document.getElementById("ip").value="";
			document.getElementById("lab-ip").innerHTML="IP Asignada";

      document.getElementById("anexo").disabled=true;
  //    document.getElementById("anexo").value="NO REQUIERE";
      document.getElementById("lab-anexo").innerHTML="NO REQUIERE";

			}
      else if(value=="23" || value=="29" || value=="31" || value=="36" ||value==false){
      // deshabilitamos

        document.getElementById("anexo").disabled=true;
      //  document.getElementById("anexo").value="NO REQUIERE";
        document.getElementById("lab-anexo").innerHTML="NO REQUIERE";

        }

		else if (value=="33" || value=="36" || value==true){
		// habilitamos
			document.getElementById("ip").disabled=false;
		//	document.getElementById("ip").value="";
			document.getElementById("lab-ip").innerHTML="IP Asignada";

			document.getElementById("anexo").disabled=false;
		//	document.getElementById("anexo").value="";
			document.getElementById("lab-anexo").innerHTML="Anexo";
			}

		else if(value=="28" ||value=="25" ||value=="26" ||value=="32" ||value=="35" || value==false ){
		// deshabilitamos

			document.getElementById("ip").disabled=true;
		//	document.getElementById("ip").value="NO REQUIERE";
			document.getElementById("lab-ip").innerHTML="NO REQUIERE";

			document.getElementById("anexo").disabled=true;
		//	document.getElementById("anexo").value="NO REQUIERE";
			document.getElementById("lab-anexo").innerHTML="NO REQUIERE";


			}
			}

	</script>



<div class="container">
<div class="section">

      <!--   Icon Section   -->

<div id="altura_blanco"></div>


				<!--   1 fila   -->
				<div class="row">
				<form method="POST" action="producto.php"class="col l12 s12">

				<div class="input-field col l4 s12">
				<i class="material-icons prefix">note_add</i>
				<select name="categoria" id="categoria"   onchange="habilitar(this.value);">
					<option value="" disabled selected >Categoria</option>
					<?php
            global $temp;
						$consulta="select * from categoria";
						$ejecutar=sqlsrv_query($conn,$consulta);
							$i=0;
						while ($fila=sqlsrv_fetch_array($ejecutar)) {
          //  $temp="";
            $seri=$fila['id'];
					$nombr=$fila['nombre'];
							$i++;
              $temp=$seri;
            	echo '<option value='.$seri.'>'.$nombr.'</option>';
							?>
		    <?php
      }
        ?>
					</select>


				</div>
				<div class="input-field col l4 s12">
				<i class="material-icons prefix">person_add</i>
				<select name="cliente" id="cliente">
					<option value="" disabled selected >Cliente</option>
					<?php
						$consulta="select * from cliente";
						$ejecutar=sqlsrv_query($conn,$consulta);
							$i=0;
						while ($fila=sqlsrv_fetch_array($ejecutar)) {
						$ruc=$fila['ruc'];
						$nombr=$fila['razon_social'];
							$i++;

					echo '<option value='.$ruc.'>'.$nombr.'</option>';
?>
		    <?php } ?>
				</select>

				</div>
        <div class="input-field col l4 s12">
        <i class="material-icons prefix">queue_play_next</i>
        <select name="ingreso" id="ingreso">
          <option value="" disabled selected >Ingreso</option>
          <option value="Inventario" >Inventario</option>
          <option value="Soporte Tecnico" >Soporte Tecnico</option>
      	</select>
				</div>
				<!--   2 fila   -->
				<div class="row">
          <div class="input-field col l4 s12">
          <i class="material-icons prefix">code</i>
          <input id="icon_prefix" type="text" name="serie" class="validate">
          <label for="icon_prefix">Serie</label>
        </div>

				<div class="input-field col l4 s12">
				<i class="material-icons prefix">branding_watermark</i>
				<select name="marca" id="marca">
					<option value="" disabled selected >MARCA</option>
					<option value="HP" >HP</option>
					<option value="DELL" >DELL</option>
					<option value="IBM" >IBM</option>
					<option value="LENOVO" >LENOVO</option>
					<option value="TOSHIBA" >TOSHIBA</option>
					<option value="MICROSOFT" >MICROSOFT</option>
					<option value="APC" >APC</option>
					<option value="EPSON" >EPSON</option>
					<option value="CANON" >CANON</option>
					<option value="INTEL" >INTEL</option>
					<option value="AMD" >AMD</option>
					<option value="SAMSUNG" >SAMSUNG</option>
					<option value="BTICINO" >BTICINO</option>
					<option value="OLG" >OLG</option>
				</select>
				</div>


				<div class="input-field col l4 s12">
					<i class="material-icons prefix">library_add</i>
					<input id="icon_telephone" type="tel" name="modelo" class="validate">
					<label for="icon_telephone">Modelo</label>
				</div>
				</div>
				<!--   3 fila   -->
				<div class="row">
				<div class="input-field col l4 s12">
					<i class="material-icons prefix">network_wifi</i>
					<input id="ip" type="text" name="ip" class="validate">
					<label id="lab-ip" for="ip-icon_prefix1">IP Asignada</label>
				</div>
				<div class="input-field col l4 s12">
					<i class="material-icons prefix">storage</i>
					<input id="icon_telephone" type="tel" name="capacidad" class="validate">
					<label for="icon_telephone">Capacidad</label>
				</div>

				<div class="input-field col l4 s12">
				<i class="material-icons prefix">store</i>
				<select name="ubicacion" id="ubicacion">
					<option value="" disabled selected >Ubicacion</option>
					<option value="Soporte Tecnico" >Area Soporte Tecnico</option>
					<option value="Administraccion" >Administraccion</option>
					<option value="Ventas" >Ventas</option>
					</select>
				</div>

				</div>
				<!--   4 fila   -->
				<div class="row">
				<div class="input-field col l4 s12">
					<i class="material-icons prefix">phone</i>
					<input id="anexo" type="tel" name="anexo" class="validate">
					<label id="lab-anexo" for="icon_telephone">Anexo</label>
				</div>
        <div class="input-field col l4 s12">
        <i class="material-icons prefix">library_add</i>
        <input id="icon_prefix" type="text" name="observacion" class="validate">
         <label for="icon_prefix">Observacion</label>
         </div>
</div>
        <!--   5 fila   -->
        <div class="row">
        </div>
        <div class="center" >
          <input type="submit" name="insert" value="INSERTAR DATOS" class="btn">
        </div>
        <div id="altura_blanco"></div>
				</form>

<?php
if(isset($_POST['insert'])){

$categoria=$_POST['categoria'];
$cliente=$_POST['cliente'];
$serie=$_POST['serie'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$observacion=$_POST['observacion'];
$ip=$_POST['ip'];
$capacidad=$_POST['capacidad'];
$ubicacion=$_POST['ubicacion'];
$anexo=$_POST['anexo'];
$ingreso=$_POST['ingreso'];
date_default_timezone_set('America/Lima');
//echo date('l jS \of F Y h:i:s A');
$fecha_entrada= date("Y-m-d H:i:s");
$fechota = (string)$fecha_entrada;
//echo "FECHA ".$hoy;
//echo "PROBANDO VARIABLES ".$categoria." -".$cliente;
$fecha_salida="Sin Salida";

echo "CATEGORIA ".$categoria."\n"; echo"</br>";
echo "Cliente ".$cliente."\n";echo"</br>";
echo "serie ".$serie."\n";echo"</br>";
echo "marca ".$marca;echo"</br>";
echo "modelo ".$modelo;echo"</br>";
echo "observacion ".$observacion;echo"</br>";
echo "IP ".$ip;echo"</br>";
echo "CAPACIDAD ".$capacidad;echo"</br>";
echo "UBICACION ".$ubicacion;echo"</br>";
echo "ANEXO ".$anexo;echo"</br>";
echo "INGRESO ".$ingreso;echo"</br>";
echo "fecha 1 ".$fecha_entrada;echo"</br>";
echo "fecha 2 ".$fecha_salida;echo"</br>";
if($ip==null||$anexo==null){
//$ip="NO";
//$capacidad="NO";
//$ubicacion="NO";
//$anexo="NO";
	echo"</br>";echo"</br>";
	echo" CAMBIANDO A NO  VER RESULTADOS";echo"</br>";
	echo "IP ".$ip;echo"</br>";
	echo "CAPACIDAD ".$capacidad;echo"</br>";
	echo "UBICACION ".$ubicacion;echo"</br>";
	echo "ANEXO".$anexo;echo"</br>";
  $cat= (int) $categoria;
  $insertar="INSERT INTO equipo_o(serie,marca,modelo,observacion,capacidad,ubicacion,ingreso,fecha_ingreso,fecha_salida,id_categoria,cliente_ruc)
   VALUES ('$serie','$marca','$modelo','$observacion','$capacidad','$ubicacion','$ingreso','$fechota','$fecha_salida',$cat,'$cliente')";

  $ejecutar=sqlsrv_query($conn,$insertar);
	if($ejecutar){
echo "<h3>INSERTADO CORRECTAMENTE</h3>";
	}
	else {
echo "<h3>NO INSERTADO ERRORRRRRR</h3>";
if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }

	}

}
else{
	  $cat= (int) $categoria;
	$insertar="INSERT INTO equipo_o(serie,marca,modelo,observacion,ip_asiganda,capacidad,ubicacion,anexo,ingreso,fecha_ingreso,fecha_salida,id_categoria,cliente_ruc)
   VALUES ('$serie','$marca','$modelo','$observacion','$ip','$capacidad','$ubicacion','$anexo','$ingreso','$fechota','$fecha_salida',$cat,'$cliente')";

  $ejecutar=sqlsrv_query($conn,$insertar);

}




}
else{
 //echo "<h3>SIN ACCION</h3>";
}
 ?>



				 <table class="responsive-table">
        <thead>
          <tr>
              <th>Categoria</th>
              <th>Cliente </th>
              <th>Serie</th>
			        <th>Marca</th>
							<th>Modelo</th>
              <th>Observacion</th>
		          <th>Ubicacion</th>
		          <th>Ingreso</th>
              <th>Fecha Entrada</th>
              <th>Editar</th>
              <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $consulta="select equipo_o.serie,equipo_o.marca,equipo_o.modelo,equipo_o.observacion,equipo_o.ubicacion,equipo_o.ingreso,
					equipo_o.fecha_ingreso,equipo_o.cliente_ruc,categoria.nombre ,cliente.razon_social
					from equipo_o  INNER JOIN categoria on equipo_o.id_categoria=categoria.id
					INNER JOIN cliente ON equipo_o.cliente_ruc=cliente.ruc";
          $ejecutar=sqlsrv_query($conn,$consulta);
          $i=0;
          while ($fila=sqlsrv_fetch_array($ejecutar)) {
            // code...
           $seri=$fila['serie'];
					 $categoria=$fila['nombre'];
           $cliente=$fila['razon_social'];
          $marca=$fila['marca'];
           $modelo=$fila['modelo'];
           $observacion=$fila['observacion'];
           $ubicacion=$fila['ubicacion'];
           $ingreso=$fila['ingreso'];
           $fecha_entrada=$fila['fecha_ingreso'];
           $i++;

           ?>

          <!---cuerpo de tabla --->
          <tr>
            <td><?php echo $categoria ?></td>
            <td><?php echo $cliente ?></td>
            <td><?php echo $seri?></td>
            <td><?php echo $marca?></td>
            <td><?php echo $modelo ?></td>
            <td><?php echo $observacion?></td>
            <td><?php echo $ubicacion?></td>
            <td><?php echo $ingreso?></td>
            <td><?php echo $fecha_entrada?></td>
            <td><a href="producto.php?editar=<?php echo $seri?>">Editar</a></td>
            <td><a href="producto.php?borrar=<?php echo $seri?>">Borrar</a></td>

          </tr>
          <!---final del cuerpo de tabla--->

          </tbody>
          <?php } ?>
          </table>





          <?php
           if(isset($_GET['editar'])){
          echo '<div id="altura_blanco"></div>';
            include("editar_producto.php");
          }
          ?>

          <?php
          if(isset($_GET['borrar'])){
          $borrar_id=$_GET['borrar'];
          $consulta="DELETE from equipo_o where serie='$borrar_id'";
          $ejecutar=sqlsrv_query($conn,$consulta);

          if($ejecutar){
            echo "<script>alert('Registro Eliminado')</script>";
            echo "<script>window.open('producto.php','_self')</script>";
              }

            }
          ?>


          <!---section---->
                    </div>

                    </div>

          <?php
          include("footer.html");
           ?>

  <!--  Scripts-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
 <script>
  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
  </body>
</html>
