function buscarVentas(){ 
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var Servidor = $('#seleccionarSucursal').val();
  var caja = $("#seleccionarCaja").val();
  let simpleArray = caja;
  let commaSeperated = simpleArray.join(",");
  var operador = $("#seleccionarOperador").val();
  let simpleArray2 = operador;
  let commaSeperated2 = simpleArray2.join(",");
  var fechaInicial = $("#fechaInicial").val();
  var fechaFinal = $("#fechaFinal").val();
  var startDate = new Date(fechaInicial);
  var endDate = new Date(fechaFinal);
  var diffMs = Math.abs(endDate - startDate);
  var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays > 30) {
    alert ("El rango de fechas supera un mes entre ellas!");
  }else{
    progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/offlinesalesreport.ajax.php",
    method:"POST",
    data: { "caja" : commaSeperated, 
            "operador" : commaSeperated2, 
            "Servidor" : Servidor, 
            "fechaInicial" : fechaInicial, 
            "fechaFinal" : fechaFinal, 
      cache: false,
      dataType: "json"},
    beforeSend: function () {
            progressBar.style.width = '25%';
        },
    success:function(respuesta){
      var table = $('.table-off').DataTable();
      table.clear().draw();
      var resp = jQuery.parseJSON(respuesta); 
      var sumaPorFila = [];
      var sumaPorFila2 = [];
      var total = 0;
      var total2 = 0;
      for(var i = 0; i < resp.length; i++) {
          var idsucursalsap = resp[i]["idsucursalsap"];
          var Fecha = resp[i]["Fecha"];
          var Caja = resp[i]["Caja"];
          var Operador = resp[i]["Operador"];
          var PrecioBruto = resp[i]["PrecioBruto"];
          var desPrecioBruto = new Intl.NumberFormat('de-DE').format(parseFloat(PrecioBruto).toFixed(2));
          var PrecioBrutoUSD = resp[i]["PrecioBrutoUSD"];
          var desPrecioBrutoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(PrecioBrutoUSD).toFixed(2));
          var Monto_Descuentos = resp[i]["Monto_Descuentos"];
          var desMonto_Descuentos = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_Descuentos).toFixed(2));
          var Monto_DescuentosUSD = resp[i]["Monto_DescuentosUSD"];
          var desMonto_DescuentosUSD = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_DescuentosUSD).toFixed(2));
          var PrecioNeto = resp[i]["PrecioNeto"];
          var desPrecioNeto = new Intl.NumberFormat('de-DE').format(parseFloat(PrecioNeto).toFixed(2));
          var PrecioNetoUSD = resp[i]["PrecioNetoUSD"];
          var desPrecioNetoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(PrecioNetoUSD).toFixed(2));
          var Monto_IVA = resp[i]["Monto_IVA"];
          var desMonto_IVA = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_IVA).toFixed(2));
          var Monto_IVAUSD = resp[i]["Monto_IVAUSD"];
          var desMonto_IVAUSD = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_IVAUSD).toFixed(2));
          var Monto_Total = resp[i]["Monto_Total"];
          var desMonto_Total = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_Total).toFixed(2));
          var Monto_USD = resp[i]["Monto_USD"];
          var desMonto_USD = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_USD).toFixed(2));
          table.row.add([idsucursalsap,Fecha,Caja,Operador,desPrecioBruto+' Bs',desPrecioBrutoUSD+' $',desMonto_Descuentos+' Bs',desMonto_DescuentosUSD+' $',desPrecioNeto+' Bs',desPrecioNetoUSD+' $',desMonto_IVA+' Bs',desMonto_IVAUSD+' $',desMonto_Total+' Bs',desMonto_USD+' $']);
          sumaPorFila.push(Monto_USD);
          sumaPorFila2.push(Monto_Total);
          total += Monto_USD;
          total2 += Monto_Total;
        }
      table.draw();
      progressBar.style.width = '75%';
      var column = table.column(12);
      var sum = column.data().reduce(function(a,b) {
          return parseFloat(a) + parseFloat(b);
      }, 0);
      var column2 = table.column(13);
      var sum2 = column2.data().reduce(function(c,d) {
          return parseFloat(c) + parseFloat(d);
      }, 0);
      var totalVta = new Intl.NumberFormat('de-DE').format(parseFloat(total2).toFixed(2));
      var totalVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(total).toFixed(2));
      $('#totalVta').val(totalVta + ' Bs');
      $('#totalVtaUsd').val(totalVtaUsd + ' $');
      $('#totalnc').html(resp[0]['totalnc']);
      $('#totalfacts').html(resp[0]['totalfacts']);
      $('#totaloper').html(parseInt(resp[0]['totalfacts'])+parseInt(resp[0]['totalnc']));

    },
    complete: function () {
      progressBar.style.width = '100%';
      if (progressBar.style.width = '100%') {
        setTimeout(function(){
          $('.progress-bar').fadeOut();
          progressBar.style.width = '0%';
         }, 1500);
      }
    }
  })
  }
}
function buscarVentasAsesor(){ 
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var Servidor = $('#seleccionarSucursal2').val();
  var Facturas = '';
  var Cajas = '';
  var asesor = $("#seleccionarAsesores").val();
  let simpleArray = asesor;
  let commaSeperated = simpleArray.join(",");
  var areas = $("#seleccionarAreas").val();
  let simpleArray2 = areas;
  let commaSeperated2 = simpleArray2.join(",");
  var fechaInicial = $("#fechaInicial2").val();
  var fechaFinal = $("#fechaFinal2").val();
  var startDate = new Date(fechaInicial);
  var endDate = new Date(fechaFinal);
  var diffMs = Math.abs(endDate - startDate);
  var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays > 30) {
    alert ("El rango de fechas supera un mes entre ellas!");
  }else{
    progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/salespersonreport.ajax.php",
    method:"POST",
    data: { "asesor" : commaSeperated, 
            "facturas" : Facturas, 
            "cajas" : Cajas, 
            "areas" : commaSeperated2, 
            "Servidor" : Servidor, 
            "fechaInicial" : fechaInicial, 
            "fechaFinal" : fechaFinal, 
      cache: false,
      dataType: "json"},
    beforeSend: function () {
      progressBar.style.width = '25%';
    },
    success:function(respuesta){
      var table = $('.table-sales').DataTable();
      table.clear().draw();
      var resp = jQuery.parseJSON(respuesta); 
      var sumaPorFila = [];
      var sumaPorFila2 = [];
      var total = 0;
      var total2 = 0;
      for(var i = 0; i < resp.length; i++) {
          var Fecha = resp[i]["Fecha"];
          var idsucursalsap = resp[i]["idsucursalsap"];
          var Asesor = resp[i]["Asesor"];
          var Cedula = resp[i]["Cedula"];
          var Factura = resp[i]["NumeroFactura"];
          var Caja = resp[i]["Caja"];
          var Producto = resp[i]["Producto"];
          var Codigo = resp[i]["CodigoSAP"];
          var Cantidad = resp[i]["Cantidad"];
          var precioBruto = resp[i]["PrecioBruto"];
          var desPrecioBruto = new Intl.NumberFormat('de-DE').format(parseFloat(precioBruto).toFixed(2));
          var precioBrutoUSD = resp[i]["PrecioBrutoUSD"];
          var desPrecioBrutoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(precioBrutoUSD).toFixed(2));
          var montoDescuento = resp[i]["Monto_Descuento"];
          var desMonto_Descuentos = new Intl.NumberFormat('de-DE').format(parseFloat(montoDescuento).toFixed(2));
          var montoDescuentoUSD = resp[i]["Monto_DescuentoUSD"];
          var desMonto_DescuentosUSD = new Intl.NumberFormat('de-DE').format(parseFloat(montoDescuentoUSD).toFixed(2));
          var precioNeto = resp[i]["PrecioNeto"];
          var desPrecioNeto = new Intl.NumberFormat('de-DE').format(parseFloat(precioNeto).toFixed(2));
          var precioNetoUSD = resp[i]["PrecioNetoUSD"];
          var desPrecioNetoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(precioNetoUSD).toFixed(2));
          var montoIva = resp[i]["Monto_Iva"];
          var desMonto_IVA = new Intl.NumberFormat('de-DE').format(parseFloat(montoIva).toFixed(2));
          var montoIvaUSD = resp[i]["Monto_IvaUSD"];
          var desMonto_IVAUSD = new Intl.NumberFormat('de-DE').format(parseFloat(montoIvaUSD).toFixed(2));
          var Monto_Total = resp[i]["Total"];
          var desMonto_Total = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_Total).toFixed(2));
          var Monto_TotalUSD = resp[i]["TotalDivisas"];
          var desMonto_USD = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_TotalUSD).toFixed(2));
          table.row.add([Fecha,idsucursalsap,Asesor,Cedula,Factura,Caja,Producto,Codigo,Cantidad,desPrecioBruto+' Bs',desPrecioBrutoUSD+' $',desMonto_Descuentos+' Bs',desMonto_DescuentosUSD+' $',desPrecioNeto+' Bs',desPrecioNetoUSD+' $',desMonto_IVA+' Bs',desMonto_IVAUSD+' $',desMonto_Total+' Bs',desMonto_USD+' $']);
          sumaPorFila.push(Monto_TotalUSD);
          sumaPorFila2.push(Monto_Total);
          total += Monto_TotalUSD;
          total2 += Monto_Total;
        }
      table.draw();
      progressBar.style.width = '75%';
      var table = $('.table-sales').DataTable();
      var column = table.column(17);
      var sum = column.data().reduce(function(a,b) {
          return parseFloat(a) + parseFloat(b);
      }, 0);
      var column2 = table.column(18);
      var sum2 = column2.data().reduce(function(c,d) {
          return parseFloat(c) + parseFloat(d);
      }, 0);
      var totalVta = new Intl.NumberFormat('de-DE').format(parseFloat(total2).toFixed(2));
      var totalVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(total).toFixed(2));
      $('#totalVta2').val(totalVta + ' Bs');
      $('#totalVtaUsd2').val(totalVtaUsd + ' $');
      $('#totalnc2').html(resp[0]['totalnc']);
      $('#totalfacts2').html(resp[0]['totalfacts']);
      $('#totaloper2').html(parseInt(resp[0]['totalfacts'])+parseInt(resp[0]['totalnc'])); 
    },
    complete: function () {
      progressBar.style.width = '100%';
      if (progressBar.style.width = '100%') {
        setTimeout(function(){
          $('.progress-bar').fadeOut();
          progressBar.style.width = '0%';
         }, 1500);
      }
    }
  })
  }
}
function buscarVentasFactura(){ 
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var Servidor = $('#seleccionarSucursal2').val();
  var facturas = $('#nuevaFactura').val();
  var Asesor = '';
  var cajas = $("#seleccionarCaja2").val();
  let simpleArray = cajas;
  let commaSeperated = simpleArray.join(",");
  var areas = $("#seleccionarAreas2").val();
  let simpleArray2 = areas;
  let commaSeperated2 = simpleArray2.join(",");
  var fechaInicial = $("#fechaInicial3").val();
  var fechaFinal = $("#fechaFinal3").val();
  var startDate = new Date(fechaInicial);
  var endDate = new Date(fechaFinal);
  var diffMs = Math.abs(endDate - startDate);
  var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays > 30) {
    alert ("El rango de fechas supera un mes entre ellas!");
  }else{
    progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/salespersonreport.ajax.php",
    method:"POST",
    data: { "cajas" : commaSeperated, 
            "areas" : commaSeperated2, 
            "asesor" : Asesor, 
            "facturas" : facturas, 
            "Servidor" : Servidor, 
            "fechaInicial" : fechaInicial, 
            "fechaFinal" : fechaFinal, 
      cache: false,
      dataType: "json"},
    beforeSend: function () {
      progressBar.style.width = '25%';
        },
    success:function(respuesta){
      var table = $('.table-sales').DataTable();
      table.clear().draw();
      var resp = jQuery.parseJSON(respuesta); 
      var sumaPorFila = [];
      var sumaPorFila2 = [];
      var total = 0;
      var total2 = 0;
      for(var i = 0; i < resp.length; i++) {
          var Fecha = resp[i]["Fecha"];
          var idsucursalsap = resp[i]["idsucursalsap"];
          var Asesor = resp[i]["Asesor"];
          var Cedula = resp[i]["Cedula"];
          var Factura = resp[i]["NumeroFactura"];
          var Caja = resp[i]["Caja"];
          var Producto = resp[i]["Producto"];
          var Codigo = resp[i]["CodigoSAP"];
          var Cantidad = resp[i]["Cantidad"];
          var precioBruto = resp[i]["PrecioBruto"];
          var desPrecioBruto = new Intl.NumberFormat('de-DE').format(parseFloat(precioBruto).toFixed(2));
          var precioBrutoUSD = resp[i]["PrecioBrutoUSD"];
          var desPrecioBrutoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(precioBrutoUSD).toFixed(2));
          var montoDescuento = resp[i]["Monto_Descuento"];
          var desMonto_Descuentos = new Intl.NumberFormat('de-DE').format(parseFloat(montoDescuento).toFixed(2));
          var montoDescuentoUSD = resp[i]["Monto_DescuentoUSD"];
          var desMonto_DescuentosUSD = new Intl.NumberFormat('de-DE').format(parseFloat(montoDescuentoUSD).toFixed(2));
          var precioNeto = resp[i]["PrecioNeto"];
          var desPrecioNeto = new Intl.NumberFormat('de-DE').format(parseFloat(precioNeto).toFixed(2));
          var precioNetoUSD = resp[i]["PrecioNetoUSD"];
          var desPrecioNetoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(precioNetoUSD).toFixed(2));
          var montoIva = resp[i]["Monto_Iva"];
          var desMonto_IVA = new Intl.NumberFormat('de-DE').format(parseFloat(montoIva).toFixed(2));
          var montoIvaUSD = resp[i]["Monto_IvaUSD"];
          var desMonto_IVAUSD = new Intl.NumberFormat('de-DE').format(parseFloat(montoIvaUSD).toFixed(2));
          var Monto_Total = resp[i]["Total"];
          var desMonto_Total = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_Total).toFixed(2));
          var Monto_TotalUSD = resp[i]["TotalDivisas"];
          var desMonto_USD = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_TotalUSD).toFixed(2));
          table.row.add([Fecha,idsucursalsap,Asesor,Cedula,Factura,Caja,Producto,Codigo,Cantidad,desPrecioBruto+' Bs',desPrecioBrutoUSD+' $',desMonto_Descuentos+' Bs',desMonto_DescuentosUSD+' $',desPrecioNeto+' Bs',desPrecioNetoUSD+' $',desMonto_IVA+' Bs',desMonto_IVAUSD+' $',desMonto_Total+' Bs',desMonto_USD+' $']);
          sumaPorFila.push(Monto_TotalUSD);
          sumaPorFila2.push(Monto_Total);
          total += Monto_TotalUSD;
          total2 += Monto_Total;
        }
      table.draw();
      progressBar.style.width = '75%';
      var column = table.column(17);
      var sum = column.data().reduce(function(a,b) {
          return parseFloat(a) + parseFloat(b);
      }, 0);
      var column2 = table.column(18);
      var sum2 = column2.data().reduce(function(c,d) {
          return parseFloat(c) + parseFloat(d);
      }, 0);
      var totalVta = new Intl.NumberFormat('de-DE').format(parseFloat(total2).toFixed(2));
      var totalVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(total).toFixed(2));
      $('#totalVta2').val(totalVta + ' Bs');
      $('#totalVtaUsd2').val(totalVtaUsd + ' $');
      $('#totalnc2').html(resp[0]['totalnc']);
      $('#totalfacts2').html(resp[0]['totalfacts']);
      $('#totaloper2').html(parseInt(resp[0]['totalfacts'])+parseInt(resp[0]['totalnc']));
    },
    complete: function () {
      progressBar.style.width = '100%';
      if (progressBar.style.width = '100%') {
        setTimeout(function(){
          $('.progress-bar').fadeOut();
          progressBar.style.width = '0%';
         }, 1500);
      }
    }
  })
  }
}
function buscarVentasDetallado(){ 
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var Servidor = $('#seleccionarSucursal3').val();
  var cajas = $("#seleccionarCaja3").val();
  let simpleArray = cajas;
  let commaSeperated = simpleArray.join(",");
  var areas = $("#seleccionarAreas3").val();
  let simpleArray2 = areas;
  let commaSeperated2 = simpleArray2.join(",");
  var asesor = $("#seleccionarAsesores2").val();
  let simpleArray3 = asesor;
  let commaSeperated3 = simpleArray3.join(",");
  var fechaInicial = $("#fechaInicial4").val();
  var fechaFinal = $("#fechaFinal4").val();
  var startDate = new Date(fechaInicial);
  var endDate = new Date(fechaFinal);
  var diffMs = Math.abs(endDate - startDate);
  var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays > 30) {
    alert ("El rango de fechas supera un mes entre ellas!");
  }else{
    progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/detailedofflinereport.ajax.php",
    method:"POST",
    data: { "cajas" : commaSeperated, 
            "areas" : commaSeperated2, 
            "asesor" : commaSeperated3, 
            "Servidor" : Servidor, 
            "fechaInicial" : fechaInicial, 
            "fechaFinal" : fechaFinal, 
      cache: false,
      dataType: "json"},
      beforeSend: function () {
        progressBar.style.width = '25%';
      },
      success:function(respuesta){
        var table = $('.table-detail').DataTable();
        table.clear().draw();
        var resp = jQuery.parseJSON(respuesta); 
        var sumaPorFila = [];
        var sumaPorFila2 = [];
        var total = 0;
        var total2 = 0;
        var incremento = 0;
        var incremento1 = 0;
        for(var i = 0; i < resp.length; i++) {     
          var desPrecioBruto = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["basebruta"]).toFixed(2));
          var desPrecioBrutoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["basebrutausd"]).toFixed(2));
          var desMonto_Descuentos = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["descuento"]).toFixed(2));
          var desMonto_DescuentosUSD = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["descuentousd"]).toFixed(2));
          var desPrecioNeto = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["baseneta"]).toFixed(2));
          var desPrecioNetoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["basenetausd"]).toFixed(2));
          var desMonto_IVA = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["iva"]).toFixed(2));
          var desMonto_IVAUSD = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["ivausd"]).toFixed(2));
          var desMonto_Total = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["totaldocumento"]).toFixed(2));
          var desMonto_USD = new Intl.NumberFormat('de-DE').format(parseFloat(resp[i]["totaldocumentousd"]).toFixed(2));
          var parent = table.row.add(['<td><div class="btn-group"><button class="btn btn-success btn-xs toggleChild"><i class="fa fa-plus-circle"></i></button></div</td>',resp[i]["idsucursalsap"],resp[i]["nrofactura"],resp[i]["nronotacredito"],resp[i]["nrofacturaafectada"],resp[i]["fecha"],resp[i]["cicliente"],resp[i]["nombrecliente"],resp[i]["caja"],desPrecioBruto+' Bs',desPrecioBrutoUSD+' $',desMonto_Descuentos+' Bs',desMonto_DescuentosUSD+' $',desPrecioNeto+' Bs',desPrecioNetoUSD+' $',desMonto_IVA+' Bs',desMonto_IVAUSD+' $',desMonto_Total+' Bs',desMonto_USD+' $']).draw().node();
          sumaPorFila.push(desMonto_USD);
          sumaPorFila2.push(desMonto_Total);
          total += desMonto_USD;
          total2 += desMonto_Total;
          var detalle = resp[i]["Detalle"];   
          var formaPago = resp[i]["FormaPago"];  
          var cambios = resp[i]["Cambios"];  
          const childTable1 = $('<table>').append($('<thead>').append($('<tr>').append($('<th>').text('Cantidad'), $('<th>').text('CI Vend Art'), $('<th>').text('Cod SAP Art'), $('<th>').text('Desc'), $('<th>').text('Desc Usd'), $('<th>').text('Area'), $('<th>').text('Iva'), $('<th>').text('Iva Usd'), $('<th>').text('Art'), $('<th>').text('Nro Fact'), $('<th>').text('Base Bruta'), $('<th>').text('Base Bruta Usd'), $('<th>').text('Base Neta'), $('<th>').text('Base Neta Usd'), $('<th>').text('Serial'), $('<th>').text('Total'), $('<th>').text('Total Usd'), $('<th>').text('Ubic'), $('<th>').text('Vendedor'))));
          const childTableBody1 = $('<tbody>');
          childTable1.append(childTableBody1); 
          for (var j = 0;  j < detalle.length; j++) {
            const childTableRow = $('<tr>').append($('<td>').text(detalle[j]["cantidad"]), $('<td>').text(detalle[j]["civendedorporarticulo"]), $('<td>').text(detalle[j]["codigosapdelarticulo"]), $('<td>').text(detalle[j]["descuento"]), $('<td>').text(detalle[j]["descuentousd"]), $('<td>').text(detalle[j]["idarea"]), $('<td>').text(detalle[j]["ivafacturadoporarticulo"]), $('<td>').text(detalle[j]["ivafacturadoporarticuloenusd"]), $('<td>').text(detalle[j]["nombredelarticulo"]), $('<td>').text(detalle[j]["nrofactura"]), $('<td>').text(detalle[j]["preciobruto"]), $('<td>').text(detalle[j]["preciobrutousd"]), $('<td>').text(detalle[j]["precioneto"]), $('<td>').text(detalle[j]["precionetousd"]), $('<td>').text(detalle[j]["serialfacturadodelarticulo"]), $('<td>').text(detalle[j]["total"]), $('<td>').text(detalle[j]["totalusd"]), $('<td>').text(detalle[j]["ubicacionlogisticadelarticulo"]), $('<td>').text(detalle[j]["vendedorporarticulo"]));
            childTableBody1.append(childTableRow);
          }
          const childTable2 = $('<table>').append($('<thead>').append($('<tr>').append($('<th>').text('Nro Fact'), $('<th>').text('Tipo FormaPago'), $('<th>').text('Moneda'), $('<th>').text('Monto'), $('<th>').text('Monto Usd'), $('<th>').text('Nro Referencia'), $('<th>').text('Nro Lote'))));
          const childTableBody2 = $('<tbody>');
          childTable2.append(childTableBody2);
          for (var k = 0;  k < formaPago.length; k++) {
            const childTableRow = $('<tr>').append($('<td>').text(formaPago[k]["nrofactura"]), $('<td>').text(formaPago[k]["tipodeformadepago"]), $('<td>').text(formaPago[k]["moneda"]), $('<td>').text(formaPago[k]["montoporformadepago"]), $('<td>').text(formaPago[k]["montoporformadepagoenusd"]), $('<td>').text(formaPago[k]["numerodereferencia"]), $('<td>').text(formaPago[k]["numerodelote"]));
            childTableBody2.append(childTableRow);
          }
          if (cambios == undefined) {
            table.row(parent).child($('<div>').append(childTable1, childTable2)).hide();
          }else{
            const childTable3 = $('<table>').append($('<thead>').append($('<tr>').append($('<th>').text('Nro Fact'), $('<th>').text('Tipo FormaCambio'), $('<th>').text('Moneda Cambio'), $('<th>').text('Cambio FormaPago'), $('<th>').text('Cambio Bs'), $('<th>').text('Factor Conv'), $('<th>').text('Cambio Usd'))));
            const childTableBody3 = $('<tbody>');
            childTable3.append(childTableBody3);
            for (var l = 0;  l < cambios.length; l++) {
              const childTableRow = $('<tr>').append($('<td>').text(cambios[l]["nrofactura"]), $('<td>').text(cambios[l]["tipodeformadecambio"]), $('<td>').text(cambios[l]["monedacambio"]), $('<td>').text(cambios[l]["cambioporformadepago"]), $('<td>').text(cambios[l]["cambiobs"]), $('<td>').text(cambios[l]["factorconversion"]), $('<td>').text(cambios[l]["montocambioenusd"]));
              childTableBody3.append(childTableRow);
            }
            table.row(parent).child($('<div>').append(childTable1, childTable2, childTable3)).hide();
          }
        }
        progressBar.style.width = '75%';
        var sum = table.column(17).data().reduce(function (a, b) {
          return parseFloat(a) + parseFloat(b);
        }, 0);
        var sum2 = table.column(18).data().reduce(function (c, d) {
          return parseFloat(c) + parseFloat(d);
        }, 0);
        var totalVta = new Intl.NumberFormat('de-DE').format(parseFloat(sum).toFixed(2));
        var totalVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(sum2).toFixed(2));
        $('#totalVta3').val(totalVta + ' Bs');
        $('#totalVtaUsd3').val(totalVtaUsd + ' $');
        $('#totalnc3').html(resp[0]['totalnc']);
        $('#totalfacts3').html(resp[0]['totalfacts']);
        $('#totaloper3').html(parseInt(resp[0]['totalfacts'])+parseInt(resp[0]['totalnc']));
      },
      complete: function () {
        progressBar.style.width = '100%';
      if (progressBar.style.width = '100%') {
        setTimeout(function(){
          $('.progress-bar').fadeOut();
          progressBar.style.width = '0%';
         }, 1500);
      }
      }
    })
  }
}
function buscarVentasDescuento(){ 
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var Servidor = $('#seleccionarSucursal4').val();
  var cajas = $("#seleccionarCaja4").val();
  let simpleArray = cajas;
  let commaSeperated = simpleArray.join(",");
  var areas = $("#seleccionarAreas4").val();
  let simpleArray2 = areas;
  let commaSeperated2 = simpleArray2.join(",");
  var asesor = $("#seleccionarAsesores3").val();
  let simpleArray3 = asesor;
  let commaSeperated3 = simpleArray3.join(",");
  var fechaInicial = $("#fechaInicial4").val();
  var fechaFinal = $("#fechaFinal4").val();
  var startDate = new Date(fechaInicial);
  var endDate = new Date(fechaFinal);
  var diffMs = Math.abs(endDate - startDate);
  var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays > 30) {
    alert ("El rango de fechas supera un mes entre ellas!");
  }else{
    progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/discountsalesofflinereport.ajax.php",
    method:"POST",
    data: { "cajas" : commaSeperated, 
            "areas" : commaSeperated2, 
            "asesor" : commaSeperated3, 
            "Servidor" : Servidor, 
            "fechaInicial" : fechaInicial, 
            "fechaFinal" : fechaFinal, 
      cache: false,
      dataType: "json"},
    beforeSend: function () {
      progressBar.style.width = '25%';
    },
    success:function(respuesta){
      var table = $('.table-discount').DataTable();
      table.clear().draw();
      var resp = jQuery.parseJSON(respuesta); 
      console.log("resp", resp);
      var sumaPorFila = [];
      var sumaPorFila2 = [];
      var total = 0;
      var total2 = 0;
      var sub = 0;
      var sub2 = 0;
      var descuento = 0;
      var descuento2 = 0;
      var porcentaje = 0;
      for(var i = 0; i < resp.length; i++) {
          var idsucursalsap = resp[i]["idsucursalsap"];
          var NroFact = resp[i]["nrofactura"];
          var NroNC = resp[i]["nronotacredito"];
          var NroFactAfec = resp[i]["nrofacturaafectada"];
          var Fecha = resp[i]["fecha"];            
          var Cedula = resp[i]["cicliente"];
          var Cliente = resp[i]["nombrecliente"];
          var Caja = resp[i]["caja"];
          var precioBruto = resp[i]["basebruta"];
          var desPrecioBruto = new Intl.NumberFormat('de-DE').format(parseFloat(precioBruto).toFixed(2));
          var precioBrutoUSD = resp[i]["basebrutausd"];
          var desPrecioBrutoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(precioBrutoUSD).toFixed(2));
          var montoDescuento = resp[i]["descuento"];
          var desMonto_Descuentos = new Intl.NumberFormat('de-DE').format(parseFloat(montoDescuento).toFixed(2));
          var montoDescuentoUSD = resp[i]["descuentousd"];
          var desMonto_DescuentosUSD = new Intl.NumberFormat('de-DE').format(parseFloat(montoDescuentoUSD).toFixed(2));
          var precioNeto = resp[i]["baseneta"];
          var desPrecioNeto = new Intl.NumberFormat('de-DE').format(parseFloat(precioNeto).toFixed(2));
          var precioNetoUSD = resp[i]["basenetausd"];
          var desPrecioNetoUSD = new Intl.NumberFormat('de-DE').format(parseFloat(precioNetoUSD).toFixed(2));
          var montoIva = resp[i]["iva"];
          var desMonto_IVA = new Intl.NumberFormat('de-DE').format(parseFloat(montoIva).toFixed(2));
          var montoIvaUSD = resp[i]["ivausd"];
          var desMonto_IVAUSD = new Intl.NumberFormat('de-DE').format(parseFloat(montoIvaUSD).toFixed(2));
          var Monto_Total = resp[i]["totaldocumento"];
          var desMonto_Total = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_Total).toFixed(2));
          var Monto_TotalUSD = resp[i]["totaldocumentousd"];
          var desMonto_USD = new Intl.NumberFormat('de-DE').format(parseFloat(Monto_TotalUSD).toFixed(2));
          var Persona = resp[i]["personaautorizadescuento"];
          var Motivo = resp[i]["motivodescuento"];
          table.row.add([idsucursalsap,NroFact,NroNC,NroFactAfec,Fecha,Cedula,Cliente,Caja,desPrecioBruto+' Bs',desPrecioBrutoUSD+' $',desMonto_Descuentos+' Bs',desMonto_DescuentosUSD+' $',desPrecioNeto+' Bs',desPrecioNetoUSD+' $',desMonto_IVA+' Bs',desMonto_IVAUSD+' $',desMonto_Total+' Bs',desMonto_USD+' $',Persona,Motivo]);
          sumaPorFila.push(Monto_TotalUSD);
          sumaPorFila2.push(Monto_Total);
          total += Monto_TotalUSD;
          total2 += Monto_Total;
          sub += precioBrutoUSD;
          sub2 += precioBruto;
          descuento += montoDescuentoUSD;
          descuento2 += montoDescuento;
        }
      table.draw();
      progressBar.style.width = '75%';
      var column = table.column(16);
      var sum = column.data().reduce(function(a,b) {
          return parseFloat(a) + parseFloat(b);
      }, 0);
      var column2 = table.column(17);
      var sum2 = column2.data().reduce(function(c,d) {
          return parseFloat(c) + parseFloat(d);
      }, 0);
      var column3 = table.column(8);
      var sum3 = column3.data().reduce(function(a,b) {
          return parseFloat(a) + parseFloat(b);
      }, 0);
      var column4 = table.column(9);
      var sum4 = column4.data().reduce(function(c,d) {
          return parseFloat(c) + parseFloat(d);
      }, 0);
      var column5 = table.column(10);
      var sum5 = column5.data().reduce(function(a,b) {
          return parseFloat(a) + parseFloat(b);
      }, 0);
      var column6 = table.column(11);
      var sum6 = column6.data().reduce(function(c,d) {
          return parseFloat(c) + parseFloat(d);
      }, 0);
      var subVta = new Intl.NumberFormat('de-DE').format(parseFloat(sub2).toFixed(2));
      var SubVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(sub).toFixed(2));
      var descuentoVta = new Intl.NumberFormat('de-DE').format(parseFloat(descuento2).toFixed(2));
      var descuentoVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(descuento).toFixed(2));
      var totalVta = new Intl.NumberFormat('de-DE').format(parseFloat(total2).toFixed(2));
      var totalVtaUsd = new Intl.NumberFormat('de-DE').format(parseFloat(total).toFixed(2));
      $('#totalVta4').val(totalVta + ' Bs');
      $('#totalVtaUsd4').val(totalVtaUsd + ' $');
      $('#descuentoVta').val(descuentoVta + ' Bs');
      $('#descuentoVtaUsd').val(descuentoVtaUsd + ' $');
      var porcentaje = (Number(descuento2*100))/(Number(sub2));
      var totalPorcentaje = new Intl.NumberFormat('de-DE').format(parseFloat(porcentaje).toFixed(2));
      $('#porcentajeVta').val(totalPorcentaje);
      $('#subVta').val(subVta + ' Bs');
      $('#SubVtaUsd').val(SubVtaUsd + ' $');
      $('#totalnc4').html(resp[0]['totalnc']);
      $('#totalfacts4').html(resp[0]['totalfacts']);
      $('#totaloper4').html(parseInt(resp[0]['totalfacts'])+parseInt(resp[0]['totalnc']));
    },
    complete: function () {
      progressBar.style.width = '100%';
      if (progressBar.style.width = '100%') {
        setTimeout(function(){
          $('.progress-bar').fadeOut();
          progressBar.style.width = '0%';
         }, 1500);
      }
    }
  })
  }
}
function consultarFacturas(){ 
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var fechaInicial = $("#fechaInicial5").val();
  var fechaFinal = $("#fechaFinal5").val();
  var seleccionarSucursal = $("#seleccionarSucursal5").val();
  var selectedOption2 = $("#seleccionarSucursal5").find('option:selected');
  var estatus = $("#seleccionarEstatus").val();
  console.log("estatus", estatus);
  var startDate = new Date(fechaInicial);
  var endDate = new Date(fechaFinal);
  var diffMs = Math.abs(endDate - startDate);
  var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
  if (diffDays > 30)  {
    alert ("El rango de fechas supera un mes entre ellas!");
  } 
  else{
    progressBar.style.width = '5%';
      $.ajax({
      url:"ajax/serialdesreport.ajax.php",
      method:"POST",
      data: { "fechaInicial" : fechaInicial, 
              "fechaFinal" : fechaFinal, 
              "estatus" : estatus, 
              "tabla" : seleccionarSucursal, 
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json"},
      beforeSend: function () {
        progressBar.style.width = '50%';
      },
      success:function(respuesta){
        var table3 = $('.table-off-ser').DataTable();
        table3.clear().draw();
        var resp = jQuery.parseJSON(respuesta); 
        for(var i = 0; i < resp.length; i++) {
          var Sucursal = resp[i]["Sucursal"];
          var Fecha = resp[i]["Fecha"];
          var CajaFactura = resp[i]["CajaFactura"];
          var Estatus = resp[i]["Estatus"];
          var MontoTotal = resp[i]["MontoTotal"];
          var EstatusSerializacion = resp[i]["EstatusSerializacion"];
          var IndTieneDevolucion = resp[i]["IndTieneDevolucion"];
          var IndDevolucionCompleta = resp[i]["IndDevolucionCompleta"];
          var Referencia = resp[i]["Referencia"];
          var Nombre = resp[i]["Nombre"];
          table3.row.add([Sucursal,Fecha,CajaFactura,Estatus,MontoTotal,EstatusSerializacion,IndTieneDevolucion,IndDevolucionCompleta,Referencia,Nombre]);
        }
        table3.draw();
      },
      complete: function () {
        progressBar.style.width = '100%';
        if (progressBar.style.width = '100%') {
        setTimeout(function(){
          $('.progress-bar').fadeOut();
          progressBar.style.width = '0%';
         }, 1500);
      }
      }
    })
  }
}