<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrador | Panel</title>

    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php');?>
        <div class="app-content">

            <?php include('include/header.php');?>

            <!-- final: BARRA DE NAVAJA SUPERIOR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- inicio: TÍTULO DE LA PÁGINA -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Administrador | Panel</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Administrador</span>
                                </li>
                                <li class="active">
                                    <span>Dashboard</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- fin: TÍTULO DE LA PÁGINA -->
                    <!-- inicio: EJEMPLO BÁSICO -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle">Administrar usuarios</h2>

                                        <p class="links cl-effect-1">
                                            <a href="manage-users.php">
                                                <?php $result = mysqli_query($con,"SELECT * FROM users ");
$num_rows = mysqli_num_rows($result);
{
?>
                                                Usuarios totales: <?php echo htmlentities($num_rows);  } ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle">Administrar médicos</h2>

                                        <p class="cl-effect-1">
                                            <a href="manage-doctors.php">
                                                <?php $result1 = mysqli_query($con,"SELECT * FROM doctors ");
$num_rows1 = mysqli_num_rows($result1);
{
?>
                                                Doctores Totales :<?php echo htmlentities($num_rows1);  } ?>
                                            </a>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle"> Equipo</h2>

                                        <p class="links cl-effect-1">
                                            <a href="book-appointment.php">
                                                <a href="appointment-history.php">
                                                    <?php $sql= mysqli_query($con,"SELECT * FROM appointment");
$num_rows2 = mysqli_num_rows($sql);
{
?>
                                                    Citas Totales :<?php echo htmlentities($num_rows2);  } ?>
                                                </a>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle">Administrar pacientes</h2>

                                        <p class="links cl-effect-1">
                                            <a href="manage-patient.php">
                                                <?php $result = mysqli_query($con,"SELECT * FROM tblpatient ");
$num_rows = mysqli_num_rows($result);
{
?>
                                                Pacientes totales:<?php echo htmlentities($num_rows);  
} ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>





                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i class="ti-files fa-1x text-primary"></i> <i
                                                class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle"> Nuevas Consultas</h2>

                                        <p class="links cl-effect-1">
                                            <a href="book-appointment.php">
                                                <a href="unread-queries.php">
                                                    <?php 
$sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
$num_rows22 = mysqli_num_rows($sql);
?>
                                                    Total de consultas nuevas:<?php echo htmlentities($num_rows22);   ?>
                                                </a>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>






                    <!-- fin: SELECCIONAR CAJAS -->

                </div>
            </div>
        </div>
        <!-- inicio: PIE DE PIE -->
        <?php include('include/footer.php');?>
        <!-- end: FOOTER -->

        <!-- inicio: AJUSTES -->
        <?php include('include/setting.php');?>
        <>
            <!-- fin: AJUSTES -->
    </div>
    <!-- inicio: JAVASCRIPTS PRINCIPALES -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- fin: JAVASCRIPTS PRINCIPALES -->
    <!-- start: JAVASCRIPTS REQUERIDOS PARA ESTA PÁGINA SOLAMENTE -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUERIDOS PARA ESTA PÁGINA SOLAMENTE -->
    <!-- inicio: CLIP-DOS JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: Controladores de eventos de JavaScript para esta página -->
    <script src="assets/js/form-elements.js"></script>
    <script>
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
    });
    </script>
    <!-- end: Controladores de eventos de JavaScript para esta página -->
    <!-- final: CLIP-DOS JAVASCRIPTS -->
</body>

</html>