<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>

	<style type="text/css">
		body{ color: #333; font: 13px 'Lucida Grande', Verdana, sans-serif;	}
	</style>
<?php require_once('Connections/conexao.php'); ?> 
<?php
$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];

$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($HTTP_GET_VARS['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $HTTP_GET_VARS['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "1";
if (isset($HTTP_GET_VARS['cod_cat'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['cod_cat'] : addslashes($HTTP_GET_VARS['cod_cat']);
}
mysql_select_db($database_conexao, $conexao);
$query_Recordset1 = sprintf("SELECT * FROM produtos WHERE cod_cat = %s", $colname_Recordset1);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexao) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($HTTP_GET_VARS['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $HTTP_GET_VARS['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . implode("&", $newParams);
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF; font-weight: bold; }
.style3 {color: #000000}
.style4 {color: #FF0000}
.style7 {font-size: 10px}
.style8 {font-size: 9px}
body,td,th {
	font-size: 9px;
}
a {
	font-size: 9px;
}
-->
</style>

<div align="center">
  <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
  No momento n&atilde;o dispomos de nenhum produto para essa categoria. 
  <?php } // Show if recordset empty ?>
  <br>
  <?php do { ?>
  <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
    <br />
  <center>
    <table style="margin-top: 5px;" width="500" align="center" bgcolor="#333399" border="0" cellpadding="0" cellspacing="0" height="22">
      <tbody>
        <tr>
          <td valign="top" width="9"><img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/cpb1.gif" width="9" height="10" /></td>
          <td width="682" align="center"><div align="left" class="style2">
            <div align="center"><?php echo $row_Recordset1['nome_prod']; ?></div>
          </div>          </td>
          <td valign="top" width="10"><img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/cpb2.gif" width="9" height="10" /></td>
        </tr>
      </tbody>
    </table>
    <div style="display: none;" id="paywithmp">
      <table style="border-style: solid solid none; border-color: rgb(153, 153, 153) rgb(153, 153, 153) -moz-use-text-color; border-width: 1px 1px medium; background-color: rgb(201, 244, 252);" width="700" border="0" cellpadding="0" cellspacing="0" height="32">
        <tbody>
          <tr>
            <td><div class="blub12" style="padding-left: 10px;">Tienes pendiente el pago de este art&iacute;culo, paga ahora con <img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/logoMP_111x25.gif" width="115" align="absmiddle" height="25" /> </div></td>
          </tr>
        </tbody>
      </table>
      <table style="border: 1px solid rgb(153, 153, 153); padding: 4px;" width="700" border="0" cellpadding="0" cellspacing="0" height="62">
        <tbody>
          <tr>
            <td width="524"><div style="padding-left: 12px;" class="bl2n11">
              <li><b>&iexcl;Es gratis!</b></li>
              <li>Puedes pagar hasta en <b>12 cuotas con tarjeta</b> a <a href="javascript:mediosPago('45000','REA');">tasas convenientes</a>.</li>
              <li>MercadoPago <b>protege tu compra</b>.<img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/mpagos_mla_420x24.gif" width="420" align="texttop" height="24" hspace="15" /> </li>
            </div></td>
            <td width="174" align="center" bgcolor="#f4f4f4"><a href="http://www.mercadolivre.com.br/jm/LogFromMLController?ctrlr=PayItem&amp;itemId=90045825"><img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/pagar_ahora_bot.gif" alt="Pagar ahora" width="143" border="0" height="28" /></a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <table width="500" align="center" bgcolor="#fee600" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td width="3"><img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/t.gif" width="1" height="10" /></td>
          <td width="373">&nbsp;</td>
          <td class="bl2n12" valign="top" width="124" align="right">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#999999"><img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/t.gif" width="1" height="1" /></td>
        </tr>
      </tbody>
    </table>
    <table width="506" border="0">
      <tr>
        <td width="39"><img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/solapa_IMG_Y_VID_N.gif" usemap="#ONLYIMG" width="39" border="0" height="275" /><br />
        <br />
            <map name="ONLYIMG" id="ONLYIMG">
              <area shape="rect" coords="1,1,38,56" title="Fotos" />
              <area shape="rect" coords="1,56,40,112" title="Sem v&iacute;deo" />
            </map>        </td>
        <td width="227"><div align="center"><a href="<?php echo $row_Recordset1['fot_peq'];?>" rel="lightbox"><img src="<?php echo $row_Recordset1['fot_peq'];?>" width="200" height="200" border="0" /><br /></a>
            <a href="<?php echo $row_Recordset1['fot_1']; ?>" rel="lightbox"><img src="<?php echo $row_Recordset1['fot_1']; ?>" width="50" height="50" border="0" /></a> <a href="<?php echo $row_Recordset1['fot_2']; ?>" rel="lightbox"><img src="<?php echo $row_Recordset1['fot_2']; ?>" width="50" height="50" border="0" /></a> <a href="<?php echo $row_Recordset1['fot_3']; ?>" rel="lightbox"><img src="<?php echo $row_Recordset1['fot_3']; ?>" width="50" height="50" border="0" /></a><a href="<?php echo $row_Recordset1['fot_4']; ?>" rel="lightbox"><img src="<?php echo $row_Recordset1['fot_4']; ?>" width="50" height="50" border="0" /><br />
            </a>
            <span class="gr2n10 style4">Clique na foto para ampli&aacute;-la<img src="MLB-90045825-celular-gsm-vaic-mp10-com-flash-grava-tv-2chips-jogos-nes-fm-_JM_arquivos/t.gif" width="1" height="1" /></span><br />
            </div></td>
        <td width="226"><table width="232" height="223" border="0">
            <tr>
              <td width="95"><span class="style7">Tipo de produto:</span></td>
              <td width="127"><div align="right"><?php echo $row_Recordset1['tipo']; ?></div></td>
            </tr>
            <tr>
              <td>Localiza&ccedil;&atilde;o:</td>
              <td><div align="right"><span class="style3"><?php echo $row_Recordset1['localiza']; ?></span></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="21">Quant.</td>
              <td><div align="right"><span class="style3"><?php echo $row_Recordset1['quan']; ?></span></div></td>
            </tr>
            <tr>
              <td height="18"><span class="style8">Pre&ccedil;o Fixo:</span></td>
              <td><div align="right"><span class="style3">R$<?php echo $row_Recordset1['valor']; ?>,00</span></div></td>
            </tr>
            
        </table>
          <br />
          <table width="232" border="0">
            <tr>
              <td width="226" bgcolor="#FEE600"><form method="post" action="comprar.php">
                <div align="center">
                  <input type="hidden" name="session_id" value="<?php echo $_SESSION["id"]; ?>" />
                  <input type="hidden" name="valor" value="<?php echo $row_Recordset1['valor']; ?>" />
                  <input type="hidden" name="nome_prod" value="<?php echo $row_Recordset1['nome_prod']; ?>" />
                  Quantidade
                  <select name="quantidade" id="quantidade">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                </select>
                      <input type="submit" value="Comprar" />
                      <br />
                  </div>
              </form>
              </td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table width="506" border="0">
      <tr>
        <td bgcolor="#FEE600"><div align="left"><span class="style3">Garantia: <?php echo $row_Recordset1['garan']; ?></span></div></td>
      </tr>
      <tr>
        <td bgcolor="#333399"><span class="style2">Descri&ccedil;&atilde;o:</span></td>
      </tr>
      <tr>
        <td><div align="left"><?php echo $row_Recordset1['descricao']; ?></div></td>
      </tr>
      <tr>
        <td bgcolor="#FEE600">&nbsp;</td>
      </tr>
    </table>
  </center>
  <br />
  <HR width="402">
  <br />
  <br>
  <?php } // Show if recordset not empty ?>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
mysql_free_result($Recordset1);
?>
  <br />
  <br />
  <p>&nbsp; Registros <?php echo ($startRow_Recordset1 + 1) ?> a <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> de <?php echo $totalRows_Recordset1 ?> 
  <table border="0" width="50%" align="center">
    <tr> 
      <td width="23%" align="center"> <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">Primeiro</a> 
        <?php } // Show if not first page ?> </td>
      <td width="31%" align="center"> <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Retornar</a> 
        <?php } // Show if not first page ?> </td>
      <td width="23%" align="center"> <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Avan&ccedil;ar</a> 
        <?php } // Show if not last page ?> </td>
      <td width="23%" align="center"> <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">&Uacute;ltimo</a> 
        <?php } // Show if not last page ?> </td>
    </tr>
  </table></p>
  </div>
<!--
Essa loja foi criada pela equipe TutoJogos.com.br
Por: Leonardo.j.b, leo.jackson.loko@hotmail.com
sistema de MercadoWeb, sua loja na internet!
 -->