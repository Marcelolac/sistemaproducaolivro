<meta charset="utf-8">
<?php

session_start();

include('inc/Conexao.php');

$usuario = $_SESSION['usuario_logado'];

if(mysqli_query($criar_con, "DELETE FROM usuario where pk_usuario='$cod'") or die ("Não é possível deletar usuario!")){

	echo "<script>
			alert('Usuario deletado com sucesso! ');
			window.location.href='autores_cadastrados.php';
			</script>";
	}
	else{

	echo " nao pode ser excluido";
}

?>
