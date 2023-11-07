<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Reporte Consultas de Facturas por Serializacion</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Reporte Consultas de Facturas por Serializacion
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="progress">
      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
		<div class="pd-20 card-box mb-30">
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-success h4">Fechas</h4>
				</div>
			</div>
			<form>
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label>Sucursal</label>
							<select class="custom-select" id="seleccionarSucursal5" name="seleccionarSucursal5" required>
								<option selected="">Seleccionar...</option>
								<?php
									if ($_SESSION["sucursal"] == 0) {
										$sucursales = ControladorMaestros::ctrMostrarSucursales();
			              foreach ($sucursales as $key => $value) {
			                echo '<option data-id="'.$value["IdSucursal"].'" data-color="'.$value["IpServidor"].'" value="'.$value["Servidor"].'">'.$value["Sucursal"].'</option>';
			              }
									}else{
										$id = $_SESSION["sucursal"];
										$sucursales = ControladorMaestros::ctrSucursal($id);
			              foreach ($sucursales as $key => $value) {
			                echo '<option data-id="'.$value["IdSucursal"].'" data-color="'.$value["IpServidor"].'" value="'.$value["Servidor"].'">'.$value["Sucursal"].'</option>';
			              }
									}                                       
		            ?>
							</select>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label>Estatus</label>
							<select class="custom-select" id="seleccionarEstatus" name="seleccionarEstatus" required>
								<option selected="">Seleccionar...</option>
								<?php
									if ($_SESSION["sucursal"] == 0) {
		                echo '<option value="Todas">Todas</option>
													<option value="Despachada">Despachada</option>
													<option value="Devuelta">Devuelta</option>
													<option value="Pendiente por despacho">Pendiente por despacho</option>
													<option value="Pendiente por serializar">Pendiente por serializar</option>';
									}else{
										if ($_SESSION["perfil"] == "Logistica") {
											echo '<option value="Pendiente por serializar">Pendiente por serializar</option>';
										}else{
											echo '<option value="Todas">Todas</option>
														<option value="Despachada">Despachada</option>
														<option value="Devuelta">Devuelta</option>
														<option value="Pendiente por despacho">Pendiente por despacho</option>
														<option value="Pendiente por serializar">Pendiente por serializar</option>';
										}
									}                                       
		            ?>
							</select>
						</div>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Desde</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicial5" name="fechaInicial5" required/>
						</div>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Hasta</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinal5" name="fechaFinal5" required/>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12 col-sm-12 text-right">
					<button type="button" class="btn btn-danger" onclick="consultarFacturas()"><i class="nav-icon fa fa-search"></i> Buscar</button>
          			<button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
				</div>
			</div>
			</form>
		</div>
		<div class="card-box mb-30">
			<div class="pd-20">
			</div>
			<div class="pb-20">
				<table class="table hover select-row data-table-export cell-border table-off-ser">
					<thead>
						<tr>
              <th>Sucursal</th>
              <th>Fecha</th>
              <th>Caja-Factura</th>
              <th>Estatus</th>
              <th>Monto Total</th>
              <th>Estatus Seri</th>
              <th>Ind Devolucion</th>
              <th>Ind Dev Comp</th>
              <th>Referencia</th>
              <th>Nombre</th>
           </tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
	include "footer.php";
?>