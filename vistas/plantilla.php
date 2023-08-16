<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DakApp - Sistema de Gestion</title>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vistas/img/logo.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="vistas/img/logo.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="vistas/img/logo.png"/>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- Google Font -->
    <link rel="stylesheet" href="vistas/deskapp/vendors/fonts/Inter.css"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/vendors/styles/core.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/vendors/styles/icon-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/vendors/styles/style.css" />
  </head>
  <body class="sidebar-dark header-dark">
    <?php
      if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
        include "modulos/preloader.php"; 
        include "modulos/encabezado.php"; 
        include "modulos/menu.php";
        if(isset($_GET["ruta"])){
          if($_GET["ruta"] == "data" ||
             $_GET["ruta"] == "assets-data" ||
             $_GET["ruta"] == "detail-data" ||
             $_GET["ruta"] == "discount-data" ||
             $_GET["ruta"] == "serial-data" ||
             $_GET["ruta"] == "data-assets-shop" ||
             $_GET["ruta"] == "login" ||
             $_GET["ruta"] == "salir"){
            include "modulos/".$_GET["ruta"].".php";
          }else{
            include "modulos/404.php";
          }
        }else{
          include "modulos/data.php";
        } 
      }else{
        include "modulos/login.php";
      }
    ?>
    <!-- js -->
    <script src="vistas/deskapp/vendors/scripts/core.js"></script>
    <script src="vistas/deskapp/vendors/scripts/script.js"></script>
    <script src="vistas/deskapp/vendors/scripts/process.js"></script>
    <script src="vistas/deskapp/vendors/scripts/layout-settings.js"></script>
    <!-- Datatable -->
    <script src="vistas/deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="vistas/deskapp/src/plugins/datatables/js/dataTables.buttons.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.html5.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/jszip.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="vistas/deskapp/vendors/scripts/datatable-setting.js"></script>
    <script src="vistas/deskapp/vendors/scripts/dashboard3.js"></script>
    <!-- Chart js -->
    <script src="vistas/deskapp/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="vistas/deskapp/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="vistas/deskapp/vendors/scripts/highchart-setting.js"></script>
    <!-- Jquery Add -->
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/maestros.js"></script>
    <script src="vistas/js/procesos.js"></script>
  </body>
</html>