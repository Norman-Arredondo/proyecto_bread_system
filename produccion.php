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

    <!--
                            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Consultar Orden de Produccion</p>
                </div>
                <form id="" action="" method="POST">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col mt-2 mb-2">
                            </div>
                            <div class="col mt-2 mb-2 text-center">
                                <label class="form-label"><strong>ID Producción</strong></label>
                                <input class="form-control" type="text" id="id_produccion" name="id_produccion">
                            </div>
                            <div class="col mt-2 mb-2 text-center">
                                <label class="form-label"><strong>Fecha</strong></label>
                                <input class="form-control" type="date" id="fecha_produccion" name="fecha_produccion">
                            </div>
                            <div class="col mt-2 mb-2">
                                <div class="col mt-3 mb-2">
                                    <button class="btn btn-dark btn-sm" type="submit">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>RFC empleado</strong></label><input disabled class="form-control" type="text" id="rfc_empleado" name="rfc_empleado"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Pan</strong></label><input disabled class="form-control" type="text" id="pan" name="pan"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Piezas</strong></label><input disabled class="form-control" type="number" id="piezas" name="piezas" min="1"></div>
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
                                            <th>ID</th>
                                            <th>Ingrediente</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                            <th>Costo</th>
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
                                            <td><strong>Materia prima</strong></td>
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
                                <div class="mb-3"><label class="form-label"><strong>Importe gas</strong></label><input disabled class="form-control" type="number" id="importe_gas" name="importe_gas"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Importe luz</strong></label><input disabled class="form-control" type="number" id="importe_luz" name="importe_luz"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Importe gasolina</strong></label><input disabled class="form-control" type="number" id="importe_gasolina" name="importe_gasolina"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Total</strong></label><input disabled class="form-control" type="number" id="importe_total" name="importe_total"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Total materia prima</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>% de ganancia</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Precio de venta</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
                            </div>
                        </div>

                        <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-dark btn-sm" type="submit">Cambiar estatus</button>
                            <button class="btn btn-dark btn-sm" type="submit">Modificar</button>
                        </div>
                       
                    </div>
                </form>
            </div>
-->

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