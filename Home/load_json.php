<?php
$value = file_get_contents("file1.json");
$json_response = json_encode($value);


header('Content-Type: application/json; charset=utf8');
echo $json_response;