<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
<?php require_once('Connections/conexao.php'); 

?>
<?php 
$nome_cartao = $HTTP_POST_VARS['nome_cartao']; 
$cartao = $HTTP_POST_VARS['cartao'];
$cartao_numero = $HTTP_POST_VARS['cartao_numero'];
$cartao_cvc = $HTTP_POST_VARS['cartao_cvc'];
$cartao_data = $HTTP_POST_VARS['cartao_data'];
$data = $HTTP_POST_VARS['data']; 
$cod_usuario = $HTTP_POST_VARS['cod_usuario']; 
$form_pag = $HTTP_POST_VARS['form_pag']; 

if ($nome_cartao=="" OR $cartao =="" OR $cartao_numero =="" OR $cartao_cvc =="" OR $cartao_data =="")
{
	echo "<center><b>Por favor, preencha todos os campos corretamente,<br>não esqueça de selecionar o seu cartão de crédito.</b></center>";
?>
   <form name="form1" method="post" action="finalizar_compra.php">
  <table width="75%" border="1" align="center">
    <tr> 
      <td colspan="2"><div align="center"><strong>Entre com os dados de seu cart&atilde;o 
          de cr&eacute;dito abaixo: </strong></div></td>
    </tr>
    <tr> 
      <td width="51%"><div align="right">Nome do titular do cart&atilde;o de cr&eacute;dito:</div></td>
      <td width="49%"><input name="nome_cartao" type="text" id="nome_cartao" value="<?php echo $nome_cartao;?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Selecione o cart&atilde;o de cr&eacute;dito:</div></td>
      <td><select name="cartao" id="cartao">
          <option selected value="">Selecione</option>
          <option value="visa" <?php if ($cartao == "visa") {echo "selected";}?>>Visa</option>
          <option value="dinners" <?php if ($cartao == "dinners") {echo "selected";}?>>Dinners</option>
          <option value="master_card" <?php if ($cartao == "master_card") {echo "selected";}?>>Master Card</option>
          <option value="amex" <?php if ($cartao == "amex") {echo "selected";}?>>American Express</option>
        </select></td>
    </tr>
    <tr> 
      <td><div align="right">N&uacute;mero do cart&atilde;o:</div></td>
      <td><input name="cartao_numero" type="text" id="cartao_numero" value="<?php echo $cartao_numero;?>"></td>
    </tr>
    <tr> 
      <td><div align="right">N&uacute;mero verificador:</div></td>
      <td><input name="cartao_cvc" type="text" id="cartao_cvc" value="<?php echo $cartao_cvc;?>"></td>
    </tr>
    <tr> 
      <td><div align="right">Data de expira&ccedil;&atilde;o do cart&atilde;o:</div></td>
      <td><input name="cartao_data" type="text" id="cartao_data" value="<?php echo $cartao_data;?>"></td>
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
			  exit;
}
?>


<p align="center">Suas compras foram finalizadas com sucesso</p>

<p align="center">
  <?php
$alterar = mysql_query("UPDATE usuarios SET nome_cartao = '$nome_cartao',cartao = '$cartao',cartao_numero = '$cartao_numero',cartao_cvc = '$cartao_cvc',cartao_data = '$cartao_data',form_pag = '$form_pag',data_compra = '$data',status = 'ok' WHERE cod_usuario = '$cod_usuario'");

$alterar2 = mysql_query("UPDATE compras SET form_pag = '$form_pag',status = 'ok' WHERE cod_usuario = '$cod_usuario'");
?>
</p>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->