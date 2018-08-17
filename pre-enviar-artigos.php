<?php
if ($_SESSION['nivel'] < 1){
    echo "É preciso estar logado para acessar este conteúdo!<br />
    Você não possui permissão para submeter trabalhos.";
} else {
    $arquivo = $_POST['arquivo'];
    include_once("./banco/connect.php");
        $procuraTrabalho = $conn->query("SELECT * FROM trabalho WHERE `arquivo` LIKE '$arquivo'");
    while ($row = $procuraTrabalho->fetch_assoc()){ ?>


        <form enctype="multipart/form-data" action="index.php?p=uploadReenvio" method="POST">

        <p><label style="font-weight: bold">CPF: 		</label><input type="text" value="<?php echo $row['id_usuario']; ?>" readonly /></p>
        <p><label style="font-weight: bold">Título: 	</label><input type="text" value="<?php echo $row['titulo']; ?>" required name="titulo" placeholder="Título do trabalho" /><span></span></p>
        <p><label style="font-weight: bold">Autor: 		</label><input type="text" value="<?php echo $row['autor']; ?>" required name="autor" placeholder="Nome Completo" /></p>
        <p><label style="font-weight: bold">1º Coautor: </label><input type="text" value="<?php echo $row['coautor1']; ?>" name="coautor1" placeholder="Nome Completo" /></p>
        <p><label style="font-weight: bold">2º Coautor: </label><input type="text" value="<?php echo $row['coautor2']; ?>" name="coautor2" placeholder="Nome Completo" /></p>
        <p><label style="font-weight: bold">3º Coautor: </label><input type="text" value="<?php echo $row['coautor3']; ?>" name="coautor3" placeholder="Nome Completo" /></p>
        <p><label style="font-weight: bold">4º Coautor: </label><input type="text" value="<?php echo $row['coautor4']; ?>" name="coautor4" placeholder="Nome Completo" /></p>

        <p><label style="font-weight: bold">Grande área de Conhecimento:</label>
            <select style="width:330px;" name="grandeArea" required >
            <option value="1">Ciências Exatas e da Terra</option>
            <option value="2">Ciências Biológicas</option>
            <option value="3">Engenharias</option>
            <option value="4">Ciências da Saúde</option>
            <option value="5">Ciências Agrárias</option>
            <option value="6">Ciências Sociais Aplicadas</option>
            <option value="7">Ciências Humanas</option>
            <option value="8">Linguistica, Letras e Artes</option>
            <option value="9" selected>Outros</option>
            </select>
        </p>

        <p><label >Arquivo <span style="font-weight: bold">.doc</span> ou <span style="font-weight: bold">.docx</span> apenas: </label>

        <input type="file" name="arquivo"/></p><br />

        Arquivo a ser substituído: <a href="./materialEnviado/<?php echo $row['arquivo']; ?>"><?php echo $row['arquivo']; ?></a> <br /><br />
    
        <input type="hidden" name="id_trabalho" value="<?php echo $row['id_trabalho']; ?>">
        <p><input class="btn-danger" type="submit" value="Enviar Arquivo" /> - <a class="btn-success" href="index.php?p=dashboard">Cancelar</a></p>

        </form>

        <?php
        } //end while 
}
?>