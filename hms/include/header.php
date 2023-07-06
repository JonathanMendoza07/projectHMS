<?php error_reporting(0);?>
<header class="navbar navbar-default navbar-static-top">
    <!-- inicio: ENCABEZADO DE LA BARRA NAVBAR -->
    <div class="navbar-header">
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle"
            data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify"></i>
        </a>
        <a class="navbar-brand" href="#">
            <h2 style="padding-top:20% ">SGP</h2>
        </a>
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed"
            data-toggle-target="#app">
            <i class="ti-align-justify"></i>
        </a>
        <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse"
            href=".navbar-collapse">
            <span class="sr-only">Navegación de palanca</span>
            <i class="ti-view-grid"></i>
        </a>
    </div>
    <!-- fin: ENCABEZADO DE LA BARRA NAVBAR -->
    <!-- inicio: COLAPSO NAVBAR -->
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-right">
            <!-- inicio: DESPLEGABLE DE MENSAJES -->
            <li style="padding-top:2% ">
                <h2>Sistema de Gestión de Pacientes</h2>
            </li>


            <li class="dropdown current-user">
                <a href class="dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/images.jpg"> <span class="username">



                        <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
	echo $row['fullName'];
}
									?> <i class="ti-angle-down"></i></i></span>
                </a>
                <ul class="dropdown-menu dropdown-dark">
                    <li>
                        <a href="edit-profile.php">
                            Mi Perfil
                        </a>
                    </li>

                    <li>
                        <a href="change-password.php">
                            Cambiar la contraseña
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fin: DESPLEGABLE DE OPCIONES DE USUARIO -->
        </ul>
        <!-- inicio: ALTERNADOR DE MENÚ PARA DISPOSITIVOS MÓVILES -->
        <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <div class="arrow-left"></div>
            <div class="arrow-right"></div>
        </div>
        <!-- end: ALTERNADOR DE MENÚ PARA DISPOSITIVOS MÓVILES -->
    </div>


    <!-- fin: COLAPSO NAVBAR -->
</header>