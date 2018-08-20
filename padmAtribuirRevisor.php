<?php
if ($_SESSION['nivel'] < 9){
    echo "É preciso estar logado E ter perfil de administrador para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui. ";
    exit;
} else {

    $id_trabalho    =$_POST["id_trabalho"];
    $cpf		    =$_POST["cpf"];
    $titulo		    =$_POST["titulo"];
    $autor		    =$_POST["autor"];
    $grandeArea	    =$_POST["grandeArea"];
    $arquivo	    =$_POST["arquivo"];
    $opcao			=$_POST["opcao"];
    $numeroArtigo	=$_POST["numeroArtigo"];
    include_once("./banco/connect.php");  
    ?>
<form method="post" action="index.php?p=admAtribuirRevisorValida" />
	<table class="table table-striped">
			<tr>
				<td>ID_Trabalho</td>
				<td>Título</td>
				<td>Autor</td>
				<td>Avaliadores</td>
				<td>Atribuir Avaliador</td>
			</tr>
            <tr>
				<td ><?php echo $id_trabalho ;?></td>
				<td ><?php echo $titulo;?></td>
				<td ><?php echo $autor;?></td>
				<td>
					<select name="avaliador" required >
					<?php
						$avaliador = $conn->query("SELECT * FROM `participante` WHERE `participante`.`nivel` = 8 ORDER BY `participante`.`nome` ASC");
                            while ($row = $avaliador->fetch_assoc()){?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
							<?php 
								}//final do while
							?>
					</select>
				</td>
				<td>
					<input type="hidden" name="id_trabalho" value="<?php echo $id_trabalho;?>" />
					<input type="hidden" name="titulo" value="<?php echo $titulo;?>" />
					<input type="hidden" name="autor" value="<?php echo $autor;?>" />
					<input type="hidden" name="arquivo" value="<?php echo $arquivo;?>" />
					<input type="submit" value="Atribuir Avaliador" />
					
				</td>
			</tr>
	</table>
</form>


    <?php
}//final primeiro else 