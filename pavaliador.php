<?php
if ($_SESSION['nivel'] < 7){
    echo "É preciso estar logado E ter perfil de avaliador para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui. ";
    exit;
} else {
?>    
    

	<table class="table table-stripped">
			<tr>
				<th>Título</th>
				<th>Baixar arquivo</th>
				<th>Autor</th>
				<th>Avaliar</th>
				<th>Reenviado</th>
			</tr>

<?php
require_once("./banco/connect.php");

        //Busca os trabalhos deste avaliador
        $sql = $conn->query("SELECT * FROM `trabalho` WHERE `temrevisor` = '".$_SESSION['id']."'");//Mostrar arquivos do usuário

        while($exibe = $sql->fetch_assoc()){ 
?>

            <tr>
				<form action="index.php?p=avaliadorAvaliarTrabalho" method="post">
					<td><?php echo $exibe['titulo'];?></td>
					<td><a href="materialEnviado/<?php echo $exibe['arquivo'];?>" target="_blank" >Baixar</a></td>
					<td><?php echo $exibe['autor'];?></td>
					<td>
						<input type="hidden" name="id_trabalho" value="<?php echo $exibe['id_trabalho']; ?>" />
						<?php $reenviado = $exibe['reenviado']; ?>

<?php

                    $id_trabalho = $exibe['id_trabalho'];
                    $impede = $conn->query("SELECT * FROM `avaliacao` WHERE `id_trabalho` =$id_trabalho limit 1");
                    $teste = $impede->num_rows;

                    if ($teste > 0){
                        echo "<p class='danger'>Avaliado</p>";
                    } else echo '<input type="submit" value="Avaliar" />';
?>

                    </td>
					<td>
						<?php
							if ($reenviado == 'sim'){ ?>
								<a href="reavaliar-trabalho.php?id_trabalho=<?php echo $id_trabalho ?>" target="_self"><h2><small>Reavaliar</small></h2></a>
						<?php }
						?>
					</td>
				</form>
			</tr>	


<?php

        }//final do while
}//final Else