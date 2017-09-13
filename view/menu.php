<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <!-- menu css -->
        <link href="css/smartmenus/sm-blue.css" rel="stylesheet" type="text/css"/>
        <link href="css/smartmenus/sm-core-css.css" rel="stylesheet" type="text/css"/>
        <link href="css/smartmenus/sm-clean.css" rel="stylesheet" type="text/css"/>
        <link href="css/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/_cssmenu/site.css" rel="stylesheet">
        <!-- menu js -->
        <script src="js/prueba/jquery-1.12.3.js" type="text/javascript"></script>
        <script src="css/smartmenus/jquery.smartmenus.min.js" type="text/javascript"></script>
        <script src="js/js/menu.js" type="text/javascript"></script>
        <!-- datatable js -->
        <script src="js/prueba/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- datatable css -->
        <link href="css/prueba/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/prueba/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- redirecciones-->
        <script src="js/js/Redireccion.js" type="text/javascript"></script>
        <script src="js/prueba/jquery.validate.js" type="text/javascript"></script>
        <!-- otras-->
        <script src="js/jquery-ui.min.js"></script>
        <link href="css/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert2-master/dist/sweetalert2.min.js" type="text/javascript"></script>
        <link href="js/sweetalert2-master/dist/sweetalert2.css" rel="stylesheet" type="text/css"/>
        <script src="js/prueba/Logout.js" type="text/javascript"></script>
    </head>

    <?php
    //session_start();
    if (!isset($_SESSION["Usuario"])) {
        $this->redirect("Login", "index");
    }
    ?>
    <body>
        <div class="wrapper">
            <header>
                <h1>MONCHADOS</h1>
            </header>
            <div class="content">
                <div style="margin-left:60;margin-right:-220px;">
                    <?php
                    $ID = $_SESSION["ID"];
                    $host = "localhost";
                    $user = "root";
                    $clave = "flor22";
                    $db = "restaurante";

                    $conectarBD = new mysqli($host, $user, $clave, $db, 3306);
                    if ($conectarBD->connect_errno) {
                        die("ERROR : -> " . $conectarBD->connect_error);
                    }
                    mysqli_set_charset($conectarBD, "utf8");
                    if ($sql = mysqli_prepare($conectarBD, "SELECT itemRol FROM roles AS c, registroroles AS r WHERE c.codRol=r.codRol AND r.codigoUsuario='$ID'AND r.estadoRegRol= 1")) {
                        echo '<ul id="MENU" class="sm sm-clean">';
                        $i = 0;
                        mysqli_stmt_execute($sql);
                        mysqli_stmt_bind_result($sql, $ITEM);
                        while (mysqli_stmt_fetch($sql) == true) {
                            echo $ITEM;
                        }
                    }
                    ?>
                    <li>
                        <a id="SalirSistema" href="#"><?php echo $_SESSION["Usuario"] ?></a>
                    </li>
                </div> 
            </div>
         <article id="contenido" ></article>
    </body>



