<!------------ Geração do Formulário ------------------>

<html>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo 'CADASTRO DE GRUPOS'; } else { echo 'CADASTRO DE GRUPOS'; } ?></TITLE>
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
 <SCRIPT language="javascript" src="app_Grupos_dynifs.js"></SCRIPT>
<?php
include_once("app_Grupos_sajax_js.php");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe']) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body  class="scFormPage" <?php echo $str_iframe_body; ?>>
<div id="idJSSpecChar" style="display:none;"></div>
<script language="javascript" src="app_Grupos_digita.js"> 
</script> 
<?php
 include_once("app_Grupos_js0.php");
?>
<script language="javascript" src="app_Grupos_tab_erro.js"> 
</script> 
<script language="javascript"> 
 </script>
<form name="F1" method=post 
               action="app_Grupos.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo $nmgp_num_form; ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe']) ? 0 : "3";
?>
<table align="center" cellpadding=<?php echo $int_iframe_padding; ?> cellspacing=0 border=0 align=center >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['mostra_cab'] != "N"))
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
          <?php if ($this->nmgp_opcao == "novo") { echo "CADASTRO DE GRUPOS"; } else { echo "CADASTRO DE GRUPOS"; } ?>
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
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R")
{
?>
    <table border=0  cellpadding=2 cellspacing=0 align=center width="100%">
    <tr align=center><td nowrap class="scToolbar"> 
<?php
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R")
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
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] == "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") && ($this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.submit();return false;" title="Cancelar" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Grupos']['run_iframe'] != "R")
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
    if (!isset($this->nm_new_label['id_turma']))
    {
        $this->nm_new_label['id_turma'] = 'Turma';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_turma = $this->id_turma;
   $sStyleHidden_id_turma = '';
   if (isset($this->nmgp_cmp_hidden['id_turma']) && $this->nmgp_cmp_hidden['id_turma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_turma']);
       $sStyleHidden_id_turma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_turma = 'display: none;';
   $sStyleReadInp_id_turma = '';
   if (isset($this->nmgp_cmp_readonly['id_turma']) && $this->nmgp_cmp_readonly['id_turma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_turma']);
       $sStyleReadLab_id_turma = '';
       $sStyleReadInp_id_turma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_turma']) && $this->nmgp_cmp_hidden['id_turma'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_turma" value="<?php echo str_replace('"', "&quot;", $id_turma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_turma" style="<?php echo $sStyleHidden_id_turma; ?>"><span id="id_label_id_turma"><?php echo $this->nm_new_label['id_turma']; ?></span>*</TD>
    <TD class="scFormDataOdd" id="hidden_field_data_id_turma" style="<?php echo $sStyleHidden_id_turma; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_turma"]) &&  $this->nmgp_cmp_readonly["id_turma"] == "on") { 

 ?>
<input type=hidden name="id_turma" value="<?php echo str_replace('"', "&quot;", $id_turma) . "\">" . $id_turma . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_turma'] = $this->id_turma;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_TURMA, COD_TURMA FROM TURMAS WHERE ID_TURMA = " . $this->id_turma . " ORDER BY ID_TURMA";
   if ('' != $this->id_turma)
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
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
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
$id_turma_look = (isset($aLookup[0][$this->id_turma])) ? $aLookup[0][$this->id_turma] : $this->id_turma;
?>
<span id="id_read_on_id_turma" style="<?php echo $sStyleReadLab_id_turma; ?>"><?php echo $id_turma_look; ?></span><span id="id_read_off_id_turma" style="<?php echo $sStyleReadInp_id_turma; ?>">
 <input class="scFormObjectOdd" type=text name="id_turma" value="<?php echo str_replace('"', "&quot;", $id_turma) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Grupos_validate_id_turma(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Turma")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_turma'] = $this->id_turma;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_TURMA, COD_TURMA FROM TURMAS WHERE ID_TURMA = " . $this->id_turma . " ORDER BY ID_TURMA";
   if ('' != $this->id_turma)
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
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
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
$sAutocompValue = (isset($aLookup[0][$this->id_turma])) ? $aLookup[0][$this->id_turma] : '';
?>
<input type="text" id="id_ac_id_turma" name="id_turma_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_turma"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_turma_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_turma_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_grupo']))
    {
        $this->nm_new_label['cod_grupo'] = 'Código do Grupo';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_grupo = $this->cod_grupo;
   $sStyleHidden_cod_grupo = '';
   if (isset($this->nmgp_cmp_hidden['cod_grupo']) && $this->nmgp_cmp_hidden['cod_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_grupo']);
       $sStyleHidden_cod_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_grupo = 'display: none;';
   $sStyleReadInp_cod_grupo = '';
   if (isset($this->nmgp_cmp_readonly['cod_grupo']) && $this->nmgp_cmp_readonly['cod_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_grupo']);
       $sStyleReadLab_cod_grupo = '';
       $sStyleReadInp_cod_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_grupo']) && $this->nmgp_cmp_hidden['cod_grupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cod_grupo" value="<?php echo str_replace('"', "&quot;", $cod_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_cod_grupo" style="<?php echo $sStyleHidden_cod_grupo; ?>"><span id="id_label_cod_grupo"><?php echo $this->nm_new_label['cod_grupo']; ?></span>*</TD>
    <TD class="scFormDataOdd" id="hidden_field_data_cod_grupo" style="<?php echo $sStyleHidden_cod_grupo; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["cod_grupo"]) &&  $this->nmgp_cmp_readonly["cod_grupo"] == "on") { 

 ?>
<input type=hidden name="cod_grupo" value="<?php echo str_replace('"', "&quot;", $cod_grupo) . "\">" . $cod_grupo . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_grupo" style="<?php echo $sStyleReadLab_cod_grupo; ?>"><?php echo $this->cod_grupo; ?></span><span id="id_read_off_cod_grupo" style="<?php echo $sStyleReadInp_cod_grupo; ?>">
 <input class="scFormObjectOdd" type=text name="cod_grupo" value="<?php echo str_replace('"', "&quot;", $cod_grupo) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Grupos_validate_cod_grupo(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Código do Grupo")?>', 0, 'naomask', 'lista', 'cxab', 20, 'TUDO')" size=14 maxlength=20></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cod_grupo_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cod_grupo_text"></span></td></tr></table></td></tr></table></TD>
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
        $this->nm_new_label['descricao'] = 'Nome do Grupo';
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
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Grupos_validate_descricao(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Nome do Grupo")?>', 0, 'naomask', 'lista', 'cxab', 120, 'TUDO')" size=35 maxlength=120></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_descricao_frame"><tr><td class="scErrorMessage"><span id="id_error_display_descricao_text"></span></td></tr></table></td></tr></table></TD>
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
<?php
$obs_val = nl2br($obs);

?>

<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["obs"]) &&  $this->nmgp_cmp_readonly["obs"] == "on") { 

 ?>
<input type=hidden name="obs" value="<?php echo str_replace('"', "&quot;", $obs) . "\">" . $obs_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs" style="<?php echo $sStyleReadLab_obs; ?>"><?php echo $obs_val; ?></span><span id="id_read_off_obs" style="<?php echo $sStyleReadInp_obs; ?>">
 <textarea  class="scFormObjectOdd" name="obs" rows=2 cols=35
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Grupos_validate_obs(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Observações")?>', 0, 'naomask', 'lista', 'cxab', 250, 'TUDO')">
<?php echo str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $obs); ?>
</textarea>
</span><?php } ?>
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
<script type="text/javascript">
  // ---------- Autocomplete id_turma
  function do_ajax_app_Grupos_autocomp_id_turma(var_id_turma)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Grupos_autocomp_id_turma(var_id_turma, var_script_case_init, do_ajax_app_Grupos_autocomp_id_turma_cb);
  } // do_ajax_app_Grupos_autocomp_id_turma

  function do_ajax_app_Grupos_autocomp_id_turma_cb(sResp)
  {
    oAc_id_turma.onComplete(sResp);
  } // do_ajax_app_Grupos_autocomp_id_turma_cb

  function do_ajax_app_Grupos_getcod_id_turma(sValue)
  {
    bOnChange = document.F1.id_turma.value != sValue;
    document.F1.id_turma.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Grupos_validate_id_turma();
    }
  } // do_ajax_app_Grupos_getcod_id_turma

</script>
<script type="text/javascript">
  oAc_id_turma = new Ajax.Autocompleter("id_ac_id_turma", "div_ac_id_turma", do_ajax_app_Grupos_autocomp_id_turma, do_ajax_app_Grupos_getcod_id_turma);
</script>
<script type="text/javascript">
function scACEval_id_turma(iACNewLine)
{
  eval("function do_ajax_app_Grupos_autocomp_id_turma(var_id_turma) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Grupos_autocomp_id_turma(var_id_turma, var_script_case_init, do_ajax_app_Grupos_autocomp_id_turma_cb); } function do_ajax_app_Grupos_autocomp_id_turma_cb(sResp) { oAc_id_turma.onComplete(sResp); } function do_ajax_app_Grupos_getcod_id_turma(sValue) { bOnChange = document.F1.id_turma.value != sValue; document.F1.id_turma.value = sValue; if (bOnChange) { do_ajax_app_Grupos_validate_id_turma(); } } oAc_id_turma = new Ajax.Autocompleter(\"id_ac_id_turma\", \"div_ac_id_turma\", do_ajax_app_Grupos_autocomp_id_turma, do_ajax_app_Grupos_getcod_id_turma);");
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
<script>parent.scAjaxDetailStatus("app_Grupos");</script>
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
