$('#table_empleado tr').on('click', function(event){
    event.preventDefault();
    var rfc_empleado = $(this).find('td:nth-child(2)').html();
    var estatus = $(this).find('td:nth-child(19)').html();
    var accion;
    console.log(rfc_empleado);
    console.log(estatus);

    $(document).ready(function(){
        $('#table_empleado a').click(function(){
            accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar_e" || accion == "inhabilitar_e"){
                cambiar_empleado(rfc_empleado, estatus);
            }
        });
    });
});

function cambiar_empleado(rfc_empleado, estatus){
    let Datos_empleado;

    if(estatus == "Vigente"){
        Datos_empleado = {
            rfc_empleado: rfc_empleado,
            estatus: 0
        };
    }
    if(estatus == "No vigente"){
        Datos_empleado = {
            rfc_empleado: rfc_empleado,
            estatus: 1
        };
    }

    console.log(Datos_empleado);

    $.ajax({
        url: 'bd/estatus_empleado.php',
        type: 'POST',
        data: Datos_empleado,//lo que se va a pasar 
    }).done(function(data) {
        console.log(data);

        if(data === "Vigente"){
            $(document).ajaxSuccess(function(){
                alert("Empleado habilitado :D");
                window.location.reload();
            });
        }
        if(data === "No vigente"){
            $(document).ajaxSuccess(function(){
                alert("Empleado inhabilitado :D");
                window.location.reload();
            });
        }

     }).fail(function() {
        console.log("Error al enviar");
    });
}