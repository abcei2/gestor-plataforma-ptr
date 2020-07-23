<?php
include ('PhpMySQL.php'); //Connect BD
$conexion = new Database();
$enable="true";

function recuperar($email){

	$sql = "SELECT * FROM MR_USUARIOS WHERE CORREO='".$email."'";
	$sql = mysql_query($sql);
	if(mysql_num_rows($sql)>0){
	mail($email, "Recuperacion de datos", "Sus datos en nuestra web son usuario : $usuario y su password es: $password");
	else
	{
		header("Location:index.html");


	}

	}
}

?>