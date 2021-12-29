<?php
include("templates/menu.php");
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Producción</h3>
            <div class="card shadow mb-3">
                <form>
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Orden de producción</p>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>ID Produccion</strong></label><input class="form-control" type="text" id="id_produccion" name="id_produccion"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Fecha</strong></label><input class="form-control" type="date" id="fecha_produccion" name="fecha_produccion"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>RFC Empleado</strong></label><input class="form-control" type="text" id="rfc_empleado" name="rfc_empleado"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="pan" name="pan"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas</strong></label><input class="form-control" type="number" id="no_piezas" name="no_piezas"></div>
                            </div>
                            <div class="col justify-content-md-end">
                                <br>
                                <div class="mt-2"> <button class="btn btn-dark form-control" type="button">Calcular porciones</button></div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-nowrap ">
                                    <form id="select_materia_prima" action="" method="POST">
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
                                            <td><strong>ID</strong></td>
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
                                <div class="mb-3"><label class="form-label" for=""><strong>ID insumo</strong></label><input class="form-control" type="text" id="id_insumo" name="id_insumo"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Importe gas</strong></label><input class="form-control" type="number" id="importe_gas" name="importe_gas"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Importe luz</strong></label><input class="form-control" type="number" id="importe_luz" name="importe_luz"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Importe gasolina</strong></label><input class="form-control" type="number" id="importe_gasolina" name="importe_gasolina"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Total insumos</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Total materia prima</strong></label><input disabled class="form-control" type="text" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>% de ganancia</strong></label><input disabled class="form-control" type="text" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Precio de venta</strong></label><input disabled class="form-control" type="text" id="" name=""></div>
                            </div>
                        </div>

                        <div class="mb- mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-dark btn-sm" type="submit">Guardar</button>
                            <button class="btn btn-dark btn-sm" type="submit">Calcular precio de venta</button>
                        </div>
                    </div>
                </form>
            </div>

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
                                <div class="mb-3"><label class="form-label"><strong>Piezas</strong></label><input disabled class="form-control" type="number" id="piezas" name="piezas"></div>
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

        </div>
    </div>


    <?php
    include("templates/footer.php");
    ?>