$(document).ready(function () {
    $("#index").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        consultar();
    });
});

function consultar(){
    var rfc_empleado = document.getElementById("rfc_empleado").value;
    var contrasenia = document.getElementById("contrasenia").value;
    let errores = [""];
    let datos = "";

    if(rfc_empleado == ""){ 
        errores.push('◾ RFC empleado ');
    } 
    if(contrasenia == ""){ 
        errores.push('◾ Contraseña ');
    } 

    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        const Datos_usuario = {
            rfc_empleado: $('#rfc_empleado').val(),
            contrasenia: $('#contrasenia').val()
        };
        console.log(Datos_usuario);
        var dato = $("#index").serialize();
        console.log(dato);
        $.ajax({
            url: 'bd/select_index.php',
            type: 'POST',
            data: Datos_usuario,
        }).done(function(data) {
            console.log(data);

            if(data === "Acceso concedido"){
                $(document).ajaxSuccess(function(){
                    alert("Bienvenido :D");
                    window.location.href = "principal.php";
                });
            }
            if(data === "Acceso denegado"){
                alert("Error al ingresar, verifique sus datos.");
                window.location.reload();
            }
            if(data === "Usuario inhabilitado"){
                alert("Usuario inhabilitado.");
                window.location.reload();
            }
         }).fail(function() {
            console.log("Error al enviar");
        });
    }
}

