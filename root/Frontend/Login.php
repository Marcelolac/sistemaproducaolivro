<?php 
	session_start();
	include("../inc/conexao.php");
	//recebe os valores por post
	$email   = $_POST['email']; 
	$senha = $_POST['senha'];

	//senha segura
	
	//verifica se as variaveis email e a senha estão recebendo algum valor
	if (isset($_POST["email"]) && isset($_POST["senha"])) {
			//busca todos os dados do aluno onde o email for igual ao recebido  
			$usuario = mysqli_query($criar_con, "SELECT * FROM usuario WHERE email='$email'") or die ("nao deu para selecionar");
			//armazena os dados retornados do aluno
			$rows = mysqli_fetch_array($usuario);

			//retorna quantidade de linhas que a busca retornou
			$check = mysqli_num_rows($usuario);
			$senha_bd = $rows['senha'];
			//se a busca nao retornou nenhuma linha, esse email nao está cadastrado
			if ($check== 0 ){ //alterei

				echo "<script>
						alert('Usuario nao cadastrado!');
						window.location.href='../index.php';
					</script>";
				exit;	
			}
			
			//se retornou um linha está cadastrado na tabela usuario
			if ($check == 1){
				//se a senha buscada for igual a senha de usuario direciona para página de usuario
				$admin=1;
				
				$funcionario=2;
				$autor=3;
				if ((crypt($senha, $senha_bd) == $senha_bd) && $admin == $rows['fk_perfil_usuario']){
					$_SESSION['usuario_logado'] = $email;
					header("location: Administrador.php");
					exit();	
				} 
				else{
					if((crypt($senha, $senha_bd) == $senha_bd) && $funcionario == $rows['fk_perfil_usuario'] ){
					$_SESSION['usuario_logado'] =  $email;
					header("location: Funcionario.php");
					exit();
					}
					else{
						
						if((crypt($senha, $senha_bd) == $senha_bd) && $autor == $rows['fk_perfil_usuario'] ){
						$_SESSION['usuario_logado'] =  $email;
						header("location: Autor.php");
						exit();
						}
						else{
							echo "<script>
							alert('senha incorreta');
							window.location.href='../index.php';
							</script>";
							exit;	
						}
					}
				}
			}		
	}
?>