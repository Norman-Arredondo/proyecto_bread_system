<?php
    include("templates/menu.php");
    include("bd/select_produccion.php");
    error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Producción</h3>
            <div class="card shadow mb-3">
                <form id="produccion" action="" method="POST">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Orden de producción</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>ID (PRD-#####)</strong></label><input class="form-control" type="text" id="id_produccion" name="id_produccion"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Fecha</strong></label><input class="form-control" type="date" id="fecha_produccion" name="fecha_produccion"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>RFC Empleado</strong></label><input class="form-control" type="text" id="rfc_empleado" name="rfc_empleado" maxlength="13"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="pan" name="pan"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas</strong></label><input class="form-control" type="number" id="no_piezas" name="no_piezas" min="1"></div>
                            </div>
                        </div>
                        <div class="mb- mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-dark btn-sm" type="submit" id="btn_calcular_porciones" name="btn_calcular_porciones">Calcular</button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="table_porciones_calculadas">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Ingrediente</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                            <th>Costo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <td><strong>Ingrediente</strong></td>
                                            <td><strong>Cantidad</strong></td>
                                            <td><strong>Unidad</strong></td>
                                            <td><strong>Costo</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Precio de venta</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>ID insumo (INS-#####)</strong></label><input class="form-control" type="text" id="id_insumo" name="id_insumo"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="importe_gas"><strong>Importe gas</strong></label><input class="form-control monto" type="number" id="importe_gas" name="importe_gas" onkeyup="sumar_insumos();" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="importe_luz"><strong>Importe luz</strong></label><input class="form-control monto" type="number" id="importe_luz" name="importe_luz" onkeyup="sumar_insumos();" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="importe_gasolina"><strong>Importe gasolina</strong></label><input class="form-control monto" type="number" id="importe_gasolina" name="importe_gasolina" onkeyup="sumar_insumos();" min="1"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="total_ins"><strong>Total insumos</strong></label><input class="form-control final" type="number" id="total_ins" name="total_ins" readonly="readonly"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Total materia prima</strong></label><input class="form-control final" type="number" id="total_mp" name="total_mp" readonly="readonly"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>% de ganancia</strong></label><input class="form-control" type="number" id="ganancia" name="ganancia" onkeyup="precio_final();" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Precio de venta</strong></label><input class="form-control" type="number" id="precio_venta" name="precio_venta" readonly="readonly"></div>
                            </div>
                        </div>

                        <div class="mb- mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-dark btn-sm" type="submit" id="btn_guardar_produccion" name="btn_guardar_produccion">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--Tabla modificada-->
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Orden de Produccion</p>
                </div>
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
                            <table class="table my-0" id="table_produccion">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>Acciones</th>
                                        <th>ID Producción</th>
                                        <th>Fecha</th>
                                        <th>RFC del empleado</th>
                                        <th>Pan</th>
                                        <th>Piezas</th>
                                        <th>ID insumo</th>
                                        <th>Porcentaje ganancia</th>
                                        <th>Precio de venta</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $produccion = new produccion();
                                        $produccion->recuperar_produccion();
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr style="text-align: center;">
                                        <td><strong>Acciones</strong></td>
                                        <td><strong>ID Producción</strong></td>
                                        <td><strong>Fecha</strong></td>
                                        <td><strong>RFC del empleado</strong></td>
                                        <td><strong>Pan</strong></td>
                                        <td><strong>Piezas</strong></td>
                                        <td><strong>ID insumo</strong></td>
                                        <td><strong>Porcentaje ganancia</strong></td>
                                        <td><strong>Precio de venta</strong></td>
                                        <td><strong>Estatus</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detalle producción -->
    <div class="modal" id="editar_produccion" name="editar_produccion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Modal content-->
            <form id="modificar_produccion" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detalle de producción</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cerrar_produccion" name="cerrar_produccion" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>ID Producción</strong></label><input class="form-control" type="text" id="m_id_produccion" name="m_id_produccion" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Fecha</strong></label><input class="form-control" type="date" id="m_fecha_produccion" name="m_fecha_produccion" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>RFC Empleado</strong></label><input class="form-control" type="text" id="m_rfc_empleado" name="m_rfc_empleado" maxlength="13" readonly="readonly"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="m_pan" name="pan" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Piezas</strong></label><input class="form-control" type="number" id="m_no_piezas" name="no_piezas" min="1" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <br>
                                    <button class="btn btn-dark btn-sm" type="submit" id="btn_ver_detalle" name="btn_ver_detalle">Ver detalle</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label"><strong>Porciones:</strong></label>
                                    <table class="table my-0" id="table_mp_produccion">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Ingrediente</th>
                                                <th>Cantidad</th>
                                                <th>Unidad</th>
                                                <th>Costo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <td><strong>Ingrediente</strong></td>
                                                <td><strong>Cantidad</strong></td>
                                                <td><strong>Unidad</strong></td>
                                                <td><strong>Costo</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>ID insumo</strong></label><input class="form-control" type="text" id="m_id_insumo" name="m_id_insumo" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="importe_gas"><strong>Importe gas</strong></label><input class="form-control monto" type="number" id="m_importe_gas" name="m_importe_gas" min="1" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="importe_luz"><strong>Importe luz</strong></label><input class="form-control monto" type="number" id="m_importe_luz" name="m_importe_luz" min="1" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="importe_gasolina"><strong>Importe gasolina</strong></label><input class="form-control monto" type="number" id="m_importe_gasolina" name="m_importe_gasolina" min="1" readonly="readonly"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="total_ins"><strong>Total insumos</strong></label><input class="form-control final" type="number" id="m_total_ins" name="m_total_ins" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Total materia prima</strong></label><input class="form-control final" type="number" id="m_total_mp" name="m_total_mp" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>% de ganancia</strong></label><input class="form-control" type="number" id="m_ganancia" name="m_ganancia" min="1" readonly="readonly"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Precio de venta</strong></label><input class="form-control" type="number" id="m_precio_venta" name="m_precio_venta" readonly="readonly"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar_produccion" name="btn_modificar_produccion">Modificar</button>
                    </div>-->
                </div>
            </form>
        </div>
    </div>

    <?php
    include("templates/footer.php");
    ?>

    <script>
        function sumar_insumos() {
            var total = 0;
            var change = false;

            $(".monto").each(function() {
                if (!isNaN(parseFloat($(this).val()))) {
                    change = true;
                    total += parseFloat($(this).val());
                }
            });
            total = (change) ? total : 0;
            $('#total_ins').val(total);
        }

        function precio_final() {
            var piezas = $('#no_piezas').val();
            var tot_ins = $('#total_ins').val();
            var tot_mp = $('#total_mp').val();
            var precio_venta = 0;
            var porcentaje = 0;
            var change = false;

            $(".final").each(function() {
                if (!isNaN(parseFloat($(this).val()))) {
                    change = true; 
                }
            });

            porcentaje = $('#ganancia').val();
            porcentaje = (change) ? porcentaje : 0;

            precio_venta = ((parseFloat(tot_ins) + parseFloat(tot_mp)) * (parseFloat(porcentaje) / 100)) / parseFloat(piezas);
            $('#precio_venta').val(Number.parseFloat(precio_venta).toFixed(2)); 
        }
    </script>

    <script src="js/calcular_porciones.js"></script>
    <script src="js/insert_produccion.js"></script>
    <script src="js/estatus_produccion.js"></script>
    <script src="js/update_produccion.js"></script>