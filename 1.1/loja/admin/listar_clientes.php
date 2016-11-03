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
<?php include "topo.php";?>
<?php require_once('../Connections/conexao.php'); ?>
<?php
$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $HTTP_GET_VARS['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT cod_usuario, nome, email, status, form_pag, data_compra FROM usuarios WHERE   status = 'ok'";
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

$queryString_Recordset1 = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . implode("&", $newParams);
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>

<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body><br>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
<table border="1" align="center">
  <tr> 
    <td height="17"> <div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">C&oacute;digo 
        do us&aacute;rio</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Email</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Forma 
        de pagamento</font></strong></div></td>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        da compra</font></strong></div></td>
  </tr>
  <?php do { ?>
  <tr> 
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['cod_usuario']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['nome']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['email']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['form_pag']; ?></font></div></td>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_Recordset1['data_compra']; ?></font></div></td>
  </tr>
  <tr> 
    <td colspan="5"><div align="center" onClick="MM_openBrWindow('listar_compras.php?cod_usuario=<?php echo $row_Recordset1['cod_usuario']; ?>','','')"><a href="javascript:;">Ver 
        detalhes </a></div></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<?php } // Show if recordset not empty ?>
<br>
<div align="center"> 
  <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; Registros 
  <?php echo ($startRow_Recordset1 + 1) ?> a <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> de <?php echo $totalRows_Recordset1 ?></font> 
  <?php } // Show if recordset not empty ?>
</div>
<div align="center"></div>
<font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
</font> 
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
<table border="0" width="50%" align="center">
  <tr> 
    <td width="23%" align="center"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">Primeiro</a> 
      <?php } // Show if not first page ?>
      </font></td>
    <td width="31%" align="center"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Retornar</a> 
      <?php } // Show if not first page ?>
      </font></td>
    <td width="23%" align="center"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Avan&ccedil;ar</a> 
      <?php } // Show if not last page ?>
      </font></td>
    <td width="23%" align="center"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">&Uacute;ltimo</a> 
      <?php } // Show if not last page ?>
      </font></td>
  </tr>
</table>
<?php } // Show if recordset not empty ?>
</p>
<?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
<p align="center">Nenhuma venda registrada at&eacute; o momento.</p>
<?php } // Show if recordset empty ?>
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