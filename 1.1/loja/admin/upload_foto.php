<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h1 align="center">Inserindo foto principal!</h1>
<form action="upload_foto2.php" method="post" enctype="multipart/form-data" name="form1">
  <input name="upload_imagem" type="file" id="upload_imagem">
  <br>
  <input name="cod_prod" type="hidden" id="cod_prod" value="<?php echo $HTTP_GET_VARS['cod_prod']; ?>">
  <input name="num_foto" type="hidden" id="num_foto" value="<?php echo $HTTP_GET_VARS['num_foto']; ?>">
  <input type="submit" name="Submit" value="Enviar">
</form>
</body>
</html>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->