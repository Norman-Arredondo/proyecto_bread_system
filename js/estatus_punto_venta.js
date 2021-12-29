$('#table_pto_vta tr').on('click', function(event){
    event.preventDefault();
    var cve_pto = $(this).find('td:nth-child(2)').html();
    var estatus = $(this).find('td:nth-child(10)').html();
    var accion;
    console.log(cve_pto);
    console.log(estatus);

    $(document).ready(function(){
        $('#table_pto_vta a').click(function(){
            accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar" || accion == "inhabilitar"){
                cambiar(cve_pto, estatus);
            }
        });
    });
});


function cambiar(cve_pto, estatus){
    let Datos_pto_vta;

    if(estatus == "Vigente"){
        Datos_pto_vta = {
            cve_pto: cve_pto,
            estatus: 0
        };
    }
    if(estatus == "No vigente"){
        Datos_pto_vta = {
            cve_pto: cve_pto,
            estatus: 1
        };
    }

    console.log(Datos_pto_vta);

    $.ajax({
        url: 'bd/estatus_punto_venta.php',
        type: 'POST',
        data: Datos_pto_vta,//lo que se va a pasar 
    }).done(function(data) {
        console.log(data);

        if(data === "Vigente"){
            alert("Punto de venta habilitado :D");
            window.location.reload();
        }
        if(data === "No vigente"){
            alert("Punto de venta inhabilitado :D");
            window.location.reload();
        }

     }).fail(function() {
        console.log("Error al enviar");
    });
}

