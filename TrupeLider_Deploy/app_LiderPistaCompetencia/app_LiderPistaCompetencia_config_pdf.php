<?php
/**
 * $Id: nm_gp_config_pdf.php,v 1.3 2007/08/28 12:30:16 sergio Exp $
 */
    include_once('app_LiderPistaCompetencia_session.php');
    session_start();

    $opc        = (isset($_GET['nm_opc']))     ? $_GET['nm_opc'] : "";
    $target     = (isset($_GET['nm_target']))  ? $_GET['nm_target'] : "";
    $cor        = (isset($_GET['nm_cor']))     ? $_GET['nm_cor'] : "";
    $papel      = (isset($_GET['papel']))      ? $_GET['papel'] : "";
    $orientacao = (isset($_GET['orientacao'])) ? $_GET['orientacao'] : "";
    $bookmarks  = (isset($_GET['bookmarks']))  ? $_GET['bookmarks'] : "";
    $largura    = (isset($_GET['largura']))    ? $_GET['largura'] : "";
    $conf_larg  = (isset($_GET['conf_larg']))  ? $_GET['conf_larg'] : "N";
    $fonte      = (isset($_GET['conf_fonte'])) ? $_GET['conf_fonte'] : "0";
    $grafico    = (isset($_GET['grafico']))    ? $_GET['grafico'] : "";
    $language   = (isset($_GET['language']))   ? $_GET['language'] : "port";
    $conf_socor = (isset($_GET['conf_socor'])) ? $_GET['conf_socor'] : "N";
    $apapel     = (isset($_GET['apapel']))     ? $_GET['apapel'] : "";
    $lpapel     = (isset($_GET['lpapel']))     ? $_GET['lpapel'] : "";

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_pdf']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_pdf'];
    }
    else
    {
        $language = ($language == "pt_br") ? "port" : $language;
        $language = ($language == "en_us") ? "eng"  : $language;

        $tradutor['port']['titulo']  = "Configuração do PDF";
        $tradutor['port']['tp_imp']  = "Tipo da impressão";
        $tradutor['port']['color']   = "Colorida";
        $tradutor['port']['econm']   = "Economica";
        $tradutor['port']['tp_pap']  = "Tipo do papel";
        $tradutor['port']['carta']   = "Carta";
        $tradutor['port']['oficio']  = "Oficio";
        $tradutor['port']['orient']  = "Orientação";
        $tradutor['port']['retrato'] = "Retrato";
        $tradutor['port']['paisag']  = "Paisagem";
        $tradutor['port']['book']    = "Gerar Book Marks";
        $tradutor['port']['grafico'] = "Exibir Gráficos";
        $tradutor['port']['largura'] = "Resolução da página em Pixels";
        $tradutor['port']['fonte']   = "Resolução da fonte";
        $tradutor['port']['sim']     = "Sim";
        $tradutor['port']['nao']     = "Não";
        $tradutor['port']['cancela'] = "Cancela";

        $tradutor['eng']['titulo']   = "Configuration of the PDF";
        $tradutor['eng']['tp_imp']   = "Type of the impression";
        $tradutor['eng']['color']    = "Colored";
        $tradutor['eng']['econm']    = "Economic";
        $tradutor['eng']['tp_pap']   = "Type of the paper";
        $tradutor['eng']['carta']    = "Letter";
        $tradutor['eng']['oficio']   = "Legal";
        $tradutor['eng']['orient']   = "Orientation";
        $tradutor['eng']['retrato']  = "Portrait";
        $tradutor['eng']['paisag']   = "Landscape";
        $tradutor['eng']['book']     = "To generate Book Marks";
        $tradutor['eng']['grafico']  = "To show Graphs";
        $tradutor['eng']['largura']  = "Resolution of the page in Pixels";
        $tradutor['eng']['fonte']    = "Font Size";
        $tradutor['eng']['sim']      = "Yes";
        $tradutor['eng']['nao']      = "No";
        $tradutor['eng']['cancela']  = "Cancel";
    }
    $tp_papel[1]  = "letter";
    $tp_papel[2]  = "legal";
    $tp_papel[3]  = "17x11in";
    $tp_papel[4]  = "33x46.5in";
    $tp_papel[5]  = "23.5x33in";
    $tp_papel[6]  = "16.5x23.5in";
    $tp_papel[7]  = "a3";
    $tp_papel[8]  = "a4";
    $tp_papel[9]  = "5.8x8.2in";
    $tp_papel[10] = "4.1x5.8in";
    $tp_papel[11] = "7x9.8in";
    $tp_papel[12] = "11x17in";
    $tp_papel[13] = "tabloid";
    $tp_papel[14] = "universal";
    $tp_papel[15] = "custom";

?>
<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset']; ?>" />
</head>
<body bgcolor="<?php echo $_SESSION['scriptcase']['bg_color_popup']; ?>" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0">
<?php
$_SESSION['scriptcase']['bg_linhaP_popup']   = $_SESSION['scriptcase']['bg_linhaI_popup'];
$_SESSION['scriptcase']['font_linhaP_popup'] = $_SESSION['scriptcase']['font_linhaI_popup'];

if (!empty($_SESSION['scriptcase']['bg_cssbtn_popup']))
{
?>
 <style type="text/css">
  <?php echo $_SESSION['scriptcase']['bg_cssbtn_popup']?>
 </style>

<?php
}
?>

<form name="config_pdf" method="post">
<table id="main_table" width="100%">
 <tr>
   <td colspan=1>
     <table align="center" <?php echo $_SESSION['scriptcase']['bg_cab_popup'] . $_SESSION['scriptcase']['bg_img_popup']; ?> width="100%">
       <tr>
         <td align="middle" nowrap="nowrap">
           <?php echo $_SESSION['scriptcase']['bg_txtcab_popup']; ?>
           <b><?php echo $tradutor[$language]['titulo']; ?></b>
           </FONT>
         </td>
       </tr>
     </table>
   </td>
 </tr>

 <tr><td>
 <table width="100%" cellspacing="1" cellpadding="2" align="center" <?php echo $_SESSION['scriptcase']['bg_cab_popup'] ?>>
 <tr>
   <?php echo $_SESSION['scriptcase']['font_linhaI_popup']; ?>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaI_popup']; ?>>
     <?php echo $tradutor[$language]['tp_imp']; ?>
   </td>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaI_popup']; ?>>
     <select  name="cor_imp"  size=1>
       <option value="cor"      <?php if ($cor == "cor")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['color']; ?></option>
       <option value="pb"       <?php if ($cor == "pb")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['econm']; ?></option>
     </select>
   </td>
 </FONT></tr>
<?php
if ($conf_socor == "N")
{
?>
 <tr>
   <?php echo $_SESSION['scriptcase']['font_linhaP_popup']; ?>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaP_popup']; ?>>
     <?php echo $tradutor[$language]['tp_pap']; ?>
   </td>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaP_popup']; ?>>
     <select  name="papel" size=1 onchange=custom_paper()>
       <option value="letter"      <?php if ($papel == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['carta']; ?></option>
       <option value="legal"       <?php if ($papel == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['oficio']; ?></option>
       <option value="17x11in"     <?php if ($papel == "3")  { echo " selected" ;} ?>>Ledger</option>
       <option value="33x46.5in"   <?php if ($papel == "4")  { echo " selected" ;} ?>>A0</option>
       <option value="23.5x33in"   <?php if ($papel == "5")  { echo " selected" ;} ?>>A1</option>
       <option value="16.5x23.5in" <?php if ($papel == "6")  { echo " selected" ;} ?>>A2</option>
       <option value="a3"          <?php if ($papel == "7")  { echo " selected" ;} ?>>A3</option>
       <option value="a4"          <?php if ($papel == "8")  { echo " selected" ;} ?>>A4</option>
       <option value="5.8x8.2in"   <?php if ($papel == "9")  { echo " selected" ;} ?>>A5</option>
       <option value="4.1x5.8in"   <?php if ($papel == "10") { echo " selected" ;} ?>>A6</option>
       <option value="7x9.8in"     <?php if ($papel == "11") { echo " selected" ;} ?>>B5</option>
       <option value="11x17in"     <?php if ($papel == "12") { echo " selected" ;} ?>>11'x17</option>
       <option value="tabloid"     <?php if ($papel == "13") { echo " selected" ;} ?>>Tabloide</option>
       <option value="universal"   <?php if ($papel == "14") { echo " selected" ;} ?>>Universal</option>
       <option value="custom"      <?php if ($papel == "15") { echo " selected" ;} ?>><?php echo $tradutor[$language]['customiz']; ?></option>
     </select>
   </td>
 </FONT></tr>
 <tr id='customiz_papel' style='display: none'>
   <?php echo $_SESSION['scriptcase']['font_linhaP_popup']; ?>
   <td align=right <?php echo $_SESSION['scriptcase']['bg_linhaP_popup']; ?>>
    <font size="1">
     <?php echo $tradutor[$language]['alt_papel'] . " x " . $tradutor[$language]['larg_papel']; ?>
    </font>
   </td>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaP_popup']; ?>>
     <input type=text name="alt_papel"  size=2 maxlength=4 value="<?php echo $apapel; ?>">&nbsp;x&nbsp;
     <input type=text name="larg_papel" size=2 maxlength=4 value="<?php echo $lpapel; ?>">&nbsp;mm
   </td>
 </FONT></tr>
<?php
}
if ($conf_socor == "N")
{
?>
 <tr>
   <?php echo $_SESSION['scriptcase']['font_linhaI_popup']; ?>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaI_popup']; ?>>
     <?php echo $tradutor[$language]['orient']; ?>
   </td>
   <td <?php echo $_SESSION['scriptcase']['bg_linhaI_popup']; ?>>
     <select  name="orientacao"  size=1>
       <option value="portrait" <?php if ($orientacao == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['retrato']; ?></option>
       <option value="landscape"<?php if ($orientacao == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['paisag']; ?></option>
     </select>
   </td>
 </FONT></tr>
<?php
}
 $lin_atual = "par";
 $bg_linha   = $_SESSION['scriptcase']['bg_linhaP_popup'];
 $font_linha = $_SESSION['scriptcase']['font_linhaP_popup'];
 if ($bookmarks != "XX" && $conf_socor == "N")
 {
?>
 <tr>
   <?php
      echo $font_linha;
   ?>
   <td <?php echo $bg_linha; ?>>
     <?php echo $tradutor[$language]['book']; ?>
   </td>
   <td <?php echo $bg_linha; ?>>
     <select  name="bookmarks"  size=1>
       <option value="1"<?php if ($bookmarks == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="2"<?php if ($bookmarks == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </FONT></tr>
<?php
      $lin_atual  = ($lin_atual == "par") ? "impar" : "par";
      $bg_linha   = ($lin_atual == "par") ? $_SESSION['scriptcase']['bg_linhaP_popup']   : $_SESSION['scriptcase']['bg_linhaI_popup'];
      $font_linha = ($lin_atual == "par") ? $_SESSION['scriptcase']['font_linhaP_popup'] : $_SESSION['scriptcase']['font_linhaI_popup'];
 }
 if ($grafico != "XX" && $conf_socor == "N")
 {
?>
 <tr>
   <?php
      echo $font_linha;
   ?>
   <td <?php echo $bg_linha; ?>>
     <?php echo $tradutor[$language]['grafico']; ?>
   </td>
   <td <?php echo $bg_linha; ?>>
     <select  name="grafico"  size=1>
       <option value="S"<?php if ($grafico == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N"<?php if ($grafico == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </FONT></tr>
<?php
      $lin_atual  = ($lin_atual == "par") ? "impar" : "par";
      $bg_linha   = ($lin_atual == "par") ? $_SESSION['scriptcase']['bg_linhaP_popup']   : $_SESSION['scriptcase']['bg_linhaI_popup'];
      $font_linha = ($lin_atual == "par") ? $_SESSION['scriptcase']['font_linhaP_popup'] : $_SESSION['scriptcase']['font_linhaI_popup'];
 }
if ($conf_larg == "S" && $conf_socor == "N")
{
?>
 <tr>
   <?php
      echo $font_linha;
   ?>
   <td <?php echo $bg_linha; ?>>
     <?php echo $tradutor[$language]['largura']; ?>
   </td>
   <td <?php echo $bg_linha; ?>>
     <input type="text" name="largura" value="<?php echo $largura; ?>" size=6 maxlength=4>
   </td>
 </FONT></tr>
   <?php
      $lin_atual  = ($lin_atual == "par") ? "impar" : "par";
      $bg_linha   = ($lin_atual == "par") ? $_SESSION['scriptcase']['bg_linhaP_popup']   : $_SESSION['scriptcase']['bg_linhaI_popup'];
      $font_linha = ($lin_atual == "par") ? $_SESSION['scriptcase']['font_linhaP_popup'] : $_SESSION['scriptcase']['font_linhaI_popup'];
   ?>

 <tr>
   <?php
      echo $font_linha;
   ?>
   <td <?php echo $bg_linha; ?>>
     <?php echo $tradutor[$language]['fonte']; ?>
   </td>
   <td <?php echo $bg_linha; ?>>
     <input type="text" name="fonte" value="<?php echo $fonte; ?>" size=3 maxlength=2>
   </td>
 </FONT></tr>
<?php
      $lin_atual  = ($lin_atual == "par") ? "impar" : "par";
      $bg_linha   = ($lin_atual == "par") ? $_SESSION['scriptcase']['bg_linhaP_popup']   : $_SESSION['scriptcase']['bg_linhaI_popup'];
      $font_linha = ($lin_atual == "par") ? $_SESSION['scriptcase']['font_linhaP_popup'] : $_SESSION['scriptcase']['font_linhaI_popup'];
 }
?>
</table></td></tr>
 <tr bgcolor="<?php echo $_SESSION['scriptcase']['bg_barra_popup']; ?>">
   <td colspan=1 align="middle">
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
<?php
if ($bookmarks == "XX" || $conf_socor == "S")
{
    $book = $bookmarks;
    if ($bookmarks == "XX")
    {
        $book = 2;
    }
?>
    <input type="hidden" name="bookmarks" value="<?php echo $book; ?>">
<?php
}
if ($conf_larg != "S" || $conf_socor == "S")
{
?>
    <input type="hidden" name="largura" value="<?php echo $largura; ?>">
    <input type="hidden" name="fonte" value="<?php echo $fonte; ?>">
<?php
}
if ($grafico == "XX" || $conf_socor == "S")
{
    $graf = $grafico;
    if ($grafico == "XX")
    {
        $graf = 2;
    }
?>
    <input type="hidden" name="grafico" value="<?php echo $graf; ?>">
<?php
}
if ($conf_socor == "S")
{
    $orient = ($orientacao == "1") ? "portrait" : "landscape";
    $dim_papel = $tp_papel[$papel];
    if ($papel == 15)
    {
        $dim_papel = $lpapel . "x" . $apapel . "cm";
    }
?>
    <input type="hidden" name="papel" value="<?php echo $dim_papel; ?>">
    <input type="hidden" name="orientacao" value="<?php echo $orient; ?>">
<?php
}

?>
</form>
<script language="javascript">
  custom_paper();
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
     window.close();
     ind   = document.config_pdf.cor_imp.selectedIndex;
     cor   = document.config_pdf.cor_imp.options[ind].value;
<?php
 if ($conf_socor == "N")
 {
?>
     ind        = document.config_pdf.papel.selectedIndex;
     papel      = document.config_pdf.papel.options[ind].value;
     larg_papel = document.config_pdf.larg_papel.value;
     alt_papel  = document.config_pdf.alt_papel.value;
     ind        = document.config_pdf.orientacao.selectedIndex;
     orientacao = document.config_pdf.orientacao.options[ind].value;
<?php
 }
 else
 {
?>
     papel      = document.config_pdf.papel.value;
     orientacao = document.config_pdf.orientacao.value;
<?php
 }
 if ($bookmarks != "XX" && $conf_socor == "N")
 {
?>
     ind   = document.config_pdf.bookmarks.selectedIndex;
     bookmarks = document.config_pdf.bookmarks.options[ind].value;
<?php
 }
 else
 {
?>
     bookmarks  = document.config_pdf.bookmarks.value;
<?php
 }
 if ($grafico != "XX" && $conf_socor == "N")
 {
?>
     ind   = document.config_pdf.grafico.selectedIndex;
     grafico = document.config_pdf.grafico.options[ind].value;
<?php
 }
 else
 {
?>
     grafico    = document.config_pdf.grafico.value;
<?php
}
?>
     largura    = document.config_pdf.largura.value;
     fonte      = document.config_pdf.fonte.value;
     parms_pdf  = ' -t pdf14 --book --tocomitted --no-title --quiet --header ... --footer ../';
     parms_pdf += ' --' + orientacao;
     if (papel != 'custom')
     {
         parms_pdf += ' --size ' + papel;
     }
     else
     {
         parms_pdf += ' --size ' + larg_papel + 'x' + alt_papel + 'mm';
     }
     if (largura > 0)
     {
         parms_pdf += ' --browserwidth ' + largura;
     }
     if (fonte > 0)
     {
         parms_pdf += ' --fontsize ' + fonte;
     }
     if (bookmarks == 2)
     {
         parms_pdf += ' --no-outline';
     }
     opener.nm_gp_move('<?php echo $opc; ?>', '<?php echo $target; ?>', cor, parms_pdf, grafico);return false;
  }
  function custom_paper()
  {
     ind   = document.config_pdf.papel.selectedIndex;
     papel = document.config_pdf.papel.options[ind].value;
     if (papel != 'custom')
     {
         document.all.customiz_papel.style.display = 'none';
     }
     else
     {
         document.all.customiz_papel.style.display = '';
     }
  }
</script>
</body>
</html>