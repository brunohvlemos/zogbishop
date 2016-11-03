<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('../Connections/conexao.php'); ?>
<?php

$cod_usuario = $HTTP_GET_VARS['cod_usuario'];

$deletar = mysql_query("DELETE FROM compras WHERE cod_usuario = '$cod_usuario'");

$alterar = mysql_query("UPDATE usuarios SET status = 'nao' WHERE cod_usuario = '$cod_usuario'");

mysql_close($conexao);

?>

<script language="javascript">
		function pagina_atras(){
			alert("Registros excluídos");
			
            window.close();
			
			window.opener.navigate(window.opener.document.location.href);
		}
	</script>
	
<body onLoad="javascript:pagina_atras();">
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->