<?php
	include('../inc/Conexao.php');
	
	$codigo = $_POST['codigo'];
	$semestre = $_POST['semestre'];
	$curso = $_POST['curso'];
	$disciplina = $_POST['disciplina'];
	$autor = $_POST['autor'];
	$situacao ="Aguardando Professor(a)";

	if(mysqli_connect_errno($criar_con))
	{
		echo 'Nao conectou';
	}
	//busca todos os dados do livro onde o disciplina for igual ao recebido  
	$usuario = mysqli_query($criar_con, "SELECT codigo FROM livro WHERE (codigo='$codigo' OR disciplina='$disciplina')") or die ("nao deu pra selecionar1");
	//armazena os dados retornados do livro
	$rows = mysqli_fetch_array($usuario);
	//verifica quantas linhas a busca retornou
	$check = mysqli_num_rows($usuario);
	if ($check == 0){
		if($usuario = mysqli_query($criar_con ,"INSERT INTO livro (codigo, semestre, curso, disciplina, autor, situacao) VALUES ('$codigo', '$semestre', '$curso', '$disciplina', '$autor', '$situacao')")){
			echo "<script>
					alert('Livro cadastrado com sucesso!');
					window.location.href='../Frontend/cadastrar_livros.php';
				</script>";
		}
		else{
			echo "Nao inseriu!";
		}
	}
	else{
		echo "<script>
				alert('Esse codigo ou disciplina ja esta cadastrado!');
				window.location.href='../Frontend/cadastrar_livros.php';
				</script>";
	}
?>