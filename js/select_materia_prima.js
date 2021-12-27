$(document).ready(function () {
    $("#almacen").submit(function (event) {
        event.preventDefault(); //almacena los datos sin refrescar el sitio
        consultar_mp();
    });
});

function consultar_mp(){
    var nombre_mp = document.getElementById("nombre_mp").value;
    let errores = [""];
    let datos = "";

    if(nombre_mp == ""){ 
        errores.push('◾ Nombre del Producto ');
    } 
    
    if(errores.length>1){
        errores.forEach(
            function(elemento, indice, array) {
                datos += errores[indice] + "\n";
            }
        );
        alert("Ingrese los datos faltantes: " + datos);
    } else{
        const Datos_materia_almacen = {
            nombre_mp: $('#nombre_mp').val(),
        };
        console.log(Datos_materia_almacen);
        var dato = $("#almacen").serialize();
        console.log(dato);
        $.ajax({
            url: 'bd/select_almacen.php',
            type: 'POST',
            data: Datos_materia_almacen,
        }).done(function(data) {
            console.log(data);

            if(data === "Acceso concedido"){
                $(document).ajaxSuccess(function(){
                    alert("Bienvenido :D");
                    window.location.href = "principal.php";
                });
            }
            if(data === "Acceso denegado"){
                $(document).ajaxSuccess(function(){
                    alert("Error al ingresar, verifique sus datos.");
                    window.location.reload();
                });
            }
            if(data === "Usuario inhabilitado"){
                $(document).ajaxSuccess(function(){
                    alert("Usuario inhabilitado.");
                    window.location.reload();
                });
            }

         }).fail(function() {
            console.log("Error al enviar");
        });
    }
}

