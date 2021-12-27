$('#table_puesto tr').on('click', function(event){
    event.preventDefault();
    var id_tipo_empleado = $(this).find('td:nth-child(2)').html();
    var puesto = $(this).find('td:nth-child(3)').html();
    var dias_laborales = $(this).find('td:nth-child(4)').html();
    var sueldo_quincenal = $(this).find('td:nth-child(5)').html();

    $('#m_id_tipo_empleado').val(id_tipo_empleado);
    $('#m_te_puesto').val(puesto);
    if (dias_laborales.indexOf('Do') > -1){
        $('#m_dl_Do').prop('checked', true);
    }
    if (dias_laborales.indexOf('Lu') > -1){
        $('#m_dl_Lu').prop('checked', true);
    }
    if (dias_laborales.indexOf('Ma') > -1){
        $('#m_dl_Ma').prop('checked', true);
    }
    if (dias_laborales.indexOf('Mi') > -1){
        $('#m_dl_Mi').prop('checked', true);
    }
    if (dias_laborales.indexOf('Ju') > -1){
        $('#m_dl_Ju').prop('checked', true);
    }
    if (dias_laborales.indexOf('Vi') > -1){
        $('#m_dl_Vi').prop('checked', true);
    }
    if (dias_laborales.indexOf('Sa') > -1){
        $('#m_dl_Sa').prop('checked', true);
    }
    $('#m_sueldo_quincenal').val(sueldo_quincenal);

    $(document).ready(function () {
        $("#modificar_puesto").submit(function (event) {
            event.preventDefault(); //almacena los datos sin refrescar el sitio
            modificar_info_puesto();
        });
    });
});

function modificar_info_puesto(){
    var m_puesto = document.getElementById("m_te_puesto").value;
    var m_sueldo_quincenal = document.getElementById("m_sueldo_quincenal").value;
    var m_dl_do = document.getElementById("m_dl_Do").checked;
    var m_dl_lu = document.getElementById("m_dl_Lu").checked;
    var m_dl_ma = document.getElementById("m_dl_Ma").checked;
    var m_dl_mi = document.getElementById("m_dl_Mi").checked;
    var m_dl_ju = document.getElementById("m_dl_Ju").checked;
    var m_dl_vi = document.getElementById("m_dl_Vi").checked;
    var m_dl_sa = document.getElementById("m_dl_Sa").checked;
    let errores = [""];
    let datos = "";

    if(m_puesto == ""){ 
        errores.push('◾ Puesto ');
    } 
    if(m_sueldo_quincenal == ""){ 
        errores.push('◾ Sueldo quincenal ');
    } 
    if(m_dl_do == false && m_dl_lu == false && m_dl_ma == false && m_dl_mi == false && m_dl_ju == false && m_dl_vi == false && m_dl_sa == false){ 
        errores.push('◾ Dias trabajo ');
    } 

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        let dias = [""];
        let dl ="";

        if(m_dl_do == true){
            dias.push('Do');
        }
        if(m_dl_lu == true){
            dias.push('Lu');
        }
        if(m_dl_ma == true){
            dias.push('Ma');
        }
        if(m_dl_mi == true){
            dias.push('Mi');
        }
        if(m_dl_ju == true){
            dias.push('Ju');
        }
        if(m_dl_vi == true){
            dias.push('Vi');
        }
        if(m_dl_sa == true){
            dias.push('Sa');
        }

        dias.forEach(
            function(elemento, indice, array) {
                dl += dias[indice] + " ";
            }
        );

        const Datos_puesto = {
            id_tipo_empleado: $('#m_id_tipo_empleado').val(),
            te_puesto: $('#m_te_puesto').val(),
            sueldo_quincenal: $('#m_sueldo_quincenal').val(),
            dias_trabajo: dl,
        };

        var dato = $("#modificar_puesto").serialize();
        console.log(dato);

        $.ajax({
            url: 'bd/update_puesto.php',
            type: 'POST',
            data: Datos_puesto, 
        }).done(function(data) {
            console.log(data);

            if(data === "Modificado"){
                $(document).ajaxSuccess(function(){
                    alert("Puesto modificado con éxito :D");
                    window.location.reload();
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


