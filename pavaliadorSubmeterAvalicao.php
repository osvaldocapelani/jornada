<?php

if ($_SESSION['nivel'] < 7){
    echo "É preciso estar logado E ter perfil de avaliador para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui. ";
    exit;
} else {


    $id_trabalho = $_POST['id_trabalho'];
    $aceitar 	= $_POST['aceitar'];
    $avalicao 	= $_POST['avalicao'];
    
    require_once("./banco/connect.php");
    include("head.php");
    include("body.php");
    
    if ($aceitar == 'sim'){
        $query = "UPDATE `jornada2017`.`avaliacao` SET `parecer` = 'O Trabalho deve ser ACEITO' WHERE `id_trabalho`  = $id_trabalho";
        $query1 = "UPDATE `jornada2017`.`trabalho` SET `reenviado` = 'aceito' WHERE `id_trabalho`  = $id_trabalho";
    
    
        $resultado = mysql_query($query) or die(mysql_error());
        $resultado1 = mysql_query($query1) or die(mysql_error());
            if ($resultado) {
                
                
                    $sql1 = "SELECT * FROM `trabalho` WHERE `id_trabalho` LIKE '$id_trabalho'";
                    $procura = mysql_query($sql1);
                    while ($linha = mysql_fetch_assoc($procura)){ 
                        $id = $linha['id_usuario'];
                        $titulo = $linha['titulo'];
                    }
    
                    $sql2 = "SELECT * FROM `usuario` WHERE `id` LIKE '$id'";
                    $procura2 = mysql_query($sql2);
                    while ($linha2 = mysql_fetch_assoc($procura2)){ 
                        $nome = $linha2['nome'];
                        $email = $linha2['email'];
                    }
    
    
    
    
                        //Envia e-mail para workif@svc.ifmt.edu.br
                            require '../PHPMailer/PHPMailerAutoload.php';
    
                                $mail = new PHPMailer;
    
                                $mail->isSMTP();
                                $mail->Host 	= 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'jornada2017@svc.ifmt.edu.br';
                                $mail->Password = 'Senha123M8';
                                $mail->Port		= 587;
                                $mail->SMTPSecure = 'tls';
    
                                $mail->From = 'jornada2017@svc.ifmt.edu.br';//origem
                                $mail->FromName = 'VIII Jornada Científica';
                                $mail->addAddress(''.$email.'');//destinatario
    
                                $mail->isHTML(true);
    
                                $mail->Subject = utf8_decode('Trabalho '.$titulo.' foi ACEITO na VIII Jornada Científica');
                                $mail->Body    = utf8_decode('Senhor(a) '.$nome.', o trabalho <strong>'.$titulo.'</strong> foi ACEITO. <a href="http://www.ifmtsvc.edu.br/jornadacientifica/jornada2017/login.php">Clique aqui para visualizar o resultado!</a>');
    
                                if(!$mail->send()) {
                    echo 'Mensagem não foi enviada.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                                 } else {
                    echo 'Avaliação realizada. Foi enviado um email para '.$nome.'!';
                                }
    
                    } else {
                        echo "Não foi possível enviar avalição. <a href='tela-avaliador.php' >tentar novamente</a>";
            }		
    }
    
    if ($aceitar == 'não'){
        $query = "UPDATE `jornada2017`.`avaliacao` SET `parecer` = 'O Trabalho NÃO deve ser aceito' WHERE `id_trabalho`  = $id_trabalho";
        $query1 = "UPDATE `jornada2017`.`trabalho` SET `reenviado` = 'NÃO aceito' WHERE `id_trabalho`  = $id_trabalho";		
        $resultado = mysql_query($query) or die(mysql_error());
        $resultado1 = mysql_query($query1) or die(mysql_error());
            if ($resultado) {
                
                
                    $sql1 = "SELECT * FROM `trabalho` WHERE `id_trabalho` LIKE '$id_trabalho'";
                    $procura = mysql_query($sql1);
                    while ($linha = mysql_fetch_assoc($procura)){ 
                        $id = $linha['id_usuario'];
                        $titulo = $linha['titulo'];
                    }
    
                    $sql2 = "SELECT * FROM `usuario` WHERE `id` LIKE '$id'";
                    $procura2 = mysql_query($sql2);
                    while ($linha2 = mysql_fetch_assoc($procura2)){ 
                        $nome = $linha2['nome'];
                        $email = $linha2['email'];
                    }
    
    
    
    
                        //Envia e-mail para workif@svc.ifmt.edu.br
                            require '../PHPMailer/PHPMailerAutoload.php';
    
                                $mail = new PHPMailer;
    
                                $mail->isSMTP();
                                $mail->Host 	= 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'jornada2017@svc.ifmt.edu.br';
                                $mail->Password = 'Senha123M8';
                                $mail->Port		= 587;
                                $mail->SMTPSecure = 'tls';
    
                                $mail->From = 'jornada2017@svc.ifmt.edu.br';//origem
                                $mail->FromName = 'VIII jornada Científica';
                                $mail->addAddress(''.$email.'');//destinatario
    
                                $mail->isHTML(true);
    
                                $mail->Subject = utf8_decode('Trabalho '.$titulo.' NÃO foi aceito na VIII jornada Científica');
                                $mail->Body    = utf8_decode('Senhor(a) '.$nome.', o trabalho '.$titulo.' <strong>Não</strong> foi aceito na VIII jornada Científica. <a href="http://localhost/workif/login.php">Clique aqui para visualizar o resultado!</a>');
    
                                if(!$mail->send()) {
                    echo 'Mensagem não foi enviada.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                                 } else {
                    echo 'Avaliação realizada. Foi enviado um email para '.$nome.'!';
                                }
    
                    } else {
                        echo "Não foi possível enviar avalição. <a href='tela-avaliador.php' >tentar novamente</a>";
                    }			
    }
    
    if ($aceitar == 'corrigir'){
        $query = "UPDATE `jornada2017`.`avaliacao` SET `parecer` = 'O Trabalho deve ser aceito para apresentação, porém deve realizar alterações/correções para publicação nos anais do evento', `avalicao` = '$avalicao' WHERE `id_trabalho`  = $id_trabalho";
        $query1 = "UPDATE `jornada2017`.`trabalho` SET `reenviado` = 'corrigir' WHERE `id_trabalho`  = $id_trabalho";		
        $resultado = mysql_query($query) or die(mysql_error());
        $resultado1 = mysql_query($query1) or die(mysql_error());
            if ($resultado) {
                
                
                    $sql1 = "SELECT * FROM `trabalho` WHERE `id_trabalho` LIKE '$id_trabalho'";
                    $procura = mysql_query($sql1);
                    while ($linha = mysql_fetch_assoc($procura)){ 
                        $id = $linha['id_usuario'];
                        $titulo = $linha['titulo'];
                    }
    
                    $sql2 = "SELECT * FROM `usuario` WHERE `id` LIKE '$id'";
                    $procura2 = mysql_query($sql2);
                    while ($linha2 = mysql_fetch_assoc($procura2)){ 
                        $nome = $linha2['nome'];
                        $email = $linha2['email'];
                    }
    
    
    
    
                        //Envia e-mail para workif@svc.ifmt.edu.br
                            require '../PHPMailer/PHPMailerAutoload.php';
    
                                $mail = new PHPMailer;
    
                                $mail->isSMTP();
                                $mail->Host 	= 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'jornada2017@svc.ifmt.edu.br';
                                $mail->Password = 'Senha123M8';
                                $mail->Port		= 587;
                                $mail->SMTPSecure = 'tls';
    
                                $mail->From = 'jornada2017@svc.ifmt.edu.br';//origem
                                $mail->FromName = 'VIII jornada Científica';
                                $mail->addAddress(''.$email.'');//destinatario
    
                                $mail->isHTML(true);
    
                                $mail->Subject = utf8_decode('Trabalho '.$titulo.' precisa de correções');
                                $mail->Body    = utf8_decode('Senhor(a) '.$nome.', o trabalho '.$titulo.' <strong>precisa de novas correções</strong> para ser postado nos anais da VIII Jornada Científica. <a href="http://www.ifmtsvc.edu.br/jornadacientifica/jornada2017/login.php">Clique aqui para visualizar o resultado!</a>');
    
                                if(!$mail->send()) {
                    echo 'Mensagem não foi enviada.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                                 } else {
                    echo 'Avaliação realizada. Foi enviado um email para '.$nome.'!';
                                }
    
                    } else {
                        echo "Não foi possível enviar avalição. <a href='tela-avaliador.php' >tentar novamente</a>";
                    }			
    }


}//final primeiro else
?>