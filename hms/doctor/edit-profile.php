<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno' where id='".$_SESSION['id']."'");
if($sql)
{
echo "<script>alert('Detalles del doctor actualizados con éxito');</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Médico | Editar detalles del médico</title>

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
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- inicio: TÍTULO DE LA PÁGINA -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Médico | Editar detalles del médico</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Médico</span>
                                </li>
                                <li class="active">
                                    <span>Editar detalles del doctor</span>
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
                                                <h5 class="panel-title">Editar Doctor</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php $sql=mysqli_query($con,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
while($data=mysqli_fetch_array($sql))
{
?>
                                                <h4><?php echo htmlentities($data['doctorName']);?> - Perfil</h4>
                                                <p><b>Registro de perfil .Fecha:
                                                    </b><?php echo htmlentities($data['creationDate']);?></p>
                                                <?php if($data['updationDate']){?>
                                                <p><b>Fecha de última actualización del perfil:
                                                    </b><?php echo htmlentities($data['updationDate']);?></p>
                                                <?php } ?>
                                                <hr />
                                                <form role="form" name="adddoc" method="post"
                                                    onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="DoctorSpecialization">
                                                            Doctor Especialización
                                                        </label>
                                                        <select name="Doctorspecialization" class="form-control"
                                                            required="required">
                                                            <option
                                                                value="<?php echo htmlentities($data['specilization']);?>">
                                                                <?php echo htmlentities($data['specilization']);?>
                                                            </option>
                                                            <?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
                                                            <option
                                                                value="<?php echo htmlentities($row['specilization']);?>">
                                                                <?php echo htmlentities($row['specilization']);?>
                                                            </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctorname">
                                                            Nombre del médico
                                                        </label>
                                                        <input type="text" name="docname" class="form-control"
                                                            value="<?php echo htmlentities($data['doctorName']);?>">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="address">
                                                            Médico Clínica Dirección
                                                        </label>
                                                        <textarea name="clinicaddress"
                                                            class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Honorarios de consultoría médico
                                                        </label>
                                                        <input type="text" name="docfees" class="form-control"
                                                            required="required"
                                                            value="<?php echo htmlentities($data['docFees']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Número de télefono
                                                        </label>
                                                        <input type="text" name="doccontact" class="form-control"
                                                            required="required"
                                                            value="<?php echo htmlentities($data['contactno']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Correo electrónico del médico
                                                        </label>
                                                        <input type="email" name="docemail" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['docEmail']);?>">
                                                    </div>




                                                    <?php } ?>


                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Actualizar
                                                    </button>
                                                </form>
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