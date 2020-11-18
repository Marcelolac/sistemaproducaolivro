<?php 
	session_start();
	include('../inc/Conexao.php');
	$usuario = $_SESSION['usuario_logado'];
	
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/chat.css">
    <link rel="stylesheet" type="text/css" href="../css/Estilo.css">
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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" >
            <!-- barra superior inicio -->
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
                            <div class="panel-heading">Livros em Produção</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-condensed" >
                                        <thead>
                                            <tr Style="background-color:#535353; color:white">
                                                <th><center><font size=2%>Cód.</center></th>
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
                                                <th><center><font size=2%>Alterar</center></th>
                                                <th><center><font size=2%>Deletar</center></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $resultado = mysqli_query($criar_con, "SELECT * FROM livro");
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
                                                        echo("<td><font size=2%>$disciplina</td>");
                                                        echo("<td><center><font size=2%>$autor</td>");
                                                        echo ("<td><center><font size=2%>$datainiciorevisao</td>");
                                                        echo("<td><center><font size=2%>$revisor</td>");
                                                        echo("<td><center><font size=2%>$datafimrevisao</td>");
                                                        echo("<td><center><font size=2%>$datainicioilustracao</td>");
                                                        echo("<td><center><font size=2%>$ilustrador</td>");
                                                        echo("<td><center><font size=2%>$datafimilustracao</td>");
                                                        echo("<td><center><font size=2%>$datainiciodiagramacao</td>");
                                                        echo("<td><center><font size=2%>$diagramador</td>");
                                                        echo("<td><center><font size=2%>$datafimdiagramacao</td>");
                                                        echo("<td><center><font size=2%>$situacao</td>");											
                                                        echo("<td><center><a href='alterarlivro.php?cod=$pk_livro'><button type=\"button\" class=\"btn btn-success\">Alterar</button></a></center></td>");
                                                        echo("<td><center><a href='deletarlivro.php?cod=$pk_livro'><button type=\"button\" class=\"btn btn-danger\">Deletar</button></a></center></td></tr>");
                                                }
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                       
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
    <script src="vmetisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../raphael/raphael.min.js"></script>
    <script src="../morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
</body>
</html>