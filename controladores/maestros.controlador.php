<?php
class ControladorMaestros{
	static public function ctrMostrarSucursales(){
		$respuesta = ModeloMaestros::mdlMostrarSucursales();
		return $respuesta;
	}
	static public function ctrSucursal($id){
		$respuesta = ModeloMaestros::mdlSucursal($id);
		return $respuesta;
	}
	public function ctrDescargarReporte(){
		if(isset($_GET["reporte"])){
			$tabla = "vw_sys_products";
			$item = null;
			$valor = null;
			$productos  = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);			
			$Name = $_GET["reporte"].'.xls';
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");
			echo utf8_decode("<table border='0'> 
					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>Codigo</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>Descripcion</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Categoria</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Cantidad</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Ubicacion</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Costo Usd</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Precio Usd</td>	
					</tr>");
			foreach ($productos as $row => $item){
			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["descripcion"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["categoria"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["stock_a"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["ubicacion"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["cst_prd"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["prc_prd"]."</td>");			 	
			}
			echo "</table>";
		}
	}
}