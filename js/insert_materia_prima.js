$(document).ready(function () {
    $("#materia_prima").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        registrar();
    });
});

function registrar(){
    var nombre_mp = document.getElementById("nombre_mp").value;
    var fecha_compra = document.getElementById("fecha_compra").value;
    var cantidad = document.getElementById("cantidad").value;
    var unidad = document.getElementById("unidad").value;
    var contenido_neto = document.getElementById("contenido_neto").value;
    var precio_unitario = document.getElementById("precio_unitario").value;
    var precio_total = document.getElementById("precio_total").value;
    
    let errores = [""];
    let datos = "";

    if(nombre_mp == ""){ 
        errores.push('◾ Nombre del producto ');
    } 
    if(fecha_compra == ""){ 
        errores.push('◾ Fecha compra ');
    } 
    if(cantidad == ""){ 
        errores.push('◾ Cantidad ');
    } 
    if(unidad == ""){ 
        errores.push('◾ Unidad ');
    } 
    if(contenido_neto == ""){ 
        errores.push('◾ Contenido neto');
    } 
    if(precio_unitario == ""){ 
        errores.push('◾ Precio unitario');
    } 

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        const Datos_materia_prima = {
            nombre_mp: $('#nombre_mp').val(),
            fecha_compra: $('#fecha_compra').val(),
            cantidad: $('#cantidad').val(),
            unidad: $('#unidad').val(),
            contenido_neto: $('#contenido_neto').val(),
            precio_unitario: $('#precio_unitario').val(),
        };
        //console.log(Datos_pto_vta);
        var dato = $("#materia_prima").serialize(); //serialize toma los datos que introdusca el usuario y los convierte en un arreglo
        console.log(dato);
        $.ajax({
            url: 'bd/insert_materia_prima.php',
            type: 'POST',
            data: Datos_maeria_prima, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "Guardado"){
                $(document).ajaxSuccess(function(){
                    alert("Materia Prima registrada con éxito :D");
                    //$('#punto_venta').trigger("reset");
                    window.location.reload();
                });
            }
            if(data.indexOf("Error") > -1){
            //if(data == "Error al guardar") {
                alert(data);
            }

         }).fail(function() {
            console.log("Error al enviar");
        });
    }
}
