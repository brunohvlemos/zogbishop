<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php
session_start();

if(!isset($_SESSION["apelido"]))

{
    header("Location: login.php");
    exit;
}
?>
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
{
var agree=confirm("Tem certeza que deseja deletar esse produto?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>
<?php include "topo.php";?>
<?php require_once('../Connections/conexao.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $HTTP_GET_VARS['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT cod_prod, nome_prod FROM produtos";
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

<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"> 
  <p>
    <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
    <strong>Nenhum produto cadastrado!!</strong> 
    <?php } // Show if recordset empty ?>
  </p>
  </div>
 
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
<div align="center"><strong> </strong></div>
<table width="506" border="1" align="center">
  <tr> 
    <td colspan="2"> <div align="center"><strong></strong></div>
      <div align="center"><strong>Produtos cadastrados</strong></div></td>
  </tr>
  <?php do { ?>
  <tr> 
    <td width="248"><div align="center"><a href="excluir_prod.php?cod_prod=<?php echo $row_Recordset1['cod_prod']; ?>" onClick="return confirmSubmit()">Clique 
        aqui para excluir</a><br>
        <a href="alterar_prod.php?cod_prod=<?php echo $row_Recordset1['cod_prod']; ?>">Clique 
        aqui para alterar</a></div></td>
    <td width="242"><div align="center"><?php echo $row_Recordset1['nome_prod']; ?></div></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<?php } // Show if recordset not empty ?>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->