<?php 
	session_start();
	include('../inc/Conexao.php');

	$usuario = $_SESSION['usuario_logado'];
	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $itens_por_paginas=8;
    if (!$pagina) {
        $pagina = 1;
        } else {
        $pagina = $pagina;
    }
   
    $tudo = mysqli_query($criar_con, "SELECT * FROM usuario ");
    //verifica quantas linhas a busca retornou
    $total = mysqli_num_rows($tudo);
    $numero_paginas = ceil($total/$itens_por_paginas);
    $inicio = ($itens_por_paginas*$pagina)-($itens_por_paginas); 
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
            <?php include('Menu_funcionario.php');?>
            <!-- Menu fim -->
	    </nav>        
	</div>

        <!-- Pagina central -->
        <div id="page-wrapper">
            <div class="row">
                <br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Contatos dos Funcionários Cadastrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr Style="background-color:#535353; color:white">
                                            <th ><center>Nome</center></th>
                                            <th ><center>Telefone</center></th>
                                            <th><center>Email</center></th>
                                            <th><center>Cargo</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                           $t=$itens_por_paginas*$pagina;
                                           if($pagina==1){
                                              $inicio=0;
                                            }

                                            $resultado = mysqli_query($criar_con, "SELECT * FROM usuario,perfil where perfil.pk_perfil=usuario.fk_perfil_usuario and (usuario.fk_perfil_usuario=2 or usuario.fk_perfil_usuario=3) ORDER BY nome_usuario ASC limit $inicio, $itens_por_paginas");
                                            
                                             while ($linha=mysqli_fetch_array($resultado)) {
												$codigo = $linha["pk_usuario"];
                                                $nome  =  $linha["nome_usuario"];
                                                $telefone  =  $linha["telefone"];
                                                $email  =  $linha["email"];
                                                $cargo  =  $linha["cargo"];
												$senha  =  $linha["senha"];
												    echo("<tr><td><center>$nome</td>");
                                                    echo("<td><center>$telefone</td>");
                                                    echo("<td><center>$email</td>");
                                                    echo("<td><center>$cargo</td>");	
											}
                                        ?>    
                                        </tbody>
                                </table>
									<!-- /.botão 1,2... -->
                                    <center> 
                                           <nav aria-label="Page navigation">
                                              <ul class="pagination">
                                                <li>
                                                  <a href="contato_funcionario.php?pagina=0" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                  </a>
                                                </li>
                                                <?php
                                                for($i=1;$i<=$numero_paginas;$i++){
                                                    $estilo = "";
                                                    if($pagina==$i)
                                                        $estilo = "class=\"active\"";
                                                    ?>
                                                <li <?php echo $estilo;?> ><a  href="contato_funcionario.php?pagina=<?php  echo  $i; ?>"><?php echo  $i; ?></a></li>
                                                <?php } ?>
                                                <li>
                                                  <a href="contato_funcionario.php?pagina=<?php echo $numero_paginas ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </nav>
                                        </center>
										<!-- /.botão 1,2... fim-->
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
