
$(function(){
$("#generar").on('click', function(){
   $('#respuesta').html('<img src="graficos/loader.gif" alt="cargando" class="img-responsive center-block"/>').fadeOut(4000);
      $.ajax({
        type:"POST",
        url:"backup/generar.php",
        success:function(data){   
      $("#respuesta").html(data);    
      $('#respuesta').show(1000);
      
         
        }
      
      });

  });
});
