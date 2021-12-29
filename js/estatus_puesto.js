$('#table_puesto tr').on('click', function(event){
    event.preventDefault();
    var id_tipo_empleado = $(this).find('td:nth-child(2)').html();
    var estatus = $(this).find('td:nth-child(6)').html();
    var accion;
    console.log(id_tipo_empleado);
    console.log(estatus);

    $(document).ready(function(){
        $('#table_puesto a').click(function(){
            accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar_te" || accion == "inhabilitar_te"){
                cambiar_puesto(id_tipo_empleado, estatus);
            } 
        });
    });
});


function cambiar_puesto(id_tipo_empleado, estatus){
    let Datos_tipo_empleado;

    if(estatus == "Vigente"){
        Datos_tipo_empleado = {
            id_tipo_empleado: id_tipo_empleado,
            estatus: 0
        };
    }
    if(estatus == "No vigente"){
        Datos_tipo_empleado = {
            id_tipo_empleado: id_tipo_empleado,
            estatus: 1
        };
    }

    $.ajax({
        url: 'bd/estatus_puesto.php',
        type: 'POST',
        data: Datos_tipo_empleado,//lo que se va a pasar 
    }).done(function(data) {
        console.log(data);

        if(data === "Vigente"){
            alert("Puesto habilitado :D");
            window.location.reload();
        }
        if(data === "No vigente"){
            alert("Puesto inhabilitado :D");
            window.location.reload();
        }

     }).fail(function() {
        console.log("Error al enviar");
    });
}