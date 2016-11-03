<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('../Connections/conexao.php'); ?>
<?php
   $cod_prod = $HTTP_POST_VARS["cod_prod"];
   $num_foto = $HTTP_POST_VARS["num_foto"];

	list($width, $height) = getimagesize($_FILES['upload_imagem']['tmp_name']);



	if (!eregi("^image\/(pjpeg|jpeg|gif)$", $_FILES['upload_imagem']['type']))
	
	{      
     ?>
           <script language="javascript">
		   alert("Tipo de arquivo não permitido!\nApenas JPG ou GIF.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}

	elseif($width > 600 || $height > 600)

    {
     ?>
           <script language="javascript">
		   alert("Imagem muito grande!\nTem que ter no máximo 600 X 120 pixels.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
    }

	elseif ($_FILES['upload_imagem']['size'] > 20000000)

	{
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}

	else
	{
          $cripto = substr(md5(uniqid(time())), 0, 10);

          $imagem = $_FILES['upload_imagem']['name'];

          $imagem_final = $cripto.$imagem;

          move_uploaded_file($_FILES['upload_imagem']['tmp_name'],"../fotos/".$imagem_final);

          $caminho_foto = $imagem_final;
	
if ($num_foto == 0){
    $alterar = mysql_query("UPDATE produtos SET fot_peq = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");

}
elseif ($num_foto == 1){
    $alterar = mysql_query("UPDATE produtos SET fot_1 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
elseif ($num_foto == 2){
    $alterar = mysql_query("UPDATE produtos SET fot_2 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
elseif ($num_foto == 3){
    $alterar = mysql_query("UPDATE produtos SET fot_3 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
elseif ($num_foto == 4){
    $alterar = mysql_query("UPDATE produtos SET fot_4 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
elseif ($num_foto == 5){
    $alterar = mysql_query("UPDATE produtos SET fot_5 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
elseif ($num_foto == 6){
    $alterar = mysql_query("UPDATE produtos SET fot_6 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
elseif ($num_foto == 7){
    $alterar = mysql_query("UPDATE produtos SET fot_7 = 'fotos/$caminho_foto' WHERE cod_prod = '$cod_prod'");
	
}
    mysql_close($conexao);
	}

?>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->