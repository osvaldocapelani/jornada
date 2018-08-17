<?php
if ($_SESSION['nivel'] < 1){
    echo "É preciso estar logado para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui.";
} else {
        $confereSenhaVelha = $_POST['confereSenhaVelha'];
        $senhaVelha = $_POST['senhaVelha'];
        $senha = $_POST['senha'];
        $senha1 = $_POST['senha1'];

        echo $confereSenhaVelha. "<br />";
        echo md5($senhaVelha). "<br />";
        echo md5($senha). "<br />";
        echo md5($senha1). "<br />";
 


        if($confereSenhaVelha == $senhaVelha ){
            //echo "Senha antiga não confere! <a href='index.php?p=mudarSenha'>Tente novamente.<br /></a>";
            echo "senhas velhas iguais";
        }
        if($senha == $senha1){
            echo " Senhas novas são iguais! <a href='index.php?p=mudarSenha'>Tente novamente.</a>";
        }


}//Final do else