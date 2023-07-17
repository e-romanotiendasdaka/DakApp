<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <form role="form" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-3">   
                    <label>Sucursales</label>             
                    <div class="input-group">
                       <select class="form-control select2" id="seleccionarSucursal" name="seleccionarSucursal" required>
                        <option value="">Selecionar sucursal</option>
                        <?php
                          $tiendas = ControladorMaestros::ctrMostrarSucursales();
                          foreach ($tiendas as $key => $value) {
                            echo '<option data-id="'.$value["IdSucursal"].'" data-color="'.$value["IpServidor"].'" value="'.$value["Servidor"].'">'.$value["Sucursal"].'</option>';
                          }                           
                        ?>
                      </select>   
                    </div> 
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-3">   
                    <label>Empleado</label>             
                    <div class="input-group">
                       <select class="form-control select2" id="seleccionarSucursal" name="seleccionarSucursal" required>
                        <option value="">Selecionar sucursal</option>
                        <?php
                          $tiendas = ControladorMaestros::ctrMostrarSucursales();
                          foreach ($tiendas as $key => $value) {
                            echo '<option data-id="'.$value["usuario"].'" >'.$value["displayname"].'</option>';
                          }                           
                        ?>
                      </select>   
                    </div> 
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Perfil</label>
                      <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="Seleccionar Operador(es)" data-dropdown-css-class="select2-purple" style="width: 100%;" id="seleccionarOperador" name="seleccionarOperador">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-group">
                      <label>Desde</label>          
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="fechaInicial" name="fechaInicial" required>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-group">
                      <label>Hasta</label>          
                      <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="fechaFinal" name="fechaFinal" required>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="buscarVentas()"><i class="nav-icon fa fa-search"></i> Buscar</button>
                <button type="button" class="btn btn-secondary" onclick="limpiar()"><i class="fa-solid fa-broom"></i> Limpiar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab"><div class="overlay-wrapper"><div id="overlay" class="overlay" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Cargando...</div></div></div></div> 
              <label>Cantidad de facturas: </label>
              <label id="totalfacts"> | </label>
              <label>Cantidad de devoluciones: </label>   
              <label id="totalnc"> | </label>  
              <label>Total de operaciones: </label>   
              <label id="totaloper"></label>          
              <table id="example3" class="table table-bordered table-striped table-off">
                <thead>
                  <tr>
                    <th>Id Suc SAP</th>
                    <th>Fecha</th>
                    <th>Caja</th>
                    <th>Operador</th>
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
              <div class="form-group row">
                <div class="col-3">   
                  <label>Total Ventas</label>             
                  <div class="input-group">
                    <input type="text" class="form-control" id="totalVta" name="totalVta" readonly>
                  </div> 
                </div>
                <div class="col-3">   
                  <label>Total Ventas Conversion</label>             
                  <div class="input-group">
                    <input type="text" class="form-control" id="totalVtaUsd" name="totalVtaUsd" readonly>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>