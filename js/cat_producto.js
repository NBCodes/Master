//Funcionalidades pantalla_nuevoproducto.php
$(document).ready(function() {
	$('select[name="cat1"]').on('change', function(evt) {
        var tema;
        //según categoría principal del select rellena tema con las secundarias corresponientes
        switch (evt.target.value) {
            case 'perro': tema = ["ropa", "collar", "juguete"];
                
                break;
            case 'gato': tema = ["descanso", "juguete", "higiene"];
            
                break;
            case 'pajaro': tema = ["jaula", "accesorio", "comida"];
            
                break;
            case 'roedor': tema = ["jaula", "accesorio", "comida"];
        
                break;
            case 'pez':  tema = ["decoracion", "comida"];
        
                break;
        }
        $('select[name="cat2"]').html('');
        for (let i = 0; i < tema.length; i++) {
            var option = '<option value="' + tema[i] + '">' + tema[i] + '</option>';
            $('select[name="cat2"]').append(option);
        }
	});
    //Valida campos
    $('button[id="registrar"]').on('click', function(evt) {
        var nombre = $('input[name="nombre"]').val();
        var precio = $('input[name="precio"]').val();
        var descuento = $('input[name="descuento"]').val();
        var talla = $('input[name="talla"]').val();
        var descripcion = $('textarea[name="descripcion"]').val();
        var imagen = $('input[name="adjunto"]').val();
        if (nombre.length == 0) {
            $('input[name="nombre"]').focus();
            $('label[id="nombre"]').css("color", "red");
        }else if (precio.length == 0) {
            $('input[name="precio"]').focus();
            $('label[id="precio"]').css("color", "red");
        }else if (descuento.length == 0){
            $('input[name="descuento"]').focus();
            $('label[id="descuento"]').css("color", "red");
        }else if (talla.length == 0){
            $('input[name="talla"]').focus();
            $('label[id="talla"]').css("color", "red");
        }else if (descripcion.length == 0){
            $('input[name="descripcion"]').focus();
            $('label[id="descripcion"]').css("color", "red");
        }else if (imagen.length == 0){
            $('input[name="adjunto"]').focus();
            $('#adjunto').css("color", "red");
        }else{
            //Si todo esta correcto envia los datos al php
            $("#producto-form").submit();
        }
    });

    $('input[name="nombre"]').on('keypress', black);
    $('input[name="precio"]').on('keypress', black);
    $('input[name="descripcion"]').on('keypress', black);
    $('input[name="talla"]').on('keypress', black);
    $('input[name="talla"]').on('keypress', black);
});

//Cambia a negro el label al enviar el formulario
function black(evt){
    $('#' + $(evt.target).attr('name')).css("color", "black");
}
