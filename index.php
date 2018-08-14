<?php
//https://obedalvarado.pw/blog/formulario-inicio-sesion-php-mysql/
//REVISAR CODIGO PARA REVISAR
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user_sys'])){
	header("location: producto.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>GRUPO TOSHIKO</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/estilo_categoria.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>

  <body>
<div class="container">
  <div class="section">

<div class="row">
<div class="col l8 s12 offset-l2">

    <div class="card">
        <div class="card-content">



              <img src="imagenes/Logo-Grupo-Toshiko.jpg" alt="" class="responsive-img">
              <h5 class="center">INICIAR SESION </h5>
        </div>

        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width ">
            <li class="tab"><a href="#loguin">Iniciar Sesion</a></li>

            <li class="tab"><a href="#registrar">Registrarse</a></li>

          </ul>
        </div>
        <div class="card-content grey lighten-4">
          <div id="login">
<form action="#" method="post">
            <div class="row">
              <div class="input-field col l6 s12 offset-l3">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" name="usernamee" class="validate">
                        <label for="icon_prefix">Usuario/Correo</label>
                      </div>
            </div>

            <div class="row">
              <div class="input-field col l6 s12 offset-l3">
                        <i class="material-icons prefix">beenhere</i>
                        <input  id="password" type="password" name="passwordd" class="validate">
                        <label for="password">Contraseña</label>
                      </div>
            </div>


            <div class="center" >
              <input type="submit" name="submitt" value="Ingresar" class="btn">
            </div>
          </div>
        </form>
          <div id="registrar">
            <div class="row">
              <div class="input-field col l6 s12 offset-l3">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Usuario/Correo</label>
                      </div>
            </div>

            <div class="row">
              <div class="input-field col l6 s12 offset-l3">
                        <i class="material-icons prefix">beenhere</i>
                        <input  id="password2" type="password" class="validate">
                        <label for="password">Contraseña</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l6 s12 offset-l3">
                        <i class="material-icons prefix">beenhere</i>
                        <input  id="password1" type="password" class="validate">
                        <label for="password">Contraseña 2</label>
              </div>
            </div>

            <div class="center" >
              <input type="submit" name="insert" value="Ingresar" class="btn">
            </div>
          </div>



        </div>
      </div>
  
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

    <?php
  include("footer.html");
    ?>

  </body>

  </html>
