<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php
$conexao = mysql_connect("localhost","root","");

mysql_select_db("loja", $conexao);

$criar = mysql_query("CREATE TABLE compras (cod_compra INT AUTO_INCREMENT,nome_prod VARCHAR(120),valor INT,quantidade VARCHAR(10),id_temp VARCHAR(60),status VARCHAR(20),form_pag VARCHAR(20),cod_usuario INT,PRIMARY KEY(cod_compra))");

mysql_close($conexao);
?>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->