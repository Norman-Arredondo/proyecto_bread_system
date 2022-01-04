$(document).ready(function () {
    $("#venta").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        new obtener_venta();
    });
});

function obtener_venta(){
    var cve_vta = document.getElementById("cve_vta").value;
    var pto_vta = document.getElementById("pto_vta");
        var punto = pto_vta.options[pto_vta.selectedIndex].text;
    var fecha = document.getElementById("fecha").value;
    var gastos = document.getElementById("gastos").value;
    var importe_venta = document.getElementById("importe_venta").value;
    var rfc_empleado = document.getElementById("rfc_empleado").value;
    let filas = $("#table_det_vta").find('tbody tr').length;
    let errores = [""];
    let datos = "";

    if(cve_vta == ""){ 
        errores.push('◾ Clave venta ');
    } 
    if(punto == "Punto"){ 
        errores.push('◾ Punto de venta ');
    } 
    if(fecha == ""){ 
        errores.push('◾ Fecha ');
    } 
    if(gastos == ""){ 
        errores.push('◾ Gastos ');
    }
    if(importe_venta == ""){ 
        errores.push('◾ Importe venta ');
    } 
    if(rfc_empleado == ""){ 
        errores.push('◾ RFC empleado ');
    }
    if(filas <= 0) {
        errores.push('◾ Detalle de venta ');
    }

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        var det_vta = new obtener_detalles();

        const Datos_venta = {
            cve_vta: $('#cve_vta').val(),
            pto_vta: $('#pto_vta').val(),
            fecha: $('#fecha').val(),
            gastos: $('#gastos').val(),
            importe_venta: $('#importe_venta').val(),
            rfc_empleado: $('#rfc_empleado').val(),
            detalle_venta: JSON.stringify(det_vta)
        };

        console.log(Datos_venta);
        var dato = $("#venta").serialize(); 

        $.ajax({
            url: 'bd/insert_venta.php',
            type: 'POST',
            data: Datos_venta, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "Venta guardada"){
                alert("Venta registrada con éxito :D");
                window.location.reload();
            }
            if(data.indexOf("Error") > -1){
                alert(data);
            }

         }).fail(function() {
            console.log("Error al enviar");
        });
    } 
}

function obtener_detalles(){
    var cve_vta = document.getElementById("cve_vta").value;
    var pto_vta = $('#pto_vta').val();
    var array_det_vta = []; 

    $('#table_det_vta tbody tr').each(function (index2) {
        var id_produccion = $(this).find("td").eq(1).html();
        var piezas_entregadas = $(this).find("td").eq(3).html();
        var piezas_devueltas = $(this).find("td").eq(4).html();
        
        var fila_vta = {
            cve_vta,
            pto_vta,
            id_produccion,
            piezas_entregadas,
            piezas_devueltas
        };
        array_det_vta.push(fila_vta);
    });
    return array_det_vta;
}