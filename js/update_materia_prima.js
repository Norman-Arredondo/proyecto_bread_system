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
        $("#btn_modificar_materia").on('click', function(event){
            console.log('Ha hecho click sobre el boton modificar'); 
            event.preventDefault();
            new modificar_info_mp();
        });
        $("#btn_ver_compras").on('click', function(event){
            console.log('Ha hecho click sobre el boton ver compras'); 
            event.preventDefault();
            new consultar_compras();
        });
        $('#cerrar_mp').click(function() {
            window.location.reload();
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
                alert("Materia Prima modificada con éxito :D");
            }
            if(data.indexOf("Error") > -1){
                alert(data);
            }
         }).fail(function() {
            console.log("Error al enviar");
        });
    }
}

function consultar_compras(){
    var nombre_cmp = document.getElementById("m_nombre_mp").value;
    const Datos_compra = {
        nombre_mp: nombre_cmp
    };
    $.ajax({
        url: 'bd/select_compras.php',
        type: 'POST',
        data: Datos_compra, //lo que se va a pasar    
    }).done(function(data) {
        $("#table_compras_mp").html(data);
        new acciones_cmp();
     }).fail(function() {
        console.log("Error al enviar");
    });
}

function acciones_cmp(){
    $('#table_compras_mp tr').on('click', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        c_nombre_mp = $('#m_nombre_mp').val();
        c_fecha_compra = $(this).find('td:nth-child(2)').html();
        c_cantidad = $(this).find('td:nth-child(3)').html();
        c_unidad = $(this).find('td:nth-child(4)').html();
        c_precio_total = $(this).find('td:nth-child(5)').html();
        c_estatus = $(this).find('td:nth-child(6)').html();

        $('#table_compras_mp a').on('click',function(){
            var accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar_cmp" || accion == "inhabilitar_cmp"){
                $("#resultado_compras").empty();
                new estatus_cmp(c_nombre_mp, c_fecha_compra, c_estatus);
            } else if(accion == "editar_cmp"){
                //console.clear();
                $("#editar_materia").modal("toggle");
                $('#editar_materia').modal("hide");
                $("#editar_compra").modal("toggle");
                $('#editar_compra').modal("show");
                new ver_info_cmp(c_nombre_mp, c_fecha_compra, c_cantidad, c_unidad, c_precio_total);
            }
        });
    });
}

function estatus_cmp(e_nombre_mp, e_fecha_compra, e_estatus){
    var ecmp_nombre_mp = e_nombre_mp;
    var ecmp_fecha_compra = e_fecha_compra;
    var ecmp_estatus = e_estatus;
    let Datos_compra;

    if(ecmp_estatus == "Vigente"){
        Datos_compra = {
            nombre_mp: ecmp_nombre_mp,
            fecha_compra: ecmp_fecha_compra,
            estatus: 0
        };
    }
    if(ecmp_estatus == "No vigente"){
        Datos_compra = {
            nombre_mp: ecmp_nombre_mp,
            fecha_compra: ecmp_fecha_compra,
            estatus: 1
        };
    }

    $.ajax({
        url: 'bd/estatus_compra.php',
        type: 'POST',
        data: Datos_compra,
    }).done(function(data) {
        if(data === "CMP Vigente"){
            alert("Compra habilitada :D");
            consultar_compras();
        } else if(data === "CMP No vigente"){
            alert("Compra inhabilitada :D");
            consultar_compras();
        } else {
            data = null;
        }
     }).fail(function() {
        console.log("Error al enviar");
    });
}

function ver_info_cmp(c_nombre_mp, c_fecha_compra, c_cantidad, c_unidad, c_precio_total){
    var icm_nombre_mp = c_nombre_mp;
    var icm_fecha_compra = c_fecha_compra;
        var aux_fecha_compra = icm_fecha_compra.trim();
    var icm_cantidad = c_cantidad;
    var icm_unidad = c_unidad;
    var icm_precio_total = c_precio_total;
    
    $('#mc_nombre_mp').val(icm_nombre_mp);
    $('#mc_fecha_compra').val(aux_fecha_compra);
    $('#mc_cantidad').val(icm_cantidad);
    $('#mc_unidad').val(icm_unidad);
    $('#mc_precio_total').val(icm_precio_total);

    $(document).ready(function () {
        $("#btn_modificar_compra").on('click', function(event){
            console.log('Ha hecho click sobre el boton modificar compra'); 
            event.preventDefault();
            new modificar_info_cmp();
        });
        $('#cerrar_compra').click(function() {
            console.log('Ha hecho click sobre el boton cerrar modal compra'); 
            $("#editar_compra").modal("toggle");
            $('#editar_compra').modal("hide");
            $("#editar_materia").modal("toggle");
            $('#editar_materia').modal("show");
            new consultar_compras();
        });
    });
}

function modificar_info_cmp(){
    var icm_nombre_mp = document.getElementById("mc_nombre_mp").value;
    var icm_fecha_compra = document.getElementById("mc_fecha_compra").value;
    var icm_cantidad = document.getElementById("mc_cantidad").value;
    var icm_unidad = document.getElementById("mc_unidad").value;
    var icm_precio_total = document.getElementById("mc_precio_total").value;
    
    let errores = [""];
    let datos = "";

    if(icm_cantidad == ""){ 
        errores.push('◾ Cantidad ');
    }  
    if(icm_unidad == ""){ 
        errores.push('◾ Unidad ');
    } 
    if(icm_precio_total == ""){ 
        errores.push('◾ Precio total ');
    } 

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        const Datos_compra = {
            nombre_mp: $('#mc_nombre_mp').val(),
            fecha_compra: $('#mc_fecha_compra').val(),
            cantidad: $('#mc_cantidad').val(),
            unidad: $('#mc_unidad').val(),
            precio_total: $('#mc_precio_total').val()
        };

        var dato = $("#materia_prima").serialize();

        $.ajax({
            url: 'bd/update_compra.php',
            type: 'POST',
            data: Datos_compra, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "Compra guardada"){
                alert("Compra modificada con éxito :D");
            }
            if(data.indexOf("Error") > -1){
                alert(data);
            }
         }).fail(function() {
            console.log("Error al enviar");
        });
    }
}
