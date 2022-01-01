$(document).ready(function () {
    $("#recetario").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        new obtener_receta();
    });
});

function obtener_receta(){
    var pan = document.getElementById("pan").value;
    var piezas = document.getElementById("piezas").value;
    var descripcion = document.getElementById("descripcion").value;
    let filas = $("#table_ingredientes").find('tbody tr').length;
    let errores = [""];
    let datos = "";

    if(pan == ""){ 
        errores.push('◾ Pan ');
    } 
    if(piezas == ""){ 
        errores.push('◾ Piezas ');
    } 
    if(descripcion == ""){ 
        errores.push('◾ Descripción ');
    } 
    if(filas <= 0) {
        errores.push('◾ Receta ');
    }

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        let ingredientes = new obtener_ingredientes();

        const Datos_receta= {
            pan: $('#pan').val(),
            piezas: $('#piezas').val(),
            descripcion: $('#descripcion').val(),
            ingredientes: JSON.stringify(ingredientes)
        };
        console.log(Datos_receta);

        var dato = $("#recetario").serialize();
        console.log(dato);
        $.ajax({
            url: 'bd/insert_recetario.php',
            type: 'POST',
            data: Datos_receta,
        }).done(function(data) {
            console.log(data);

            if(data === "Receta guardada"){
                alert("Receta guardada con éxito :D");
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

function obtener_ingredientes(){
    var pan = document.getElementById("pan").value;
    var array_ingrediente = []; 

    $('#table_ingredientes tbody tr').each(function (index2) {
        var materia_prima = $(this).find("td").eq(1).html();
        var cantidad = $(this).find("td").eq(2).html();
        var unidad = $(this).find("td").eq(3).html();
        
        var fila_ingrediente = {
            pan,
            materia_prima,
            cantidad,
            unidad
        };
        array_ingrediente.push(fila_ingrediente);
    });
    return array_ingrediente;
}