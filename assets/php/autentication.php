<?php
	session_start();
	if (!$_SESSION['NOMBREUSUARIO'])
	{
		Header("Location: exit.php");
	}

?>