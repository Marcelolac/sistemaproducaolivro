
<?php 
	session_start();
	include('../inc/Conexao.php');
	$usuario = $_SESSION['usuario_logado'];
	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
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
    <!-- Barra superior -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <?php include('barrasuperior.php');?>
      <!-- barra superior Fim -->  
      <!-- Menu inicio -->       
		  <?php include('Menu_funcionario.php');?>
      <!-- Menu fim -->
		</nav>
	</div>
	
	<!--============== -->
	<div id="page-wrapper">
            <div class="row">
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        <span class="glyphicon glyphicon glyphicon-user"></span> Alterações Usuários  
                        </div>
                        <div class="panel-body body-panel">
                          <?php
                            $cod=$_POST['cod'];
                            $email=$_POST['email'];
                            $senha=$_POST['senha'];
                            $senha_alter = crypt($_POST['senha_alter']);

                              if(crypt($senha_alter, $senha) == $senha){
                              echo "<script>
                                      alert('Sua senha é igual a atual, escolha outra senha!');
                                      window.location.href='alterarsenha_funcionario.php';
                                    </script>";
                              
                            }else{
                            require("../inc/Conexao.php");
                            mysqli_query($criar_con, "update usuario set senha='$senha_alter' where pk_usuario='$cod'") or die ("Não é possível alterar dados da Pessoa!");
                            print("$email<br><p>");
                              print("Sua senha foi alterada com Sucesso!");
                            }
                          ?>
                          <p><center><a href="logout.php"><button type="button" class="btn btn-success">Voltar</button></a></center>
                       </div> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
     <!-- jQuery -->
    <script src="../jquery/jquery.min.js"></script>
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