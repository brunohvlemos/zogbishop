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
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT cod_cat, nome_cat FROM categorias";
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>

<body>
<div align="center"><strong>Inser&ccedil;&atilde;o de produtos:</strong><br>
  <form name="form1" method="post" action="cad_prod2.php">
    <table width="75%" border="0" cellspacing="2" cellpadding="2">
      <tr> 
        <td><div align="right">Categoria:</div></td>
        <td><span id="spryselect1">
          <select name="cod_cat" id="cod_cat">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset1['cod_cat']?>" selected><?php echo $row_Recordset1['nome_cat']?></option>
            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
          </select>
        <span class="selectRequiredMsg">Please select an item.</span></span></td>
      </tr>
      <tr> 
        <td width="53%"><div align="right">Nome do produto:</div></td>
        <td width="47%"> <input name="nome_prod" type="text" id="nome_prod" size="30"></td>
      </tr>
      <td><div align="right"><img src="http://www.mercadolivre.com.br/org-img/t.gif" width="5" height="1">Garantia:</div></td>
        <td> <input name="garan" type="text" id="nome_cat3" size="30"></td>
      <tr> 
        <td><div align="right">Descri&ccedil;&atilde;o:</div></td>
        <td> <textarea name="descricao" cols="30" rows="5" id="descricao"></textarea></td>
      </tr>
      <td><div align="right"><img src="http://www.mercadolivre.com.br/org-img/t.gif" width="5" height="1">Localiza&ccedil;&atilde;o:</div></td>
        <td> <input name="localiza" type="text" id="nome_cat3" size="30"></td>
      <tr> 
        <td><div align="right">Quantidade:</div></td>
        <td> <input name="quan" type="text" id="nome_cat3" size="4">
        unit.</td>
      </tr>
      <td><div align="right">Valor:</div></td>
        <td> <input name="valor" type="text" id="nome_cat3" size="4">
          ,00</td>
          
      <tr> 
        <td><div align="right">Destaque:</div></td>
        <td> <select name="destaque" size="1" id="destaque">
            <option selected>selecione</option>
            <option value="sim">sim</option>
            <option value="nao">n&atilde;o</option>
        </select></td>
      </tr>
      
      <td><div align="right">Tipo de produto:</div></td>
        <td> <select name="tipo" size="1" id="tipo">
            <option selected>selecione</option>
            <option value="Novo &lt;img src=&quot;estr_1.gif&quot; width=&quot;21&quot; height=&quot;17&quot;&gt;">Novo</option>
            <option value="Usado &lt;img src=&quot;estr_5.gif&quot; width=&quot;21&quot; height=&quot;17&quot;&gt;">Usado</option>
          </select> 
        Usado <img src="../estr_5.gif" width="21" height="17"> Novo <img src="../estr_1.gif" width="21" height="17"></td>
      <tr> 
        <td colspan="2"><div align="center"> 
            <input type="submit" name="Submit" value="Enviar">
          </div></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

