<?php
class app_Desempenhos_form extends app_Desempenhos_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<!------------ Geração do Formulário ------------------>

<html>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo 'DESEMPENHO DOS LÍDERES'; } else { echo 'DESEMPENHO DOS LÍDERES'; } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <STYLE>
  div.auto_complete { background-color: #FFFFFF; color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px; border: 1px solid #888; margin: 0px; padding: 0px; position: absolute; width: 250px }
  ul.contacts { list-style-type: none; margin: 0px; padding: 0px }
  ul.contacts li.selected { background-color: #E2FFDC; color: #333333; font-family: Verdana, Arial, sans-serif; font-weight: bold }
  li.contact { list-style-type: none; display: block; margin: 0; padding: 2px; height: 32px }
  li.contact div.nm_ac_busca { line-height:1.2em }
  li.contact div.nm_ac_cod { line-height:1.2em }
  #list { margin: 0; margin-top: 10px; padding: 0; list-style-type: none; width: 250px }
  #list li { margin: 0; margin-bottom: 4px; padding: 5px; border: 1px solid #888; cursor: move }
  .scFormPage { background-color: #FFFFFF; background-image: url(<?php echo $this->Ini->path_img_modelo; ?>/scriptcase__NM__bgmiolo.gif); color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px }
  .css_fun_cab { background-color: #189300 }
  .css_cabecalho { color: #FFFFFF; font-family: Verdana, Arial, sans-serif; font-size: 13px }
  .css_tabela { background-color: #189300 }
  .css_rodape { color: #FFFFFF; font-family: Verdana, Arial, sans-serif; font-size: 13px }
  .scToolbar { background-image: url(<?php echo $this->Ini->path_img_modelo; ?>/scriptcase__NM__BgIconesVerde.gif) }
  .scFormTable { border-collapse: collapse; border-color: #189300; border-style: solid; border-width: 1 }
  .scFormLabelOdd { background-color: #45C42D; color: #FFFFFF; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scFormLabelOddFormat { font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scFormObjectOdd { border-color: #45C42D; border-style: solid; border-width: 1; font-family: Verdana, Arial, sans-serif; font-size: 11px }
  .scFormObjectFocusOdd { border-color: #45C42D; border-style: solid; border-width: 1; font-family: Verdana, Arial, sans-serif; font-size: 11px; background-color: #FFFFAA; border-color: #45C42D; border-style: solid; border-width: 1; font-family: Verdana, Arial, sans-serif; font-size: 11px }
  .scFormDataOdd { background-color: #E2FFDC; color: #333333; font-family: Verdana, Arial, sans-serif; font-size: 12px }
  .scFormDataFontOdd { color: #333333; font-family: Verdana, Arial, sans-serif; font-size: 12px }
  .scErrorTitle { background-color: #FF0000; border-color: #FF0000; border-style: solid; border-width: 1; color: #FFFFBB; font-family: Arial, sans-serif; font-size: 13px; font-weight: bold; text-align: left }
  .scErrorTitleFont { color: #FFFFBB; font-family: Arial, sans-serif; font-size: 13px; font-weight: bold }
  .scErrorMessage { background-color: #ffdddd; border-color: #990000; border-style: solid; border-width: 1; color: #990000; font-family: Verdana, Arial, sans-serif; font-size: 11px; padding: 2px; text-align: left }
  .scErrorMessageFont { color: #990000; font-family: Verdana, Arial, sans-serif; font-size: 11px }
  .scErrorLine { color: #333333; font-family: Verdana, Arial, sans-serif; font-size: 12px; background-color: #FDE6E6 }
  .scBlock { background-color: #45C42D; color: #FFFFFF; font-family: Verdana, Arial, sans-serif; font-size: 14px; font-weight: bold; padding: 2px; text-align: left; vertical-align: middle }
  .scTabActive { background-color: #daf8d4; color: #189300; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scTabInactive { background-color: #c5e0bf; color: #5c9050; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scTabActiveFont { color: #189300; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; text-decoration: none; font-style: normal }
  .scTabInactiveFont { color: #5c9050; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; text-decoration: none; font-style: normal }
 </STYLE>
 <SCRIPT language="javascript" src="app_Desempenhos_dynifs.js"></SCRIPT>
 <SCRIPT language="javascript" src="app_Desempenhos_calc.js"></SCRIPT>
<?php
include_once("app_Desempenhos_sajax_js.php");
?>
<script type="text/javascript">
var posDispLeft = 0;
var posDispTop = 0;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
 if ('S' == str_ret)
 {
  if (document.getElementById("sc_b_ini_" + str_pos)) {
    sImg = document.getElementById("sc_b_ini_" + str_pos).src;
    nav_liga_img();
    document.getElementById("sc_b_ini_" + str_pos).src = sImg;
  }
  if (document.getElementById("sc_b_ret_" + str_pos)) {
    sImg = document.getElementById("sc_b_ret_" + str_pos).src;
    nav_liga_img();
    document.getElementById("sc_b_ret_" + str_pos).src = sImg;
  }
 }
 else
 {
  if (document.getElementById("sc_b_ini_" + str_pos)) {
    sImg = document.getElementById("sc_b_ini_" + str_pos).src;
    nav_desliga_img();
    document.getElementById("sc_b_ini_" + str_pos).src = sImg;
  }
  if (document.getElementById("sc_b_ret_" + str_pos)) {
    sImg = document.getElementById("sc_b_ret_" + str_pos).src;
    nav_desliga_img();
    document.getElementById("sc_b_ret_" + str_pos).src = sImg;
  }
 }
 if ('S' == str_ava)
 {
  if (document.getElementById("sc_b_avc_" + str_pos)) {
    sImg = document.getElementById("sc_b_avc_" + str_pos).src;
    nav_liga_img();
    document.getElementById("sc_b_avc_" + str_pos).src = sImg;
  }
  if (document.getElementById("sc_b_fim_" + str_pos)) {
    sImg = document.getElementById("sc_b_fim_" + str_pos).src;
    nav_liga_img();
    document.getElementById("sc_b_fim_" + str_pos).src = sImg;
  }
 }
 else
 {
  if (document.getElementById("sc_b_avc_" + str_pos)) {
    sImg = document.getElementById("sc_b_avc_" + str_pos).src;
    nav_desliga_img();
    document.getElementById("sc_b_avc_" + str_pos).src = sImg;
  }
  if (document.getElementById("sc_b_fim_" + str_pos)) {
    sImg = document.getElementById("sc_b_fim_" + str_pos).src;
    nav_desliga_img();
    document.getElementById("sc_b_fim_" + str_pos).src = sImg;
  }
 }
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe']) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body  class="scFormPage" <?php echo $str_iframe_body; ?>>
<div id="idJSSpecChar" style="display:none;"></div>
<script language="javascript" src="app_Desempenhos_digita.js"> 
</script> 
<?php
 include_once("app_Desempenhos_js0.php");
?>
<script language="javascript" src="app_Desempenhos_tab_erro.js"> 
</script> 
<script language="javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 </script>
<form name="F1" method=post 
               action="app_Desempenhos.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo $nmgp_num_form; ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe']) ? 0 : "3";
?>
<table align="center" cellpadding=<?php echo $int_iframe_padding; ?> cellspacing=0 border=0 align=center >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['mostra_cab'] != "N"))
  {
?>
<tr><td>
   <TABLE width="100%" class="css_fun_cab" cellspacing="0" cellpadding="0">
    <TR align="center" class="css_cabecalho">
     <TD>
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%">
       <TR valign="middle">
        <TD align="left" rowspan="3" class="css_cabecalho">
          <IMG SRC="<?php echo $this->Ini->path_imag_cab ?>/grp__NM__Logo3.JPG" BORDER="0"/>
        </TD>
        <TD align="left" class="css_cabecalho">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="css_cabecalho">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="css_cabecalho">
          
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="css_cabecalho">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="css_cabecalho">
          <?php if ($this->nmgp_opcao == "novo") { echo "DESEMPENHO DOS LÍDERES"; } else { echo "DESEMPENHO DOS LÍDERES"; } ?>
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="css_cabecalho">
          
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="css_cabecalho">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="center" class="css_cabecalho">
          
        </TD>
        <TD style="font-size: 5px">
          &nbsp; &nbsp;
        </TD>
        <TD align="right" class="css_cabecalho">
          
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE></td></tr>
<?php
  }
?>
<tr><td align="center">
<?php
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R")
{
?>
    <table border=0  cellpadding=2 cellspacing=0 align=center width="100%">
    <tr align=center><td nowrap class="scToolbar"> 
<?php
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R")
{
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['first'] == "on") && ('total' != $this->form_paginacao)) {
?>
       <input type="image" name="sc_b_ini" onclick="nm_move ('inicio'); return false;" title="Retornar para a primeira p&aacute;gina" id="sc_b_ini_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_binicio.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['back'] == "on") && ('total' != $this->form_paginacao)) {
?>
       <input type="image" name="sc_b_ret" onclick="nm_move ('retorna'); return false;" title="Retornar para a p&aacute;gina anterior" id="sc_b_ret_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bretorna.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['forward'] == "on") && ('total' != $this->form_paginacao)) {
?>
       <input type="image" name="sc_b_avc" onclick="nm_move ('avanca'); return false;" title="Avan&ccedil;ar para a pr&oacute;xima p&aacute;gina" id="sc_b_avc_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bavanca.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['last'] == "on") && ('total' != $this->form_paginacao)) {
?>
       <input type="image" name="sc_b_fim" onclick="nm_move ('final'); return false;" title="Avan&ccedil;ar para a &uacute;ltima p&aacute;gina" id="sc_b_fim_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bfinal.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['new'] == "on") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_new" onclick="nm_move ('novo'); return false;" title="Abrir novos registros" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bnovo.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nmgp_botoes['insert'] == "on") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_ins" onclick="nm_atualiza ('incluir'); return false;" title="Incluir o registro" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bincluir.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['update'] == "on") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_upd" onclick="nm_atualiza ('alterar'); return false;" title="Salvar altera&ccedil;&otilde;es" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_balterar.gif" ?>" align="absmiddle"> 
<?php
    }
    if ('' != $this->url_webhelp) {
?>
       <input type="image" name="sc_b_hlp" onclick="window.open('<?php echo $this->url_webhelp; ?>', 'Ajuda', 'resizable, scrollbars'); return false;" title="Ajuda" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bhelp.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] == "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") && ($this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.submit();return false;" title="Cancelar" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenhos']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
<?php
}
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td align="center">
<table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_table_frame">
<tr><td class="scErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><img src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__notice.gif" style="border-width: 0px" align="top">ERRO</td><td style="padding: 0px; vertical-align: top"><a href="javascript: scAjaxHideErrorDisplay('table')"><img src="<?php echo $this->Ini->path_botoes; ?>/close_icon.gif" border="0" align="absmiddle"></a></td></tr></table></td></tr>
<tr><td class="scErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</td></tr>
<tr><td align="center">
<table class="scFormTable" style="display: none" id="id_message_display_frame">
<tr><td class="scFormDataOdd"><span id="id_message_display_text"></span></td></tr>
</table>
</td></tr>
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       echo "</td></tr><tr><td align=center>";
       echo "<font face=\"" . $this->Ini->pag_fonte_tipo . "\" color=\"" . $this->Ini->cor_txt_grid . "\" size=\"4\"><b>N&atilde;o h&aacute; registros a exibir</b></font>";
       echo "</td></tr>";
       return; "</td></tr>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing="" border="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" height="100%">   <tr>


   
    <TD class="scFormLabelOdd" style="display: none;" > SEQ </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormLabelOdd" > EXC </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormLabelOdd" > INC </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOdd" > <input type="image" id="sc_new_line_0" onclick="do_ajax_app_Desempenhos_add_new_line(0); return false;" src="<?php echo $this->Ini->path_img_global ?>/fld_expand.gif" title="Abrir um novo registro" style="display:none"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOdd" > &nbsp; </TD>
   <?php }?>
   <?php if (!isset($this->nmgp_cmp_hidden['cod_desemp']) || $this->nmgp_cmp_hidden['cod_desemp'] == 'on') {
      if (!isset($this->nm_new_label['cod_desemp'])) {
          $this->nm_new_label['cod_desemp'] = 'Código'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_cod_desemp" style="<?php echo $sStyleHidden_cod_desemp; ?>" > <?php echo $this->nm_new_label['cod_desemp']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_turma']) || $this->nmgp_cmp_hidden['id_turma'] == 'on') {
      if (!isset($this->nm_new_label['id_turma'])) {
          $this->nm_new_label['id_turma'] = 'Turma'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_turma" style="<?php echo $sStyleHidden_id_turma; ?>" > <?php echo $this->nm_new_label['id_turma']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_grupo']) || $this->nmgp_cmp_hidden['id_grupo'] == 'on') {
      if (!isset($this->nm_new_label['id_grupo'])) {
          $this->nm_new_label['id_grupo'] = 'Grupo'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_grupo" style="<?php echo $sStyleHidden_id_grupo; ?>" > <?php echo $this->nm_new_label['id_grupo']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_etapa']) || $this->nmgp_cmp_hidden['id_etapa'] == 'on') {
      if (!isset($this->nm_new_label['id_etapa'])) {
          $this->nm_new_label['id_etapa'] = 'Pista'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_etapa" style="<?php echo $sStyleHidden_id_etapa; ?>" > <?php echo $this->nm_new_label['id_etapa']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_votante']) || $this->nmgp_cmp_hidden['id_votante'] == 'on') {
      if (!isset($this->nm_new_label['id_votante'])) {
          $this->nm_new_label['id_votante'] = 'Votante'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_votante" style="<?php echo $sStyleHidden_id_votante; ?>" > <?php echo $this->nm_new_label['id_votante']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_votado']) || $this->nmgp_cmp_hidden['id_votado'] == 'on') {
      if (!isset($this->nm_new_label['id_votado'])) {
          $this->nm_new_label['id_votado'] = 'Votado'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_votado" style="<?php echo $sStyleHidden_id_votado; ?>" > <?php echo $this->nm_new_label['id_votado']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_competencia']) || $this->nmgp_cmp_hidden['id_competencia'] == 'on') {
      if (!isset($this->nm_new_label['id_competencia'])) {
          $this->nm_new_label['id_competencia'] = 'Competência'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_competencia" style="<?php echo $sStyleHidden_id_competencia; ?>" > <?php echo $this->nm_new_label['id_competencia']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['peso']) || $this->nmgp_cmp_hidden['peso'] == 'on') {
      if (!isset($this->nm_new_label['peso'])) {
          $this->nm_new_label['peso'] = 'PESO'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_peso" style="<?php echo $sStyleHidden_peso; ?>" > <?php echo $this->nm_new_label['peso']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_habilidade']) || $this->nmgp_cmp_hidden['id_habilidade'] == 'on') {
      if (!isset($this->nm_new_label['id_habilidade'])) {
          $this->nm_new_label['id_habilidade'] = 'Habilidade'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_habilidade" style="<?php echo $sStyleHidden_id_habilidade; ?>" > <?php echo $this->nm_new_label['id_habilidade']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['resultado']) || $this->nmgp_cmp_hidden['resultado'] == 'on') {
      if (!isset($this->nm_new_label['resultado'])) {
          $this->nm_new_label['resultado'] = 'RESULTADO'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_resultado" style="<?php echo $sStyleHidden_resultado; ?>" > <?php echo $this->nm_new_label['resultado']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['nota']) || $this->nmgp_cmp_hidden['nota'] == 'on') {
      if (!isset($this->nm_new_label['nota'])) {
          $this->nm_new_label['nota'] = 'NOTA'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_nota" style="<?php echo $sStyleHidden_nota; ?>" > <?php echo $this->nm_new_label['nota']; ?> </TD>
   <?php } ?>





   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_app_Desempenhos);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_app_Desempenhos = $this->form_vert_app_Desempenhos;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_app_Desempenhos))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_app_Desempenhos as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['cod_desemp'] = true;
           $this->nmgp_cmp_readonly['id_turma'] = true;
           $this->nmgp_cmp_readonly['id_grupo'] = true;
           $this->nmgp_cmp_readonly['id_etapa'] = true;
           $this->nmgp_cmp_readonly['id_votante'] = true;
           $this->nmgp_cmp_readonly['id_votado'] = true;
           $this->nmgp_cmp_readonly['id_competencia'] = true;
           $this->nmgp_cmp_readonly['peso'] = true;
           $this->nmgp_cmp_readonly['id_habilidade'] = true;
           $this->nmgp_cmp_readonly['resultado'] = true;
           $this->nmgp_cmp_readonly['nota'] = true;
       }
       elseif ($Line_Add)
       {
           $this->nmgp_cmp_readonly['cod_desemp'] = false;
           $this->nmgp_cmp_readonly['id_turma'] = false;
           $this->nmgp_cmp_readonly['id_grupo'] = false;
           $this->nmgp_cmp_readonly['id_etapa'] = false;
           $this->nmgp_cmp_readonly['id_votante'] = false;
           $this->nmgp_cmp_readonly['id_votado'] = false;
           $this->nmgp_cmp_readonly['id_competencia'] = false;
           $this->nmgp_cmp_readonly['peso'] = false;
           $this->nmgp_cmp_readonly['id_habilidade'] = false;
           $this->nmgp_cmp_readonly['resultado'] = false;
           $this->nmgp_cmp_readonly['nota'] = false;
       }
        $this->cod_desemp = $this->form_vert_app_Desempenhos[$sc_seq_vert]['cod_desemp']; 
       $cod_desemp = $this->cod_desemp; 
       $sStyleHidden_cod_desemp = '';
       if (isset($sCheckRead_cod_desemp))
       {
           unset($sCheckRead_cod_desemp);
       }
       if (isset($this->nmgp_cmp_readonly['cod_desemp']))
       {
           $sCheckRead_cod_desemp = $this->nmgp_cmp_readonly['cod_desemp'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_desemp']) && $this->nmgp_cmp_hidden['cod_desemp'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_desemp']);
           $sStyleHidden_cod_desemp = 'display: none;';
       }
       $bTestReadOnly_cod_desemp = true;
       $sStyleReadLab_cod_desemp = 'display: none;';
       $sStyleReadInp_cod_desemp = '';
       if (isset($this->nmgp_cmp_readonly['cod_desemp']) && $this->nmgp_cmp_readonly['cod_desemp'] == 'on')
       {
           $bTestReadOnly_cod_desemp = false;
           unset($this->nmgp_cmp_readonly['cod_desemp']);
           $sStyleReadLab_cod_desemp = '';
           $sStyleReadInp_cod_desemp = 'display: none;';
       }
       $this->id_turma = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_turma']; 
       $id_turma = $this->id_turma; 
       $sStyleHidden_id_turma = '';
       if (isset($sCheckRead_id_turma))
       {
           unset($sCheckRead_id_turma);
       }
       if (isset($this->nmgp_cmp_readonly['id_turma']))
       {
           $sCheckRead_id_turma = $this->nmgp_cmp_readonly['id_turma'];
       }
       if (isset($this->nmgp_cmp_hidden['id_turma']) && $this->nmgp_cmp_hidden['id_turma'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_turma']);
           $sStyleHidden_id_turma = 'display: none;';
       }
       $bTestReadOnly_id_turma = true;
       $sStyleReadLab_id_turma = 'display: none;';
       $sStyleReadInp_id_turma = '';
       if (isset($this->nmgp_cmp_readonly['id_turma']) && $this->nmgp_cmp_readonly['id_turma'] == 'on')
       {
           $bTestReadOnly_id_turma = false;
           unset($this->nmgp_cmp_readonly['id_turma']);
           $sStyleReadLab_id_turma = '';
           $sStyleReadInp_id_turma = 'display: none;';
       }
       $this->id_grupo = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_grupo']; 
       $id_grupo = $this->id_grupo; 
       $sStyleHidden_id_grupo = '';
       if (isset($sCheckRead_id_grupo))
       {
           unset($sCheckRead_id_grupo);
       }
       if (isset($this->nmgp_cmp_readonly['id_grupo']))
       {
           $sCheckRead_id_grupo = $this->nmgp_cmp_readonly['id_grupo'];
       }
       if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_grupo']);
           $sStyleHidden_id_grupo = 'display: none;';
       }
       $bTestReadOnly_id_grupo = true;
       $sStyleReadLab_id_grupo = 'display: none;';
       $sStyleReadInp_id_grupo = '';
       if (isset($this->nmgp_cmp_readonly['id_grupo']) && $this->nmgp_cmp_readonly['id_grupo'] == 'on')
       {
           $bTestReadOnly_id_grupo = false;
           unset($this->nmgp_cmp_readonly['id_grupo']);
           $sStyleReadLab_id_grupo = '';
           $sStyleReadInp_id_grupo = 'display: none;';
       }
       $this->id_etapa = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_etapa']; 
       $id_etapa = $this->id_etapa; 
       $sStyleHidden_id_etapa = '';
       if (isset($sCheckRead_id_etapa))
       {
           unset($sCheckRead_id_etapa);
       }
       if (isset($this->nmgp_cmp_readonly['id_etapa']))
       {
           $sCheckRead_id_etapa = $this->nmgp_cmp_readonly['id_etapa'];
       }
       if (isset($this->nmgp_cmp_hidden['id_etapa']) && $this->nmgp_cmp_hidden['id_etapa'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_etapa']);
           $sStyleHidden_id_etapa = 'display: none;';
       }
       $bTestReadOnly_id_etapa = true;
       $sStyleReadLab_id_etapa = 'display: none;';
       $sStyleReadInp_id_etapa = '';
       if (isset($this->nmgp_cmp_readonly['id_etapa']) && $this->nmgp_cmp_readonly['id_etapa'] == 'on')
       {
           $bTestReadOnly_id_etapa = false;
           unset($this->nmgp_cmp_readonly['id_etapa']);
           $sStyleReadLab_id_etapa = '';
           $sStyleReadInp_id_etapa = 'display: none;';
       }
       $this->id_votante = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_votante']; 
       $id_votante = $this->id_votante; 
       $sStyleHidden_id_votante = '';
       if (isset($sCheckRead_id_votante))
       {
           unset($sCheckRead_id_votante);
       }
       if (isset($this->nmgp_cmp_readonly['id_votante']))
       {
           $sCheckRead_id_votante = $this->nmgp_cmp_readonly['id_votante'];
       }
       if (isset($this->nmgp_cmp_hidden['id_votante']) && $this->nmgp_cmp_hidden['id_votante'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_votante']);
           $sStyleHidden_id_votante = 'display: none;';
       }
       $bTestReadOnly_id_votante = true;
       $sStyleReadLab_id_votante = 'display: none;';
       $sStyleReadInp_id_votante = '';
       if (isset($this->nmgp_cmp_readonly['id_votante']) && $this->nmgp_cmp_readonly['id_votante'] == 'on')
       {
           $bTestReadOnly_id_votante = false;
           unset($this->nmgp_cmp_readonly['id_votante']);
           $sStyleReadLab_id_votante = '';
           $sStyleReadInp_id_votante = 'display: none;';
       }
       $this->id_votado = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_votado']; 
       $id_votado = $this->id_votado; 
       $sStyleHidden_id_votado = '';
       if (isset($sCheckRead_id_votado))
       {
           unset($sCheckRead_id_votado);
       }
       if (isset($this->nmgp_cmp_readonly['id_votado']))
       {
           $sCheckRead_id_votado = $this->nmgp_cmp_readonly['id_votado'];
       }
       if (isset($this->nmgp_cmp_hidden['id_votado']) && $this->nmgp_cmp_hidden['id_votado'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_votado']);
           $sStyleHidden_id_votado = 'display: none;';
       }
       $bTestReadOnly_id_votado = true;
       $sStyleReadLab_id_votado = 'display: none;';
       $sStyleReadInp_id_votado = '';
       if (isset($this->nmgp_cmp_readonly['id_votado']) && $this->nmgp_cmp_readonly['id_votado'] == 'on')
       {
           $bTestReadOnly_id_votado = false;
           unset($this->nmgp_cmp_readonly['id_votado']);
           $sStyleReadLab_id_votado = '';
           $sStyleReadInp_id_votado = 'display: none;';
       }
       $this->id_competencia = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_competencia']; 
       $id_competencia = $this->id_competencia; 
       $sStyleHidden_id_competencia = '';
       if (isset($sCheckRead_id_competencia))
       {
           unset($sCheckRead_id_competencia);
       }
       if (isset($this->nmgp_cmp_readonly['id_competencia']))
       {
           $sCheckRead_id_competencia = $this->nmgp_cmp_readonly['id_competencia'];
       }
       if (isset($this->nmgp_cmp_hidden['id_competencia']) && $this->nmgp_cmp_hidden['id_competencia'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_competencia']);
           $sStyleHidden_id_competencia = 'display: none;';
       }
       $bTestReadOnly_id_competencia = true;
       $sStyleReadLab_id_competencia = 'display: none;';
       $sStyleReadInp_id_competencia = '';
       if (isset($this->nmgp_cmp_readonly['id_competencia']) && $this->nmgp_cmp_readonly['id_competencia'] == 'on')
       {
           $bTestReadOnly_id_competencia = false;
           unset($this->nmgp_cmp_readonly['id_competencia']);
           $sStyleReadLab_id_competencia = '';
           $sStyleReadInp_id_competencia = 'display: none;';
       }
       $this->peso = $this->form_vert_app_Desempenhos[$sc_seq_vert]['peso']; 
       $peso = $this->peso; 
       $sStyleHidden_peso = '';
       if (isset($sCheckRead_peso))
       {
           unset($sCheckRead_peso);
       }
       if (isset($this->nmgp_cmp_readonly['peso']))
       {
           $sCheckRead_peso = $this->nmgp_cmp_readonly['peso'];
       }
       if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['peso']);
           $sStyleHidden_peso = 'display: none;';
       }
       $bTestReadOnly_peso = true;
       $sStyleReadLab_peso = 'display: none;';
       $sStyleReadInp_peso = '';
       if (isset($this->nmgp_cmp_readonly['peso']) && $this->nmgp_cmp_readonly['peso'] == 'on')
       {
           $bTestReadOnly_peso = false;
           unset($this->nmgp_cmp_readonly['peso']);
           $sStyleReadLab_peso = '';
           $sStyleReadInp_peso = 'display: none;';
       }
       $this->id_habilidade = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_habilidade']; 
       $id_habilidade = $this->id_habilidade; 
       $sStyleHidden_id_habilidade = '';
       if (isset($sCheckRead_id_habilidade))
       {
           unset($sCheckRead_id_habilidade);
       }
       if (isset($this->nmgp_cmp_readonly['id_habilidade']))
       {
           $sCheckRead_id_habilidade = $this->nmgp_cmp_readonly['id_habilidade'];
       }
       if (isset($this->nmgp_cmp_hidden['id_habilidade']) && $this->nmgp_cmp_hidden['id_habilidade'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_habilidade']);
           $sStyleHidden_id_habilidade = 'display: none;';
       }
       $bTestReadOnly_id_habilidade = true;
       $sStyleReadLab_id_habilidade = 'display: none;';
       $sStyleReadInp_id_habilidade = '';
       if (isset($this->nmgp_cmp_readonly['id_habilidade']) && $this->nmgp_cmp_readonly['id_habilidade'] == 'on')
       {
           $bTestReadOnly_id_habilidade = false;
           unset($this->nmgp_cmp_readonly['id_habilidade']);
           $sStyleReadLab_id_habilidade = '';
           $sStyleReadInp_id_habilidade = 'display: none;';
       }
       $this->resultado = $this->form_vert_app_Desempenhos[$sc_seq_vert]['resultado']; 
       $resultado = $this->resultado; 
       $sStyleHidden_resultado = '';
       if (isset($sCheckRead_resultado))
       {
           unset($sCheckRead_resultado);
       }
       if (isset($this->nmgp_cmp_readonly['resultado']))
       {
           $sCheckRead_resultado = $this->nmgp_cmp_readonly['resultado'];
       }
       if (isset($this->nmgp_cmp_hidden['resultado']) && $this->nmgp_cmp_hidden['resultado'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['resultado']);
           $sStyleHidden_resultado = 'display: none;';
       }
       $bTestReadOnly_resultado = true;
       $sStyleReadLab_resultado = 'display: none;';
       $sStyleReadInp_resultado = '';
       if (isset($this->nmgp_cmp_readonly['resultado']) && $this->nmgp_cmp_readonly['resultado'] == 'on')
       {
           $bTestReadOnly_resultado = false;
           unset($this->nmgp_cmp_readonly['resultado']);
           $sStyleReadLab_resultado = '';
           $sStyleReadInp_resultado = 'display: none;';
       }
       $this->nota = $this->form_vert_app_Desempenhos[$sc_seq_vert]['nota']; 
       $nota = $this->nota; 
       $sStyleHidden_nota = '';
       if (isset($sCheckRead_nota))
       {
           unset($sCheckRead_nota);
       }
       if (isset($this->nmgp_cmp_readonly['nota']))
       {
           $sCheckRead_nota = $this->nmgp_cmp_readonly['nota'];
       }
       if (isset($this->nmgp_cmp_hidden['nota']) && $this->nmgp_cmp_hidden['nota'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nota']);
           $sStyleHidden_nota = 'display: none;';
       }
       $bTestReadOnly_nota = true;
       $sStyleReadLab_nota = 'display: none;';
       $sStyleReadInp_nota = '';
       if (isset($this->nmgp_cmp_readonly['nota']) && $this->nmgp_cmp_readonly['nota'] == 'on')
       {
           $bTestReadOnly_nota = false;
           unset($this->nmgp_cmp_readonly['nota']);
           $sStyleReadLab_nota = '';
           $sStyleReadInp_nota = 'display: none;';
       }
       $this->id_desemp = $this->form_vert_app_Desempenhos[$sc_seq_vert]['id_desemp']; 
       $id_desemp = $this->id_desemp; 
       $sStyleHidden_id_desemp = '';
       if (isset($sCheckRead_id_desemp))
       {
           unset($sCheckRead_id_desemp);
       }
       if (isset($this->nmgp_cmp_readonly['id_desemp']))
       {
           $sCheckRead_id_desemp = $this->nmgp_cmp_readonly['id_desemp'];
       }
       if (isset($this->nmgp_cmp_hidden['id_desemp']) && $this->nmgp_cmp_hidden['id_desemp'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_desemp']);
           $sStyleHidden_id_desemp = 'display: none;';
       }
       $bTestReadOnly_id_desemp = true;
       $sStyleReadLab_id_desemp = 'display: none;';
       $sStyleReadInp_id_desemp = '';
       if (isset($this->nmgp_cmp_readonly['id_desemp']) && $this->nmgp_cmp_readonly['id_desemp'] == 'on')
       {
           $bTestReadOnly_id_desemp = false;
           unset($this->nmgp_cmp_readonly['id_desemp']);
           $sStyleReadLab_id_desemp = '';
           $sStyleReadInp_id_desemp = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>
<input type=hidden name="id_desemp<?php echo $sc_seq_vert ?>" value="<?php  echo str_replace('"', "&quot;", $this->id_desemp) ?>">


   
    <TD class="scFormDataOdd"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOdd" > 
<input type=checkbox name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOdd" > 
<input type=checkbox name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl)) { echo " checked";} ?>> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOdd"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<input type="image" id="sc_exc_line_<?php echo $sc_seq_vert ?>" onclick="nm_atualiza_line('excluir', <?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_excluir.gif" title="Excluir o registro" style="display:''">
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<input type="image" id="sc_open_line_<?php echo $sc_seq_vert ?>" onclick="mdOpenLine(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_edit.gif" title="Alterar o registro">
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<input type="image" id="sc_upd_line_<?php echo $sc_seq_vert ?>" onclick="findPos(this); nm_atualiza_line('alterar', <?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_alterar.gif" title="Alterar o registro" style="<?php echo $sButDisp; ?>">
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<input type="image" id="sc_ins_line_<?php echo $sc_seq_vert ?>" onclick="findPos(this); nm_atualiza_line('incluir', <?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_incluir.gif" title="Incluir o registro" style="display:''">
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<input type="image" id="sc_exc_line_<?php echo $sc_seq_vert ?>" onclick="nm_atualiza_line('excluir', <?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_excluir.gif" title="Excluir o registro" style="display:none">
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<input type="image" id="sc_open_line_<?php echo $sc_seq_vert ?>" onclick="mdOpenLine(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_edit.gif" style="display: none">
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<input type="image" id="sc_upd_line_<?php echo $sc_seq_vert ?>" onclick="findPos(this); nm_atualiza_line('alterar', <?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_alterar.gif" title="Alterar o registro" style="display:none">
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<input type="image" id="sc_new_line_<?php echo $sc_seq_vert ?>" onclick="do_ajax_app_Desempenhos_add_new_line(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_novo.gif" title="Abrir um novo registro" style="display:none">
<?php }?>
<input type="image" id="sc_canceli_line_<?php echo $sc_seq_vert ?>" onclick="do_ajax_app_Desempenhos_cancel_insert(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_cancelar.gif" title="Cancelar" <?php if (!$Line_Add) { echo "style=\"display:none\""; } ?>>
<input type="image" id="sc_cancelu_line_<?php echo $sc_seq_vert ?>" onclick="do_ajax_app_Desempenhos_cancel_update(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_cancelar.gif" title="Cancelar" style="display:none">
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['cod_desemp']) && $this->nmgp_cmp_hidden['cod_desemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cod_desemp<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $cod_desemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_cod_desemp<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_desemp; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_cod_desemp && isset($this->nmgp_cmp_readonly["cod_desemp"]) &&  $this->nmgp_cmp_readonly["cod_desemp"] == "on") { 

 ?>
<input type=hidden name="cod_desemp<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $cod_desemp) . "\">" . $cod_desemp . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_desemp<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_cod_desemp; ?>"><?php echo $this->cod_desemp; ?></span><span id="id_read_off_cod_desemp<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_cod_desemp; ?>">
 <input class="scFormObjectOdd" type=text name="cod_desemp<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $cod_desemp) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_cod_desemp(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Código")?>', 0, 'naomask', 'lista', 'cxab', 30, 'TUDO')" size=21 maxlength=30></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cod_desemp<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cod_desemp<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_turma']) && $this->nmgp_cmp_hidden['id_turma'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_turma<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $this->id_turma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_turma<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_turma; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_turma && isset($this->nmgp_cmp_readonly["id_turma"]) &&  $this->nmgp_cmp_readonly["id_turma"] == "on") { 
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_TURMA, COD_TURMA 
FROM TURMAS 
ORDER BY ID_TURMA";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $id_turma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_turma1))
          {
              foreach ($this->id_turma1 as $tmp_id_turma)
              {
                  if (trim($tmp_id_turma) == trim($cadaselect[1])) { $id_turma_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_turma) == trim($cadaselect[1])) { $id_turma_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_turma<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_turma) . "\">" . $id_turma_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_TURMA, COD_TURMA 
FROM TURMAS 
ORDER BY ID_TURMA";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $id_turma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_turma1))
          {
              foreach ($this->id_turma1 as $tmp_id_turma)
              {
                  if (trim($tmp_id_turma) == trim($cadaselect[1])) { $id_turma_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_turma) == trim($cadaselect[1])) { $id_turma_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_turma" . $sc_seq_vert . "\" style=\"" .  $sStyleReadLab_id_turma . "\">" . $id_turma_look . "</span><span id=\"id_read_off_id_turma" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_turma . "\">";
   echo " <span id=\"idAjaxSelect_id_turma" .  $sc_seq_vert . "\"><select class=\"scFormObjectOdd\" name=\"id_turma" . $sc_seq_vert . "\"  onBlur=\"scCssBlur(this, " . $sc_seq_vert . ");\"  onFocus=\"scCssFocus(this, " . $sc_seq_vert . ");\"  onChange=\"nm_check_insert(" . $sc_seq_vert . ");\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_turma) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_turma)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_turma<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_turma<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_grupo<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_grupo<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_grupo; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_grupo && isset($this->nmgp_cmp_readonly["id_grupo"]) &&  $this->nmgp_cmp_readonly["id_grupo"] == "on") { 

 ?>
<input type=hidden name="id_grupo<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_grupo) . "\">" . $id_grupo . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_grupo'] = $this->id_grupo;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO FROM GRUPOS WHERE ID_GRUPO = " . $aRecData['id_grupo'] . " ORDER BY ID_GRUPO";
   if ('' != $aRecData['id_grupo'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$id_grupo_look = (isset($aLookup[0][$this->id_grupo])) ? $aLookup[0][$this->id_grupo] : $this->id_grupo;
?>
<span id="id_read_on_id_grupo<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_id_grupo; ?>"><?php echo $id_grupo_look; ?></span><span id="id_read_off_id_grupo<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_grupo; ?>">
 <input class="scFormObjectOdd" type=text name="id_grupo<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_grupo) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_id_grupo(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Grupo")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_grupo'] = $this->id_grupo;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO FROM GRUPOS WHERE ID_GRUPO = " . $aRecData['id_grupo'] . " ORDER BY ID_GRUPO";
   if ('' != $aRecData['id_grupo'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_grupo])) ? $aLookup[0][$this->id_grupo] : '';
?>
<input type="text" id="id_ac_id_grupo<?php echo $sc_seq_vert; ?>" name="id_grupo<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_grupo<?php echo $sc_seq_vert; ?>"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_grupo<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_grupo<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_etapa']) && $this->nmgp_cmp_hidden['id_etapa'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_etapa<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_etapa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_etapa<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_etapa; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_etapa && isset($this->nmgp_cmp_readonly["id_etapa"]) &&  $this->nmgp_cmp_readonly["id_etapa"] == "on") { 

 ?>
<input type=hidden name="id_etapa<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_etapa) . "\">" . $id_etapa . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_etapa'] = $this->id_etapa;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA FROM ETAPAS WHERE ID_ETAPA = " . $aRecData['id_etapa'] . " ORDER BY ID_ETAPA";
   if ('' != $aRecData['id_etapa'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$id_etapa_look = (isset($aLookup[0][$this->id_etapa])) ? $aLookup[0][$this->id_etapa] : $this->id_etapa;
?>
<span id="id_read_on_id_etapa<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_id_etapa; ?>"><?php echo $id_etapa_look; ?></span><span id="id_read_off_id_etapa<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_etapa; ?>">
 <input class="scFormObjectOdd" type=text name="id_etapa<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_etapa) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_id_etapa(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Pista")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_etapa'] = $this->id_etapa;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA FROM ETAPAS WHERE ID_ETAPA = " . $aRecData['id_etapa'] . " ORDER BY ID_ETAPA";
   if ('' != $aRecData['id_etapa'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_etapa])) ? $aLookup[0][$this->id_etapa] : '';
?>
<input type="text" id="id_ac_id_etapa<?php echo $sc_seq_vert; ?>" name="id_etapa<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_etapa<?php echo $sc_seq_vert; ?>"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_etapa<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_etapa<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_votante']) && $this->nmgp_cmp_hidden['id_votante'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_votante<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_votante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_votante<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_votante; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_votante && isset($this->nmgp_cmp_readonly["id_votante"]) &&  $this->nmgp_cmp_readonly["id_votante"] == "on") { 

 ?>
<input type=hidden name="id_votante<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_votante) . "\">" . $id_votante . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_votante'] = $this->id_votante;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $aRecData['id_votante'] . " ORDER BY ID_PARTICIPE";
   if ('' != $aRecData['id_votante'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$id_votante_look = (isset($aLookup[0][$this->id_votante])) ? $aLookup[0][$this->id_votante] : $this->id_votante;
?>
<span id="id_read_on_id_votante<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_id_votante; ?>"><?php echo $id_votante_look; ?></span><span id="id_read_off_id_votante<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_votante; ?>">
 <input class="scFormObjectOdd" type=text name="id_votante<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_votante) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_id_votante(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Votante")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_votante'] = $this->id_votante;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $aRecData['id_votante'] . " ORDER BY ID_PARTICIPE";
   if ('' != $aRecData['id_votante'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_votante])) ? $aLookup[0][$this->id_votante] : '';
?>
<input type="text" id="id_ac_id_votante<?php echo $sc_seq_vert; ?>" name="id_votante<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_votante<?php echo $sc_seq_vert; ?>"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_votante<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_votante<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_votado']) && $this->nmgp_cmp_hidden['id_votado'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_votado<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_votado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_votado<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_votado; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_votado && isset($this->nmgp_cmp_readonly["id_votado"]) &&  $this->nmgp_cmp_readonly["id_votado"] == "on") { 

 ?>
<input type=hidden name="id_votado<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_votado) . "\">" . $id_votado . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_votado'] = $this->id_votado;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $aRecData['id_votado'] . " ORDER BY ID_PARTICIPE";
   if ('' != $aRecData['id_votado'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$id_votado_look = (isset($aLookup[0][$this->id_votado])) ? $aLookup[0][$this->id_votado] : $this->id_votado;
?>
<span id="id_read_on_id_votado<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_id_votado; ?>"><?php echo $id_votado_look; ?></span><span id="id_read_off_id_votado<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_votado; ?>">
 <input class="scFormObjectOdd" type=text name="id_votado<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_votado) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_id_votado(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Votado")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_votado'] = $this->id_votado;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $aRecData['id_votado'] . " ORDER BY ID_PARTICIPE";
   if ('' != $aRecData['id_votado'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_votado])) ? $aLookup[0][$this->id_votado] : '';
?>
<input type="text" id="id_ac_id_votado<?php echo $sc_seq_vert; ?>" name="id_votado<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_votado<?php echo $sc_seq_vert; ?>"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_votado<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_votado<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_competencia']) && $this->nmgp_cmp_hidden['id_competencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_competencia<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_competencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_competencia<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_competencia; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_competencia && isset($this->nmgp_cmp_readonly["id_competencia"]) &&  $this->nmgp_cmp_readonly["id_competencia"] == "on") { 

 ?>
<input type=hidden name="id_competencia<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_competencia) . "\">" . $id_competencia . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_competencia'] = $this->id_competencia;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_COMPETENCIA, COD_COMPETENCIA FROM COMPETENCIAS WHERE ID_COMPETENCIA = " . $aRecData['id_competencia'] . " ORDER BY ID_COMPETENCIA";
   if ('' != $aRecData['id_competencia'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$id_competencia_look = (isset($aLookup[0][$this->id_competencia])) ? $aLookup[0][$this->id_competencia] : $this->id_competencia;
?>
<span id="id_read_on_id_competencia<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_id_competencia; ?>"><?php echo $id_competencia_look; ?></span><span id="id_read_off_id_competencia<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_competencia; ?>">
 <input class="scFormObjectOdd" type=text name="id_competencia<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_competencia) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_id_competencia(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Competência")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_competencia'] = $this->id_competencia;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_COMPETENCIA, COD_COMPETENCIA FROM COMPETENCIAS WHERE ID_COMPETENCIA = " . $aRecData['id_competencia'] . " ORDER BY ID_COMPETENCIA";
   if ('' != $aRecData['id_competencia'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_competencia])) ? $aLookup[0][$this->id_competencia] : '';
?>
<input type="text" id="id_ac_id_competencia<?php echo $sc_seq_vert; ?>" name="id_competencia<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_competencia<?php echo $sc_seq_vert; ?>"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_competencia<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_competencia<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="peso<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $peso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_peso<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_peso; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_peso && isset($this->nmgp_cmp_readonly["peso"]) &&  $this->nmgp_cmp_readonly["peso"] == "on") { 

 ?>
<input type=hidden name="peso<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $peso) . "\">" . $peso . ""; ?>
<?php } else { ?>
<span id="id_read_on_peso<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_peso; ?>"><?php echo $this->peso; ?></span><span id="id_read_off_peso<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_peso; ?>">
 <input class="scFormObjectOdd" type=text name="peso<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $peso) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_peso(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("PESO")?>', 0, 'naomask', 'lista', 'cxab', 3, 'TUDO')" size=4 maxlength=3></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_peso<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_peso<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_habilidade']) && $this->nmgp_cmp_hidden['id_habilidade'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_habilidade<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_habilidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_habilidade<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_habilidade; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_habilidade && isset($this->nmgp_cmp_readonly["id_habilidade"]) &&  $this->nmgp_cmp_readonly["id_habilidade"] == "on") { 

 ?>
<input type=hidden name="id_habilidade<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_habilidade) . "\">" . $id_habilidade . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_habilidade'] = $this->id_habilidade;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_HABILIDADE, COD_HABILIDADE FROM HABILIDADES WHERE ID_HABILIDADE = " . $aRecData['id_habilidade'] . " ORDER BY ID_HABILIDADE";
   if ('' != $aRecData['id_habilidade'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$id_habilidade_look = (isset($aLookup[0][$this->id_habilidade])) ? $aLookup[0][$this->id_habilidade] : $this->id_habilidade;
?>
<span id="id_read_on_id_habilidade<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_id_habilidade; ?>"><?php echo $id_habilidade_look; ?></span><span id="id_read_off_id_habilidade<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_habilidade; ?>">
 <input class="scFormObjectOdd" type=text name="id_habilidade<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_habilidade) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_id_habilidade(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Habilidade")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_habilidade'] = $this->id_habilidade;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_HABILIDADE, COD_HABILIDADE FROM HABILIDADES WHERE ID_HABILIDADE = " . $aRecData['id_habilidade'] . " ORDER BY ID_HABILIDADE";
   if ('' != $aRecData['id_habilidade'])
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   if ($nm_comando != "" && $rs = &$this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(htmlentities($rs->fields[0]) => htmlentities($rs->fields[1]));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
$sAutocompValue = (isset($aLookup[0][$this->id_habilidade])) ? $aLookup[0][$this->id_habilidade] : '';
?>
<input type="text" id="id_ac_id_habilidade<?php echo $sc_seq_vert; ?>" name="id_habilidade<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_habilidade<?php echo $sc_seq_vert; ?>"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_habilidade<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_habilidade<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['resultado']) && $this->nmgp_cmp_hidden['resultado'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="resultado<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $resultado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_resultado<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_resultado; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_resultado && isset($this->nmgp_cmp_readonly["resultado"]) &&  $this->nmgp_cmp_readonly["resultado"] == "on") { 

 ?>
<input type=hidden name="resultado<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $resultado) . "\">" . $resultado . ""; ?>
<?php } else { ?>
<span id="id_read_on_resultado<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_resultado; ?>"><?php echo $this->resultado; ?></span><span id="id_read_off_resultado<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_resultado; ?>">
 <input class="scFormObjectOdd" type=text name="resultado<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $resultado) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_resultado(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("RESULTADO")?>', 0, 'naomask', 'lista', 'cxab', 2, 'TUDO')" size=2 maxlength=2></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_resultado<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_resultado<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nota']) && $this->nmgp_cmp_hidden['nota'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="nota<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $nota) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_nota<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nota; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_nota && isset($this->nmgp_cmp_readonly["nota"]) &&  $this->nmgp_cmp_readonly["nota"] == "on") { 

 ?>
<input type=hidden name="nota<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $nota) . "\">" . $nota . ""; ?>
<?php } else { ?>
<span id="id_read_on_nota<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_nota; ?>"><?php echo $this->nota; ?></span><span id="id_read_off_nota<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_nota; ?>">
 <input class="scFormObjectOdd" type=text name="nota<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $nota) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Desempenhos_validate_nota(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("NOTA")?>', 0, 'naomask', 'numeroedt' , 2, -0, 99)" size=2>&nbsp;<a href="javascript:TCR.TCRPopup(document.forms['F1'].elements['nota<?php echo $sc_seq_vert; ?>'], 'app_Desempenhos_calc.php', '.')"><img src="<?php echo $this->Ini->path_img_global; ?>/calc.gif" align="absmiddle" border="0" /></a></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_nota<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_nota<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_cod_desemp))
       {
           $this->nmgp_cmp_readonly['cod_desemp'] = $sCheckRead_cod_desemp;
       }
       if ('display: none;' == $sStyleHidden_cod_desemp)
       {
           $this->nmgp_cmp_hidden['cod_desemp'] = 'off';
       }
       if (isset($sCheckRead_id_turma))
       {
           $this->nmgp_cmp_readonly['id_turma'] = $sCheckRead_id_turma;
       }
       if ('display: none;' == $sStyleHidden_id_turma)
       {
           $this->nmgp_cmp_hidden['id_turma'] = 'off';
       }
       if (isset($sCheckRead_id_grupo))
       {
           $this->nmgp_cmp_readonly['id_grupo'] = $sCheckRead_id_grupo;
       }
       if ('display: none;' == $sStyleHidden_id_grupo)
       {
           $this->nmgp_cmp_hidden['id_grupo'] = 'off';
       }
       if (isset($sCheckRead_id_etapa))
       {
           $this->nmgp_cmp_readonly['id_etapa'] = $sCheckRead_id_etapa;
       }
       if ('display: none;' == $sStyleHidden_id_etapa)
       {
           $this->nmgp_cmp_hidden['id_etapa'] = 'off';
       }
       if (isset($sCheckRead_id_votante))
       {
           $this->nmgp_cmp_readonly['id_votante'] = $sCheckRead_id_votante;
       }
       if ('display: none;' == $sStyleHidden_id_votante)
       {
           $this->nmgp_cmp_hidden['id_votante'] = 'off';
       }
       if (isset($sCheckRead_id_votado))
       {
           $this->nmgp_cmp_readonly['id_votado'] = $sCheckRead_id_votado;
       }
       if ('display: none;' == $sStyleHidden_id_votado)
       {
           $this->nmgp_cmp_hidden['id_votado'] = 'off';
       }
       if (isset($sCheckRead_id_competencia))
       {
           $this->nmgp_cmp_readonly['id_competencia'] = $sCheckRead_id_competencia;
       }
       if ('display: none;' == $sStyleHidden_id_competencia)
       {
           $this->nmgp_cmp_hidden['id_competencia'] = 'off';
       }
       if (isset($sCheckRead_peso))
       {
           $this->nmgp_cmp_readonly['peso'] = $sCheckRead_peso;
       }
       if ('display: none;' == $sStyleHidden_peso)
       {
           $this->nmgp_cmp_hidden['peso'] = 'off';
       }
       if (isset($sCheckRead_id_habilidade))
       {
           $this->nmgp_cmp_readonly['id_habilidade'] = $sCheckRead_id_habilidade;
       }
       if ('display: none;' == $sStyleHidden_id_habilidade)
       {
           $this->nmgp_cmp_hidden['id_habilidade'] = 'off';
       }
       if (isset($sCheckRead_resultado))
       {
           $this->nmgp_cmp_readonly['resultado'] = $sCheckRead_resultado;
       }
       if ('display: none;' == $sStyleHidden_resultado)
       {
           $this->nmgp_cmp_hidden['resultado'] = 'off';
       }
       if (isset($sCheckRead_nota))
       {
           $this->nmgp_cmp_readonly['nota'] = $sCheckRead_nota;
       }
       if ('display: none;' == $sStyleHidden_nota)
       {
           $this->nmgp_cmp_hidden['nota'] = 'off';
       }
       if (isset($sCheckRead_id_desemp))
       {
           $this->nmgp_cmp_readonly['id_desemp'] = $sCheckRead_id_desemp;
       }
       if ('display: none;' == $sStyleHidden_id_desemp)
       {
           $this->nmgp_cmp_hidden['id_desemp'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_app_Desempenhos = $guarda_form_vert_app_Desempenhos;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type=hidden name="sc_contr_vert" value="<?php echo $iContrVert; ?>">
</td></tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormTable">
<tr><td class="scFormLabelOdd"><a href="javascript: scAjaxHideDebug()"><img src="<?php echo $this->Ini->path_botoes; ?>/nm_scriptcase3_green_bcancelar.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormDataOdd" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<?php
 if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on")
 {
?>
  <script> 
   var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
  </script> 
  <input type="image" onclick="do_ajax_app_Desempenhos_add_new_line(); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_novo.gif" title="Abrir um novo registro">
<?php
  }
?>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.all.hidden_bloco_" . $bloco . ".style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.all.id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . ".style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  // ---------- Autocomplete id_grupo
  function do_ajax_app_Desempenhos_autocomp_id_grupo<?php echo $iSeq; ?>(var_id_grupo<?php echo $iSeq; ?>)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenhos_autocomp_id_grupo<?php echo $iSeq; ?>(var_id_grupo<?php echo $iSeq; ?>, var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_grupo<?php echo $iSeq; ?>_cb);
  } // do_ajax_app_Desempenhos_autocomp_id_grupo

  function do_ajax_app_Desempenhos_autocomp_id_grupo<?php echo $iSeq; ?>_cb(sResp)
  {
    oAc_id_grupo<?php echo $iSeq; ?>.onComplete(sResp);
  } // do_ajax_app_Desempenhos_autocomp_id_grupo<?php echo $iSeq; ?>_cb

  function do_ajax_app_Desempenhos_getcod_id_grupo<?php echo $iSeq; ?>(sValue)
  {
    bOnChange = document.F1.id_grupo<?php echo $iSeq; ?>.value != sValue;
    document.F1.id_grupo<?php echo $iSeq; ?>.value = sValue;
    if (bOnChange)
    {
      nm_check_insert(<?php echo $iSeq; ?>);
      do_ajax_app_Desempenhos_validate_id_grupo(<?php echo $iSeq; ?>);
    }
  } // do_ajax_app_Desempenhos_getcod_id_grupo<?php echo $iSeq; ?>

<?php
}
?>
</script>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  // ---------- Autocomplete id_votante
  function do_ajax_app_Desempenhos_autocomp_id_votante<?php echo $iSeq; ?>(var_id_votante<?php echo $iSeq; ?>)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenhos_autocomp_id_votante<?php echo $iSeq; ?>(var_id_votante<?php echo $iSeq; ?>, var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_votante<?php echo $iSeq; ?>_cb);
  } // do_ajax_app_Desempenhos_autocomp_id_votante

  function do_ajax_app_Desempenhos_autocomp_id_votante<?php echo $iSeq; ?>_cb(sResp)
  {
    oAc_id_votante<?php echo $iSeq; ?>.onComplete(sResp);
  } // do_ajax_app_Desempenhos_autocomp_id_votante<?php echo $iSeq; ?>_cb

  function do_ajax_app_Desempenhos_getcod_id_votante<?php echo $iSeq; ?>(sValue)
  {
    bOnChange = document.F1.id_votante<?php echo $iSeq; ?>.value != sValue;
    document.F1.id_votante<?php echo $iSeq; ?>.value = sValue;
    if (bOnChange)
    {
      nm_check_insert(<?php echo $iSeq; ?>);
      do_ajax_app_Desempenhos_validate_id_votante(<?php echo $iSeq; ?>);
    }
  } // do_ajax_app_Desempenhos_getcod_id_votante<?php echo $iSeq; ?>

<?php
}
?>
</script>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  // ---------- Autocomplete id_votado
  function do_ajax_app_Desempenhos_autocomp_id_votado<?php echo $iSeq; ?>(var_id_votado<?php echo $iSeq; ?>)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenhos_autocomp_id_votado<?php echo $iSeq; ?>(var_id_votado<?php echo $iSeq; ?>, var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_votado<?php echo $iSeq; ?>_cb);
  } // do_ajax_app_Desempenhos_autocomp_id_votado

  function do_ajax_app_Desempenhos_autocomp_id_votado<?php echo $iSeq; ?>_cb(sResp)
  {
    oAc_id_votado<?php echo $iSeq; ?>.onComplete(sResp);
  } // do_ajax_app_Desempenhos_autocomp_id_votado<?php echo $iSeq; ?>_cb

  function do_ajax_app_Desempenhos_getcod_id_votado<?php echo $iSeq; ?>(sValue)
  {
    bOnChange = document.F1.id_votado<?php echo $iSeq; ?>.value != sValue;
    document.F1.id_votado<?php echo $iSeq; ?>.value = sValue;
    if (bOnChange)
    {
      nm_check_insert(<?php echo $iSeq; ?>);
      do_ajax_app_Desempenhos_validate_id_votado(<?php echo $iSeq; ?>);
    }
  } // do_ajax_app_Desempenhos_getcod_id_votado<?php echo $iSeq; ?>

<?php
}
?>
</script>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  // ---------- Autocomplete id_etapa
  function do_ajax_app_Desempenhos_autocomp_id_etapa<?php echo $iSeq; ?>(var_id_etapa<?php echo $iSeq; ?>)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenhos_autocomp_id_etapa<?php echo $iSeq; ?>(var_id_etapa<?php echo $iSeq; ?>, var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_etapa<?php echo $iSeq; ?>_cb);
  } // do_ajax_app_Desempenhos_autocomp_id_etapa

  function do_ajax_app_Desempenhos_autocomp_id_etapa<?php echo $iSeq; ?>_cb(sResp)
  {
    oAc_id_etapa<?php echo $iSeq; ?>.onComplete(sResp);
  } // do_ajax_app_Desempenhos_autocomp_id_etapa<?php echo $iSeq; ?>_cb

  function do_ajax_app_Desempenhos_getcod_id_etapa<?php echo $iSeq; ?>(sValue)
  {
    bOnChange = document.F1.id_etapa<?php echo $iSeq; ?>.value != sValue;
    document.F1.id_etapa<?php echo $iSeq; ?>.value = sValue;
    if (bOnChange)
    {
      nm_check_insert(<?php echo $iSeq; ?>);
      do_ajax_app_Desempenhos_validate_id_etapa(<?php echo $iSeq; ?>);
    }
  } // do_ajax_app_Desempenhos_getcod_id_etapa<?php echo $iSeq; ?>

<?php
}
?>
</script>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  // ---------- Autocomplete id_competencia
  function do_ajax_app_Desempenhos_autocomp_id_competencia<?php echo $iSeq; ?>(var_id_competencia<?php echo $iSeq; ?>)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenhos_autocomp_id_competencia<?php echo $iSeq; ?>(var_id_competencia<?php echo $iSeq; ?>, var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_competencia<?php echo $iSeq; ?>_cb);
  } // do_ajax_app_Desempenhos_autocomp_id_competencia

  function do_ajax_app_Desempenhos_autocomp_id_competencia<?php echo $iSeq; ?>_cb(sResp)
  {
    oAc_id_competencia<?php echo $iSeq; ?>.onComplete(sResp);
  } // do_ajax_app_Desempenhos_autocomp_id_competencia<?php echo $iSeq; ?>_cb

  function do_ajax_app_Desempenhos_getcod_id_competencia<?php echo $iSeq; ?>(sValue)
  {
    bOnChange = document.F1.id_competencia<?php echo $iSeq; ?>.value != sValue;
    document.F1.id_competencia<?php echo $iSeq; ?>.value = sValue;
    if (bOnChange)
    {
      nm_check_insert(<?php echo $iSeq; ?>);
      do_ajax_app_Desempenhos_validate_id_competencia(<?php echo $iSeq; ?>);
    }
  } // do_ajax_app_Desempenhos_getcod_id_competencia<?php echo $iSeq; ?>

<?php
}
?>
</script>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  // ---------- Autocomplete id_habilidade
  function do_ajax_app_Desempenhos_autocomp_id_habilidade<?php echo $iSeq; ?>(var_id_habilidade<?php echo $iSeq; ?>)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenhos_autocomp_id_habilidade<?php echo $iSeq; ?>(var_id_habilidade<?php echo $iSeq; ?>, var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_habilidade<?php echo $iSeq; ?>_cb);
  } // do_ajax_app_Desempenhos_autocomp_id_habilidade

  function do_ajax_app_Desempenhos_autocomp_id_habilidade<?php echo $iSeq; ?>_cb(sResp)
  {
    oAc_id_habilidade<?php echo $iSeq; ?>.onComplete(sResp);
  } // do_ajax_app_Desempenhos_autocomp_id_habilidade<?php echo $iSeq; ?>_cb

  function do_ajax_app_Desempenhos_getcod_id_habilidade<?php echo $iSeq; ?>(sValue)
  {
    bOnChange = document.F1.id_habilidade<?php echo $iSeq; ?>.value != sValue;
    document.F1.id_habilidade<?php echo $iSeq; ?>.value = sValue;
    if (bOnChange)
    {
      nm_check_insert(<?php echo $iSeq; ?>);
      do_ajax_app_Desempenhos_validate_id_habilidade(<?php echo $iSeq; ?>);
    }
  } // do_ajax_app_Desempenhos_getcod_id_habilidade<?php echo $iSeq; ?>

<?php
}
?>
</script>
<script type="text/javascript">
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  oAc_id_grupo<?php echo $iSeq; ?> = new Ajax.Autocompleter("id_ac_id_grupo<?php echo $iSeq; ?>", "div_ac_id_grupo<?php echo $iSeq; ?>", do_ajax_app_Desempenhos_autocomp_id_grupo<?php echo $iSeq; ?>, do_ajax_app_Desempenhos_getcod_id_grupo<?php echo $iSeq; ?>);
<?php
}
?>
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  oAc_id_votante<?php echo $iSeq; ?> = new Ajax.Autocompleter("id_ac_id_votante<?php echo $iSeq; ?>", "div_ac_id_votante<?php echo $iSeq; ?>", do_ajax_app_Desempenhos_autocomp_id_votante<?php echo $iSeq; ?>, do_ajax_app_Desempenhos_getcod_id_votante<?php echo $iSeq; ?>);
<?php
}
?>
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  oAc_id_votado<?php echo $iSeq; ?> = new Ajax.Autocompleter("id_ac_id_votado<?php echo $iSeq; ?>", "div_ac_id_votado<?php echo $iSeq; ?>", do_ajax_app_Desempenhos_autocomp_id_votado<?php echo $iSeq; ?>, do_ajax_app_Desempenhos_getcod_id_votado<?php echo $iSeq; ?>);
<?php
}
?>
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  oAc_id_etapa<?php echo $iSeq; ?> = new Ajax.Autocompleter("id_ac_id_etapa<?php echo $iSeq; ?>", "div_ac_id_etapa<?php echo $iSeq; ?>", do_ajax_app_Desempenhos_autocomp_id_etapa<?php echo $iSeq; ?>, do_ajax_app_Desempenhos_getcod_id_etapa<?php echo $iSeq; ?>);
<?php
}
?>
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  oAc_id_competencia<?php echo $iSeq; ?> = new Ajax.Autocompleter("id_ac_id_competencia<?php echo $iSeq; ?>", "div_ac_id_competencia<?php echo $iSeq; ?>", do_ajax_app_Desempenhos_autocomp_id_competencia<?php echo $iSeq; ?>, do_ajax_app_Desempenhos_getcod_id_competencia<?php echo $iSeq; ?>);
<?php
}
?>
<?php
for ($iSeq = 1; $iSeq <= $sc_seq_vert; $iSeq++)
{
?>
  oAc_id_habilidade<?php echo $iSeq; ?> = new Ajax.Autocompleter("id_ac_id_habilidade<?php echo $iSeq; ?>", "div_ac_id_habilidade<?php echo $iSeq; ?>", do_ajax_app_Desempenhos_autocomp_id_habilidade<?php echo $iSeq; ?>, do_ajax_app_Desempenhos_getcod_id_habilidade<?php echo $iSeq; ?>);
<?php
}
?>
</script>
<script type="text/javascript">
function scACEval_id_grupo(iACNewLine)
{
  eval("function do_ajax_app_Desempenhos_autocomp_id_grupo" + iACNewLine + "(var_id_grupo" + iACNewLine + ") { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenhos_autocomp_id_grupo" + iACNewLine + "(var_id_grupo" + iACNewLine + ", var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_grupo" + iACNewLine + "_cb); } function do_ajax_app_Desempenhos_autocomp_id_grupo" + iACNewLine + "_cb(sResp) { oAc_id_grupo" + iACNewLine + ".onComplete(sResp); } function do_ajax_app_Desempenhos_getcod_id_grupo" + iACNewLine + "(sValue) { bOnChange = document.F1.id_grupo" + iACNewLine + ".value != sValue; document.F1.id_grupo" + iACNewLine + ".value = sValue; if (bOnChange) { nm_check_insert(" + iACNewLine + "); do_ajax_app_Desempenhos_validate_id_grupo(" + iACNewLine + "); } } oAc_id_grupo" + iACNewLine + " = new Ajax.Autocompleter(\"id_ac_id_grupo" + iACNewLine + "\", \"div_ac_id_grupo" + iACNewLine + "\", do_ajax_app_Desempenhos_autocomp_id_grupo" + iACNewLine + ", do_ajax_app_Desempenhos_getcod_id_grupo" + iACNewLine + ");");
}
</script>
<script type="text/javascript">
function scACEval_id_votante(iACNewLine)
{
  eval("function do_ajax_app_Desempenhos_autocomp_id_votante" + iACNewLine + "(var_id_votante" + iACNewLine + ") { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenhos_autocomp_id_votante" + iACNewLine + "(var_id_votante" + iACNewLine + ", var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_votante" + iACNewLine + "_cb); } function do_ajax_app_Desempenhos_autocomp_id_votante" + iACNewLine + "_cb(sResp) { oAc_id_votante" + iACNewLine + ".onComplete(sResp); } function do_ajax_app_Desempenhos_getcod_id_votante" + iACNewLine + "(sValue) { bOnChange = document.F1.id_votante" + iACNewLine + ".value != sValue; document.F1.id_votante" + iACNewLine + ".value = sValue; if (bOnChange) { nm_check_insert(" + iACNewLine + "); do_ajax_app_Desempenhos_validate_id_votante(" + iACNewLine + "); } } oAc_id_votante" + iACNewLine + " = new Ajax.Autocompleter(\"id_ac_id_votante" + iACNewLine + "\", \"div_ac_id_votante" + iACNewLine + "\", do_ajax_app_Desempenhos_autocomp_id_votante" + iACNewLine + ", do_ajax_app_Desempenhos_getcod_id_votante" + iACNewLine + ");");
}
</script>
<script type="text/javascript">
function scACEval_id_votado(iACNewLine)
{
  eval("function do_ajax_app_Desempenhos_autocomp_id_votado" + iACNewLine + "(var_id_votado" + iACNewLine + ") { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenhos_autocomp_id_votado" + iACNewLine + "(var_id_votado" + iACNewLine + ", var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_votado" + iACNewLine + "_cb); } function do_ajax_app_Desempenhos_autocomp_id_votado" + iACNewLine + "_cb(sResp) { oAc_id_votado" + iACNewLine + ".onComplete(sResp); } function do_ajax_app_Desempenhos_getcod_id_votado" + iACNewLine + "(sValue) { bOnChange = document.F1.id_votado" + iACNewLine + ".value != sValue; document.F1.id_votado" + iACNewLine + ".value = sValue; if (bOnChange) { nm_check_insert(" + iACNewLine + "); do_ajax_app_Desempenhos_validate_id_votado(" + iACNewLine + "); } } oAc_id_votado" + iACNewLine + " = new Ajax.Autocompleter(\"id_ac_id_votado" + iACNewLine + "\", \"div_ac_id_votado" + iACNewLine + "\", do_ajax_app_Desempenhos_autocomp_id_votado" + iACNewLine + ", do_ajax_app_Desempenhos_getcod_id_votado" + iACNewLine + ");");
}
</script>
<script type="text/javascript">
function scACEval_id_etapa(iACNewLine)
{
  eval("function do_ajax_app_Desempenhos_autocomp_id_etapa" + iACNewLine + "(var_id_etapa" + iACNewLine + ") { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenhos_autocomp_id_etapa" + iACNewLine + "(var_id_etapa" + iACNewLine + ", var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_etapa" + iACNewLine + "_cb); } function do_ajax_app_Desempenhos_autocomp_id_etapa" + iACNewLine + "_cb(sResp) { oAc_id_etapa" + iACNewLine + ".onComplete(sResp); } function do_ajax_app_Desempenhos_getcod_id_etapa" + iACNewLine + "(sValue) { bOnChange = document.F1.id_etapa" + iACNewLine + ".value != sValue; document.F1.id_etapa" + iACNewLine + ".value = sValue; if (bOnChange) { nm_check_insert(" + iACNewLine + "); do_ajax_app_Desempenhos_validate_id_etapa(" + iACNewLine + "); } } oAc_id_etapa" + iACNewLine + " = new Ajax.Autocompleter(\"id_ac_id_etapa" + iACNewLine + "\", \"div_ac_id_etapa" + iACNewLine + "\", do_ajax_app_Desempenhos_autocomp_id_etapa" + iACNewLine + ", do_ajax_app_Desempenhos_getcod_id_etapa" + iACNewLine + ");");
}
</script>
<script type="text/javascript">
function scACEval_id_competencia(iACNewLine)
{
  eval("function do_ajax_app_Desempenhos_autocomp_id_competencia" + iACNewLine + "(var_id_competencia" + iACNewLine + ") { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenhos_autocomp_id_competencia" + iACNewLine + "(var_id_competencia" + iACNewLine + ", var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_competencia" + iACNewLine + "_cb); } function do_ajax_app_Desempenhos_autocomp_id_competencia" + iACNewLine + "_cb(sResp) { oAc_id_competencia" + iACNewLine + ".onComplete(sResp); } function do_ajax_app_Desempenhos_getcod_id_competencia" + iACNewLine + "(sValue) { bOnChange = document.F1.id_competencia" + iACNewLine + ".value != sValue; document.F1.id_competencia" + iACNewLine + ".value = sValue; if (bOnChange) { nm_check_insert(" + iACNewLine + "); do_ajax_app_Desempenhos_validate_id_competencia(" + iACNewLine + "); } } oAc_id_competencia" + iACNewLine + " = new Ajax.Autocompleter(\"id_ac_id_competencia" + iACNewLine + "\", \"div_ac_id_competencia" + iACNewLine + "\", do_ajax_app_Desempenhos_autocomp_id_competencia" + iACNewLine + ", do_ajax_app_Desempenhos_getcod_id_competencia" + iACNewLine + ");");
}
</script>
<script type="text/javascript">
function scACEval_id_habilidade(iACNewLine)
{
  eval("function do_ajax_app_Desempenhos_autocomp_id_habilidade" + iACNewLine + "(var_id_habilidade" + iACNewLine + ") { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenhos_autocomp_id_habilidade" + iACNewLine + "(var_id_habilidade" + iACNewLine + ", var_script_case_init, do_ajax_app_Desempenhos_autocomp_id_habilidade" + iACNewLine + "_cb); } function do_ajax_app_Desempenhos_autocomp_id_habilidade" + iACNewLine + "_cb(sResp) { oAc_id_habilidade" + iACNewLine + ".onComplete(sResp); } function do_ajax_app_Desempenhos_getcod_id_habilidade" + iACNewLine + "(sValue) { bOnChange = document.F1.id_habilidade" + iACNewLine + ".value != sValue; document.F1.id_habilidade" + iACNewLine + ".value = sValue; if (bOnChange) { nm_check_insert(" + iACNewLine + "); do_ajax_app_Desempenhos_validate_id_habilidade(" + iACNewLine + "); } } oAc_id_habilidade" + iACNewLine + " = new Ajax.Autocompleter(\"id_ac_id_habilidade" + iACNewLine + "\", \"div_ac_id_habilidade" + iACNewLine + "\", do_ajax_app_Desempenhos_autocomp_id_habilidade" + iACNewLine + ", do_ajax_app_Desempenhos_getcod_id_habilidade" + iACNewLine + ");");
}
</script>
<script>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
?>
<script>parent.scAjaxDetailStatus("app_Desempenhos");</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
