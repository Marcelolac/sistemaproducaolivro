<?php 
session_start();

include('inc/Conexao.php');

$usuario = $_SESSION['usuario_logado'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="css/Estilo.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home_orientador</title>

     <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="Home_orientador.php">Inicio</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

            <?php  

                $orientador = mysqli_query($criar_con ,"SELECT pk_usuario FROM usuario where email = '$usuario'");

                while ($linha=mysqli_fetch_array($orientador)) {
                    $cod_orientador  =  $linha["pk_usuario"];
                 }

                $sol = mysqli_query($criar_con ,"SELECT * FROM solicitacao where fk_usuario_rec_solicitacao = $cod_orientador");
                $cont = 0;
                $cont2 = 0;
                while ($linhas=mysqli_fetch_array($sol)) {
                    $sit  =  $linhas["situacao"];
                    if($sit != "Aguardando..."){
                       $cont++;
                       }
                 }

                $solicitacao = mysqli_num_rows($sol);
                 if (!$solicitacao) {
                      $solicitacao = 0;
                      $sit = "";
                      } else {
                      $solicitacao = $solicitacao - $cont;
                      }

                $usu = mysqli_query($criar_con ,"SELECT u.nome_usuario, u.pk_usuario, s.situacao FROM usuario AS u JOIN solicitacao AS s ON u.pk_usuario = s.fk_usuario_env_solicitacao");

                  $quant_usu = mysqli_num_rows($usu);
                 if (!$quant_usu) {
                      $nome_aluno = "";
                    }

                    ?>
                    <li class='dropdown'>
                            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                               <small class='stat-bubble' count='6'><?php echo $solicitacao; ?></small> <i class='fa fa-bell fa-fw'></i> <i class='fa fa-caret-down'></i>
                            </a>
                            <ul class='dropdown-menu scrollable-menu' role='menu'>
                            <?php 

                                while ($linha=mysqli_fetch_array($usu)) {
                                   $cod_aluno  =  $linha['pk_usuario'];
                                   $nome_aluno  =  $linha['nome_usuario'];
                                   $situa  =  $linha['situacao'];

                                   if ($situa == "Aguardando...") {

                                   echo (" <li><a>O aluno <b>$nome_aluno</b> enviou uma solicitação de orientação</a>
                                    <div class='container-fluid'>
                                        <div class='row text-center'>
                                          <a href='aceite_da_solicitacao.php?cod_alu=$cod_aluno&s=1&cod_ori=$cod_orientador' class='btn btn-success'>aceitar</a>
                                          <a href='aceite_da_solicitacao.php?cod_alu=$cod_aluno&s=0&cod_ori=$cod_orientador' class='btn btn-danger'>recusar</a>
                                        </div>
                                    </div>
                                    </li>
                                    <li class='divider'></li>");
                                    }
                                }
                            ?>
                            </ul>
                    </li>
                <li><?php echo "$usuario";  ?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Usuario</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="avaliador.php"><i class="fa fa-file-text-o fa-fw"></i>Avaliar propostas<span class="fa arrow"></span></a>
                        </li>
                       
                        <li>
                            <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="relatorio_alunos_orientados.php">Relatório de alunos orientados e temas abordados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Pagina central -->
        <div id="page-wrapper">
            <div class="row">
                <br>
                <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                        Relação de mensagens
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                 <?php

                        $mensagem = mysqli_query($criar_con ,"SELECT DATE_FORMAT(data_mensagem,'%H:%i:%s - %d/%m/%Y') as data, pk_usuario, nome_usuario, mensagem FROM mensagem AS m JOIN usuario AS u ON m.fk_usuario_rec_mensagem = $cod_orientador and u.pk_usuario = m.fk_usuario_env_mensagem group by u.nome_usuario");

                        $quant_mens = mysqli_num_rows($mensagem);
                                if (!$quant_mens) {
                                  $mens = "";
                                }

                      $i=1;
                    echo "<div class=\"panel-group\" id=\"accordion\">";
                     while ($linha=mysqli_fetch_array($mensagem)) {
                               //$mens  =  $linha["mensagem"];
                               //$data  =  $linha["data"];
                               $nome  =  $linha["nome_usuario"];
                               $codigo_aluno  =  $linha["pk_usuario"];

                                
                    echo "<div class=\"panel panel-info\">
                      <div class=\"panel-heading\">
                        <h4 class=\"panel-title\">
                          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse$i\">
                          $nome</a>
                        </h4>
                      </div>
                      <div id=\"collapse$i\" class=\"panel-collapse collapse\">
                        <div class=\"panel-body scrollable-menu\">";
                         $a = mysqli_query($criar_con ,"SELECT  DATE_FORMAT(data_mensagem,'%H:%i:%s - %d/%m/%Y') as data, mensagem, nome_usuario FROM mensagem  as m join usuario as u on (m.fk_usuario_env_mensagem = $codigo_aluno and m.fk_usuario_rec_mensagem = $cod_orientador and m.fk_usuario_env_mensagem = u.pk_usuario) or (m.fk_usuario_env_mensagem = $cod_orientador and m.fk_usuario_rec_mensagem = $codigo_aluno and m.fk_usuario_env_mensagem = u.pk_usuario )  ");
                        while ($linha=mysqli_fetch_array($a)) {
                               $n  =  $linha["nome_usuario"];
                               $mens  =  $linha["mensagem"];
                               $data  =  $linha["data"];

                        echo "<label>$n</label> $data<br>$mens<br><br>";

                       }
                        $i++;
                       echo "
                        </div>
                      </div>
                    </div>";
                    }
                        ?>
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
    <script src="jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="raphael/raphael.min.js"></script>
    <script src="morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>




