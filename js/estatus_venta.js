$('#table_venta tr').on('click', function(event){
    event.preventDefault();
    var cve_vta = $(this).find('td:nth-child(2)').html();
    var estatus = $(this).find('td:nth-child(8)').html();
    var accion;

    $(document).ready(function(){
        $('#table_venta a').click(function(){
            accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar_v" || accion == "inhabilitar_v"){
                cambiar_venta(cve_vta, estatus);
            } 
        });
    });
});


function cambiar_venta(cve_vta, estatus){
    let Datos_venta;

    if(estatus == "Vigente"){
        Datos_venta = {
            cve_vta: cve_vta,
            estatus: 0
        };
    }
    if(estatus == "No vigente"){
        Datos_venta = {
            cve_vta: cve_vta,
            estatus: 1
        };
    }

    $.ajax({
        url: 'bd/estatus_venta.php',
        type: 'POST',
        data: Datos_venta,//lo que se va a pasar 
    }).done(function(data) {

        if(data === "Vigente"){
            alert("Venta habilitada :D");
            window.location.reload();
        }
        if(data === "No vigente"){
            alert("Venta inhabilitada :D");
            window.location.reload();
        }
     }).fail(function() {
        console.log("Error al enviar");
    });
}