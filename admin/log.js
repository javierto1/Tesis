function enviar() {
    
    document.getElementById("password").value=hex_sha256(document.getElementById("password").value);
    
         
   }