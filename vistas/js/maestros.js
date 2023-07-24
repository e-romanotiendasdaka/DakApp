$("#seleccionarSucursal").change(function(){
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var selectedOption = $(this).find('option:selected');
  var id = selectedOption.data('id');
  var servidor = $("#seleccionarSucursal").val();
  var Servidor = $("#seleccionarSucursal").val();
  progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/conexion.ajax.php",
    method:"POST",
    data: { "id" : id,"servidor" : servidor,  
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json"
    },
    success:function(respuesta){
      var resp = jQuery.parseJSON(respuesta); 
      $("#selectServer").html(respuesta["ErrorProcedure"]);
      if (respuesta["ErrorProcedure"] = 'Conectado') {
        $.ajax({
        url:"ajax/cajas.ajax.php",
        method:"POST",
        data: { "Servidor" : Servidor, 
        cache: false,
        dataType: "json"},
        beforeSend: function () {
          progressBar.style.width = '15%';
        },
        success:function(respuesta){
          var resp = jQuery.parseJSON(respuesta);
          $("#seleccionarCaja").empty();
          $("#bs-select-1").empty();
          for(var i = 0; i < resp.length; i++) {
            $('#bs-select-1 > ul').append('<li class="selected"><a role="option" class="dropdown-item selected" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">'+resp[i]["DescripcionCaja"]+'</span></a></li>');
            $("#seleccionarCaja").append('<option value="'+resp[i]["IdCaja"]+'">'+resp[i]["DescripcionCaja"]+'</option>');
            $('#seleccionarCaja > option').prop("selected",true);
            $('#seleccionarCaja > option').prop("selected",true).trigger("change");
          }
          progressBar.style.width = '35%';
          if (Servidor != '') {
            $.ajax({
              url:"ajax/operadores.ajax.php",
              method:"POST",
              data: { "Servidor" : Servidor, 
              cache: false,
              dataType: "json"},
              success:function(respuesta){
                var resp = jQuery.parseJSON(respuesta);  
                $("#seleccionarOperador").empty();
                $("#bs-select-2").empty();
                for(var i = 0; i < resp.length; i++) {
                  $('#bs-select-2 > ul').append('<li class="selected"><a role="option" class="dropdown-item selected" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">'+resp[i]["Operador"]+'</span></a></li>');
                  $("#seleccionarOperador").append('<option value="'+resp[i]["IdOperador"]+'">'+resp[i]["Operador"]+'</option>');
                  $('#seleccionarOperador > option').prop("selected",true);
                  $('#seleccionarOperador > option').prop("selected",true).trigger("change");
                }
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
      })
      }else{
        alert ('El Servidor '+servidor+' esta '+resp["ErrorProcedure"]);
        location.reload();
      }
    }
  })
})
$("#seleccionarSucursal2").change(function(){
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var selectedOption = $(this).find('option:selected');
  var id = selectedOption.data('id');
  var servidor = $("#seleccionarSucursal2").val();
  var Servidor = $("#seleccionarSucursal2").val();
  progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/conexion.ajax.php",
    method:"POST",
    data: { "id" : id,"servidor" : servidor,  
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json"
    },
    success:function(respuesta){
      var resp = jQuery.parseJSON(respuesta); 
      if (respuesta["ErrorProcedure"] = 'Conectado') {
            $.ajax({
            url:"ajax/cajas.ajax.php",
            method:"POST",
            data: { "Servidor" : Servidor, 
            cache: false,
            dataType: "json"},
            beforeSend: function () {
              progressBar.style.width = '15%';
            },
            success:function(respuesta){
              var resp = jQuery.parseJSON(respuesta);
              $("#seleccionarCaja2").empty();
              for(var i = 0; i < resp.length; i++) {
                $("#seleccionarCaja2").append('<option value="'+resp[i]["IdCaja"]+'">'+resp[i]["DescripcionCaja"]+'</option>');
                $("#seleccionarCaja2").find('option').prop("selected",true);
                $("#seleccionarCaja2").trigger("change");
              }
              progressBar.style.width = '35%';
              $.ajax({
                url:"ajax/asesores.ajax.php",
                method:"POST",
                data: { "Servidor" : Servidor, 
                cache: false,
                dataType: "json"},
                success:function(respuesta){
                  var resp = jQuery.parseJSON(respuesta);  
                  $("#seleccionarAsesores").empty();
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAsesores").append('<option value="'+resp[i]["IdAsesor"]+'">'+resp[i]["Nombre"]+'</option>');
                    $("#seleccionarAsesores").find('option').prop("selected",true);
                    $("#seleccionarAsesores").trigger("change");
                  }
                }
              })
              $.ajax({
                url:"ajax/areas.ajax.php",
                method:"POST",
                data: { "Servidor" : Servidor, 
                cache: false,
                dataType: "json"},
                success:function(respuesta){
                  progressBar.style.width = '75%';
                  var resp = jQuery.parseJSON(respuesta);  
                  $("#seleccionarAreas").empty();
                  $("#seleccionarAreas2").empty();
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAreas").append('<option value="'+resp[i]["idarea"]+'">'+resp[i]["area"]+'</option>');
                    $("#seleccionarAreas").find('option').prop("selected",true);
                    $("#seleccionarAreas").trigger("change");
                  }
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAreas2").append('<option value="'+resp[i]["idarea"]+'">'+resp[i]["area"]+'</option>');
                    $("#seleccionarAreas2").find('option').prop("selected",true);
                    $("#seleccionarAreas2").trigger("change");
                  }
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
          })
      }else{
        alert ('El Servidor '+servidor+' esta '+resp["ErrorProcedure"]);
        location.reload();
      }
    }
  })
})
$("#seleccionarSucursal3").change(function(){
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var selectedOption = $(this).find('option:selected');
  var id = selectedOption.data('id');
  var servidor = $("#seleccionarSucursal3").val();
  var Servidor = $("#seleccionarSucursal3").val();
    progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/conexion.ajax.php",
    method:"POST",
    data: { "id" : id,"servidor" : servidor,  
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json"
    },
    success:function(respuesta){
      var resp = jQuery.parseJSON(respuesta); 
      if (respuesta["ErrorProcedure"] = 'Conectado') {
            $.ajax({
            url:"ajax/cajas.ajax.php",
            method:"POST",
            data: { "Servidor" : Servidor, 
            cache: false,
            dataType: "json"},
            beforeSend: function () {
              progressBar.style.width = '15%';
            },
            success:function(respuesta){
              var resp = jQuery.parseJSON(respuesta);
              $("#seleccionarCaja3").empty();
              for(var i = 0; i < resp.length; i++) {
                $("#seleccionarCaja3").append('<option value="'+resp[i]["IdCaja"]+'">'+resp[i]["DescripcionCaja"]+'</option>');
                $("#seleccionarCaja3").find('option').prop("selected",true);
                $("#seleccionarCaja3").trigger("change");
              }
              progressBar.style.width = '35%';
              $.ajax({
                url:"ajax/asesores.ajax.php",
                method:"POST",
                data: { "Servidor" : Servidor, 
                cache: false,
                dataType: "json"},
                success:function(respuesta){
                  var resp = jQuery.parseJSON(respuesta);  
                  $("#seleccionarAsesores2").empty();
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAsesores2").append('<option value="'+resp[i]["IdAsesor"]+'">'+resp[i]["Nombre"]+'</option>');
                    $("#seleccionarAsesores2").find('option').prop("selected",true);
                    $("#seleccionarAsesores2").trigger("change");
                  }
                }                
              })
              progressBar.style.width = '75%';
              $.ajax({
                url:"ajax/areas.ajax.php",
                method:"POST",
                data: { "Servidor" : Servidor, 
                cache: false,
                dataType: "json"},
                success:function(respuesta){
                  var resp = jQuery.parseJSON(respuesta);  
                  $("#seleccionarAreas3").empty();
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAreas3").append('<option value="'+resp[i]["idarea"]+'">'+resp[i]["area"]+'</option>');
                    $("#seleccionarAreas3").find('option').prop("selected",true);
                    $("#seleccionarAreas3").trigger("change");
                  }
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
          })
      }else{
        alert ('El Servidor '+servidor+' esta '+resp["ErrorProcedure"]);
        location.reload();
      }
    }
  })
})
$("#seleccionarSucursal4").change(function(){
  const progressBar = document.querySelector('.progress-bar');
  $('.progress-bar').fadeIn();
  var selectedOption = $(this).find('option:selected');
  var id = selectedOption.data('id');
  var servidor = $("#seleccionarSucursal4").val();
  var Servidor = $("#seleccionarSucursal4").val();
  progressBar.style.width = '5%';
    $.ajax({
    url:"ajax/conexion.ajax.php",
    method:"POST",
    data: { "id" : id,"servidor" : servidor,  
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json"
    },
    success:function(respuesta){
      var resp = jQuery.parseJSON(respuesta); 
      if (respuesta["ErrorProcedure"] = 'Conectado') {
            $.ajax({
            url:"ajax/cajas.ajax.php",
            method:"POST",
            data: { "Servidor" : Servidor, 
            cache: false,
            dataType: "json"},
            beforeSend: function () {
              progressBar.style.width = '15%';
            },
            success:function(respuesta){
              var resp = jQuery.parseJSON(respuesta);
              $("#seleccionarCaja4").empty();
              for(var i = 0; i < resp.length; i++) {
                $("#seleccionarCaja4").append('<option value="'+resp[i]["IdCaja"]+'">'+resp[i]["DescripcionCaja"]+'</option>');
                $("#seleccionarCaja4").find('option').prop("selected",true);
                $("#seleccionarCaja4").trigger("change");
              }
              progressBar.style.width = '35%';
              $.ajax({
                url:"ajax/asesores.ajax.php",
                method:"POST",
                data: { "Servidor" : Servidor, 
                cache: false,
                dataType: "json"},
                success:function(respuesta){
                  var resp = jQuery.parseJSON(respuesta);  
                  $("#seleccionarAsesores3").empty();
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAsesores3").append('<option value="'+resp[i]["IdAsesor"]+'">'+resp[i]["Nombre"]+'</option>');
                    $("#seleccionarAsesores3").find('option').prop("selected",true);
                    $("#seleccionarAsesores3").trigger("change");
                  }
                }
              })
              progressBar.style.width = '75%';
              $.ajax({
                url:"ajax/areas.ajax.php",
                method:"POST",
                data: { "Servidor" : Servidor, 
                cache: false,
                dataType: "json"},
                success:function(respuesta){
                  var resp = jQuery.parseJSON(respuesta);  
                  $("#seleccionarAreas4").empty();
                  for(var i = 0; i < resp.length; i++) {
                    $("#seleccionarAreas4").append('<option value="'+resp[i]["idarea"]+'">'+resp[i]["area"]+'</option>');
                    $("#seleccionarAreas4").find('option').prop("selected",true);
                    $("#seleccionarAreas4").trigger("change");
                  }
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
          })
      }else{
        alert ('El Servidor '+servidor+' esta '+resp["ErrorProcedure"]);
        location.reload();
      }
    }
  })
})

$('#customCheck1').change(function(){
    if ($('#customCheck1').is(':checked') == true){
        $('#nuevaFactura').val('').prop('disabled', true);
        $('#facts').val('0');
        $('#nuevaFactura:text').attr('placeholder','Todas las facturas elegidas');
    } else {
        $('#nuevaFactura').val('').prop('disabled', false);
        $('#facts').val('');
        $('#nuevaFactura:text').attr('placeholder','Ingrese factura a consultar');
    }
});
$('#customCheck2').change(function(){
    if ($('#customCheck2').is(':checked') == true){
      $('.cajas').show();
    } else {
      $('.cajas').hide();
    }
});
$('.table-detail tbody').on('click', 'button.toggleChild', function () {
  var table = $('.table-detail').DataTable();
  $(this).toggleClass('btn-danger btn-success');
  var tr = $(this).closest('tr');
  var row = table.row(tr);
  if (row.child.isShown()) {
    row.child.hide();
  }
  else {
    row.child.show();
  }
});