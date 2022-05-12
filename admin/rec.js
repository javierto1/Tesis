$(function(){

 $("#btn_enviar").click(function(){

 var url = "rec.php"; // El script a dónde se realizará la petición.

    $.ajax({

           type: "POST",

           url: url,

           data: $("#form").serialize(), // Adjuntar los campos del formulario enviado.

           success: function(data){

               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.

           }

         });


    return false; // Evitar ejecutar el submit del formulario.

 });

});