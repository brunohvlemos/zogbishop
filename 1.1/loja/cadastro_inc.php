<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
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