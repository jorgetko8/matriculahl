
function busqueda(){
    
    var texto = document.getElementById("campodoc").value;
    
    var parametros = {
        "texto": texto
    };
    
    $.ajax({
        data: parametros,
        url: "controllers/UsuarioController.php",
        type: "POST",
        success: function(response){
            $('#divreceptor').html(response);
        }
    });
    
}
