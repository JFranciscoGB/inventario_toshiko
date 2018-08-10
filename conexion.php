<?php
$serverName='localhost';
$infoConex= array("Database"=>"toshiko_v1","UID"=>"sa","PWD"=>"123456","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName,$infoConex);



if ($conn) {

//echo"CONEXION EXITOSA";
}
else {
echo "FALLO";
}
 ?>
