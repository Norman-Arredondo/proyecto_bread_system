<?php
include("templates/menu.php");
include("bd/consultas.php");
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">

        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Histórico</h3>
            
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Hechos Ventas</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align: center;">
                            <thead>
                                <tr>

                                    <th>Clave venta</th>
                                    <th>Punto de venta</th>
                                    <th>ID producción</th>
                                    <th>Fecha</th>
                                    <th>RFC empleado</th>
                                    <th>Piezas vendidas</th>
                                    <th>Precio unitario</th>
                                    <th>Importe venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $consultas = new consultas();
                                $consultas->recuperar_HechosVentas();
                                ?> 
                            </tbody>
                            <tfoot>
                                <tr>

                                    <td><strong>Clave venta</strong></td>
                                    <td><strong>Punto de venta</strong></td>
                                    <td><strong>ID producción</strong></td>
                                    <td><strong>Fecha</strong></td>
                                    <td><strong>RFC empleado</strong></td>
                                    <td><strong>Piezas vendidas</strong></td>
                                    <td><strong>Precio unitario</strong></td>
                                    <td><strong>Importe venta</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
    include("templates/footer.php");
?>