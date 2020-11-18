<?php
    $pk_livro = $_POST['aprovar'];
   
    $situacao = "Aprovado";
        require("../inc/Conexao.php");   
        mysqli_query($criar_con, "update livro set situacao='$situacao' where pk_livro='$pk_livro'") or die ("Não é possível alterar dados da Pessoa!");
            echo "<script>
                    alert('Aprovado pelo Administrador com sucesso!');
                    window.location.href='../Frontend/aprovar_livro_administrador.php';
			    </script>"
?>