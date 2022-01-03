<?php
include("templates/menu.php");
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
                                <div class="mb-3"><label class="form-label"><strong>Punto de venta</strong></label><input class="form-control" type="text" id="cve_pto" name="cve_pto"></div>
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
                                <div class="mb-3"><label class="form-label" for=""><strong>ID Producción</strong></label><input class="form-control" type="text" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Pan</strong></label><input class="form-control" type="text" id="" name="" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas entregadas</strong></label><input class="form-control" type="number" id="" name="" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Piezas devueltas</strong></label><input class="form-control" type="number" id="" name="" min="1"></div>
                            </div>
                            <div class="col text-center">
                                <div class="mb-3"><label class="form-label" for=""><strong>Agregar</strong></label><button class="btn btn-outline-info form-control" type="submit"><strong>+</strong></button></div>
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
                                <div class="mb-3"><label class="form-label"><strong>Fecha</strong></label><input disabled class="form-control" type="date" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Gastos</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Importe de venta</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>RFC del empleado</strong></label><input disabled class="form-control" type="text" id="" name=""></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Estatus</strong></label><input disabled class="form-control" type="number" id="" name=""></div>
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

        </div>
    </div>

    <?php
    include("templates/footer.php");
    ?>