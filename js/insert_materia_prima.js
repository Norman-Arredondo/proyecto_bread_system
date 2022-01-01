$(document).ready(function () {
    $("#materia_prima").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        registrar_materia_prima();
    });
});

function registrar_materia_prima(){
    var nombre_mp = document.getElementById("nombre_mp").value;
    var fecha_compra = document.getElementById("fecha_compra").value;
    var cantidad = document.getElementById("cantidad").value;
    var unidad = document.getElementById("unidad").value;
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
    if(precio_total == ""){ 
        errores.push('◾ Precio total');
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
            precio_total: $('#precio_total').val() 
        };

        var dato = $("#materia_prima").serialize();

        $.ajax({
            url: 'bd/insert_materia_prima.php',
            type: 'POST',
            data: Datos_materia_prima, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "Guardado"){
                alert("Materia Prima registrada con éxito :D");
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
