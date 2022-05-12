/*$(document).ready(function(){
var desde = $('#desde').val();
var hasta = $('#hasta').val();
var dataString =$("#roca").serialize();
//var dataString = 'desde='+ desde + '&hasta='+ hasta;
  $("#generar").click(function(){
 $('#respuesta').html('<img src="graficos/loader.gif" alt=""/>').fadeOut(4000);
 

      $.ajax({
        type:"POST",
        url:"graficos/graph.php",
       data: dataString,
        success:function(data){   
      $("#respuesta").html(data);    
      $('#respuesta').show(2000);
      
         
        }
      
      });

  });
});*/

$(function(){
$("#generar").on('click', function(){
  var desde = $("#desde").val(); 
  var hasta = $("#hasta").val(); 
  $('#respuesta').html('<img src="graficos/loader.gif" alt="cargando" class="img-responsive center-block"/>').fadeOut(4000);
  
      $.ajax({
        type:"POST",
        url:"graficos/graph.php",
       data: 'desde='+ desde + '&hasta='+ hasta,
        success:function(data){   
      $("#respuesta").html(data);    
      $('#respuesta').show(1000);
      
         
        }
      
      });

  });
});

$(function(){
$("#bar1").on('click', function(){
  var desde = $("#desde1").val(); 
  var hasta = $("#hasta1").val(); 
  $('#bar').html('<img src="graficos/loader.gif" alt="cargando" class="img-responsive center-block"/>').fadeOut(4000);
  
      $.ajax({
        type:"POST",
        url:"graficos/bar.php",
       data: 'desde='+ desde + '&hasta='+ hasta,
        success:function(data){  
        $('#bar').show(1000);  
       $('#bar').html(data);
         
        }
      
      });

  });
});

$(function(){
$("#barr").on('click', function(){
  var desde = $("#desde2").val(); 
  var hasta = $("#hasta2").val(); 
  $('#barr1').html('<img src="graficos/loader.gif" alt="cargando" class="img-responsive center-block"/>').fadeOut(4000);
  
      $.ajax({
        type:"POST",
        url:"graficos/barras.php",
       data: 'desde='+ desde + '&hasta='+ hasta,
        success:function(data){   
      $("#barr1").html(data);    
      $('#barr1').show(1000);
      
         
        }
      
      });

  });
});