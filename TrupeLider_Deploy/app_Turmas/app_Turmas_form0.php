<!------------ Geração do Formulário ------------------>

<html>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo 'CADASTRO DE TURMAS'; } else { echo 'CADASTRO DE TURMAS'; } ?></TITLE>
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
  .scFormLabelOdd { background-color: #E2FFDC; border-color: #990000; border-style: solid; border-width: 0; color: #333333; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; padding: 4px }
  .scFormLabelOddFormat { font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scFormObjectOdd { background-color: #F0FEED; border-color: #189300; border-style: solid; border-width: 1 }
  .scFormObjectFocusOdd { background-color: #F0FEED; border-color: #189300; border-style: solid; border-width: 1; background-color: #E2FFDC }
  .scFormDataOdd { background-color: #FFFFFF; border-color: #990000; border-style: solid; border-width: 0; color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px; padding: 4px }
  .scFormDataFontOdd { color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px }
  .scErrorTitle { background-color: #FF0000; border-color: #FF0000; border-style: solid; border-width: 1; color: #FFFFBB; font-family: Arial, sans-serif; font-size: 13px; font-weight: bold; text-align: left }
  .scErrorTitleFont { color: #FFFFBB; font-family: Arial, sans-serif; font-size: 13px; font-weight: bold }
  .scErrorMessage { background-color: #ffdddd; border-color: #990000; border-style: solid; border-width: 1; color: #990000; font-family: Verdana, Arial, sans-serif; font-size: 11px; padding: 2px; text-align: left }
  .scErrorMessageFont { color: #990000; font-family: Verdana, Arial, sans-serif; font-size: 11px }
  .scErrorLine { color: #000000; font-family: Tahoma, Arial, sans-serif; font-size: 12px; background-color: #FDE6E6; padding: 4px }
  .scBlock { background-color: #45C42D; color: #FFFFFF; font-family: Verdana, Arial, sans-serif; font-size: 14px; font-weight: bold; padding: 2px; text-align: left; vertical-align: middle }
  .scTabActive { background-color: #daf8d4; color: #189300; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scTabInactive { background-color: #c5e0bf; color: #5c9050; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold }
  .scTabActiveFont { color: #189300; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; text-decoration: none; font-style: normal }
  .scTabInactiveFont { color: #5c9050; font-family: Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; text-decoration: none; font-style: normal }
 </STYLE>
 <SCRIPT language="javascript" src="app_Turmas_dynifs.js"></SCRIPT>
<?php
include_once("app_Turmas_sajax_js.php");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe']) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body  class="scFormPage" <?php echo $str_iframe_body; ?>>
<script language="javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
<div id="idJSSpecChar" style="display:none;"></div>
<script language="javascript" src="app_Turmas_digita.js"> 
</script> 
<?php
 include_once("app_Turmas_js0.php");
?>
<script language="javascript" src="app_Turmas_tab_erro.js"> 
</script> 
<script language="javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
<script language="javascript"> 
 </script>
<form name="F1" method=post 
               action="app_Turmas.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo $nmgp_num_form; ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe']) ? 0 : "3";
?>
<table align="center" cellpadding=<?php echo $int_iframe_padding; ?> cellspacing=0 border=0 align=center >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['mostra_cab'] != "N"))
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
          <?php if ($this->nmgp_opcao == "novo") { echo "CADASTRO DE TURMAS"; } else { echo "CADASTRO DE TURMAS"; } ?>
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
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R")
{
?>
    <table border=0  cellpadding=2 cellspacing=0 align=center width="100%">
    <tr align=center><td nowrap class="scToolbar"> 
<?php
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R")
{
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['first'] == "on")) {
?>
       <input type="image" name="sc_b_ini" onclick="nm_move ('inicio'); return false;" title="Retornar ao in&iacute;cio do arquivo" id="sc_b_ini_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_binicio.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['back'] == "on")) {
?>
       <input type="image" name="sc_b_ret" onclick="nm_move ('retorna'); return false;" title="Retornar um registro" id="sc_b_ret_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bretorna.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['forward'] == "on")) {
?>
       <input type="image" name="sc_b_avc" onclick="nm_move ('avanca'); return false;" title="Avan&ccedil;ar para o pr&oacute;ximo registro" id="sc_b_avc_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bavanca.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['last'] == "on")) {
?>
       <input type="image" name="sc_b_fim" onclick="nm_move ('final'); return false;" title="Avan&ccedil;ar para o final do arquivo" id="sc_b_fim_t" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bfinal.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['new'] == "on")) {
?>
       <input type="image" name="sc_b_new" onclick="nm_move ('novo'); return false;" title="Abrir um novo registro" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bnovo.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nmgp_botoes['insert'] == "on") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_ins" onclick="nm_atualiza ('incluir'); return false;" title="Incluir o registro" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bincluir.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['update'] == "on")) {
?>
       <input type="image" name="sc_b_upd" onclick="nm_atualiza ('alterar'); return false;" title="Alterar o registro" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_balterar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && ($this->nmgp_botoes['delete'] == "on")) {
?>
       <input type="image" name="sc_b_del" onclick="nm_atualiza ('excluir'); return false;" title="Excluir o registro" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bexcluir.gif" ?>" align="absmiddle"> 
<?php
    }
    if ('' != $this->url_webhelp) {
?>
       <input type="image" name="sc_b_hlp" onclick="window.open('<?php echo $this->url_webhelp; ?>', 'Ajuda', 'resizable, scrollbars'); return false;" title="Ajuda" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bhelp.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] == "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") && ($this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.submit();return false;" title="Cancelar" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['run_iframe'] != "R")
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
<tr><td class="scErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><img src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__notice.gif" style="border-width: 0px" align="top"></td><td style="padding: 0px; vertical-align: top"><a href="javascript: scAjaxHideErrorDisplay('table')"><img src="<?php echo $this->Ini->path_botoes; ?>/close_icon.gif" border="0" align="absmiddle"></a></td></tr></table></td></tr>
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
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing="" border="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" height="100%"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_turma']))
    {
        $this->nm_new_label['cod_turma'] = 'Código da Turma';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_turma = $this->cod_turma;
   $sStyleHidden_cod_turma = '';
   if (isset($this->nmgp_cmp_hidden['cod_turma']) && $this->nmgp_cmp_hidden['cod_turma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_turma']);
       $sStyleHidden_cod_turma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_turma = 'display: none;';
   $sStyleReadInp_cod_turma = '';
   if (isset($this->nmgp_cmp_readonly['cod_turma']) && $this->nmgp_cmp_readonly['cod_turma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_turma']);
       $sStyleReadLab_cod_turma = '';
       $sStyleReadInp_cod_turma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_turma']) && $this->nmgp_cmp_hidden['cod_turma'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cod_turma" value="<?php echo str_replace('"', "&quot;", $cod_turma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_cod_turma" style="<?php echo $sStyleHidden_cod_turma; ?>"><span id="id_label_cod_turma"><?php echo $this->nm_new_label['cod_turma']; ?></span>*</TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cod_turma" style="<?php echo $sStyleHidden_cod_turma; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["cod_turma"]) &&  $this->nmgp_cmp_readonly["cod_turma"] == "on") { 

 ?>
<input type=hidden name="cod_turma" value="<?php echo str_replace('"', "&quot;", $cod_turma) . "\">" . $cod_turma . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_turma" style="<?php echo $sStyleReadLab_cod_turma; ?>"><?php echo $this->cod_turma; ?></span><span id="id_read_off_cod_turma" style="<?php echo $sStyleReadInp_cod_turma; ?>">
 <input class="scFormObjectOdd" type=text name="cod_turma" value="<?php echo str_replace('"', "&quot;", $cod_turma) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_cod_turma(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Código da Turma")?>', 0, 'naomask', 'lista', 'cxab', 20, 'TUDO')" size=20 maxlength=20></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cod_turma_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cod_turma_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descricao']))
    {
        $this->nm_new_label['descricao'] = 'Descrição';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descricao = $this->descricao;
   $sStyleHidden_descricao = '';
   if (isset($this->nmgp_cmp_hidden['descricao']) && $this->nmgp_cmp_hidden['descricao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descricao']);
       $sStyleHidden_descricao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descricao = 'display: none;';
   $sStyleReadInp_descricao = '';
   if (isset($this->nmgp_cmp_readonly['descricao']) && $this->nmgp_cmp_readonly['descricao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descricao']);
       $sStyleReadLab_descricao = '';
       $sStyleReadInp_descricao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descricao']) && $this->nmgp_cmp_hidden['descricao'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="descricao" value="<?php echo str_replace('"', "&quot;", $descricao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_descricao" style="<?php echo $sStyleHidden_descricao; ?>"><span id="id_label_descricao"><?php echo $this->nm_new_label['descricao']; ?></span>*</TD>
    <TD class="scFormDataOdd" id="hidden_field_data_descricao" style="<?php echo $sStyleHidden_descricao; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["descricao"]) &&  $this->nmgp_cmp_readonly["descricao"] == "on") { 

 ?>
<input type=hidden name="descricao" value="<?php echo str_replace('"', "&quot;", $descricao) . "\">" . $descricao . ""; ?>
<?php } else { ?>
<span id="id_read_on_descricao" style="<?php echo $sStyleReadLab_descricao; ?>"><?php echo $this->descricao; ?></span><span id="id_read_off_descricao" style="<?php echo $sStyleReadInp_descricao; ?>">
 <input class="scFormObjectOdd" type=text name="descricao" value="<?php echo str_replace('"', "&quot;", $descricao) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_descricao(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Descrição")?>', 0, 'naomask', 'lista', 'cxab', 120, 'TUDO')" size=50 maxlength=120></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_descricao_frame"><tr><td class="scErrorMessage"><span id="id_error_display_descricao_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cep']))
    {
        $this->nm_new_label['cep'] = 'CEP';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cep = $this->cep;
   $sStyleHidden_cep = '';
   if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cep']);
       $sStyleHidden_cep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cep = 'display: none;';
   $sStyleReadInp_cep = '';
   if (isset($this->nmgp_cmp_readonly['cep']) && $this->nmgp_cmp_readonly['cep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cep']);
       $sStyleReadLab_cep = '';
       $sStyleReadInp_cep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cep" value="<?php echo str_replace('"', "&quot;", $cep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_cep" style="<?php echo $sStyleHidden_cep; ?>"><span id="id_label_cep"><?php echo $this->nm_new_label['cep']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cep" style="<?php echo $sStyleHidden_cep; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["cep"]) &&  $this->nmgp_cmp_readonly["cep"] == "on") { 

 ?>
<input type=hidden name="cep" value="<?php echo str_replace('"', "&quot;", $cep) . "\">" . $cep . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep" style="<?php echo $sStyleReadLab_cep; ?>"><?php echo $this->cep; ?></span><span id="id_read_off_cep" style="<?php echo $sStyleReadInp_cep; ?>">
 <input class="scFormObjectOdd" type=text name="cep" value="<?php echo str_replace('"', "&quot;", $cep) ?>"
onChange="cep_cep(this.value, 'F1;CEP,cep;UF,estado;CIDADE,cidade;BAIRRO,bairro;RUA,logradouro;TIPOEXT,logradouro;LOGRAD,logradouro')" onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_cep(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("CEP")?>', 0, 'naomask', 'cep')" size=8>&nbsp;<INPUT TYPE="image" SRC="<?php echo $this->Ini->path_img_global; ?>/nm_carta.gif" title="Pesquisar CEP" ALIGN="absmiddle" onClick=" window.open('<?php echo $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link; ?>app_Turmas/app_Turmas_cep.php?cep=&form_origem=F1;CEP,cep;UF,estado;CIDADE,cidade;BAIRRO,bairro;RUA,logradouro;TIPOEXT,logradouro;LOGRAD,logradouro', 'cep_busca', 'location=no,menubar=no,resizable=no,scrollbars=yes,status=no,toolbar=no, width=512,height=384'); return false;">
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cep_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cep_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado']))
    {
        $this->nm_new_label['estado'] = 'Estado';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado = $this->estado;
   $sStyleHidden_estado = '';
   if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado']);
       $sStyleHidden_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado = 'display: none;';
   $sStyleReadInp_estado = '';
   if (isset($this->nmgp_cmp_readonly['estado']) && $this->nmgp_cmp_readonly['estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado']);
       $sStyleReadLab_estado = '';
       $sStyleReadInp_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="estado" value="<?php echo str_replace('"', "&quot;", $estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_estado" style="<?php echo $sStyleHidden_estado; ?>"><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 

 ?>
<input type=hidden name="estado" value="<?php echo str_replace('"', "&quot;", $estado) . "\">" . $estado . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado" style="<?php echo $sStyleReadLab_estado; ?>"><?php echo $this->estado; ?></span><span id="id_read_off_estado" style="<?php echo $sStyleReadInp_estado; ?>">
 <input class="scFormObjectOdd" type=text name="estado" value="<?php echo str_replace('"', "&quot;", $estado) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_estado(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Estado")?>', 0, 'naomask', 'lista', 'cxab', 30, 'TUDO')" size=21 maxlength=30></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_estado_frame"><tr><td class="scErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cidade']))
    {
        $this->nm_new_label['cidade'] = 'Cidade';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cidade = $this->cidade;
   $sStyleHidden_cidade = '';
   if (isset($this->nmgp_cmp_hidden['cidade']) && $this->nmgp_cmp_hidden['cidade'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cidade']);
       $sStyleHidden_cidade = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cidade = 'display: none;';
   $sStyleReadInp_cidade = '';
   if (isset($this->nmgp_cmp_readonly['cidade']) && $this->nmgp_cmp_readonly['cidade'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cidade']);
       $sStyleReadLab_cidade = '';
       $sStyleReadInp_cidade = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cidade']) && $this->nmgp_cmp_hidden['cidade'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cidade" value="<?php echo str_replace('"', "&quot;", $cidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_cidade" style="<?php echo $sStyleHidden_cidade; ?>"><span id="id_label_cidade"><?php echo $this->nm_new_label['cidade']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cidade" style="<?php echo $sStyleHidden_cidade; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["cidade"]) &&  $this->nmgp_cmp_readonly["cidade"] == "on") { 

 ?>
<input type=hidden name="cidade" value="<?php echo str_replace('"', "&quot;", $cidade) . "\">" . $cidade . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidade" style="<?php echo $sStyleReadLab_cidade; ?>"><?php echo $this->cidade; ?></span><span id="id_read_off_cidade" style="<?php echo $sStyleReadInp_cidade; ?>">
 <input class="scFormObjectOdd" type=text name="cidade" value="<?php echo str_replace('"', "&quot;", $cidade) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_cidade(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Cidade")?>', 0, 'naomask', 'lista', 'cxab', 35, 'TUDO')" size=25 maxlength=35></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cidade_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cidade_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairro']))
    {
        $this->nm_new_label['bairro'] = 'Bairro';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairro = $this->bairro;
   $sStyleHidden_bairro = '';
   if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairro']);
       $sStyleHidden_bairro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairro = 'display: none;';
   $sStyleReadInp_bairro = '';
   if (isset($this->nmgp_cmp_readonly['bairro']) && $this->nmgp_cmp_readonly['bairro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairro']);
       $sStyleReadLab_bairro = '';
       $sStyleReadInp_bairro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="bairro" value="<?php echo str_replace('"', "&quot;", $bairro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_bairro" style="<?php echo $sStyleHidden_bairro; ?>"><span id="id_label_bairro"><?php echo $this->nm_new_label['bairro']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_bairro" style="<?php echo $sStyleHidden_bairro; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["bairro"]) &&  $this->nmgp_cmp_readonly["bairro"] == "on") { 

 ?>
<input type=hidden name="bairro" value="<?php echo str_replace('"', "&quot;", $bairro) . "\">" . $bairro . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairro" style="<?php echo $sStyleReadLab_bairro; ?>"><?php echo $this->bairro; ?></span><span id="id_read_off_bairro" style="<?php echo $sStyleReadInp_bairro; ?>">
 <input class="scFormObjectOdd" type=text name="bairro" value="<?php echo str_replace('"', "&quot;", $bairro) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_bairro(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Bairro")?>', 0, 'naomask', 'lista', 'cxab', 25, 'TUDO')" size=18 maxlength=25></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_bairro_frame"><tr><td class="scErrorMessage"><span id="id_error_display_bairro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['logradouro']))
    {
        $this->nm_new_label['logradouro'] = 'Endereço';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $logradouro = $this->logradouro;
   $sStyleHidden_logradouro = '';
   if (isset($this->nmgp_cmp_hidden['logradouro']) && $this->nmgp_cmp_hidden['logradouro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['logradouro']);
       $sStyleHidden_logradouro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_logradouro = 'display: none;';
   $sStyleReadInp_logradouro = '';
   if (isset($this->nmgp_cmp_readonly['logradouro']) && $this->nmgp_cmp_readonly['logradouro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['logradouro']);
       $sStyleReadLab_logradouro = '';
       $sStyleReadInp_logradouro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['logradouro']) && $this->nmgp_cmp_hidden['logradouro'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="logradouro" value="<?php echo str_replace('"', "&quot;", $logradouro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_logradouro" style="<?php echo $sStyleHidden_logradouro; ?>"><span id="id_label_logradouro"><?php echo $this->nm_new_label['logradouro']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_logradouro" style="<?php echo $sStyleHidden_logradouro; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["logradouro"]) &&  $this->nmgp_cmp_readonly["logradouro"] == "on") { 

 ?>
<input type=hidden name="logradouro" value="<?php echo str_replace('"', "&quot;", $logradouro) . "\">" . $logradouro . ""; ?>
<?php } else { ?>
<span id="id_read_on_logradouro" style="<?php echo $sStyleReadLab_logradouro; ?>"><?php echo $this->logradouro; ?></span><span id="id_read_off_logradouro" style="<?php echo $sStyleReadInp_logradouro; ?>">
 <input class="scFormObjectOdd" type=text name="logradouro" value="<?php echo str_replace('"', "&quot;", $logradouro) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_logradouro(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Endereço")?>', 0, 'naomask', 'lista', 'cxab', 200, 'TUDO')" size=35 maxlength=200></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_logradouro_frame"><tr><td class="scErrorMessage"><span id="id_error_display_logradouro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero']))
    {
        $this->nm_new_label['numero'] = 'Número';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero = $this->numero;
   $sStyleHidden_numero = '';
   if (isset($this->nmgp_cmp_hidden['numero']) && $this->nmgp_cmp_hidden['numero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero']);
       $sStyleHidden_numero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero = 'display: none;';
   $sStyleReadInp_numero = '';
   if (isset($this->nmgp_cmp_readonly['numero']) && $this->nmgp_cmp_readonly['numero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero']);
       $sStyleReadLab_numero = '';
       $sStyleReadInp_numero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero']) && $this->nmgp_cmp_hidden['numero'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="numero" value="<?php echo str_replace('"', "&quot;", $numero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_numero" style="<?php echo $sStyleHidden_numero; ?>"><span id="id_label_numero"><?php echo $this->nm_new_label['numero']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_numero" style="<?php echo $sStyleHidden_numero; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["numero"]) &&  $this->nmgp_cmp_readonly["numero"] == "on") { 

 ?>
<input type=hidden name="numero" value="<?php echo str_replace('"', "&quot;", $numero) . "\">" . $numero . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero" style="<?php echo $sStyleReadLab_numero; ?>"><?php echo $this->numero; ?></span><span id="id_read_off_numero" style="<?php echo $sStyleReadInp_numero; ?>">
 <input class="scFormObjectOdd" type=text name="numero" value="<?php echo str_replace('"', "&quot;", $numero) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_numero(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Número")?>', 0, 'naomask', 'lista', 'cxab', 6, 'TUDO')" size=5 maxlength=6></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_numero_frame"><tr><td class="scErrorMessage"><span id="id_error_display_numero_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['complemento']))
    {
        $this->nm_new_label['complemento'] = 'Complemento';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $complemento = $this->complemento;
   $sStyleHidden_complemento = '';
   if (isset($this->nmgp_cmp_hidden['complemento']) && $this->nmgp_cmp_hidden['complemento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['complemento']);
       $sStyleHidden_complemento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_complemento = 'display: none;';
   $sStyleReadInp_complemento = '';
   if (isset($this->nmgp_cmp_readonly['complemento']) && $this->nmgp_cmp_readonly['complemento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['complemento']);
       $sStyleReadLab_complemento = '';
       $sStyleReadInp_complemento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['complemento']) && $this->nmgp_cmp_hidden['complemento'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="complemento" value="<?php echo str_replace('"', "&quot;", $complemento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_complemento" style="<?php echo $sStyleHidden_complemento; ?>"><span id="id_label_complemento"><?php echo $this->nm_new_label['complemento']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_complemento" style="<?php echo $sStyleHidden_complemento; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["complemento"]) &&  $this->nmgp_cmp_readonly["complemento"] == "on") { 

 ?>
<input type=hidden name="complemento" value="<?php echo str_replace('"', "&quot;", $complemento) . "\">" . $complemento . ""; ?>
<?php } else { ?>
<span id="id_read_on_complemento" style="<?php echo $sStyleReadLab_complemento; ?>"><?php echo $this->complemento; ?></span><span id="id_read_off_complemento" style="<?php echo $sStyleReadInp_complemento; ?>">
 <input class="scFormObjectOdd" type=text name="complemento" value="<?php echo str_replace('"', "&quot;", $complemento) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_complemento(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Complemento")?>', 0, 'naomask', 'lista', 'cxab', 50, 'TUDO')" size=35 maxlength=50></span><?php } ?>
<a href="javascript:nm_mostra_mens('complemento')"><img border="0" src="<?php  echo $this->Ini->path_img_global . "/nm_help.gif" ?>"  align="absmiddle"></a> 
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_complemento_frame"><tr><td class="scErrorMessage"><span id="id_error_display_complemento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = 'E-mail';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="email" value="<?php echo str_replace('"', "&quot;", $email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_email" style="<?php echo $sStyleHidden_email; ?>"><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type=hidden name="email" value="<?php echo str_replace('"', "&quot;", $email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->email; ?></span><span id="id_read_off_email" style="<?php echo $sStyleReadInp_email; ?>">
 <input class="scFormObjectOdd" type=text name="email" value="<?php echo str_replace('"', "&quot;", $email) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_email(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("E-mail")?>', 0, 'naomask', 'email', 50)" size=35 maxlength=50>&nbsp;<A HREF="mailto:<?php echo $email;?>"><IMG  SRC="<?php echo $this->Ini->path_img_global; ?>/nm_link.gif" ALIGN="absmiddle" border="0"></A>
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_email_frame"><tr><td class="scErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefax']))
    {
        $this->nm_new_label['telefax'] = 'Telefone / Fax';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefax = $this->telefax;
   $sStyleHidden_telefax = '';
   if (isset($this->nmgp_cmp_hidden['telefax']) && $this->nmgp_cmp_hidden['telefax'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefax']);
       $sStyleHidden_telefax = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefax = 'display: none;';
   $sStyleReadInp_telefax = '';
   if (isset($this->nmgp_cmp_readonly['telefax']) && $this->nmgp_cmp_readonly['telefax'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefax']);
       $sStyleReadLab_telefax = '';
       $sStyleReadInp_telefax = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefax']) && $this->nmgp_cmp_hidden['telefax'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="telefax" value="<?php echo str_replace('"', "&quot;", $telefax) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_telefax" style="<?php echo $sStyleHidden_telefax; ?>"><span id="id_label_telefax"><?php echo $this->nm_new_label['telefax']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_telefax" style="<?php echo $sStyleHidden_telefax; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["telefax"]) &&  $this->nmgp_cmp_readonly["telefax"] == "on") { 

 ?>
<input type=hidden name="telefax" value="<?php echo str_replace('"', "&quot;", $telefax) . "\">" . $telefax . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefax" style="<?php echo $sStyleReadLab_telefax; ?>"><?php echo $this->telefax; ?></span><span id="id_read_off_telefax" style="<?php echo $sStyleReadInp_telefax; ?>">
 <input class="scFormObjectOdd" type=text name="telefax" value="<?php echo str_replace('"', "&quot;", $telefax) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_telefax(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Telefone / Fax")?>', 0, 'naomask', 'lista', 'cxab', 40, '0123456789 ')" size=28 maxlength=40></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_telefax_frame"><tr><td class="scErrorMessage"><span id="id_error_display_telefax_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tel']))
    {
        $this->nm_new_label['tel'] = 'Celular';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tel = $this->tel;
   $sStyleHidden_tel = '';
   if (isset($this->nmgp_cmp_hidden['tel']) && $this->nmgp_cmp_hidden['tel'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tel']);
       $sStyleHidden_tel = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tel = 'display: none;';
   $sStyleReadInp_tel = '';
   if (isset($this->nmgp_cmp_readonly['tel']) && $this->nmgp_cmp_readonly['tel'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tel']);
       $sStyleReadLab_tel = '';
       $sStyleReadInp_tel = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tel']) && $this->nmgp_cmp_hidden['tel'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="tel" value="<?php echo str_replace('"', "&quot;", $tel) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_tel" style="<?php echo $sStyleHidden_tel; ?>"><span id="id_label_tel"><?php echo $this->nm_new_label['tel']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_tel" style="<?php echo $sStyleHidden_tel; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["tel"]) &&  $this->nmgp_cmp_readonly["tel"] == "on") { 

 ?>
<input type=hidden name="tel" value="<?php echo str_replace('"', "&quot;", $tel) . "\">" . $tel . ""; ?>
<?php } else { ?>
<span id="id_read_on_tel" style="<?php echo $sStyleReadLab_tel; ?>"><?php echo $this->tel; ?></span><span id="id_read_off_tel" style="<?php echo $sStyleReadInp_tel; ?>">
 <input class="scFormObjectOdd" type=text name="tel" value="<?php echo str_replace('"', "&quot;", $tel) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_tel(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Celular")?>', 0, 'naomask', 'lista', 'cxab', 40, '0123456789 ')" size=28 maxlength=40></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_tel_frame"><tr><td class="scErrorMessage"><span id="id_error_display_tel_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obs']))
    {
        $this->nm_new_label['obs'] = 'Observações';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obs = $this->obs;
   $sStyleHidden_obs = '';
   if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obs']);
       $sStyleHidden_obs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obs = 'display: none;';
   $sStyleReadInp_obs = '';
   if (isset($this->nmgp_cmp_readonly['obs']) && $this->nmgp_cmp_readonly['obs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obs']);
       $sStyleReadLab_obs = '';
       $sStyleReadInp_obs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obs']) && $this->nmgp_cmp_hidden['obs'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="obs" value="<?php echo str_replace('"', "&quot;", $obs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_obs" style="<?php echo $sStyleHidden_obs; ?>"><span id="id_label_obs"><?php echo $this->nm_new_label['obs']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_obs" style="<?php echo $sStyleHidden_obs; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["obs"]) &&  $this->nmgp_cmp_readonly["obs"] == "on") { 

 ?>
<input type=hidden name="obs" value="<?php echo str_replace('"', "&quot;", $obs) . "\">" . $obs . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $this->obs; ?></span><span id="id_read_off_obs" style="<?php echo $sStyleReadInp_obs; ?>">
 <input class="scFormObjectOdd" type=text name="obs" value="<?php echo str_replace('"', "&quot;", $obs) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Turmas_validate_obs(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Observações")?>', 0, 'naomask', 'lista', 'cxab', 250, 'TUDO')" size=35 maxlength=250></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_obs_frame"><tr><td class="scErrorMessage"><span id="id_error_display_obs_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<?php
  }
?>
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormTable">
<tr><td class="scFormLabelOdd"><a href="javascript: scAjaxHideDebug()"><img src="<?php echo $this->Ini->path_botoes; ?>/nm_scriptcase3_green_bcancelar.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormDataOdd" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

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
<script>parent.scAjaxDetailStatus("app_Turmas");</script>
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
