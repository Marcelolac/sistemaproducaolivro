<?php 
    session_start();
    include('../inc/Conexao.php');
    $usuario = $_SESSION['usuario_logado'];
    $tudo = mysqli_query($criar_con, "SELECT * FROM livro");
	//verifica quantas linhas a busca retornou
	$total = mysqli_num_rows($tudo);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo.css">
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
<!-- barra superior inicio -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include('barrasuperior.php')?>
<!-- barra superior Fim --> 
<!-- Menu inicio -->       
		<?php include('Menu_administrador.php');?>
<!-- Menu fim -->
		</nav>
	</div>
<!-- Miolo inicio -->
<div id="page-wrapper">
    <div class="row">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            Livros Pesquisados
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                   <thead>
                                            <tr Style="background-color:#535353; color:white">
                                                <th><center><font size=2%>Código do livro</center></th>
                                                <th><center><font size=2%>Semestre</center></th>
                                                <th><center><font size=2%>Curso</center></th>
                                                <th><center><font size=2%>Disciplina</center></th>
                                                <th><center><font size=2%>Autor</center></th>
                                                <th><center><font size=2%>Inicio Revisão</center></th>
                                                <th><center><font size=2%>Revisor(a)</center></th>
                                                <th><center><font size=2%>Fim Revisão</center></th>
                                                <th><center><font size=2%>Inicio Ilustração</center></th>
                                                <th><center><font size=2%>Ilustrador(a)</center></th>
                                                <th><center><font size=2%>Fim Ilustração</center></th>
                                                <th><center><font size=2%>Inicio Diagramação</center></th>
                                                <th><center><font size=2%>Diagramador(a)</center></th>
                                                <th><center><font size=2%>Fim Diagramação</center></th>
                                                <th><center><font size=2%>Situação</center></th>
                                            </tr>
                                        </thead>

                                    <tbody>
                                        <?php
                                            $codigo = $_POST['codigo'];
                                            $semestre  =  $_POST['semestre'];
                                            $curso  =  $_POST['curso'];
                                            $disciplina  =  $_POST['disciplina'];
                                            $autor  =  $_POST['autor'];
                                            $revisor  =  $_POST['revisor'];
                                            $ilustrador  =  $_POST['ilustrador'];
                                            $diagramador  =  $_POST['diagramador'];
                                            $situacao  =  $_POST['situacao'];
                                            $resultado = mysqli_query($criar_con, "SELECT * FROM livro WHERE ('$codigo' = 'todos'  or codigo = '$codigo') AND ('$semestre' = 'todos' or semestre = '$semestre') AND ('$curso' = 'todos' or curso = '$curso') AND ('$disciplina' = 'todas' or disciplina = '$disciplina') AND ('$autor' = 'todos' or autor = '$autor')  AND ('$revisor' = 'todos' or revisor = '$revisor') AND ('$ilustrador' = 'todos' or ilustrador = '$ilustrador') AND ('$diagramador' = 'todos' or diagramador = '$diagramador') AND ('$situacao' = 'todas' or situacao = '$situacao')");
                                            
                                             while ($linha=mysqli_fetch_array($resultado)) {
                                                $pk_livro = $linha["pk_livro"];
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
													echo("<tr><td><center><font size=2%>$codigo</td>");
                                                    echo("<td><center><font size=2%>$semestre</td>");
													echo("<td><center><font size=2%>$curso</td>");
                                                    echo("<td><font size=2>$disciplina</td>");
                                                    echo("<td><center><font size=2%>$autor</td>");
                                                    echo("<td><center><font size=2%>$datainiciorevisao</td>");
                                                    echo("<td><center><font size=2%>$revisor</td>");
                                                    echo("<td><center><font size=2%>$datafimrevisao</td>");
                                                    echo("<td><center><font size=2%>$datainicioilustracao</td>");
                                                    echo("<td><center><font size=2%>$ilustrador</td>");
                                                    echo("<td><center><font size=2%>$datafimilustracao</td>");
                                                    echo("<td><center><font size=2%>$datainiciodiagramacao</td>");
                                                    echo("<td><center><font size=2%>$diagramador</td>");
                                                    echo("<td><center><font size=2%>$datafimdiagramacao</td>");
                                                    echo("<td><center><font size=2%>$situacao</td>");
												
											}
                                            if(!empty($pk_livro)){
												echo ("<p>O(s) Livro(s) Pesquisado(s) é ou São:</p>");
											}else{
												echo ("<p>Não há nenhum Livro na Base de dados com essas Caracteristicas!</p>");
											}
                                        ?>    
                                        </tbody>
                                </table>
                                <p><center><a href="../Frontend/pesquisar_livros_administrador.php"><button type="button" class="btn btn-success">Voltar para nova Pesquisa</button></a></center>
							</div>
						</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<!-- Miolo Fim -->
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