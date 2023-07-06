<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
	$eid=$_GET['editid'];
	$patname=$_POST['patname'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$gender=$_POST['gender'];
$pataddress=$_POST['pataddress'];
$patage=$_POST['patage'];
$medhis=$_POST['medhis'];
$sql=mysqli_query($con,"update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
if($sql)
{
echo "<script>alert('Información del paciente actualizada con éxito');</script>";
header('location:manage-patient.php');

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Médico | Añadir paciente</title>

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
                                <h1 class="mainTitle">Paciente | Añadir paciente</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Paciente</span>
                                </li>
                                <li class="active">
                                    <span>Añadir paciente</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Añadir paciente</h5>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" name="" method="post">
                                                    <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblpatient where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                                    <div class="form-group">
                                                        <label for="doctorname">
                                                            Nombre del paciente
                                                        </label>
                                                        <input type="text" name="patname" class="form-control"
                                                            value="<?php  echo $row['PatientName'];?>" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Número de contacto del paciente
                                                        </label>
                                                        <input type="text" name="patcontact" class="form-control"
                                                            value="<?php  echo $row['PatientContno'];?>" required="true"
                                                            maxlength="10" pattern="[0-9]+">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Correo electrónico del paciente
                                                        </label>
                                                        <input type="email" id="patemail" name="patemail"
                                                            class="form-control"
                                                            value="<?php  echo $row['PatientEmail'];?>" readonly='true'>
                                                        <span id="email-availability-status"></span>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="control-label">Género: </label>
                                                        <?php  if($row['Gender']=="Femenino"){ ?>
                                                        <input type="radio" name="gender" id="gender" value="Femenino"
                                                            checked="true">Femenino
                                                        <input type="radio" name="gender" id="gender"
                                                            value="Masculino">Masculino
                                                        <?php } else { ?>
                                                        <label>
                                                            <input type="radio" name="gender" id="gender"
                                                                value="Masculino" checked="true">Masculino
                                                            <input type="radio" name="gender" id="gender"
                                                                value="Femenino">Femenino
                                                        </label>
                                                        <?php } ?>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label class="block">
                                                            Género:
                                                        </label>
                                                        <div class="clip-radio radio-primary">
                                                            <input type="radio" id="rg-female" name="gender"
                                                                value="Femenino">
                                                            <label for="rg-female">
                                                                Femenino
                                                            </label>
                                                            <input type="radio" id="rg-male" name="gender"
                                                                value="Masculino">
                                                            <label for="rg-male">
                                                                Masculino
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">
                                                            Dirección del paciente
                                                        </label>
                                                        <textarea name="pataddress" class="form-control"
                                                            required="true"><?php  echo $row['PatientAdd'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Edad del paciente
                                                        </label>
                                                        <input type="text" name="patage" class="form-control"
                                                            value="<?php  echo $row['PatientAge'];?>" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Historial médico
                                                        </label>
                                                        <textarea type="text" name="medhis" class="form-control"
                                                            placeholder="Ingrese el historial médico del paciente (si corresponde)"
                                                            required="true"><?php  echo $row['PatientMedhis'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Fecha de creación
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            value="<?php  echo $row['CreationDate'];?>" readonly='true'>
                                                    </div>
                                                    <?php } ?>
                                                    <button type="submit" name="submit" id="submit"
                                                        class="btn btn-o btn-primary">
                                                        Actualizar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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