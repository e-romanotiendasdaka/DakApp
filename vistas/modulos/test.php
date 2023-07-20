<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Reporte de Ventas Offline</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Reporte de Ventas Offline
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="progress"><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>
		<div class="pd-20 card-box mb-30">
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
							<input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicial" name="fechaInicial" required/>
						</div>
					</div>
					<div class="col-md-2 col-sm-12">
						<div class="form-group">
							<label>Hasta</label>
							<input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinal" name="fechaFinal" required/>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12 col-sm-12 text-right">
					<button type="button" class="btn btn-success" onclick="buscarVentas()"><i class="nav-icon fa fa-search"></i> Buscar</button>
          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
				</div>
			</div>
			</form>
		</div>
		<div class="card-box mb-30">
			<div class="pd-20">
			</div>
			<div class="pb-20">
				<table class="table hover select-row data-table-export cell-border table-off">
					<thead>
						<tr>
							<th>Fecha</th>
              <th class="table-plus datatable-nosort">Codigo Suc</th>
              <th>Sucursal</th>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>FechaIngresi</th>
              <th>FechaEgreso</th>
              <th>Departamento</th>
              <th>Categoria</th> 
              <th>Meta</th> 
              <th>Unidad Vtas</th> 
              <th>Cumplimiento</th>
              <th>Bono</th>   
              <th>Bono MCD</th>
              <th>Serv. Instalacion</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$test = ControladorMaestros::ctrMostrarTest();
							// foreach ($test as $key => $value) {
								// echo '<pre>'; print_r($value); echo '</pre>';
								echo'<td>'.$test["Fecha"].'</td>
										 <td>'.$test["CodigoSucursal"].'</td>
										 <td>'.$test["Sucursal"].'</td>
										 <td>'.$test["Cedula"].'</td>
										 <td>'.$test["Nombre"].'</td>
										 <td>'.$test["FechaIngresi"].'</td>
										 <td>'.$test["FechaEgreso"].'</td>
										 <td>'.$test["Departamento"].'</td>
										 <td>'.$test["Categoria1"].'</td>
										 <td>'.$test["Meta"].'</td>
										 <td>'.$test["UniVtas"].'</td>
										 <td>'.$test["Cumplimiento"].'</td>
										 <td>'.$test["BonoCat2"].'</td>
										 <td>'.$test["BonoMCD"].'</td>
										 <td>'.$test["ServInstalacion"].'</td>
								';
							// }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
	include "footer.php";
?>