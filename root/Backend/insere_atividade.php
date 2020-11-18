<?php
session_start();
include('inc/Conexao.php');

$usu=$_SESSION['usuario_logado'];

$atividade = $_POST['ativ'];

if(isset($_FILES['arquivo'])){

   $extensao = strtolower(substr($_FILES['arquivo']['name'],-4));//pega a extensão do arquivo

        if($extensao[0] != '.'){
           $extensao = strtolower(substr($_FILES['arquivo']['name'],-5));//pega a extensão do arquivo 
		}
   $novo_nome = strtolower($_FILES['arquivo']['name']); //seta nome do arquivo

   $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
   $diretorio = "uploads/atividades/"; //define o diretorio para onde o arquivo sera salvo

   move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload



   $caminho = $_SERVER['DOCUMENT_ROOT'].'/uploads/atividades/'.$novo_nome; //pega o caminho do arquivo

   $resultado = mysqli_query($criar_con, "SELECT pk_usuario FROM usuario where email='$usu';");

	                while ($linha=mysqli_fetch_array($resultado)) {
	                       $aluno  =  $linha["pk_usuario"];
	                    }

   $av = mysqli_query($criar_con, "SELECT fk_usuario_avaliador FROM avaliacao where fk_usuario_avaliado = $aluno;");

   while ($linha=mysqli_fetch_array($av)) {
      //var_dump($linha);
      if (empty($avaliador1)){
        $avaliador1  =  $linha["fk_usuario_avaliador"];
      }
      else{
	    $avaliador2  =  $linha["fk_usuario_avaliador"];
      }
    }
  
   if($sql = mysqli_query($criar_con ,"INSERT INTO doc_modelo (modelo, fk_usuario_env_modelo, fk_usuario_rec_modelo, caminho, data, fk_atividades_modelo, estatus)VALUES ( '$novo_nome', $aluno, 1, '$caminho',  NOW(), $atividade, 'Entregue')")){
      $sql = mysqli_query($criar_con ,"INSERT INTO doc_modelo (modelo, fk_usuario_env_modelo, fk_usuario_rec_modelo, caminho, data, fk_atividades_modelo, estatus)VALUES ( '$novo_nome', $aluno, $avaliador1, '$caminho',  NOW(), $atividade, 'Entregue')");
      $sql = mysqli_query($criar_con ,"INSERT INTO doc_modelo (modelo, fk_usuario_env_modelo, fk_usuario_rec_modelo, caminho, data, fk_atividades_modelo, estatus)VALUES ( '$novo_nome', $aluno, $avaliador2, '$caminho',  NOW(), $atividade, 'Entregue')");

				     echo "<script>
					   alert('Documento enviado com sucesso!');
					   window.location.href='Home_aluno.php';
					   </script>";
			    }
			    else{
		      echo "nao inserido<br><br>$atividade<br>$aluno";
          }
}

?>