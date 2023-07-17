<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Reporte de Ventas Detallado</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="inicio">Inicio</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Reporte de Ventas Detallado
              </li>
            </ol>
          </nav>
        </div>
        <div class="col-6 text-right">
          <label>Sucursal </label>
          <select class="custom-select col-6" id="seleccionarSucursal3" name="seleccionarSucursal3" required>
            <option selected="">Seleccionar...</option>
            <?php
              $sucursales = ControladorMaestros::ctrMostrarSucursales();
              foreach ($sucursales as $key => $value) {
                echo '<option data-id="'.$value["IdSucursal"].'" data-color="'.$value["IpServidor"].'" value="'.$value["Servidor"].'">'.$value["Sucursal"].'</option>';
              }                           
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="progress">
      <div
        class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
        role="progressbar"
        style="width: 0%"
        aria-valuenow="25"
        aria-valuemin="0"
        aria-valuemax="100"
      ></div>
    </div>
    <div class="pd-20 card-box mb-30">
      <div class="clearfix">
        <div class="pull-left">
          <h4 class="text-warning h4">Caja(s), Asesor(es), Area(s) y fechas</h4>
        </div>
      </div>
      <form>
        <div class="row">
          <div id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab"><div class="overlay-wrapper"><div id="overlay" class="overlay" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Cargando...</div></div></div></div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <label>Caja(s)</label>
              <select class="selectpicker form-control" data-style="btn-outline-warning" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarCaja3" name="seleccionarCaja3">
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <label>Asesor(es)</label>
              <select class="selectpicker form-control" data-size="5" data-style="btn-outline-warning" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAsesores2" name="seleccionarAsesores2">
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <label>Area(s)</label>
              <select class="selectpicker form-control" data-size="5" data-style="btn-outline-warning" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAreas3" name="seleccionarAreas3">
              </select>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <label>Desde</label>
              <input class="form-control date-picker" placeholder="Seleccionar fecha desde" type="text" id="fechaInicial4" name="fechaInicial4" required/>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <label>Hasta</label>
              <input class="form-control date-picker" placeholder="Seleccionar fecha hasta" type="text" id="fechaFinal4" name="fechaFinal4" required/>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 text-right">
          <button type="button" class="btn btn-warning" onclick="buscarVentasDetallado()"><i class="nav-icon fa fa-search"></i> Buscar</button>
          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
        </div>
      </div>
      </form>
    </div>
    <div class="card-box mb-30" id="overlay8" style="display: none;"><div class="pd-20"></div><div class="pb-20"></div></div>
    <div class="card-box mb-30" id="detail">
      <div class="pd-20">
      </div>
      <div class="pb-20">
        <strong><label>Cantidad de facturas: </label></strong>
        <label id="totalfacts3"> </label>
        <strong><label> | Cantidad de devoluciones: </label></strong> 
        <label id="totalnc3"> </label>  
        <strong><label> | Total de operaciones: </label></strong>
        <label id="totaloper3"></label>
        <table class="table hover data-table-export table-bordered table-detail">
          <thead>            
            <tr>
              <th>Info</th>
              <th>Id Suc SAP</th>
              <th>Nro Fact</th>
              <th>Nro NC</th>
              <th>Nro Fact Afec</th>
              <th>Fecha</th>
              <th>CI Cliente</th>
              <th>Nmb Cliente</th>
              <th>Caja</th>
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
              <input class="form-control" type="text" id="totalVta3" name="totalVta3" readonly/>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <strong><label>Total Ventas $</label></strong>
              <input class="form-control" type="text" id="totalVtaUsd3" name="totalVtaUsd3" readonly/>
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