<?php
	include('../inc/Conexao.php');
	$nome = $_POST['nome'];
	$cargo = $_POST['cargo'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$senha = crypt($_POST['senha']);
	if ($cargo == "autor(a)"){
		$perfil = 3;
	}else{
		$perfil = 2;
	}
	if(mysqli_connect_errno($criar_con))
	{
		echo 'Nao conectou';
	}
	//busca todos os dados do aluno onde o email for igual ao recebido  
	$usuario = mysqli_query($criar_con, "SELECT email FROM usuario WHERE email='$email'") or die ("nao deu pra selecionar1");
	//armazena os dados retornados do aluno
	$rows = mysqli_fetch_array($usuario);
	//verifica quantas linhas a busca retornou
	$check = mysqli_num_rows($usuario);
	if ($check == 0){
		if($usuario = mysqli_query($criar_con ,"INSERT INTO usuario (fk_perfil_usuario, nome_usuario, cargo, telefone, email, senha) VALUES ('$perfil', '$nome', '$cargo', '$telefone', '$email', '$senha')")){
			echo "<script>
					alert('Usuario cadastrado com sucesso!');
					window.location.href='../Frontend/cadastrar_usuarios1.php';
					</script>";
			}
			else{
				echo "nao inserido";
			}
	}
	else{
		echo "<script>
				alert('Este email ja esta cadastrado! Tente com outro Email');
				window.location.href='../Frontend/cadastrar_usuarios1.php';
				</script>";
	}
?>