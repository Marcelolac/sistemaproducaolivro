<?php
session_start();
include('inc/Conexao.php');

$usu=$_SESSION['usuario_logado'];


if(isset($_FILES['arquivo'])){

   $extensao = strtolower(substr($_FILES['arquivo']['name'],-4));//pega a extensão do arquivo

        if($extensao[0] != '.'){
           $extensao = strtolower(substr($_FILES['arquivo']['name'],-5));//pega a extensão do arquivo 
		}
   $novo_nome = strtolower($_FILES['arquivo']['name']); //seta nome do arquivo

   //$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
   $diretorio = "uploads/documento_modelo/"; //define o diretorio para onde o arquivo sera salvo

   move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload



   $caminho = $_SERVER['DOCUMENT_ROOT'].'/uploads/documento_modelo/'.$novo_nome; //pega o caminho do arquivo
	  


   $resultado = mysqli_query($criar_con, "SELECT pk_usuario FROM usuario where email='$usu';");

	                while ($linha=mysqli_fetch_array($resultado)) {
	                       $coordenador  =  $linha["pk_usuario"];
	                    }
  
   if($sql = mysqli_query($criar_con ,"INSERT INTO doc_modelo (modelo, fk_usuario_env_modelo, fk_usuario_rec_modelo, caminho, data)VALUES ( '$novo_nome', $coordenador, 0, '$caminho',  NOW())")){

				     echo "<script>
					      alert('Documento enviado para os alunos!');
					   window.location.href='material_aluno.php';
					   </script>";
			    }
			    else{
		      echo "nao inserido";
    }

}

?>