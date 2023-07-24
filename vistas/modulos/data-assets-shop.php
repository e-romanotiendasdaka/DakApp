<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Reporte de Consulta de Asesores</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Reporte de Consulta de Asesores
							</li>
						</ol>
					</nav>
				</div>
				<div class="col-6 text-right">
					<label>Sucursal </label>
					<select class="custom-select col-6" id="seleccionarSucursal6" name="seleccionarSucursal6" required>
						<option selected="">Seleccionar...</option>
						<?php
							if ($_SESSION["sucursal"] == 0) {
								$sucursales = ControladorMaestros::ctrMostrarSucursales();
	              foreach ($sucursales as $key => $value) {
	                echo '<option data-id="'.$value["CodigoSucursal"].'" data-color="'.$value["IpServidor"].'" value="'.$value["Servidor"].'">'.$value["Sucursal"].'</option>';
	              }
							}else{
								$id = $_SESSION["sucursal"];
								$sucursales = ControladorMaestros::ctrSucursal($id);
	              foreach ($sucursales as $key => $value) {
	                echo '<option data-id="'.$value["CodigoSucursal"].'" data-color="'.$value["IpServidor"].'" value="'.$value["Servidor"].'">'.$value["Sucursal"].'</option>';
	              }
							}                                       
            ?>
					</select>
				</div>
			</div>
		</div>
		<div class="progress"><div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>
		<div class="pd-20 card-box mb-30" id="divData">
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-primary h4">Fechas</h4>
				</div>
			</div>
			<form>
				<div class="row">
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Desde</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicial6" name="fechaInicial6" required/>
						</div>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Hasta</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinal6" name="fechaFinal6" required/>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12 col-sm-12 text-right">
					<button type="button" class="btn btn-primary" onclick="consultarAsesores()"><i class="nav-icon fa fa-search"></i> Buscar</button>
          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
				</div>
			</div>
			</form>
		</div>
		<div class="card-box mb-30">
			<div class="pd-20">
			</div>
			<div class="pb-20">
				<table class="table hover select-row data-table-export cell-border table-consult">
					<thead>
						<tr>
							<th>Fecha</th>
              <th class="table-plus datatable-nosort">CodigoSucursal</th>
              <th>Sucursal</th>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>FechaIngresi</th>
              <th>FechaEgreso</th>
              <th>Departamento</th>
              <th>Categoria1</th>
              <th>Meta</th>
              <th>UniVtas</th>
              <th>Cumplimiento</th>
              <th>BonoCat2</th>
              <th>BonoMCD</th>
              <th>ServInstalacion</th>
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