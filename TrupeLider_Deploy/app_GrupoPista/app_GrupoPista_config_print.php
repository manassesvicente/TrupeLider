<?php
/**
 * $Id: nm_gp_config_print.php,v 1.1.1.1 2007/05/11 19:45:26 diogo Exp $
 */
    include_once('app_GrupoPista_session.php');
    session_start();

    $opc        = (isset($_GET['nm_opc']))     ? $_GET['nm_opc'] : "AM";
    $cor        = (isset($_GET['nm_cor']))     ? $_GET['nm_cor'] : "AM";
    $language   = (isset($_GET['language']))   ? $_GET['language'] : "port";

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_prt']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_prt'];
    }
    else
    {
        $language = ($language == "pt_br")  ? "port" : $language;
        $language = ($language == "en_us") ? "eng"  : $language;
    }

    $tradutor['port']['titulo']  = "Configuração da Impressão";
    $tradutor['port']['modoimp'] = "Imprimir: ";
    $tradutor['port']['curr']    = "Página Corrente";
    $tradutor['port']['total']   = "Relatório Completo";
    $tradutor['port']['cor'   ]  = "Tipo Cor: ";
    $tradutor['port']['pb']      = "Preto e Branco";
    $tradutor['port']['color']   = "Colorido";
    $tradutor['port']['cancela'] = "Cancela";

    $tradutor['eng']['titulo']   = "Configuration of the Impression ";
    $tradutor['eng']['modoimp']  = "To Print";
    $tradutor['eng']['curr']     = "Current Page";
    $tradutor['eng']['total']    = "Complete Report ";
    $tradutor['eng']['cor'   ]   = "Type Color";
    $tradutor['eng']['pb']       = "Black and White";
    $tradutor['eng']['color']    = "Full Color";
    $tradutor['eng']['cancela']  = "Cancel";
?>
<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset']; ?>" />
</head>
<body bgcolor="<?php echo $_SESSION['scriptcase']['bg_color_popup']; ?>" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0">

<?php
$_SESSION['scriptcase']['bg_linha_popup']   = $_SESSION['scriptcase']['bg_linhaI_popup'];
$_SESSION['scriptcase']['font_linha_popup'] = $_SESSION['scriptcase']['font_linhaI_popup'];

if (!empty($_SESSION['scriptcase']['bg_cssbtn_popup']))
{
?>
 <style type="text/css">
  <?php echo $_SESSION['scriptcase']['bg_cssbtn_popup']?>
 </style>

<?php
}
?>

<form name="config_prt" method="post">
<table id="main_table" width="100%">
 <tr>
   <td align="center" colspan=2>
      <table <?php echo $_SESSION['scriptcase']['bg_cab_popup'] . $_SESSION['scriptcase']['bg_img_popup']; ?> width="100%">
       <tr><td align="center">
       <?php echo $_SESSION['scriptcase']['bg_txtcab_popup']; ?>
         <b><?php echo $tradutor[$language]['titulo']; ?></b>
         </FONT>
       </td></tr>
      </table>
   </td>
 </tr>

 <tr><td>
 <table width="100%" cellspacing="1" cellpadding="2" align="center"  <?php echo $_SESSION['scriptcase']['bg_cab_popup'] ?>>
<?php
if ($opc == "AM")
{
?>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td  align="left">
       <?php echo $tradutor[$language]['modoimp']; ?>
   </td>
   <td align="left">
      <input type=radio name="opc" value="PC" checked><?php echo $tradutor[$language]['curr']; ?>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>&nbsp;</td>
   <td align="left">
      <input type=radio name="opc" value="RC"><?php echo $tradutor[$language]['total']; ?>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td align="center" colspan=2>&nbsp;</td>
 </FONT></tr>
<?php
}
if ($cor == "AM")
{
?>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td  align="left">
       <?php echo $tradutor[$language]['cor']; ?>
   </td>
   <td align="left">
     <input type=radio name="cor" value="PB" checked><?php echo $tradutor[$language]['pb']; ?>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>&nbsp;</td>
   <td align="left">
     <input type=radio name="cor" value="CO"><?php echo $tradutor[$language]['color']; ?>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td align="center" colspan=2>&nbsp;</td>
 </FONT></tr>
<?php
}
?>
</table></td></tr>
 <tr bgcolor="<?php echo $_SESSION['scriptcase']['bg_barra_popup']; ?>">
   <td align="center" colspan=2>
<?php
if (!empty($_SESSION['scriptcase']['bg_cssbtn_popup']))
{
?>
     <input class="css_botoes" type="button" name="config" value="OK" onclick="processa()">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input class="css_botoes" type="button" name="cancel" value="<?php echo $tradutor[$language]['cancela']; ?>" onclick="window.close()">
<?php
}
else
{
?>
     <input type="image" name="config" onclick="processa()"  border="0" src="<?php echo $_SESSION['scriptcase']['bg_btn_popup'] ?>_bok.gif" align="absmiddle">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="image" name="cancel" onclick="window.close()" border="0" src="<?php echo $_SESSION['scriptcase']['bg_btn_popup'] ?>_bsair.gif" align="absmiddle">
<?php
}
?>
   </td>
 </tr>
</table>
</form>


<script language="javascript">
  W = document.getElementById('main_table').clientWidth + 12;
  H = document.getElementById('main_table').clientHeight + 40;
  if (navigator.appName == "Netscape")
  {
      H += 15;
  }
  if (navigator.appName.substr(0,9) == "Microsoft")
  {
      H += 40;
  }
  window.resizeTo(W, H);
  function processa()
  {
     var opc = "<?php echo $opc;?>";
     var cor = "<?php echo $cor;?>";
     window.close();
<?php
if ($opc == "AM")
{
?>
     opc = (document.config_prt.opc[0].checked) ? "PC" : "RC";
<?php
}
if ($cor == "AM")
{
?>
     cor = (document.config_prt.cor[0].checked) ? "PB" : "CO";
<?php
}
?>
     opener.nm_gp_print_conf(opc, cor);return false;
  }
</script>
</body>
</html>