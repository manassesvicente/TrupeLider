<?php

class app_Rel_resumo
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $total;
   var $tipo;
   var $nm_data;
   var $NM_export;
   var $prim_linha;
   var $que_linha;
   var $cor_linha;
   var $img_linha;
   var $cor_texto;
   var $fonte_tipo;
   var $fonte_tamanho;
   var $comando_grafico;
   var $resumo_campos;
   var $Print_All;
   var $NM_raiz_img; 
   var $array_total_id_votado;
   var $array_total_id_etapa;
   var $array_total_id_competencia;
   var $count_ger;
   var $sum_resultado;
   var $sc_proc_quebra_id_votado;
   var $count_id_votado;
   var $sum_id_votado_resultado;
   var $sc_proc_quebra_id_etapa;
   var $count_id_etapa;
   var $sum_id_etapa_resultado;
   var $sc_proc_quebra_id_competencia;
   var $count_id_competencia;
   var $sum_id_competencia_resultado;

   //---- Construtor
   function app_Rel_resumo($tipo = "")
   {
      $this->NM_export = false;
      $this->resumo_campos              = array();
      $this->comando_grafico            = array();
      $this->array_total_id_votado      = array();
      $this->array_total_id_etapa       = array();
      $this->array_total_id_competencia = array();
      $this->nm_data = new nm_data("pt_br");
      if ("" != $tipo && "out" == strtolower($tipo))
      {
         $this->tipo = "out";
      }
      else
      {
         $this->tipo = "pag";
      }
   }

   //---- Monta o resumo
   function resumo_export()
   { 
      $this->NM_export = true;
      $this->monta_resumo();
   } 
   function monta_resumo()
   { 

      $this->NM_raiz_img = ""; 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] == "pdf" && !$this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['print_all'])
      { 
          $this->NM_raiz_img = $this->Ini->root;
           $this->Ini->NM_pdf_bg_ok = false;
      } 
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && !$this->NM_export)
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_Rel", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['iframe_menu'] && !$this->NM_export)
      {
          $this->aba_iframe = true;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['array_graf_pdf'] = array();
      $this->resumo_init();
      $this->total->quebra_geral();
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral'] as $ind => $val)
      {
           if ($ind > 0)
           {
               $this->array_total_geral[$ind - 1] = $val;
           }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['contr_array_resumo'] == "OK")
      {
          $this->array_total_id_votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['arr_total']['id_votado'];
          $this->array_total_id_etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['arr_total']['id_etapa'];
          $this->array_total_id_competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['arr_total']['id_competencia'];
      }
      else
      {
          $this->totaliza();
          $this->finaliza_arrays();
          ksort($this->array_total_id_votado);
          ksort($this->array_total_id_etapa);
          ksort($this->array_total_id_competencia);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['arr_total']['id_votado'] = $this->array_total_id_votado;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['arr_total']['id_etapa'] = $this->array_total_id_etapa;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['arr_total']['id_competencia'] = $this->array_total_id_competencia;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['contr_label_graf'] = array();
      if (isset($this->nmgp_label_quebras) && !empty($this->nmgp_label_quebras))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['contr_label_graf'] = $this->nmgp_label_quebras;
      }
      if ($this->NM_export)
      {
          return;
      }
      $this->resumo_final();
   }

   //---- Prepara o resumo
   function resumo_init()
   {
      $this->inicializa_vars();
      if ($this->NM_export)
      {
          return;
      }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] == "pdf" || $this->Print_All)
   {
       $this->monta_cabecalho();
   }
   }

   //---- Finaliza o resumo
   function resumo_final()
   {
      $this->monta_titulo();
      $this->monta_corpo();
      $this->monta_geral();
      $this->monta_fim();
   }

   //---- Inicializa variáveis
   function inicializa_vars()
   {
      $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['print_all'];
      if ($this->Print_All)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] = "print";
          $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_res_prt; 
      }
      else
      {
          $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_res; 
      }
      $this->total   = new app_Rel_total($this->Ini->sc_page);
      $this->prep_modulos("total");
      if ($this->NM_export)
      {
          return;
      }
      $this->verifica_impressao();
      $this->cor_linha = $this->Ini->cor_grid_impar;
      $this->cor_texto = $this->Ini->cor_txt_grid_impar;
      $this->fonte_tipo = $this->Ini->texto_fonte_tipo_impar;
      $this->fonte_tamanho = $this->Ini->texto_fonte_tamanho_impar;
      $this->Ini->cor_link_dados = $this->Ini->cor_link_dados_impar;
      $this->que_linha = "impar";
      $this->img_linha = ("" != $this->Ini->img_fun_imp && $this->Ini->NM_pdf_bg_ok) ? ("background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_imp . "\"") : "";
   }

   //---- Preparação dos módulos
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function verifica_impressao()
   {
      global $nmgp_tipo_pdf, $nmgp_cor_print;
      if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] == "print" && $nmgp_cor_print == "PB") || $nmgp_tipo_pdf == "pb")
      {
         $this->Ini->cor_bg_grid      = "#FFFFFF" ;
         $this->Ini->cor_cab_grid     = "#FFFFFF" ;
         $this->Ini->cor_bg_table     = "#FFFFFF" ;
         $this->Ini->cor_borda        = "#000000" ;
         $this->Ini->cor_txt_cab_grid = "#000000" ;
         $this->Ini->cor_grid_impar   = "#FFFFFF" ;
         $this->Ini->cor_grid_par     = "#FFFFFF" ;
         $this->Ini->cor_txt_grid_impar = "#000000" ;
         $this->Ini->cor_txt_grid_par = "#000000" ;
         $this->Ini->cor_lin_tot      = "#FFFFFF" ;
         $this->Ini->cor_txt_tot      = "#000000" ;
         $this->Ini->cor_lin_sub_tot  = "#FFFFFF" ;
         $this->Ini->cor_lin_grupo    = "#FFFFFF" ;
         $this->Ini->cor_txt_grupo    = "#000000" ;
         $this->Ini->cor_link_cab     = "#000000" ;
         $this->Ini->cor_link_dados_impar = "#000000" ;
         $this->Ini->cor_link_dados_par = "#000000" ;
         $this->Ini->cor_titulo       = "#FFFFFF" ;
         $this->Ini->cor_txt_titulo   = "#000000" ;
         $this->Ini->img_fun_pag      = "" ;
         $this->Ini->img_fun_cab      = "" ;
         $this->Ini->img_fun_tit      = "" ;
         $this->Ini->img_fun_tot      = "" ;
         $this->Ini->img_fun_imp      = "" ;
         $this->Ini->img_fun_par      = "" ;
      }
   }

   //---- Gera arrays dos totais usados no resumo
   function totaliza()
   {
      $this->total->resumo("res", $this->array_total_id_votado, $this->array_total_id_etapa, $this->array_total_id_competencia);
      ksort($this->array_total_id_votado);
      ksort($this->array_total_id_etapa);
      ksort($this->array_total_id_competencia);
   }

   //----- Monta início do HTML do resumo
   function monta_html_ini_pdf()
   {
      global $nm_saida;
       $tp_quebra = "";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['pdf_res'])
       {
           $nm_saida->saida("<TR>\r\n");
           $nm_saida->saida("<TD>\r\n");
           $tp_quebra = "<!-- NEW PAGE -->";
       }
       if ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['print_all'])
       {
           $tp_quebra = "<table><tr><td style=\"page-break-before:always;\"></td></tr></table>";
       }
       $nm_saida->saida("" . $tp_quebra . "\r\n");
       $nm_saida->saida("<TABLE border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" valign=\"top\" >\r\n");
       $nm_saida->saida("<TR>\r\n");
       $nm_saida->saida("<TD>\r\n");
       $nm_saida->saida("<TABLE border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\r\n");
   }
   function monta_html_fim_pdf()
   {
      global $nm_saida;
      $nm_saida->saida("</TABLE>\r\n");
      $nm_saida->saida("</TD>\r\n");
      $nm_saida->saida("</TR>\r\n");
      $nm_saida->saida("</TABLE>\r\n");
   }
   //----- Monta cabeçalho da página
   function monta_cabecalho()
   {
      global
             $nm_saida;
      $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
      $table_bg_cor = ("" != $this->Ini->cor_bg_table) ? "bgcolor=\""     . $this->Ini->cor_bg_table                                     . "\"" : "";
      $table_borda  = ("" != $this->Ini->cor_borda)    ? "bordercolor=\"" . $this->Ini->cor_borda                                        . "\"" : "";
      $table_bg_fun = ("" != $this->Ini->img_fun_cab  && $this->Ini->NM_pdf_bg_ok)  ? "background=\""  . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_cab . "\"" : "";
      $nm_cab_filtro   = ""; 
      $nm_cab_filtrobr = ""; 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']))
      { 
          $id_votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_votado']; 
          $tmp_pos = strpos($id_votado, "##@@");
          if ($tmp_pos !== false)
          {
              $id_votado = substr($id_votado, 0, $tmp_pos);
          }
          $id_etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_etapa']; 
          $tmp_pos = strpos($id_etapa, "##@@");
          if ($tmp_pos !== false)
          {
              $id_etapa = substr($id_etapa, 0, $tmp_pos);
          }
          $id_competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_competencia']; 
          $tmp_pos = strpos($id_competencia, "##@@");
          if ($tmp_pos !== false)
          {
              $id_competencia = substr($id_competencia, 0, $tmp_pos);
          }
          $id_habilidade = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_habilidade']; 
          $tmp_pos = strpos($id_habilidade, "##@@");
          if ($tmp_pos !== false)
          {
              $id_habilidade = substr($id_habilidade, 0, $tmp_pos);
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['cond_pesq']))
      {  
          $pos       = 0;
          $trab_pos  = false;
          $pos_tmp   = true; 
          $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['cond_pesq'];
          while ($pos_tmp)
          {
             $pos = strpos($tmp, "##*@@", $pos);
             if ($pos !== false)
             {
                 $trab_pos = $pos;
                 $pos += 4;
             }
             else
             {
                 $pos_tmp = false;
             }
          }
          $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['cond_pesq'], $trab_pos + 5) == "or")  ? "ou " : "";
          $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['cond_pesq'], $trab_pos + 5) == "and") ? "e " : "";
          $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['cond_pesq'], 0, $trab_pos);
          $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . "<br />", $nm_cab_filtro);
          $pos       = 0;
          $trab_pos  = false;
          $pos_tmp   = true; 
          $tmp       = $nm_cab_filtro;
          while ($pos_tmp)
          {
             $pos = strpos($tmp, "##*@@", $pos);
             if ($pos !== false)
             {
                 $trab_pos = $pos;
                 $pos += 4;
             }
             else
             {
                 $pos_tmp = false;
             }
          }
          if ($trab_pos === false)
          {
          }
          else  
          {  
             $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
             $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or, $nm_cab_filtro);
          }   
      }   
      $nm_saida->saida(" <TR align=\"center\">\r\n");
      $nm_saida->saida("  <TD>\r\n");
      $nm_saida->saida("   <TABLE border=\"0\" cellspacing=\"0\" cellpadding=\"3\" $table_bg_cor $table_borda align=\"center\" width=\"100%\">\r\n");
      $nm_saida->saida("    <TR align=\"center\">\r\n");
      $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_cab_grid . "\">\r\n");
      $nm_saida->saida("      <TABLE $table_bg_fun border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n");
      $nm_saida->saida("       <TR valign=\"middle\">\r\n");
      $nm_saida->saida("        <TD align=\"left\" rowspan=\"3\"><IMG src=\"" . $this->NM_raiz_img . $this->Ini->path_imag_cab . "/scriptcase__NM__LogoSchema1.gif\" border=\"0\" title=\"\" /></TD>\r\n");
      $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
      $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
      $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
      $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
      $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\">Consulta em app_Rel</FONT></TD>\r\n");
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
      $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\">" . date('d/m/Y') . "</FONT></TD>\r\n");
      $nm_saida->saida("       </TR>\r\n");
      $nm_saida->saida("      </TABLE>\r\n");
      $nm_saida->saida("     </TD>\r\n");
      $nm_saida->saida("    </TR>\r\n");
      $nm_saida->saida("   </TABLE>\r\n");
      $nm_saida->saida("  </TD>\r\n");
      $nm_saida->saida(" </TR>\r\n");
   }

   //---- Monta o título do resumo
   function monta_titulo()
   {
      global 
             $nm_saida;
      $this->prim_linha = true;
      $table_bg_cor = ("" != $this->Ini->cor_bg_table) ? "bgcolor=\""     . $this->Ini->cor_bg_table                                     . "\"" : "";
      $table_borda  = ("" != $this->Ini->cor_borda)    ? "bordercolor=\"" . $this->Ini->cor_borda                                        . "\"" : "";
      $title_bg_fun = ("" != $this->Ini->img_fun_tit && $this->Ini->NM_pdf_bg_ok)  ? "background=\""  . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_tit . "\"" : "";
      $title_align  = $title_bg_fun . " align=\"right\"";
      $level_pdf = "RESUMO";
      $nm_saida->saida(" <TR align=\"center\">\r\n");
      $nm_saida->saida("  <TD >\r\n");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['pdf_res'])
      {
          $level_pdf = "<a name=\"nm_resumo_geral\" LEVEL=\"1\">RESUMO</a>";
      }
      $nm_saida->saida("   <TABLE border=\"0\" cellspacing=\"0\" cellpadding=\"3\" $table_bg_cor $table_borda align=\"center\" width=\"100%\">\r\n");
      $nm_saida->saida("    <TR align=\"center\" bgcolor=\"" . $this->Ini->cor_titulo . "\">\r\n");
      $nm_saida->saida("     <TD $title_bg_fun><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>" . $level_pdf . "</B></FONT></TD>\r\n");
      $nm_saida->saida("     <TD $title_align><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>Registros</B></FONT>\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "print")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "pdf")
          {
      $nm_saida->saida("          <A href=\"app_Rel.php?script_case_init=" . $this->Ini->sc_page . "&nmgp_opcao=grafico&campo=0&nivel_quebra=0\" target=\"_blank\"><IMG src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bgraf.gif\" border=\"0\" align=\"middle\" title=\"Ver gr&aacute;fico\" /></A>\r\n");
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['array_graf_pdf'][] = array("0" => 0, "1" => 0);
      }
      $nm_saida->saida("</TD>\r\n");
      $nm_saida->saida("     <TD $title_align><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>RESULTADO</B></FONT>\r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "print")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "pdf")
          {
      $nm_saida->saida("          <A href=\"app_Rel.php?script_case_init=" . $this->Ini->sc_page . "&nmgp_opcao=grafico&campo=1&nivel_quebra=0\" target=\"_blank\"><IMG src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bgraf.gif\" border=\"0\" align=\"middle\" title=\"Ver gr&aacute;fico\" /></A>\r\n");
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['array_graf_pdf'][] = array("0" => 1, "1" => 0);
      }
      $nm_saida->saida("</TD>\r\n");
      $nm_saida->saida("    </TR>\r\n");
   }

   //---- Monta o corpo do resumo
   function monta_corpo()
   {
      if (isset($this->array_total_id_votado))
      {
         foreach ($this->array_total_id_votado as $campo_id_votado => $dados_id_votado)
         {
            $val_grafico_id_votado = $dados_id_votado[2];
            $this->resumo_campos = $dados_id_votado;
            $this->monta_linha($dados_id_votado[2], 0, "normal", "&id_votado=" . urlencode($val_grafico_id_votado) . "");
            if (isset($this->array_total_id_etapa[$campo_id_votado]))
            {
               foreach ($this->array_total_id_etapa[$campo_id_votado] as $campo_id_etapa => $dados_id_etapa)
               {
                  $val_grafico_id_etapa = $dados_id_etapa[2];
                  $this->resumo_campos = $dados_id_etapa;
                  $this->monta_linha($dados_id_etapa[2], 1, "normal", "&id_votado=" . urlencode($val_grafico_id_votado) . "&id_etapa=" . urlencode($val_grafico_id_etapa) . "");
                  if (isset($this->array_total_id_competencia[$campo_id_votado][$campo_id_etapa]))
                  {
                     foreach ($this->array_total_id_competencia[$campo_id_votado][$campo_id_etapa] as $campo_id_competencia => $dados_id_competencia)
                     {
                        $val_grafico_id_competencia = $dados_id_competencia[2];
                        $this->resumo_campos = $dados_id_competencia;
                        $this->monta_linha($dados_id_competencia[2], 2, "normal", "");
                     } // foreach id_competencia
                  } // isset id_competencia
               } // foreach id_etapa
            } // isset id_etapa
         } // foreach id_votado
      } // isset id_votado
   }

   //---- Monta uma linha do resumo
   function monta_linha($campo, $nivel, $weight, $params, $geral="N")
   {
      global $nm_saida;
      $this->prim_linha = false;
      $weight_ini = (strtolower($weight) == "bold") ? "<B>"    : "";
      $weight_fim = (strtolower($weight) == "bold") ? "</B>"   : "";
      $nome_campo = ("" == $campo)                  ? "&nbsp;" : $campo;
      $tit_campo  = str_repeat("&nbsp; &nbsp; &nbsp;", $nivel) . $weight_ini . $nome_campo . $weight_fim;
      $nm_saida->saida("    <TR bgcolor=\"" . $this->cor_linha . "\" align=\"right\" valign=\"middle\">\r\n");
      $nm_saida->saida("     <TD " . $this->img_linha . " align=\"left\"><FONT size=\"" . $this->fonte_tamanho . "\" color=\"" . $this->cor_texto . "\" face=\"" . $this->fonte_tipo . "\">" . $tit_campo . "</FONT></TD>\r\n");
      $img_html = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "print" && 2 > $nivel && $params != "nao" && (1 == ($nivel + 1) || 2 == ($nivel + 1)))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "pdf")
         {
            $img_html = "&nbsp;<A href=\"app_Rel.php?script_case_init=" .$this->Ini->sc_page . "&nmgp_opcao=grafico&campo=0&nivel_quebra=" . ($nivel + 1) . "$params\" target=\"_blank\"><IMG src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bgraf.gif\" border=\"0\" align=\"middle\" title=\"Ver gr&aacute;fico\" /></A>";
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['array_graf_pdf'][] = array("0" => 0, "1" => $nivel + 1, "2" => $params);
      }
      $valor_campo = $this->resumo_campos[0];
      nmgp_Form_Num_Val($valor_campo, ".", ",");
      if ("" == $valor_campo)
      {
         $valor_campo = "&nbsp;";
      }
      $nm_saida->saida("     <TD " . $this->img_linha . " NOWRAP=\"nowrap\"><FONT size=\"" . $this->fonte_tamanho . "\" color=\"" . $this->cor_texto . "\" face=\"" . $this->fonte_tipo . "\">" . $weight_ini . $valor_campo . $weight_fim . $img_html . "</FONT></TD>\r\n");
      $img_html = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "print" && 2 > $nivel && $params != "nao" && (1 == ($nivel + 1) || 2 == ($nivel + 1)))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['opcao'] != "pdf")
         {
            $img_html = "&nbsp;<A href=\"app_Rel.php?script_case_init=" .$this->Ini->sc_page . "&nmgp_opcao=grafico&campo=1&nivel_quebra=" . ($nivel + 1) . "$params\" target=\"_blank\"><IMG src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bgraf.gif\" border=\"0\" align=\"middle\" title=\"Ver gr&aacute;fico\" /></A>";
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['array_graf_pdf'][] = array("0" => 1, "1" => $nivel + 1, "2" => $params);
      }
      $valor_campo = $this->resumo_campos[1];
      nmgp_Form_Num_Val($valor_campo, ".", ",", "2", "S", "2", "") ; 
      if ("" == $valor_campo)
      {
         $valor_campo = "&nbsp;";
      }
      $nm_saida->saida("     <TD " . $this->img_linha . " NOWRAP=\"nowrap\"><FONT size=\"" . $this->fonte_tamanho . "\" color=\"" . $this->cor_texto . "\" face=\"" . $this->fonte_tipo . "\">" . $weight_ini . $valor_campo . $weight_fim . $img_html . "</FONT></TD>\r\n");
      $nm_saida->saida("    </TR>\r\n");
      $this->cor_linha = ($this->cor_linha == $this->Ini->cor_grid_impar) ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar;
      $this->cor_texto = ($this->cor_texto == $this->Ini->cor_txt_grid_impar) ? $this->Ini->cor_txt_grid_par : $this->Ini->cor_txt_grid_impar;
      $this->fonte_tipo = ($this->fonte_tipo == $this->Ini->texto_fonte_tipo_impar) ? $this->Ini->texto_fonte_tipo_par : $this->Ini->texto_fonte_tipo_impar;
      $this->fonte_tamanho = ($this->fonte_tamanho == $this->Ini->texto_fonte_tamanho_impar) ? $this->Ini->texto_fonte_tamanho_par : $this->Ini->texto_fonte_tamanho_impar;
      $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->Ini->Ini->cor_link_dados_impar) ? $this->Ini->Ini->cor_link_dados_par : $this->Ini->Ini->cor_link_dados_impar;
      $this->que_linha = ("impar" == $this->que_linha) ? "par" : "impar";
      if ("impar" == $this->que_linha)
      {
         $this->img_linha = ("" != $this->Ini->img_fun_imp && $this->Ini->NM_pdf_bg_ok) ? ("background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_imp . "\"") : "";
      }
      else
      {
         $this->img_linha = ("" != $this->Ini->img_fun_par && $this->Ini->NM_pdf_bg_ok) ? ("background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_par . "\"") : "";
      }
   }

   //---- Monta o total geral do resumo
   function monta_geral()
   {
      $this->cor_linha     = $this->Ini->cor_lin_tot;
      $this->img_linha     = ("" != $this->Ini->img_fun_tot && $this->Ini->NM_pdf_bg_ok) ? ("background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_tot . "\"") : "";
      $this->cor_texto     = $this->Ini->cor_txt_tot;
      $this->fonte_tipo    = $this->Ini->tot_fonte_tipo;
      $this->fonte_tamanho = $this->Ini->tot_fonte_tamanho;
      $this->resumo_campos = array();
      for ($i = 1; $i <= sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral']); $i++)
      {
         $this->resumo_campos[] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral'][$i];
      }
      $this->monta_linha("Total Geral", 0, "bold", "nao", "S");
   }

   //---- Monta o rodapé do resumo
   function monta_fim()
   {
      global $nm_saida;
      $nm_saida->saida("   </TABLE>\r\n");
      $nm_saida->saida("  </TD>\r\n");
      $nm_saida->saida(" </TR>\r\n");
   }

   //---- Inicializa arrays do resumo
   function inicializa_arrays()
   {
   global $nm_data;
      $nm_data = new nm_data("pt_br");
      $this->array_total_id_votado = array();
      $this->array_total_id_etapa = array();
      $this->array_total_id_competencia = array();
   }

   //---- Adiciona os valores de um registro ao resumo
   function adiciona_registro($avg_resultado, $quebra_id_votado, $quebra_id_etapa, $quebra_id_competencia, $quebra_id_votado_orig, $quebra_id_etapa_orig, $quebra_id_competencia_orig)
   {
      //----- Votado
      if (!isset($this->array_total_id_votado[$quebra_id_votado_orig]))
      {
         $this->array_total_id_votado[$quebra_id_votado_orig][0] = 1;
         $this->array_total_id_votado[$quebra_id_votado_orig][1] = $avg_resultado;
         $this->array_total_id_votado[$quebra_id_votado_orig][2] = $quebra_id_votado;
         $this->array_total_id_votado[$quebra_id_votado_orig][3] = $quebra_id_votado_orig;
      }
      else
      {
         $this->array_total_id_votado[$quebra_id_votado_orig][0]++;
         $this->array_total_id_votado[$quebra_id_votado_orig][1] += $avg_resultado;
      }
      //----- Etapa
      if (!isset($this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig]))
      {
         $this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig][0] = 1;
         $this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig][1] = $avg_resultado;
         $this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig][2] = $quebra_id_etapa;
         $this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig][3] = $quebra_id_etapa_orig;
      }
      else
      {
         $this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig][0]++;
         $this->array_total_id_etapa[$quebra_id_votado_orig][$quebra_id_etapa_orig][1] += $avg_resultado;
      }
      //----- Competência
      if (!isset($this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig]))
      {
         $this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig][0] = 1;
         $this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig][1] = $avg_resultado;
         $this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig][2] = $quebra_id_competencia;
         $this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig][3] = $quebra_id_competencia_orig;
      }
      else
      {
         $this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig][0]++;
         $this->array_total_id_competencia[$quebra_id_votado_orig][$quebra_id_etapa_orig][$quebra_id_competencia_orig][1] += $avg_resultado;
      }
   }

   //---- Finaliza arrays do resumo
   function finaliza_arrays()
   {
       global $nm_data;
      foreach ($this->array_total_id_votado as $campo_id_votado => $dados_id_votado)
      {
         $this->array_total_id_votado[$campo_id_votado][1] /= $this->array_total_id_votado[$campo_id_votado][0];
         foreach ($this->array_total_id_etapa[$campo_id_votado] as $campo_id_etapa => $dados_id_etapa)
         {
            $this->array_total_id_etapa[$campo_id_votado][$campo_id_etapa][1] /= $this->array_total_id_etapa[$campo_id_votado][$campo_id_etapa][0];
            foreach ($this->array_total_id_competencia[$campo_id_votado][$campo_id_etapa] as $campo_id_competencia => $dados_id_competencia)
            {
               $this->array_total_id_competencia[$campo_id_votado][$campo_id_etapa][$campo_id_competencia][1] /= $this->array_total_id_competencia[$campo_id_votado][$campo_id_etapa][$campo_id_competencia][0];
            }
         }
      }
   }

   function prepara_resumo()
   {
      $this->resumo_init();
      $this->inicializa_arrays();
   }

   function finaliza_resumo()
   {
      $this->finaliza_arrays();
   }

//
   function nm_acumula_resumo($nm_tipo="resumo")
   {
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']))
     { 
       $this->id_votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_votado']; 
       $tmp_pos = strpos($this->id_votado, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_votado = substr($this->id_votado, 0, $tmp_pos);
       }
       $this->id_etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_etapa']; 
       $tmp_pos = strpos($this->id_etapa, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_etapa = substr($this->id_etapa, 0, $tmp_pos);
       }
       $this->id_competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_competencia']; 
       $tmp_pos = strpos($this->id_competencia, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_competencia = substr($this->id_competencia, 0, $tmp_pos);
       }
       $this->id_habilidade = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_habilidade']; 
       $tmp_pos = strpos($this->id_habilidade, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_habilidade = substr($this->id_habilidade, 0, $tmp_pos);
       }
     } 
     $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_orig'];
     $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'];
     $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq_filtro'];
     $this->nm_field_dinamico = array();
     $this->nm_order_dinamico = array();
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
     { 
         $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
     } 
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     { 
         $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
     } 
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
     { 
         $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
     } 
     else 
     { 
         $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
     } 
     $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
     $nmgp_order_by = " order by  ID_VOTADO asc, ID_ETAPA asc, ID_COMPETENCIA asc"; 
     $nmgp_select .= $nmgp_order_by; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
     $rs_res = &$this->Db->Execute($nmgp_select) ; 
     if ($rs_res === false && !$rs_graf->EOF) 
     { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
// 
     if ($nm_tipo != "resumo") 
     {  
          $this->nm_acum_res_unit($rs_res, $nm_tipo);
     }  
     else  
     {  
         while (!$rs_res->EOF) 
         {  
                $this->nm_acum_res_unit($rs_res, "resumo");
                $rs_res->MoveNext();
         }  
     }  
     $rs_res->Close();
   }
// 
   function nm_acum_res_unit($rs_res, $nm_tipo="resumo")
   {
            if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']))
            { 
                $this->id_votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_votado']; 
                $tmp_pos = strpos($this->id_votado, "##@@");
                if ($tmp_pos !== false)
                {
                   $this->id_votado = substr($this->id_votado, 0, $tmp_pos);
                }
                $this->id_etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_etapa']; 
                $tmp_pos = strpos($this->id_etapa, "##@@");
                if ($tmp_pos !== false)
                {
                   $this->id_etapa = substr($this->id_etapa, 0, $tmp_pos);
                }
                $this->id_competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_competencia']; 
                $tmp_pos = strpos($this->id_competencia, "##@@");
                if ($tmp_pos !== false)
                {
                   $this->id_competencia = substr($this->id_competencia, 0, $tmp_pos);
                }
                $this->id_habilidade = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_habilidade']; 
                $tmp_pos = strpos($this->id_habilidade, "##@@");
                if ($tmp_pos !== false)
                {
                   $this->id_habilidade = substr($this->id_habilidade, 0, $tmp_pos);
                }
            } 
            $this->id_votado = $rs_res->fields[0] ;  
            $this->id_votado = (string)$this->id_votado;
            $this->id_grupo = $rs_res->fields[1] ;  
            $this->id_grupo = (string)$this->id_grupo;
            $this->id_votante = $rs_res->fields[2] ;  
            $this->id_votante = (string)$this->id_votante;
            $this->id_etapa = $rs_res->fields[3] ;  
            $this->id_etapa = (string)$this->id_etapa;
            $this->id_competencia = $rs_res->fields[4] ;  
            $this->id_competencia = (string)$this->id_competencia;
            $this->id_habilidade = $rs_res->fields[5] ;  
            $this->id_habilidade = (string)$this->id_habilidade;
            $this->resultado = $rs_res->fields[6] ;  
            $this->resultado =  str_replace(",", ".", $this->resultado);
            $this->resultado = (strpos(strtolower($this->resultado), "e")) ? (float)$this->resultado : $this->resultado; 
            $this->resultado = (string)$this->resultado;
            $this->id_votado_orig = $this->id_votado;
            $this->id_etapa_orig = $this->id_etapa;
            $this->id_competencia_orig = $this->id_competencia;
            $this->look_id_votado = $this->id_votado; 
            $this->Lookup->lookup_id_votado($this->look_id_votado, $this->id_votado) ; 
            $this->look_id_etapa = $this->id_etapa; 
            $this->Lookup->lookup_id_etapa($this->look_id_etapa, $this->id_etapa) ; 
            $this->look_id_competencia = $this->id_competencia; 
            $this->Lookup->lookup_id_competencia($this->look_id_competencia, $this->id_competencia) ; 
            $this->id_votado = $this->look_id_votado ;
            $this->id_etapa = $this->look_id_etapa ;
            $this->id_competencia = $this->look_id_competencia ;
            if ($nm_tipo == "resumo")
            {
                $this->adiciona_registro($this->resultado, $this->id_votado, $this->id_etapa, $this->id_competencia, $this->id_votado_orig,  $this->id_etapa_orig,  $this->id_competencia_orig);
            }
   }
//
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
?>
