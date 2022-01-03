$('#table_produccion tr').on('click', function(event){
    event.preventDefault();
    var id_produccion = $(this).find('td:nth-child(2)').html();
    var estatus = $(this).find('td:nth-child(10)').html();
    var accion;

    $(document).ready(function(){
        $('#table_produccion a').click(function(){
            accion = $(this).attr('id');

            if(accion == "habilitar_p" || accion == "inhabilitar_p"){
                cambiar_produccion(id_produccion, estatus);
            } 
        });
    });
});


function cambiar_produccion(id_produccion, estatus){
    let Datos_produccion;

    if(estatus == "Vigente"){
        Datos_produccion = {
            id_produccion: id_produccion,
            estatus: 0
        };
    }
    if(estatus == "No vigente"){
        Datos_produccion = {
            id_produccion: id_produccion,
            estatus: 1
        };
    }

    $.ajax({
        url: 'bd/estatus_produccion.php',
        type: 'POST',
        data: Datos_produccion,//lo que se va a pasar 
    }).done(function(data) {
        console.log(data);

        if(data === "Produccion Vigente"){
            alert("Produccion habilitada :D");
            window.location.reload();
        }
        if(data === "Produccion No Vigente"){
            alert("Produccion inhabilitada :D");
            window.location.reload();
        }
     }).fail(function() {
        console.log("Error al enviar");
    });
}