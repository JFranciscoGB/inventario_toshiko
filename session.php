<?php
// Estableciendo la conexion a la base de datos
//include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("conexion.php");//Contiene de conexion a la base de datos

session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_user_sys'];
$user_check2=$_SESSION['login_user_sys2'];
// SQL Query para completar la informacion del usuario

//$sql = "select usuario, contrasena from usuario WHERE usuario ='".$username."'and contrasena='".$password."';";
$ses_sql=sqlsrv_query($conn, "select usuario,nombre  from usuario where usuario ='".$user_check."'and contrasena='".$user_check2."';");
$row = sqlsrv_fetch_array($ses_sql);
$login_session =$row['usuario'];
$login_session_nom =$row['nombre'];
echo "Usuario : " .$login_session_nom;
if(!isset($login_session)){
	echo "esta aca francisco";
sqlsrv_close($conn); // Cerrando la conexion
header('Location: index.php'); // Redirecciona a la pagina de inicio
}
?>
