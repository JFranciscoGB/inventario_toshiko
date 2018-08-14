<?php
// Estableciendo la conexion a la base de datos
//include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("conexion.php");//Contiene de conexion a la base de datos

session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_user_sys'];
// SQL Query para completar la informacion del usuario

$ses_sql=sqlsrv_query($conn, "select usuario ,nombre from usuario where usuario='".$user_check."';");

$row = sqlsrv_fetch_array($ses_sql);
$login_session =$row['usuario'];
$nombre_usuario =$row['nombre'];
if(!isset($login_session)){
sqlsrv_close($conn); // Cerrando la conexion
header('Location: index.php'); // Redirecciona a la pagina de inicio
}
?>
