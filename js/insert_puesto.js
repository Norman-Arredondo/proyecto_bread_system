$(document).ready(function () {
        $("#puesto").submit(function (event) {
            event.preventDefault(); //almacena los datos sin refrescar el sitio
            registrar_puesto();
        });
    });

    function registrar_puesto(){
        var id_tipo_empleado = document.getElementById("id_tipo_empleado").value;
        var puesto = document.getElementById("te_puesto").value;
        var sueldo_quincenal = document.getElementById("sueldo_quincenal").value;
        var dl_do = document.getElementById("Do").checked;
        var dl_lu = document.getElementById("Lu").checked;
        var dl_ma = document.getElementById("Ma").checked;
        var dl_mi = document.getElementById("Mi").checked;
        var dl_ju = document.getElementById("Ju").checked;
        var dl_vi = document.getElementById("Vi").checked;
        var dl_sa = document.getElementById("Sa").checked;
        let errores = [""];
        let datos = "";

        if(id_tipo_empleado == ""){ 
            errores.push('◾ ID puesto ');
        } 
        if(puesto == ""){ 
            errores.push('◾ Puesto ');
        } 
        if(sueldo_quincenal == ""){ 
            errores.push('◾ Sueldo quincenal ');
        } 
        if(dl_do == false && dl_lu == false && dl_ma == false && dl_mi == false && dl_ju == false && dl_vi == false && dl_sa == false){ 
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

            if(dl_do == true){
                dias.push('Do');
            }
            if(dl_lu == true){
                dias.push('Lu');
            }
            if(dl_ma == true){
                dias.push('Ma');
            }
            if(dl_mi == true){
                dias.push('Mi');
            }
            if(dl_ju == true){
                dias.push('Ju');
            }
            if(dl_vi == true){
                dias.push('Vi');
            }
            if(dl_sa == true){
                dias.push('Sa');
            }
            if(dl_do == true){
                dias.push('Do');
            }

            dias.forEach(
                function(elemento, indice, array) {
                    dl += dias[indice] + " ";
                }
            );

            const Datos_puesto = {
                id_tipo_empleado: $('#id_tipo_empleado').val(),
                te_puesto: $('#te_puesto').val(),
                sueldo_quincenal: $('#sueldo_quincenal').val(),
                dias_trabajo: dl
            };
            console.log(Datos_puesto);
            var dato = $("#puesto").serialize();
            console.log(dato);
            $.ajax({
                url: 'bd/insert_puesto.php',
                type: 'POST',
                data: Datos_puesto,
            }).done(function(data) {
                console.log(data);

                if(data === "Guardado"){
                    alert("Puesto registrado con éxito :D");
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
    