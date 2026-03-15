
$(document).ready(function(){
    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
});

function asignarEquipo() {
    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            
            if (respuesta == 1 ) {
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                Swal.fire("XD","Asignado con exito!","success");
            } else {
                Swal.fire(":c","Fallo al asignar" + respuesta,"error");
            }
            
        }
    });

    return false;
}