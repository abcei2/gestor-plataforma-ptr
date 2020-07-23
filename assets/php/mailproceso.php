<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
<script src="../js/sweet-alert.min.js"></script>
<?php
	$lvlroot ="../../";
	include_once($lvlroot."Body/Head.php");
	include_once($lvlroot."assets/php/PhpMySQL.php");
?>
<?php 
$resultado = $_POST['valorCaja1']; 
$mail = "Prueba de mensaje";
$titulo = "PRUEBA DE TITULO";
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: Mercury - Cambio en la cuenta Theory < pablo.barrera@inter-telco.com >\r\n";
$bool = mail($resultado,$titulo,$mail,$headers);
if($bool){
 echo '<script> setTimeout(function() {
			swal({	
				title: "Mensaje Enviado",
				width: 400,
				height: 300,
				text: "Las instrucciones de recuperación fueron envíados a su correo",
				imageUrl: "../../assets/img/logoplg.jpg",
				timer: 4000,
			
				type: "success"	

				}, function() {
						window.close();
			});
  				  }, 1000);	</script>';
}
else
	{
    	 echo "Por favor, verifique que su correo está bien escrito";
	}
?>