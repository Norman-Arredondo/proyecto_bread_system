<?php
    include("templates/menu.php");
    include("bd/select_puntos_venta.php");
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Ventas</h3>
            <div class="card shadow mb-3">
                <form>
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Venta</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Clave de venta</strong></label><input class="form-control" type="text" id="cve_vta" name="cve_vta"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="pto_vta"><strong>Punto de venta</strong></label>
                                        <select class="form-select" id="pto_vta" name="pto_vta">
                                            <option value="Puesto "select>Punto</option>
                                            <?php
                                                $pto_vta = new puntos_venta();
                                                $pto_vta->recuperar_puntos();
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Fecha</strong></label><input class="form-control" type="date" id="fecha" name="fecha"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Gastos</strong></label><input class="form-control" type="number" id="gastos" name="gastos"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Importe venta</strong></label><input class="form-control" type="number" id="importe_venta" name="importe_venta"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>RFC del empleado</strong></label><input class="form-control" type="text" id="rfc_empleado" name="rfc_empleado"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Detalle de Venta</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>ID Producción</strong></label><input class="form-control" type="text" id="id_produccion" name="id_produccion"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="pan" name="pan" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas entregadas</strong></label><input class="form-control" type="number" id="piezas_entregadas" name="piezas_entregadas" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas devueltas</strong></label><input class="form-control" type="number" id="piezas_devueltas" name="piezas_devueltas" min="1"></div>
                            </div>
                            <div class="col text-center">
                                <div class="mb-3"><label class="form-label" for=""><strong>Agregar</strong></label><button class="btn btn-outline-info form-control" type="submit" id="btn_agregar_venta" name="btn_agregar_venta"><strong>+</strong></button></div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="table_pto_vta">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Acciones</th>
                                            <th>ID Producción</th>
                                            <th>Pan</th>
                                            <th>Piezas entregadas</th>
                                            <th>Piezas devueltas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /*
                                            $pto_vta = new pto_vta();
                                            $pto_vta->recuperar();
                                            */
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>Acciones</strong></td>
                                            <td><strong>ID Producción</strong></td>
                                            <td><strong>Pan</strong></td>
                                            <td><strong>Piezas entregadas</strong></td>
                                            <td><strong>Piezas devueltas</strong></td>
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
                    <p class="text-primary m-0 fw-bold">Criterio de búsqueda</p>
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
                                <table class="table my-0" id="">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Clave de venta</th>
                                            <th>Clave punto de venta</th>
                                            <th>Fecha</th>
                                            <th>Gastos</th>
                                            <th>Importe de venta</th>
                                            <th>RFC del empleado</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /*
                                            $pto_vta = new pto_vta();
                                            $pto_vta->recuperar();
                                            */
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>Clave de venta</strong></td>
                                            <td><strong>Clave punto de venta</strong></td>
                                            <td><strong>Fecha</strong></td>
                                            <td><strong>Gastos</strong></td>
                                            <td><strong>Importe de venta</strong></td>
                                            <td><strong>RFC del empleado</strong></td>
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

    <!--

            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Ventas Registradas</p>
                </div>
                <form id="" action="" method="POST">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col mt-2 mb-2">
                            </div>
                            <div class="col mt-2 mb-2 text-center">
                                <label class="form-label"><strong>Clave de venta</strong></label>
                                <input class="form-control" type="text" id="" name="">
                            </div>
                            <div class="col mt-2 mb-2 text-center">
                                <label class="form-label"><strong>Punto de venta</strong></label>
                                <input class="form-control" type="text" id="" name="">
                            </div>
                            <div class="col mt-2 mb-2">
                                <div class="col mt-3 mb-2">
                                    <button class="btn btn-dark btn-sm" type="submit">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Fecha</strong></label><input class="form-control" type="date" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Gastos</strong></label><input class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Importe de venta</strong></label><input class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>RFC del empleado</strong></label><input  class="form-control" type="text" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Estatus</strong></label><input class="form-control" type="number" id="" name=""></div>
                            </div>
                        </div>

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
                                <table class="table my-0" id="">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Producción</th>
                                            <th>Pan</th>
                                            <th>Piezas entregadas</th>
                                            <th>Piezas devueltas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    /*
                                            $pto_vta = new pto_vta();
                                            $pto_vta->recuperar();
                                            */
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>No</strong></td>
                                            <td><strong>Producción</strong></td>
                                            <td><strong>Pan</strong></td>
                                            <td><strong>Piezas entregadas</strong></td>
                                            <td><strong>Piezas devueltas</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-dark btn-sm" type="submit">Cambiar estatus</button>
                            <button class="btn btn-dark btn-sm" type="submit">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>

-->

    <!-- Modal detalle Venta 
    <div class="modal" id="ediar_venta" name="ediar_venta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            -->
            <!-- Modal content
            <form id="modificar_venta" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar venta</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cerrar_vta" name="cerrar_vta" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label pan" for=""><strong>Clave de venta:</strong></label><input class="form-control" type="text" id="m_pan" name="m_pan" readonly="readonly">
                                </div>
                                <div class="col">
                                    <label class="form-label" for=""><strong>text:</strong></label><input class="form-control" type="number" id="m_piezas" name="m_piezas" min="1">
                                </div>
                                <div class="col">
                                    <strong><label class="form-label">text:</label></strong><input class="form-control" id="m_descripcion" name="m_descripcion" rows="">
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
                                    <div class="mb-3"><label class="form-label" for=""><strong>Agregar</strong></label><button class="btn btn-outline-info form-control" type="submit" id="mr_agregar_vta" name="mr_agregar_vta"><strong>+</strong></button></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label"><strong>Receta:</strong></label>
                                    <table class="table my-0" id="table_detalle_venta">
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
-->

    <?php
    include("templates/footer.php");
    ?>

    <script>
        $(document).ready(function() {
            $("#btn_agregar_venta").on('click', function(event) {
                console.log('Ha hecho click sobre el boton agregar');
                event.preventDefault();
                new recibe_ventas();
            });
            $("#mr_agregar_vta").on('click', function(event) {
                console.log('Ha hecho click sobre el boton del modal agregar venta');
                event.preventDefault();
                new mr_recibe_ventas();
            });
        });

        function recibe_ventas() {
            var ri_id_produccion = document.getElementById('id_produccion').value;
            var ri_pan = document.getElementById('pan').value;
            var ri_piezas_entregadas = document.getElementById('piezas_entregadas').value;
            var ri_piezas_devueltas = document.getElementById('piezas_devueltas').value;
            
            let errores = [""];
            let datos = "";

            if (ri_id_produccion == "") {
                errores.push('◾ ID Producción ');
            }
            if (ri_pan == "") {
                errores.push('◾ Pan ');
            }
            if (ri_piezas_entregadas == "") {
                errores.push('◾ Piezas entregadas ');
            }
            if (ri_piezas_devueltas == "") {
                errores.push('◾ Piezas devueltas ');
            }

            if (errores.length > 1) {
                errores.forEach(
                    function(elemento, indice, array) {
                        datos += errores[indice] + "\n";
                    }
                );
                alert("Ingrese los datos faltantes: " + datos);
            } else {
                var fila = "<tr style='text-align: center;'>" +
                    "<td NOWRAP>" +
                    "<a href='javascript:void(0)' id='borrar_venta' name='borrar_venta'><i class='fas fa-trash' style='color: darkslateblue;'></i></a>" +
                    "</td>" +
                    "<td NOWRAP>" + ri_id_produccion + "</td>" +
                    "<td NOWRAP> " + ri_pan + "</td>" +
                    "<td>" + ri_piezas_entregadas + "</td>" +
                    "<td>" + ri_piezas_devueltas + "</td>" +
                    "</tr>";

                $('#table_pto_vta tbody').append(fila);
                $('#id_produccion').val('');
                $('#pan').val('');
                $('#piezas_entregadas').val('');
                $('#piezas_devueltas').val('');

                new quitar_venta();
            }
        }

        function quitar_venta(){
            $('#table_pto_vta tr').on('click', function(event){
                $(document).ready(function(){
                    $('#table_pto_vta a').click(function(){
                        accion = $(this).attr('id');
                        $(this).closest('tr').remove();   
                    });
                });
            });
        }

        function mr_recibe_ventas(){
            var mri_id_produccion = document.getElementById('mr_id_produccion').value;
            var mri_pan = document.getElementById('mr_pan').value;
            var mri_piezas_entregadas = document.getElementById('mr_piezas_entregadas').value;
            var mri_piezas_devueltas = document.getElementById('mr_piezas_devueltas').value;
            let errores = [""];
            let datos = "";

            if(mri_id_produccion == ""){ 
                errores.push('◾ ID Producción');
            }  
            if(mri_pan == ""){ 
                errores.push('◾ Pan ');
            } 
            if(mri_piezas_entregadas == ""){ 
                errores.push('◾ Piezas entregadas ');
            }
            if(mri_piezas_devueltas == ""){ 
                errores.push('◾ piezas devueltas ');
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
                                "<td NOWRAP>" + mri_id_produccion + "</td>" +    
                                "<td NOWRAP> " + mri_pan + "</td>" + 
                                "<td>" + mri_piezas_entregadas + "</td>" + 
                                "<td>" + mri_piezas_devueltas + "</td>" + 
                                "<td> Vigente </td>" + 
                            "</tr>";

                $('#table_receta tbody').append(fila);
                $('#mr_id_produccion').val('');
                $('#mr_pan').val('');
                $('#mr_piezas_entregadas').val('');
                $('#mr_piezas_devueltas').val('');
            }
        }
    </script>