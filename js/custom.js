function cambio_archivo() {
    var archivo = document.getElementById('fileToUpload').files[0];
    var img = document.getElementById('img');

    var lectorArchivo = new FileReader();
    lectorArchivo.onload = function () {
        img.src = this.result
    }
    lectorArchivo.readAsDataURL(archivo);
}

function cambio_fotos(){
    
    var archivos = document.getElementById('files[]').files;
    if(archivos.length>0){
        console.log(archivos);
        var file;
        var etiquetas = "123";
        for (var i = 0; i < archivos.length; i++) {
            //etiquetas+= "<img src=''>";
            
            file = archivos[i];

            var lectorArchivo = new FileReader();
            lectorArchivo.onload = function () {
                //etiquetas= etiquetas+"<img src="+this.result+"> <br>";
                etiquetas= "a ver entro a la funcion";
            }
            lectorArchivo.readAsDataURL(file);

            alert(file.name);
        }
        alert(etiquetas);
        document.getElementById('fotos').innerHTML=etiquetas;
    }
    
    //var $fileUpload = $("input[type='file']");
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