<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('Connections/conexao.php'); 
?>
<?php 
$nome = $HTTP_POST_VARS['nome']; 
$endereco = $HTTP_POST_VARS['endereco']; 
$pais = $HTTP_POST_VARS['pais'];
$estado = $HTTP_POST_VARS['estado'];
$cidade = $HTTP_POST_VARS['cidade'];
$cep = $HTTP_POST_VARS['cep']; 
$cod_usuario = $HTTP_POST_VARS['cod_usuario']; 
$form_pag = $HTTP_POST_VARS['form_pag']; 

if ($nome=="")
{
	echo "<center>Por favor, não deixe o campo <b>nome</b> em branco</center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}

if ($endereco=="")
{
	echo "<center>Por favor, não deixe o campo <b>endereco</b> em branco</center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}

if ($pais=="")
{
	echo "<center>Por favor, não deixe o campo <b>pais</b> em branco</center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}

if ($estado=="")
{
	echo "<center>Por favor, não deixe o campo <b>estado</b> em branco</center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}

if ($cidade=="")
{
	echo "<center>Por favor, não deixe o campo <b>cidade</b> em branco</center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}

if ($cep=="")
{
	echo "<center>Por favor, não deixe o campo <b>CEP</b> em branco</center>";
	echo "<br>";
	include "finalizar2.php";
	exit;
}


if ($form_pag == "Pagar com cartão de crédito")
{
   $form_pag = "cartao";
   $alterar = mysql_query("UPDATE usuarios SET nome = '$nome', endereco = '$endereco', pais = '$pais', estado = '$estado', cidade = '$cidade', cep = '$cep', form_pag = '$form_pag'  WHERE cod_usuario = '$cod_usuario'");

   
   ?>

   <form name="form1" method="post" action="finalizar_compra.php">
  <table width="75%" border="1" align="center">
    <tr> 
      <td colspan="2"><div align="center"><strong>Entre com os dados de seu cart&atilde;o 
          de cr&eacute;dito abaixo: </strong></div></td>
    </tr>
    <tr> 
      <td width="51%"><div align="right">Nome do titular do cart&atilde;o de cr&eacute;dito:</div></td>
      <td width="49%"><input name="nome_cartao" type="text" id="nome_cartao"></td>
    </tr>
    <tr> 
      <td><div align="right">Selecione o cart&atilde;o de cr&eacute;dito:</div></td>
      <td><select name="cartao" id="cartao">
          <option selected value="">Selecione</option>
          <option value="visa">Visa</option>
          <option value="dinners">Dinners</option>
          <option value="master_card">Master Card</option>
          <option value="amex">American Express</option>
        </select></td>
    </tr>
    <tr> 
      <td><div align="right">N&uacute;mero do cart&atilde;o:</div></td>
      <td><input name="cartao_numero" type="text" id="cartao_numero"></td>
    </tr>
    <tr> 
      <td><div align="right">N&uacute;mero verificador:</div></td>
      <td><input name="cartao_cvc" type="text" id="cartao_cvc"></td>
    </tr>
    <tr> 
      <td><div align="right">Data de expira&ccedil;&atilde;o do cart&atilde;o:</div></td>
      <td><input name="cartao_data" type="text" id="cartao_data"></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">
          <?php $data = date("d/m/Y",time());?>
		  <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario;?>">
		  <input type="hidden" name="data" value="<?php echo $data;?>">
		  <input type="hidden" name="form_pag" value="cartao">
		  
		  <input type="submit" name="Submit" value="Enviar">
        </div></td>
    </tr>
  </table>
</form>

<?
}
elseif ($form_pag == "Pagar com depósito bancário")
{
 
   
   $form_pag = "depósito";
   
   $data = date("d/m/Y",time()); 
   
$alterar = mysql_query("UPDATE usuarios SET nome = '$nome', endereco = '$endereco', pais = '$pais', estado = '$estado', cidade = '$cidade', cep = '$cep', status ='ok', form_pag = '$form_pag', data_compra = '$data'  WHERE cod_usuario = '$cod_usuario'");

$alterar2 = mysql_query("UPDATE compras SET form_pag = '$form_pag',status = 'ok' WHERE cod_usuario = '$cod_usuario'");

include "carrinho3.php";

}
?>

 
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->