<?php 
  session_start();
  include('../inc/Conexao.php');
  $usuario = $_SESSION['usuario_logado'];

  if(isset($_GET['cod'])){
      $_POST['cod'] = $_GET['cod'];
      $codigo = $_POST['cod'];
  }
  else{
      $codigo = 0;
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SPL Ulbra/EAD</title>

     <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>

<body>

    <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <!-- Barra superior -->
            <?php include('barrasuperior.php');?>
        <!-- barra superior Fim -->  
<!-- Menu inicio -->       
		<?php include('Menu_administrador.php');?>
<!-- Menu fim -->
		</nav>
	</div>

        <!-- Pagina central -->
        <div id="page-wrapper">
            <div class="row">
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        <span class="glyphicon glyphicon glyphicon-user"></span> Chat  
                        </div>
                        <div class="panel-body body-panel">
                        <script  LANGUAGE="JavaScript"> 
                        <!-- 
                          var U = "https://hangouts.google.com/"; 
                          var X = 100; 
                          var Y = 110; 
                          var W = 1500; 
                          var H = 700; 
                          var s="resizable,left="+X+",top="+Y+",screenX="+X+",screenY="+Y+",width="+W+",height="+H; 
                          function popMe(){ 
                          var SGW = window.open(U,'TheWindow',s) 
                        } 
                        // --> 
                        </script> 
                        <label>Clique no icone abaixo</label><br> 
                        <a href="javascript:popMe()"><img src="https://img.icons8.com/color/48/000000/hangout.png"></a>                         

                        
                        <script src="https://hangouts.google.com/" async defer></script>

                      
                       </div> 
                       </div> 

                       <!-- formulario de cadastro -->
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- jQuery -->
    <script src="../jquery/jquery.min.js"></script>
	<script src="../https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- AQUI VAI SER APLICADO O NOSSO JQUERY -->
    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../raphael/raphael.min.js"></script>
    <script src="../morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
</body>

</html>