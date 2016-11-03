<?php include "topo.php";?>
<?php require_once('../Connections/conexao.php'); ?>
<?php 

$cod_cat = $HTTP_POST_VARS['cod_cat'];
$nome_prod = $HTTP_POST_VARS['nome_prod'];
$descricao = $HTTP_POST_VARS['descricao'];
$valor = $HTTP_POST_VARS['valor'];
$destaque = $HTTP_POST_VARS['destaque'];
$cod_prod = $HTTP_POST_VARS['cod_prod'];

$alterar = mysql_query("UPDATE produtos SET cod_cat = '$cod_cat', nome_prod = '$nome_prod', descricao = '$descricao', valor = '$valor', destaque = '$destaque' WHERE cod_prod = '$cod_prod'");

mysql_close($conexao);
?><br>
<center><b>Registro atualizado.</b></center>
