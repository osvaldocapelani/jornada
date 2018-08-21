<?php
if ($_SESSION['nivel'] < 1){
    echo "É preciso estar logado para acessar este conteúdo!<br />
    Você não possui permissão para submeter trabalhos.";
} else {
?>


<form enctype="multipart/form-data" action="index.php?p=upload" method="POST">

<p><label style="font-weight: bold">Nome: 		</label><input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" readonly /></p>
<p><label style="font-weight: bold">Título: 	</label><input type="text" required name="titulo" placeholder="Título do trabalho" /><span></span></p>
<p><label style="font-weight: bold">Autor: 		</label><input type="text" required name="autor" placeholder="Nome Completo" /></p>
<p><label style="font-weight: bold">1º Coautor: </label><input type="text" name="coautor1" placeholder="Nome Completo" /></p>
<p><label style="font-weight: bold">2º Coautor: </label><input type="text" name="coautor2" placeholder="Nome Completo" /></p>
<p><label style="font-weight: bold">3º Coautor: </label><input type="text" name="coautor3" placeholder="Nome Completo" /></p>
<p><label style="font-weight: bold">4º Coautor: </label><input type="text" name="coautor4" placeholder="Nome Completo" /></p>


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

<p><label style="font-weight: bold">Tipo de trabalho:</label>
    <select  name="tipoTrabalho" required >
        <option value="Pôster">Pôster para apresentação na sede do Campus São Vicente</option>
        <option value="Experimento">Experimento para apresentação na Feira do Conhecimento (Jaciara)</option>
        <option value="Vídeo">Vídeo para apresentação (Jaciara)</option>
        <option value="Painel">Painel para apresentação (Jaciara)</option>
    </select>
</p>

<p><label >Arquivo <span style="font-weight: bold">.doc</span> ou <span style="font-weight: bold">.docx</span> apenas: </label>

<input type="file" name="arquivo"/></p><br />

<p><input type="submit" value="Enviar Arquivo" /></p>

</form>

<?php
} ?>