<?php
$user = 'postgres';
$passwd = 'Orion2017*';
$db = 'orion';
$port = 5432;
$host = '181.129.51.43';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
?>