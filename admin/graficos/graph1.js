
$(function(){
$("#bar1").on('click', function(){
  var desde = $("#desde").val(); 
  var hasta = $("#hasta").val(); 
  $('#bar').html('<img src="graficos/loader.gif" alt="cargando" class="img-responsive center-block"/>').fadeOut(4000);
  
      $.ajax({
        type:"POST",
        url:"../graficos/bar.php",
       data: 'desde='+ desde + '&hasta='+ hasta,
        success:function(data){   
      $("#bar").html(data);    
      $('#bar').show(2000);
      
         
        }
      
      });

  });
});