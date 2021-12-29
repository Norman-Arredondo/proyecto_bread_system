$('#table_materia_prima tr').on('click', function(event){
    event.preventDefault();
    var nombre_mp = $(this).find('td:nth-child(2)').html();
    var estatus = $(this).find('td:nth-child(6)').html();
    var accion;
    console.log(nombre_mp);
    console.log(estatus);

    $(document).ready(function(){
        $('#table_materia_prima a').click(function(){
            accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar_mp" || accion == "inhabilitar_mp"){
                cambiar_mp(nombre_mp, estatus);
            } 
        });
    });
});


function cambiar_mp(nombre_mp, estatus){
    let Datos_materia;

    if(estatus == "Vigente"){
        Datos_materia = {
            nombre_mp: nombre_mp,
            estatus: 0
        };
    }
    if(estatus == "No vigente"){
        Datos_materia = {
            nombre_mp: nombre_mp,
            estatus: 1
        };
    }

    $.ajax({
        url: 'bd/estatus_materia_prima.php',
        type: 'POST',
        data: Datos_materia,//lo que se va a pasar 
    }).done(function(data) {
        console.log(data);

        if(data === "MP Vigente"){
            $(document).ajaxSuccess(function(){
                alert("Materia prima habilitada :D");
                window.location.reload();
            });
        }
        if(data === "MP No vigente"){
            $(document).ajaxSuccess(function(){
                alert("Materia prima inhabilitada :D");
                window.location.reload();
            });
        }

     }).fail(function() {
        console.log("Error al enviar");
    });
}