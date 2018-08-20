<?php

if ($_SESSION['nivel'] < 7){
    echo "É preciso estar logado E ter perfil de avaliador para acessar este conteúdo!<br />
    Você não possui permissão para estar aqui. ";
    exit;
} else {
    $id_trabalho = $_POST['id_trabalho'];
?>
<h4>Tela para avaliação do trabalho</h4>
<form action="index.php?p=avaliadorSubmeterAvalicao" method="post">
<table class="table table-striped">
<tr>
  <td>1</td>
  <td>
    Apresentação: 2 a 4 páginas; A4; margens de 2,5; fonte Arial; tamanho 11, palavras chave, referências e legendas das figuras e tabelas; coluna única, espaçamento simples texto justificado.
  </td>
  <td>
	 <input type="hidden" name="id_trabalho" value="<?php echo $id_trabalho ;?>" /> 
    <input type="radio" name="apresentacao" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="apresentacao" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>

<tr>
  <td>2</td>
  <td>
    Título: Tamanho 11, negrito, em letras maiúsculas, alinhamento centralizado.
  </td>
  <td>
    <input type="radio" name="titulo" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="titulo" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>3</td>
  <td>
    Autor(es): Nome um ao lado do outro, separados por ponto e vírgula (;) Nome com a primeira letra maiúscula. Afiliações logo abaixo dos nomes dos autores.
  </td>
  <td>
    <input type="radio" name="autor" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="autor" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>4</td>
  <td>
    Resumo e palavras chave: título do resumo em negrito, sem parágrafo, no máximo 450 palavras, tamanho 11. Palavra chave numa nova linha, de 3 palavras separadas por vírgula.
  </td>
  <td>
    <input type="radio" name="resumo" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="resumo" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>5</td>
  <td>
    Corpo do texto: Digitado em estilo normal, espaço simples, justificado. Título da seção com a primeira letra maiúscula, negrito, alinhado a esquerda.
  </td>
  <td>
    <input type="radio" name="texto" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="texto" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>6</td>
  <td>
    Figuras e Tabelas: Devem estar o mais próximo possível da sua citação no texto;
  </td>
  <td>
    <input type="radio" name="tabelas" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="tabelas" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>7</td>
  <td>
    Agradecimentos: É opcional. Deve agradecer órgão e instituições; Não agradecer pessoas físicas; deve estar no fim do corpo do texto e antes das referências.
  </td>
  <td>
    <input type="radio" name="agradecimentos" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="agradecimentos" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>8</td>
  <td>
    Referências/citações: Incluir no texto, após o trecho citado entre parênteses o
     sobrenome do autor em letra maiúscula e o ano; três ou mais autores citar o primeiro autor e et al.
  </td>
  <td>
    <input type="radio" name="citacoes" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="citacoes" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>9</td>
  <td>
    Referências Bibliográficas: apresentadas em ordem alfabética, de acordo com normas da ABNT
  </td>
  <td>
    <input type="radio" name="bibliografia" value="Atende" autofocus required />Atende<br /> 
    <input type="radio" name="bibliografia" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>10</td>
  <td>
    Redação: Avalie o artigo quanto a redação do texto como um todo: ortografia, concordância, coerência, clareza, etc.
  </td>
  <td>
    <input type="radio" name="redacao" value="Atende" autofocus required />Atende<br />
    <input type="radio" name="redacao" value="O autor deve corrigir" autofocus required />O autor deve corrigir
  </td>
</tr>
<tr>
  <td>11</td>
  <td>
    PARECER FINAL: Diante das respostas anteriores, emita o seu parecer final
  </td>
  <td>
    <input type="radio" name="parecer" value="O Trabalho deve ser ACEITO" autofocus required />O Trabalho deve ser ACEITO<br />
    <input type="radio" name="parecer" value="O Trabalho deve ser aceito para apresentação, porém deve realizar alterações/correções para publicação nos anais do evento" autofocus required />O Trabalho deve ser aceito para apresentação, porém deve realizar alterações/correções para publicação nos anais do evento<br />
    <input type="radio" name="parecer" value="O trabalho NÃO deve ser aceito" autofocus required />O trabalho NÃO deve ser aceito
  </td>
</tr>
<tr>
  <td>12</td>
  <td colspan="2">
    Caso o seu parecer foi "NÃO ACEITO" ou "ACEITO para apresentação, mas com alterações/correções para publicação", justifique em poucas linhas o(s) motivos(s).<br />Esses motivos serão enviados para o autor.
    <textarea cols="85" rows="5" name="avalicao"></textarea>
  </td>
</tr>
<tr>
  <td colspan="3"> 
    <input type="submit" value="Avaliar" />
  </td>
</tr>
</table>
</form>


<?php
}//final else
?>