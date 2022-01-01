$(document).ready(function () {
    $("#produccion").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        new obtener_porciones();
    });
});

function obtener_porciones(){
    var pan = document.getElementById("pan").value;
    var no_piezas = document.getElementById("no_piezas").value;
    let errores = [""];
    let datos = "";

    if(pan == ""){ 
        errores.push('◾ Pan ');
    } 
    if(no_piezas == ""){ 
        errores.push('◾ Piezas ');
    } 

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        const Datos_porciones= {
            pan: $('#pan').val(),
            piezas: $('#no_piezas').val()
        };
        console.log(Datos_porciones);

        $.ajax({
            url: 'bd/calcular_porciones.php',
            type: 'POST',
            data: Datos_porciones,
        }).done(function(data) {
            console.log(data);
            $("#table_porciones_calculadas").html(data);

         }).fail(function() {
            console.log("Error al enviar");
        });   
    }
}
