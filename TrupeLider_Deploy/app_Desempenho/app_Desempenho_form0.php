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
 <SCRIPT language="javascript" src="app_Desempenho_dynifs.js"></SCRIPT>
 <SCRIPT language="javascript" src="app_Desempenho_calc.js"></SCRIPT>
<?php
include_once("app_Desempenho_sajax_js.php");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe']) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body  class="scFormPage" <?php echo $str_iframe_body; ?>>
<div id="idJSSpecChar" style="display:none;"></div>
<script language="javascript" src="app_Desempenho_digita.js"> 
</script> 
<?php
 include_once("app_Desempenho_js0.php");
?>
<script language="javascript" src="app_Desempenho_tab_erro.js"> 
</script> 
<script language="javascript"> 
 </script>
<form name="F1" method=post 
               action="app_Desempenho.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo $nmgp_num_form; ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe']) ? 0 : "3";
?>
<table align="center" cellpadding=<?php echo $int_iframe_padding; ?> cellspacing=0 border=0 align=center >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['mostra_cab'] != "N"))
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
          <?php echo date('d/m/Y'); ?>
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
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R")
{
?>
    <table border=0  cellpadding=2 cellspacing=0 align=center width="100%">
    <tr align=center><td nowrap class="scToolbar"> 
<?php
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R")
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
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "R") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes == "novo") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") && ($this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F5.submit();return false;" title="Cancelar" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
    if (($opcao_botoes != "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") && (!$this->Embutida_call)) {
?>
       <input type="image" name="sc_b_sai" onclick="document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;" title="Sair da aplica&ccedil;&atilde;o" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
}
if ((!$this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] != "R")
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
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" height="100%">   <tr>


    <TD colspan="2" height="20" class="scBlock">
     <TABLE border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scBlock">Principal</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_desemp']))
    {
        $this->nm_new_label['cod_desemp'] = 'Código';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_desemp = $this->cod_desemp;
   $sStyleHidden_cod_desemp = '';
   if (isset($this->nmgp_cmp_hidden['cod_desemp']) && $this->nmgp_cmp_hidden['cod_desemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_desemp']);
       $sStyleHidden_cod_desemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_desemp = 'display: none;';
   $sStyleReadInp_cod_desemp = '';
   if (isset($this->nmgp_cmp_readonly['cod_desemp']) && $this->nmgp_cmp_readonly['cod_desemp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_desemp']);
       $sStyleReadLab_cod_desemp = '';
       $sStyleReadInp_cod_desemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_desemp']) && $this->nmgp_cmp_hidden['cod_desemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="cod_desemp" value="<?php echo str_replace('"', "&quot;", $cod_desemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_cod_desemp" style="<?php echo $sStyleHidden_cod_desemp; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px"><span class="scFormLabelOddFormat"><span id="id_label_cod_desemp"><?php echo $this->nm_new_label['cod_desemp']; ?></span>*</span><br>
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["cod_desemp"]) &&  $this->nmgp_cmp_readonly["cod_desemp"] == "on") { 

 ?>
<input type=hidden name="cod_desemp" value="<?php echo str_replace('"', "&quot;", $cod_desemp) . "\">" . $cod_desemp . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_desemp" style="<?php echo $sStyleReadLab_cod_desemp; ?>"><?php echo $this->cod_desemp; ?></span><span id="id_read_off_cod_desemp" style="<?php echo $sStyleReadInp_cod_desemp; ?>">
 <input class="scFormObjectOdd" type=text name="cod_desemp" value="<?php echo str_replace('"', "&quot;", $cod_desemp) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_cod_desemp(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Código")?>', 0, 'naomask', 'lista', 'cxab', 30, 'TUDO')" size=21 maxlength=30></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_cod_desemp_frame"><tr><td class="scErrorMessage"><span id="id_error_display_cod_desemp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['id_turma']))
   {
       $this->nm_new_label['id_turma'] = 'Turma';
   }
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
<?php if (isset($this->nmgp_cmp_hidden['id_turma']) && $this->nmgp_cmp_hidden['id_turma'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_turma" value="<?php echo str_replace('"', "&quot;", $this->id_turma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_turma" style="<?php echo $sStyleHidden_id_turma; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px"><span class="scFormLabelOddFormat"><span id="id_label_id_turma"><?php echo $this->nm_new_label['id_turma']; ?></span>*</span><br>
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_turma"]) &&  $this->nmgp_cmp_readonly["id_turma"] == "on") { 
 
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
<input type=hidden name="id_turma" value="<?php echo str_replace('"', "&quot;", $id_turma) . "\">" . $id_turma_look . ""; ?>
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
   echo "<span id=\"id_read_on_id_turma\" style=\"" .  $sStyleReadLab_id_turma . "\">" . $id_turma_look . "</span><span id=\"id_read_off_id_turma\" style=\"" . $sStyleReadInp_id_turma . "\">";
   echo " <span id=\"idAjaxSelect_id_turma\"><select class=\"scFormObjectOdd\" name=\"id_turma\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1>" ; 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_turma_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_turma_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_grupo']))
    {
        $this->nm_new_label['id_grupo'] = 'Grupo';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_grupo = $this->id_grupo;
   $sStyleHidden_id_grupo = '';
   if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_grupo']);
       $sStyleHidden_id_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_grupo = 'display: none;';
   $sStyleReadInp_id_grupo = '';
   if (isset($this->nmgp_cmp_readonly['id_grupo']) && $this->nmgp_cmp_readonly['id_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_grupo']);
       $sStyleReadLab_id_grupo = '';
       $sStyleReadInp_id_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_grupo']) && $this->nmgp_cmp_hidden['id_grupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_grupo" value="<?php echo str_replace('"', "&quot;", $id_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_grupo" style="<?php echo $sStyleHidden_id_grupo; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px"><span class="scFormLabelOddFormat"><span id="id_label_id_grupo"><?php echo $this->nm_new_label['id_grupo']; ?></span>*</span><br>
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_grupo"]) &&  $this->nmgp_cmp_readonly["id_grupo"] == "on") { 

 ?>
<input type=hidden name="id_grupo" value="<?php echo str_replace('"', "&quot;", $id_grupo) . "\">" . $id_grupo . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_grupo'] = $this->id_grupo;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO FROM GRUPOS WHERE ID_GRUPO = " . $this->id_grupo . " ORDER BY ID_GRUPO";
   if ('' != $this->id_grupo)
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
<span id="id_read_on_id_grupo" style="<?php echo $sStyleReadLab_id_grupo; ?>"><?php echo $id_grupo_look; ?></span><span id="id_read_off_id_grupo" style="<?php echo $sStyleReadInp_id_grupo; ?>">
 <input class="scFormObjectOdd" type=text name="id_grupo" value="<?php echo str_replace('"', "&quot;", $id_grupo) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_id_grupo(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Grupo")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_grupo'] = $this->id_grupo;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO FROM GRUPOS WHERE ID_GRUPO = " . $this->id_grupo . " ORDER BY ID_GRUPO";
   if ('' != $this->id_grupo)
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
<input type="text" id="id_ac_id_grupo" name="id_grupo_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_grupo"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_grupo_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_grupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['id_etapa']))
    {
        $this->nm_new_label['id_etapa'] = 'Pista';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_etapa = $this->id_etapa;
   $sStyleHidden_id_etapa = '';
   if (isset($this->nmgp_cmp_hidden['id_etapa']) && $this->nmgp_cmp_hidden['id_etapa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_etapa']);
       $sStyleHidden_id_etapa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_etapa = 'display: none;';
   $sStyleReadInp_id_etapa = '';
   if (isset($this->nmgp_cmp_readonly['id_etapa']) && $this->nmgp_cmp_readonly['id_etapa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_etapa']);
       $sStyleReadLab_id_etapa = '';
       $sStyleReadInp_id_etapa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_etapa']) && $this->nmgp_cmp_hidden['id_etapa'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_etapa" value="<?php echo str_replace('"', "&quot;", $id_etapa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_etapa" style="<?php echo $sStyleHidden_id_etapa; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px"><span class="scFormLabelOddFormat"><span id="id_label_id_etapa"><?php echo $this->nm_new_label['id_etapa']; ?></span>*</span><br>
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_etapa"]) &&  $this->nmgp_cmp_readonly["id_etapa"] == "on") { 

 ?>
<input type=hidden name="id_etapa" value="<?php echo str_replace('"', "&quot;", $id_etapa) . "\">" . $id_etapa . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_etapa'] = $this->id_etapa;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA FROM ETAPAS WHERE ID_ETAPA = " . $this->id_etapa . " ORDER BY ID_ETAPA";
   if ('' != $this->id_etapa)
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
<span id="id_read_on_id_etapa" style="<?php echo $sStyleReadLab_id_etapa; ?>"><?php echo $id_etapa_look; ?></span><span id="id_read_off_id_etapa" style="<?php echo $sStyleReadInp_id_etapa; ?>">
 <input class="scFormObjectOdd" type=text name="id_etapa" value="<?php echo str_replace('"', "&quot;", $id_etapa) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_id_etapa(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Pista")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_etapa'] = $this->id_etapa;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA FROM ETAPAS WHERE ID_ETAPA = " . $this->id_etapa . " ORDER BY ID_ETAPA";
   if ('' != $this->id_etapa)
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
<input type="text" id="id_ac_id_etapa" name="id_etapa_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_etapa"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_etapa_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_etapa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_votante']))
    {
        $this->nm_new_label['id_votante'] = 'Votante';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_votante = $this->id_votante;
   $sStyleHidden_id_votante = '';
   if (isset($this->nmgp_cmp_hidden['id_votante']) && $this->nmgp_cmp_hidden['id_votante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_votante']);
       $sStyleHidden_id_votante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_votante = 'display: none;';
   $sStyleReadInp_id_votante = '';
   if (isset($this->nmgp_cmp_readonly['id_votante']) && $this->nmgp_cmp_readonly['id_votante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_votante']);
       $sStyleReadLab_id_votante = '';
       $sStyleReadInp_id_votante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_votante']) && $this->nmgp_cmp_hidden['id_votante'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_votante" value="<?php echo str_replace('"', "&quot;", $id_votante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_votante" style="<?php echo $sStyleHidden_id_votante; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px"><span class="scFormLabelOddFormat"><span id="id_label_id_votante"><?php echo $this->nm_new_label['id_votante']; ?></span>*</span><br>
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_votante"]) &&  $this->nmgp_cmp_readonly["id_votante"] == "on") { 

 ?>
<input type=hidden name="id_votante" value="<?php echo str_replace('"', "&quot;", $id_votante) . "\">" . $id_votante . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_votante'] = $this->id_votante;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $this->id_votante . " ORDER BY ID_PARTICIPE";
   if ('' != $this->id_votante)
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
<span id="id_read_on_id_votante" style="<?php echo $sStyleReadLab_id_votante; ?>"><?php echo $id_votante_look; ?></span><span id="id_read_off_id_votante" style="<?php echo $sStyleReadInp_id_votante; ?>">
 <input class="scFormObjectOdd" type=text name="id_votante" value="<?php echo str_replace('"', "&quot;", $id_votante) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_id_votante(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Votante")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_votante'] = $this->id_votante;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $this->id_votante . " ORDER BY ID_PARTICIPE";
   if ('' != $this->id_votante)
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
<input type="text" id="id_ac_id_votante" name="id_votante_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_votante"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_votante_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_votante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['id_votado']))
    {
        $this->nm_new_label['id_votado'] = 'Votado';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_votado = $this->id_votado;
   $sStyleHidden_id_votado = '';
   if (isset($this->nmgp_cmp_hidden['id_votado']) && $this->nmgp_cmp_hidden['id_votado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_votado']);
       $sStyleHidden_id_votado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_votado = 'display: none;';
   $sStyleReadInp_id_votado = '';
   if (isset($this->nmgp_cmp_readonly['id_votado']) && $this->nmgp_cmp_readonly['id_votado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_votado']);
       $sStyleReadLab_id_votado = '';
       $sStyleReadInp_id_votado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_votado']) && $this->nmgp_cmp_hidden['id_votado'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_votado" value="<?php echo str_replace('"', "&quot;", $id_votado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_id_votado" style="<?php echo $sStyleHidden_id_votado; ?>"> <table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px"><span class="scFormLabelOddFormat"><span id="id_label_id_votado"><?php echo $this->nm_new_label['id_votado']; ?></span>*</span><br>
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_votado"]) &&  $this->nmgp_cmp_readonly["id_votado"] == "on") { 

 ?>
<input type=hidden name="id_votado" value="<?php echo str_replace('"', "&quot;", $id_votado) . "\">" . $id_votado . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_votado'] = $this->id_votado;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $this->id_votado . " ORDER BY ID_PARTICIPE";
   if ('' != $this->id_votado)
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
<span id="id_read_on_id_votado" style="<?php echo $sStyleReadLab_id_votado; ?>"><?php echo $id_votado_look; ?></span><span id="id_read_off_id_votado" style="<?php echo $sStyleReadInp_id_votado; ?>">
 <input class="scFormObjectOdd" type=text name="id_votado" value="<?php echo str_replace('"', "&quot;", $id_votado) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_id_votado(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Votado")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_votado'] = $this->id_votado;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE ID_PARTICIPE = " . $this->id_votado . " ORDER BY ID_PARTICIPE";
   if ('' != $this->id_votado)
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
<input type="text" id="id_ac_id_votado" name="id_votado_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_votado"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_votado_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_votado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing="" border="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" height="100%">   <tr>


    <TD colspan="4" height="20" class="scBlock" style="text-align: center; vertical-align: top">
     <TABLE border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <TR>
       <TD align="center" valign="top" class="scBlock" style="text-align: center; vertical-align: top">Desempenho</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_competencia']))
    {
        $this->nm_new_label['id_competencia'] = 'Competência';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_competencia = $this->id_competencia;
   $sStyleHidden_id_competencia = '';
   if (isset($this->nmgp_cmp_hidden['id_competencia']) && $this->nmgp_cmp_hidden['id_competencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_competencia']);
       $sStyleHidden_id_competencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_competencia = 'display: none;';
   $sStyleReadInp_id_competencia = '';
   if (isset($this->nmgp_cmp_readonly['id_competencia']) && $this->nmgp_cmp_readonly['id_competencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_competencia']);
       $sStyleReadLab_id_competencia = '';
       $sStyleReadInp_id_competencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_competencia']) && $this->nmgp_cmp_hidden['id_competencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_competencia" value="<?php echo str_replace('"', "&quot;", $id_competencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_competencia" style="<?php echo $sStyleHidden_id_competencia; ?>"><span id="id_label_id_competencia"><?php echo $this->nm_new_label['id_competencia']; ?></span>*</TD>
    <TD class="scFormDataOdd" id="hidden_field_data_id_competencia" style="<?php echo $sStyleHidden_id_competencia; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_competencia"]) &&  $this->nmgp_cmp_readonly["id_competencia"] == "on") { 

 ?>
<input type=hidden name="id_competencia" value="<?php echo str_replace('"', "&quot;", $id_competencia) . "\">" . $id_competencia . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_competencia'] = $this->id_competencia;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_COMPETENCIA, COD_COMPETENCIA FROM COMPETENCIAS WHERE ID_COMPETENCIA = " . $this->id_competencia . " ORDER BY ID_COMPETENCIA";
   if ('' != $this->id_competencia)
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
<span id="id_read_on_id_competencia" style="<?php echo $sStyleReadLab_id_competencia; ?>"><?php echo $id_competencia_look; ?></span><span id="id_read_off_id_competencia" style="<?php echo $sStyleReadInp_id_competencia; ?>">
 <input class="scFormObjectOdd" type=text name="id_competencia" value="<?php echo str_replace('"', "&quot;", $id_competencia) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_id_competencia(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Competência")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_competencia'] = $this->id_competencia;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_COMPETENCIA, COD_COMPETENCIA FROM COMPETENCIAS WHERE ID_COMPETENCIA = " . $this->id_competencia . " ORDER BY ID_COMPETENCIA";
   if ('' != $this->id_competencia)
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
<input type="text" id="id_ac_id_competencia" name="id_competencia_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_competencia"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_competencia_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_competencia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['peso']))
    {
        $this->nm_new_label['peso'] = 'PESO';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $peso = $this->peso;
   $sStyleHidden_peso = '';
   if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['peso']);
       $sStyleHidden_peso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_peso = 'display: none;';
   $sStyleReadInp_peso = '';
   if (isset($this->nmgp_cmp_readonly['peso']) && $this->nmgp_cmp_readonly['peso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['peso']);
       $sStyleReadLab_peso = '';
       $sStyleReadInp_peso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="peso" value="<?php echo str_replace('"', "&quot;", $peso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_peso" style="<?php echo $sStyleHidden_peso; ?>"><span id="id_label_peso"><?php echo $this->nm_new_label['peso']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_peso" style="<?php echo $sStyleHidden_peso; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["peso"]) &&  $this->nmgp_cmp_readonly["peso"] == "on") { 

 ?>
<input type=hidden name="peso" value="<?php echo str_replace('"', "&quot;", $peso) . "\">" . $peso . ""; ?>
<?php } else { ?>
<span id="id_read_on_peso" style="<?php echo $sStyleReadLab_peso; ?>"><?php echo $this->peso; ?></span><span id="id_read_off_peso" style="<?php echo $sStyleReadInp_peso; ?>">
 <input class="scFormObjectOdd" type=text name="peso" value="<?php echo str_replace('"', "&quot;", $peso) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_peso(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("PESO")?>', 0, 'naomask', 'lista', 'cxab', 3, 'TUDO')" size=4 maxlength=3></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_peso_frame"><tr><td class="scErrorMessage"><span id="id_error_display_peso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_habilidade']))
    {
        $this->nm_new_label['id_habilidade'] = 'Habilidade';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_habilidade = $this->id_habilidade;
   $sStyleHidden_id_habilidade = '';
   if (isset($this->nmgp_cmp_hidden['id_habilidade']) && $this->nmgp_cmp_hidden['id_habilidade'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_habilidade']);
       $sStyleHidden_id_habilidade = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_habilidade = 'display: none;';
   $sStyleReadInp_id_habilidade = '';
   if (isset($this->nmgp_cmp_readonly['id_habilidade']) && $this->nmgp_cmp_readonly['id_habilidade'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_habilidade']);
       $sStyleReadLab_id_habilidade = '';
       $sStyleReadInp_id_habilidade = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_habilidade']) && $this->nmgp_cmp_hidden['id_habilidade'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_habilidade" value="<?php echo str_replace('"', "&quot;", $id_habilidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_id_habilidade" style="<?php echo $sStyleHidden_id_habilidade; ?>"><span id="id_label_id_habilidade"><?php echo $this->nm_new_label['id_habilidade']; ?></span>*</TD>
    <TD class="scFormDataOdd" id="hidden_field_data_id_habilidade" style="<?php echo $sStyleHidden_id_habilidade; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["id_habilidade"]) &&  $this->nmgp_cmp_readonly["id_habilidade"] == "on") { 

 ?>
<input type=hidden name="id_habilidade" value="<?php echo str_replace('"', "&quot;", $id_habilidade) . "\">" . $id_habilidade . ""; ?>
<?php } else { ?>

<?php
$aRecData['id_habilidade'] = $this->id_habilidade;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_HABILIDADE, COD_HABILIDADE FROM HABILIDADES WHERE ID_HABILIDADE = " . $this->id_habilidade . " ORDER BY ID_HABILIDADE";
   if ('' != $this->id_habilidade)
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
<span id="id_read_on_id_habilidade" style="<?php echo $sStyleReadLab_id_habilidade; ?>"><?php echo $id_habilidade_look; ?></span><span id="id_read_off_id_habilidade" style="<?php echo $sStyleReadInp_id_habilidade; ?>">
 <input class="scFormObjectOdd" type=text name="id_habilidade" value="<?php echo str_replace('"', "&quot;", $id_habilidade) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_id_habilidade(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("Habilidade")?>', 0, 'naomask', 'lista', 'cxab', 10, 'TUDO')" size=4 maxlength=10 style="display: none">
<?php
$aRecData['id_habilidade'] = $this->id_habilidade;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_HABILIDADE, COD_HABILIDADE FROM HABILIDADES WHERE ID_HABILIDADE = " . $this->id_habilidade . " ORDER BY ID_HABILIDADE";
   if ('' != $this->id_habilidade)
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
<input type="text" id="id_ac_id_habilidade" name="id_habilidade_autocomp" class="scFormObjectOdd" size="30" value="<?php echo $sAutocompValue; ?>"><div class="auto_complete" id="div_ac_id_habilidade"></div></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_id_habilidade_frame"><tr><td class="scErrorMessage"><span id="id_error_display_id_habilidade_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['resultado']))
    {
        $this->nm_new_label['resultado'] = 'RESULTADO';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resultado = $this->resultado;
   $sStyleHidden_resultado = '';
   if (isset($this->nmgp_cmp_hidden['resultado']) && $this->nmgp_cmp_hidden['resultado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resultado']);
       $sStyleHidden_resultado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resultado = 'display: none;';
   $sStyleReadInp_resultado = '';
   if (isset($this->nmgp_cmp_readonly['resultado']) && $this->nmgp_cmp_readonly['resultado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resultado']);
       $sStyleReadLab_resultado = '';
       $sStyleReadInp_resultado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resultado']) && $this->nmgp_cmp_hidden['resultado'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="resultado" value="<?php echo str_replace('"', "&quot;", $resultado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_resultado" style="<?php echo $sStyleHidden_resultado; ?>"><span id="id_label_resultado"><?php echo $this->nm_new_label['resultado']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_resultado" style="<?php echo $sStyleHidden_resultado; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["resultado"]) &&  $this->nmgp_cmp_readonly["resultado"] == "on") { 

 ?>
<input type=hidden name="resultado" value="<?php echo str_replace('"', "&quot;", $resultado) . "\">" . $resultado . ""; ?>
<?php } else { ?>
<span id="id_read_on_resultado" style="<?php echo $sStyleReadLab_resultado; ?>"><?php echo $this->resultado; ?></span><span id="id_read_off_resultado" style="<?php echo $sStyleReadInp_resultado; ?>">
 <input class="scFormObjectOdd" type=text name="resultado" value="<?php echo str_replace('"', "&quot;", $resultado) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_resultado(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("RESULTADO")?>', 0, 'naomask', 'lista', 'cxab', 2, 'TUDO')" size=2 maxlength=2></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_resultado_frame"><tr><td class="scErrorMessage"><span id="id_error_display_resultado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nota']))
    {
        $this->nm_new_label['nota'] = 'NOTA';
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nota = $this->nota;
   $sStyleHidden_nota = '';
   if (isset($this->nmgp_cmp_hidden['nota']) && $this->nmgp_cmp_hidden['nota'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nota']);
       $sStyleHidden_nota = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nota = 'display: none;';
   $sStyleReadInp_nota = '';
   if (isset($this->nmgp_cmp_readonly['nota']) && $this->nmgp_cmp_readonly['nota'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nota']);
       $sStyleReadLab_nota = '';
       $sStyleReadInp_nota = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nota']) && $this->nmgp_cmp_hidden['nota'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="nota" value="<?php echo str_replace('"', "&quot;", $nota) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_nota" style="<?php echo $sStyleHidden_nota; ?>"><span id="id_label_nota"><?php echo $this->nm_new_label['nota']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_nota" style="<?php echo $sStyleHidden_nota; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["nota"]) &&  $this->nmgp_cmp_readonly["nota"] == "on") { 

 ?>
<input type=hidden name="nota" value="<?php echo str_replace('"', "&quot;", $nota) . "\">" . $nota . ""; ?>
<?php } else { ?>
<span id="id_read_on_nota" style="<?php echo $sStyleReadLab_nota; ?>"><?php echo $this->nota; ?></span><span id="id_read_off_nota" style="<?php echo $sStyleReadInp_nota; ?>">
 <input class="scFormObjectOdd" type=text name="nota" value="<?php echo str_replace('"', "&quot;", $nota) ?>"
 onblur="scCssBlur(this); NM_onblur(); do_ajax_app_Desempenho_validate_nota(); return false;" onfocus="scCssFocus(this); NM_onfocus(this.form.name, this.name, '<?php echo htmlentities("NOTA")?>', 0, 'naomask', 'numeroedt' , 2, -0, 99)" size=2>&nbsp;<a href="javascript:TCR.TCRPopup(document.forms['F1'].elements['nota'], 'app_Desempenho_calc.php', '.')"><img src="<?php echo $this->Ini->path_img_global; ?>/calc.gif" align="absmiddle" border="0" /></a></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_nota_frame"><tr><td class="scErrorMessage"><span id="id_error_display_nota_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD style="background-color:#FFFFFF;" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
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
<script type="text/javascript">
  // ---------- Autocomplete id_grupo
  function do_ajax_app_Desempenho_autocomp_id_grupo(var_id_grupo)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenho_autocomp_id_grupo(var_id_grupo, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_grupo_cb);
  } // do_ajax_app_Desempenho_autocomp_id_grupo

  function do_ajax_app_Desempenho_autocomp_id_grupo_cb(sResp)
  {
    oAc_id_grupo.onComplete(sResp);
  } // do_ajax_app_Desempenho_autocomp_id_grupo_cb

  function do_ajax_app_Desempenho_getcod_id_grupo(sValue)
  {
    bOnChange = document.F1.id_grupo.value != sValue;
    document.F1.id_grupo.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Desempenho_validate_id_grupo();
    }
  } // do_ajax_app_Desempenho_getcod_id_grupo

</script>
<script type="text/javascript">
  // ---------- Autocomplete id_votante
  function do_ajax_app_Desempenho_autocomp_id_votante(var_id_votante)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenho_autocomp_id_votante(var_id_votante, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_votante_cb);
  } // do_ajax_app_Desempenho_autocomp_id_votante

  function do_ajax_app_Desempenho_autocomp_id_votante_cb(sResp)
  {
    oAc_id_votante.onComplete(sResp);
  } // do_ajax_app_Desempenho_autocomp_id_votante_cb

  function do_ajax_app_Desempenho_getcod_id_votante(sValue)
  {
    bOnChange = document.F1.id_votante.value != sValue;
    document.F1.id_votante.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Desempenho_validate_id_votante();
    }
  } // do_ajax_app_Desempenho_getcod_id_votante

</script>
<script type="text/javascript">
  // ---------- Autocomplete id_votado
  function do_ajax_app_Desempenho_autocomp_id_votado(var_id_votado)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenho_autocomp_id_votado(var_id_votado, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_votado_cb);
  } // do_ajax_app_Desempenho_autocomp_id_votado

  function do_ajax_app_Desempenho_autocomp_id_votado_cb(sResp)
  {
    oAc_id_votado.onComplete(sResp);
  } // do_ajax_app_Desempenho_autocomp_id_votado_cb

  function do_ajax_app_Desempenho_getcod_id_votado(sValue)
  {
    bOnChange = document.F1.id_votado.value != sValue;
    document.F1.id_votado.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Desempenho_validate_id_votado();
    }
  } // do_ajax_app_Desempenho_getcod_id_votado

</script>
<script type="text/javascript">
  // ---------- Autocomplete id_etapa
  function do_ajax_app_Desempenho_autocomp_id_etapa(var_id_etapa)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenho_autocomp_id_etapa(var_id_etapa, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_etapa_cb);
  } // do_ajax_app_Desempenho_autocomp_id_etapa

  function do_ajax_app_Desempenho_autocomp_id_etapa_cb(sResp)
  {
    oAc_id_etapa.onComplete(sResp);
  } // do_ajax_app_Desempenho_autocomp_id_etapa_cb

  function do_ajax_app_Desempenho_getcod_id_etapa(sValue)
  {
    bOnChange = document.F1.id_etapa.value != sValue;
    document.F1.id_etapa.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Desempenho_validate_id_etapa();
    }
  } // do_ajax_app_Desempenho_getcod_id_etapa

</script>
<script type="text/javascript">
  // ---------- Autocomplete id_competencia
  function do_ajax_app_Desempenho_autocomp_id_competencia(var_id_competencia)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenho_autocomp_id_competencia(var_id_competencia, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_competencia_cb);
  } // do_ajax_app_Desempenho_autocomp_id_competencia

  function do_ajax_app_Desempenho_autocomp_id_competencia_cb(sResp)
  {
    oAc_id_competencia.onComplete(sResp);
  } // do_ajax_app_Desempenho_autocomp_id_competencia_cb

  function do_ajax_app_Desempenho_getcod_id_competencia(sValue)
  {
    bOnChange = document.F1.id_competencia.value != sValue;
    document.F1.id_competencia.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Desempenho_validate_id_competencia();
    }
  } // do_ajax_app_Desempenho_getcod_id_competencia

</script>
<script type="text/javascript">
  // ---------- Autocomplete id_habilidade
  function do_ajax_app_Desempenho_autocomp_id_habilidade(var_id_habilidade)
  {
    var var_script_case_init = scAjaxGetFieldText("script_case_init");
    x_ajax_app_Desempenho_autocomp_id_habilidade(var_id_habilidade, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_habilidade_cb);
  } // do_ajax_app_Desempenho_autocomp_id_habilidade

  function do_ajax_app_Desempenho_autocomp_id_habilidade_cb(sResp)
  {
    oAc_id_habilidade.onComplete(sResp);
  } // do_ajax_app_Desempenho_autocomp_id_habilidade_cb

  function do_ajax_app_Desempenho_getcod_id_habilidade(sValue)
  {
    bOnChange = document.F1.id_habilidade.value != sValue;
    document.F1.id_habilidade.value = sValue;
    if (bOnChange)
    {
      do_ajax_app_Desempenho_validate_id_habilidade();
    }
  } // do_ajax_app_Desempenho_getcod_id_habilidade

</script>
<script type="text/javascript">
  oAc_id_grupo = new Ajax.Autocompleter("id_ac_id_grupo", "div_ac_id_grupo", do_ajax_app_Desempenho_autocomp_id_grupo, do_ajax_app_Desempenho_getcod_id_grupo);
  oAc_id_votante = new Ajax.Autocompleter("id_ac_id_votante", "div_ac_id_votante", do_ajax_app_Desempenho_autocomp_id_votante, do_ajax_app_Desempenho_getcod_id_votante);
  oAc_id_votado = new Ajax.Autocompleter("id_ac_id_votado", "div_ac_id_votado", do_ajax_app_Desempenho_autocomp_id_votado, do_ajax_app_Desempenho_getcod_id_votado);
  oAc_id_etapa = new Ajax.Autocompleter("id_ac_id_etapa", "div_ac_id_etapa", do_ajax_app_Desempenho_autocomp_id_etapa, do_ajax_app_Desempenho_getcod_id_etapa);
  oAc_id_competencia = new Ajax.Autocompleter("id_ac_id_competencia", "div_ac_id_competencia", do_ajax_app_Desempenho_autocomp_id_competencia, do_ajax_app_Desempenho_getcod_id_competencia);
  oAc_id_habilidade = new Ajax.Autocompleter("id_ac_id_habilidade", "div_ac_id_habilidade", do_ajax_app_Desempenho_autocomp_id_habilidade, do_ajax_app_Desempenho_getcod_id_habilidade);
</script>
<script type="text/javascript">
function scACEval_id_grupo(iACNewLine)
{
  eval("function do_ajax_app_Desempenho_autocomp_id_grupo(var_id_grupo) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenho_autocomp_id_grupo(var_id_grupo, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_grupo_cb); } function do_ajax_app_Desempenho_autocomp_id_grupo_cb(sResp) { oAc_id_grupo.onComplete(sResp); } function do_ajax_app_Desempenho_getcod_id_grupo(sValue) { bOnChange = document.F1.id_grupo.value != sValue; document.F1.id_grupo.value = sValue; if (bOnChange) { do_ajax_app_Desempenho_validate_id_grupo(); } } oAc_id_grupo = new Ajax.Autocompleter(\"id_ac_id_grupo\", \"div_ac_id_grupo\", do_ajax_app_Desempenho_autocomp_id_grupo, do_ajax_app_Desempenho_getcod_id_grupo);");
}
</script>
<script type="text/javascript">
function scACEval_id_votante(iACNewLine)
{
  eval("function do_ajax_app_Desempenho_autocomp_id_votante(var_id_votante) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenho_autocomp_id_votante(var_id_votante, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_votante_cb); } function do_ajax_app_Desempenho_autocomp_id_votante_cb(sResp) { oAc_id_votante.onComplete(sResp); } function do_ajax_app_Desempenho_getcod_id_votante(sValue) { bOnChange = document.F1.id_votante.value != sValue; document.F1.id_votante.value = sValue; if (bOnChange) { do_ajax_app_Desempenho_validate_id_votante(); } } oAc_id_votante = new Ajax.Autocompleter(\"id_ac_id_votante\", \"div_ac_id_votante\", do_ajax_app_Desempenho_autocomp_id_votante, do_ajax_app_Desempenho_getcod_id_votante);");
}
</script>
<script type="text/javascript">
function scACEval_id_votado(iACNewLine)
{
  eval("function do_ajax_app_Desempenho_autocomp_id_votado(var_id_votado) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenho_autocomp_id_votado(var_id_votado, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_votado_cb); } function do_ajax_app_Desempenho_autocomp_id_votado_cb(sResp) { oAc_id_votado.onComplete(sResp); } function do_ajax_app_Desempenho_getcod_id_votado(sValue) { bOnChange = document.F1.id_votado.value != sValue; document.F1.id_votado.value = sValue; if (bOnChange) { do_ajax_app_Desempenho_validate_id_votado(); } } oAc_id_votado = new Ajax.Autocompleter(\"id_ac_id_votado\", \"div_ac_id_votado\", do_ajax_app_Desempenho_autocomp_id_votado, do_ajax_app_Desempenho_getcod_id_votado);");
}
</script>
<script type="text/javascript">
function scACEval_id_etapa(iACNewLine)
{
  eval("function do_ajax_app_Desempenho_autocomp_id_etapa(var_id_etapa) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenho_autocomp_id_etapa(var_id_etapa, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_etapa_cb); } function do_ajax_app_Desempenho_autocomp_id_etapa_cb(sResp) { oAc_id_etapa.onComplete(sResp); } function do_ajax_app_Desempenho_getcod_id_etapa(sValue) { bOnChange = document.F1.id_etapa.value != sValue; document.F1.id_etapa.value = sValue; if (bOnChange) { do_ajax_app_Desempenho_validate_id_etapa(); } } oAc_id_etapa = new Ajax.Autocompleter(\"id_ac_id_etapa\", \"div_ac_id_etapa\", do_ajax_app_Desempenho_autocomp_id_etapa, do_ajax_app_Desempenho_getcod_id_etapa);");
}
</script>
<script type="text/javascript">
function scACEval_id_competencia(iACNewLine)
{
  eval("function do_ajax_app_Desempenho_autocomp_id_competencia(var_id_competencia) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenho_autocomp_id_competencia(var_id_competencia, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_competencia_cb); } function do_ajax_app_Desempenho_autocomp_id_competencia_cb(sResp) { oAc_id_competencia.onComplete(sResp); } function do_ajax_app_Desempenho_getcod_id_competencia(sValue) { bOnChange = document.F1.id_competencia.value != sValue; document.F1.id_competencia.value = sValue; if (bOnChange) { do_ajax_app_Desempenho_validate_id_competencia(); } } oAc_id_competencia = new Ajax.Autocompleter(\"id_ac_id_competencia\", \"div_ac_id_competencia\", do_ajax_app_Desempenho_autocomp_id_competencia, do_ajax_app_Desempenho_getcod_id_competencia);");
}
</script>
<script type="text/javascript">
function scACEval_id_habilidade(iACNewLine)
{
  eval("function do_ajax_app_Desempenho_autocomp_id_habilidade(var_id_habilidade) { var var_script_case_init = scAjaxGetFieldText(\"script_case_init\"); x_ajax_app_Desempenho_autocomp_id_habilidade(var_id_habilidade, var_script_case_init, do_ajax_app_Desempenho_autocomp_id_habilidade_cb); } function do_ajax_app_Desempenho_autocomp_id_habilidade_cb(sResp) { oAc_id_habilidade.onComplete(sResp); } function do_ajax_app_Desempenho_getcod_id_habilidade(sValue) { bOnChange = document.F1.id_habilidade.value != sValue; document.F1.id_habilidade.value = sValue; if (bOnChange) { do_ajax_app_Desempenho_validate_id_habilidade(); } } oAc_id_habilidade = new Ajax.Autocompleter(\"id_ac_id_habilidade\", \"div_ac_id_habilidade\", do_ajax_app_Desempenho_autocomp_id_habilidade, do_ajax_app_Desempenho_getcod_id_habilidade);");
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
<script>parent.scAjaxDetailStatus("app_Desempenho");</script>
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
