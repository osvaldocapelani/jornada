<?php 

$nome		=$_POST["nome"];
$titulo		=$_POST["titulo"];
$autor		=$_POST["autor"];
$coautor1	=$_POST["coautor1"];
$coautor2	=$_POST["coautor2"];
$coautor3	=$_POST["coautor3"];
$coautor4	=$_POST["coautor4"];
$grandeArea	=$_POST["grandeArea"];
$arquivo	=$_POST["arquivo"];

//print_r($_POST);

require_once("./banco/connect.php");


$_UP['pasta'] = 'materialEnviado/';
 
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
 
$_UP['extensoes'] = array('doc', 'docx');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload.
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execução do script
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "<h4>Por favor, envie arquivos com as seguintes extensões: doc ou docx</h4><a href='index.php?p=submeter-artigos'>Tentar Novamente</a>";
    }
        // Faz a verificação do tamanho do arquivo
        else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
            echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
        }
            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
            else 
                {
                    // Primeiro verifica se deve trocar o nome do arquivo
                    if ($_UP['renomeia'] == true) {
                    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .docx
                    $nome_final = $_SESSION['cpf']."-".date('ymd-his').'.docx';
                    } else {
                        // Mantém o nome original do arquivo
                        $nome_final = $_FILES['arquivo']['name'];
                        }
            
                        // Depois verifica se é possível mover o arquivo para a pasta escolhida
                        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                            //caso tenha chegado aqui, é hora de upar o arquivo para a tabela de trabalho
                            //mas antes é preciso buscar a ID do usuário
                            $procuraID = $conn->query("SELECT * FROM participante WHERE `cpf` LIKE '" . $_SESSION['cpf'] . "'");
                            while ($row = $procuraID->fetch_assoc()){
                                $id_usuario = $row['cpf'];
                            }
                            //Com a ID do usuário podemos enviar o trabalho para a base de dados

                            $result_upload = "INSERT INTO `trabalho`(`id_usuario`, `titulo`, `autor`, `coautor1`, `coautor2`, `coautor3`, `coautor4`, `grandeArea`, `arquivo`) VALUES ('$id_usuario', '$titulo', '$autor', '$coautor1', '$coautor2', '$coautor3', '$coautor4', '$grandeArea', '$nome_final')";
                            $resultado_upload = mysqli_query($conn, $result_upload);

                            if(mysqli_affected_rows($conn) != 0){
                                echo $idtrabalho.$novoNomeFinal." Trabalho cadastrado com sucesso! <a href='index.php'>Clique aqui para continuar.</a>";
                                }else{
                                    echo "Trabalho não cadastrado! <a href='index.php?p=submeter-artigos'>Clique aqui para tentar novamente.</a>". mysqli_connect_error();
                            }
                            //Envia e-mail para jornada<ano>@svc.ifmt.edu.br
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
                            $mail->addAddress('osvaldo.capelani@svc.ifmt.edu.br');//destinatario

                            $mail->isHTML(true);

                            $mail->Subject = utf8_decode(''.$autor.' enviou um trabalho');
                            $mail->Body    = utf8_decode('<b>'.$autor.'</b> enviou o trabalho <b>'.$titulo.'</b> para visualizar <a href="http://www.ifmtsvc.edu.br/jornadacientifica/jornada2018/materialEnviado/'.$nome_final.'" >clique aqui</a>');

                                if(!$mail->send()) {
                                    echo 'Message could not be sent.';
                                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                                            } else {
                                    echo ' Email enviado com sucesso para '.$_SESSION['nome'].'!';
                                }			

                        } else { // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                                echo "Não foi possível enviar o arquivo, tente novamente<br /><a href='index.php?p=submeter-artigos'>Tentar Novamente</a>"; 
                            }
                }