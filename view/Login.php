<!doctype html>
<html>
<head>
<meta charset="utf-8">

<script src="js/jquery.min.js" type="text/javascript"></script>
<link href="css/prueba/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="js/prueba/Login.js" type="text/javascript"></script>
<title>Documento sin título</title>

<?php 
//session_start();
if(isset($_SESSION["contador"])){
    if($_SESSION["contador"]=="fallo"){
        echo "<script>";
        echo "$(document).ready(function () {";
       echo "fallo();";
        echo "});";
       echo "</script>";
    }
}
?>
 
<style>
	.panel-heading{

  text-align: center;

  text-shadow: 2px 2px 1px rgba(255,255,255,.5);
  font: normal 28px 'League Gothic', Arial, sans-serif;
  letter-spacing: 2px;

 background: rgba(243,216,200,1);
background: -moz-linear-gradient(top, rgba(243,216,200,1) 0%, rgba(153,67,20,1) 2%, rgba(153,67,20,1) 32%, rgba(181,102,59,1) 62%, rgba(196,127,90,1) 76%, rgba(233,199,180,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(243,216,200,1)), color-stop(2%, rgba(153,67,20,1)), color-stop(32%, rgba(153,67,20,1)), color-stop(62%, rgba(181,102,59,1)), color-stop(76%, rgba(196,127,90,1)), color-stop(100%, rgba(233,199,180,1)));
background: -webkit-linear-gradient(top, rgba(243,216,200,1) 0%, rgba(153,67,20,1) 2%, rgba(153,67,20,1) 32%, rgba(181,102,59,1) 62%, rgba(196,127,90,1) 76%, rgba(233,199,180,1) 100%);
background: -o-linear-gradient(top, rgba(243,216,200,1) 0%, rgba(153,67,20,1) 2%, rgba(153,67,20,1) 32%, rgba(181,102,59,1) 62%, rgba(196,127,90,1) 76%, rgba(233,199,180,1) 100%);
background: -ms-linear-gradient(top, rgba(243,216,200,1) 0%, rgba(153,67,20,1) 2%, rgba(153,67,20,1) 32%, rgba(181,102,59,1) 62%, rgba(196,127,90,1) 76%, rgba(233,199,180,1) 100%);
background: linear-gradient(to bottom, rgba(243,216,200,1) 0%, rgba(153,67,20,1) 2%, rgba(153,67,20,1) 32%, rgba(181,102,59,1) 62%, rgba(196,127,90,1) 76%, rgba(233,199,180,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f3d8c8', endColorstr='#e9c7b4', GradientType=0 );
	}

	#enviar{
		margin-left: 95px;
	}
	.panel-default{
		margin-left:575px;
	}

</style>
</head>

<body>


  <form name ="formularioContacto">
    <div class="container">
      <div id="loginbox" style="margin-top: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title" style="color: rgb(255,255,255);">MONCHADOS</div>
        </div>
        <div style="padding-top: 30px" class="panel-body">
          <div style="display: none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="user" name="Usuario" type="text" class="form-control" name="username"
            value="" placeholder="E-mail" required="required" />
          </div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input  id="pass" name="password" type="password" class="form-control" name="clave"
            placeholder="Contraseña" required="required" />
            <label id="error"></label>
          </div>
          <div style="margin-top: 10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls">
              <input type="submit" id="enviar" style="width: 30%; height:30px" class="btn btn-success btn-md" name="enviar" value="Iniciar sesión">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>

