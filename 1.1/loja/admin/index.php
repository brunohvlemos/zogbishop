<?php
session_start();

if(!isset($_SESSION["apelido"]))

{
    header("Location: login.php");
    exit;
}
?>

<?php include "topo.php";?>
<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<center><h1>Admin</h1></center>
</body>
</html>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->