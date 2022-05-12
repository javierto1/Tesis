$(function(){

 $("#Ingresar").click(function(){

 var url = "control.php"; // El script a dónde se realizará la petición.

    $.ajax({
        async: true,
        beforeSend :enviar,//funcion
           type: "POST",

           url: url,

           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.

           success: function(data){

               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.

           }

         });


    return false; // Evitar ejecutar el submit del formulario.

 });



});

 function enviar() {
    
    document.getElementById("password").value=hex_sha256(document.getElementById("password").value);
    
         
   }