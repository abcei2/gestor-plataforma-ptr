<?php
$datos =  $_POST['datoj'];
print json_encode($datos);
$newJsonString = json_encode($datos);
file_put_contents('file1.json', $newJsonString);