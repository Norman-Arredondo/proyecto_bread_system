<?php
    include("templates/menu.php");
    include("bd/select_catalogo.php");
    error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Recetario</h3>
            <div class="card shadow mb-3">
                <form id="recetario" action="" method="POST">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Catálogo</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="pan" name="pan"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas</strong></label><input class="form-control" type="number" id="piezas" name="piezas" min="1"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <strong><label class="form-label">Descripción</label></strong>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows=""></textarea>
                        </div>
                    </div>

                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Receta</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Materia prima</strong></label><input class="form-control" type="text" id="nombre_mp" name="nombre_mp"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Cantidad</strong></label><input class="form-control" type="number" id="cantidad" name="cantidad" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Unidad</strong></label><input class="form-control" type="text" id="unidad" name="unidad"></div>
                            </div>
                            <div class="col text-center">
                                <div class="mb-3"><label class="form-label" for=""><strong>Agregar</strong></label><button class="btn btn-outline-info form-control" type="submit" id="agregar_ing" name="agregar_ing"><strong>+</strong></button></div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-nowrap ">
                                </div>
                            </div>

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="table_ingredientes">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Acciones</th>
                                            <th>Materia prima</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>Acciones</strong></td>
                                            <td><strong>Materia prima</strong></td>
                                            <td><strong>Cantidad</strong></td>
                                            <td><strong>Unidad</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3"><button class="btn btn-dark btn-sm" type="submit" style="float: right">Guardar</button></div>
                        <br>
                    </div>
                </form>
            </div>

            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Recetario</p>
                </div>
                <form id="" action="" method="POST">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-nowrap ">
                                    <form id="select_" action="" method="POST">
                                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Mostrar&nbsp;
                                                <select class="d-inline-block form-select form-select-sm" id="opc" name="opc">
                                                    <option value="2" selected="">Todos</option>
                                                    <option value="1">Vigente</option>
                                                    <option value="0">No vigente</option>
                                                </select>&nbsp;</label>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="table_catalogo">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Acciones</th>
                                            <th>Pan</th>
                                            <th>Descripción</th>
                                            <th>Piezas</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $catalogo = new catalogo();
                                            $catalogo->recuperar_catalogo();
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>Acciones</strong></td>
                                            <td><strong>Pan</strong></td>
                                            <td><strong>Descripción</strong></td>
                                            <td><strong>Piezas</strong></td>
                                            <td><strong>Estatus</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal catalogo -->
    <div class="modal" id="editar_catalogo" name="editar_catalogo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Modal content-->
            <form id="modificar_catalogo" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar receta</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cerrar_mp" name="cerrar_mp" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label pan" for="m_pan"><strong>Pan:</strong></label><input class="form-control" type="text" id="m_pan" name="m_pan" readonly="readonly">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="m_piezas"><strong>Piezas:</strong></label><input class="form-control" type="number" id="m_piezas" name="m_piezas" min="1">
                                </div>
                                <div class="col">
                                    <strong><label class="form-label">Descripción:</label></strong><input class="form-control" id="m_descripcion" name="m_descripcion" rows="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_ver_receta" name="btn_ver_receta">Ver receta</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="mr_ingrediente"><strong>Ingrediente:</strong></label><input class="form-control" type="text" id="mr_ingrediente" name="mr_ingrediente"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="mr_cantidad"><strong>Cantidad:</strong></label><input class="form-control" step="any" type="number" id="mr_cantidad" name="mr_cantidad" min="1"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="mr_unidad"><strong>Unidad:</strong></label><input class="form-control" type="text" id="mr_unidad" name="mr_unidad"></div>
                                </div>
                                <div class="col text-center">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Agregar</strong></label><button class="btn btn-outline-info form-control" type="submit" id="mr_agregar_ing" name="mr_agregar_ing"><strong>+</strong></button></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label"><strong>Receta:</strong></label>
                                    <table class="table my-0" id="table_receta">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Acciones</th>
                                                <th>Ingrediente</th>
                                                <th>Cantidad</th>
                                                <th>Unidad</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <td><strong>Acciones</strong></td>
                                                <td><strong>Ingredientes</strong></td>
                                                <td><strong>Cantidad</strong></td>
                                                <td><strong>Unidad</strong></td>
                                                <td><strong>Estatus</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar_catalogo" name="btn_modificar_catalogo">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
    include("templates/footer.php");
?>

    <script>
        $(document).ready(function () {
            $("#agregar_ing").on('click', function(event){
                console.log('Ha hecho click sobre el boton agregar'); 
                event.preventDefault();
                new recibe_ingredientes();
            });
            $("#mr_agregar_ing").on('click', function(event){
                console.log('Ha hecho click sobre el boton del modal agregar'); 
                event.preventDefault();
                new mr_recibe_ingredientes();
            });
        });

        function recibe_ingredientes(){
            var ri_materia_prima = document.getElementById('nombre_mp').value;
            var ri_cantidad = document.getElementById('cantidad').value;
            var ri_unidad = document.getElementById('unidad').value;
            let errores = [""];
            let datos = "";

            if(ri_materia_prima == ""){ 
                errores.push('◾ Materia prima ');
            }  
            if(ri_cantidad == ""){ 
                errores.push('◾ Cantidad ');
            } 
            if(ri_unidad == ""){ 
                errores.push('◾ Unidad ');
            } 

            if(errores.length>1){
                errores.forEach(
                    function(elemento, indice, array) {
                        datos += errores[indice] + "\n";
                    }
                );
                alert("Ingrese los datos faltantes: " + datos);
            } else {
                var fila = "<tr style='text-align: center;'>" + 
                                "<td NOWRAP>" + 
                                    "<a href='javascript:void(0)' id='borrar_ingrediente' name='borrar_ingrediente'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>" + 
                                "</td>" + 
                                "<td NOWRAP>" + ri_materia_prima + "</td>" +    
                                "<td NOWRAP> " + ri_cantidad + "</td>" + 
                                "<td>" + ri_unidad + "</td>" + 
                            "</tr>";

                $('#table_ingredientes tbody').append(fila);
                $('#nombre_mp').val('');
                $('#cantidad').val('');
                $('#unidad').val('');

                new quitar_ingrediente();
            }
        }

        function quitar_ingrediente(){
            $('#table_ingredientes tr').on('click', function(event){
                $(document).ready(function(){
                    $('#table_ingredientes a').click(function(){
                        accion = $(this).attr('id');
                        $(this).closest('tr').remove();   
                    });
                });
            });
        }

        function mr_recibe_ingredientes(){
            var mri_materia_prima = document.getElementById('mr_ingrediente').value;
            var mri_cantidad = document.getElementById('mr_cantidad').value;
            var mri_unidad = document.getElementById('mr_unidad').value;
            let errores = [""];
            let datos = "";

            if(mri_materia_prima == ""){ 
                errores.push('◾ Materia prima ');
            }  
            if(mri_cantidad == ""){ 
                errores.push('◾ Cantidad ');
            } 
            if(mri_unidad == ""){ 
                errores.push('◾ Unidad ');
            } 

            if(errores.length>1){
                errores.forEach(
                    function(elemento, indice, array) {
                        datos += errores[indice] + "\n";
                    }
                );
                alert("Ingrese los datos faltantes: " + datos);
            } else {
                var fila = "<tr style='text-align: center;'>" + 
                                "<td NOWRAP>" + 
                                    "<a href='javascript:void(0)' id='mr_bi' name='mr_bi'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>" + 
                                "</td>" + 
                                "<td NOWRAP>" + mri_materia_prima + "</td>" +    
                                "<td NOWRAP> " + mri_cantidad + "</td>" + 
                                "<td>" + mri_unidad + "</td>" + 
                                "<td> Vigente </td>" + 
                            "</tr>";

                $('#table_receta tbody').append(fila);
                $('#mr_ingrediente').val('');
                $('#mr_cantidad').val('');
                $('#mr_unidad').val('');
            }
        }
    </script>

    <script src="js/insert_recetario.js"></script>
    <script src="js/estatus_catalogo.js"></script>
    <script src="js/update_catalogo.js"></script>
