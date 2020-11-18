
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
                        <span class="glyphicon glyphicon glyphicon-user"></span> Alterar Livro  
                        </div>
                        <div class="panel-body body-panel">
                            <?php
                                    $pk_livro_alter = $_POST["cod_alter"];
                                    $codigo_alter = $_POST["codigo_alter"];
                                    $semestre_alter  =  $_POST["semestre_alter"];
                                    $curso_alter  =  $_POST["curso_alter"];
                                    $disciplina_alter  =  $_POST["disciplina_alter"];
                                    $autor_alter  =  $_POST["autor_alter"];
                                    $datainiciorevisao_alter  =  $_POST["datainiciorevisao_alter"];
                                    $revisor_alter  =  $_POST["revisor_alter"];
                                    $datafimrevisao_alter  =  $_POST["datafimrevisao_alter"];
                                    $datainicioilustracao_alter  =  $_POST["datainicioilustracao_alter"];
                                    $ilustrador_alter  =  $_POST["ilustrador_alter"];
                                    $datafimilustracao_alter  =  $_POST["datafimilustracao_alter"];
                                    $datainiciodiagramacao_alter  =  $_POST["datainiciodiagramacao_alter"];
                                    $diagramador_alter  =  $_POST["diagramador_alter"];
                                    $datafimdiagramacao_alter  =  $_POST["datafimdiagramacao_alter"];
                                    $situacao_alter  =  $_POST["situacao_alter"];
                              
                              require("../inc/Conexao.php");
                                              
                              print("Alterações do Livro realizada:<p>");
                              print("PK: $pk_livro_alter<br>Código: $codigo_alter<br>Semestre: <b>$semestre_alter</b><br>Curso: <b>$curso_alter</b> <br>Disciplina:<b>$disciplina_alter</b> <br>Autor(a): $autor_alter <br>Data Inicio Revisão: $datainiciorevisao_alter <br>Revisor(a): $revisor_alter <br>Data Fim Revisão: $datafimrevisao_alter <br>Data Inicio Ilustração: $datainicioilustracao_alter <br>Ilustrador: $ilustrador_alter <br>Data Fim Ilustração: $datafimilustracao_alter <br>Data Inicio Diagramação(a): $datainiciodiagramacao_alter <br>Diagramador(a): $diagramador_alter <br>Data Fim Diagramação: $datafimdiagramacao_alter <br>Situação: $situacao_alter<p>");
                              
                              mysqli_query($criar_con, "update livro set codigo='$codigo_alter', semestre='$semestre_alter', curso='$curso_alter',  disciplina='$disciplina_alter', autor='$autor_alter',  datainiciorevisao='$datainiciorevisao_alter', revisor='$revisor_alter', datafimrevisao='$datafimrevisao_alter', datainicioilustracao='$datainicioilustracao_alter', ilustrador='$ilustrador_alter', datafimilustracao='$datafimilustracao_alter', datainiciodiagramacao='$datainiciodiagramacao_alter', diagramador='$diagramador_alter', datafimdiagramacao='$datafimdiagramacao_alter', situacao='$situacao_alter' where pk_livro='$pk_livro_alter'") or die ("Não é possível alterar dados do livro!");
                                            print("Dados do livro alterados com sucesso!");
                            ?>
                            
                            <p><center><a href="Administrador.php"><button type="button" class="btn btn-success">Voltar</button></a></center>
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