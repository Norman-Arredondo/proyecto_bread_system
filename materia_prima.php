<?php
    include("templates/menu.php");
    include("bd/select_materia_prima.php");
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div class="mb-3" id="content">
        <div class="container-fluid">
            <br>
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
                                <div class="mb-3"><label class="form-label" for="cantidad"><strong>Cantidad</strong></label><input class="form-control monto" step="any" type="number" id="cantidad" name="cantidad" onkeyup="calcular_total();"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="unidad"><strong>Unidad</strong></label><input class="form-control" type="text" id="unidad" name="unidad"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="contenido_neto"><strong>Contenido neto</strong></label><input class="form-control" step="any" type="number" id="contenido_neto" name="contenido_neto"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="precio_unitario"><strong>Precio unitario</strong></label><input class="form-control monto" step="any" type="number" id="precio_unitario" name="precio_unitario" onkeyup="calcular_total();"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="pt"><strong>Precio total</strong></label><label class="form-control" id="precio_total" name="precio_total" readonly="readonly"/></div>
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

<?php
include("templates/footer.php");
?>

<script>
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
</script>

<script src="js/insert_materia_prima.js"></script>