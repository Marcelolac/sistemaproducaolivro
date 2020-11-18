<?php
	$criar_con = mysqli_connect('localhost', 'root', 'usbw') or die("aqui nao deu");
	mysqli_select_db($criar_con, 'sistema2') or die("nao selecionou");

	if(mysqli_connect_errno($criar_con))
	{
		echo 'Nao conectou';
	}
	
?>