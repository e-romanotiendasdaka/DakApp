<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Reporte de Ventas Offline Personalizado</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Reporte de Ventas Offline Personalizado
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="progress"><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>
		<div class="pd-20 card-box mb-30" id="divData">
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-success h4">Fechas</h4>
				</div>
			</div>
			<form>
				<div class="row">
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Desde</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicialP" name="fechaInicialP" required/>
						</div>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Hasta</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinalP" name="fechaFinalP" required/>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12 col-sm-12 text-right">
					<button type="button" class="btn btn-success" onclick="buscarVentasPersonalizado()"><i class="nav-icon fa fa-search"></i> Buscar</button>
          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
				</div>
			</div>
			</form>
		</div>
		<div class="card-box mb-30">
			<div class="pd-20">
			</div>
			<div class="pb-20">
				<strong><label>Cantidad de facturas: </label></strong>
          <label id="totalfacts"> </label>
          <strong><label> | Cantidad de devoluciones: </label></strong> 
          <label id="totalnc"> </label>  
          <strong><label> | Total de operaciones: </label></strong>
          <label id="totaloper"></label>
				<table class="table hover select-row data-table-export cell-border table-off-perz">
					<thead>
						<tr>
							<th>Id Suc SAP</th>
              <th class="table-plus datatable-nosort">Fecha</th>
              <th>Caja</th>
              <th>Operador</th>
              <th>Base Bruta</th>
              <th>Base Bruta (USD)</th>
              <th>Desct</th>
              <th>Desct (USD)</th>
              <th>Base Neta</th> 
              <th>Base Neta (USD)</th> 
              <th>I.V.A.</th> 
              <th>I.V.A. (USD)</th>
              <th>Total</th>   
              <th>Total (USD)</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<strong><label>Total Ventas</label></strong>
							<input class="form-control" type="text" id="totalVtaP" name="totalVtaP" readonly/>
						</div>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<strong><label>Total Ventas Conversion</label></strong>
							<input class="form-control" type="text" id="totalVtaUsdP" name="totalVtaUsdP" readonly/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include "footer.php";
?>