<?php
include("templates/menu.php");
include("bd/select_tablero_control.php");
?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">

        <div class="container-fluid">
            <br>
            <h3 class="text-dark mb-4">Tablero de Control</h3>

            <!--Tarjetas-->
            <!--Tarjeta de Ingresos-->
            <div class="row justify-content-center">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                        <span>INGRESO TOTAL&nbsp; <?php echo date('Y'); ?> </span>
                                    </div>
                                    <div class="text-dark fw-bold h6 mb-0">
                                        <span style="font-size: 15px;">
                                            <?php
                                                $tablero = new tablero();
                                                $tablero->recuperar_IngresoTotalAnual();
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tarjeta de Punto con más ventas-->
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                        <span>PUNTO CON MÁS VENTAS</span>
                                    </div>
                                    <div class="text-dark fw-bold h6 mb-0">
                                        <span style="font-size: 15px;">
                                            <?php
                                                $tablero = new tablero();
                                                $tablero->recuperar_PuntoMasVentas();
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-store fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tarjeta de pan más vendido-->
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-info py-2">
                        <div class="card-body">
                            <div class="row align-items-center ">
                                <div class="col me-2">
                                    <div class="text-uppercase text-info fw-bold text-xs mb-1">
                                        <span>PAN MÁS VENDIDO</span>
                                    </div>
                                    <div class="text-dark fw-bold h6 mb-0">
                                        <span style="font-size: 15px;">
                                            <?php
                                                $tablero = new tablero();
                                                $tablero->recuperar_PanMasVendido();
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-shopping-basket fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Primer gráfica para Ingresos-->
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">INGRESOS <?php echo date('Y'); ?></h6>
                        </div>
                        <div class="card-body" style="margin:auto; width:90%; heigth:100%">
                            <!-- style="margin:auto; width:50%; heigth:100%"-->
                            <?php
                                $tablero = new tablero();
                                $tablero->recuperar_IngresosMes();
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--Gráficas individuales por punto de venta-->
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">INGRESOS POR PUNTO DE VENTA</h6>
                        </div>
                        <div class="card-body" style="margin:auto; width:90%; heigth:100%">

                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Matriz</h6>
                                        </div>
                                        <div class="card-body">
                                        <?php
                                            $tablero = new tablero();
                                            $tablero->recuperar_PanTienda('Matriz');
                                        ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Expendio centro</h6>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                                $tablero = new tablero();
                                                $tablero->recuperar_PanTienda('Centro');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Expendio centro vespertino</h6>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                                $tablero = new tablero();
                                                $tablero->recuperar_PanTienda('Centro Vespertino');
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary fw-bold m-0">Expendio Xolox</h6>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                                $tablero = new tablero();
                                                $tablero->recuperar_PanTienda('Xolox');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierra container fluid-->
    </div>


    <?php
    include("templates/footer.php");
    ?>