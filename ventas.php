<?php
include("templates/menu.php");
include("bd/select_puntos_venta.php");
include("bd/select_venta.php");
error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Ventas</h3>
            <div class="card shadow mb-3">
                <form id="venta" action="" method="POST">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Venta</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Clave venta (VTA-#####)</strong></label><input class="form-control" type="text" id="cve_vta" name="cve_vta"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="pto_vta"><strong>Punto de venta</strong></label>
                                    <select class="form-select" id="pto_vta" name="pto_vta">
                                        <option value="Puesto " select>Punto</option>
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
                                <div class="mb-3"><label class="form-label"><strong>Importe venta</strong></label><input class="form-control" type="number" id="importe_venta" name="importe_venta" min="1" step="any"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>RFC del empleado</strong></label><input class="form-control" type="text" id="rfc_empleado" name="rfc_empleado" maxlength="13"></div>
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
                                <table class="table my-0" id="table_det_vta">
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
                    <p class="text-primary m-0 fw-bold">Ventas registradas</p>
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
                                <table class="table my-0" id="table_venta">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Acciones</th>
                                            <th>Clave de venta</th>
                                            <th>Punto de venta</th>
                                            <th>Fecha</th>
                                            <th>Gastos</th>
                                            <th>Importe de venta</th>
                                            <th>RFC empleado</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $venta = new venta();
                                        $venta->recuperar_venta();
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>Acciones</strong></td>
                                            <td><strong>Clave de venta</strong></td>
                                            <td><strong>Punto de venta</strong></td>
                                            <td><strong>Fecha</strong></td>
                                            <td><strong>Gastos</strong></td>
                                            <td><strong>Importe de venta</strong></td>
                                            <td><strong>RFC empleado</strong></td>
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

    <!-- Modal detalle venta -->

    <div class="modal" id="editar_venta" name="editar_venta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <Modal content <form id="modificar_venta" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar venta</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cerrar_vta" name="cerrar_vta" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label pan" for=""><strong>Clave de venta:</strong></label><input class="form-control" type="text" id="m_cve_vta" name="m_cve_vta" readonly="readonly">
                                </div>
                                <div class="col">
                                    <label class="form-label" for=""><strong>Punto de venta:</strong></label><input class="form-control" type="text" id="m_pto_vta" name="m_pto_vta" readonly="readonly">
                                </div>
                                <div class="col">
                                    <strong><label class="form-label">Fecha: </label></strong><input class="form-control" type="date" id="m_fecha" name="m_fecha" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"><strong>Gastos:</strong></label><input class="form-control" type="number" id="m_gastos" name="m_gastos"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"><strong>Importe venta:</strong></label><input class="form-control" type="number" id="m_importe_venta" name="m_importe_venta" min="1" step="any"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"><strong>RFC del empleado:</strong></label><input class="form-control" type="text" id="m_rfc_empleado" name="m_rfc_empleado" maxlength="13"></div>
                                </div>
                                <div class="col">
                                    <br>
                                    <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_ver_detalle" name="btn_ver_detalle">Ver detalle</button>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>ID Producción</strong></label><input class="form-control" type="text" id="m_id_produccion" name="m_id_produccion"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="pan" name="pan" min="1"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Piezas entregadas</strong></label><input class="form-control" type="number" id="m_piezas_entregadas" name="m_piezas_entregadas" min="1"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Piezas devueltas</strong></label><input class="form-control" type="number" id="m_piezas_devueltas" name="m_piezas_devueltas" min="1"></div>
                                <div class="col text-center">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Agregar</strong></label><button class="btn btn-outline-info form-control" type="submit" id="mr_agregar_vta" name="mr_agregar_vta"><strong>+</strong></button></div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col">
                                    <label class="form-label"><strong>Receta:</strong></label>
                                    <table class="table my-0" id="table_detalle_venta">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>ID Producción</th>
                                                <th>Pan</th>
                                                <th>Precio venta</th>
                                                <th>Piezas entregadas</th>
                                                <th>Piezas devueltas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <td><strong>ID Producción</strong></td>
                                                <td><strong>Pan</strong></td>
                                                <td><strong>Precio venta</strong></td>
                                                <td><strong>Piezas entregadas</strong></td>
                                                <td><strong>Piezas devueltas</strong></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar_catalogo" name="btn_modificar_catalogo">Modificar</button>
                    </div>-->
                </div>
                </form>
        </div>
    </div>


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

                $('#table_det_vta tbody').append(fila);
                $('#id_produccion').val('');
                $('#pan').val('');
                $('#piezas_entregadas').val('');
                $('#piezas_devueltas').val('');

                new quitar_venta();
            }
        }

        function quitar_venta() {
            $('#table_pto_vta tr').on('click', function(event) {
                $(document).ready(function() {
                    $('#table_pto_vta a').click(function() {
                        accion = $(this).attr('id');
                        $(this).closest('tr').remove();
                    });
                });
            });
        }

        function mr_recibe_ventas() {
            var mri_id_produccion = document.getElementById('mr_id_produccion').value;
            var mri_pan = document.getElementById('mr_pan').value;
            var mri_piezas_entregadas = document.getElementById('mr_piezas_entregadas').value;
            var mri_piezas_devueltas = document.getElementById('mr_piezas_devueltas').value;
            let errores = [""];
            let datos = "";

            if (mri_id_produccion == "") {
                errores.push('◾ ID Producción');
            }
            if (mri_pan == "") {
                errores.push('◾ Pan ');
            }
            if (mri_piezas_entregadas == "") {
                errores.push('◾ Piezas entregadas ');
            }
            if (mri_piezas_devueltas == "") {
                errores.push('◾ piezas devueltas ');
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

    <script src="js/insert_venta.js"></script>
    <script src="js/update_venta.js"></script>