$('#table_produccion tr').on('click', function(event){
    event.preventDefault();
    var id_produccion = $(this).find('td:nth-child(2)').html();
    var fecha = $(this).find('td:nth-child(3)').html();
        var aux_fecha = fecha.trim('');
    var rfc_empleado = $(this).find('td:nth-child(4)').html();
    var pan = $(this).find('td:nth-child(5)').html();
    var piezas = $(this).find('td:nth-child(6)').html();
    var id_insumo = $(this).find('td:nth-child(7)').html();
    var ganancia = $(this).find('td:nth-child(8)').html();
    var precio_venta = $(this).find('td:nth-child(9)').html();

    $('#m_id_produccion').val(id_produccion);
    $('#m_fecha_produccion').val(aux_fecha);
    $('#m_rfc_empleado').val(rfc_empleado);
    $('#m_pan').val(pan);
    $('#m_no_piezas').val(piezas);
    $('#m_id_insumo').val(id_insumo);
    $('#m_ganancia').val(ganancia);
    $('#m_precio_venta').val(precio_venta);

    $(document).ready(function () {
        $("#btn_ver_detalle").on('click', function(event){
            console.log('Ha hecho click sobre el boton ver receta'); 
            event.preventDefault();
            new detalles_produccion();
            new detalles_insumo();
        });
        $('#cerrar_produccion').click(function() {
            window.location.reload();
        });
    });
});

function detalles_produccion(){
    var id_produccion = document.getElementById("m_id_produccion").value;
    const Datos_detalle_p = {
        id_produccion: id_produccion
    };
    $.ajax({
        url: 'bd/select_detalle_produccion.php',
        type: 'POST',
        data: Datos_detalle_p, //lo que se va a pasar    
    }).done(function(data) {
        $("#table_mp_produccion").html(data);
        new calcular_total();
     }).fail(function() {
        console.log("Error al enviar");
    });
}

function calcular_total(){
    var suma = 0;

    $('#table_mp_produccion tbody tr').each(function (index2) {
        suma += parseFloat($(this).find('td').eq(3).text());
    });

    $('#m_total_mp').val(Number.parseFloat(suma).toFixed(2));
}

function detalles_insumo(){
    var id_insumo = document.getElementById("m_id_insumo").value;
    const Datos_detalle_i = {
        id_insumo: id_insumo
    };
    $.ajax({
        url: 'bd/select_detalle_insumo.php',
        type: 'POST',
        data: Datos_detalle_i, //lo que se va a pasar    
    }).done(function(data) {
        var datos = JSON.parse(data);
        $("#m_importe_gas").val(parseFloat(datos[0]));
        $("#m_importe_luz").val(parseFloat(datos[1]));
        $("#m_importe_gasolina").val(parseFloat(datos[2]));
        $("#m_total_ins").val(parseFloat(datos[3]));
     }).fail(function() {
        console.log("Error al enviar");
    });
}