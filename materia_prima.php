<?php
    include("templates/menu.php");
    include("bd/select_materia_prima.php");
    error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <br>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Materia prima</h3>
            <form id="materia_prima" action="" method="POST">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Materia Prima</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for=nombre_mp"><strong>Nombre del producto</strong></label><input class="form-control" type="text" id="nombre_mp" name="nombre_mp"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="fecha_compra"><strong>Fecha compra</strong></label><input class="form-control" type="date" id="fecha_compra" name="fecha_compra"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="cantidad"><strong>Cantidad</strong></label><input class="form-control monto" step="any" type="number" id="cantidad" name="cantidad" min="1"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="unidad"><strong>Unidad</strong></label><input class="form-control" type="text" id="unidad" name="unidad"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="precio_total"><strong>Precio total</strong></label><input class="form-control monto" step="any" type="number" id="precio_total" name="precio_total" min="1"></div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3"><button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_guardar_mp" name="btn_guardar_mp">Guardar</button></div>
                    </div>
                </div>
            </form>
           
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Almacén</p>
                </div>
                
                <div class="card-body">
                    <div class="row">
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
                        <table class="table my-0" id="table_materia_prima">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Acciones</th>
                                    <th>Nombre MP</th>
                                    <th>Existencia</th>
                                    <th>Stock mínimo</th>
                                    <th>Stock máximo</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $materia_prima = new materia_prima();
                                    $materia_prima->recuperar_materia_prima();
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <td><strong>Acciones</strong></td>
                                    <td><strong>Nombre MP</strong></td>
                                    <td><strong>Existencia</strong></td>
                                    <td><strong>Stock mínimo</strong></td>
                                    <td><strong>Stock máximo</strong></td>
                                    <td><strong>Estatus</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>    
        </div>

    <!-- Modal materia prima-->
    <div class="modal" id="editar_materia" name="editar_materia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Modal content-->
            <form id="modificar_materia" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar materia prima</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cerrar_mp" name="cerrar_mp" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label nom_mp" for="m_nombre_mp"><strong>Nombre del producto:</strong></label><input class="form-control" type="text" id="m_nombre_mp" name="m_nombre_mp" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="m_existencia"><strong>Existencia:</strong></label><input class="form-control" type="number" id="m_existencia" name="m_existencia" readonly="readonly" min="1">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="m_stock_minimo"><strong>Stock mínimo:</strong></label><input class="form-control" type="number" id="m_stock_minimo" name="m_stock_minimo" min="1">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="m_stock_maximo"><strong>Stock máximo:</strong></label><input class="form-control" type="number" id="m_stock_maximo" name="m_stock_maximo" min="1">
                                </div>
                                <div class="col">
                                    <br>
                                    <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_ver_compras" name="btn_ver_compras">Ver compras</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label"><strong>Compras:</strong></label>
                                    <table class="table my-0" id="table_compras_mp">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Acciones</th>
                                                <th>Fecha</th>
                                                <th>Cantidad</th>
                                                <th>Unidad</th>
                                                <th>Total</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <td><strong>Acciones</strong></td>
                                                <td><strong>Fecha</strong></td>
                                                <td><strong>Cantidad</strong></td>
                                                <td><strong>Unidad</strong></td>
                                                <td><strong>Total</strong></td>
                                                <td><strong>Estatus</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar_materia" name="btn_modificar_materia">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

     <!-- Modal compras-->
     <div class="modal" id="editar_compra" name="editar_compra" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Modal content-->
            <form id="modificar_compra" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar compra</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cerrar_compra" name="cerrar_compra" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label nom_mp" for="nombre_mp"><strong>Nombre del producto:</strong></label><input class="form-control" type="text" id="mc_nombre_mp" name="mc_nombre_mp" readonly="readonly">
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="fecha_compra"><strong>Fecha compra:</strong></label><input class="form-control" type="date" id="mc_fecha_compra" name="mc_fecha_compra" readonly="readonly"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="mc_cantidad"><strong>Cantidad:</strong></label><input class="form-control mc_monto" step="any" type="number" id="mc_cantidad" name="mc_cantidad" min="1"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="mc_unidad"><strong>Unidad:</strong></label><input class="form-control" type="text" id="mc_unidad" name="mc_unidad"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="mc_precio_total"><strong>Precio total:</strong></label><input class="form-control" type="number" id="mc_precio_total" name="mc_precio_total"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar_compra" name="btn_modificar_compra">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
include("templates/footer.php");
?>

<!--<script>
    function calcular_total(){
        var total = 1;
        var change = false;

		$(".monto").each(function(){
			if (!isNaN(parseFloat($(this).val()))){
                change = true;
				total *= parseFloat($(this).val());
			}
	    });
        total = (change) ? total : 0;
    	document.getElementById('precio_total').innerHTML = total;
    }

    function modificar_total(){
        var total = 1;
        var change = false;

		$(".mc_monto").each(function(){
			if (!isNaN(parseFloat($(this).val()))){
                change = true;
				total *= parseFloat($(this).val());
			}
	    });
        total = (change) ? total : 0;
    	document.getElementById('mc_precio_total').innerHTML = total;
    }
</script> -->

<script src="js/insert_materia_prima.js"></script>
<script src="js/estatus_materia_prima.js"></script>
<script src="js/update_materia_prima.js"></script>
