<?php
if ($_SESSION['nivel'] < 9){
    echo "É preciso estar logado E ter perfil de administrador para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui. ";
    exit;
} else {

$avaliador 	=$_POST["avaliador"];
$id_trabalho=$_POST["id_trabalho"];
$titulo		=$_POST["titulo"];
$autor		=$_POST["autor"];
$arquivo	=$_POST["arquivo"];
require_once("./banco/connect.php");
$atribuiRevisor = $conn->query("UPDATE `jornada2018`.`trabalho` SET `temrevisor` = '".$avaliador."' WHERE `trabalho`.`id_trabalho` = ".$id_trabalho.";");


if(mysqli_affected_rows($conn) != 0){
	echo "<p>Foi atribuído um revisor para o trabalho ID: ".$id_trabalho."</p>
		<p><a href='index.php?p=adm' target=''>Clique aqui para atribuir mais um</a></p>
	";

    $enviarEmail = $conn->query("SELECT `id-avaliador` , `nome` , `email` , `senha` FROM `avaliador` WHERE `id-avaliador` =".$avaliador."");//Mostrar arquivos do usuário
		while($exibe = $enviarEmail->fetch_assoc()){
   
			$destinatario = $exibe['email'];

		
			require 'PHPMailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;


            $mail->isSMTP();
            $mail->Host 	= 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jornada2018@svc.ifmt.edu.br';
            $mail->Password = 'Senha123M8';
            $mail->Port		= 587;
            $mail->SMTPSecure = 'tls';

			$mail->From = 'jornada2018@svc.ifmt.edu.br';//origem
			$mail->FromName = 'IX Jornada';
			$mail->addAddress(''.$destinatario.'');//destinatario

			$mail->isHTML(true);

			$mail->Subject = utf8_decode('IX Jornada Cientifica - Você tem um arquivo para correção');
			$mail->Body    = utf8_decode('Você recebeu um arquivo submetido por: '.$autor.'. O título do trabalho é <b>'.$titulo.'</b> para visualizar <a href="http://www.ifmtsvc.edu.br/jornadacientifica/jornada2018/materialEnviado/'.$arquivo.'" >clique aqui</a>');

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			 } else {
				echo 'Email enviado com sucesso!';
			}	

        }//final while
	}//final if 
	
}