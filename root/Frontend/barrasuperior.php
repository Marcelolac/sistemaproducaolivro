
<!DOCTYPE html>
<html lang="pt-br">
<body>
<!-- Menu inicio -->
<div class="navbar-header" >
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
    </button>         
    <a class="navbar-brand"> Sistema de Produção de Livros </a>
</div>
    <ul class="nav navbar-top-links navbar-right" >
        <li>Olá <?php
            $nome = ['nome_usuario'];
		    $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$usuario'");
              
            while ($linha=mysqli_fetch_array($resultado)) {
                $cod = $linha["pk_usuario"];
                $nome  =  $linha["nome_usuario"];
                echo($nome); 
            }?></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href=""><i class="fa fa-user fa-fw"></i> <?php echo($nome);?></a></li>
            </li>
            <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair </a>
            </li>
                </ul>
			</li>
            </ul>
<!-- Menu fim -->
</body>
</html>