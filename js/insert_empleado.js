$(document).ready(function () {
        $("#empleado").submit(function (event) {
            event.preventDefault(); //almacena los datos sin refrescar el sitio
            registrar_empleado();
        });
    });

    function registrar_empleado(){
        var rfc_empleado = document.getElementById("rfc_empleado").value;
        var e_puesto = document.getElementById("e_puesto");
            var puesto = e_puesto.options[e_puesto.selectedIndex].text;
        var contrasenia = document.getElementById("contrasenia").value;
        var hora_entrada = document.getElementById("hora_entrada").value;
        var hora_salida = document.getElementById("hora_salida").value;
        var nombre = document.getElementById("nombre").value;
        var apellido_p = document.getElementById("apellido_p").value;
        var apellido_m = document.getElementById("apellido_m").value;
        var telefono = document.getElementById("telefono").value;
        var edad = document.getElementById("edad").value;
        var sexo = document.getElementById("sexo");
            var sex = sexo.options[sexo.selectedIndex].text;
        var calle = document.getElementById("calle").value;
        var colonia = document.getElementById("colonia").value;
        var alcaldia = document.getElementById("alcaldia").value;
        var no_interior = document.getElementById("no_interior").value;
        var no_exterior = document.getElementById("no_exterior").value;
        var codigo_postal = document.getElementById("codigo_postal").value;
        let errores = [""];
        let datos = "";

        if(rfc_empleado == ""){ 
            errores.push('◾ RFC empleado ');
        } 

        if(puesto == "Puesto"){ 
            errores.push('◾ Puesto ');
        } 

        if(contrasenia == ""){ 
            errores.push('◾ Contraseña ');
        } 
        if(hora_entrada == ""){ 
            errores.push('◾ Hora entrada ');
        } 
        if(hora_salida == ""){ 
            errores.push('◾ Hora salida ');
        } 
        if(nombre == ""){ 
            errores.push('◾ Nombre ');
        } 
        if(apellido_p == ""){ 
            errores.push('◾ Apellido paterno ');
        } 
        if(apellido_m == ""){ 
            errores.push('◾ Apellido materno ');
        }
        if(telefono == ""){ 
            errores.push('◾ Telefono ');
        } 
        if(edad == ""){ 
            errores.push('◾ Edad ');
        } 
        if(sex == "Sexo"){ 
            errores.push('◾ Sexo ');
        }
        if(calle == ""){ 
            errores.push('◾ Calle ');
        } 
        if(colonia == ""){ 
            errores.push('◾ Colonia ');
        } 
        if(alcaldia == ""){ 
            errores.push('◾ Alcaldia ');
        } 
        if(no_interior == ""){ 
            errores.push('◾ Num. interior ');
        } 
        if(no_exterior == ""){ 
            errores.push('◾ Num. exterior ');
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
            const Datos_empleado = {
                rfc_empleado: $('#rfc_empleado').val(),
                e_puesto: $('#e_puesto').val(),
                contrasenia: $('#contrasenia').val(),
                hora_entrada: $('#hora_entrada').val(),
                hora_salida: $('#hora_salida').val(),
                nombre: $('#nombre').val(),
                apellido_p: $('#apellido_p').val(),
                apellido_m: $('#apellido_m').val(),
                telefono: $('#telefono').val(),
                edad: $('#edad').val(),
                sexo: $('#sexo').val(),
                calle: $('#calle').val(),
                colonia: $('#colonia').val(),
                alcaldia: $('#alcaldia').val(),
                no_interior: $('#no_interior').val(),
                no_exterior: $('#no_exterior').val(),
                codigo_postal: $('#codigo_postal').val()
            };
            var dato = $("#empleado").serialize(); 
            console.log(dato);
            $.ajax({
                url: 'bd/insert_empleado.php',
                type: 'POST',
                data: Datos_empleado, //lo que se va a pasar    
            }).done(function(data) {
                console.log(data);

                if(data === "Guardado"){
                    $(document).ajaxSuccess(function(){
                        alert("Empleado registrado con éxito :D");
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