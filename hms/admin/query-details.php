<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

// actualizando el comentario del administrador
if(isset($_POST['update']))
		  {
$qid=intval($_GET['id']);
$adminremark=$_POST['adminremark'];
$isread=1;
$query=mysqli_query($con,"update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
if($query){
echo "<script>alert('Comentario del administrador actualizado con éxito.');</script>";
echo "<script>window.location.href ='read-query.php'</script>";
}
		  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrador | Detalles de consulta</title>

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
                                <h1 class="mainTitle">Administrador | Detalles de consulta</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Administrador</span>
                                </li>
                                <li class="active">
                                    <span>Detalles de consulta</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- fin: TÍTULO DE LA PÁGINA -->
                    <!-- inicio: EJEMPLO BÁSICO -->
                    <div class="container-fluid container-fullw bg-white">


                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Administrar <span class="text-bold">Detalles de
                                        consulta</span></h5>
                                <table class="table table-hover" id="sample-table-1">

                                    <tbody>
                                        <?php
$qid=intval($_GET['id']);
$sql=mysqli_query($con,"select * from tblcontactus where id='$qid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                                        <tr>
                                            <th>Full Name</th>
                                            <td><?php echo $row['fullname'];?></td>
                                        </tr>

                                        <tr>
                                            <th>Identificación de correo</th>
                                            <td><?php echo $row['email'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Número de contacto</th>
                                            <td><?php echo $row['contactno'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Mensaje</th>
                                            <td><?php echo $row['message'];?></td>
                                        </tr>

                                        <?php if($row['AdminRemark']==""){?>
                                        <form name="query" method="post">
                                            <tr>
                                                <th>Comentario del administrador</th>
                                                <td><textarea name="adminremark" class="form-control"
                                                        required="true"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary pull-left"
                                                        name="update">
                                                        Actualizar <i class="fa fa-arrow-circle-right"></i>
                                                    </button>

                                                </td>
                                            </tr>

                                        </form>
                                        <?php } else {?>

                                        <tr>
                                            <th>Comentario del administrador</th>
                                            <td><?php echo $row['AdminRemark'];?></td>
                                        </tr>

                                        <tr>
                                            <th>Última fecha de actualización</th>
                                            <td><?php echo $row['LastupdationDate'];?></td>
                                        </tr>

                                        <?php 
											 }} ?>


                                    </tbody>
                                </table>
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

    <!-- start: SETTINGS -->
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