<?php
$URL =  $_POST['URL'];
$datos_service =file_get_contents("$URL");
$rest=substr($datos_service,1,strlen($datos_service)-2);

print  $rest;   