                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?php
	// The lvlroot variable indicates the levels of direcctories
	// the file loaded has to up, to be on the root directory
	$lvlroot ="../../";
	// Including Head.
	include_once($lvlroot."Body/Head.php");
	// Including Begin Header.
	include_once($lvlroot."Body/BeginPage.php");
        if($_SESSION['NOMBREUSUARIO'] == NULL)
            {
	?>    <script>
		window.location = "../../Home/exit.php";
		</script><?php
	}
	// Including Side bar.
	include_once($lvlroot."Body/SideBar.php");
	// Including Php database.
	include_once($lvlroot."assets/php/PhpMySQL.php");

	// functions defined in js/autocompleteDoctteHandler.js
	$nosubmit = "if (event.keyCode == 13) event.preventDefault()";
	$autoCompleteImportCall = "if (event.keyCode == 13) { autoCompleteImportCall(this); event.preventDefault(); }";
	// functions defined in js/autocompleteDoctteHandler.js
	$autoCompleteDoctteCall = "if (event.keyCode == 13) { event.preventDefault(); autoCompleteDoctte(this); }";
	// Prevent default post
	$preventDefault = "if (event.keyCode == 13) { event.preventDefault(); }";
        
?>
<script>
	var lvlrootjs = <?php print json_encode($lvlroot); ?>;
</script>
<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Inicio</a></li>
		<li><a href="javascript:;">Proceso Bodega</a></li>
		<li class="active">Selección de Bultos</li>
	</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
	<h1 class="page-header">Selección de mercancía por bultos <small>Seleccionar la mercancía para el despacho, identificada por la referencia de los bultos.</small></h1>
<!-- end page-header -->

<div class="row">
	<!-- begin main column -->
	<div class="col-md-12">
		<!-- begin panel select -->
		<div class="panel panel-inverse ">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				</div>
				<h4 class="panel-title">
					<i class="fa fa-file fa-lg"></i>
					CONSULTAR EAN
				</h4>
			</div>
			<!-- begin body panel -->
			<div class="panel-body panel-form" id="panel-body-form">
				<!-- begin form -->
				<form data-parsley-validate="true" id="client-form" name="client-form" class="form-horizontal form-bordered" method="post" action="" onkeydown="<?php echo $nosubmit; ?>">
					<div class="form-group">
						<label class="control-label col-md-4 text-left">Introduzca el EAN(*)</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="pickingName" name="pickingName"/>
						</div>
					</div>
					

				</form>
				<!-- end form -->
			</div>
			<!-- end body panel -->
		</div>
		<!-- end panel select -->
		<!-- begin panel Package references -->
		<div class="panel panel-inverse" id="panel-boxes" style="display:none;">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				</div>
				<h4 class="panel-title">
					<i class="fa fa-check-square-o fa-lg"></i>
					Descripción
				</h4>
			</div>
			<!-- begin body panel -->
			<div class=" panel-body panel-form ">
				<form id="references-form" name="references-form" class="panel-form form-horizontal form-bordered" method="post" action="" >
					
					<div class="form-group" id="divReferenceTable">
						<table class="table" id="referenceTable">
						</table>
					</div>
					<input type="hidden" id="hiddenrefs" name="hiddenrefs">
				</form>
			</div>
			<!-- end body panel -->
		</div>
		<!-- end panel Package references -->
	</div>
	<!-- end main column -->
		


	<!-- begin save/cancel button -->
	<div class="form-group" id="cancel-save" style="display:none;">
		<div class="col-md-12 col-sm-12 text-right">
			<button id="cancelData" name="cancelData" class="btn btn-warning btn-sm">
				<i class="fa fa-ban">
					Cancelar
				</i>
			</button>
			<button id="save" name="save" class="btn btn-primary btn-sm">
					<i class="fa fa-floppy-o">
						Guardar
					</i>
			</button>
		</div>
	</div>
	<!-- end save/cancel button -->

	<!-- Including alerts windows -->
	<?php
		include_once($lvlroot."Body/AlertsWindows.php");
	?>
</div>
<!-- end row -->

<?php
	// Including Js actions, put in the end.
	include_once($lvlroot."Body/JsFoot.php");
	// Including End Header.
	include_once($lvlroot."Body/EndPage.php");
	// Writing on database.
	//include_once("php/Insert2db.php");
?>

<!-- // Loading set validations. -->
<script type="text/javascript" src="js/setValidations.js"></script>
<!-- // Loading autocomplete handler. -->
<script type="text/javascript" src="js/autocompleteOrder.js"></script>
<!-- begin submit all script-->
<script type="text/javascript" src="js/validationfields.js"></script>
<!-- end submit all script-->

<script type="text/javascript">
	// Activating the side bar.
	var Change2Activejs = document.getElementById("sidebarProcesoBodega");
	Change2Activejs.className = "has-sub active";
	var Changesub2Activejs = document.getElementById("sidebarProcesoBodega-OrderPicking");
	Changesub2Activejs.className = "active";
</script>