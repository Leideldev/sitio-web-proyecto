function cambio_archivo(){
    var archivo = document.getElementById('input').files[0];
    var img = document.getElementById('img');
  
    var lectorArchivo = new FileReader();
    lectorArchivo.onload = function(){
       img.src = this.result
    }
    lectorArchivo.readAsDataURL(archivo);
   }