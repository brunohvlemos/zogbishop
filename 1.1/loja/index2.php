<?php
session_start();
if(!isset($_SESSION["id"]))
{
$_SESSION["id"] = session_id();
}
?>
<html>
<head>
<title>Loja Virtual</title>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="775" height="385" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="top" bgcolor="#FFFF66"> 
    <td height="74" colspan="2"> 
      <?php include "topo.php"; ?>
      <br>
    <br></td>
  </tr>
  <tr> 
    <td width="144" valign="top" bgcolor="#FFFFCC"> 
      <?php include "categorias.php"; ?>
    </td>
    <td width="631" valign="top"><p align="center">&nbsp;</p>
      </td>
  </tr>
</table>
</body>
</html>

<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->