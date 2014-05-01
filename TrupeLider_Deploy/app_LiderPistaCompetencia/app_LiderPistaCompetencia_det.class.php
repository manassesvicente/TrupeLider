<?php
//--- Processa Detalhe
class app_LiderPistaCompetencia_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $lider;
   var $pista;
   var $competencia;
   var $nota_media;
   var $resultado_medio;
   var $total_nota;
   var $total_resultado;
 function monta_det()
 {
    global 
           $nm_saida;
    if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']))
    { 
        $this->lider = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['lider']; 
        $tmp_pos = strpos($this->lider, "##@@");
        if ($tmp_pos !== false)
        {
            $this->lider = substr($this->lider, 0, $tmp_pos);
        }
        $this->pista = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['pista']; 
        $tmp_pos = strpos($this->pista, "##@@");
        if ($tmp_pos !== false)
        {
            $this->pista = substr($this->pista, 0, $tmp_pos);
        }
        $this->competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['competencia']; 
        $tmp_pos = strpos($this->competencia, "##@@");
        if ($tmp_pos !== false)
        {
            $this->competencia = substr($this->competencia, 0, $tmp_pos);
        }
        $this->nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['nota_media']; 
        $tmp_pos = strpos($this->nota_media, "##@@");
        if ($tmp_pos !== false)
        {
            $this->nota_media = substr($this->nota_media, 0, $tmp_pos);
        }
        $this->resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['resultado_medio']; 
        $tmp_pos = strpos($this->resultado_medio, "##@@");
        if ($tmp_pos !== false)
        {
            $this->resultado_medio = substr($this->resultado_medio, 0, $tmp_pos);
        }
        $this->total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['total_nota']; 
        $tmp_pos = strpos($this->total_nota, "##@@");
        if ($tmp_pos !== false)
        {
            $this->total_nota = substr($this->total_nota, 0, $tmp_pos);
        }
        $this->total_resultado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']['total_resultado']; 
        $tmp_pos = strpos($this->total_resultado, "##@@");
        if ($tmp_pos !== false)
        {
            $this->total_resultado = substr($this->total_resultado, 0, $tmp_pos);
        }
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->NM_raiz_img  = ""; 
    $this->sc_proc_grid = false; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['opcao'] = $GLOBALS['nmgp_opcao'];
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['chave_det'] = $GLOBALS['nmgp_chave_det'];
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['sub_dir'] = array(); 
    if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['opcao_print'] == "print") 
    { 
       $this->Ini->cor_bg_table       = "#FFFFFF" ; 
       $this->Ini->cor_borda          = "#000000" ; 
       $this->Ini->cor_bg_grid        = "#FFFFFF" ; 
       $this->Ini->cor_cab_grid       = "#FFFFFF" ; 
       $this->Ini->cor_txt_cab_grid   = "#000000" ; 
       $this->Ini->cor_barra_nav      = "#FFFFFF" ; 
       $this->Ini->cor_titulo         = "#FFFFFF" ; 
       $this->Ini->cor_txt_titulo     = "#000000" ; 
       $this->Ini->cor_grid_impar     = "#FFFFFF" ; 
       $this->Ini->cor_grid_par       = "#FFFFFF" ; 
       $this->Ini->cor_txt_grid_impar = "#000000" ; 
       $this->Ini->cor_txt_grid_par   = "#000000" ; 
       $this->Ini->img_fun_pag        = "" ; 
       $this->Ini->img_fun_cab        = "" ; 
       $this->Ini->img_fun_tit        = "" ; 
       $this->Ini->img_fun_imp        = "" ; 
       $this->Ini->img_fun_par        = "" ; 
    } 
   $this->nm_data = new nm_data("pt_br");
   $nm_tab_cor_fun = ""; 
   $nm_tab_cor_bor = ""; 
   $nm_tit_img_fun = ""; 
   $nm_fundo_pagina = ""; 
   $nm_tab_img_fun = ""; 
   $nm_img_fun_imp = ""; 
   $nm_img_fun_par = ""; 
   $nm_bar_img_fun  = ""; 
   if ("" != $this->Ini->cor_bg_table) 
   {
       $nm_tab_cor_fun = "bgcolor=\"" . $this->Ini->cor_bg_table . "\""; 
   }
   if ("" != $this->Ini->cor_cor_borda) 
   {
       $nm_tab_cor_bor = "bordercolor=\"" . $this->Ini->cor_borda . "\""; 
   }
   if ("" != $this->Ini->img_fun_tit && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tit_img_fun = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_tit . "\""; 
   }
   if ("" != $this->Ini->img_fun_pag && $this->Ini->NM_pdf_bg_ok)
   {
       $nm_fundo_pagina = " background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_pag . "\""; 
   }
   if ("" != $this->Ini->img_fun_cab && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tab_img_fun = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_cab . "\""; 
   }
   if ("" != $this->Ini->img_fun_imp && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_img_fun_imp = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_imp . "\""; 
   }
   if ("" != $this->Ini->img_fun_par && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_img_fun_par = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_par . "\""; 
   }
   if ("" != $this->Ini->img_fun_barra && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_bar_img_fun = " background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_barra . "\""; 
   }
   $nm_data_fixa = date("d/m/Y"); 
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   require_once($this->Ini->path_libs . "/nm_edit.php");  
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
   { 
       $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = stripslashes($parms_det[$key]);
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'])) 
       { 
           $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'] . " and " ;  
       } 
       else 
       { 
           $nmgp_select .= " where " ;  
       } 
   } 
   else 
   { 
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'])) 
       { 
          $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'] . " and  LIDER = '$parms_det[0]' and PISTA = '$parms_det[1]' and COMPETENCIA = '$parms_det[2]' and NOTA_MEDIA = $parms_det[3] and RESULTADO_MEDIO = $parms_det[4] and TOTAL_NOTA = $parms_det[5] and TOTAL_RESULTADO = $parms_det[6]" ;  
       } 
       else 
       { 
          $nmgp_select .= " where  LIDER = '$parms_det[0]' and PISTA = '$parms_det[1]' and COMPETENCIA = '$parms_det[2]' and NOTA_MEDIA = $parms_det[3] and RESULTADO_MEDIO = $parms_det[4] and TOTAL_NOTA = $parms_det[5] and TOTAL_RESULTADO = $parms_det[6]" ;  
       } 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = &$this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit ; 
   }  
   $this->lider = $rs->fields[0] ;  
   $this->pista = $rs->fields[1] ;  
   $this->competencia = $rs->fields[2] ;  
   $this->nota_media = $rs->fields[3] ;  
   $this->nota_media = (string)$this->nota_media;
   $this->resultado_medio = $rs->fields[4] ;  
   $this->resultado_medio = (string)$this->resultado_medio;
   $this->total_nota = $rs->fields[5] ;  
   $this->total_nota = (string)$this->total_nota;
   $this->total_resultado = $rs->fields[6] ;  
   $this->total_resultado = (string)$this->total_resultado;
//--- 
   $nm_saida->saida("<html>\r\n");
   $nm_saida->saida("<HEAD>\r\n");
   $nm_saida->saida("   <TITLE>Detalhes de app_LiderPistaCompetencia</TITLE>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\" />\r\n");
   $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
   $nm_saida->saida("</HEAD>\r\n");
   $nm_saida->saida("  <body bgcolor=\"" . $this->Ini->cor_bg_grid . "\"" . $nm_fundo_pagina . ">\r\n");
   $nm_saida->saida(" <style type=\"text/css\">\r\n");
   $nm_saida->saida("  BODY {  }\r\n");
   $nm_saida->saida(" </style>\r\n");
   $nm_saida->saida("<table border=0 cellpadding=4 cellspacing=0 align=\"center\" valign=\"top\" >\r\n");
   $nm_saida->saida("<tr><td>\r\n");
   $nm_saida->saida("   <TABLE border=\"" . $this->Ini->border_grid . "\" cellspacing=\"0\" cellpadding=\"3\" " . $nm_tab_cor_fun . " " . $nm_tab_cor_bor . " align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("    <TR align=\"center\">\r\n");
   $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_cab_grid . "\">\r\n");
   $nm_saida->saida("      <TABLE " . $nm_tab_img_fun . " border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" rowspan=\"3\">   <IMG SRC=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__LogoSchema1.gif\" BORDER=\"0\"/></TD>\r\n");
   $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\">Detalhes de app_LiderPistaCompetencia</FONT></TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\">" . $nm_data_fixa . "</FONT></TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("      </TABLE>\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("   <tr><td>\r\n");
       $nm_saida->saida("   <table border=0  cellpadding=4 cellspacing=0 width=\"100%\">\r\n");
       $nm_saida->saida("    <tr><td valign=\"top\" align=center nowrap $nm_bar_img_fun bgcolor=\"" . $this->Ini->cor_barra_nav . "\">\r\n");
       $nm_saida->saida("     <input type=\"image\" name=\"sc_b_sai\" onclick=\"document.F3.submit()\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif\" title=\"Retornar para a Grid\" align=\"absmiddle\"/> \r\n");
       $nm_saida->saida("     </td></tr>\r\n");
       $nm_saida->saida("    </table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   $nm_saida->saida("<tr><td>\r\n");
   $nm_saida->saida("<TABLE border=\"" . $this->Ini->border_grid . "\" cellspacing=\"0\" cellpadding=\"3\" " . $nm_tab_cor_fun . " " . $nm_tab_cor_bor . " align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['lider'])) ? $this->New_label['lider'] : "Líder"; 
          $conteudo = trim($this->lider); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_imp . "  BGCOLOR=\"" . $this->Ini->cor_grid_impar . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_impar . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_impar . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['pista'])) ? $this->New_label['pista'] : "Pista"; 
          $conteudo = trim($this->pista); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_par . "  BGCOLOR=\"" . $this->Ini->cor_grid_par . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_par . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_par . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['competencia'])) ? $this->New_label['competencia'] : "Competência"; 
          $conteudo = trim($this->competencia); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_imp . "  BGCOLOR=\"" . $this->Ini->cor_grid_impar . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_impar . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_impar . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['nota_media'])) ? $this->New_label['nota_media'] : "Nota - Média"; 
          $conteudo = trim($this->nota_media); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_par . "  BGCOLOR=\"" . $this->Ini->cor_grid_par . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_par . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_par . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['resultado_medio'])) ? $this->New_label['resultado_medio'] : "Resultado - Média"; 
          $conteudo = trim($this->resultado_medio); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_imp . "  BGCOLOR=\"" . $this->Ini->cor_grid_impar . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_impar . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_impar . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['total_nota'])) ? $this->New_label['total_nota'] : "Nota - Total"; 
          $conteudo = trim($this->total_nota); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_par . "  BGCOLOR=\"" . $this->Ini->cor_grid_par . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_par . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_par . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR>\r\n");
          $SC_Label = (isset($this->New_label['total_resultado'])) ? $this->New_label['total_resultado'] : "Resultado - Total"; 
          $conteudo = trim($this->total_resultado); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD " . $nm_tit_img_fun . " BGCOLOR=\"" . $this->Ini->cor_titulo . "\" ALIGN=\"left\" VALIGN=\"middle\"><B><FONT SIZE=\"" . $this->Ini->titulo_fonte_tamanho . "\" COLOR=\"" . $this->Ini->cor_txt_titulo . "\" FACE=\"" . $this->Ini->titulo_fonte_tipo . "\">" . nl2br($SC_Label) . "</FONT></B></TD>\r\n");
   $nm_saida->saida("    <TD " . $nm_img_fun_imp . "  BGCOLOR=\"" . $this->Ini->cor_grid_impar . "\" ALIGN=\"left\" VALIGN=\"top\"><FONT SIZE=\"" . $this->Ini->texto_fonte_tamanho_impar . "\" COLOR=\"" . $this->Ini->cor_txt_grid . "\" FACE=\"" . $this->Ini->texto_fonte_tipo_impar . "\">" . $conteudo . "</FONT></TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['opcao_print'] == "print") 
  { 
      $nm_saida->saida(" <table border=0 width=\"100%\">\r\n");
      $nm_saida->saida("  <tr  bgcolor=\"#FFFFFF\"><td align=middle>\r\n");
      $nm_saida->saida("       <a href=\"javascript:document.F3.submit()\" align=absmiddle><font color=\"#000000\">Retornar para a Grid</font></a>\r\n");
      $nm_saida->saida("  </td></tr></table>\r\n");
  } 
   $rs->Close(); 
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
//--- 
//--- Formulário para controle da navegação
   $nm_saida->saida("<form name=\"F3\" method=post\r\n");
   $nm_saida->saida("                  target=\"_self\"\r\n");
   $nm_saida->saida("                  action=\"app_LiderPistaCompetencia.php\">\r\n");
   $nm_saida->saida("<input type=hidden name=\"nmgp_opcao\" value=\"igual\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_init\" value=\"" . $this->Ini->sc_page . "\"/>\r\n");
   $nm_saida->saida("</form>\r\n");
   $nm_saida->saida("<script language=JavaScript>\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"app_LiderPistaCompetencia_doc.php?script_case_init=" . $this->Ini->sc_page . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("</script>\r\n");
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</html>\r\n");
 }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
}
