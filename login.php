<?php
//include ("conexion.php");
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submitt'])) {
	
if (empty($_POST['usernamee']) && empty($_POST['passwordd'])){

$error = "Usuario o Contraseña Invalidos";
echo $error;
}
else
{
// Define $username y $password
$username=$_POST['usernamee'];
$password=$_POST['passwordd'];
echo "entro al else\n";
echo "usuario ".$username;
echo "contraseña ".$password;
// Estableciendo la conexion a la base de datos
//include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos

include("conexion.php");//Contiene de conexion a la base de datos
echo "hizo el include del login 1";
// Para proteger de Inyecciones SQL
//$username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
//$password =  sha1($password);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php
//$counter=0;
$sql = "select usuario, contrasena from usuario WHERE usuario ='".$username."'and contrasena='".$password."';";

$ejecutar=sqlsrv_query($conn,$sql);
echo "ejecutar ".$ejecutar;
//$row = sqlsrv_fetch_array($ejecutar);
// mi $ejercutar $query=mysqli_query($con,$sql);
$counter =sqlsrv_num_rows($row);
//mi $counter $counter=mysqli_num_rows($ejecutar);

echo "cantidad ".$counter;

if ($counter==0){
	$_SESSION['login_user_sys']=$username; // Iniciando la sesion
	$_SESSION['login_user_sys2']=$password; // Iniciando la sesion
	//	echo "hizo el include del login 2";
		header("location: producto.php"); // Redireccionando a la pagina profile.php
}
 else {
$error = "El correo electrónico o la contraseña es inválida.";
echo $error;
session_destroy();
}
}
}
else{
	echo $error;
	session_destroy();
}

?>
