$('#table_venta tr').on('click', function(event){
    event.preventDefault();
    var cve_vta = $(this).find('td:nth-child(2)').html();
    var pto_vta = $(this).find('td:nth-child(3)').html();
    var fecha = $(this).find('td:nth-child(4)').html();
        var aux_fecha = fecha.trim('');
    var gastos = $(this).find('td:nth-child(5)').html();
    var importe_venta = $(this).find('td:nth-child(6)').html();
    var rfc_empleado = $(this).find('td:nth-child(7)').html();

    $('#m_cve_vta').val(cve_vta);
    $('#m_pto_vta').val(pto_vta);
    $('#m_fecha').val(aux_fecha);
    $('#m_gastos').val(gastos);
    $('#m_importe_venta').val(importe_venta);
    $('#m_rfc_empleado').val(rfc_empleado);

    $(document).ready(function () {
        $("#btn_ver_detalle").on('click', function(event){
            console.log('Ha hecho click sobre el boton ver detalle'); 
            event.preventDefault();
            new detalles_venta();
        });
        $('#cerrar_vta').click(function() {
            window.location.reload();
        });
    });
});

function detalles_venta(){
    var cve_venta = document.getElementById("m_cve_vta").value;
    const Datos_detalle_v = {
        cve_vta: cve_venta
    };
    $.ajax({
        url: 'bd/select_detalle_venta.php',
        type: 'POST',
        data: Datos_detalle_v, //lo que se va a pasar    
    }).done(function(data) {
        $("#table_detalle_venta").html(data);
     }).fail(function() {
        console.log("Error al enviar");
    });
}