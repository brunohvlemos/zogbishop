<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('../Connections/conexao.php'); ?>
<?php
$apelido = $HTTP_POST_VARS["apelido"];
$senha = $HTTP_POST_VARS["senha"];


$selecao = mysql_query("SELECT * FROM admin WHERE apelido = '$apelido' AND senha = '$senha' "); 

$row = mysql_fetch_array($selecao);

if ($row == "")
{
	echo "<center>apelido e/ou senha inválidos.</center>";
	echo "<br>";
	echo "<center><a href=javascript:history.go(-1);>Voltar</a></center>";
exit;
}
else
{
  session_start();

  $_SESSION["apelido"] = $apelido;

  header ("location:index.php");
}

mysql_close($conexao);
?>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->