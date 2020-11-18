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
                                <span class="glyphicon glyphicon glyphicon-user"></span> Alterando Livro:
                            </div>
                            <div class="panel-body body-panel">
                                <?php
                                    $cod=$_GET['cod'];
                                    require("../inc/Conexao.php");
                                    
                                    $result=mysqli_query($criar_con, "select * from livro where pk_livro='$cod'") or die ("Não é possível retornar dados do Livro!");
                                    $linha=mysqli_fetch_array($result);
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
                                    
                                    print("Alterando os dados do Livro:</h3><p>");
							    ?>
                                <form action="confirma_alterarlivro.php" method="POST">
                                    <div class="form-row">
                                        <label class="col-form-label">PK:</label>
									    <input type="text" class="form-control" name="cod_alter" value="<?php print($pk_livro)?>" readonly>

                                        <label class="col-form-label">Código:</label>
                                        <input type="text" class="form-control" name="codigo_alter" value="<?php print($codigo)?>" >

                                        <label class="col-form-label">Semestre:</label>
                                        <input type="text" class="form-control" name="semestre_alter" value="<?php print($semestre)?>" >

                                        <label class="col-form-label">Curso:</label>
                                        <input type="text" class="form-control" name="curso_alter" value="<?php print($curso)?>" >

                                        <label class="col-form-label">Disciplina:</label>
                                        <input type="text" class="form-control" name="disciplina_alter" value="<?php print($disciplina)?>" >

                                        <label class="col-form-label">Autor:</label>
                                        <input type="text" class="form-control" name="autor_alter" value="<?php print($autor)?>" >

                                        <label class="col-form-label">Data Inicio Revisão:</label>
                                        <input type="date" class="form-control" name="datainiciorevisao_alter" value="<?php print($datainiciorevisao)?>" >

                                        <label class="col-form-label"> Revisão:</label>
                                        <input type="text" class="form-control" name="revisor_alter" value="<?php print($revisor)?>">

                                        <label class="col-form-label"> Data Fim Revisao:</label>
                                        <input type="date" class="form-control" name="datafimrevisao_alter" value="<?php print($datafimrevisao)?>" >

                                        <label class="col-form-label"> Data Inicio Ilustracao:</label>
                                        <input type="date" class="form-control" name="datainicioilustracao_alter" value="<?php print($datainicioilustracao)?>" >

                                        <label class="col-form-label"> Ilustracao:</label>
                                        <input type="text" class="form-control" name="ilustrador_alter" value="<?php print($ilustrador)?>" >

                                        <label class="col-form-label"> Data Fim Ilustracao:</label>
                                        <input type="date" class="form-control" name="datafimilustracao_alter" value="<?php print($datafimilustracao)?>" >

                                        <label class="col-form-label"> Data Inicio Diagramacao:</label>
                                        <input type="date" class="form-control" name="datainiciodiagramacao_alter" value="<?php print($datainiciodiagramacao)?>" >

                                        <label class="col-form-label"> Diagramador(a):</label>
                                        <input type="text" class="form-control" name="diagramador_alter" value="<?php print($diagramador)?>" >

                                        <label class="col-form-label"> Data Fim Diagramacao:</label>
                                        <input type="date" class="form-control" name="datafimdiagramacao_alter" value="<?php print($datafimdiagramacao)?>" >

                                        <label class="col-form-label"> Situacao:</label>
                                        <input type="text" class="form-control" name="situacao_alter" value="<?php print($situacao)?>" >
                                    
                                    </div>

                                    <br>
                                        <center><input class="btn btn-success" role="button" type="submit" value="Alterar">
                                        <a href="Administrador.php"><button type="button" class="btn btn-warning">Cancelar e Voltar</button></a> </center>
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