$(document).ready(function () {
    $("#btn_guardar_produccion").on('click', function(event){
        console.log('Ha hecho click sobre el boton guardar produccion'); 
        event.preventDefault();
        new insertar_produccion();
    });
});

function insertar_produccion(){
    var id_produccion = document.getElementById("id_produccion").value;
    var fecha = document.getElementById("fecha_produccion").value;
    var rfc_empleado = document.getElementById("rfc_empleado").value;
    var pan = document.getElementById("pan").value;
    var no_piezas = document.getElementById("no_piezas").value;
    let filas = $("#table_porciones_calculadas").find('tbody tr').length;
    var id_insumo = document.getElementById("id_insumo").value;
    var importe_gas =  document.getElementById("importe_gas").value;
    var importe_luz = document.getElementById("importe_luz").value;
    var importe_gasolina = document.getElementById("importe_gasolina").value;
    var ganancia = document.getElementById("ganancia").value;
    let errores = [""];
    let datos = "";

    if(id_produccion == ""){ 
        errores.push('◾ ID produccion ');
    } 
    if(fecha == ""){ 
        errores.push('◾ Fecha ');
    } 
    if(rfc_empleado == ""){ 
        errores.push('◾ RFC empleado ');
    } 
    if(pan == ""){ 
        errores.push('◾ Pan ');
    } 
    if(no_piezas == ""){ 
        errores.push('◾ Piezas ');
    } 
    if(filas <= 0) {
        errores.push('◾ Porciones ');
    }
    if(id_insumo == ""){ 
        errores.push('◾ ID insumo ');
    } 
    if(importe_gas == ""){ 
        errores.push('◾ Importe gas ');
    }
    if(importe_luz == ""){ 
        errores.push('◾ Importe luz ');
    }
    if(importe_gasolina == ""){ 
        errores.push('◾ Importe gasolina ');
    } 
    if(ganancia == ""){ 
        errores.push('◾ Porcentaje ganancia ');
    }

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        let mpp_ingredientes = new mpp_obtener_ingredientes();

        const Datos_produccion= {
            id_produccion: $('#id_produccion').val(),
            fecha: $('#fecha_produccion').val(),
            rfc_empleado: $('#rfc_empleado').val(),
            pan: $('#pan').val(),
            piezas: $('#no_piezas').val(),
            cantidades: JSON.stringify(mpp_ingredientes),
            total_mp: $('#total_mp').val(),
            id_insumo: $('#id_insumo').val(),
            importe_gas: $('#importe_gas').val(),
            importe_luz: $('#importe_luz').val(),
            importe_gasolina: $('#importe_gasolina').val(),
            total_insumos: $('#total_ins').val(),
            precio_venta: $('#precio_venta').val()
        };
        console.log(Datos_produccion);
        
    }
}

function mpp_obtener_ingredientes(){
    var mpp_id_produccion = document.getElementById("id_produccion").value;
    var mpp_id_mp_produccion;
    var cont = 1;
    var array_cantidades = []; 

    $('#table_porciones_calculadas tbody tr').each(function (index2) {
        var materia_prima = $(this).find("td").eq(1).html();
        var cantidad = $(this).find("td").eq(2).html();
        var unidad = $(this).find("td").eq(3).html();
        var costo = $(this).find("td").eq(4).html();

        var nombre_mp = materia_prima.trim();
        mpp_id_mp_produccion = "MPP-" + cont;

        var fila_porciones_calculadas = {
            mpp_id_produccion,
            mpp_id_mp_produccion,
            nombre_mp,
            cantidad,
            unidad,
            costo
        };
        array_cantidades.push(fila_porciones_calculadas);
    });

    return array_cantidades;
} 
