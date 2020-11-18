<?php 
  session_start();
  include('../inc/Conexao.php');
  $usuario = $_SESSION['usuario_logado'];
  if(isset($_GET['cod'])){
      $_POST['cod'] = $_GET['cod'];
      $codigo = $_POST['cod'];
  }
  else{
      $codigo = 0;
  }
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
    <link rel="icon" href="../imagens/icone.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
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
            <!-- barra superior inicio -->
            <?php include('barrasuperior.php');?>
            <!-- barra superior Fim -->
            <!-- Menu inicio -->
            <?php include('Menu_funcionario.php');?>
            <!-- Menu fim -->
        </nav>
    </div>
    <!-- Miolo inicio -->
    <div id="page-wrapper">
        <div class="row">
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Produção de Livros
                            </div>
                            <div class="panel-body">
                                <form action="../backend/alterarproducao.php" method="POST">
                                    <div class="form-group"> 
                                    <script type="text/javascript">
                                        function alimentarCampo() {
                                        var minhaLista = document.getElementById("minhaLista");
                                        var data = minhaLista.options[minhaLista.selectedIndex].value;
                                        var values = data.split(" ");
                                        document.getElementById("campoReceber2").value = values[0];
                                        document.getElementById("campoReceber").value = values[1];                                        
                                        }
                                    </script>
                                        <?php
                                            $resultado = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$usuario'");
                                                while ($linha=mysqli_fetch_array($resultado)) {
                                                    $cod = $linha["pk_usuario"];
                                                    $nome  =  $linha["nome_usuario"];
                                                    $cargo = $linha["cargo"];
                                            }
                                        ?>
                                        <label>Disciplina:</label>
                                        <select required="required" class="form-control" id="minhaLista" name='disciplina' onchange="alimentarCampo();">
                                            <option  value="" selected disabled hidden>Selecione a Disciplina</option>
                                            <?php  $resultado = mysqli_query($criar_con, "SELECT * FROM livro");   
                                                while ($linha=mysqli_fetch_array($resultado)) {
                                                    $pk_livro = $linha["pk_livro"];
                                                    $disciplina  =  $linha["disciplina"];
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
                                                    if($cargo == "revisor(a)" and $situacao == "Aguardando Revisão" or $situacao == "Revisão em Andamento"){
                                                        echo "<option value='$pk_livro $datainiciorevisao $datafimrevisao'>$disciplina</option>";
                                                    }elseif ($cargo == "ilustrador(a)" and $situacao == "Revisão Finalizada"or $situacao == "Ilustração em Andamento"){
                                                        echo "<option value='$pk_livro $datainicioilustracao'>$disciplina</option>";
                                                    }elseif ($cargo == "diagramador(a)" and $situacao == "Ilustração Finalizada"or $situacao == "Diagramação em Andamento"){
                                                        echo "<option value='$pk_livro $datainiciodiagramacao'>$disciplina</option>";
                                                    }  
                                                }  
                                            ?>       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input  type="hidden" class="form-control" name="pk_livro" value="<?php echo($pk_livro)?>" id="campoReceber2" >
                                        <label>Funcionario:</label>
                                        <br>
                                        <?php if($cargo == "revisor(a)"){?>
                                                <input  type="text" class="form-control" name="revisor" value="<?php echo $nome;?>">
                                                <input type="hidden" class="form-control" name="ilustrador" value="<?php echo $ilustrador;?>">
                                                <input type="hidden" class="form-control" name="diagramador" value="<?php echo $diagramador;?>">
                                        <?php ;} else if($cargo == "ilustrador(a)"){?>
                                                <input  type="hidden" class="form-control" name="revisor" value="<?php echo $revisor;?>">
                                                <input type="text" class="form-control" name="ilustrador" value="<?php echo $nome;?>">
                                                <input type="hidden" class="form-control" name="diagramador" value="<?php echo $diagramador;?>">
                                        <?php ;} else if($cargo == "diagramador(a)"){?>
                                                <input  type="hidden" class="form-control" name="revisor" value="<?php echo $revisor;?>">
                                                <input type="hidden" class="form-control" name="ilustrador" value="<?php echo $ilustrador;?>">
                                                <input type="text" class="form-control" name="diagramador" value="<?php echo $nome;?>">
                                        <?php ;} ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Cargo:</label>
                                        <input type="text" disabled="disabled" class="form-control" name="cargo" value="<?php echo $cargo;?>">
                                    </div>
                                    <p>
                                        <div class="form-group">
                                            <label>Data Inicio:</label>

                                        <?php if($cargo == "revisor(a)"){?>
                                                <input type="date" required="required" class="form-control" name="datainiciorevisao" value="" id="campoReceber" >
                                                <input type="hidden" required="required" class="form-control" name="datainicioilustracao" value="<?php echo $datainicioilustracao;?>" >
                                                <input  type="hidden" required="required" class="form-control" name="datainiciodiagramacao" value="<?php echo $datainiciodiagramacao;?>" >
                                        <?php ;} else if($cargo == "ilustrador(a)"){?>
                                                <input type="hidden" required="required" class="form-control" name="datainiciorevisao" value="<?php echo $datainiciorevisao;?>" >
                                                <input type="date" required="required" class="form-control" name="datainicioilustracao" value="" id="campoReceber">
                                                <input  type="hidden" required="required" class="form-control" name="datainiciodiagramacao" value="<?php echo $datainiciodiagramacao;?>">
                                        <?php ;} else if($cargo == "diagramador(a)"){?>
                                                <input type="hidden" required="required" class="form-control" name="datainiciorevisao" value="<?php echo $datainiciorevisao;?>">
                                                <input type="hidden" required="required" class="form-control" name="datainicioilustracao" value="<?php echo $datainicioilustracao;?>">
                                                <input  type="date" required="required" class="form-control" name="datainiciodiagramacao" value="" id="campoReceber">
                                        <?php ;} ?>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Data Fim:</label>
                                            <?php if($cargo == "revisor(a)"){ ?>
                                                <input  type="date" class="form-control" name="datafimrevisao" value="" id="campoReceber">
                                                <input  type="hidden" class="form-control" name="datafimilustracao" value="<?php echo $datafimilustracao;?>">
                                                <input  type="hidden" class="form-control" name="datafimdiagramacao" value="<?php echo $datafimdiagramacao;?>">
                                            <?php ;} else if($cargo == "ilustrador(a)"){?>
                                                <input  type="hidden" class="form-control" name="datafimrevisao" value="<?php echo $datafimrevisao;?>">
                                                <input  type="date" class="form-control" name="datafimilustracao" value="" id="campoReceber">
                                                <input  type="hidden" class="form-control" name="datafimdiagramacao" value="<?php echo $datafimdiagramacao;?>">
                                            <?php ;} else if($cargo == "diagramador(a)"){?>
                                                    <input  type="hidden" class="form-control" name="datafimrevisao" value="<?php echo $datafimrevisao;?>">
                                                <input  type="hidden" class="form-control" name="datafimilustracao" value="<?php echo $datafimilustracao;?>">
                                                <input  type="date" class="form-control" name="datafimdiagramacao" value="" id="campoReceber">
                                            <?php ;} ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Situação:</label>
                                            <select required="required" class="form-control" name="situacao">
                                                <?php if($cargo == "revisor(a)"){ ?>
                                                    <option  value="Revisão em Andamento">Revisão em Andamento</option>
                                                    <option  value="Revisão Finalizada">Revisão Finalizada</option>
                                                <?php ;} else if($cargo == "ilustrador(a)"){?>
                                                    <option  value="Ilustração em Andamento">Ilustração em Andamento</option>
                                                    <option  value="Ilustração Finalizada">Ilustração Finalizada</option>
                                                <?php ;} else if($cargo == "diagramador(a)"){?>
                                                    <option  value="Diagramação em Andamento">Diagramação em Andamento</option>
                                                    <option  value="Diagramação Finalizada">Diagramação Finalizada</option>
                                                <?php ;} ?>
                                            </select>
                                        </div>
                                       
                                        <center>                                    
                                            <button type="submit" name="submit" class="btn btn-primary"> Produção</button>
                                            <button type="reset" name="reset" class="btn btn-warning"> Limpar</button>
                                        </center>
                                </form>
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