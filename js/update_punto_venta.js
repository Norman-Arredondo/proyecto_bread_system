$('#table_pto_vta tr').on('click', function(event){
    event.preventDefault();
    var cve_pto = $(this).find('td:nth-child(2)').html();
    var pto_vta = $(this).find('td:nth-child(3)').html();
    var calle = $(this).find('td:nth-child(4)').html();
    var colonia = $(this).find('td:nth-child(5)').html();
    var no_interior = $(this).find('td:nth-child(6)').html();
    var no_exterior = $(this).find('td:nth-child(7)').html();
    var alcaldia = $(this).find('td:nth-child(8)').html();
    var codigo_postal = $(this).find('td:nth-child(9)').html();

    $('#m_cve_pto').val(cve_pto);
    $('#m_pto_vta').val(pto_vta);
    $('#m_calle').val(calle);
    $('#m_colonia').val(colonia);
    $('#m_no_interior').val(no_interior);
    $('#m_no_exterior').val(no_exterior);
    $('#m_alcaldia').val(alcaldia);
    $('#m_codigo_postal').val(codigo_postal);

    $(document).ready(function () {
        $("#modificar_punto").submit(function (event) {
            event.preventDefault(); //almacena los datos sin refrescar el sitio
            modificar_info();
        });
    });
});


function modificar_info(){
    var m_pto_vta = document.getElementById("m_pto_vta") .value;
    var m_calle = document.getElementById("m_calle").value;
    var m_colonia = document.getElementById("m_colonia").value;
    var m_no_interior = document.getElementById("m_no_interior").value;
    var m_no_exterior = document.getElementById("m_no_exterior").value;
    var m_alcaldia = document.getElementById("m_alcaldia").value;
    var m_codigo_postal = document.getElementById("m_codigo_postal").value;
    let errores = [""];
    let datos = "";

    if(m_pto_vta == ""){ 
        errores.push('◾ Punto de venta ');
    } 
    if(m_calle == ""){ 
        errores.push('◾ Calle ');
    } 
    if(m_colonia == ""){ 
        errores.push('◾ Colonia ');
    } 
    if(m_no_interior == ""){ 
        errores.push('◾ Num. interior ');
    } 
    if(m_no_exterior == ""){ 
        errores.push('◾ Num. exterior ');
    } 
    if(m_alcaldia == ""){ 
        errores.push('◾ Alcaldia ');
    } 
    if(m_codigo_postal == ""){ 
        errores.push('◾ Codigo postal ');
    } 

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        const Datos_pto_vta = {
            cve_pto: $('#m_cve_pto').val(),
            pto_vta: $('#m_pto_vta').val(),
            calle: $('#m_calle').val(),
            colonia: $('#m_colonia').val(),
            no_interior: $('#m_no_interior').val(),
            no_exterior: $('#m_no_exterior').val(),
            alcaldia: $('#m_alcaldia').val(),
            codigo_postal: $('#m_codigo_postal').val()
        };

        var dato = $("#modificar_punto").serialize();
        console.log(dato);

        $.ajax({
            url: 'bd/update_punto_venta.php',
            type: 'POST',
            data: Datos_pto_vta, 
        }).done(function(data) {
            console.log(data);

            if(data === "Modificado"){
                $(document).ajaxSuccess(function(){
                    alert("Punto de venta modificado con éxito :D");
                    window.location.reload();
                });
            }
            if(data.indexOf("Error") > -1){
                alert(data);
            }
        }).fail(function() {
            console.log("Error al enviar");
        });
    }
}
