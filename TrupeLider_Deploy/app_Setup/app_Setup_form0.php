<?php
class app_Setup_form extends app_Setup_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<!------------ Gera��o do Formul�rio ------------------>

<html>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo 'VINCULO DOS LIDERES DE CADA GRUPO EM CADA PISTA'; } else { echo 'VINCULO DOS LIDERES DE CADA GRUPO EM CADA PISTA'; } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <STYLE>
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
 <SCRIPT language="javascript" src="app_Setup_dynifs.js"></SCRIPT>
<?php
include_once("app_Setup_sajax_js.php");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe']) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body  class="scFormPage" <?php echo $str_iframe_body; ?>>
<div id="idJSSpecChar" style="display:none;"></div>
<script language="javascript" src="app_Setup_digita.js"> 
</script> 
<?php
 include_once("app_Setup_js0.php");
?>
<script language="javascript" src="app_Setup_tab_erro.js"> 
</script> 
<script language="javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 </script>
<form name="F1" method=post 
               action="app_Setup.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo $nmgp_num_form; ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe']) ? 0 : "3";
?>
<table align="center" cellpadding=<?php echo $int_iframe_padding; ?> cellspacing=0 border=0 align=center >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['mostra_cab'] != "N"))
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
          <?php if ($this->nmgp_opcao == "novo") { echo "VINCULO DOS LIDERES DE CADA GRUPO EM CADA PISTA"; } else { echo "VINCULO DOS LIDERES DE CADA GRUPO EM CADA PISTA"; } ?>
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
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R")
{
?>
    <table border=0  cellpadding=2 cellspacing=0 align=center width="100%">
    <tr align=center><td nowrap class="scToolbar"> 
<?php
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R")
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
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") && ($this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.submit();return false;" title="Cancelar" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] != "R")
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


   
    <TD class="scFormLabelOdd" > SEQ </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormLabelOdd" > EXC </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormLabelOdd" > INC </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOdd" > <input type="image" id="sc_new_line_0" onclick="do_ajax_app_Setup_add_new_line(0); return false;" src="<?php echo $this->Ini->path_img_global ?>/fld_expand.gif" title="Abrir um novo registro" style="display:none"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOdd" > &nbsp; </TD>
   <?php }?>
   <?php if (!isset($this->nmgp_cmp_hidden['cod_setup']) || $this->nmgp_cmp_hidden['cod_setup'] == 'on') {
      if (!isset($this->nm_new_label['cod_setup'])) {
          $this->nm_new_label['cod_setup'] = 'C�digo'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_cod_setup" style="<?php echo $sStyleHidden_cod_setup; ?>" > <?php echo $this->nm_new_label['cod_setup']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_turma']) || $this->nmgp_cmp_hidden['id_turma'] == 'on') {
      if (!isset($this->nm_new_label['id_turma'])) {
          $this->nm_new_label['id_turma'] = 'Turma'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_turma" style="<?php echo $sStyleHidden_id_turma; ?>" > <?php echo $this->nm_new_label['id_turma']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_etapa']) || $this->nmgp_cmp_hidden['id_etapa'] == 'on') {
      if (!isset($this->nm_new_label['id_etapa'])) {
          $this->nm_new_label['id_etapa'] = 'Pista'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_etapa" style="<?php echo $sStyleHidden_id_etapa; ?>" > <?php echo $this->nm_new_label['id_etapa']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_grupo']) || $this->nmgp_cmp_hidden['id_grupo'] == 'on') {
      if (!isset($this->nm_new_label['id_grupo'])) {
          $this->nm_new_label['id_grupo'] = 'Grupo'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_grupo" style="<?php echo $sStyleHidden_id_grupo; ?>" > <?php echo $this->nm_new_label['id_grupo']; ?> </TD>
   <?php } ?>

   <?php if (!isset($this->nmgp_cmp_hidden['id_lider']) || $this->nmgp_cmp_hidden['id_lider'] == 'on') {
      if (!isset($this->nm_new_label['id_lider'])) {
          $this->nm_new_label['id_lider'] = 'L�der'; } ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_lider" style="<?php echo $sStyleHidden_id_lider; ?>" > <?php echo $this->nm_new_label['id_lider']; ?> </TD>
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
       $iStart = sizeof($this->form_vert_app_Setup);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_app_Setup = $this->form_vert_app_Setup;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_app_Setup))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_app_Setup as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['cod_setup'] = true;
           $this->nmgp_cmp_readonly['id_turma'] = true;
           $this->nmgp_cmp_readonly['id_etapa'] = true;
           $this->nmgp_cmp_readonly['id_grupo'] = true;
           $this->nmgp_cmp_readonly['id_lider'] = true;
       }
       elseif ($Line_Add)
       {
           $this->nmgp_cmp_readonly['cod_setup'] = false;
           $this->nmgp_cmp_readonly['id_turma'] = false;
           $this->nmgp_cmp_readonly['id_etapa'] = false;
           $this->nmgp_cmp_readonly['id_grupo'] = false;
           $this->nmgp_cmp_readonly['id_lider'] = false;
       }
        $this->cod_setup = $this->form_vert_app_Setup[$sc_seq_vert]['cod_setup']; 
       $cod_setup = $this->cod_setup; 
       $sStyleHidden_cod_setup = '';
       if (isset($sCheckRead_cod_setup))
       {
           unset($sCheckRead_cod_setup);
       }
       if (isset($this->nmgp_cmp_readonly['cod_setup']))
       {
           $sCheckRead_cod_setup = $this->nmgp_cmp_readonly['cod_setup'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_setup']) && $this->nmgp_cmp_hidden['cod_setup'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_setup']);
           $sStyleHidden_cod_setup = 'display: none;';
       }
       $bTestReadOnly_cod_setup = true;
       $sStyleReadLab_cod_setup = 'display: none;';
       $sStyleReadInp_cod_setup = '';
       if (isset($this->nmgp_cmp_readonly['cod_setup']) && $this->nmgp_cmp_readonly['cod_setup'] == 'on')
       {
           $bTestReadOnly_cod_setup = false;
           unset($this->nmgp_cmp_readonly['cod_setup']);
           $sStyleReadLab_cod_setup = '';
           $sStyleReadInp_cod_setup = 'display: none;';
       }
       $this->id_turma = $this->form_vert_app_Setup[$sc_seq_vert]['id_turma']; 
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
       $this->id_etapa = $this->form_vert_app_Setup[$sc_seq_vert]['id_etapa']; 
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
       $this->id_grupo = $this->form_vert_app_Setup[$sc_seq_vert]['id_grupo']; 
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
       $this->id_lider = $this->form_vert_app_Setup[$sc_seq_vert]['id_lider']; 
       $id_lider = $this->id_lider; 
       $sStyleHidden_id_lider = '';
       if (isset($sCheckRead_id_lider))
       {
           unset($sCheckRead_id_lider);
       }
       if (isset($this->nmgp_cmp_readonly['id_lider']))
       {
           $sCheckRead_id_lider = $this->nmgp_cmp_readonly['id_lider'];
       }
       if (isset($this->nmgp_cmp_hidden['id_lider']) && $this->nmgp_cmp_hidden['id_lider'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_lider']);
           $sStyleHidden_id_lider = 'display: none;';
       }
       $bTestReadOnly_id_lider = true;
       $sStyleReadLab_id_lider = 'display: none;';
       $sStyleReadInp_id_lider = '';
       if (isset($this->nmgp_cmp_readonly['id_lider']) && $this->nmgp_cmp_readonly['id_lider'] == 'on')
       {
           $bTestReadOnly_id_lider = false;
           unset($this->nmgp_cmp_readonly['id_lider']);
           $sStyleReadLab_id_lider = '';
           $sStyleReadInp_id_lider = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOdd"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
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
<input type="image" id="sc_new_line_<?php echo $sc_seq_vert ?>" onclick="do_ajax_app_Setup_add_new_line(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_novo.gif" title="Abrir um novo registro" style="display:none">
<?php }?>
<input type="image" id="sc_canceli_line_<?php echo $sc_seq_vert ?>" onclick="do_ajax_app_Setup_cancel_insert(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_cancelar.gif" title="Cancelar" <?php if (!$Line_Add) { echo "style=\"display:none\""; } ?>>
<input type="image" id="sc_cancelu_line_<?php echo $sc_seq_vert ?>" onclick="do_ajax_app_Setup_cancel_update(<?php echo $sc_seq_vert ?>); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_cancelar.gif" title="Cancelar" style="display:none">
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['cod_setup']) && $this->nmgp_cmp_hidden['cod_setup'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cod_setup<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $cod_setup) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_cod_setup<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_setup; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_cod_setup && isset($this->nmgp_cmp_readonly["cod_setup"]) &&  $this->nmgp_cmp_readonly["cod_setup"] == "on") { 

 ?>
<input type=hidden name="cod_setup<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $cod_setup) . "\">" . $cod_setup . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_setup<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadLab_cod_setup; ?>"><?php echo $this->cod_setup; ?></span><span id="id_read_off_cod_setup<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_cod_setup; ?>">
 <input class="scFormObjectOdd" type=text name="cod_setup<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $cod_setup) ?>"
 onchange="nm_check_insert(<?php echo $sc_seq_vert ?>);"  onblur="scCssBlur(this, '<?php echo $sc_seq_vert ?>'); NM_onblur(); do_ajax_app_Setup_validate_cod_setup(<?php echo $sc_seq_vert; ?>); return false;" onfocus="scCssFocus(this, '<?php echo $sc_seq_vert ?>'); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("C�digo")?>', 0, 'naomask', 'lista', 'CXA', 6, 'abcdefghijklmnopqrstuvwxyz0123456789')" size=21 maxlength=6></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cod_setup<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cod_setup<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
   echo " <span id=\"idAjaxSelect_id_turma" .  $sc_seq_vert . "\"><select class=\"scFormObjectOdd\" name=\"id_turma" . $sc_seq_vert . "\"  onBlur=\"scCssBlur(this, " . $sc_seq_vert . ");\"  onFocus=\"scCssFocus(this, " . $sc_seq_vert . ");\"  onChange=\"do_ajax_app_Setup_refresh_id_turma(" . $sc_seq_vert . ");nm_check_insert(" . $sc_seq_vert . ");\"  size=1>" ; 
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

   <?php if (isset($this->nmgp_cmp_hidden['id_etapa']) && $this->nmgp_cmp_hidden['id_etapa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_etapa<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $this->id_etapa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_etapa<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_etapa; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_etapa && isset($this->nmgp_cmp_readonly["id_etapa"]) &&  $this->nmgp_cmp_readonly["id_etapa"] == "on") { 
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA 
FROM ETAPAS 
ORDER BY ID_ETAPA";
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
   $id_etapa_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_etapa1))
          {
              foreach ($this->id_etapa1 as $tmp_id_etapa)
              {
                  if (trim($tmp_id_etapa) == trim($cadaselect[1])) { $id_etapa_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_etapa) == trim($cadaselect[1])) { $id_etapa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_etapa<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_etapa) . "\">" . $id_etapa_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA 
FROM ETAPAS 
ORDER BY ID_ETAPA";
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
   $id_etapa_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_etapa1))
          {
              foreach ($this->id_etapa1 as $tmp_id_etapa)
              {
                  if (trim($tmp_id_etapa) == trim($cadaselect[1])) { $id_etapa_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_etapa) == trim($cadaselect[1])) { $id_etapa_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_etapa" . $sc_seq_vert . "\" style=\"" .  $sStyleReadLab_id_etapa . "\">" . $id_etapa_look . "</span><span id=\"id_read_off_id_etapa" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_etapa . "\">";
   echo " <span id=\"idAjaxSelect_id_etapa" .  $sc_seq_vert . "\"><select class=\"scFormObjectOdd\" name=\"id_etapa" . $sc_seq_vert . "\"  onBlur=\"scCssBlur(this, " . $sc_seq_vert . ");\"  onFocus=\"scCssFocus(this, " . $sc_seq_vert . ");\"  onChange=\"nm_check_insert(" . $sc_seq_vert . ");\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_etapa) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_etapa)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_etapa<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_etapa<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_grupo<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $this->id_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_grupo<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_grupo; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_grupo && isset($this->nmgp_cmp_readonly["id_grupo"]) &&  $this->nmgp_cmp_readonly["id_grupo"] == "on") { 
 
$nmgp_def_dados = "" ; 
if ($this->id_turma != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS
WHERE ID_TURMA = '$this->id_turma' 
ORDER BY ID_GRUPO";
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
} 
   $x = 0; 
   $id_grupo_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_grupo1))
          {
              foreach ($this->id_grupo1 as $tmp_id_grupo)
              {
                  if (trim($tmp_id_grupo) == trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_grupo) == trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_grupo<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_grupo) . "\">" . $id_grupo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if ($this->id_turma != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS
WHERE ID_TURMA = '$this->id_turma' 
ORDER BY ID_GRUPO";
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
} 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $id_grupo_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_grupo1))
          {
              foreach ($this->id_grupo1 as $tmp_id_grupo)
              {
                  if (trim($tmp_id_grupo) == trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_grupo) == trim($cadaselect[1])) { $id_grupo_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_grupo" . $sc_seq_vert . "\" style=\"" .  $sStyleReadLab_id_grupo . "\">" . $id_grupo_look . "</span><span id=\"id_read_off_id_grupo" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_grupo . "\">";
   echo " <span id=\"idAjaxSelect_id_grupo" .  $sc_seq_vert . "\"><select class=\"scFormObjectOdd\" name=\"id_grupo" . $sc_seq_vert . "\"  onBlur=\"scCssBlur(this, " . $sc_seq_vert . ");\"  onFocus=\"scCssFocus(this, " . $sc_seq_vert . ");\"  onChange=\"do_ajax_app_Setup_refresh_id_grupo(" . $sc_seq_vert . ");nm_check_insert(" . $sc_seq_vert . ");\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_grupo) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_grupo)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_grupo<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_grupo<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_lider']) && $this->nmgp_cmp_hidden['id_lider'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_lider<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $this->id_lider) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_lider<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_lider; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly_id_lider && isset($this->nmgp_cmp_readonly["id_lider"]) &&  $this->nmgp_cmp_readonly["id_lider"] == "on") { 
 
$nmgp_def_dados = "" ; 
if ($this->id_grupo != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES
WHERE ID_GRUPO = '$this->id_grupo' 
ORDER BY ID_PARTICIPE";
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
} 
   $x = 0; 
   $id_lider_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_lider1))
          {
              foreach ($this->id_lider1 as $tmp_id_lider)
              {
                  if (trim($tmp_id_lider) == trim($cadaselect[1])) { $id_lider_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_lider) == trim($cadaselect[1])) { $id_lider_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_lider<?php echo $sc_seq_vert ?>" value="<?php echo str_replace('"', "&quot;", $id_lider) . "\">" . $id_lider_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if ($this->id_grupo != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES
WHERE ID_GRUPO = '$this->id_grupo' 
ORDER BY ID_PARTICIPE";
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
} 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $id_lider_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_lider1))
          {
              foreach ($this->id_lider1 as $tmp_id_lider)
              {
                  if (trim($tmp_id_lider) == trim($cadaselect[1])) { $id_lider_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->id_lider) == trim($cadaselect[1])) { $id_lider_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_lider" . $sc_seq_vert . "\" style=\"" .  $sStyleReadLab_id_lider . "\">" . $id_lider_look . "</span><span id=\"id_read_off_id_lider" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_lider . "\">";
   echo " <span id=\"idAjaxSelect_id_lider" .  $sc_seq_vert . "\"><select class=\"scFormObjectOdd\" name=\"id_lider" . $sc_seq_vert . "\"  onBlur=\"scCssBlur(this, " . $sc_seq_vert . ");\"  onFocus=\"scCssFocus(this, " . $sc_seq_vert . ");\"  onChange=\"nm_check_insert(" . $sc_seq_vert . ");\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_lider) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_lider)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_lider<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_lider<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_cod_setup))
       {
           $this->nmgp_cmp_readonly['cod_setup'] = $sCheckRead_cod_setup;
       }
       if ('display: none;' == $sStyleHidden_cod_setup)
       {
           $this->nmgp_cmp_hidden['cod_setup'] = 'off';
       }
       if (isset($sCheckRead_id_turma))
       {
           $this->nmgp_cmp_readonly['id_turma'] = $sCheckRead_id_turma;
       }
       if ('display: none;' == $sStyleHidden_id_turma)
       {
           $this->nmgp_cmp_hidden['id_turma'] = 'off';
       }
       if (isset($sCheckRead_id_etapa))
       {
           $this->nmgp_cmp_readonly['id_etapa'] = $sCheckRead_id_etapa;
       }
       if ('display: none;' == $sStyleHidden_id_etapa)
       {
           $this->nmgp_cmp_hidden['id_etapa'] = 'off';
       }
       if (isset($sCheckRead_id_grupo))
       {
           $this->nmgp_cmp_readonly['id_grupo'] = $sCheckRead_id_grupo;
       }
       if ('display: none;' == $sStyleHidden_id_grupo)
       {
           $this->nmgp_cmp_hidden['id_grupo'] = 'off';
       }
       if (isset($sCheckRead_id_lider))
       {
           $this->nmgp_cmp_readonly['id_lider'] = $sCheckRead_id_lider;
       }
       if ('display: none;' == $sStyleHidden_id_lider)
       {
           $this->nmgp_cmp_hidden['id_lider'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_app_Setup = $guarda_form_vert_app_Setup;
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
  <input type="image" onclick="do_ajax_app_Setup_add_new_line(); return false;" src="<?php echo $this->Ini->path_img_global ?>/nm_scriptcase3_green_bmd_novo.gif" title="Abrir um novo registro">
<?php
  }
?>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

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
<script>parent.scAjaxDetailStatus("app_Setup");</script>
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
