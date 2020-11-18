<?php
session_start();
include('inc/Conexao.php');

$usu=$_SESSION['usuario_logado'];


define('DIR_DOWNLOAD', 'uploads/arquivos_de_mensagem/');


$arquivo = $_GET['arquivo'];
// Retira caracteres especiais
$arquivo = filter_var($arquivo, FILTER_SANITIZE_STRING);
// Retira qualquer ocorrência de retorno de diretório que possa existir, deixando apenas o nome do arquivo
$arquivo = basename($arquivo);

// Aqui junta o diretório com o nome do arquivo
$caminho_download = DIR_DOWNLOAD . $arquivo;

// Verificação da existência do arquivo
if (!file_exists($caminho_download))
die('Arquivo não existe!');

header('Content-type: octet/stream');

// Indica o nome do arquivo como será "baixado". Você pode modificar e colocar qualquer nome de arquivo
header('Content-disposition: attachment; filename="'.$arquivo.'";'); 

// Indica ao navegador qual é o tamanho do arquivo
header('Content-Length: '.filesize($caminho_download));

// Busca todo o arquivo e joga o seu conteúdo para que possa ser baixado
readfile($caminho_download);

exit;

?>