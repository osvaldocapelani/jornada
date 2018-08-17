<?php
if ($_SESSION['nivel'] < 1){
    echo "É preciso estar logado para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui.";
} else {
    $cpf = $_SESSION['cpf'];
    $confereSenhaVelha = $_SESSION['senha'];
?>
<form action="index.php?p=trocarSenha" method="post">
    <p><label style="font-weight: bold">Nome: </label><input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" readonly size="40"/></p>
    <p><label style="font-weight: bold">CPF: </label><input type="text" name="cpf" value="<?php echo $_SESSION['cpf'] ?>" readonly /></p>
    <p><label style="font-weight: bold">Senha atual: <input type="password" name="senhaVelha" ></p>
    <p><label style="font-weight: bold">Nova Senha: <input type="password" name="senha" ></p>
    <p><label style="font-weight: bold">Repita nova senha: <input type="password" name="senha1" ></p>
    <input type="hidden" name="confereSenhaVelha"value="<?php echo $confereSenhaVelha; ?>">
    <p><input type="submit" value="Trocar Senha"></p>
</form>
<?php
}//final do else de controle de nivel de acesso
?>