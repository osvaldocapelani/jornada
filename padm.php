<?php
if ($_SESSION['nivel'] < 9){
    echo "É preciso estar logado E ter perfil de administrador para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui. ";
    exit;
} else {
    ?>


	<table class="table table-striped">
			<tr>
				<td>ID_Trabalho</td>
				<td>Enviado por</td>
				<td>Título</td>
				<td>Autor</td>
				<td>Área</td>
				<td>Arquivo</td>
				<td>Atribuir Avaliador</td>
			</tr>
<?php
    include_once("./banco/connect.php");
	$procuraTrabalho = $conn->query("SELECT * FROM trabalho WHERE `temrevisor` = '9999'");
    if($procuraTrabalho->num_rows < 1){
        echo "Nenhum trabalho foi submetido até o momento";
    } else {//else 2
        while ($row = $procuraTrabalho->fetch_assoc()){ 
?>
			<tr>
				<td><?php echo $row['id_trabalho'];?></td>
				<td><?php echo $row['id_usuario']; ?></td>
				<td><?php echo $row['titulo'];?></td>
				<td><?php echo $row['autor'];?></td>
				<td>
                    <?php //Exibe a grande área
                    $procuraArea = $conn->query("SELECT * FROM `areaConhecimento` WHERE `id` = ".$row['grandeArea']."");
                    while ($row1 = $procuraArea->fetch_assoc()){
                            echo $row1['grandeArea'];
                        }
                    ?>
				</td>
				
				<td>
					<a href="./materialEnviado/<?php echo $row['arquivo'];?>" target="_self">Baixar
				</td>
				<td>
					<form action="index.php?p=admAtribuirRevisor" method="POST">
						<input type="hidden" name="id_trabalho" value="<?php echo $row['id_trabalho'];?>" /> 
						<input type="hidden" name="cpf" value="<?php echo $row['id_usuario']; ?>" />
						<input type="hidden" name="titulo" value="<?php echo $row['titulo'];?>" />
						<input type="hidden" name="autor" value="<?php echo $row['autor'];?>" /> 
						<input type="hidden" name="coautor1" value="<?php echo $row['coautor1'];?>" /> 
						<input type="hidden" name="coautor2" value="<?php echo $row['coautor2'];?>" />
						<input type="hidden" name="coautor3" value="<?php echo $row['coautor3'];?>" />
						<input type="hidden" name="coautor4" value="<?php echo $row['coautor4'];?>" />
						<input type="hidden" name="grandeArea" value="<?php echo $row['grandeArea'];?>" />
						<input type="hidden" name="arquivo" value="<?php echo $row['arquivo'];?>" />
						<input type="submit" value="Atribuir Avaliador" />
					</form>
				</td>
			</tr>
<?php
	}//final do while
            echo "
                </table>
        </form>";
    }//else 2
   
}// final do primeiro else
