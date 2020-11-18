<?php 
	session_start();
	include('../inc/Conexao.php');

	$usuario = $_SESSION['usuario_logado'];


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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Administrador.php"> Administrador </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                
                <li>Olá <?php echo $usuario?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="Administrador.php"><i class="fa fa-user fa-fw"></i> Administrador </a>
                        </li>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair </a>
                        </li>
                    </ul>
				</li>
            </ul>
<!-- barra superior Fim -->  
<!-- Menu inicio -->       
		<?php include('Menu_administrador.php');?>
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
                        <span class="glyphicon glyphicon glyphicon-user"></span> Deletando Usuários  
                        </div>
                        <div class="panel-body body-panel">
							<?php
								$cod=$_GET['cod'];
								
								$result=mysqli_query($criar_con, "select * from usuario where pk_usuario='$cod'") or die ("Não é possível retornar dados do usuário!");
								$linha=mysqli_fetch_array($result);
								$idadmin=$linha["pk_usuario"];
								$nome  =  $linha["nome_usuario"];
								$email  =  $linha["email"];
								$senha  =  $linha["senha"];
								
								print("<h4>Deletando Usuários:</h4><p>");
								print("Código: $idadmin<br>");
								print("Nome: <b>$nome</b><br>");
								print("email: $email<br>");
								print("senha: $senha");
								
							?>
						<form action="confirma_deletarusuario.php" method="get">
						<input type="hidden" name="cod_del" value="<?php print($idadmin)?>">
						<input type="hidden" name="nome" value="<?php print($nome)?>">
						
						<br><center><input type="submit" value="Deletar Dados" class="btn btn-danger" role="button">   
						<a href="funcionarios_cadastrados.php"><button type="button" class="btn btn-warning">Cancelar e Voltar</button></a>	</center>					
						</form>
						
                       </div> 

                       
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
	<!--============== -->
	
                       
	<!--============== -->
	
    <!-- /#wrapper -->

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