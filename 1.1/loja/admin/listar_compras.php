<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('../Connections/conexao.php'); ?>
<?php
$cod_usuario = $HTTP_GET_VARS['cod_usuario'];
$colname_Recordset1 = "1";
if (isset($HTTP_GET_VARS['cod_usuario'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['cod_usuario'] : addslashes($HTTP_GET_VARS['cod_usuario']);
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT cod_compra, nome_prod, valor, quantidade, form_pag, cod_usuario FROM compras WHERE cod_usuario = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $HTTP_GET_VARS['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "1";
if (isset($HTTP_GET_VARS['cod_usuario'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['cod_usuario'] : addslashes($HTTP_GET_VARS['cod_usuario']);
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset2 = sprintf("SELECT nome, email, endereco, pais, estado, cidade, cep, nome_cartao, cartao, cartao_numero, cartao_cvc, cartao_data, form_pag, data_compra FROM usuarios WHERE cod_usuario = %s", $colname_Recordset2);
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $conexao) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($HTTP_GET_VARS['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $HTTP_GET_VARS['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>

<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
{
var agree=confirm("Tem certeza que deseja deletar esse registro?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>
</head>

<body>
<table border="1" align="center">
  <tr> 
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">C&oacute;digo 
        da compra</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        do produto</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Valor</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Quantidade</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Forma 
        de pagamento</font></strong></div></td>
  </tr>
  <?php do { ?>
  <tr> 
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['cod_compra']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['nome_prod']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['valor']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['quantidade']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['form_pag']; ?></font></div></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>

<br>

<?
if ($row_Recordset2['form_pag'] == "depósito")
{
	?>
<table width="100%" border="1" align="center">
  <?php do { ?>
  <tr> 
    <td width="41%"><div align="right"><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><strong>Nome:</strong></font></div></td>
    <td width="59%"><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['nome']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Email:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['email']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Endere&ccedil;o:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['endereco']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Pa&iacute;s:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['pais']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Estado:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['estado']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Cidade:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cidade']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">CEP:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cep']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Forma 
        de pagamento:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['form_pag']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Data 
        da compra:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['data_compra']; ?></font></td>
  </tr>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>

<?php
}
else
{
	?>
	<table width="100%" border="1" align="center">
  <?php do { ?>
  <tr> 
    <td width="41%"><div align="right"><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><strong>Nome:</strong></font></div></td>
    <td width="59%"><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['nome']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Email:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['email']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Endere&ccedil;o:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['endereco']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Pa&iacute;s:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['pais']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Estado:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['estado']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Cidade:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cidade']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">CEP:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cep']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Nome 
        no cart&atilde;o de cr&eacute;dito:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['nome_cartao']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Cart&atilde;o:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cartao']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">N&uacute;mero 
        do cart&atilde;o:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cartao_numero']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">N&uacute;mero 
        verificador do cart&atilde;o:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cartao_cvc']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Data 
        de expira&ccedil;&atilde;o do cart&atilde;o:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['cartao_data']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Forma 
        de pagamento:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['form_pag']; ?></font></td>
  </tr>
  <tr> 
    <td><div align="right"><font size="2"><strong><font face="Geneva, Arial, Helvetica, sans-serif">Data 
        da compra:</font></strong></font></div></td>
    <td><font size="2" face="Geneva, Arial, Helvetica, sans-serif"><?php echo $row_Recordset2['data_compra']; ?></font></td>
  </tr>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>
<?
	}	
	?>
<p align="center"><a href="excluir_compra.php?cod_usuario=<?php echo $cod_usuario; ?>"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" onClick="return confirmSubmit()">Excluir 
  o registro das compras acima</font></a></p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>

<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->