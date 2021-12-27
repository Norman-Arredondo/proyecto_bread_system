<?php
include("templates/menu.php");
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div class="mb-3" id="content">
        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Materia prima</h3>

            <form id="materia_prima" action="" method="POST">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Compras</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=""><strong>Nombre del producto</strong></label><input class="form-control" type="text" id="nombre_mp" placeholder="" name="nombre_mp"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="existenci"><strong>Fecha compra</strong></label><input class="form-control" type="date" id="fecha_compra" placeholder="" name="fecha_compra"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="stock stock_minimo"><strong>Cantidad</strong></label><input class="form-control" type="number" id="cantidad" placeholder="" name="cantidad"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="stock stock_maximo"><strong>Unidad</strong></label><input class="form-control" type="text" id="unidad" placeholder="" name="unidad"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="stock stock_maximo"><strong>Contenido neto</strong></label><input class="form-control" type="number" id="contenido_neto" placeholder="" name="contenido_neto"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="stock stock_maximo"><strong>Precio unitario</strong></label><input class="form-control" type="number" id="precio_unitario" placeholder="" name="precio_unitario"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="stock stock_maximo"><strong>Precio total</strong></label><input disabled class="form-control" type="number" id="precio_total" placeholder="" name="precio_total"></div>
                            </div>
                        </div>
                        <!--boton-->
                        <div class="mb-3 mt-3"><button class="btn btn-dark btn-sm" type="submit" style="float: right">Guardar compra</button></div>
                    </div>
                </div>
            </form>

            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Almacén</p>
                </div>
                <form id="almacen" action="" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-2 mb-2">
                            </div>
                            <div class="col mt-2 mb-2 text-center">
                                <label class="form-label"><strong>Nombre del producto</strong></label>
                                <input class="form-control" type="text" id="nombre_mp" placeholder="" name="nombre_mp">
                            </div>
                            <div class="col mt-2 mb-2">
                                <div class="col mt-3 mb-2">
                                    <button class="btn btn-dark btn-sm" type="submit" style="float: left">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Existencia</strong></label><input disabled class="form-control" type="number" id="existencia" placeholder="" name="existencia"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Stock mínimo</strong></label><input disabled class="form-control" type="number" id="stock_minimo" placeholder="" name="stock_minimo"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label"><strong>Stock máximo</strong></label><input disabled class="form-control" type="number" id="stock_maximo" placeholder="" name="stock_maximo"></div>
                            </div>
                </form>
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
                                <th>Fecha de compra</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Contenido neto</th>
                                <th>Precio unitario</th>
                                <th>Precio total</th>
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
                                <td><strong>Fecha de compra</strong></td>
                                <td><strong>Cantidad</strong></td>
                                <td><strong>Unidad</strong></td>
                                <td><strong>Contenido neto</strong></td>
                                <td><strong>Precio unitario</strong></td>
                                <td><strong>Precio total</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include("templates/footer.php");
?>

<script src="js/insert_materia_prima.js"></script>