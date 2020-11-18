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
            <?php include('Menu_autor.php');?>
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
                                <span class="glyphicon glyphicon glyphicon-user"></span> Alterando Senha:
                            </div>
                            <div class="panel-body body-panel">
                                <?php
                                    require("../inc/Conexao.php");
                                    $result=mysqli_query($criar_con, "select * from usuario where pk_usuario='$cod'") or die ("Não é possível retornar dados do Usuário!");
                                    $linha=mysqli_fetch_array($result);
                                    $Codigo=$linha["pk_usuario"];
                                    $nome=$linha["nome_usuario"];
                                    $email=$linha["email"];
                                    $senha=$linha["senha"];
                                    $email=$linha["email"]; 
                                    print("Alterando senha do Usuário:</h3><p>");
							    ?>
                                <form action="confirma_alterarsenha.php" method="POST">
                                    <div class="form-row">   
                                        <label class="col-form-label">Usuário:</label>
                                        <input type="text" class="form-control" name="email" value="<?php print($email)?>" readonly>
                                        <input type="HIDDEN" class="form-control" name="cod" value="<?php print($Codigo)?>" readonly>
                                        <input type="HIDDEN" class="form-control" name="senha" value="<?php print($senha)?>" readonly>
                                        <br>
                                        <label class="col-form-label">Nova Senha:</label>
                                        
                                        <input placeholder="Digite sua nova senha" type="password" class="form-control" name="senha_alter" id="password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" >
                                    </div>
                                    <br>
                                    <center><input class="btn btn-success" role="button" type="submit" value="Alterar">
                                        <a href="Autor.php"><button type="button" class="btn btn-warning">Cancelar e Voltar</button></a> </center>
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