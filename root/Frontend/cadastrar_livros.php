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
                        <span class="glyphicon glyphicon-book"></span> Cadastrar Livros
                        </div>
                        <div class="panel-body body-panel">
                        <form action="../Backend/cadastro_de_livro.php" method="POST">
                            
                          <div class="form-group">
                            <label>Código do Livro:</label>
                            <input required="required" type="text" class="form-control" placeholder="Digite o codigo" name="codigo">
                          </div>

                          <div class="form-group">
                            <label>Semestre:</label>
                            <input required="required" type="text" class="form-control" placeholder="Digite o semetre Ex. 2019/2" name="semestre">
                          </div>

                          <div class="form-group">
                            <label>Curso:</label>
                            <input required="required" type="text" class="form-control" placeholder="Digite o curso" name="curso">
                          </div>
                          
                          <div class="form-group">
                            <label>Disciplina:</label>
                            <input required="required" type="text" class="form-control" placeholder="Digite a Disciplina" name="disciplina">
                          </div>

                          <div class="form-group">
                            <label>Autor(a) Responsável:</label>
                            <select class="form-control" name='autor'>
									
                          <option value="" selected disabled hidden>Selecione um Autor</option>
                            <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE fk_perfil_usuario= 3 ORDER BY nome_usuario");
                              while ($linha=mysqli_fetch_array($resultado)) {
                                $nome_usuario  =  $linha["nome_usuario"];
                                $pk_usuario = $linha["pk_usuario"];
                                
                                echo "<option>$nome_usuario</option>";
                              }
                              ?> 
                            </select>
                          </div>
						   
                          <center><button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Cadastrar </button>
					            	  <button type="reset" name="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> Limpar </button></center>
                        </form>
                       </div> 

                       <!-- formulario de cadastro Fim-->
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