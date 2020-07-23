<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script src="js/sweet-alert.min.js"></script>
<?php
	// The lvlroot variable indicates the levels of direcctories
	// the file loaded has to up, to be on the root directory
	$lvlroot ="../../";
	// Including Head.
	include_once($lvlroot."Body/Head.php");
	// Including Begin Header.
//	include_once($lvlroot."Body/BeginPage.php");
	// Including Php database.
	include_once($lvlroot."assets/php/PhpMySQL.php");
	//include_once($lvlroot."assets/php/recover.php");
//	include($lvlroot."assets/php/recuperacioncuenta.php");
?>
<?php
$conexion = new Database();
if(isset($_POST['email'])){
	$email = $_POST['email'];
	var_dump($email);

		$sql = "SELECT * FROM MR_USUARIOS WHERE CORREO='".$email."'";
		$sql = $conexion->query($sql);

		if (mysql_num_rows($sql)>0)
			{

				mail('jpablo0550@gmail.com', 'asunto', 'mensaje');
				
				Header("Location: index.php"); 

			}
					
	$conexion->close(); //Cerrar conexión con BD
	//mysql_close($conexion); //Cerrar conexión con BD

}

?>
<!-- begin page-header -->
	<h1 class="page-header">Recuperar Cuenta</h1>
<!-- end page-header -->

	<!-- begin column -->
	<div class="col-md-6">
		<!-- begin panel Driver info -->
		<div class="panel panel-inverse " data-sortable-id="form-plugins-1">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				</div>
				<h4 class="panel-title">
					Recuperación de acceso MERCURY</h4>
			</div>
			<!-- begin body panel  -->
			<div class="panel-body" id="panel-info-form">
				<div class="panel-form form-horizontal form-bordered">
			 <form data-parsley-validate="true" id="recoverForm" action="" method="POST" class="margin-bottom-0">

				<div class="form-group">
					<table id="Batch-table" class="table">
						<thead>
							<tr	<div class="form-group">
							<label class="control-label col-md-2 col-sm-2" for="usuario">Escriba el Correo electrónico asociado a esta cuenta (*):</label>
							<div class="col-md-2 col-sm-2">
								<input class="form-control" type="text" id="email" name="email" placeholder="ejemplo@gmail.com" data-parsley-required="true"  />
							</div>
						</div>
							</tr>
							<br/>
 
			<span id="resultado"></span>
						</thead>
						<tbody id="drivers-table">
							
						</tbody>
					</table>
					</div>
					</form>
				</div>
			</div>
			<!-- end body panel -->
		</div>
		<!-- end panel Driver info -->
	</div>
	<!-- end column -->	
	
	<div class="form-group">
		<div class="col-md-2 col-sm-2">
			<input type="button" class="btn  btn-primary" href="javascript:;" onclick="realizaProceso($('#email').val());return false;" value="Enviar Instrucciones"/>
			<button class="btn  btn-primary" onclick="sendCallback();">	Salir	</button>
		</div>
	</div>

<?php	
	// Including Js actions, put in the end.
	include_once($lvlroot."Body/JsFoot.php");
	// Including End Header.
	include_once($lvlroot."Body/EndPage.php");
?>
<script type="text/javascript">
function sendCallback()
{	
	window.close();
}
</script>
<script>
function realizaProceso(valorCaja1){
        var parametros = {
                "valorCaja1" : valorCaja1
        };
        $.ajax({
                data:  parametros,
                url:   'mailproceso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);

                }
        });
}
</script>
 


