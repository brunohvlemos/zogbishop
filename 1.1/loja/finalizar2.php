<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php
  error_reporting(0);
  $_SESSION["cod_usuario"] = $HTTP_POST_VARS["cod_usuario"];
  $cod_usuario = $_SESSION["cod_usuario"];
  if(!isset($_SESSION["cod_usuario"]))
  
  {

  ?> 
<form name="form1" method="post" action="verifica.php">
  <div align="center">Se voc&ecirc; j&aacute; for cadastrado, para finalizar suas 
    compras entre com seu endere&ccedil;o de email e sua senha.<br>
  </div>
  <table width="44%" border="1" align="center">
    <tr> 
      <td width="40%"><div align="right">Email: </div></td>
      <td width="60%"><input name="email" type="text"></td>
    </tr>
    <tr> 
      <td><div align="right">Senha:</div></td>
      <td><input name="senha" type="password"></td>
    </tr>
    <tr> 
      <td colspan="2"> <div align="center"> 
          <input type="submit" name="Submit" value="Enviar">
        </div></td>
    </tr>
  </table>
  <div align="center"><a href="cadastro.php?session_id=<?php echo $_SESSION["id"]; ?>"><br>
    Ainda n&atilde;o tenho cadastrado, quero me cadastrar </a></div>
</form>
<div align="center"><br>
  <?
  }
  else
  {

$selecao = mysql_query("SELECT * FROM usuarios WHERE cod_usuario = '$cod_usuario'"); 

$row = mysql_fetch_array($selecao);
?>
  <center>Confira seus dados para a entrega:</center><br>
</div>
<form name="form1" method="POST" action="atualizar_dados.php">
  <table width="87%" border="1" align="center">
    <tr> 
      <td width="47%"><div align="right">Nome:</div></td>
      <td width="53%"> <input name="nome" type="text" value="<?php echo $row["nome"];?>"></td>
    </tr>
     <tr> 
      <td><div align="right">Endere&ccedil;o:</div></td>
      <td> <textarea name="endereco"><?php echo $row["endereco"];?></textarea></td>
    </tr>
    <tr> 
      <td><div align="right">Pais:</div></td>
      <td> <input name="pais" type="text" value="<?php echo $row["pais"];?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Estado:</div></td>
      <td> <input name="estado" type="text" value="<?php echo $row["estado"];?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Cidade:</div></td>
      <td><input name="cidade" type="text" value="<?php echo $row["cidade"];?>"></td>
    </tr>
    <tr> 
      <td><div align="right">CEP:</div></td>
      <td> <input name="cep" type="text" value="<?php echo $row["cep"];?>"></td>
    </tr>
      <tr> 
      <td colspan="2"> <div align="center"> 
	      <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario;?>">
          <input type="submit" name="form_pag" value="Pagar com cartão de crédito"><br>
		  <input type="submit" name="form_pag" value="Pagar com depósito bancário">
        </div></td>
    </tr>
  </table>
</form>
<?
}
  ?>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->