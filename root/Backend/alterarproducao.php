<?php
      $pk_livro = $_POST["pk_livro"];
      $datainiciorevisao  =  $_POST["datainiciorevisao"];
      $revisor  =  $_POST["revisor"];
      $datafimrevisao  =  $_POST["datafimrevisao"];
      $datainicioilustracao  =  $_POST["datainicioilustracao"];
      $ilustrador  =  $_POST["ilustrador"];
      $datafimilustracao =  $_POST["datafimilustracao"];
      $datainiciodiagramacao =  $_POST["datainiciodiagramacao"];
      $diagramador =  $_POST["diagramador"];
      $datafimdiagramacao  =  $_POST["datafimdiagramacao"];
      $situacao  =  $_POST["situacao"];                     
      require("../inc/Conexao.php");                              
      mysqli_query($criar_con, "update livro set datainiciorevisao='$datainiciorevisao', revisor='$revisor', datafimrevisao='$datafimrevisao', datainicioilustracao='$datainicioilustracao', ilustrador='$ilustrador', datafimilustracao='$datafimilustracao', datainiciodiagramacao='$datainiciodiagramacao', diagramador='$diagramador', datafimdiagramacao='$datafimdiagramacao', situacao='$situacao' where pk_livro='$pk_livro'") or die ("Não é possível alterar dados do livro!");
            echo "<script>
		            alert('Alterada com Sucesso!');
		            window.location.href='../Frontend/Funcionario.php';
			</script>";      
?>