<?php
	include ('PhpMySQL.php'); //Connect BD

	session_start(); //Start session
		
	#unset($_SESSION['NOMBREUSUARIO']);	//Unset the variables stored in session (CIERRA SESIONES PASADAS)
	#unset($_SESSION['SESS_MEMBER_PERFIL']);
	#unset($_SESSION['SESS_MEMBER_NOMBRE']);
	
	$conexion = new Database();
	$enable = "true";
	
	function userlogin($user, $password)
	{	
		$sql = "CALL LOGIN('".$user."','".$password."')";
		$sql = mysql_query($sql);
                
		if (mysql_num_rows($sql)>0)
			{
				//Login Successful			
				$member = mysql_fetch_assoc($sql);
				$_SESSION['NOMBREUSUARIO'] = $member['NOMBRE'];
				$_SESSION['IDUSUARIO']= $member['ID_USUARIO'];
				$_SESSION['IDPERFIL']= $member['ID_PERFIL'];
				Header("Location: Home/home.php"); 
			}
                            else 
        			{	
                        	   $enable = "false";
                                   return  $enable;
                		}
                                
	$conexion->close(); //Cerrar conexión con BD
	//mysql_close($conexion); //Cerrar conexión con BD
	}
?>