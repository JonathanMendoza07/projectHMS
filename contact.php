<?php
include_once('hms/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Su información se ha enviada con éxito');</script>";
echo "<script>window.location.href ='contact.php'</script>";

}


?>
<!DOCTYPE HTML>
<html>

<head>
    <title>SGP | Contáctanos</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <!--start-wrap-->

    <!--start-header-->
    <div class="header">
        <div class="wrap">
            <!--start-logo-->
            <div class="logo">
                <a href="index.html" style="font-size: 30px;">Sistema de Gestión de Pacientes</a>
            </div>
            <!--end-logo-->
            <!--start-top-nav-->
            <div class="top-nav">
                <ul>
                    <li><a href="index.html">Inicio</a></li>

                    <li class="active"><a href="contact.php">Contacto</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            <!--end-top-nav-->
        </div>
        <!--end-header-->
    </div>
    <div class="clear"> </div>
    <div class="wrap">
        <div class="contact">
            <div class="section group">
                <div class="col span_1_of_3">

                    <div class="company_address">
                        <h2>Dirección del hospital :</h2>
                        <p>Avenida las americas,</p>
                        <p>2-656-838 Diagonal al paseo Shopping</p>
                        <p>Ecuador-Manta</p>
                        <p>Télefono:(00) 222 666 444</p>
                        <p>Fax: (000) 000 00 00 0</p>
                        <p>Email: <span>info@mycompany.com</span></p>

                    </div>
                </div>
                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h2>Contáctanos</h2>
                        <form name="contactus" method="post">
                            <div>
                                <span><label>Nombre</label></span>
                                <span><input type="text" name="fullname" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>Email</label></span>
                                <span><input type="email" name="emailid" required="ture" value=""></span>
                            </div>
                            <div>
                                <span><label>Télefono</label></span>
                                <span><input type="text" name="mobileno" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>Descripción</label></span>
                                <span><textarea name="description" required="true"> </textarea></span>
                            </div>
                            <div>
                                <span><input type="submit" name="submit" value="Enviar"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="footer">
        <div class="wrap">
            <div class="footer-left">
                <ul>
                    <li><a href="index.html">Inicio</a></li>

                    <li><a href="contact.php">Contacto</a></li>
                </ul>
            </div>

            <div class="clear"> </div>
        </div>
    </div>
    <!--end-wrap-->
</body>

</html>