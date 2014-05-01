<?php
/**
 * $Id: nm_gp_config_graf.php,v 1.8 2008/01/11 18:10:10 sergio Exp $
 */
    include_once('app_ParticipantePistaCompetencia_session.php');
    session_start();

    $nome_apl  = (isset($_GET['nome_apl']))  ? $_GET['nome_apl']  : "";
    $campo_apl = (isset($_GET['campo_apl'])) ? $_GET['campo_apl'] : "nm_resumo_graf";
    $sc_page   = (isset($_GET['sc_page']))   ? $_GET['sc_page']   : "";
    $language  = (isset($_GET['language']))  ? $_GET['language']  : "port";
    $sint_anal = false;
    if (isset($_POST['bok_graf']) && $_POST['bok_graf'] == "OK" && $_POST['campo_apl'] == "nm_resumo_graf")
    {
       if (isset($_POST['tipo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_tipo']   = $_POST['tipo'];
       }
       if (isset($_POST['largura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_larg']   = $_POST['largura'];
       }
       if (isset($_POST['altura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_alt']    = $_POST['altura'];
       }
       if (isset($_POST['margem']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_margem'] = $_POST['margem'];
       }
       if (isset($_POST['aspecto']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_aspec']  = $_POST['aspecto'];
       }
       if (isset($_POST['cor_fundo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_cor_fundo']  = $_POST['cor_fundo'];
       }
       if (isset($_POST['preencher']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_preencher']  = $_POST['preencher'];
       }
       if (isset($_POST['exibe_val']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_exibe_val']  = $_POST['exibe_val'];
       }
       if (isset($_POST['exibe_marcas']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_exibe_marcas']  = $_POST['exibe_marcas'];
       }
       if (isset($_POST['cor_margens']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_cor_margens']  = $_POST['cor_margens'];
       }
       if (isset($_POST['cor_label']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_cor_label']  = $_POST['cor_label'];
       }
       if (isset($_POST['cor_valores']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_cor_valores']  = $_POST['cor_valores'];
       }
       if (isset($_POST['tipo_marcas']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_tipo_marcas']  = $_POST['tipo_marcas'];
       }
       if (isset($_POST['opc_atual']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_opc_atual']  = $_POST['opc_atual'];
       }
       if (isset($_POST['angulo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] ['graf_angulo']  = $_POST['angulo'];
       }
    }
    elseif (isset($_POST['bok_graf']) && $_POST['bok_graf'] == "OK")
    {
       if (isset($_POST['tipo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_tipo']   = $_POST['tipo'];
       }
       if (isset($_POST['largura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_larg']   = $_POST['largura'];
       }
       if (isset($_POST['altura']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_alt']    = $_POST['altura'];
       }
       if (isset($_POST['margem']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_margem'] = $_POST['margem'];
       }
       if (isset($_POST['aspecto']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_aspec']  = $_POST['aspecto'];
       }
       if (isset($_POST['cor_fundo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_cor_fundo']  = $_POST['cor_fundo'];
       }
       if (isset($_POST['preencher']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_preencher']  = $_POST['preencher'];
       }
       if (isset($_POST['exibe_val']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_exibe_val']  = $_POST['exibe_val'];
       }
       if (isset($_POST['exibe_marcas']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_exibe_marcas']  = $_POST['exibe_marcas'];
       }
       if (isset($_POST['cor_margens']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_cor_margens']  = $_POST['cor_margens'];
       }
       if (isset($_POST['cor_label']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_cor_label']  = $_POST['cor_label'];
       }
       if (isset($_POST['cor_valores']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_cor_valores']  = $_POST['cor_valores'];
       }
       if (isset($_POST['tipo_marcas']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_tipo_marcas']  = $_POST['tipo_marcas'];
       }
       if (isset($_POST['angulo']))
       {
           $_SESSION['sc_session'] [$_POST['sc_page']] [$_POST['nome_apl']] [$_POST['campo_apl']] ['graf_angulo']  = $_POST['angulo'];
       }
    }
    if (isset($_POST['bok_graf']) && $_POST['bok_graf'] == "OK")
    {
?>
       <html>
       <body>
       <script language="javascript">
          window.close();
       </script>
       </body>
       </html>
<?php
       exit;
    }
    elseif ($campo_apl == "nm_resumo_graf")
    {
           $tipo         = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_tipo'];
           $largura      = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_larg'];
           $altura       = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_alt'];
           $margem       = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_margem'];
           $aspecto      = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_aspec'];
           $cor_fundo    = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_cor_fundo'];
           $preencher    = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_preencher'];
           $exibe_val    = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_exibe_val'];
           $exibe_marcas = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_exibe_marcas'];
           $cor_margens  = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_cor_margens'];
           $cor_label    = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_cor_label'];
           $cor_valores  = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_cor_valores'];
           $tipo_marcas  = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_tipo_marcas'];
           $opc_atual    = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_opc_atual'] ;
           $angulo       = $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_angulo'] ;
           if (isset($_SESSION['sc_session'][$sc_page][$nome_apl]['graf_permitidos']))
           {
               $arr_graf_perm = explode(",", $_SESSION['sc_session'][$sc_page][$nome_apl]['graf_permitidos']);
           }
           else
           {
               $arr_graf_perm = array(1,4,2,5,3,8,6,7,20,21,26,27,28,29);
           }
           if ($_SESSION['sc_session'][$sc_page][$nome_apl]['graf_opc_graf'] == 3)
           {
               $sint_anal = true;
           }
    }
    else
    {
           $tipo         = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_tipo'];
           $largura      = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_larg'];
           $altura       = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_alt'];
           $margem       = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_margem'];
           $aspecto      = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_aspec'];
           $cor_fundo    = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_cor_fundo'];
           $preencher    = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_preencher'];
           $exibe_val    = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_exibe_val'];
           $exibe_marcas = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_exibe_marcas'];
           $cor_margens  = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_cor_margens'];
           $cor_label    = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_cor_label'];
           $cor_valores  = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_cor_valores'];
           $tipo_marcas  = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_tipo_marcas'];
           $angulo       = $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_angulo'];
           $opc_atual    = 2;
           if (isset($_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_permitidos']))
           {
               $arr_graf_perm = explode(",", $_SESSION['sc_session'][$sc_page][$nome_apl][$campo_apl]['graf_permitidos']);
           }
           else
           {
               $arr_graf_perm = array(1,4,2,5,3,8,6,7,20,21,26,27,28,29);
           }
    }
    if (empty($largura))
    {
        $largura = 512;
    }
    if (empty($altura))
    {
        $altura = 384;
    }
    if (empty($margem))
    {
        $margem = 10;
    }

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_graf']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_graf'];
    }
    else
    {
        $language = ($language == "pt_br")  ? "port" : $language;
        $language = ($language == "en_us") ? "eng"  : $language;
    }
    $tradutor['port']['titulo']         = "Configuração dos Gráficos";
    $tradutor['port']['tipo_g']         = "Tipo do Gráfico";
    $tradutor['port']['tp_barra']       = "Barra/Vertical";
    $tradutor['port']['tp_bar_horiz']   = "Barra/Horizontal";
    $tradutor['port']['tp_linha']       = "Linha/Vertical";
    $tradutor['port']['tp_lin_horiz']   = "Linha/Horizontal";
    $tradutor['port']['tp_pizza_abs']   = "Pizza/Absoluto";
    $tradutor['port']['tp_pizza_per']   = "Pizza/Porcentagem";
    $tradutor['port']['tp_pizza3d_abs'] = "Pizza 3D/Absoluto";
    $tradutor['port']['tp_pizza3d_per'] = "Pizza 3D/Porcentagem";
    $tradutor['port']['tp_impulse']       = "Impulsos/Vertical";
    $tradutor['port']['tp_impulse_horiz'] = "Impulsos/Horizontal";
    $tradutor['port']['tp_scatter']       = "Disperso/Vertical";
    $tradutor['port']['tp_scatter_horiz'] = "Disperso/Horizontal";
    $tradutor['port']['tp_renda']       = "Renda/Vertical";
    $tradutor['port']['tp_renda_horiz'] = "Renda/Horizontal";
    $tradutor['port']['largura']        = "Largura em Pixels";
    $tradutor['port']['altura']         = "Altura em Pixels";
    $tradutor['port']['margem']         = "Margem em Pixels";
    $tradutor['port']['aspecto']        = "Manter Aspecto";
    $tradutor['port']['preencher']      = "Preencher espaços";
    $tradutor['port']['exibe_val']      = "Exibir valores";
    $tradutor['port']['exibe_marcas']   = "Exibir marcas";
    $tradutor['port']['cor_fundo']      = "Cor de fundo";
    $tradutor['port']['cor_margens']    = "Cor margens";
    $tradutor['port']['cor_label']      = "Cor labels";
    $tradutor['port']['cor_valores']    = "Cor valores";
    $tradutor['port']['tipo_marcas']    = "Tipo marcas";
    $tradutor['port']['quadrado']       = "Quadrado";
    $tradutor['port']['circulo']        = "Circulo";
    $tradutor['port']['trianguloU']     = "Triangulo acima";
    $tradutor['port']['trianguloD']     = "Triangulo abaixo";
    $tradutor['port']['lozangulo']      = "Lozangulo";
    $tradutor['port']['estrela']        = "Estrela";
    $tradutor['port']['modo_gera']      = "Modo geração";
    $tradutor['port']['sintetico']      = "Sintético";
    $tradutor['port']['analitico']      = "Analítico";
    $tradutor['port']['angulo']         = "Angulo dos valores";
    $tradutor['port']['sim']            = "Sim";
    $tradutor['port']['nao']            = "Não";
    $tradutor['port']['cancela']        = "Cancela";

    $tradutor['eng']['titulo']         = "Configuration of the Graphs";
    $tradutor['eng']['tipo_g']         = "Type of the Graphs";
    $tradutor['eng']['tp_barra']       = "Bar/Vertical";
    $tradutor['eng']['tp_bar_horiz']   = "Barra/Horizontal";
    $tradutor['eng']['tp_linha']       = "Line/Vertical";
    $tradutor['eng']['tp_lin_horiz']   = "Line/Horizontal";
    $tradutor['eng']['tp_pizza_abs']   = "Pie/Absolute";
    $tradutor['eng']['tp_pizza_per']   = "Pie/Percentage";
    $tradutor['eng']['tp_pizza3d_abs'] = "Pie 3D/Absolute";
    $tradutor['eng']['tp_pizza3d_per'] = "Pie 3D/Percentage";
    $tradutor['eng']['tp_impulse']       = "Impulse/Vertical";
    $tradutor['eng']['tp_impulse_horiz'] = "Impulse/Horizontal";
    $tradutor['eng']['tp_scatter']       = "Scatter/Vertical";
    $tradutor['eng']['tp_scatter_horiz'] = "Scatter/Horizontal";
    $tradutor['eng']['tp_renda']       = "Render/Vertical";
    $tradutor['eng']['tp_renda_horiz'] = "Render/Horizontal";
    $tradutor['eng']['largura']        = "Width in Pixels";
    $tradutor['eng']['altura']         = "Height in Pixels";
    $tradutor['eng']['margem']         = "Edge in Pixels";
    $tradutor['eng']['aspecto']        = "To keep Aspect";
    $tradutor['eng']['preencher']      = "Fill space";
    $tradutor['eng']['exibe_val']      = "Return values";
    $tradutor['eng']['exibe_marcas']   = "Display marks";
    $tradutor['eng']['cor_fundo']      = "Background color";
    $tradutor['eng']['cor_margens']    = "Color margins";
    $tradutor['eng']['cor_label']      = "Color labels";
    $tradutor['eng']['cor_valores']    = "Color values";
    $tradutor['eng']['tipo_marcas']    = "Type marks";
    $tradutor['eng']['quadrado']       = "Square";
    $tradutor['eng']['circulo']        = "Circle";
    $tradutor['eng']['trianguloU']     = "Triangle above";
    $tradutor['eng']['trianguloD']     = "Triangle below";
    $tradutor['eng']['lozangulo']      = "Lozangulo";
    $tradutor['eng']['estrela']        = "Star";
    $tradutor['eng']['modo_gera']      = "Mode generation";
    $tradutor['eng']['sintetico']      = "Synthetic";
    $tradutor['eng']['analitico']      = "Analytical";
    $tradutor['eng']['angulo']         = "Angle of values";
    $tradutor['eng']['sim']            = "Yes";
    $tradutor['eng']['nao']            = "No";
    $tradutor['eng']['cancela']        = "Cancel";

    $arr_selected[1]  = ($tipo == 1) ? " selected" : "";
    $arr_selected[2]  = ($tipo == 2) ? " selected" : "";
    $arr_selected[3]  = ($tipo == 3) ? " selected" : "";
    $arr_selected[4]  = ($tipo == 4) ? " selected" : "";
    $arr_selected[5]  = ($tipo == 5) ? " selected" : "";
    $arr_selected[6]  = ($tipo == 6) ? " selected" : "";
    $arr_selected[7]  = ($tipo == 7) ? " selected" : "";
    $arr_selected[8]  = ($tipo == 8) ? " selected" : "";
    $arr_selected[20] = ($tipo == 20) ? " selected" : "";
    $arr_selected[21] = ($tipo == 21) ? " selected" : "";
    $arr_selected[26] = ($tipo == 26) ? " selected" : "";
    $arr_selected[27] = ($tipo == 27) ? " selected" : "";
    $arr_selected[28] = ($tipo == 28) ? " selected" : "";
    $arr_selected[29] = ($tipo == 29) ? " selected" : "";
    $arr_tp_graf[1]  = "       <option value=\"1\"" . $arr_selected[1] . ">" . $tradutor[$language]['tp_barra'] . "</option>";
    $arr_tp_graf[2]  = "       <option value=\"2\"" . $arr_selected[2] . ">" . $tradutor[$language]['tp_linha'] . "</option>";
    $arr_tp_graf[3]  = "       <option value=\"3\"" . $arr_selected[3] . ">" . $tradutor[$language]['tp_pizza_abs'] . "</option>";
    $arr_tp_graf[4]  = "       <option value=\"4\"" . $arr_selected[4] . ">" . $tradutor[$language]['tp_bar_horiz'] . "</option>";
    $arr_tp_graf[5]  = "       <option value=\"5\"" . $arr_selected[5] . ">" . $tradutor[$language]['tp_lin_horiz'] . "</option>";
    $arr_tp_graf[6]  = "       <option value=\"6\"" . $arr_selected[6] . ">" . $tradutor[$language]['tp_renda'] . "</option>";
    $arr_tp_graf[7]  = "       <option value=\"7\"" . $arr_selected[7] . ">" . $tradutor[$language]['tp_renda_horiz'] . "</option>";
    $arr_tp_graf[8]  = "       <option value=\"8\"" . $arr_selected[8] . ">" . $tradutor[$language]['tp_pizza_per'] . "</option>";
    $arr_tp_graf[20] = "       <option value=\"20\"" . $arr_selected[20] . ">" . $tradutor[$language]['tp_pizza3d_abs'] . "</option>";
    $arr_tp_graf[21] = "       <option value=\"21\"" . $arr_selected[21] . ">" . $tradutor[$language]['tp_pizza3d_per'] . "</option>";
    $arr_tp_graf[26] = "       <option value=\"26\"" . $arr_selected[26] . ">" . $tradutor[$language]['tp_impulse'] . "</option>";
    $arr_tp_graf[27] = "       <option value=\"27\"" . $arr_selected[27] . ">" . $tradutor[$language]['tp_impulse_horiz'] . "</option>";
    $arr_tp_graf[28] = "       <option value=\"28\"" . $arr_selected[28] . ">" . $tradutor[$language]['tp_scatter'] . "</option>";
    $arr_tp_graf[29] = "       <option value=\"29\"" . $arr_selected[29] . ">" . $tradutor[$language]['tp_scatter_horiz'] . "</option>";
?>
<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset']; ?>" />
</head>
<body bgcolor="<?php echo $_SESSION['scriptcase']['bg_color_popup']; ?>" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0">

<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>

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

<form name="config_graf" method="post">
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


 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['tipo_g']; ?>
   </td>
   <td>
     <select  name="tipo"  size=1 onchange=omite_lin()>
<?php
   foreach ($arr_graf_perm as $cada_sel_tp)
   {
       if (isset($arr_tp_graf[$cada_sel_tp]))
       {
          echo $arr_tp_graf[$cada_sel_tp];
       }
   }
?>
     </select>
   </td>
 </FONT></tr>

 <tr id='lin_opc_atual' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['modo_gera']; ?>
   </td>
   <td>
     <select  name="opc_atual"  size=1>
       <option value="1" <?php if ($opc_atual == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sintetico']; ?></option>
       <option value="2" <?php if ($opc_atual == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['analitico']; ?></option>
     </select>
   </td>
 </FONT></tr>

 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['cor_fundo']; ?>
   </td>
   <td>
     <input type="text" name="cor_fundo" value="<?php echo $cor_fundo; ?>" size=8 maxlength=7>
     <a href="javascript: TCP.popup(document.forms['config_graf'].elements['cor_fundo'], '', '<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.php', 'nm_volta_cor')">
      <img src="<?php echo $_SESSION['sc_session']['path_img'] ?>/color.gif" style="border-width: 0px" /></a>
   </td>
 </FONT></tr>

 <tr id='lin_exibe_val' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['exibe_val']; ?>
   </td>
   <td>
     <select  name="exibe_val"  size=1>
       <option value="S" <?php if ($exibe_val == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N" <?php if ($exibe_val == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </FONT></tr>

 <tr id='lin_angulo' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['angulo']; ?>
   </td>
   <td>
     <input type="text" name="angulo" value="<?php echo $angulo; ?>" size=4 maxlength=2>
   </td>
 </FONT></tr>

 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['largura']; ?>
   </td>
   <td>
     <input type="text" name="largura" value="<?php echo $largura; ?>" size=6 maxlength=4>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['altura']; ?>
   </td>
   <td>
     <input type="text" name="altura" value="<?php echo $altura; ?>" size=6 maxlength=4>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['margem']; ?>
   </td>
   <td>
     <input type="text" name="margem" value="<?php echo $margem; ?>" size=6 maxlength=3>
   </td>
 </FONT></tr>
 <tr <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['aspecto']; ?>
   </td>
   <td>
     <select  name="aspecto"  size=1>
       <option value="S" <?php if ($aspecto == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N" <?php if ($aspecto == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </FONT></tr>

 <tr id='lin_cor_margens' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['cor_margens']; ?>
   </td>
   <td>
     <input type="text" name="cor_margens" value="<?php echo $cor_margens; ?>" size=8 maxlength=7>
     <a href="javascript: TCP.popup(document.forms['config_graf'].elements['cor_margens'], '', '<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.php', 'nm_volta_cor')">
      <img src="<?php echo $_SESSION['sc_session']['path_img'] ?>/color.gif" style="border-width: 0px" /></a>
   </td>
 </FONT></tr>

 <tr id='lin_cor_label' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['cor_label']; ?>
   </td>
   <td>
     <input type="text" name="cor_label" value="<?php echo $cor_label; ?>" size=8 maxlength=7>
     <a href="javascript: TCP.popup(document.forms['config_graf'].elements['cor_label'], '', '<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.php', 'nm_volta_cor')">
      <img src="<?php echo $_SESSION['sc_session']['path_img'] ?>/color.gif" style="border-width: 0px" /></a>
   </td>
 </FONT></tr>

  <tr id='lin_cor_valores' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['cor_valores']; ?>
   </td>
   <td>
     <input type="text" name="cor_valores" value="<?php echo $cor_valores; ?>" size=8 maxlength=7>
     <a href="javascript: TCP.popup(document.forms['config_graf'].elements['cor_valores'], '', '<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.php', 'nm_volta_cor')">
      <img src="<?php echo $_SESSION['sc_session']['path_img'] ?>/color.gif" style="border-width: 0px" /></a>
   </td>
 </FONT></tr>

 <tr id='lin_preencher' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['preencher']; ?>
   </td>
   <td>
     <select  name="preencher"  size=1>
       <option value="S" <?php if ($preencher == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N" <?php if ($preencher == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </FONT></tr>

 <tr id='lin_marcas' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['exibe_marcas']; ?>
   </td>
   <td>
     <select  name="exibe_marcas"  size=1>
       <option value="S" <?php if ($exibe_marcas == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N" <?php if ($exibe_marcas == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </FONT></tr>

 <tr id='lin_tipo_marcas' <?php echo $_SESSION['scriptcase']['bg_linha_popup']; ?>>
   <?php echo $_SESSION['scriptcase']['font_linha_popup']; ?>
   <td>
     <?php echo $tradutor[$language]['tipo_marcas']; ?>
   </td>
   <td>
     <select  name="tipo_marcas"  size=1>
       <option value="Q" <?php if ($tipo_marcas == "Q")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['quadrado']; ?></option>
       <option value="C" <?php if ($tipo_marcas == "C")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['circulo']; ?></option>
       <option value="U" <?php if ($tipo_marcas == "U")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['trianguloU']; ?></option>
       <option value="D" <?php if ($tipo_marcas == "D")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['trianguloD']; ?></option>
       <option value="L" <?php if ($tipo_marcas == "L")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['lozangulo']; ?></option>
       <option value="E" <?php if ($tipo_marcas == "E")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['estrela']; ?></option>
     </select>
   </td>
 </FONT></tr>

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


  <input type="hidden" name="nome_apl"  value="<?php echo $nome_apl; ?>">
  <input type="hidden" name="campo_apl" value="<?php echo $campo_apl; ?>" >
  <input type="hidden" name="sc_page"   value="<?php echo $sc_page; ?>" >
  <input type="hidden" name="bok_graf"  value="" >
</form>
<script language="javascript">
  omite_lin();
<?php
  if (!$sint_anal)
  {
      echo "document.getElementById('lin_opc_atual').style.display = 'none';";
  }
?>
  function nm_volta_cor()
  {
  }
  function omite_lin()
  {
/*
pizza: 3, 8, 20, 21
barra: 1, 4
linha: 2, 5, 6, 7
impulse: 26, 27
scatter: 28, 29
*/
     ind = document.config_graf.tipo.selectedIndex;
     val = document.config_graf.tipo.options[ind].value;
     if (val == 3 || val == 8 || val == 20 || val == 21)
     {
        document.getElementById('lin_cor_margens').style.display = 'none';
        document.getElementById('lin_cor_label').style.display = 'none';
        document.getElementById('lin_cor_valores').style.display = 'none';
        document.getElementById('lin_preencher').style.display = 'none';
        document.getElementById('lin_marcas').style.display = 'none';
        document.getElementById('lin_tipo_marcas').style.display = 'none';
        document.getElementById('lin_exibe_val').style.display = 'none';
        document.getElementById('lin_angulo').style.display = 'none';
     }
     else
     {
        document.getElementById('lin_cor_margens').style.display = '';
        document.getElementById('lin_cor_label').style.display = '';
        document.getElementById('lin_cor_valores').style.display = '';
        document.getElementById('lin_exibe_val').style.display = '';
        document.getElementById('lin_angulo').style.display = '';
        if (val == 1 || val == 4)
        {
           document.getElementById('lin_preencher').style.display = 'none';
           document.getElementById('lin_marcas').style.display = 'none';
           document.getElementById('lin_tipo_marcas').style.display = 'none';
        }
        if (val == 2 || val == 5 || val == 6 || val == 7)
        {
            document.getElementById('lin_preencher').style.display = '';
            document.getElementById('lin_marcas').style.display = '';
            document.getElementById('lin_tipo_marcas').style.display = '';
        }
        if (val == 26 || val == 27)
        {
           document.getElementById('lin_preencher').style.display = 'none';
           document.getElementById('lin_marcas').style.display = 'none';
           document.getElementById('lin_tipo_marcas').style.display = '';
        }
        if (val == 28 || val == 29)
        {
           document.getElementById('lin_preencher').style.display = 'none';
           document.getElementById('lin_marcas').style.display = 'none';
           document.getElementById('lin_tipo_marcas').style.display = '';
        }
     }
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
  }
  function processa()
  {
     document.config_graf.bok_graf.value = "OK";
     config_graf.submit();
  }
</script>
</body>
</html>