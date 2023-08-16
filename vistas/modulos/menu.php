<div class="left-side-bar">
  <div class="brand-logo">
    <a href="data">
      <img src="vistas/img/menu.jpg" style="width: 110px; height: 50px; margin: auto;" class="dark-logo"/>
      <img src="vistas/img/menu.jpg" style="width: 110px; height: 50px; margin: auto;" class="light-logo"/>
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
      <?php  
        if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Auditor"){
          echo'<li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-house"></span
                ><span>Reporte de Ventas Offline</span>
              </a>
              <ul class="submenu">
                <li><a href="data">Ventas offline</a></li>
                <li><a href="assets-data">Ventas por asesor</a></li>
                <li><a href="detail-data">Ventas detallado</a></li>
                <li><a href="discount-data">Ventas con descuento</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-house"></span
                ><span>Consulta de Asesores</span>
              </a>
              <ul class="submenu">
                <li><a href="data-assets-shop">Asesores</a></li>
              </ul>
            </li>';
        }
          if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Auditor" || $_SESSION["perfil"] == "Logistica"){
            echo'
              <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                  <span class="micon bi bi-house"></span
                  ><span>Reporte de Serializacion</span>
                </a>
                <ul class="submenu">
                  <li><a href="serial-data">Consultar Facturas por Serializacion</a></li>
                </ul>
              </li>';
          }
        ?>
      </ul>
    </div>
  </div>
</div>
<div class="mobile-menu-overlay"></div>
