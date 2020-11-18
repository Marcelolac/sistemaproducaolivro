<?php



    $pk_livro = $_POST['aprovar'];
    
    $situacao = "Aprovado";
        require("../inc/Conexao.php");   
        mysqli_query($criar_con, "update livro set situacao='$situacao' where pk_livro='$pk_livro'");
            echo "<script>
                    alert('Disciplina Aprovada pelo Autor com sucesso!');
                    window.location.href='../Frontend/aprovar_livro_autor.php';
			    </script>"
?>