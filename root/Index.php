<?php 
  include("inc/conexao.php"); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login SPL</title>
    <!-- Bootstrap Core CSS  -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" Align="center">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" top="50%" >
                       
                        <h3 class="panel-title">Produção de Livros ULBRA/EAD</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="Frontend/login.php" method="post">
                            <fieldset>
								<label>Digite seu Email e Senha para acessar.</label>
                                <p>
                                <div class="form-group">
                                <input  class="form-control" placeholder="Email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                </div>
                               <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit"> Entrar <span class="glyphicon glyphicon-log-in"></span> </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
</body>
</html>