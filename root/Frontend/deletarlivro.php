<?php 
	session_start();
	include('../inc/Conexao.php');

	$usuario = $_SESSION['usuario_logado'];

	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

	$itens_por_paginas=10;
		if (!$pagina) {
			$pagina = 1;
		} else {
			$pagina = $pagina;
		}

	$tudo = mysqli_query($criar_con, "SELECT * FROM usuario");
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

        <!-- Barra superior -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include('barrasuperior.php');?>
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
                        <span class="glyphicon glyphicon glyphicon-user"></span> Deletando Livro  
                        </div>
                        <div class="panel-body body-panel">
							<?php
								$cod=$_GET['cod'];
								
								$result=mysqli_query($criar_con, "select * from livro where pk_livro='$cod'") or die ("Não é possível retornar dados do Livro!");
								$linha=mysqli_fetch_array($result);
								$idadmin=$linha["pk_livro"];
								$codigo = $linha["codigo"];
                $semestre  =  $linha["semestre"];
                $curso  =  $linha["curso"];
                                $disciplina  =  $linha["disciplina"];
                                $autor  =  $linha["autor"];
                                $datainiciorevisao  =  $linha["datainiciorevisao"];
                                $revisor  =  $linha["revisor"];
                                $datafimrevisao  =  $linha["datafimrevisao"];
                                $datainicioilustracao  =  $linha["datainicioilustracao"];
                                $ilustrador  =  $linha["ilustrador"];
                                $datafimilustracao  =  $linha["datafimilustracao"];
                                $datainiciodiagramacao  =  $linha["datainiciodiagramacao"];
                                $diagramador  =  $linha["diagramador"];
                                $datafimdiagramacao  =  $linha["datafimdiagramacao"];
                                $situacao  =  $linha["situacao"];
								
								print("<h4>Deletando Livro:</h4><p>");
								print("Código: $idadmin<br>");
								print("Disciplina: <b>$disciplina</b><br>");
								
								
								
							?>
						<form action="confirma_deletarlivro.php" method="get">
						<input type="hidden" name="cod_del" value="<?php print($idadmin)?>">
						<input type="hidden" name="disciplina" value="<?php print($disciplina)?>">
						
						
						<br><center><input type="submit" value="Deletar Dados" class="btn btn-danger" role="button">   
						<a href="Administrador.php"><button type="button" class="btn btn-warning">Cancelar e Voltar</button></a>	</center>					
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