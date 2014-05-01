<!------------ Geração do Formulário ------------------>

<html>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo ''; } else { echo ''; } ?></TITLE>
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
 <SCRIPT language="javascript" src="app_ControleNotas_dynifs.js"></SCRIPT>
<?php
include_once("app_ControleNotas_sajax_js.php");
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe']) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body  class="scFormPage" <?php echo $str_iframe_body; ?>>
<div id="idJSSpecChar" style="display:none;"></div>
<script language="javascript" src="app_ControleNotas_digita.js"> 
</script> 
<?php
 include_once("app_ControleNotas_js0.php");
?>
<script language="javascript" src="app_ControleNotas_tab_erro.js"> 
</script> 
<script language="javascript"> 
 </script>
<form name="F1" method=post 
               action="app_ControleNotas.php" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_url_saida" value="<?php echo $nmgp_url_saida ?>">
<input type=hidden name="bok" value="OK">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo $nmgp_num_form; ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe']) ? 0 : "3";
?>
<table align="center" cellpadding=<?php echo $int_iframe_padding; ?> cellspacing=0 border=0 align=center >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['mostra_cab'] != "N"))
  {
?>
<tr><td>
   <TABLE width="100%" class="css_fun_cab" cellspacing="0" cellpadding="0">
    <TR align="center" class="css_cabecalho">
     <TD>
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%">
       <TR valign="middle">
        <TD align="left" rowspan="3" class="css_cabecalho">
          <IMG SRC="<?php echo $this->Ini->path_imag_cab ?>/scriptcase__NM__LogoSchema1.gif" BORDER="0"/>
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
          <?php if ($this->nmgp_opcao == "novo") { echo ""; } else { echo ""; } ?>
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
    <table border=0  cellpadding=2 cellspacing=0 align=center width="100%">
    <tr align=center><td nowrap class="scToolbar"> 

<?php
           if ($this->nmgp_botoes['ok'] == "on") {
?>
       <input type="image" name="sub_form" onclick="nm_atualiza('alterar'); return false;" title="Salvar altera&ccedil;&otilde;es" id="sub_formt" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bok.gif" ?>" align="absmiddle"> 
<?php
    }
?>
       
<?php
           if ('' != $this->url_webhelp) {
?>
       <input type="image" name="sc_b_hlp" onclick="window.open('<?php echo $this->url_webhelp; ?>', 'Ajuda', 'resizable, scrollbars'); return false;" title="Ajuda" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bhelp.gif" ?>" align="absmiddle"> 
<?php
    }
?>
       
<?php
           if (($this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1)) {
?>
       <input type="image" name="Bsair" onclick="nm_saida_glo(); return false;" title="Sair da aplica&ccedil;&atilde;o" id="Bsairt" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif" ?>" align="absmiddle"> 
<?php
    }
?>
       
<?php
           if (($this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1)) {
?>
       <input type="image" name="Bsair" onclick="nm_saida_glo(); return false;" title="Voltar para aplica&ccedil;&atilde;o anterior" id="Bsairt" border="0" src="<?php echo $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif" ?>" align="absmiddle"> 
<?php
    }
?>
          </td></tr> 
   </table> 
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
   if (!isset($this->nm_new_label['turma']))
   {
       $this->nm_new_label['turma'] = 'Turma';
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $turma = $this->turma;
   $sStyleHidden_turma = '';
   if (isset($this->nmgp_cmp_hidden['turma']) && $this->nmgp_cmp_hidden['turma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['turma']);
       $sStyleHidden_turma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_turma = 'display: none;';
   $sStyleReadInp_turma = '';
   if (isset($this->nmgp_cmp_readonly['turma']) && $this->nmgp_cmp_readonly['turma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['turma']);
       $sStyleReadLab_turma = '';
       $sStyleReadInp_turma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['turma']) && $this->nmgp_cmp_hidden['turma'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="turma" value="<?php echo str_replace('"', "&quot;", $this->turma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_turma" style="<?php echo $sStyleHidden_turma; ?>"><span id="id_label_turma"><?php echo $this->nm_new_label['turma']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_turma" style="<?php echo $sStyleHidden_turma; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["turma"]) &&  $this->nmgp_cmp_readonly["turma"] == "on") { 
 
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
   $turma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->turma1))
          {
              foreach ($this->turma1 as $tmp_turma)
              {
                  if (trim($tmp_turma) == trim($cadaselect[1])) { $turma_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->turma) == trim($cadaselect[1])) { $turma_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="turma" value="<?php echo str_replace('"', "&quot;", $turma) . "\">" . $turma_look . ""; ?>
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
   $turma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->turma1))
          {
              foreach ($this->turma1 as $tmp_turma)
              {
                  if (trim($tmp_turma) == trim($cadaselect[1])) { $turma_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->turma) == trim($cadaselect[1])) { $turma_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_turma\" style=\"" .  $sStyleReadLab_turma . "\">" . $turma_look . "</span><span id=\"id_read_off_turma\" style=\"" . $sStyleReadInp_turma . "\">";
   echo " <span id=\"idAjaxSelect_turma\"><select class=\"scFormObjectOdd\" name=\"turma\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->turma) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->turma)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_turma_frame"><tr><td class="scErrorMessage"><span id="id_error_display_turma_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['etapa']))
   {
       $this->nm_new_label['etapa'] = 'Etapa';
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $etapa = $this->etapa;
   $sStyleHidden_etapa = '';
   if (isset($this->nmgp_cmp_hidden['etapa']) && $this->nmgp_cmp_hidden['etapa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['etapa']);
       $sStyleHidden_etapa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_etapa = 'display: none;';
   $sStyleReadInp_etapa = '';
   if (isset($this->nmgp_cmp_readonly['etapa']) && $this->nmgp_cmp_readonly['etapa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['etapa']);
       $sStyleReadLab_etapa = '';
       $sStyleReadInp_etapa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['etapa']) && $this->nmgp_cmp_hidden['etapa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="etapa" value="<?php echo str_replace('"', "&quot;", $this->etapa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_etapa" style="<?php echo $sStyleHidden_etapa; ?>"><span id="id_label_etapa"><?php echo $this->nm_new_label['etapa']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_etapa" style="<?php echo $sStyleHidden_etapa; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["etapa"]) &&  $this->nmgp_cmp_readonly["etapa"] == "on") { 
 
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
   $etapa_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->etapa1))
          {
              foreach ($this->etapa1 as $tmp_etapa)
              {
                  if (trim($tmp_etapa) == trim($cadaselect[1])) { $etapa_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->etapa) == trim($cadaselect[1])) { $etapa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="etapa" value="<?php echo str_replace('"', "&quot;", $etapa) . "\">" . $etapa_look . ""; ?>
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
   $etapa_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->etapa1))
          {
              foreach ($this->etapa1 as $tmp_etapa)
              {
                  if (trim($tmp_etapa) == trim($cadaselect[1])) { $etapa_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->etapa) == trim($cadaselect[1])) { $etapa_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_etapa\" style=\"" .  $sStyleReadLab_etapa . "\">" . $etapa_look . "</span><span id=\"id_read_off_etapa\" style=\"" . $sStyleReadInp_etapa . "\">";
   echo " <span id=\"idAjaxSelect_etapa\"><select class=\"scFormObjectOdd\" name=\"etapa\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->etapa) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->etapa)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_etapa_frame"><tr><td class="scErrorMessage"><span id="id_error_display_etapa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['grupo']))
   {
       $this->nm_new_label['grupo'] = 'Grupo';
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grupo = $this->grupo;
   $sStyleHidden_grupo = '';
   if (isset($this->nmgp_cmp_hidden['grupo']) && $this->nmgp_cmp_hidden['grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grupo']);
       $sStyleHidden_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grupo = 'display: none;';
   $sStyleReadInp_grupo = '';
   if (isset($this->nmgp_cmp_readonly['grupo']) && $this->nmgp_cmp_readonly['grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grupo']);
       $sStyleReadLab_grupo = '';
       $sStyleReadInp_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grupo']) && $this->nmgp_cmp_hidden['grupo'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="grupo" value="<?php echo str_replace('"', "&quot;", $this->grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_grupo" style="<?php echo $sStyleHidden_grupo; ?>"><span id="id_label_grupo"><?php echo $this->nm_new_label['grupo']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_grupo" style="<?php echo $sStyleHidden_grupo; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["grupo"]) &&  $this->nmgp_cmp_readonly["grupo"] == "on") { 
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS 
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
   $x = 0; 
   $grupo_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupo1))
          {
              foreach ($this->grupo1 as $tmp_grupo)
              {
                  if (trim($tmp_grupo) == trim($cadaselect[1])) { $grupo_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->grupo) == trim($cadaselect[1])) { $grupo_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="grupo" value="<?php echo str_replace('"', "&quot;", $grupo) . "\">" . $grupo_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS 
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
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $grupo_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->grupo1))
          {
              foreach ($this->grupo1 as $tmp_grupo)
              {
                  if (trim($tmp_grupo) == trim($cadaselect[1])) { $grupo_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->grupo) == trim($cadaselect[1])) { $grupo_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_grupo\" style=\"" .  $sStyleReadLab_grupo . "\">" . $grupo_look . "</span><span id=\"id_read_off_grupo\" style=\"" . $sStyleReadInp_grupo . "\">";
   echo " <span id=\"idAjaxSelect_grupo\"><select class=\"scFormObjectOdd\" name=\"grupo\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->grupo) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->grupo)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_grupo_frame"><tr><td class="scErrorMessage"><span id="id_error_display_grupo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['votante']))
   {
       $this->nm_new_label['votante'] = 'Votante';
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $votante = $this->votante;
   $sStyleHidden_votante = '';
   if (isset($this->nmgp_cmp_hidden['votante']) && $this->nmgp_cmp_hidden['votante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['votante']);
       $sStyleHidden_votante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_votante = 'display: none;';
   $sStyleReadInp_votante = '';
   if (isset($this->nmgp_cmp_readonly['votante']) && $this->nmgp_cmp_readonly['votante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['votante']);
       $sStyleReadLab_votante = '';
       $sStyleReadInp_votante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['votante']) && $this->nmgp_cmp_hidden['votante'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="votante" value="<?php echo str_replace('"', "&quot;", $this->votante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_votante" style="<?php echo $sStyleHidden_votante; ?>"><span id="id_label_votante"><?php echo $this->nm_new_label['votante']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_votante" style="<?php echo $sStyleHidden_votante; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["votante"]) &&  $this->nmgp_cmp_readonly["votante"] == "on") { 
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES 
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
   $x = 0; 
   $votante_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->votante1))
          {
              foreach ($this->votante1 as $tmp_votante)
              {
                  if (trim($tmp_votante) == trim($cadaselect[1])) { $votante_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->votante) == trim($cadaselect[1])) { $votante_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="votante" value="<?php echo str_replace('"', "&quot;", $votante) . "\">" . $votante_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES 
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
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $votante_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->votante1))
          {
              foreach ($this->votante1 as $tmp_votante)
              {
                  if (trim($tmp_votante) == trim($cadaselect[1])) { $votante_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->votante) == trim($cadaselect[1])) { $votante_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_votante\" style=\"" .  $sStyleReadLab_votante . "\">" . $votante_look . "</span><span id=\"id_read_off_votante\" style=\"" . $sStyleReadInp_votante . "\">";
   echo " <span id=\"idAjaxSelect_votante\"><select class=\"scFormObjectOdd\" name=\"votante\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->votante) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->votante)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_votante_frame"><tr><td class="scErrorMessage"><span id="id_error_display_votante_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD style="background-color:#FFFFFF;" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['votado']))
   {
       $this->nm_new_label['votado'] = 'Votado';
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $votado = $this->votado;
   $sStyleHidden_votado = '';
   if (isset($this->nmgp_cmp_hidden['votado']) && $this->nmgp_cmp_hidden['votado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['votado']);
       $sStyleHidden_votado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_votado = 'display: none;';
   $sStyleReadInp_votado = '';
   if (isset($this->nmgp_cmp_readonly['votado']) && $this->nmgp_cmp_readonly['votado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['votado']);
       $sStyleReadLab_votado = '';
       $sStyleReadInp_votado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['votado']) && $this->nmgp_cmp_hidden['votado'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="votado" value="<?php echo str_replace('"', "&quot;", $this->votado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd" id="hidden_field_label_votado" style="<?php echo $sStyleHidden_votado; ?>"><span id="id_label_votado"><?php echo $this->nm_new_label['votado']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_votado" style="<?php echo $sStyleHidden_votado; ?>"><table style="border-width: 0px; border-collapse: collapse"><tr><td  class="scFormDataFontOdd" style="vertical-align: top; padding: 0px">
<?php if ($bTestReadOnly && isset($this->nmgp_cmp_readonly["votado"]) &&  $this->nmgp_cmp_readonly["votado"] == "on") { 
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES 
WHERE ID_GRUPO <> 0
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
   $x = 0; 
   $votado_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->votado1))
          {
              foreach ($this->votado1 as $tmp_votado)
              {
                  if (trim($tmp_votado) == trim($cadaselect[1])) { $votado_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->votado) == trim($cadaselect[1])) { $votado_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="votado" value="<?php echo str_replace('"', "&quot;", $votado) . "\">" . $votado_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES 
WHERE ID_GRUPO <> 0
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
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $votado_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->votado1))
          {
              foreach ($this->votado1 as $tmp_votado)
              {
                  if (trim($tmp_votado) == trim($cadaselect[1])) { $votado_look .= $cadaselect[0] . '<br />'; }
              }
          }
          elseif (trim($this->votado) == trim($cadaselect[1])) { $votado_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_votado\" style=\"" .  $sStyleReadLab_votado . "\">" . $votado_look . "</span><span id=\"id_read_off_votado\" style=\"" . $sStyleReadInp_votado . "\">";
   echo " <span id=\"idAjaxSelect_votado\"><select class=\"scFormObjectOdd\" name=\"votado\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->votado) == trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->votado)) 
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
</td><td style="vertical-align: top; padding: 0px 0px 0px 5px"><table class="scErrorTable" style="display: none; position: absolute" id="id_error_display_votado_frame"><tr><td class="scErrorMessage"><span id="id_error_display_votado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

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
<script>parent.scAjaxDetailStatus("app_ControleNotas");</script>
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
