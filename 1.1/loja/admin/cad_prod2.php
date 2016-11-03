<?php include "topo.php";?>
<?php require_once('../Connections/conexao.php'); ?>
<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"><br>
  <?php $cod_cat = $HTTP_POST_VARS['cod_cat']; ?>
  <?php $nome_prod = $HTTP_POST_VARS['nome_prod']; ?>
  <?php $valor = $HTTP_POST_VARS['valor']; ?>
  <?php $garan = $HTTP_POST_VARS['garan']; ?>
  <?php $quan = $HTTP_POST_VARS['quan']; ?>
  <?php $localiza = $HTTP_POST_VARS['localiza']; ?>
  <?php $destaque = $HTTP_POST_VARS['destaque']; ?>
  <?php $tipo = $HTTP_POST_VARS['tipo']; ?>
  <?php $descricao = $HTTP_POST_VARS['descricao']; ?>
<?php 

$inserir = mysql_query("INSERT INTO produtos (nome_prod, descricao, valor, garan, quan, localiza, destaque, tipo, cod_cat) VALUES('$nome_prod', '$descricao', '$valor', '$garan', '$quan', '$localiza', '$destaque', '$tipo', '$cod_cat')");

$selecao = mysql_query("SELECT * FROM produtos WHERE nome_prod = '$nome_prod'"); 

$row = mysql_fetch_array($selecao);

echo "Produto cadastrado!!";
echo "<br>";


$cod_prod2 = $row["cod_prod"];

mysql_close($conexao) 

?>
  <br>
  Clique <a href="pre_upload.php?cod_prod=<?php echo $cod_prod2?>">aqui</a> 
  para enviar as fotos desse produto. </div>
</body>
</html>
