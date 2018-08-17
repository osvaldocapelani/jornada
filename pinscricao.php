<?php

if (!$_POST){ ?>

<p>
Atenção: É importante que informe um e-mail válido. Caso esqueça sua senha, uma nova será enviada para o seu e-mail.<br />Por isso pedimos que o digite duas vezes.
</p>

<form name="frmcpf" method="post" action="" >
        <p>Nome: <input type="text" name="nome" size="75" required> </p>
        <p>E-mail: <input type="email" name="email" size="75" required> </p>
        <p>Repita o E-mail: <input type="email" name="email1" size="75" required> </p>
		<p><label>CPF:&nbsp;&nbsp;&nbsp; </label><input type="number" name="cpf" required placeholder="CPF"></p>
        <p><label>Senha: </label><input type="password" name="senha" placeholder="Senha" required></p>
        <p><label>Repita a senha: </label><input type="password" name="senha1" required placeholder="Repita a Senha"></p>
		<input type="submit" class="button" value="Cadastrar">
</form>


<?php 
    } else { //esse é fechado lá no final

        include_once("./banco/connect.php");
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $email1 = $_POST["email1"];
        $cpf = $_POST["cpf"];
        $senha = $POST["senha"];
        $senha1 = $POST["senha1"];
        //echo $cpf . " " . $senha;
        //echo $senha ."<br />";
        //echo $senha1;
        if($email !== $email1){
            echo "E-mails digitados não conferem! <a href='index.php?p=inscricao'>Tente novamente.<br /></a>";
        }
        if($senha !== $senha1){
            echo " Senhas digitadas não conferem! <a href='index.php?p=inscricao'>Tente novamente.</a>";
        }
 

        //senha que vai pro banco
        $senha = md5($senha);

        $result_usuario = "INSERT INTO participante(nome, cpf, email, senha) VALUES ('$nome','$cpf', '$email', '$senha')";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
    
        if(mysqli_affected_rows($conn) != 0){
                echo "Dados cadastrados com sucesso! <a href='index.php?p=login'>Clique aqui para continuar com o login.</a>";
            }else{
                echo "Dados não cadastrados! Motivo: ". mysqli_connect_error();
            }

?>



<?php } ?>