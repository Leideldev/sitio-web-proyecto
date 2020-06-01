function cambio_archivo() {
    var archivo = document.getElementById('fileToUpload').files[0];
    var img = document.getElementById('img');

    var lectorArchivo = new FileReader();
    lectorArchivo.onload = function () {
        img.src = this.result
    }
    lectorArchivo.readAsDataURL(archivo);
}


function cerrarSesion() {
    $.ajax({
        //Tipo de envio
        type: "POST",
        //URL destino
        url: "./controlador/controlador_usuario.php",
        //Datos a enviar
        data: 'cerrar',

        success: function () {
            //Coloca el resultado en la pagina WEB
            window.location.replace("http://localhost/index.php");
        },
    });
}