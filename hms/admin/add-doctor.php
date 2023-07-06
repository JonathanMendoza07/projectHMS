<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$password=md5($_POST['npass']);
$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
if($sql)
{
echo "<script>alert('Información del médico agregada con éxito');</script>";
echo "<script>window.location.href ='manage-doctors.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrador | Añadir médico</title>

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
        if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
            alert("¡La contraseña y el campo Confirmar contraseña no coinciden!");
            document.adddoc.cfpass.focus();
            return false;
        }
        return true;
    }
    </script>


    <script>
    function checkemailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'emailid=' + $("#docemail").val(),
            type: "POST",
            success: function(data) {
                $("#email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
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
                                <h1 class="mainTitle">Administrador | Añadir médico</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Administrador</span>
                                </li>
                                <li class="active">
                                    <span>Agregar doctor</span>
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
                                                <h5 class="panel-title">Agregar doctor</h5>
                                            </div>
                                            <div class="panel-body">

                                                <form role="form" name="adddoc" method="post"
                                                    onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="DoctorSpecialization">
                                                            Doctor Especialización
                                                        </label>
                                                        <select name="Doctorspecialization" class="form-control"
                                                            required="true">
                                                            <option value="">Seleccionar especialización</option>
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
                                                            placeholder="Ingrese el nombre del médico" required="true">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="address">
                                                            Médico Clínica Dirección
                                                        </label>
                                                        <textarea name="clinicaddress" class="form-control"
                                                            placeholder="Ingrese la dirección de la clínica del médico"
                                                            required="true"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Honorarios de consultoría médico
                                                        </label>
                                                        <input type="text" name="docfees" class="form-control"
                                                            placeholder="Ingrese las tarifas de consulta médica"
                                                            required="true">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Número de contacto del médico
                                                        </label>
                                                        <input type="text" name="doccontact" class="form-control"
                                                            placeholder="Número de contacto del médico" required="true">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Correo electrónico del médico
                                                        </label>
                                                        <input type="email" id="docemail" name="docemail"
                                                            class="form-control"
                                                            placeholder="Ingrese la identificación de correo electrónico del médico"
                                                            required="true" onBlur="checkemailAvailability()">
                                                        <span id="email-availability-status"></span>
                                                    </div>




                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            Contraseña
                                                        </label>
                                                        <input type="password" name="npass" class="form-control"
                                                            placeholder="Nueva contraseña" required="required">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword2">
                                                            Confirmar Contraseña
                                                        </label>
                                                        <input type="password" name="cfpass" class="form-control"
                                                            placeholder="Confirmar contraseña" required="required">
                                                    </div>



                                                    <button type="submit" name="submit" id="submit"
                                                        class="btn btn-o btn-primary">
                                                        Agregar
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