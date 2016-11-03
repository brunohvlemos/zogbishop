<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = "SELECT * FROM categorias";
$Recordset1 = mysql_query($query_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?><style type="text/css">
<!--
a {
	font-size: 12px;
	color: #000000;
}
a:visited {
	color: #000000;
}
a:hover {
	color: #000000;
}
a:active {
	color: #000000;
}
body,td,th {
	font-size: 12px;
}
-->
</style>
<table border="0" align="center">
  <?php do { ?>
  <tr> 

    <td width="155"><div align="left"><img src="dot22.gif" /><a href="produtos.php?cod_cat=<?php echo $row_Recordset1['cod_cat'];?>"><?php echo $row_Recordset1['nome_cat']; ?></a></div></td>
 
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<br>
<table border="0" align="center">

  <tr> 

    <td width="155"><div align="center"><a href="carrinho.php?session_id=<?php echo $_SESSION["id"];?>">Meu carrinho de compras</a></div></td>
 
  </tr>

</table>


<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->