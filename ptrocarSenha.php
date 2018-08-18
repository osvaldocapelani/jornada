<?php
if ($_SESSION['nivel'] < 1){
    echo "É preciso estar logado para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui.";
} else {
        $confereSenhaVelha = $_POST['confereSenhaVelha'];
        $senhaVelha = md5($_POST['senhaVelha']);
        $senhaNova = md5($_POST['senhaNova']);
        $senha1 = md5($_POST['senha1']);


        if( (strcmp($confereSenhaVelha, $senhaVelha) == 0) && (strcmp($senhaNova, $senha1) == 0 ) ){
            //echo "Senha antiga não confere! <a href='index.php?p=mudarSenha'>Tente novamente.<br /></a>";
            //echo "senhas velhas iguais";
                require_once("./banco/connect.php");
                $cpf = $_SESSION['cpf'];
                   $alteraSenha = $conn->query("UPDATE `participante` SET `senha` = '$senhaNova' WHERE `participante`.`cpf` = '$cpf'" );
                        if($conn->affected_rows > 0){
                            echo "Senha alterada com sucesso! <a href='index.php'>Clique aqui para continuar.</a>";
                            $_SESSION['senha'] = $senhaNova;//troca a senha da sessão salva
                             }else{
                                echo "Não foi possível realizar a troca de senha! <a href='index.php?p=mudarSenha'>Clique aqui para tentar novamente.</a>". $conn->mysqli_connect_error();
                        }

        } else {
            echo "senha digitadas não conferem! <a href='index.php?p=mudarSenha'>Clique aqui para tentar novamente.</a><br />";
        }

}//Final do else