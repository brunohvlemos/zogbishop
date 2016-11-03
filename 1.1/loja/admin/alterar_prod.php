<?php include "topo.php";?>
<?php require_once('../Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM categorias";
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$cod_prod = $HTTP_GET_VARS['cod_prod'];

$colname_Recordset2 = "1";
if (isset($HTTP_GET_VARS['cod_prod'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['cod_prod'] : addslashes($HTTP_GET_VARS['cod_prod']);
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset2 = sprintf("SELECT * FROM produtos WHERE cod_prod = %s", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $conexao) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>


<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<form action="alterar_prod2.php" name="form1" method="POST">
  <table width="75%" border="1" align="center" cellpadding="2" cellspacing="2">
    <tr> 
      <td><div align="right">Categoria:</div></td>
      <td> <select name="cod_cat" id="cod_cat">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['cod_cat']?>"<?php if (!(strcmp($row_Recordset1['cod_cat'], $row_Recordset2['cod_cat']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['nome_cat']?></option>
          <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
        </select></td>
    </tr>
    <tr> 
      <td width="53%"><div align="right">Nome em portugu&ecirc;s:</div></td>
      <td width="47%"> <input name="nome_prod" type="text" id="nome_prod" value="<?php echo $row_Recordset2['nome_prod']; ?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Descri&ccedil;&atilde;o em portugu&ecirc;s:</div></td>
      <td> <textarea name="descricao" rows="5" id="descricao"><?php echo $row_Recordset2['descricao']; ?></textarea></td>
    </tr>
    <tr> 
      <td><div align="right">Valor:</div></td>
      <td> <input name="valor" type="text" id="nome_cat3" value="<?php echo $row_Recordset2['valor']; ?>" size="4">
        ,00</td>
    </tr>
    <tr> 
      <td><div align="right">Destaque:</div></td>
      <td> <select name="destaque" size="1" id="destaque">
          <option value="sim" <?php if (!(strcmp("sim", $row_Recordset2['destaque']))) {echo "SELECTED";} ?>>sim</option>
          <option value="nao" <?php if (!(strcmp("nao", $row_Recordset2['destaque']))) {echo "SELECTED";} ?>>n&atilde;o</option>
        </select></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
          <input type="hidden" name="cod_prod" value="<?php echo $cod_prod;?>">
          <input type="submit" name="Submit" value="Enviar">
        </div></td>
    </tr>
  </table>
  
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>

