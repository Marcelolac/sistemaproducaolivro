 <?php
	$GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);
	$Erro = true;
	$nome = $GetPost['nome'];
	$email = $GetPost['email'];
	$email2 = $GetPost['email2'];
	$assunto = $GetPost['assunto']; 
	$mensagem = $GetPost['mensagem'];

	include_once '../PHPMailer/class.smtp.php';
	include_once '../PHPMailer/class.phpmailer.php';

	$Mailer = new PHPMailer();
	$Mailer->CharSet = "utf8";
	
	$Mailer->IsSMTP();
	$Mailer->Host ="smtp.gmail.com";
	$Mailer->SMTPAuth = true;
	$Mailer->Username = "marceloferreiralac@gmail.com";
	$Mailer->Password = "marceloferreiralac993922729";
	$Mailer->SMTPSecure = "ssl";
	$Mailer->Port = 465;
	$Mailer->FromName = "{$nome}";
	$Mailer->From = "{$email}";
	$Mailer->AddAddress("{$email2}");
	$Mailer->IsHTML(true);
	$Mailer->Subject = "Email de Produção de Livros - {$assunto}";
	$Mailer->Body = "{$mensagem}";
	
	if($Mailer->Send()){
		echo "<script>
				alert('Mensagem Enviada com Sucesso!');
				window.location.href='';
				</script>";
	}
	
 ?>