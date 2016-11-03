<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexao = "localhost";
$database_conexao = "loja2";
$username_conexao = "root";
$password_conexao = "mynewpassword";
$conexao = mysql_pconnect($hostname_conexao, $username_conexao, $password_conexao) or die(mysql_error());
mysql_select_db("loja2", $conexao);
?>