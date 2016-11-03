<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('Connections/conexao.php'); ?>

<?php
error_reporting(0);
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $editFormAction .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

if ((isset($HTTP_POST_VARS["MM_insert"])) && ($HTTP_POST_VARS["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuarios (nome, email, senha, endereco, pais, estado, cidade, cep, autoriza) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($HTTP_POST_VARS['nome'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['email'], "text"),
	                   GetSQLValueString($HTTP_POST_VARS['senha1'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['endereco'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['pais'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['estado'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['cidade'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['cep'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['autoriza'], "text"));


$_SESSION["nome"] = $HTTP_POST_VARS['nome'];
$_SESSION["email"] = $HTTP_POST_VARS['email'];
$_SESSION["senha1"] = $HTTP_POST_VARS['senha1'];
$_SESSION["senha2"] = $HTTP_POST_VARS['senha2'];
$_SESSION["endereco"] = $HTTP_POST_VARS['endereco'];
$_SESSION["pais"] = $HTTP_POST_VARS['pais'];
$_SESSION["estado"] = $HTTP_POST_VARS['estado'];
$_SESSION["cidade"] = $HTTP_POST_VARS['cidade'];
$_SESSION["cep"] = $HTTP_POST_VARS['cep'];



  
 if ($HTTP_POST_VARS['nome'] == "")
 {
	 echo "<center>Por favor preencha o campo <b>nome</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }


	  if ($HTTP_POST_VARS['email'] == "")
 {
	 echo "<center>Por favor preencha o campo <b>email</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }


		  if ($_SESSION["senha1"] != $_SESSION["senha2"])
 {
	 echo "<center>Os valores de <b>senha</b> não conferem, por favor, tente de novo. </center><br>";
	 include "cadastro_inc.php";
     exit;
	 }

	 		  if ($HTTP_POST_VARS['senha1'] == "")
 {
	 echo "<center>Por favor preencha o campo <b>senha</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }


		  if ($HTTP_POST_VARS['senha2'] == "")
 {
	 echo "<center>Preencha o campo <b>senha</b> novamente.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }

		  if ($HTTP_POST_VARS['endereco'] == "")
 {
	 echo "<center>Por favor, preencha o campo <b>endereco</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }

			  if ($HTTP_POST_VARS['pais'] == "")
 {
	 echo "<center>Por favor, preencha o campo <b>país</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }

				  if ($HTTP_POST_VARS['estado'] == "")
 {
	 echo "<center>Por favor, preencha o campo <b>estado</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }

			  if ($HTTP_POST_VARS['cidade'] == "")
 {
	 echo "<center>Por favor, preencha o campo <b>cidade</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }

				  if ($HTTP_POST_VARS['cep'] == "")
 {
	 echo "<center>Por favor, preencha o campo <b>CEP</b>.</center><br>";
	 include "cadastro_inc.php";
     exit;
	 }


  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

    $insertGoTo = "finalizar.php";
    if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $HTTP_SERVER_VARS['QUERY_STRING'];
  }
  ?>
  <?php 
   include "finalizar2.php";
   exit;
}
?>

<form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="87%" border="1" align="center">
    <tr> 
      <td width="47%"><div align="right">Nome:</div></td>
      <td width="53%"> <input name="nome" type="text" value="<?php echo $_SESSION['nome']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Email:</div></td>
      <td> <input name="email" type="text" value="<?php echo $_SESSION['email']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Senha:</div></td>
      <td> <input name="senha1" type="password" value="<?php echo $_SESSION['senha1']?>"></td>
    </tr>
    <tr> 
      <td height="30">
<div align="right">Repita a senha:</div></td>
    <td> <input name="senha2" type="password" value="<?php echo $_SESSION['senha2']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Endere&ccedil;o:</div></td>
      <td> <textarea name="endereco"><?php echo $_SESSION['endereco']?></textarea></td>
    </tr>
    <tr> 
      <td><div align="right">País:</div></td>
      <td> <input name="pais" type="text" value="<?php echo $_SESSION['pais']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Estado:</div></td>
      <td> <input name="estado" type="text" value="<?php echo $_SESSION['estado']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Cidade:</div></td>
      <td><input name="cidade" type="text" value="<?php echo $_SESSION['cidade']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">CEP:</div></td>
      <td> <input name="cep" type="text" value="<?php echo $_SESSION['cep']?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Gostaria de receber informa&ccedil;&otilde;es sobre 
          as nossas novidades por email:</div></td>
      <td> <input name="autoriza" type="radio" value="sim" checked>
        sim 
        <input name="autoriza" type="radio" value="nao">
        n&atilde;o</td>
    </tr>
    <tr> 
      <td colspan="2"> <div align="center"> 
          <input type="submit" name="Submit" value="Enviar">
               </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>

<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->