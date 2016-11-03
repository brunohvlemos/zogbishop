<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('Connections/conexao.php'); ?>

<table width="526" border="1" align="center">
  <tr> 
    <td colspan="2"><div align="center">Voc&ecirc; adicionou o produto <strong><?php echo $HTTP_POST_VARS['nome_prod']; ?> </strong> ao seu carrinho de compras.</div></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"><strong>Quantidade:</strong><?php echo $HTTP_POST_VARS['quantidade']; ?></div></td>
  </tr>
  <tr> 
    <td width="50%"> 
      <div align="center"><strong>Valor unit&aacute;rio:</strong> 
        R$<?php echo $HTTP_POST_VARS['valor']; ?>,00</div></td>
    <?php $total = $HTTP_POST_VARS['quantidade'] * $HTTP_POST_VARS['valor'];?>
    <td width="50%">
<div align="center"><strong>Total: </strong>R$<?php echo $total; ?>,00</div></td>
  </tr>
</table>
<?php

$valor = $HTTP_POST_VARS['valor'];
$nome_prod = $HTTP_POST_VARS['nome_prod'];
$quantidade = $HTTP_POST_VARS['quantidade'];
$session_id = $HTTP_POST_VARS['session_id'];



$inserir = mysql_query("INSERT INTO compras (nome_prod,valor,quantidade,id_temp) VALUES('$nome_prod','$valor','$quantidade','$session_id')");


?>

<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->