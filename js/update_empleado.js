$('#table_empleado tr').on('click', function(event){
    event.preventDefault();
    var rfc_empleado = $(this).find('td:nth-child(2)').html();
    var puesto = $(this).find('td:nth-child(3)').html();
    var contrasenia = $(this).find('td:nth-child(4)').html();
    var hora_entrada = $(this).find('td:nth-child(5)').html();
    var hora_salida = $(this).find('td:nth-child(6)').html();
    var nombre = $(this).find('td:nth-child(7)').html();
    var apellido_p = $(this).find('td:nth-child(8)').html();
    var apellido_m = $(this).find('td:nth-child(9)').html();
    var telefono = $(this).find('td:nth-child(10)').html();
    var edad = $(this).find('td:nth-child(11)').html();
    var sexo = $(this).find('td:nth-child(12)').html();
    var calle = $(this).find('td:nth-child(13)').html();
    var colonia = $(this).find('td:nth-child(14)').html();
    var alcaldia = $(this).find('td:nth-child(15)').html();
    var no_interior = $(this).find('td:nth-child(16)').html();
    var no_exterior = $(this).find('td:nth-child(17)').html();
    var codigo_postal = $(this).find('td:nth-child(18)').html();
    
    $('#m_rfc_empleado').val(rfc_empleado);
    $('#m_e_puesto option:contains(' + puesto + ')').attr('selected', true);
    $('#m_contrasenia').val(contrasenia);
    $('#m_hora_entrada').val(hora_entrada);
    $('#m_hora_salida').val(hora_salida);
    $('#m_nombre').val(nombre);
    $('#m_apellido_p').val(apellido_p);
    $('#m_apellido_m').val(apellido_m);
    $('#m_telefono').val(telefono);
    $('#m_edad').val(edad);
    $('#m_sexo').val(sexo);
    $('#m_calle').val(calle);
    $('#m_colonia').val(colonia);
    $('#m_alcaldia').val(alcaldia);
    $('#m_no_interior').val(no_interior);
    $('#m_no_exterior').val(no_exterior);
    $('#m_codigo_postal').val(codigo_postal); 

    $(document).ready(function () {
        $("#modificar_empleado").submit(function (event) {
            event.preventDefault(); //almacena los datos sin refrescar el sitio
            modificar_info_empleado();
        });
    });
});

function modificar_info_empleado(){
    var m_rfc_empleado = document.getElementById("m_rfc_empleado").value;
    var m_e_puesto = document.getElementById("m_e_puesto");
        var m_puesto = m_e_puesto.options[m_e_puesto.selectedIndex].text;
    var m_contrasenia = document.getElementById("m_contrasenia").value;
    var m_hora_entrada = document.getElementById("m_hora_entrada").value;
    var m_hora_salida = document.getElementById("m_hora_salida").value;
    var m_nombre = document.getElementById("m_nombre").value;
    var m_apellido_p = document.getElementById("m_apellido_p").value;
    var m_apellido_m = document.getElementById("m_apellido_m").value;
    var m_telefono = document.getElementById("m_telefono").value;
    var m_edad = document.getElementById("m_edad").value;
    var m_sexo = document.getElementById("m_sexo");
        var m_sex = sexo.options[m_sexo.selectedIndex].text;
    var m_calle = document.getElementById("m_calle").value;
    var m_colonia = document.getElementById("m_colonia").value;
    var m_alcaldia = document.getElementById("m_alcaldia").value;
    var m_no_interior = document.getElementById("m_no_interior").value;
    var m_no_exterior = document.getElementById("m_no_exterior").value;
    var m_codigo_postal = document.getElementById("m_codigo_postal").value;
    let errores = [""];
    let datos = "";

    if(m_rfc_empleado == ""){ 
        errores.push('◾ RFC empleado ');
    } 
    if(m_puesto == "Puesto"){ 
        errores.push('◾ Puesto ');
    } 
    if(m_contrasenia == ""){ 
        errores.push('◾ Contraseña ');
    } 
    if(m_hora_entrada == ""){ 
        errores.push('◾ Hora entrada ');
    } 
    if(m_hora_salida == ""){ 
        errores.push('◾ Hora salida ');
    } 
    if(m_nombre == ""){ 
        errores.push('◾ Nombre ');
    } 
    if(m_apellido_p == ""){ 
        errores.push('◾ Apellido paterno ');
    } 
    if(m_apellido_m == ""){ 
        errores.push('◾ Apellido materno ');
    }
    if(m_telefono == ""){ 
        errores.push('◾ Telefono ');
    } 
    if(m_edad == ""){ 
        errores.push('◾ Edad ');
    } 
    if(m_sex == "Sexo"){ 
        errores.push('◾ Sexo ');
    }
    if(m_calle == ""){ 
        errores.push('◾ Calle ');
    } 
    if(m_colonia == ""){ 
        errores.push('◾ Colonia ');
    } 
    if(m_alcaldia == ""){ 
        errores.push('◾ Alcaldia ');
    } 
    if(m_no_interior == ""){ 
        errores.push('◾ Num. interior ');
    } 
    if(m_no_exterior == ""){ 
        errores.push('◾ Num. exterior ');
    } 
    if(m_codigo_postal == ""){ 
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
            rfc_empleado: $('#m_rfc_empleado').val(),
            e_puesto: $('#m_e_puesto').val(),
            contrasenia: $('#m_contrasenia').val(),
            hora_entrada: $('#m_hora_entrada').val(),
            hora_salida: $('#m_hora_salida').val(),
            nombre: $('#m_nombre').val(),
            apellido_p: $('#m_apellido_p').val(),
            apellido_m: $('#m_apellido_m').val(),
            telefono: $('#m_telefono').val(),
            edad: $('#m_edad').val(),
            sexo: $('#m_sexo').val(),
            calle: $('#m_calle').val(),
            colonia: $('#m_colonia').val(),
            alcaldia: $('#m_alcaldia').val(),
            no_interior: $('#m_no_interior').val(),
            no_exterior: $('#m_no_exterior').val(),
            codigo_postal: $('#m_codigo_postal').val()
        };
        var dato = $("#modificar_empleado").serialize(); 
        console.log(dato);
        $.ajax({
            url: 'bd/update_empleado.php',
            type: 'POST',
            data: Datos_empleado, //lo que se va a pasar    
        }).done(function(data) {
            console.log(data);

            if(data === "Modificado"){
                alert("Empleado modificado con éxito :D");
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