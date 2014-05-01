<?php
   session_start();
   
   if (isset($_POST['script_case_init']))
   {
       $sc_init  = $_POST['script_case_init'];
       $path_img = $_POST['path_img'];
       $path_btn = $_POST['path_btn'];
   }
   elseif (isset($_GET['script_case_init']))
   {
       $sc_init  = $_GET['script_case_init'];
       $path_img = $_GET['path_img'];
       $path_btn = $_GET['path_btn'];
   }
   
   $tab_ger_campos = array();
   $tab_ger_campos['lider'] = "on";
   $tab_ger_campos['nota_media'] = "on";
   $tab_ger_campos['resultado_medio'] = "on";
   $tab_ger_campos['total_nota'] = "on";
   $tab_ger_campos['total_resultado'] = "on";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $tab_ger_campos[$NM_cada_field] = $NM_cada_opc;
       }
   }
   
   if (isset($_POST['fsel_ok']) && $_POST['fsel_ok'] == "OK" && !empty($_POST['campos_sel']))
   {
       Sel_processa_out($_POST['campos_sel']);
   }
   else
   {
       Sel_processa_form();
   }
   exit;
   
function Sel_processa_out($campos_sel)
{
   global $tab_ger_campos, $sc_init;
   $arr_temp = array();
   if (!isset($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel']))
   {
       $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel'] = array();
   }
   $arr_order = $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['field_order'];
   $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['field_order'] = array();
   $campos_sel = explode("@?@", $campos_sel);
   foreach ($campos_sel as $campo_order)
   {
       $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['field_order'][] = $campo_order;
   }
   foreach ($arr_order as $campo_order)
   {
       if (!in_array($campo_order, $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['field_order']))
       {
           $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['field_order'][] = $campo_order;
       }
   }
   foreach ($tab_ger_campos as $campo_cons => $opc)
   {
       if (!in_array($campo_cons, $campos_sel) && $opc != "none")
       {
           $arr_temp[$campo_cons] = "off";
       }
   }
   if ($arr_temp === $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel'])
   {
       $alt = "N";
   }
   else
   {
       $alt = "S";
   }
       $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['usr_cmp_sel'] = $arr_temp;
?>
    <script language="javascript"> 
      var alt = '<?php echo $alt; ?>';
          opener.nm_gp_move('igual', '0'); 
      window.close(); 
   </script>
<?php
}
   
function Sel_processa_form()
{
   global $sc_init, $path_img, $path_btn, $tab_ger_campos;
   $size = 10;
?>
<HTML>
<HEAD>
 <TITLE></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<BODY bgcolor="#FFFFFF" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0">
 <style type="text/css">
 </style>
<script language="javascript"> 
 var nm_quant_pack;
 // Adiciona um elemento
 //----------------------
 function nm_add_sel(sOrig, sDest, Saida)
 {
  // Recupera objetos
  oOrig = document.Fsel.elements[sOrig];
  oDest = document.Fsel.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem selecionado e valido
   if (oOrig.options[i].selected && !oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "S")
  {
      document.Fsel.submit();
  }
 }
 // Adiciona todos os elementos
 //-----------------------------
 function nm_add_all(sOrig, sDest, Saida)
 {
  // Recupera objetos
  oOrig = document.Fsel.elements[sOrig];
  oDest = document.Fsel.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem valido
   if (!oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "S")
  {
      document.Fsel.submit();
  }
 }
 // Remove um elemento
 //--------------------
 function nm_del_sel(sOrig, sDest, Saida)
 {
  // Recupera objetos
  oOrig = document.Fsel.elements[sOrig];
  oDest = document.Fsel.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove itens selecionados na origem
  for (i = oOrig.length - 1; i >= 0; i--)
  {
   // Item na origem selecionado
   if (oOrig.options[i].selected)
   {
    aSel[j] = oOrig.options[i].value;
    atxt[j] = oOrig.options[i].text;
    j++;
    oOrig.options[i] = null;
   }
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "S")
  {
      document.Fsel.submit();
  }
 }
 // Remove todos os elementos
 //---------------------------
 function nm_del_all(sOrig, sDest, Saida)
 {
  // Recupera objetos
  oOrig = document.Fsel.elements[sOrig];
  oDest = document.Fsel.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   atxt[j] = oOrig.options[i].text;
   j++;
   oOrig.options[i] = null;
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "S")
  {
      document.Fsel.submit();
  }
 }
 // move elementos para baixo
 //--------------------------
 function nm_move_down(v_str_field)
 {
  obj_sel = document.Fsel.elements[v_str_field];
  if (1 < obj_sel.length)
  {
   for (i = (obj_sel.length - 2); i >= 0; i--)
   {
    if ((null != obj_sel.options[i]) && obj_sel.options[i].selected &&
        !obj_sel.options[i + 1].selected)
    {
     bol_sel                         = obj_sel.options[i + 1].selected;
     str_txt                         = obj_sel.options[i].text;
     str_val                         = obj_sel.options[i].value;
     obj_sel.options[i].text         = obj_sel.options[i + 1].text;
     obj_sel.options[i].value        = obj_sel.options[i + 1].value;
     obj_sel.options[i + 1].text     = str_txt;
     obj_sel.options[i + 1].value    = str_val;
     obj_sel.options[i].selected     = bol_sel;
     obj_sel.options[i + 1].selected = true;
    }
   }
  }
 }
 // move elementos para cima
 //-------------------------
 function nm_move_up(v_str_field)
 {
  obj_sel = document.Fsel.elements[v_str_field];
  if (1 < obj_sel.length)
  {
   for (i = 1; i < obj_sel.length; i++)
   {
    if ((null != obj_sel.options[i]) && obj_sel.options[i].selected &&
        !obj_sel.options[i - 1].selected)
    {
     bol_sel                         = obj_sel.options[i - 1].selected;
     str_txt                         = obj_sel.options[i].text;
     str_val                         = obj_sel.options[i].value;
     obj_sel.options[i].text         = obj_sel.options[i - 1].text;
     obj_sel.options[i].value        = obj_sel.options[i - 1].value;
     obj_sel.options[i - 1].text     = str_txt;
     obj_sel.options[i - 1].value    = str_val;
     obj_sel.options[i].selected     = bol_sel;
     obj_sel.options[i - 1].selected = true;
    }
   }
  }
 }
 // empacota elementos selecionados
 //--------------------------------
 function nm_pack(sOrig, sDest)
 {
    obj_sel = document.Fsel.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if ("" != str_val)
         {
             str_val += "@?@";
             nm_quant_pack++;
         }
         str_val += obj_sel.options[i].value;
    }
    document.Fsel.elements[sDest].value = str_val;
 }
 // Teste se elemento pertence ao array
 //-------------------------------------
 function in_array(aArray, sElem)
 {
  for (iCount = 0; iCount < aArray.length; iCount++)
  {
   if (sElem == aArray[iCount])
   {
    return true;
   }
  }
  return false;
 }
 // Submeter o formularior
 //-------------------------------------
 function submit_form()
 {
      nm_pack('sel_dest', 'campos_sel');
      document.Fsel.submit();
 }
 </script>
<FORM name="Fsel" method="POST">
  <INPUT type="hidden" name="script_case_init" value="<?php echo $sc_init; ?>"> 
  <INPUT type="hidden" name="path_img" value="<?php echo $path_img; ?>"> 
  <INPUT type="hidden" name="path_btn" value="<?php echo $path_btn; ?>"> 
  <INPUT type="hidden" name="fsel_ok" value="OK"> 
   <table id="main_table" width="100%">
    <tr>
     <td colspan=4 align="center">
      <table <?php echo $_SESSION['scriptcase']['bg_cab_popup'] . $_SESSION['scriptcase']['bg_img_popup']; ?> width="100%">
       <tr><td align="center" nowrap="nowrap">
        <?php echo $_SESSION['scriptcase']['bg_txtcab_popup']; ?>
        <b>Selecionar Colunas</b>
        </FONT>
       </td></tr>
      </table>
     </td>
     </tr>
   <tr bgcolor="#FFFFFF"><td>
    <select  name="sel_orig" size=<?php echo $size; ?> multiple onDblClick="nm_add_sel('sel_orig', 'sel_dest', 'N')">
<?php
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if ($NM_cada_opc == "on")
           {
               $tmp_sel = " disabled =\"disabled\" style=\"color: #A0A0A0\"" ;
           }
           else
           {
               $tmp_sel = "selected";
           }
?>
       <OPTION value="<?php echo $NM_cada_field; ?>" <?php echo $tmp_sel; ?>><?php echo $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['labels'][$NM_cada_field]; ?></OPTION>
<?php
       }
   }
?>
    </select>
   </td>
   <td align="center">
     <INPUT TYPE="image" SRC="<?php echo $path_img; ?>/img_move_right_all.gif" ALIGN="absmiddle" onClick="nm_add_all('sel_orig', 'sel_dest', 'N'); return false;"><br />
     <INPUT TYPE="image" SRC="<?php echo $path_img; ?>/img_move_right.gif" ALIGN="absmiddle" onClick="nm_add_sel('sel_orig', 'sel_dest', 'N'); return false;"><br />
     <INPUT TYPE="image" SRC="<?php echo $path_img; ?>/img_move_left.gif" ALIGN="absmiddle" onClick="nm_del_sel('sel_dest', 'sel_orig', 'N'); return false;"><br />
     <INPUT TYPE="image" SRC="<?php echo $path_img; ?>/img_move_left_all.gif" ALIGN="absmiddle" onClick="nm_del_all('sel_dest', 'sel_orig', 'N'); return false;"><br />
   </td>
   <td>
    <select  name="sel_dest" size=<?php echo $size; ?>  multiple onDblClick="nm_del_sel('sel_dest', 'sel_orig', 'N')">"
<?php
   foreach ($_SESSION['sc_session'][$sc_init]['app_LiderResultado']['field_order'] as $NM_cada_field)
   {
       if ($tab_ger_campos[$NM_cada_field] == "on")
       {
?>
       <OPTION value="<?php echo $NM_cada_field; ?>" selected><?php echo $_SESSION['sc_session'][$sc_init]['app_LiderResultado']['labels'][$NM_cada_field]; ?></OPTION>
<?php
       }
   }
?>
    </select>
   </td>
   <td align="center">
     <INPUT TYPE="image" SRC="<?php echo $path_img; ?>/img_move_up.gif" ALIGN="absmiddle" onClick="nm_move_up('sel_dest'); return false;"><br />
     <INPUT TYPE="image" SRC="<?php echo $path_img; ?>/img_move_down.gif" ALIGN="absmiddle" onClick="nm_move_down('sel_dest'); return false;"><br />
     <input type="hidden" name="campos_sel" value="">
   </td></tr>
   <tr bgcolor="#eaF8E7"><td colspan=4 align="center">
  <input type="image" name="f_sel_sub" onclick="submit_form();"  border="0" src="<?php echo $path_btn ?>/nm_scriptcase3_green_bok.gif" title="Selecionar Colunas" align="absmiddle"/> 
  &nbsp&nbsp&nbsp<input type="image" name="Bsair" onclick="window.close();" border="0" src="<?php echo $path_btn ?>/nm_scriptcase3_green_bsair.gif" title="Cancelar" align="absmiddle"/> 
   </td></tr></table>
</FORM>
<script language="javascript"> 
   document.Fsel.sel_orig.selectedIndex = -1;
   document.Fsel.sel_dest.selectedIndex = -1;
   WF = document.getElementById('main_table').clientWidth + 12;
   HF = document.getElementById('main_table').clientHeight + 40;
   if (navigator.appName == "Netscape")
   {
       HF += 15;
   }
   if (navigator.appName.substr(0,9) == "Microsoft")
   {
       HF += 40;
   }
   window.resizeTo(WF, HF);
</script>
</BODY>
</HTML>
<?php
}
