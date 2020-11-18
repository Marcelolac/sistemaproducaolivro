<?php
require('../inc/Conexao.php');
	$disciplina = $_POST["disciplina"];
    $situacao = "Aguardando Revisão";
       
    mysqli_query($criar_con, "update livro set situacao='$situacao' where disciplina='$disciplina'");
	mkdir("../uploads/producao/$disciplina");
	if(isset($_FILES['arquivo'])){
	$extensao = strtolower(substr($_FILES['arquivo']['name'],-4));//pega a extensão do arquivo
		if($extensao[0] != '.'){
			$extensao = strtolower(substr($_FILES['arquivo']['name'],-5));//pega a extensão do arquivo 
		}
	$novo_nome = $disciplina . $extensao; //seta nome do arquivo
		
	$diretorio = "../uploads/producao/$disciplina/"; //define o diretorio para onde o arquivo sera salvo

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

	$caminho = $_SERVER['DOCUMENT_ROOT'].'/uploads/producao/'.$novo_nome; //pega o caminho do arquivo
		echo "<script>
					alert('Documento enviado com sucesso!');
					window.location.href='Autor.php';
				</script>";
	}else{
		echo "<script>
					alert('Não deu!');
					window.location.href='Auto.php';
				</script>";
	}
?>