<?php
if ($_SESSION['nivel'] < 1){
    echo "É preciso estar logado para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui.";
} else {
        $confereSenhaVelha = $_POST['confereSenhaVelha'];
        $senhaVelha = md5($_POST['senhaVelha']);
        $senha = md5($_POST['senha']);
        $senha1 = md5($_POST['senha1']);

        //echo $confereSenhaVelha. "<br />";
        //echo md5($senhaVelha). "<br />";
       // echo md5($senha). "<br />";
        //echo md5($senha1). "<br />";
 


        if( (strcmp($confereSenhaVelha, $senhaVelha) == 0) && (strcmp($senha, $senha1) == 0 ) ){
            //echo "Senha antiga não confere! <a href='index.php?p=mudarSenha'>Tente novamente.<br /></a>";
            echo "senhas velhas iguais";
        } else {
            echo "senha digitadas não conferem! <br />";
        }

}//Final do else