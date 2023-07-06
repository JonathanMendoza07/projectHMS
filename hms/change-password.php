<?php
session_start();
//informe_de_errores(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// cambiar según la zona horaria
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update users set password='".md5($_POST['npass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
$_SESSION['msg1']="¡Contraseña cambiada con éxito!";
}
else
{
$_SESSION['msg1']="¡La contraseña anterior no coincide!";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Usuario | cambiar la contraseña</title>

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
    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.cpass.value == "") {
            alert("¡El campo de contraseña actual está vacío!");
            document.chngpwd.cpass.focus();
            return false;
        } else if (document.chngpwd.npass.value == "") {
            alert("¡El nuevo campo de contraseña está vacío!");
            document.chngpwd.npass.focus();
            return false;
        } else if (document.chngpwd.cfpass.value == "") {
            alert("¡El campo de confirmación de contraseña está vacío!");
            document.chngpwd.cfpass.focus();
            return false;
        } else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
            alert("¡La contraseña y el campo Confirmar contraseña no coinciden!");
            document.chngpwd.cfpass.focus();
            return false;
        }
        return true;
    }
    </script>

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
                                <h1 class="mainTitle">Usuario | Cambiar la contraseña</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Usuario</span>
                                </li>
                                <li class="active">
                                    <span>Cambiar la contraseña</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- fin: TÍTULO DE LA PÁGINA -->
                    <!-- inicio: EJEMPLO BÁSICO -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Cambiar la contraseña</h5>
                                            </div>
                                            <div class="panel-body">
                                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
                                                    <?php echo htmlentities($_SESSION['msg1']="");?></p>
                                                <form role="form" name="chngpwd" method="post"
                                                    onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            Contraseña actual
                                                        </label>
                                                        <input type="password" name="cpass" class="form-control"
                                                            placeholder="Introducir la contraseña actual">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            Nueva contraseña
                                                        </label>
                                                        <input type="password" name="npass" class="form-control"
                                                            placeholder="Nueva contraseña">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            Confirmar contraseña
                                                        </label>
                                                        <input type="password" name="cfpass" class="form-control"
                                                            placeholder="Confirmar Contraseña">
                                                    </div>



                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Enviar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- fin: EJEMPLO BÁSICO -->






                    <!-- fin: SELECCIONAR CAJAS -->

                </div>
            </div>
        </div>
        <!-- inicio: PIE DE PIE -->
        <?php include('include/footer.php');?>
        <!-- final: PIE DE PIE -->

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
    <!-- fin: CLIP-DOS JAVASCRIPTS -->
</body>

</html>