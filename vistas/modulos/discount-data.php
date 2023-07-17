<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Reporte de Ventas con Descuento</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="inicio">Inicio</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Reporte de Ventas con Descuento
              </li>
            </ol>
          </nav>
        </div>
        <div class="col-6 text-right">
          <label>Sucursal </label>
          <select class="custom-select col-6" id="seleccionarSucursal4" name="seleccionarSucursal4" required>
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
        class="progress-bar bg-info progress-bar-striped progress-bar-animated"
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
          <h4 class="text-blue h4">Caja(s), Asesor(es), Area(s) y fechas</h4>
        </div>
      </div>
      <form>
        <div class="row">
          <div id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab"><div class="overlay-wrapper"><div id="overlay" class="overlay" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Cargando...</div></div></div></div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <label>Caja(s)</label>
              <select class="selectpicker form-control" data-style="btn-outline-info" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarCaja4" name="seleccionarCaja4">
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <label>Asesor(es)</label>
              <select class="selectpicker form-control" data-size="5" data-style="btn-outline-info" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAsesores3" name="seleccionarAsesores3">
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="form-group">
              <label>Area(s)</label>
              <select class="selectpicker form-control" data-size="5" data-style="btn-outline-info" multiple data-actions-box="true" data-selected-text-format="count" id="seleccionarAreas4" name="seleccionarAreas4">
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
          <button type="button" class="btn btn-info" onclick="buscarVentasDescuento()"><i class="nav-icon fa fa-search"></i> Buscar</button>
          <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
        </div>
      </div>
      </form>
    </div>
    <div class="card-box mb-30">
      <div class="pd-20">
      </div>
      <div class="pb-20">
        <div id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab"><div class="overlay-wrapper"><div id="overlay2" class="overlay" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Cargando...</div></div></div></div>
        <strong><label>Cantidad de facturas: </label></strong>
          <label id="totalfacts4"> </label>
          <strong><label> | Cantidad de devoluciones: </label></strong> 
          <label id="totalnc4"> </label>  
          <strong><label> | Total de operaciones: </label></strong>
          <label id="totaloper4"></label>
        <table class="table hover select-row data-table-export cell-border table-discount">
          <thead>
            <tr>
              <th>Id Suc SAP</th>
              <th>Nro Fact</th>
              <th>Nro NC</th>
              <th>Nro Fact Afec</th>
              <th>Fecha</th>
              <th>CI Cliente</th>
              <th>Nmb Cliente</th>
              <th>Caja</th>
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
              <th>Operador Autor</th>
              <th>Motivo Desct</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <div class="row">
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <strong><label>Sub Total</label></strong>
              <input class="form-control" type="text" id="subVta" name="subVta" readonly/>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <strong><label>Sub Total $</label></strong>
              <input class="form-control" type="text" id="SubVtaUsd" name="SubVtaUsd" readonly/>
            </div>
          </div>
          <div class="col-md-1 col-sm-12">
            <div class="form-group">
              <strong><label>Total Desc</label></strong>
              <input class="form-control" type="text" id="descuentoVta" name="descuentoVta" readonly/>
            </div>
          </div>
          <div class="col-md-1 col-sm-12">
            <div class="form-group">
              <strong><label>Total Desc $</label></strong>
              <input class="form-control" type="text" id="descuentoVtaUsd" name="descuentoVtaUsd" readonly/>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <strong><label>Total Ventas</label></strong>
              <input class="form-control" type="text" id="totalVta4" name="totalVta4" readonly/>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="form-group">
              <strong><label>Total Ventas $</label></strong>
              <input class="form-control" type="text" id="totalVtaUsd4" name="totalVtaUsd4" readonly/>
            </div>
          </div>
          <div class="col-md-1 col-sm-12">
            <div class="form-group">
              <strong><label>% Desc</label></strong>
              <input class="form-control" type="text" id="porcentajeVta" name="porcentajeVta" readonly/>
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