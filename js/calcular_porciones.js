$(document).ready(function () {
    $("#btn_calcular_porciones").on('click', function(event){
        console.log('Ha hecho click sobre el boton calcular porciones'); 
        event.preventDefault();
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

        $.ajax({
            url: 'bd/calcular_porciones.php',
            type: 'POST',
            data: Datos_porciones,
        }).done(function(data) {
            $("#table_porciones_calculadas").html(data);
            new calcular_total_mp();
         }).fail(function() {
            console.log("Error al enviar");
        });   
    }
}

function calcular_total_mp(){
    var suma = 0;

    $('#table_porciones_calculadas tbody tr').each(function (index2) {
        suma += parseFloat($(this).find('td').eq(3).text());
    });

    $('#total_mp').val(Number.parseFloat(suma).toFixed(2));
}
