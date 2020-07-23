<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

include_once('../../../../../../php/PhpMySQL.php');
$connection = new Database();
if(!$connection->link)
{
	$result['ERROR'][0] = "Error de conexión";
	$result['ERROR'][1] = "No se pudo conectar a la base de datos";
}
else
{
	error_reporting(E_ALL | E_STRICT);
	foreach($_FILES as $onefile)
	{
		$fileName = $onefile['name'][0];
		$fileSize = $onefile['size'][0];
		$fileType = $onefile['type'][0];
		$TransportDoc = $_POST['TransportCopy'];
		$querySaveFileData = "CALL GUARDADO_ARCHIVOS('$TransportDoc','$fileName','$fileType','$fileSize');";
		$querySaveFileDataResult = $connection->query($querySaveFileData);
	}
	$connection->close();
	require('UploadHandler.php');
	$upload_handler = new UploadHandler();
}
?>