$(document).ready(function() {
    $("#carro").click(abrir_carro);
    $("#cerrarmenu").click(cerrar_carro);
    
    //Añade producto al carro
	$('a[name="carro"]').on('click', function(evt) {
		var id = $(evt.target).attr('id');
        var orden = "insertar";
        ajaxx(id, orden);
	});
    //Elimina producto del carro
    $('i[name="basura"]').on('click', function(evt) {
        var id = $(evt.target).attr('id');
        var orden = "eliminar";
        ajaxx(id, orden);
    });
    //función para comprobar si la cantidad del producto es numérica en el carro
    $('input[type="numeric"]').on('click', function() {
        var id = $(evt.target).attr('id');
        var cantidad = $(evt.target).html();
        if (Number.isInteger(parseInt(cantidad))) {
            ajaxx(id, cantidad);
        }else{
            alert("Eso no es una cantidad!");
        }
    });
});

//Función para hacer envio datos a carro.php
function ajaxx(id, orden){
    $.ajax({
        url: "carro.php",
        type: "POST",
        
        data: JSON.stringify({
            "producto" : id,
            "orden" : orden			
        }),
        success: function(json){
            var jSon = JSON.parse(json);
            alert(jSon);
        }
    });
}

// funciones para abrir / cerrar el carro
function abrir_carro(){
    $(".w3-sidebar").css("display", "block");
}

function cerrar_carro() {
    $(".w3-sidebar").css("display", "none");
}