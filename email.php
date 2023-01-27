<?php

$from = "thalles@gmail.com";

$to = "elielkruz@gmail.com";

$subject = "Vai ter aula hoje?";

$message = "É feriado amanhã professor, vai ter aula?";

$headers  = 'MIME-version: 1.0';
$headers .= 'Content-type: text/html; charset=iso-8859-1';
$headers .= 'From: ' . $from . "\r\n" .
			'Reply-To: ' . $from . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
$status = mail($to, $subject, $message, $headers);

if($status==true){
	print "Enviou mensagem";
}else{
	print " Não foi possivel enviar";
}

