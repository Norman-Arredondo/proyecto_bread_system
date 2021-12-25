<?php
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Collapsible-Sidebar.css">
    <link rel="stylesheet" href="assets/css/Responsive-Image-with-Transparent-Text.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/THANOS_fullscreen_image_with_text.css">
    <link rel="stylesheet" href="assets/css/Transparent-Overlay-On-Image-On-Hover.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="js/jquery-3.6.0.js"></script>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/login.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Bienvenido!</h4>
                                    </div>
                                    <form class="user" id="index" action="" method="POST">
                                        <div class="mb-3"><input class="form-control form-control-user" type="" id="rfc_empleado" placeholder="RFC empleado" name="rfc_empleado" maxlength="13"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="contrasenia" placeholder="Contraseña" name="contrasenia"></div>
                                        <button class="btn btn-dark btn-user w-100" type="submit" id="btn_ingresar" name="btn_ingresar">Ingresar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/script.js"></script>
</body>

<script src="js/select_index.js"></script>

</html>