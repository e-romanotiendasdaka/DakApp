<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Reporte de Ventas Por Asesor</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Reporte de Ventas Por Asesor
							</li>
						</ol>
					</nav>
				</div>
				<div class="col-6 text-right">
					<label>Sucursal </label>
					<select class="custom-select col-6" id="seleccionarSucursal2" name="seleccionarSucursal2" required>
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
		</div>
		<div class="progress"><div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
					<div class="pd-20 card-box">
						<h5 class="h4 text-blue mb-20">Panel de Consulta</h5>
						<div class="tab">
							<ul class="nav nav-pills justify-content-end" role="tablist">
								<li class="nav-item">
									<a class="nav-link active text-blue" data-toggle="tab" href="#asesor" role="tab" aria-selected="true">Busqueda por Asesor</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-blue" data-toggle="tab" href="#factura" role="tab" aria-selected="false">Busqueda por Factura</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="asesor" role="tabpanel">
									<div class="pd-20 card-box mb-30">
										<div class="clearfix">
											<div class="pull-left">
												<h4 class="text-blue h4">Asesor(es), Area(s) y fechas</h4>
											</div>
										</div>
										<form>
											<div class="row">
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
														<label>Asesor(es)</label>
														<select class="selectpicker form-control" data-size="5" data-style="btn-outline-primary" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAsesores" name="seleccionarAsesores">
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
														<label>Areas(es)</label>
														<select class="selectpicker form-control" data-size="5" data-style="btn-outline-primary" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAreas" name="seleccionarAreas">
														</select>
													</div>
												</div>
												<div class="col-md-2 col-sm-12">
													<div class="form-group">
														<label>Desde</label>
														<input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicial2" name="fechaInicial2" required/>
													</div>
												</div>
												<div class="col-md-2 col-sm-12">
													<div class="form-group">
														<label>Hasta</label>
														<input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinal2" name="fechaFinal2" required/>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 text-right">
													<button type="button" class="btn btn-primary" onclick="buscarVentasAsesor()"><i class="nav-icon fa fa-search"></i> Buscar</button>
								          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="tab-pane fade" id="factura" role="tabpanel">
									<div class="pd-20 card-box mb-30">
										<div class="clearfix">
											<div class="pull-left">
												<h4 class="text-danger h4">Factura(s), Area(s), Caja(s), Asesor(es) y fechas</h4>
											</div>
										</div>
										<form>
											<div class="row">
												<div class="col-md-2 col-sm-12">
													<div class="form-group">
														<label>Factura(s)</label>
														<input class="form-control" placeholder="Ingrese factura a consultar" type="text" id="nuevaFactura" name="nuevaFactura"/>
													</div>
												</div>
												<div class="col-md-1 col-sm-12">
													<label class="weight-600">Buscar todas las facturas</label>
													<div class="custom-control custom-checkbox mb-5">
														<input type="checkbox" id="customCheck1"/>
													</div>
												</div>
												<div class="col-md-1 col-sm-12">
													<label class="weight-600">Buscar por cajas</label>
													<div class="custom-control custom-checkbox mb-5">
														<input type="checkbox" id="customCheck2"/>
													</div>
												</div>
												<div class="col-md-2 col-sm-12 cajas" style="display: none;">
													<div class="form-group">
														<label>Caja(s)</label>
														<select class="selectpicker form-control" data-size="5" data-style="btn-outline-danger" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarCaja2" name="seleccionarCaja2">
														</select>
													</div>
												</div>
												<div class="col-md-2 col-sm-12">
													<div class="form-group">
														<label>Areas(es)</label>
														<select class="selectpicker form-control" data-size="5" data-style="btn-outline-danger" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAreas2" name="seleccionarAreas2">
														</select>
													</div>
												</div>
												<div class="col-md-2 col-sm-12">
													<div class="form-group">
														<label>Desde</label>
														<input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicial3" name="fechaInicial3" required/>
													</div>
												</div>
												<div class="col-md-2 col-sm-12">
													<div class="form-group">
														<label>Hasta</label>
														<input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinal3" name="fechaFinal3" required/>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 text-right">
													<button type="button" class="btn btn-danger" onclick="buscarVentasFactura()"><i class="nav-icon fa fa-search"></i> Buscar</button>
								          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-box mb-30">
				<div class="pd-20">					
				</div>
				<div class="pb-20">
					<strong><label>Cantidad de facturas: </label></strong>
          <label id="totalfacts2"> </label>
          <strong><label> | Cantidad de devoluciones: </label></strong> 
          <label id="totalnc2"> </label>  
          <strong><label> | Total de operaciones: </label></strong>
          <label id="totaloper2"></label>
					<table class="table hover select-row data-table-export cell-border table-sales">
						<thead>
							<tr>
								<th>Fecha</th>
                <th>Id Suc SAP</th>
                <th>Asesor</th>
                <th>Cedula</th>
                <th>Nro. Fact</th>
                <th>Caja</th>
                <th>Producto</th>
                <th>Cod. SAP</th>
                <th>Cant.</th>
                <th style="width:90px">Base Bruta</th>
                <th>Base Bruta (USD)</th>
                <th>Desct</th>
                <th>Desct (USD)</th>
                <th style="width:90px">Base Neta</th> 
                <th style="width:90px">Base Neta (USD)</th> 
                <th style="width:90px">I.V.A.</th> 
                <th>I.V.A. (USD)</th>
                <th style="width:90px">Total</th>   
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
								<input class="form-control" type="text" id="totalVta2" name="totalVta2" readonly/>
							</div>
						</div>
						<div class="col-md-2 col-sm-12">
							<div class="form-group">
								<strong><label>Total Ventas Conversion</label></strong>
								<input class="form-control" type="text" id="totalVtaUsd2" name="totalVtaUsd2" readonly/>
							</div>
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