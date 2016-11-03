<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->

<?php require_once('Connections/conexao.php'); ?>
<?php
$colname_Recordset1 = "1";
if (isset($HTTP_GET_VARS['cod_prod'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['cod_prod'] : addslashes($HTTP_GET_VARS['cod_prod']);
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT fot_1, fot_2, fot_3 FROM produtos WHERE cod_prod = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html>
<head>
<title>Loja Virtual</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<p align="center"><br>
  <img src="<?php echo $row_Recordset1['fot_1']; ?>"> 
</p>
<p align="center"><img src="<?php echo $row_Recordset1['fot_2']; ?>"></p>
<p align="center"><img src="<?php echo $row_Recordset1['fot_3']; ?>"></p>
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