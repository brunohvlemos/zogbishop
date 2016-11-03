<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php

$email = $HTTP_POST_VARS["email"];
$senha = $HTTP_POST_VARS["senha"];

if ($email=="")
{
	echo "<center>Por favor digite um valor para o campo <b>email</b></center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}

if ($senha=="")
{
	echo "<center>Por favor digite um valor para o campo <b>senha</b></center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}


$selecao = mysql_query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' "); 

$row = mysql_fetch_array($selecao);

if ($row == "")
{
	echo "<center><b>Apelido e/ou senha inválidos.</b></center>";
	echo "<br>";
	include "finalizar2.php";
}
else
{


$cod_usuario = $row["cod_usuario"];

$session_id = $_SESSION["id"];

$alterar = mysql_query("UPDATE compras SET cod_usuario = '$cod_usuario' WHERE id_temp = '$session_id'");




echo "<br><br><center>Bem vindo <b>",$row["nome"],"</center>";
echo "<center><form action=finalizar.php method=post>";
echo "<input type=hidden value=",$row["cod_usuario"]," name=cod_usuario>";
echo "<input type=submit value='Clique aqui para finalizar o seu processo de compras'></center>";







	}


mysql_close($conexao);
?>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->