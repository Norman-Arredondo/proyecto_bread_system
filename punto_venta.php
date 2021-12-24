<?php
    include("templates/menu.php");
    include("bd/select_punto_venta.php");
	error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <br>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Punto de Venta</h3>
            <form id="punto_venta" action="" method="POST">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Información General</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="cve_pto"><strong>Clave</strong></label><input class="form-control" type="text" id="cve_pto" name="cve_pto"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="pto_vta"><strong>Punto de venta</strong></label><input class="form-control" type="text" id="pto_vta" name="pto_vta"></div>
                            </div>
                        </div>
                    </div>
              
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Dirección</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="alcaldia"><strong>Alcaldia/Municipio</strong></label><input class="form-control" type="text" id="alcaldia" name="alcaldia"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="calle"><strong>Calle</strong></label><input class="form-control" type="text" id="calle" name="calle"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="colonia"><strong>Colonia</strong></label><input class="form-control" type="text" id="colonia" name="colonia"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="no_exterior"><strong>No Exterior</strong></label><input class="form-control" type="text" id="no_exterior" name="no_exterior"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="no_interior"><strong>No Interior</strong></label><input class="form-control" type="text" id="no_interior" name="no_interior"></div>
                            </div>
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="codigo_postal"><strong>Código Postal</strong></label><input class="form-control" type="number" id="codigo_postal" name="codigo_postal"></div>
                            </div>   
                        </div>            
                        <div class="mb-3"><button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_guardar" name="btn_guardar">Guardar</button></div>
                    </div>
                </div>
            </form>


            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Puntos de venta registrados</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <form  id="select_punto_venta" action="" method="POST">
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
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Clave</th>
                                        <th>Punto Venta</th>
                                        <th>Calle</th>
                                        <th>Colonia</th>
                                        <th>No Exterior</th>
                                        <th>No Interior</th>
                                        <th>Alcandia/Municipio</th>
                                        <th>Código Postal</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $pto_vta = new pto_vta();
                                        $pto_vta->recuperar();
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Acciones</strong></td>
                                        <td><strong>Clave</strong></td>
                                        <td><strong>Punto Venta</strong></td>
                                        <td><strong>Calle</strong></td>
                                        <td><strong>Colonia</strong></td>
                                        <td><strong>No Exterior</strong></td>
                                        <td><strong>No Interior</strong></td>
                                        <td><strong>Alcandia/Municipio</strong></td>
                                        <td><strong>Código Postal</strong></td>
                                        <td><strong>Estatus</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>    
            </div>


    <!-- Modal -->
    <div class="modal fade" id="editar_punto" name="editar_punto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Modal content-->
            <form id="modificar_punto" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar punto de venta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <label class="form-label" for="m_cve_pto"><strong>Clave:</strong></label><input class="form-control" type="text" id="m_cve_pto" name="m_cve_pto" readonly="readonly">
                        <label class="form-label" for="m_pto_vta"><strong>Punto de venta:</strong></label><input class="form-control" type="text" id="m_pto_vta" name="m_pto_vta">
                        <label class="form-label" for="m_calle"><strong>Calle:</strong></label><input class="form-control" type="text" id="m_calle" name="m_calle">
                        <label class="form-label" for="m_alcaldia"><strong>Alcaldía:</strong></label><input class="form-control" type="text" id="m_alcaldia" name="m_alcaldia">
                        <label class="form-label" for="m_colonia"><strong>Colonia:</strong></label><input class="form-control" type="text" id="m_colonia" name="m_colonia">
                        <label class="form-label" for="m_no_exterior"><strong>No. exterior:</strong></label><input class="form-control" type="text" id="m_no_exterior" name="m_no_exterior">
                        <label class="form-label" for="m_no_interior"><strong>No. interior:</strong></label><input class="form-control" type="text" id="m_no_interior" name="m_no_interior">
                        <label class="form-label" for="m_codigo_postal"><strong>Código postal:</strong></label><input class="form-control" type="number" id="m_codigo_postal" name="m_codigo_postal">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar" name="btn_modificar">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  
<?php
    include("templates/footer.php");
?>

<script src="js/insert_punto_venta.js"></script>
<script src="js/estatus_punto_venta.js"></script>
<script src="js/update_punto_venta.js"></script>
