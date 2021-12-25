<?php
    include("templates/menu.php");
    include("bd/select_puesto.php");
    include("bd/select_tipo_empleado.php");
	error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">

        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Empleado</h3>
            <div class="card shadow mb-3">
                <div>
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Puestos de Trabajo</p>
                    </div>
                    <div class="card-body">
                        <form id="puesto" action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"><strong>ID Puesto</strong></label>
                                        <input class="form-control" type="text" id="id_tipo_empleado" name="id_tipo_empleado">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="te_puesto"><strong>Puesto</strong></label>
                                        <input class="form-control" type="text" id="te_puesto" name="te_puesto">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="sueldo_quincenal"><strong>Sueldo quincenal</strong></label>
                                        <input class="form-control" type="number" id="sueldo_quincenal" name="sueldo_quincenal">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="dias_trabajo"><strong>Dias de trabajo</strong></label></div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Lu" id="Lu"> Lunes </input>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Ma" id="Ma"> Martes </input>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Mi" id="Mi"> Miercoles </input>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Ju" id="Ju"> Jueves </input>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Vi" id="Vi"> Viernes </input>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Sa" id="Sa"> Sábado </input>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Do" id="Do"> Domingo </input>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3"><button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_guardar_tipo" name="btn_guardar_tipo">Guardar</button></div>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Tabla Puestos de trabajo registrados para mostrar los registros-->
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Puestos de trabajo registrados</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <form  id="select_puesto" action="" method="POST">
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
                        <table class="table my-0" id="table_puesto">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Acciones</th>
                                    <th>ID Puesto</th>
                                    <th>Puesto</th>
                                    <th>Días laborales </th>
                                    <th>Sueldo quincenal</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $pto_vta = new pto_vta();
                                    $pto_vta->recuperar_te();
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <td><strong>Acciones</strong></td>
                                    <td><strong>ID Puesto</strong></td>
                                    <td><strong>Puesto</strong></td>
                                    <td><strong>Días laborales</strong></td>
                                    <td><strong>Sueldo quincenal</strong></td>
                                    <td><strong>Estatus</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <br>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Trabajadores</p>
                </div>
                <div class="card-body">
                    <form id="empleado" action="" method="POST">
                        <div class="row">
                            <div class="row">
                                <div class="col mt-2 mb-2">
                                    <div class="mb-3"><label class="form-label" for="rfc_empleado"><strong>RFC del trabajador</strong></label>
                                        <input class="form-control" type="text" id="rfc_empleado" placeholder="RFC" name="rfc_empleado">
                                    </div>
                                </div>
                                <div class="col mt-2 mb-2">
                                    <div class="mb-3"><label class="form-label" for="descripcion"><strong>Puesto</strong></label>
                                        <select class="form-select" id="e_puesto" name="e_puesto">
                                            <option select>Puesto</option>
                                            <?php
                                                $tipo_empleado = new tipo_empleado();
                                                $tipo_empleado->recuperar_puestos();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col mt-2 mb-2">
                                    <div class="mb-3"><label class="form-label" for="contrasenia"><strong>Contraseña</strong></label>
                                        <input class="form-control" type="password" id="contrasenia" name="contrasenia">
                                    </div>
                                </div>

                                <div class="col mt-2 mb-2">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Hora de entrada</strong></label>
                                        <input class="form-control" type="time" id="hora_entrada" name="">
                                    </div>
                                </div>

                                <div class="col mt-2 mb-2">
                                    <div class="mb-3"><label class="form-label" for=""><strong>Hora de salida</strong></label>
                                        <input class="form-control" type="time" id="hora_salida" name="">
                                    </div>
                                </div>
                            </div>

                            <div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="nombre"><strong>Nombre</strong></label>
                                    <input class="form-control" type="text" id="nombre" placeholder="Nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="apellido_p"><strong>Apellido paterno</strong></label>
                                    <input class="form-control" type="text" id="apellido_p" placeholder="Apellido paterno" name="apellido_p">
                                </div>
                            </div>
                            <div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="apellido_m"><strong>Apellido materno</strong></label>
                                    <input class="form-control" type="text" id="apellido_m" placeholder="Apellido materno" name="apellido_m">
                                </div>
                            </div>

                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="telefono"><strong>Teléfono</strong></label>
                                    <input class="form-control" type="number" id="telefono" placeholder="Teléfono" name="telefono">
                                </div>
                            </div>

                            <div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="edad"><strong>Edad</strong></label>
                                    <input class="form-control" type="number" id="edad" placeholder="Edad" name="edad">
                                </div>
                            </div>

                            <div class="col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="sexo"><strong>Sexo</strong></label>
                                    <select class="form-select" id="sexo" name="sexo">
                                        <option select>Sexo</option>
                                        <option value="H">Hombre</option>
                                        <option value="M">Mujer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="calle"><strong>Calle</strong></label>
                                    <input class="form-control" type="text" id="calle" placeholder="Calle" name="calle">
                                </div>
                            </div>
                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="colonia"><strong>Colonia</strong></label>
                                    <input class="form-control" type="text" id="colonia" placeholder="Colonia" name="colonia">
                                </div>
                            </div>

                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="alcaldia"><strong>Alcaldia/Municipio</strong></label>
                                    <input class="form-control" type="text" id="alcaldia" placeholder="Alcaldia/Municipio" name="alcaldia">
                                </div>
                            </div>

                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="no_interior"><strong>No interior</strong></label>
                                    <input class="form-control" type="text" id="no_interior" placeholder="No interior" name="no_interior">
                                </div>
                            </div>
                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="no_exterior"><strong>No exterior</strong></label>
                                    <input class="form-control" type="text" id="no_exterior" placeholder="No exterior" name="no_exterior">
                                </div>
                            </div>

                            <div class="col col col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
                                <div class="mb-3"><label class="form-label" for="codigo_postal"><strong>Codigo postal</strong></label>
                                    <input class="form-control" type="number" id="codigo_postal" placeholder="Codigo postal" name="codigo_postal">
                                </div>
                            </div>

                        </div>
                        <!--boton-->
                        <div class="mb-3"><button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_guardar_empleado" name="btn_guardar_empleado">Guardar</button></div>
                        <br>
                    </form>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Empleados registrados</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Mostrar&nbsp;<select class="d-inline-block form-select form-select-sm">
                                        <option value="10" selected="">Mostrar...</option>
                                        <option value="25">Todos</option>
                                        <option value="50">Vigentes</option>
                                        <option value="50">No vigentes</option>
                                    </select>&nbsp;</label>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align: center;">
                            <thead>
                                <tr class="">
                                    <th>Acciones</th>
                                    <th>RFC</th>
                                    <th>Puesto</th>
                                    <th>Contraseña</th>
                                    <th>Nombre</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Calle</th>
                                    <th>Colonia</th>
                                    <th>No interrior</th>
                                    <th>No. exterior</th>
                                    <th>Alcaldia/Municipio</th>
                                    <th>Codigo postal</th>
                                    <th>Telefono</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Hora entrada</th>
                                    <th>Hora salida</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /*
                                $empleado = new empleado();
                                $empleado->recuperar();
                                */
                                ?>

                                <td>
                                    <a href="#"><i class="far fa-edit" style="color: darkslateblue;"></i></a>
                                    <a href="#"><i class="fas fa-trash" style="color: darkslateblue;"></i></a>
                                </td>
                                <td><strong>AEMN99O225HMC</strong></td>
                                <td><strong>Vendedor</strong></td>
                                <td><strong></strong></td>
                                <td><strong>Norman</strong></td>
                                <td><strong>Arredondo</strong></td>
                                <td><strong>Martínez</strong></td>
                                <td><strong>Av. Vicente</strong></td>
                                <td><strong>El sol</strong></td>
                                <td><strong></strong></td>
                                <td><strong>311</strong></td>
                                <td><strong>Nezahualcóyotl</strong></td>
                                <td><strong>57200</strong></td>
                                <td><strong>5618457650</strong></td>
                                <td><strong>22</strong></td>
                                <td><strong>H</strong></td>
                                <td><strong>07:30</strong></td>
                                <td><strong>01:00</strong></td>
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center;">
                                    <th>Acciones</th>
                                    <th>RFC</th>
                                    <th>Puesto</th>
                                    <th>Contraseña</th>
                                    <th>Nombre</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Calle</th>
                                    <th>Colonia</th>
                                    <th>No interrior</th>
                                    <th>No. exterior</th>
                                    <th>Alcaldia/Municipio</th>
                                    <th>Codigo postal</th>
                                    <th>Telefono</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Hora entrada</th>
                                    <th>Hora salida</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal puesto-->
    <div class="modal fade" id="editar_puesto" name="editar_puesto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Modal content-->
            <form id="modificar_puesto" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar puesto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">&times;</button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <label class="form-label" for="m_id_tipo_empleado"><strong>ID puesto:</strong></label><input class="form-control" type="text" id="m_id_tipo_empleado" name="m_id_tipo_empleado" readonly="readonly">
                        <label class="form-label" for="m_te_puesto"><strong>Puesto:</strong></label><input class="form-control" type="text" id="m_te_puesto" name="m_te_puesto">
                        <label class="form-label" for="m_dias_laborales"><strong>Días de trabajo:</strong></label>
                        <div class="row">
                            <div class="col">
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Lu" id="m_dl_Lu"> Lunes </input></div>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Ma" id="m_dl_Ma"> Martes </input></div>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Mi" id="m_dl_Mi"> Miercoles </input></div>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Ju" id="m_dl_Ju"> Jueves </input></div>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Vi" id="m_dl_Vi"> Viernes </input></div>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Sa" id="m_dl_Sa"> Sábado </input></div>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="m_dl_Do" id="m_dl_Do"> Domingo </input></div>
                            </div>
                        </div>
                        <label class="form-label" for="m_sueldo_quincenal"><strong>Sueldo quincenal:</strong></label><input class="form-control" type="number" id="m_sueldo_quincenal" name="m_sueldo_quincenal">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark btn-sm" type="submit" style="float: right" id="btn_modificar_puesto" name="btn_modificar_puesto">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php
    include("templates/footer.php");
    ?>

    <script src="js/insert_puesto.js"></script>
    <script src="js/estatus_puesto.js"></script>
    <script src="js/update_puesto.js"></script>
