<?php

include("assets/php/start_sesion.php");
session_start();

if(!$_SESSION['NOMBREUSUARIO']){
echo "GNU/Linux ";
exit();

}


?>