$('#table_catalogo tr').on('click', function(event){
    event.preventDefault();
    var cat_pan = $(this).find('td:nth-child(2)').html();
    var cat_estatus = $(this).find('td:nth-child(5)').html();
    var accion;
    console.log(cat_pan);
    console.log(cat_estatus);

    $(document).ready(function(){
        $('#table_catalogo a').click(function(){
            accion = $(this).attr('id');
            console.log(accion);

            if(accion == "habilitar_pan" || accion == "inhabilitar_pan"){
                cambiar_catalogo(cat_pan, cat_estatus);
            }
        });
    });
});

function cambiar_catalogo(cat_pan, cat_estatus){
    let Datos_catalogo;

    if(cat_estatus == "Vigente"){
        Datos_catalogo = {
            pan: cat_pan,
            estatus: 0
        };
    }
    if(cat_estatus == "No vigente"){
        Datos_catalogo = {
            pan: cat_pan,
            estatus: 1
        };
    }

    console.log(Datos_catalogo);

    $.ajax({
        url: 'bd/estatus_catalogo.php',
        type: 'POST',
        data: Datos_catalogo,//lo que se va a pasar 
    }).done(function(data) {
        console.log(data);

        if(data === "Pan Vigente"){
            alert("Pan habilitado :D");
            window.location.reload();
        }
        if(data === "Pan No vigente"){
            alert("Pan inhabilitado :D");
            window.location.reload();
        }

     }).fail(function() {
        console.log("Error al enviar");
    });
}
