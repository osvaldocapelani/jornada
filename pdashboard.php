
Painel de Controle

<p><a href="index.php?p=submeter-artigos">Enviar um trabalho (doc ou docx) </a></p>
<p><a href="index.php?p=mudarSenha">Mudar sua Senha </a></p>


<?php

$cpf = $_SESSION['cpf'];
include_once("./banco/connect.php");
$procuraTrabalho = $conn->query("SELECT * FROM trabalho WHERE `id_usuario` LIKE '$cpf'");
if($procuraTrabalho->num_rows < 1){
    echo "Você ainda não submeteu nenhum trabalho";
} else {
?>

<table class="table table-striped">
<tr>
    <th>Corrigido</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Fazer Download</th>
    <th>Reenviar</th>
</tr>

<?php
    while ($row = $procuraTrabalho->fetch_assoc()){ ?>
        
        <tr><td><?php echo $row['reenviado']; ?></td>
        <td><?php echo $row['titulo']; ?></td>
        <td><?php echo $row['autor']; ?></td>
        <td><a href="./materialEnviado/<?php echo $row['arquivo']; ?>"target="_blank">Clique aqui para visualizar</a></td>
        <td>
            <form action="index.php?p=re-enviar-artigos" method="post">
                <input type="hidden" name="arquivo" value="<?php echo $row['arquivo']; ?>">
                <input type="submit" value="Reenviar">
            </form>
        </td></tr>
    <?php }
    }//Final do Else
    ?>


</table>