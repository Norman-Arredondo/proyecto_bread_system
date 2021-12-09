    $(document).ready(function () {
        $("#punto_venta").submit(function (event) {
            event.preventDefault(); //almacena los datos sin refrescar el sitio
            registrar();
        });
    });

    function registrar(){
        var cve_pto = document.getElementById("cve_pto").value;
        var pto_vta = document.getElementById("pto_vta").value;
        var calle = document.getElementById("calle").value;
        var colonia = document.getElementById("colonia").value;
        var no_interior = document.getElementById("no_interior").value;
        var no_exterior = document.getElementById("no_exterior").value;
        var alcaldia = document.getElementById("alcaldia").value;
        var codigo_postal = document.getElementById("codigo_postal").value;
        let errores = [""];
        let datos = "";

        if(cve_pto == ""){ 
            errores.push('◾ Clave punto ');
        } 
        if(pto_vta == ""){ 
            errores.push('◾ Punto de venta ');
        } 
        if(calle == ""){ 
            errores.push('◾ Calle ');
        } 
        if(colonia == ""){ 
            errores.push('◾ Colonia ');
        } 
        if(no_interior == ""){ 
            errores.push('◾ Num. interior ');
        } 
        if(no_exterior == ""){ 
            errores.push('◾ Num. exterior ');
        } 
        if(alcaldia == ""){ 
            errores.push('◾ Alcaldia ');
        } 
        if(codigo_postal == ""){ 
            errores.push('◾ Codigo postal ');
        } 

        if(errores.length>1){
            errores.forEach(
                function(elemento, indice, array) {
                    datos += errores[indice] + "\n";
                }
            );
            alert("Ingrese los datos faltantes: " + datos);
        } else{
            const Datos_pto_vta = {
                pto_vta: $('#pto_vta').val(),
                cve_pto: $('#cve_pto').val(),
                calle: $('#calle').val(),
                colonia: $('#colonia').val(),
                no_interior: $('#no_interior').val(),
                no_exterior: $('#no_exterior').val(),
                alcaldia: $('#alcaldia').val(),
                codigo_postal: $('#codigo_postal').val()
            };
            //console.log(Datos_pto_vta);
            var dato = $("#punto_venta").serialize(); //serialize toma los datos que introdusca el usuario y los convierte en u arreglo
            console.log(dato);
            $.ajax({
                url: 'bd/insert_punto_venta.php',
                type: 'POST',
                data: Datos_pto_vta, //lo que se va a pasar    
            }).done(function(data) {
                console.log(data);

                if(data === "Guardado"){
                    $(document).ajaxSuccess(function(){
                        alert("Punto de venta registrado con éxito :D");
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
    