$('#table_catalogo tr').on('click', function(event){
    event.preventDefault();
    var pan = $(this).find('td:nth-child(2)').html();
    var descripcion = $(this).find('td:nth-child(3)').html();
    var piezas = $(this).find('td:nth-child(4)').html();

    $('#m_pan').val(pan);
    $('#m_descripcion').val(descripcion);
    $('#m_piezas').val(piezas);

    $(document).ready(function () {
        $("#btn_modificar_catalogo").on('click', function(event){
            console.log('Ha hecho click sobre el boton modificar'); 
            event.preventDefault();
            new modificar_info_catalogo();
        });
        $("#btn_ver_receta").on('click', function(event){
            console.log('Ha hecho click sobre el boton ver receta'); 
            event.preventDefault();
            new consultar_receta();
        });
        $('#cerrar_mp').click(function() {
            window.location.reload();
        });
    });
});

function modificar_info_catalogo(){
    var m_descripcion = document.getElementById("m_descripcion").value;
    var m_piezas = document.getElementById("m_piezas").value;
    let filas = $("#table_receta").find('tbody tr').length;
    let errores = [""];
    let datos = "";

    if(m_descripcion == ""){ 
        errores.push('◾ Descripción ');
    }  
    if(m_piezas == ""){ 
        errores.push('◾ Piezas ');
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
        let mr_ingredientes = new mr_obtener_ingredientes();

        const Datos_catalogo = {
            pan: $('#m_pan').val(),
            descripcion: $('#m_descripcion').val(),
            piezas: $('#m_piezas').val(),
            ingredientes: JSON.stringify(mr_ingredientes)
        };

        console.log(Datos_catalogo);

        var dato = $("#modificar_catalogo").serialize();

        $.ajax({
            url: 'bd/update_catalogo.php',
            type: 'POST',
            data: Datos_catalogo, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "Catalogo Guardado"){
                alert("Receta modificada con éxito :D");
            }
            if(data.indexOf("Error") > -1){
                alert(data);
            }
         }).fail(function() {
            console.log("Error al enviar");
        });
    }
}

function consultar_receta(){
    var pan = document.getElementById("m_pan").value;
    const Datos_receta = {
        pan: pan
    };
    $.ajax({
        url: 'bd/select_receta.php',
        type: 'POST',
        data: Datos_receta, //lo que se va a pasar    
    }).done(function(data) {
        $("#table_receta").html(data);
        new eliminar_ingrediente();
     }).fail(function() {
        console.log("Error al enviar");
    });
}

function eliminar_ingrediente(){
    $('#table_receta tr').on('click', function(event){
        var mr_ingrediente = $(this).find('td:nth-child(2)').html();
        console.log(mr_ingrediente);

        $(document).ready(function(){
            $('#table_receta a').click(function(){   
                new bd_elimina_ing(mr_ingrediente);
                $(this).closest('tr').remove();
            });
        });
    });
}

function bd_elimina_ing(ingrediente){
    var mr_pan = document.getElementById("m_pan").value;
    var mr_ingrediente = ingrediente.trim();
    let Datos_ingrediente;

    Datos_ingrediente = {
        pan: mr_pan,
        ingrediente: mr_ingrediente
    };
    console.log(Datos_ingrediente);

    $.ajax({
        url: 'bd/eliminar_ingrediente.php',
        type: 'POST',
        data: Datos_ingrediente,
    }).done(function(data) {
        if(data === "Ing eliminado"){
            alert("Ingrediente eliminado :D"); 
        }
     }).fail(function() {
        console.log("Error al enviar");
    });
}

function mr_obtener_ingredientes(){
    var pan = document.getElementById("m_pan").value;
    var array_ingrediente = []; 

    $('#table_receta tbody tr').each(function (index2) {
        var materia_prima = $(this).find("td").eq(1).html();
        var cantidad = $(this).find("td").eq(2).html();
        var unidad = $(this).find("td").eq(3).html();

        var nombre_mp = materia_prima.trim();
        
        var fila_ingrediente = {
            pan,
            nombre_mp,
            cantidad,
            unidad
        };
        array_ingrediente.push(fila_ingrediente);
    });
    return array_ingrediente;
}
