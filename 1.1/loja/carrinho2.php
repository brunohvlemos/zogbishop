<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('Connections/conexao.php'); ?>
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
{
var agree=confirm("Tem certeza que deseja excluir esse produto do seu carrinho de compras?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>
<?php
error_reporting(0);
$maxRows_Recordset1 = 100;
$pageNum_Recordset1 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $HTTP_GET_VARS['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "1";
if (isset($HTTP_GET_VARS['session_id'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['session_id'] : addslashes($HTTP_GET_VARS['session_id']);
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT cod_compra, nome_prod, valor, quantidade, id_temp FROM compras WHERE id_temp = '%s' and status = 'nao'" , $colname_Recordset1);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($HTTP_GET_VARS['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $HTTP_GET_VARS['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<center><h2>Suas compras:</h2></center>
<?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
<p align="center">Seu carrinho de compras est&aacute; vazio</p>
<?php } // Show if recordset empty ?>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
<table width="578" border="0" align="center">
  <tr> 
    <td width="163"><div align="center"><strong>Produto</strong></div></td>
    <td width="163"><div align="center"><strong>Quantidade</strong></div></td>
    <td><div align="center"><strong>Valor</strong></div></td>
	<td><div align="center"><strong>Valor Total</strong></div></td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
  <?php
  $valor = $row_Recordset1['quantidade'] * $row_Recordset1['valor'];
  $soma = $valor + $soma;
 
  ?>
  <tr> 
    <td><div align="center"><?php echo $row_Recordset1['nome_prod']; ?></div></td>
    <td><div align="center"><?php echo $row_Recordset1['quantidade']; ?></div></td>
    <td width="172"><div align="center">R$<?php echo $row_Recordset1['valor']; ?>,00</div></td>
    <?php $total = $row_Recordset1['quantidade'] * $row_Recordset1['valor'];?>
	<td width="172"><div align="center">R$<?php echo $total; ?>,00</div></td>
    <td width="52"><div align="center"><a href="excluir.php?cod_compra=<?php echo $row_Recordset1['cod_compra']; ?>&session_id=<?php echo $HTTP_GET_VARS['session_id']?>" onClick="return confirmSubmit()"><img src="botao_excluir.gif" width="16" height="16" border="0" /></a></div></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<br />
<table width="450" border="0" align="center">
  <tr>
    <td width="71%"><div align="right"><strong>
        <?php $soma2 = $soma + 10;?>
        Total geral:</strong></div></td>
    <td width="29%">R$<?php echo $soma;?>,00</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Total geral com taxa de envio (R$10,00):</strong></div></td>
    <td>R$<?php echo $soma2;?>,00</td>
  </tr>
</table>
<br>
<?php } // Show if recordset not empty ?>
<?php
mysql_free_result($Recordset1);
?>
<p align="center">
  <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <a href="finalizar.php">Finalizar compras</a> 
  <?php } // Show if recordset not empty ?>
</p>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->