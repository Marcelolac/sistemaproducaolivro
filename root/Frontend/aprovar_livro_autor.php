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
            <?php include('Menu_autor.php');?>
            <!-- Menu fim -->
		</nav>
	</div>
    <!-- Pagina central -->
    <div id="page-wrapper">
        <!-- Menu inicio -->       
<div class="row">
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <span class="glyphicon glyphicon-ok"></span> Disciplina a ser aprovado
                        </div>
                        <div class="panel-body body-panel">
                          <form action="" method="GET">
                            <div class="form-group">
                              <label>Baixar PDF ou acessar link da Disciplina:</label>
                              <?php
                                            $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$usuario'");
                                                while ($linha=mysqli_fetch_array($resultado)) {
                                                    $cod = $linha["pk_usuario"];
                                                    $nome  =  $linha["nome_usuario"];
                                                    $cargo = $linha["cargo"];
                                            }
                                        ?>
                                <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM livro where situacao ='Aguardando Aprovação'");
                                  while ($linha=mysqli_fetch_array($resultado)) {
                                    $disciplina  =  $linha["disciplina"];
                                    $autor = $linha["autor"];
                                    $link = $linha["link"];
                                    $pk_livro = $linha["pk_livro"];
                                    if($autor == $nome){
                                      if($link == ""){
                                        echo("<li><a href='../Backend/baixar_arquivos.php?arquivo=../uploads/aprovacao/$disciplina.pdf'>$disciplina</a></li>");
                                      }else{
                                        echo("<li><a href='$link' target='_blank'>$disciplina</a></li>");
                                      }
                                    }
                                  }
                                ?> 
                            </div>
                          </form>
                        </div>
                       </div> 
                       <!-- formulario de cadastro -->
                      </div>
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        <span class="glyphicon glyphicon-ok"></span>  Aprovar Livro  </div>
                        <div class="panel-body body-panel">
                          <form action="aprovado_livro_autor.php" method="POST">
                            <div class="form-group">
                              <label>Disciplina a ser Aprovada:</label>
                              <select  required="required" class="form-control" name='aprovar'>
                                <?php
                                  $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$usuario'");
                                    while ($linha=mysqli_fetch_array($resultado)) {
                                       $cod = $linha["pk_usuario"];
                                       $nome  =  $linha["nome_usuario"];
                                       $cargo = $linha["cargo"];
                                    }
                                ?>

                              <option value="" selected disabled hidden>Selecione a Disciplina</option>
                                <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM livro where situacao ='Aguardando Aprovação'");
                                  while ($linha=mysqli_fetch_array($resultado)) {
                                    $disciplina  =  $linha["disciplina"];
                                    $autor = $linha["autor"];
                                    $pk_livro = $linha["pk_livro"];
                                    if($autor == $nome){
                                      echo "<option value='$pk_livro'>$disciplina</option>"; 
                                    }
                                  }
                                ?> 
                              </select>
                            </div>
                            <br>
                            <center><button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Aprovar </button>
                            <button type="reset" name="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> Limpar</button></center>
                          </form>
                        </div>
                       </div> 
                       </div> 
                       <!-- formulario de cadastro -->
                      </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<!-- Menu fim -->
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