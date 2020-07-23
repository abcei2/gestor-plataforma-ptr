<!-- This file has the modal alerts to show on the page -->
<!-- The alerts file could be inside the row div -->
	<!-- #modal-alert -->
		<!-- modal-trigger -->
	<a href="#modal-alert" id="alert-trigger" class="btn btn-sm btn-danger" data-toggle="modal" style="display:none;">Demo</a>
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Ocurrió un error</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger m-b-0">
						<h4 id="alert-Header"><i class="fa fa-info-circle"></i> Alert Header</h4>
						<p id="alert-comentary"></p>
					</div>
				</div>
				<div class="modal-footer">
					<a id="alert-cancel-button" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
					<a id="alert-accept-button" class="btn btn-sm btn-danger" data-dismiss="modal">Aceptar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End modal-alert -->
	<!-- #modal-dialog -->
		<!-- modal-trigger -->
	<a href="#modal-dialog" id="modal-trigger" class="btn btn-sm btn-danger" data-toggle="modal" style="display:none;">Demo</a>
	<div class="modal fade" id="modal-dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Solicitud realizada con éxito</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-success m-b-0">
						<h4 id="modal-Header"><i class="fa fa-info-circle"></i> Alert Header</h4>
						<p id="modal-Note"></p>
					</div>
				</div>
				<div class="modal-footer">
					<a id="modal-cancel-button" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
					<a id="modal-accept-button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End modal-dialog -->
	<!-- #modal-warning -->
		<!-- modal-trigger -->
	<a href="#modal-warning" id="warning-trigger" class="btn btn-sm btn-danger" data-toggle="modal" style="display:none;">Demo</a>
	<div class="modal fade" id="modal-warning">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Advertencia</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning m-b-0">
						<h4 id="warning-Header"><i class="fa fa-info-circle"></i> Alert Header</h4>
						<p id="warning-comentary"></p>
					</div>
				</div>
				<div class="modal-footer">
					<a id="warning-cancel-button" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
					<a id="warning-accept-button" class="btn btn-sm btn-warning" data-dismiss="modal">Aceptar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End modal-warning -->