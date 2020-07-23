
<?php
include ('PhpMySQL.php'); //Connect BD

	session_start(); //Start session
		
	#unset($_SESSION['NOMBREUSUARIO']);	//Unset the variables stored in session (CIERRA SESIONES PASADAS)
	#unset($_SESSION['SESS_MEMBER_PERFIL']);
	#unset($_SESSION['SESS_MEMBER_NOMBRE']);
	
	$conexion = new Database();
	$enable = "true";

function recoverpassword($email)
{
		$sql = "SELECT * FROM MR_USUARIOS WHERE CORREO='".$email."'";
		$sql = $conexion->query($sql);

		//if (mysql_num_rows($sql)>0)
		//	{
		//		//Login Successful			
		//		$member = mysql_fetch_assoc($sql);
		//		//$_SESSION['NOMBREUSUARIO'] = $member['NOMBRE'];
		//		$to      = $email;
		//		$subject = 'Recuperación de Clave';
		//		$message = 'Hola, para acceder a la plataforma debes comuninicarte con el administrador del sistema';
		//		$headers = 'From: pablo.barrera@inter-telco.com' . "\r\n" .
		//		'Reply-To: pablo.barrera@inter-telco.com' . "\r\n" .
		//		'X-Mailer: PHP/' . phpversion();

		//		mail($to, $subject, $message, $headers);
				
		//		Header("Location: index.php"); 

		//	}
		//else 
		//	{	
		//		$enable = "false";
		//		return  $enable;
		//	}		
	$conexion->close(); //Cerrar conexión con BD
	//mysql_close($conexion); //Cerrar conexión con BD
}
?>