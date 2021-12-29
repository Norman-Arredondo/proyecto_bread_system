$('#table_materia_prima tr').on('click', function(event){
    event.preventDefault();
    var nombre_mp = $(this).find('td:nth-child(2)').html();
    var existencia = $(this).find('td:nth-child(3)').html();
    var stock_minimo = $(this).find('td:nth-child(4)').html();
    var stock_maximo = $(this).find('td:nth-child(5)').html();

    $('#m_nombre_mp').val(nombre_mp);
    $('#m_existencia').val(existencia);
    $('#m_stock_minimo').val(stock_minimo);
    $('#m_stock_maximo').val(stock_maximo);

    $(document).ready(function () {
        $("#btn_modificar_materia").click(function(event){
            console.log('Ha hecho click sobre el boton modificar'); 
            event.preventDefault();
            modificar_info_mp();
        });
        $("#btn_ver_compras").click(function(event){
            console.log('Ha hecho click sobre el boton ver compras'); 
            event.preventDefault();
        });
        $('#cerrar').click(function() {
            window.location.reload();
            //$("#resultado_compras").empty();
        });
    });
});


function modificar_info_mp(){
    var m_nombre_mp = document.getElementById("m_nombre_mp").value;
    var m_stock_minimo = document.getElementById("m_stock_minimo").value;
    var m_stock_maximo = document.getElementById("m_stock_maximo").value;
    let errores = [""];
    let datos = "";

    if(m_nombre_mp == ""){ 
        errores.push('◾ Nombre del producto ');
    }  
    if(m_stock_minimo == ""){ 
        errores.push('◾ Stock mínimo ');
    } 
    if(m_stock_maximo == ""){ 
        errores.push('◾ Stock máximo ');
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
            nombre_mp: $('#m_nombre_mp').val(),
            stock_minimo: $('#m_stock_minimo').val(), 
            stock_maximo: $('#m_stock_maximo').val()
        };

        var dato = $("#materia_prima").serialize();

        $.ajax({
            url: 'bd/update_materia_prima.php',
            type: 'POST',
            data: Datos_materia_prima, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "MP Guardada"){
                $(document).ajaxSuccess(function(){
                    alert("Materia Prima modificada con éxito :D");
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