<?php

if ($logado){
    header('location:index.php?p=dashboard');
}


if (!$_POST){ ?>

<fieldset>
	<legend>Faça o login</legend>
	 <form name="frmcpf" method="post" action="" >
		<p><label>CPF:&nbsp;&nbsp;&nbsp; </label><input type="number" name="cpf" placeholder="CPF"></p>
		<p><label>Senha: </label><input type="password" name="senha" placeholder="Senha"></p>
		<input type="submit" name="login" class="button" value="login">
      </form><br />
      <p><a href="index.php?p=inscricao">Clique aqui</a> para fazer sua inscrição.</p>
      <p><a href="index.php?p=relembrarSenha">Clique aqui</a> se não lembra da sua senha.</p>
</fieldset>

<?php 
    } else {
        include_once("./banco/connect.php");
        $cpf = $_POST["cpf"];
        $senha = sha1($POST["senha"]);
        $result = $conn->query("SELECT * FROM participante WHERE `cpf` LIKE '$cpf' AND `senha` LIKE '$senha'");
        if($result){
            while ($row = $result->fetch_assoc()){
                $nome = $row['nome'];
                $nivel = $row['nivel'];
                //print_r($nome);
                $_SESSION['nome'] = $nome;
                $_SESSION['cpf'] = $cpf;
                $_SESSION['senha'] = $senha;
                $_SESSION['nivel'] = $nivel;
                echo "Conexão realizada. <a href='index.php?p=dashboard'>Entrar.</a>";
            }
            $result->free();
         }
         $db->close();


?>




<?php } ?>