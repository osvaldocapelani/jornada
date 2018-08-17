<?php
$confereSenhaVelha = $_POST["confereSenhaVelha"];
$senhaVelha = $_POST["senhaVelha"];
$senha = $_POST["senha"];
$senha1 = $_POST["senha1"];

echo $confereSenhaVelha. "<br />";
echo sha1($senhaVelha). "<br />";
echo $senha. "<br />";
echo $senha1;

/*

if($confereSenhaVelha !== $senhaVelha ){
    echo $confereSenhaVelha. "<br />";
    echo $senhaVelha. "<br />";
    echo "Senha antiga não confere! <a href='index.php?p=mudarSenha'>Tente novamente.<br /></a>";
}
if($senha !== $senha1){
    echo " Senhas novas não são iguais! <a href='index.php?p=mudarSenha'>Tente novamente.</a>";
}


*/