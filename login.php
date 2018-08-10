<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username y $password
$username=$_POST['username'];
$password=$_POST['password'];
// Estableciendo la conexion a la base de datos
//include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("conexion.php");//Contiene de conexion a la base de datos

// Para proteger de Inyecciones SQL
//$username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
//$password =  sha1($password);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php

$sql = "SELECT usuario, contrasena FROM usuario WHERE usuario = '" . $username . "' and contrasena='".$password."';";
$ejecutar=sqlsrv_query($conn,$sql);
// mi $ejercutar $query=mysqli_query($con,$sql);
$counter =sqlsrv_num_rows($ejecutar);
//mi $counter $counter=mysqli_num_rows($ejecutar);

if ($counter==1){
		$_SESSION['login_user_sys']=$username; // Iniciando la sesion
		header("location: producto.php"); // Redireccionando a la pagina profile.php


} else {
$error = "El correo electrónico o la contraseña es inválida.";
}
}
}
?>
