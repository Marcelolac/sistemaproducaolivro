<?php 
session_start();
include('inc/Conexao.php');

$usuario = $_SESSION['usuario_logado'];

$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

$itens_por_paginas=6;
  //$pagina=$_GET['pagina'];
  if (!$pagina) {
  $pagina = 1;
  } else {
  $pagina = $pagina;
  }
//pegar pagina tual
//$pagina=intval($_GET['pagina']);
$tudo = mysqli_query($criar_con, "SELECT * FROM usuario ");


//verifica quantas linhas a busca retornou
$total = mysqli_num_rows($tudo);

$numero_paginas = ceil($total/$itens_por_paginas);

$inicio = ($itens_por_paginas*$pagina)-($itens_por_paginas); 



/*

   //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 

    $resultado = mysqli_query($criar_con, "SELECT * FROM usuario ");
   
 
    //conta o total de itens 
    $total = mysql_num_rows($resultado); 
 
    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 2; 
 
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 
 
    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros-1; 

*/

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>


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
                <a class="navbar-brand" href="Administrador.php"> Administrador </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                
                <li>Olá <?php echo $usuario?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Administrador </a>
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
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu"> 
						<li><a href="Administrador.php"> Produção de Livros </a></li>
                        <li><a href="cadastrar_livros.php"> Cadastrar Livros </a></li>
						<li><a href="cadastrar_usuarios1.php"> Cadastrar usuários </a></li>
                        <li><a href="funcionarios_cadastrados.php"> Funcionários cadastrados </a></li>
						<li><a href="lista_usuario.php"> Autores cadastrados </a></li>
						<li><a href="pesquisar_livros"> Pesquisar Livros </a></li>
						<li><a href="contatos.php"> Contatos </a></li>
						<li><a href="relatorio_mensagens_coordenador.php"> Relatório de mensagens </a></li>
					</ul>
                </div>
            </div>
      </nav>

        <!-- Pagina central -->
        <div id="page-wrapper">
            <div class="row">
                <br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Relação de usuarios cadastrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><center>Nome</center></th>
                                            <th><center>Contato</center></th>
                                            <th><center>Perfil</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                           $t=$itens_por_paginas*$pagina;
                                           if($pagina==1){
                                              $inicio=0;
                                            }

                                            $resultado = mysqli_query($criar_con, "SELECT * FROM usuario,perfil  where perfil.pk_perfil=usuario.fk_perfil_usuario limit $inicio, $itens_por_paginas");
                                            
                                             while ($linha=mysqli_fetch_array($resultado)) {
                                                $nome  =  $linha["nome_usuario"];
                                                $email  =  $linha["email"];
                                                $perfil  =  $linha["nome_perfil"];
                                                $codigo  =  $linha["pk_usuario"];

                                                      echo("<tr><td><center>$nome
                                                      <div class='dropdown'>
                                                         <div class='btn-group pull-right'>
                                                           <button type='button' class='btn btn-default btn-xs dropdown-toggle' data-toggle='dropdown'>
                                                               <i class='fa fa-chevron-down'></i>
                                                           </button>
                                                           <ul class='dropdown-menu slidedown'>
                                                              <li>
                                                               <a href='deletar_usuario.php?cod=$codigo'>Deletar</a>  
                                                                </a>
                                                              </li>
                                                           </ul>
                                                         </div>
                                                      </div> 
                                                      </td>");
                                                      echo("<td><center>$email</td>");
                                                       echo("<td><center>$perfil</td><tr>");     

                                                }
                                        ?>    
                                        </tbody>
                                </table>

                                        <center> 
                                           <nav aria-label="Page navigation">
                                              <ul class="pagination">
                                                <li>
                                                  <a href="lista_usuario.php?pagina=0" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                  </a>
                                                </li>
                                                <?php
                                                for($i=1;$i<=$numero_paginas;$i++){
                                                    $estilo = "";
                                                    if($pagina==$i)
                                                        $estilo = "class=\"active\"";
                                                    ?>
                                                <li <?php echo $estilo;?> ><a  href="lista_usuario.php?pagina=<?php  echo  $i; ?>"><?php echo  $i; ?></a></li>
                                                <?php } ?>
                                                <li>
                                                  <a href="lista_usuario.php?pagina=<?php echo $numero_paginas ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </nav>
                                        </center>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
