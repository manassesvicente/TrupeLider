<?php
class app_LiderResultado_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $Res;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $ordem_grid;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $Ind_lig_mult; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden = array();
   var $nmgp_botoes = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_cont_body; 
   var $NM_emb_tree_no; 
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $sum_nota_media;
   var $sum_resultado_medio;
   var $sum_total_nota;
   var $sum_total_resultado;
   var $lider_Old;
   var $arg_sum_lider;
   var $Label_lider;
   var $sc_proc_quebra_lider;
   var $count_lider;
   var $sum_lider_nota_media;
   var $sum_lider_resultado_medio;
   var $sum_lider_total_nota;
   var $sum_lider_total_resultado;
   var $lider;
   var $nota_media;
   var $resultado_medio;
   var $total_nota;
   var $total_resultado;
//--- Controle da Grid
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
   } 
   else 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
       { 
           $this->form_navegacao();
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "app_LiderResultado/app_LiderResultado_resumo.class.php"); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . "app_LiderResultado_resumo.class.php"); 
       } 
       $this->Res         = new app_LiderResultado_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['pdf_res'])
       {
           $this->cabecalho();
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['pdf_res'])
       {
           $this->grid();
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && !$this->rs_grid->EOF) 
       { 
          $this->Res->monta_resumo();
       } 
       if ($this->rs_grid->EOF && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq']) 
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
           { 
               $this->Res->monta_html_ini_pdf();
               $this->Res->monta_resumo();
               $this->Res->monta_html_fim_pdf();
           } 
           else 
           { 
               if (empty($this->nm_grid_sem_reg))
               { 
                   $this->Res->monta_resumo();
               } 
           } 
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['graf_pdf'] == "S")
       { 
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'];
 }
  function resume($linhas = 0)
  {
     $this->Lin_impressas = 0;
     $this->Lin_final     = FALSE;
     $this->grid($linhas);
  }
//--- Processa Consulta
 function inicializa()
 {
   global $nm_saida,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->NM_cont_body   = 0; 
   $this->NM_emb_tree_no = false; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ind_tree'] = 0;
   }
   elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['emb_tree_no']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['emb_tree_no'])
   { 
       $this->NM_emb_tree_no = true; 
   }
   $this->Ind_lig_mult = 0;
   $this->nm_data    = new nm_data("pt_br");
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("app_LiderResultado", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['iframe_menu'])
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "on";
   $this->nmgp_botoes['back'] = "on";
   $this->nmgp_botoes['forward'] = "on";
   $this->nmgp_botoes['last'] = "on";
   $this->nmgp_botoes['filter'] = "on";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['xls'] = "on";
   $this->nmgp_botoes['xml'] = "on";
   $this->nmgp_botoes['csv'] = "on";
   $this->nmgp_botoes['rtf'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->ordem_grid = ""; 
   $this->sc_proc_grid = false; 
   $this->Cor_Destaque    = ''; 
   $this->Cor_Selecionada = ''; 
   $this->NM_raiz_img = ""; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_salvo'];
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro'] = "";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro_ant']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro_ant'] = "";
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_busca']))
   { 
       $this->lider = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_busca']['lider']; 
       $tmp_pos = strpos($this->lider, "##@@");
       if ($tmp_pos !== false)
       {
           $this->lider = substr($this->lider, 0, $tmp_pos);
       }
       $this->nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_busca']['nota_media']; 
       $tmp_pos = strpos($this->nota_media, "##@@");
       if ($tmp_pos !== false)
       {
           $this->nota_media = substr($this->nota_media, 0, $tmp_pos);
       }
       $this->resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_busca']['resultado_medio']; 
       $tmp_pos = strpos($this->resultado_medio, "##@@");
       if ($tmp_pos !== false)
       {
           $this->resultado_medio = substr($this->resultado_medio, 0, $tmp_pos);
       }
       $this->total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_busca']['total_nota']; 
       $tmp_pos = strpos($this->total_nota, "##@@");
       if ($tmp_pos !== false)
       {
           $this->total_nota = substr($this->total_nota, 0, $tmp_pos);
       }
       $this->total_resultado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_busca']['total_resultado']; 
       $tmp_pos = strpos($this->total_resultado, "##@@");
       if ($tmp_pos !== false)
       {
           $this->total_resultado = substr($this->total_resultado, 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
   elseif (isset($_SESSION['nm_aba_bg_color']))
   {
       $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
       $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
   }
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "app_LiderResultado/app_LiderResultado_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "app_LiderResultado_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_LiderResultado.php" ; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new app_LiderResultado_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['scriptcase']['sc_num_img']))
   { 
       $_SESSION['scriptcase']['sc_num_img'] = 1;
   } 
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid'] = 10 ;  
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid']; 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_select']; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra']["LIDER"] = "asc"; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_ant']  = '' ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp']  = "" ; 
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra'][$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "inicio" ;  
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid'] = ""; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra'][$nmgp_ordem] == "asc") 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra'][$nmgp_ordem] = "desc"; 
           }   
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra'][$nmgp_ordem] = "asc"; 
           }   
       }   
       else   
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid'] = $nmgp_ordem  ; 
           $this->ordem_grid = $nmgp_ordem; 
       }   
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "inicio" ;  
       if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] == "")  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] = " desc" ; 
       } 
       else   
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] = "" ;  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_salvo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cond_pesq'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_filtro'];
//
//--------- Controle da Navegação
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao']       = "igual" ; 
   } 
   if ($this->NM_opcao == "pdf" || $_SESSION['scriptcase']['contr_link_emb'] == "pdf") 
   { 
       $this->Ini->cor_bg_table     = $this->Ini->cor_bg_grid; 
   } 
   if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
   { 
       $this->Ini->NM_pdf_bg_ok     = false;
       $this->Ini->cor_bg_table     = "#FFFFFF" ; 
       $this->Ini->cor_borda        = "#000000" ; 
       $this->Ini->cor_bg_grid      = "#FFFFFF" ; 
       $this->Ini->cor_cab_grid     = "#FFFFFF" ; 
       $this->Ini->cor_txt_cab_grid = "#000000" ; 
       $this->Ini->cor_barra_nav    = "#FFFFFF" ; 
       $this->Ini->cor_titulo       = "#FFFFFF" ; 
       $this->Ini->cor_txt_titulo   = "#000000" ; 
       $this->Ini->cor_grid_impar   = "#FFFFFF" ; 
       $this->Ini->cor_grid_par     = "#FFFFFF" ; 
       $this->Ini->cor_txt_grid_impar = "#000000" ; 
       $this->Ini->cor_txt_grid_par = "#000000" ; 
       $this->Ini->cor_lin_sub_tot  = "#FFFFFF" ; 
       $this->Ini->cor_txt_sub_tot  = "#000000" ; 
       $this->Ini->cor_lin_grupo    = "#FFFFFF" ; 
       $this->Ini->cor_txt_grupo    = "#000000" ; 
       $this->Ini->cor_lin_tot      = "#FFFFFF" ; 
       $this->Ini->cor_txt_tot      = "#000000" ; 
       $this->Ini->cor_link_cab     = "#000000" ; 
       $this->Ini->cor_link_dados_impar = "#000000" ; 
       $this->Ini->cor_link_dados_par = "#000000" ; 
       $this->Ini->cor_rod_grid     = "#FFFFFF" ; 
       $this->Ini->cor_txt_rod_grid = "#000000" ; 
       $this->Ini->img_fun_pag      = "" ; 
       $this->Ini->img_fun_cab      = "" ; 
       $this->Ini->img_fun_tit      = "" ; 
       $this->Ini->img_fun_gru      = "" ; 
       $this->Ini->img_fun_tot      = "" ; 
       $this->Ini->img_fun_sub      = "" ; 
       $this->Ini->img_fun_imp      = "" ; 
       $this->Ini->img_fun_par      = "" ; 
   }   
// 
   $this->count_ger = 0;
   $this->sum_nota_media = 0;
   $this->sum_resultado_medio = 0;
   $this->sum_total_nota = 0;
   $this->sum_total_resultado = 0;
   $this->arg_sum_lider = "";
   $this->count_lider = 0;
   $this->sum_lider_nota_media = 0;
   $this->sum_lider_resultado_medio = 0;
   $this->sum_lider_total_nota = 0;
   $this->sum_lider_total_resultado = 0;
   $nm_cons_referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $tmp_pos = strpos($nm_cons_referer, "?");
   if ($tmp_pos === false)
   { }
   else
   {
       $nm_cons_referer = substr($_SERVER['HTTP_REFERER'], 0, $tmp_pos); 
   }
   $nm_teste_referer = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
   $tmp_pos = strlen($nm_cons_referer);
   $nm_cons_referer = str_replace($nm_teste_referer, "", $nm_cons_referer); 
   if (strlen($nm_cons_referer) < $tmp_pos)
   { 
       $nm_cons_referer = $nm_teste_referer;
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "final") 
   { 
       $this->Tot->quebra_geral() ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1];
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_ant'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro_ant'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['referer'] != $nm_cons_referer || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total']);
       $this->Tot->quebra_geral() ; 
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['graf_lab']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['graf_lab'] = "";  
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['contr_array_resumo'] = "NAO";
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1];
       $this->sum_nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][2];
       $this->sum_resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][3];
       $this->sum_total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][4];
       $this->sum_total_resultado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][5];
   } 
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1];
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'];  
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campos_filtro'];  
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['referer'] = $nm_teste_referer;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start-- ; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- Acessa dados da consulta
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT LIDER, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT LIDER, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT LIDER, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT LIDER, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_quebra'] as $campo => $ordem) 
   {
           if (!empty($campos_order)) 
           {
               $campos_order .= ", ";
           }
           $campos_order .= $campo . " " . $ordem;
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $campos_order . ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       $nmgp_order_by = " order by " . $campos_order . ", " . $campos_order_select; 
   } 
   else 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['paginacao']))
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = &$this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = &$this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = "N&atilde;o h&aacute; registros a exibir"; 
   }  
   else 
   { 
       $this->lider = $this->rs_grid->fields[0] ;  
       $this->nota_media = $this->rs_grid->fields[1] ;  
       $this->nota_media = (string)$this->nota_media;
       $this->resultado_medio = $this->rs_grid->fields[2] ;  
       $this->resultado_medio = (string)$this->resultado_medio;
       $this->total_nota = $this->rs_grid->fields[3] ;  
       $this->total_nota = (string)$this->total_nota;
       $this->total_resultado = $this->rs_grid->fields[4] ;  
       $this->total_resultado = (string)$this->total_resultado;
       $this->arg_sum_lider = " = " . $this->Db->qstr($this->lider);
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->lider_Old = $this->lider ; 
       $this->quebra_lider($this->lider) ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->lider = $this->rs_grid->fields[0] ;  
           $this->nota_media = $this->rs_grid->fields[1] ;  
           $this->resultado_medio = $this->rs_grid->fields[2] ;  
           $this->total_nota = $this->rs_grid->fields[3] ;  
           $this->total_resultado = $this->rs_grid->fields[4] ;  
       } 
   } 
// 
   if (!$this->Print_All && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_pdf'] == "pdf"))
   { 
       $this->NM_raiz_img = $this->Ini->root;
       $this->Ini->NM_pdf_bg_ok = false;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['pdf_res'])
       {
           //---------- Gauge ----------
?>
<HTML>
<HEAD>
 <TITLE>Relatório das Notas do Líder - Resultado Geral :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY bgcolor="<?php echo urldecode($_GET['sc_apbgcol']); ?>" <?php if ("" != $this->Ini->img_fun_pag) { echo "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_pag . "\""; } ?>>
 <style type="text/css">
 </style>
<FONT face="<?php echo $this->Ini->pag_fonte_tipo; ?>" color="<?php echo $this->Ini->cor_txt_pag; ?>" size="<?php echo $this->Ini->pag_fonte_tamanho; ?>">
Gerando PDF...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = isset($_GET['pbfile']) ? urldecode($_GET['pbfile']) : $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               fwrite($this->progress_fp, "1_#NM#_Iniciando gera&ccedil;&atilde;o do PDF...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       if ("" != $this->Ini->img_fun_pag && $this->Ini->NM_pdf_bg_ok)
       {
           $nm_fundo_pagina = " background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_pag . "\""; 
       }
       $nm_saida->saida("  <HTML>\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Relatório das Notas do Líder - Resultado Geral</TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\" />\r\n");
       $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       $nm_saida->saida("  </HEAD>\r\n");
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0" marginheight="0" topmargin="0" leftmargin="0"' : '';
       $nm_saida->saida("  <body bgcolor=\"" . $this->Ini->cor_bg_grid . "\" $nm_fundo_pagina " . $str_iframe_body . ">\r\n");
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
       { 
       if ($_SESSION['scriptcase']['sc_htmldoc_Version'] != "htmldocd")
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['pdf_res'])
           {
                   $nm_saida->saida("  <A NAME=\"RESUMO\" LEVEL=1></A>\r\n");
           } 
           else
           {
                   $nm_saida->saida("  <A NAME=\"Líder\" LEVEL=1></A>\r\n");
           } 
       }
       else
       {
               $nm_saida->saida("  <H1></H1>\r\n");
       }
       } 
       $tab_align  = "center";
       $tab_valign = "top";
       $tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['pdf_res'])
       {
           return;
       } 
       $nm_saida->saida("   <TABLE border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"" . $tab_align . "\" valign=\"" . $tab_valign . "\" " . $tab_width . ">\r\n");
       $nm_saida->saida("    <TR>\r\n");
       $nm_saida->saida("    <TD  valign=\"top\" " . $tab_width . ">\r\n");
       $nm_saida->saida("  <TABLE border=\"0\" cellpadding=\"1\" cellspacing=\"0\" width=\"100%\">\r\n");
   }  
 }  
 function NM_cor_embutida()
 {  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_bg_grid']))
       {
           $this->Ini->cor_bg_grid       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_bg_grid']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_cab_grid']))
       {
           $this->Ini->cor_cab_grid      = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_cab_grid']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_cab_grid']))
       {
           $this->Ini->cor_txt_cab_grid  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_cab_grid']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cab_fonte_tipo']))
       {
           $this->Ini->cab_fonte_tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cab_fonte_tipo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cab_fonte_tamanho']))
       {
           $this->Ini->cab_fonte_tamanho = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cab_fonte_tamanho'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_barra_nav']))
       {
           $this->Ini->cor_barra_nav     = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_barra_nav'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_titulo']))
       {
           $this->Ini->cor_titulo        = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_titulo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_titulo']))
       {
           $this->Ini->img_fun_tit       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_titulo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_titulo']))
       {
           $this->Ini->cor_txt_titulo    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_titulo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['titulo_fonte_tipo']))
       {
           $this->Ini->titulo_fonte_tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['titulo_fonte_tipo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['titulo_fonte_tamanho']))
       {
           $this->Ini->titulo_fonte_tamanho = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['titulo_fonte_tamanho'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_grid_impar']))
       {
           $this->Ini->cor_grid_impar    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_grid_impar']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_grid_par']))
       {
           $this->Ini->cor_grid_par      = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_grid_par']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_grid_impar']))
       {
           $this->Ini->img_fun_imp       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_grid_impar']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_grid_par']))
       {
           $this->Ini->img_fun_par       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_grid_par']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_grid_impar']))
       {
           $this->Ini->cor_txt_grid_impar = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_grid_impar']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_grid_par']))
       {
           $this->Ini->cor_txt_grid_par  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_grid_par']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tipo_impar']))
       {
           $this->Ini->texto_fonte_tipo_impar = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tipo_impar'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tipo_par']))
       {
           $this->Ini->texto_fonte_tipo_par  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tipo_par'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tamanho_impar']))
       {
           $this->Ini->texto_fonte_tamanho_impar = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tamanho_impar'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tamanho_par']))
       {
           $this->Ini->texto_fonte_tamanho_par = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['texto_fonte_tamanho_par'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_lin_grupo']))
       {
           $this->Ini->cor_lin_grupo       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_lin_grupo']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_lin_grupo']))
       {
           $this->Ini->img_fun_gru       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_lin_grupo']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_grupo']))
       {
           $this->Ini->cor_txt_grupo       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_grupo']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['grupo_fonte_tipo']))
       {
           $this->Ini->grupo_fonte_tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['grupo_fonte_tipo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['grupo_fonte_tamanho']))
       {
           $this->Ini->grupo_fonte_tamanho = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['grupo_fonte_tamanho'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_lin_sub_tot']))
       {
           $this->Ini->cor_lin_sub_tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_lin_sub_tot']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_lin_sub_tot']))
       {
           $this->Ini->img_fun_sub     = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_lin_sub_tot']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_sub_tot']))
       {
           $this->Ini->cor_txt_sub_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_sub_tot'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['sub_tot_fonte_tipo']))
       {
           $this->Ini->sub_tot_fonte_tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['sub_tot_fonte_tipo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['sub_tot_fonte_tamanho']))
       {
           $this->Ini->sub_tot_fonte_tamanho = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['sub_tot_fonte_tamanho'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_lin_tot']))
       {
           $this->Ini->cor_lin_tot         = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_lin_tot']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_lin_tot']))
       {
           $this->Ini->img_fun_tot         = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_lin_tot']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_tot']))
       {
           $this->Ini->cor_txt_tot         = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_txt_tot']; 
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['tot_fonte_tipo']))
       {
           $this->Ini->tot_fonte_tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['tot_fonte_tipo'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['tot_fonte_tamanho']))
       {
           $this->Ini->tot_fonte_tamanho = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['tot_fonte_tamanho'];
       }
   }
 }  
// 
//----- Prepara cabeçalho da Grid
 function cabecalho()
 {
   global
          $nm_saida;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_tab_cor_fun  = ""; 
   $nm_tab_cor_bor  = ""; 
   $nm_tab_img_fun  = ""; 
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
   $nm_data_fixa = date("d/m/Y"); 
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cond_pesq'];
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
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cond_pesq'], $trab_pos + 5) == "or")  ? "ou " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cond_pesq'], $trab_pos + 5) == "and") ? "e " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cond_pesq'], 0, $trab_pos);
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
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   if ("" != $this->Ini->cor_bg_table) 
   {
       $nm_tab_cor_fun = "bgcolor=\"" . $this->Ini->cor_bg_table . "\""; 
   }
   if ("" != $this->Ini->cor_borda) 
   {
       $nm_tab_cor_bor = "bordercolor=\"" . $this->Ini->cor_borda . "\""; 
   }
   if ("" != $this->Ini->img_fun_cab && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tab_img_fun = "background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_cab . "\""; 
   }
   $nm_saida->saida(" <TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD>\r\n");
   } 
   else 
   { 
       $nm_saida->saida("  <TD>\r\n");
   } 
   $nm_saida->saida("   <TABLE border=\"" . $this->Ini->border_grid . "\" cellspacing=\"0\" cellpadding=\"3\" " . $nm_tab_cor_fun . " " . $nm_tab_cor_bor . " align=\"center\" width=\"100%\">\r\n");
   $nm_saida->saida("    <TR align=\"center\">\r\n");
   $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_cab_grid . "\">\r\n");
   $nm_saida->saida("      <TABLE " . $nm_tab_img_fun . " border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" rowspan=\"3\">   <IMG SRC=\"" . $this->NM_raiz_img . $this->Ini->path_imag_cab . "/grp__NM__Logo3.JPG\" BORDER=\"0\"/></TD>\r\n");
   $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\">Relatório das Notas do Líder - Resultado Geral</FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">&nbsp; &nbsp;</TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\"><FONT size=\"" . $this->Ini->cab_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_cab_grid . "\" face=\"" . $this->Ini->cab_fonte_tipo . "\"></FONT></TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("      </TABLE>\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $nm_tit_img_fun = "";
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_label']) 
   {
       $this->Ini->img_fun_tit = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['img_titulo']; 
       $this->Ini->cor_titulo  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['esquema_cores']['cor_titulo']; 
   }
   if ("" != $this->Ini->img_fun_tit && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tit_img_fun = "background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_tit . "\""; 
   }
   else 
   { 
       $nm_tit_img_fun = "bgcolor=\"" . $this->Ini->cor_titulo . "\""; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_app_LiderResultado#?#" . $nm_seq_titulos . "\" align=\"center\" bgcolor=\"" . $this->Ini->cor_titulo . "\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq']) { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>&nbsp;</B></FONT></TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf") { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>&nbsp;</B></FONT></TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_seq'] == "S")) { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>&nbsp;</B></FONT></TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab($nm_tit_img_fun);
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_lider($nm_tit_img_fun)
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['lider'])) ? $this->New_label['lider'] : "Líder"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels']['lider'] = "" .  nl2br($SC_Label)  . "";
   if (!isset($this->NM_cmp_hidden['lider']) || $this->NM_cmp_hidden['lider'] != "off") { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = "scriptcase__NM__sort_asc.gif";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp'] == 'LIDER')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] == " desc")
          {
              $nome_img = "scriptcase__NM__sort_desc.gif";
          }
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('LIDER')\"><font color=\"" . $this->Ini->cor_link_cab . "\">" . nl2br($SC_Label) . "</font>" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</B></FONT></TD>\r\n");
   } 
 }
 function NM_label_nota_media($nm_tit_img_fun)
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nota_media'])) ? $this->New_label['nota_media'] : "Nota - Média"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels']['nota_media'] = "" .  nl2br($SC_Label)  . "";
   if (!isset($this->NM_cmp_hidden['nota_media']) || $this->NM_cmp_hidden['nota_media'] != "off") { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = "scriptcase__NM__sort_asc.gif";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp'] == 'NOTA_MEDIA')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] == " desc")
          {
              $nome_img = "scriptcase__NM__sort_desc.gif";
          }
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('NOTA_MEDIA')\"><font color=\"" . $this->Ini->cor_link_cab . "\">" . nl2br($SC_Label) . "</font>" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</B></FONT></TD>\r\n");
   } 
 }
 function NM_label_resultado_medio($nm_tit_img_fun)
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['resultado_medio'])) ? $this->New_label['resultado_medio'] : "Resultado - Média"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels']['resultado_medio'] = "" .  nl2br($SC_Label)  . "";
   if (!isset($this->NM_cmp_hidden['resultado_medio']) || $this->NM_cmp_hidden['resultado_medio'] != "off") { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = "scriptcase__NM__sort_asc.gif";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp'] == 'RESULTADO_MEDIO')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] == " desc")
          {
              $nome_img = "scriptcase__NM__sort_desc.gif";
          }
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('RESULTADO_MEDIO')\"><font color=\"" . $this->Ini->cor_link_cab . "\">" . nl2br($SC_Label) . "</font>" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</B></FONT></TD>\r\n");
   } 
 }
 function NM_label_total_nota($nm_tit_img_fun)
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['total_nota'])) ? $this->New_label['total_nota'] : "Nota - Total"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels']['total_nota'] = "" .  nl2br($SC_Label)  . "";
   if (!isset($this->NM_cmp_hidden['total_nota']) || $this->NM_cmp_hidden['total_nota'] != "off") { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = "scriptcase__NM__sort_asc.gif";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp'] == 'TOTAL_NOTA')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] == " desc")
          {
              $nome_img = "scriptcase__NM__sort_desc.gif";
          }
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('TOTAL_NOTA')\"><font color=\"" . $this->Ini->cor_link_cab . "\">" . nl2br($SC_Label) . "</font>" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</B></FONT></TD>\r\n");
   } 
 }
 function NM_label_total_resultado($nm_tit_img_fun)
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['total_resultado'])) ? $this->New_label['total_resultado'] : "Resultado - Média"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['labels']['total_resultado'] = "" .  nl2br($SC_Label)  . "";
   if (!isset($this->NM_cmp_hidden['total_resultado']) || $this->NM_cmp_hidden['total_resultado'] != "off") { 
   $nm_saida->saida("     <TD " . $nm_tit_img_fun . "  align=\"left\" valign=\"middle\"><FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\"><B>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = "scriptcase__NM__sort_asc.gif";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_cmp'] == 'TOTAL_RESULTADO')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ordem_desc'] == " desc")
          {
              $nome_img = "scriptcase__NM__sort_desc.gif";
          }
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('TOTAL_RESULTADO')\"><font color=\"" . $this->Ini->cor_link_cab . "\">" . nl2br($SC_Label) . "</font>" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</B></FONT></TD>\r\n");
   } 
 }
// 
//----- Processamento da Grid
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_tab_cor_fun, $nm_tab_cor_bor, $nm_contr_album;
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ini_cor_grid'] == "par")
       {
           $this->Ini->cor_lin_grid   = $this->Ini->cor_grid_par;
           $this->Ini->cor_grid_par   = $this->Ini->cor_grid_impar;
           $this->Ini->cor_grid_impar = $this->Ini->cor_lin_grid;
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->Rows_span = 0;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $nm_tab_cor_fun = ""; 
   $nm_tab_cor_bor = ""; 
   $nm_tit_img_fun = ""; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['app_LiderResultado']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_grid'])
           {
               $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cols_emb'];
               $nm_saida->saida("  <TR> <TD colspan = \"$NM_span_sem_reg\" align=\"center\" bgcolor=\"" . $this->Ini->cor_grid_impar . "\">\r\n");
               $nm_saida->saida("     <font face=\"Tahoma, Arial, sans-serif\" color=\"#000000\" size=\"2\"><b>" . $this->nm_grid_sem_reg . "</b></font></TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_app_LiderResultado#?#$nm_seq_execucoes\"  cellspacing=\"0\" cellpadding=\"0\">\r\n");
               $nm_saida->saida("  <tr><td><table>\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $nm_saida->saida("  <tr><td colspan = \"6\" align=\"center\" bgcolor=\"" . $this->Ini->cor_grid_impar . "\">\r\n");
               $nm_saida->saida("     <font face=\"Tahoma, Arial, sans-serif\" color=\"#000000\" size=\"2\"><b>" . $this->nm_grid_sem_reg . "</b></font>\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida("  <tr><td align=\"center\" bgcolor=\"" . $this->Ini->cor_grid_impar . "\"><font face=\"Tahoma, Arial, sans-serif\" color=\"#000000\" size=\"2\"><b>" . $this->nm_grid_sem_reg . "</b></font></td></tr>\r\n");
       }
       return;
   }
   if ("" != $this->Ini->cor_bg_table) 
   {
       $nm_tab_cor_fun = "bgcolor=\"" . $this->Ini->cor_bg_table . "\""; 
   }
   if ("" != $this->Ini->cor_borda) 
   {
       $nm_tab_cor_bor = "bordercolor=\"" . $this->Ini->cor_borda . "\""; 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_app_LiderResultado#?#$nm_seq_execucoes\" cellspacing=\"0\" cellpadding=\"0\">\r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
       $nm_id_aplicacao = " id=\"apl_app_LiderResultado#?#1\"";
   } 
   $nm_saida->saida(" <TR> \r\n");
   $nm_saida->saida("  <TD valign=\"top\">\r\n");
   $nm_saida->saida("   <TABLE border=\"" . $this->Ini->border_grid . "\" cellspacing=\"0\" cellpadding=\"3\" " . $nm_tab_cor_fun . " " . $nm_tab_cor_bor . " align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['cab_embutida'] != "S" )
      { 
          $this->label_grid($linhas);
      } 
   } 
   else 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $nm_inicio_pag = 0 ;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] = 0;
   } 
   if (isset($this->lider))
   {
       $this->quebra_lider_top() ; 
   }
   $this->nmgp_prim_pag_pdf = false;
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] + 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'])
   { 
          $nm_saida->saida("       <form name=\"Fpesq\" method=post>\r\n");
          $nm_saida->saida("       <input type=hidden name=\"nm_ret_psq\"> \r\n");
   } 
   $this->Ini->cor_lin_grid = $this->Ini->cor_grid_par;
   $this->Ini->cor_txt_grid = $this->Ini->cor_txt_grid_par;
   $this->Ini->texto_fonte_tipo = $this->Ini->texto_fonte_tipo_par;
   $this->Ini->texto_fonte_tamanho = $this->Ini->texto_fonte_tamanho_par;
   $this->Ini->cor_link_dados = $this->Ini->cor_link_dados_par;
   $this->Ini->qual_linha   = "par";
   $this->NM_flag_antigo = FALSE;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 0;
          //---------- Gauge ----------
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_Formatando registro " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->lider = $this->rs_grid->fields[0] ;  
          $this->nota_media = $this->rs_grid->fields[1] ;  
          $this->nota_media = (string)$this->nota_media;
          $this->resultado_medio = $this->rs_grid->fields[2] ;  
          $this->resultado_medio = (string)$this->resultado_medio;
          $this->total_nota = $this->rs_grid->fields[3] ;  
          $this->total_nota = (string)$this->total_nota;
          $this->total_resultado = $this->rs_grid->fields[4] ;  
          $this->total_resultado = (string)$this->total_resultado;
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
          {
              $this->Res->nm_acum_res_unit($this->rs_grid);
          }
          $this->arg_sum_lider = " = " . $this->Db->qstr($this->lider);
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] + 1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['rows_emb']++;
          if ($this->lider != $this->lider_Old) 
          {  
              if (isset($this->lider_Old))
              {
                 $this->quebra_lider_bot() ; 
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->lider_Old = $this->lider ; 
              $this->quebra_lider($this->lider) ; 
              if (isset($this->lider_Old))
              {
                 $this->quebra_lider_top() ; 
              }
          } 
          $this->sc_proc_grid = true;
          $nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final']; 
          $this->Ini->cor_txt_grid = ($this->Ini->cor_txt_grid == $this->Ini->cor_txt_grid_impar ? $this->Ini->cor_txt_grid_par : $this->Ini->cor_txt_grid_impar); 
          $this->Ini->texto_fonte_tipo = ($this->Ini->texto_fonte_tipo == $this->Ini->texto_fonte_tipo_impar ? $this->Ini->texto_fonte_tipo_par : $this->Ini->texto_fonte_tipo_impar); 
          $this->Ini->texto_fonte_tamanho = ($this->Ini->texto_fonte_tamanho == $this->Ini->texto_fonte_tamanho_impar ? $this->Ini->texto_fonte_tamanho_par : $this->Ini->texto_fonte_tamanho_impar); 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->Ini->cor_link_dados_impar ? $this->Ini->cor_link_dados_par : $this->Ini->cor_link_dados_impar); 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
             $this->Ini->img_linha    = ("" != $this->Ini->img_fun_imp && $this->Ini->NM_pdf_bg_ok) ? ("background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_imp . "\"") : "";
             $this->Ini->cor_lin_grid = $this->Ini->cor_grid_impar;
          }
          else
          {
             $this->Ini->img_linha    = ("" != $this->Ini->img_fun_par && $this->Ini->NM_pdf_bg_ok) ? ("background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_par . "\"") : "";
             $this->Ini->cor_lin_grid = $this->Ini->cor_grid_par;
          }
          $nm_saida->saida("    <TR >\r\n");
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\" NOWRAP=\"nowrap\" align=\"center\" valign=\"top\" WIDTH=\"1\" ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\"> <input type=radio name=\"Rad_psq\" value=\"\" onclick = \"document.Fpesq.nm_ret_psq.value='" . $this->$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['dado_psq_ret'] . "'\"></FONT></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['mostra_edit'] != "N"){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\" NOWRAP=\"nowrap\" align=\"center\" valign=\"top\" WIDTH=\"40\" ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\"> <a href=\"javascript:nm_gp_submit3('" . $this->lider . ";" . $this->nota_media . ";" . $this->resultado_medio . ";" . $this->total_nota . ";" . $this->total_resultado . "', 'detalhe')\"><img border=\"0\" src=\"" . $this->Ini->path_img_global . "/nm_detalhe.gif\" title=\"Ver detalhes\" align=\"absmiddle\"/></a> </FONT></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['mostra_edit'] == "N"){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\" NOWRAP=\"nowrap\" align=\"center\" valign=\"top\" WIDTH=\"40\" ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\"> <a href=\"javascript:nm_gp_submit3('" . $this->lider . ";" . $this->nota_media . ";" . $this->resultado_medio . ";" . $this->total_nota . ";" . $this->total_resultado . "', 'detalhe')\"><img border=\"0\" src=\"" . $this->Ini->path_img_global . "/nm_detalhe.gif\" title=\"Ver detalhes\" align=\"absmiddle\"/></a></FONT></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_seq'] == "S")) { 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\" NOWRAP=\"nowrap\" align=\"right\" valign=\"top\"  ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\">" . $seq_det . "</FONT></TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['paginacao']))
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($this->rs_grid->EOF) 
   { 
       if (isset($this->lider_Old))
       {
           $this->quebra_lider_bot() ; 
       }
  
   }  
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_total'] == "S")
   { 
       $this->quebra_geral_top() ;
       $this->quebra_geral_bot() ;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
   { 
       $this->sumario() ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_grid'])
   { 
       return; 
   } 
          $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
   $nm_saida->saida(" </TR>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
   { 
      ksort($this->Res->array_total_lider);
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['arr_total']['lider'] = $this->Res->array_total_lider;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['contr_array_resumo'] = "OK";
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
       $nm_saida->saida("</TR>\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
       { 
            $this->nmgp_barra_bot();
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
       { 
       $nm_saida->saida("</TABLE>\r\n");
       } 
 }
 function NM_grid_lider()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['lider']) || $this->NM_cmp_hidden['lider'] != "off") { 
          $conteudo = trim($this->lider); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\"  align=\"left\" valign=\"top\"  ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
      }
 }
 function NM_grid_nota_media()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nota_media']) || $this->NM_cmp_hidden['nota_media'] != "off") { 
          $conteudo = trim($this->nota_media); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\"  align=\"left\" valign=\"top\"  ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
      }
 }
 function NM_grid_resultado_medio()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['resultado_medio']) || $this->NM_cmp_hidden['resultado_medio'] != "off") { 
          $conteudo = trim($this->resultado_medio); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\"  align=\"left\" valign=\"top\"  ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
      }
 }
 function NM_grid_total_nota()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['total_nota']) || $this->NM_cmp_hidden['total_nota'] != "off") { 
          $conteudo = trim($this->total_nota); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\"  align=\"left\" valign=\"top\"  ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
      }
 }
 function NM_grid_total_resultado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['total_resultado']) || $this->NM_cmp_hidden['total_resultado'] != "off") { 
          $conteudo = trim($this->total_resultado); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" " . $this->Ini->img_linha . " bgcolor=\"" . $this->Ini->cor_lin_grid . "\"  align=\"left\" valign=\"top\"  ><FONT size=\"" . $this->Ini->texto_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grid . "\" face=\"" . $this->Ini->texto_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 7;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
   {
       $this->NM_colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
       {
           $this->NM_colspan--; 
       }
   } 
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
 }
 function nm_quebra_pagina($nm_parms)
 {
    global $nm_saida,  $nm_tab_cor_fun, $nm_tab_cor_bor;
    if ($this->nmgp_prim_pag_pdf && $nm_parms == "pagina")
    {
        $this->nmgp_prim_pag_pdf = false;
        return;
    }
    $this->Ini->nm_cont_lin++;
    if (($this->Ini->nm_limite_lin > 0 && $this->Ini->nm_cont_lin > $this->Ini->nm_limite_lin) || $nm_parms == "pagina" || $nm_parms == "resumo" || $nm_parms == "total")
    {
        $this->Ini->nm_cont_lin = 1;
        $nm_saida->saida("</TABLE></TD></TR>\r\n");
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE></TD></TR>\r\n");
                $nm_saida->saida("<tr style=\"page-break-before:always;\"><td></td></tr>\r\n");
                $nm_saida->saida("<TR><TD><TABLE width=\"100%\">\r\n");
            }
            else
            {
                $nm_saida->saida("<tr><td style=\"page-break-before:always;\"></td></tr>\r\n");
            }
        }
        else
        {
            $nm_saida->saida("<!-- NEW PAGE -->\r\n");
        }
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
        {
            $this->cabecalho();
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD valign=\"top\"> \r\n");
   $nm_saida->saida("   <TABLE border=\"" . $this->Ini->border_grid . "\" cellspacing=\"0\" cellpadding=\"3\" " . $nm_tab_cor_fun . " " . $nm_tab_cor_bor . " align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($nm_parms != "resumo")
        {
            $this->label_grid();
        }
    }
 }
 function quebra_lider($lider) 
 {
   global
          $tot_lider;
   $this->sc_proc_quebra_lider = true; 
   $this->Tot->quebra_lider($lider, $this->arg_sum_lider);
   $conteudo = $tot_lider[0] ;  
   $this->count_lider = $tot_lider[1];
   $this->sum_lider_nota_media = $tot_lider[2];
   $this->sum_lider_resultado_medio = $tot_lider[3];
   $this->sum_lider_total_nota = $tot_lider[4];
   $this->sum_lider_total_resultado = $tot_lider[5];
   $this->campos_quebra_lider = array(); 
   $conteudo = $this->lider; 
   $this->campos_quebra_lider[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['lider']))
   {
       $this->campos_quebra_lider[0]['lab'] = $this->nmgp_label_quebras['lider']; 
   }
   else
   {
       $this->campos_quebra_lider[0]['lab'] = "Líder"; 
   }
   $this->sc_proc_quebra_lider = false; 
 } 
 function quebra_lider_top() 
 { global
          $lider_ant_desc, 
          $nm_saida, $tot_lider; 
   $lider_ant_desc = $this->campos_quebra_lider[0]['cmp'];
   static $cont_quebra_lider = 0; 
   $cont_quebra_lider++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['rows_emb']++;
   $link_div = "";
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ind_tree'];
       $link_div  = "<span align=\"left\">";
       $link_div .= "<input type=\"image\" id=\"b_open_app_LiderResultado_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.all.b_open_app_LiderResultado_" . $this->NM_cont_body . ".style.display = 'none'; document.all.b_close_app_LiderResultado_" . $this->NM_cont_body . ".style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_app_LiderResultado, 'app_LiderResultado'); return false;\" src=\"" . $this->Ini->path_img_global . "/fld_expand.gif\">";
       $link_div .= "<input type=\"image\" id=\"b_close_app_LiderResultado_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.all.b_close_app_LiderResultado_" . $this->NM_cont_body . ".style.display = 'none'; document.all.b_open_app_LiderResultado_" . $this->NM_cont_body . ".style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_app_LiderResultado, 'app_LiderResultado'); return false;\" src=\"" . $this->Ini->path_img_global . "/fld_contract.gif\">";
       $link_div .= "</span>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['app_LiderResultado'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_app_LiderResultado_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   {
       if($_SESSION['scriptcase']['sc_htmldoc_Version'] != "htmldocd")
       {
           $nm_nivel_book_pdf = "<a NAME=\"" . $this->campos_quebra_lider[0]['cmp'] . "\" LEVEL=\"2\">";
           $nm_fecha_pdf_new = "</a>";
       }
       else
       {
           $nm_nivel_book_pdf = "<a LEVEL=\"2\"";
           $nm_fecha_pdf_old = "</a>";
       }
   }
   $nm_tot_img_fun = ""; 
   if ("" != $this->Ini->img_fun_gru && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tot_img_fun = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->NM_raiz_img . $this->Ini->img_fun_gru . "\""; 
   }
   $conteudo = $tot_lider[0] ;  
   $this->NM_calc_span();
   $colspan = $this->NM_colspan;
   $this->Label_lider = ""; 
   foreach ($this->campos_quebra_lider as $cada_campo) 
   { 
       if (!empty($this->Label_lider))
       { 
           $this->Label_lider .= " <br />";
       } 
       $this->Label_lider .= $cada_campo['lab'] . " => ";
       $this->Label_lider .= $cada_campo['cmp'];
   } 
   $nm_saida->saida("    <TR>\r\n");
   $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_grupo . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        <FONT size=\"" . $this->Ini->grupo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_grupo . "\" face=\"" . $this->Ini->grupo_fonte_tipo . "\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_lider . $nm_fecha_pdf_old . "</FONT>\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['app_LiderResultado'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_app_LiderResultado_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_lider_bot() 
 { global 
          $lider_ant_desc, 
          $nm_saida, $tot_lider; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['rows_emb']++;
   $lider_ant_desc = $this->campos_quebra_lider[0]['cmp'];
   $nm_tot_img_fun = ""; 
   if ("" != $this->Ini->img_fun_sub && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tot_img_fun = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->NM_raiz_img . $this->Ini->img_fun_sub . "\""; 
   }
       $nm_saida->saida("    <TR>\r\n");
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "lider" && (!isset($this->NM_cmp_hidden['lider']) || $this->NM_cmp_hidden['lider'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nota_media" && (!isset($this->NM_cmp_hidden['nota_media']) || $this->NM_cmp_hidden['nota_media'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\"><B>&nbsp;</B></FONT></TD>\r\n");
           $colspan = 0;
      }
      $conteudo =  $tot_lider[2] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
    if ($Cada_cmp == "resultado_medio" && (!isset($this->NM_cmp_hidden['resultado_medio']) || $this->NM_cmp_hidden['resultado_medio'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\"><B>&nbsp;</B></FONT></TD>\r\n");
           $colspan = 0;
      }
      $conteudo =  $tot_lider[3] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
    if ($Cada_cmp == "total_nota" && (!isset($this->NM_cmp_hidden['total_nota']) || $this->NM_cmp_hidden['total_nota'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\"><B>&nbsp;</B></FONT></TD>\r\n");
           $colspan = 0;
      }
      $conteudo =  $tot_lider[4] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
    if ($Cada_cmp == "total_resultado" && (!isset($this->NM_cmp_hidden['total_resultado']) || $this->NM_cmp_hidden['total_resultado'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\"><B>&nbsp;</B></FONT></TD>\r\n");
           $colspan = 0;
      }
      $conteudo =  $tot_lider[5] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_sub_tot  . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->sub_tot_fonte_tamanho  . "\" color=\"" . $this->Ini->cor_txt_sub_tot . "\" face=\"" . $this->Ini->sub_tot_fonte_tipo  . "\"><B>&nbsp;</B></FONT></TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   else
   {
       $nm_saida->saida("   </TR> \r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_top() 
 { global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
 }
 function quebra_geral_bot() 
 { global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['rows_emb']++;
   $nm_nivel_book_pdf = "\"";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'])
   {
       $nm_nivel_book_pdf = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][0] . "\" LEVEL=\"1\"";
   }
   $nm_tot_img_fun = ""; 
   if ("" != $this->Ini->img_fun_tot && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tot_img_fun = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->NM_raiz_img . $this->Ini->img_fun_tot . "\""; 
   }
       $nm_saida->saida("    <TR>\r\n");
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'])
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "lider" && (!isset($this->NM_cmp_hidden['lider']) || $this->NM_cmp_hidden['lider'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nota_media" && (!isset($this->NM_cmp_hidden['nota_media']) || $this->NM_cmp_hidden['nota_media'] != "off"))
    {
       $conteudo =  "&nbsp;";
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">\r\n");
       $nm_saida->saida("       <B><a name=\"$nm_nivel_book_pdf>" . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][0] . " (" . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1] . ")</a></B>\r\n");
       $nm_saida->saida(" </FONT></TD>\r\n");
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][2] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
    if ($Cada_cmp == "resultado_medio" && (!isset($this->NM_cmp_hidden['resultado_medio']) || $this->NM_cmp_hidden['resultado_medio'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">&nbsp;</FONT></TD>\r\n");
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][3] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
    if ($Cada_cmp == "total_nota" && (!isset($this->NM_cmp_hidden['total_nota']) || $this->NM_cmp_hidden['total_nota'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">&nbsp;</FONT></TD>\r\n");
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][4] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
    if ($Cada_cmp == "total_resultado" && (!isset($this->NM_cmp_hidden['total_resultado']) || $this->NM_cmp_hidden['total_resultado'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">&nbsp;</FONT></TD>\r\n");
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][5] ; 
      $conteudo = "<B>" . $conteudo . "</B>";
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . " NOWRAP=\"nowrap\"  align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">" . $conteudo . "</FONT></TD>\r\n");
     }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $colspan . "\"" . " align=\"left\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">&nbsp;</FONT></TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   else
   {
       $nm_saida->saida("   </TR> \r\n");
   }
 } 
 function sumario() 
 { global $nm_saida; 
   $nm_tot_img_fun = ""; 
   if ("" != $this->Ini->img_fun_tot && $this->Ini->NM_pdf_bg_ok) 
   {
       $nm_tot_img_fun = "background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_tot . "\""; 
   }
   $nm_sumario = "[" . $this->nmgp_reg_inicial . " a " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['final'] . " de " .  $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['tot_geral'][1] . "]";
   $this->NM_calc_span();
   $nm_saida->saida("    <TR>\r\n");
   $nm_saida->saida("     <TD bgcolor=\"" . $this->Ini->cor_lin_tot . "\" " . $nm_tot_img_fun . "  " . "colspan=\"" . $this->NM_colspan . "\"" . " align=\"center\"><FONT size=\"" . $this->Ini->tot_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_tot . "\" face=\"" . $this->Ini->tot_fonte_tipo . "\">" . $nm_sumario . "</FONT></TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
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
   function nmgp_barra_top()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $nm_bar_img_fun  = ""; 
      if ("" != $this->Ini->img_fun_barra && $this->Ini->NM_pdf_bg_ok) 
      {
          $nm_bar_img_fun = " background=\"" . $this->NM_raiz_img . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_barra . "\""; 
      }
      $nm_saida->saida("      <form name=\"F0_top\" method=\"post\" action=\"app_LiderResultado.php\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" name=\"script_case_init\" value=\"" . $this->Ini->sc_page . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      <tr>\r\n");
      $nm_saida->saida("       <td> \r\n");
      $nm_saida->saida("        <table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" width=\"100%\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td nowrap=\"nowrap\" valign=\"middle\" align=\"center\"$nm_bar_img_fun bgcolor=\"" . $this->Ini->cor_barra_nav . "\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg))
          {
              $nm_saida->saida("          <input type=\"image\" name=\"brec\" onclick=\"document.F0_top.submit();\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_birpara.gif\" title=\"ir para\"align=\"absmiddle\"/> \r\n");
              $nm_saida->saida("          <input type=\"text\" name=\"rec\" value=\"" . $this->nm_grid_ini . "\" size=\"3\"/> \r\n");
          }
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['nav']))
          {
              if ($this->Rec_ini == 0)
              {
                  $nm_saida->saida("          <input id=\"first_top\" type=\"image\" name=\"sc_b_ini\" onclick=\"nm_gp_submit_rec('ini'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_binicio_off.gif\" title=\"Retornar para a primeira p&aacute;gina\" align=\"absmiddle\"/> \r\n");
              }
              else
              {
                  $nm_saida->saida("          <input id=\"first_top\" type=\"image\" name=\"sc_b_ini\" onclick=\"nm_gp_submit_rec('ini'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_binicio.gif\" title=\"Retornar para a primeira p&aacute;gina\" align=\"absmiddle\"/> \r\n");
              }
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['nav']))
          {
              if ($this->Rec_ini == 0)
              {
                  $nm_saida->saida("          <input id=\"back_top\" type=\"image\" name=\"sc_b_ret\" onclick=\"nm_gp_submit_rec('" . $this->Rec_ini . "'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bretorna_off.gif\" title=\"Retornar para a p&aacute;gina anterior\" align=\"absmiddle\"/> \r\n");
              }
              else
              {
                  $nm_saida->saida("          <input id=\"back_top\" type=\"image\" name=\"sc_b_ret\" onclick=\"nm_gp_submit_rec('" . $this->Rec_ini . "'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bretorna.gif\" title=\"Retornar para a p&aacute;gina anterior\" align=\"absmiddle\"/> \r\n");
              }
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['nav']))
          {
              $nm_saida->saida("          <input id=\"forward_top\" type=\"image\" name=\"sc_b_avc\" onclick=\"nm_gp_submit_rec('" . $this->Rec_fim . "'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bavanca.gif\" title=\"Avan&ccedil;ar para a pr&oacute;xima p&aacute;gina\" align=\"absmiddle\"/> \r\n");
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['nav']))
          {
              $nm_saida->saida("          <input id=\"last_top\" type=\"image\" name=\"sc_b_fim\" onclick=\"nm_gp_submit_rec('fim'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bfinal.gif\" title=\"Avan&ccedil;ar para a &uacute;ltima p&aacute;gina\" align=\"absmiddle\"/> \r\n");
          }
        if (empty($this->nm_grid_sem_reg))
        {
         $nm_saida->saida("          <input type=\"text\" name=\"nmgp_quant_linhas\" value=\"" . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['qt_lin_grid'] . "\" size=\"3\"/> \r\n");
         $nm_saida->saida("          <a href=\"javascript:document.F0_top.submit()\"><img border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bqt_linhas.gif\" title=\"Alterar quantidade de linhas da Grid\" align=\"absmiddle\"/></a> \r\n");
        }
      if ($this->nmgp_botoes['filter'] == "on")
      {
           $nm_saida->saida("          <input type=\"image\" name=\"sc_b_psq\" onclick=\"nm_gp_move('busca', '0'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bpesquisa.gif\" title=\"Pesquisar um registro no arquivo\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_pdf\" onclick=\"nm_gp_pdf('pdf', '0', 'cor', '1', '1', '1', '800', 'N', '10', 0, 0); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bpdf.gif\" title=\"Gerar PDF Colorido\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_xls\" onclick=\"nm_gp_move('xls', '0'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bexcel.gif\" title=\"Gerar XLS\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_xml\" onclick=\"nm_gp_move('xml', '0'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bxml.gif\" title=\"Gerar XML\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_csv\" onclick=\"nm_gp_move('csv', '0'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bcsv.gif\" title=\"Gerar CSV\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_rtf\" onclick=\"nm_gp_move('rtf', '0'); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_brtf.gif\" title=\"Gerar RTF\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_print\" onclick=\"nm_gp_print(); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bprint.gif\" title=\"Preparar para impress&atilde;o\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_sel_col\" onclick=\"nm_gp_sel_campos(); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bcolumns.gif\" title=\"Selecionar Colunas\" align=\"absmiddle\"/> \r\n");
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'] && empty($this->nm_grid_sem_reg))
      {
              $nm_saida->saida("          <input type=\"image\" name=\"sc_b_sort\" onclick=\"nm_gp_order_campos(); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bsort.gif\" title=\"Configurar Ordenação\" align=\"absmiddle\"/> \r\n");
      }
      if (is_file("app_LiderResultado_help.txt"))
      {
         $Arq_WebHelp = file("app_LiderResultado_help.txt"); 
         if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
         {
             $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
             $Tmp = explode(";", $Arq_WebHelp[0]); 
             foreach ($Tmp as $Cada_help)
             {
                 $Tmp1 = explode(":", $Cada_help); 
                 if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                 {
                    $nm_saida->saida("              <input type=\"image\" name=\"sc_b_help\" onclick=\"javascript:window.open('" . $this->Ini->path_help . $Tmp1[1] . "', 'Ajuda', 'resizable, scrollbars'); return false;\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bhelp.gif\" title=\"Ajuda\" align=\"absmiddle\"/> \r\n");
                 }
             }
         }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['b_sair'])
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_psq'])
      {
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $nm_saida->saida("          <input type=\"image\" name=\"sc_b_sai\" onclick=\"document.F5.action='$nm_url_saida'; document.F5.submit(); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif\" title=\"Voltar para aplica&ccedil;&atilde;o anterior\" align=\"absmiddle\"/> \r\n");
         } 
         elseif (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $nm_saida->saida("          <input type=\"image\" name=\"sc_b_sai\" onclick=\"document.F5.action='$nm_url_saida'; document.F5.submit(); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bsair.gif\" title=\"Sair da aplica&ccedil;&atilde;o\" align=\"absmiddle\"/> \r\n");
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
         $nm_saida->saida("          <input type=\"image\" name=\"sc_b_sai\" onclick=\"nm_escreve_window(); return false;\" accesskey=\"\" border=\"0\" src=\"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bvoltar.gif\" title=\"Voltar para aplica&ccedil;&atilde;o anterior\" align=\"absmiddle\"/> \r\n");
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("     </form> \r\n");
   }
   function nmgp_barra_bot()
   {
   }
//--- 
//--- Geração de gráficos para PDF
 function grafico_pdf()
 {
   global $nm_saida;
   require_once($this->Ini->path_aplicacao . "app_LiderResultado_grafico.class.php"); 
   $this->Graf  = new app_LiderResultado_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['array_graf_pdf']))
   {
       if ($_SESSION['scriptcase']['sc_htmldoc_Version'] != "htmldocd")
       {
           $nm_saida->saida("<B><a name=\"GR&Aacute;FICOS\" LEVEL=\"1\"></a></B>\r\n");
       }
       else
       {
           $nm_saida->saida("<!-- NEW PAGE -->\r\n");
           $nm_saida->saida("<B><a name=\"nm_graficos_pdf\" LEVEL=\"1\">GR&Aacute;FICOS</a></B>\r\n");
       }
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['array_graf_pdf'] as $campo_nivel)
       {
           $GLOBALS["campo"] = $campo_nivel[0];
           $GLOBALS["nivel_quebra"] = $campo_nivel[1];
           if (!empty($campo_nivel[2]))
           {
               $array_parm = explode("&", $campo_nivel[2]);
               foreach ($array_parm as $cada_parm)
               {
                   $parm = explode("=", $cada_parm);
                   $GLOBALS[$parm[0]] = $parm[1];
               }
           }
           $nm_saida->saida("<!-- NEW PAGE -->\r\n");
           $nm_saida->saida("<TABLE><TR><TD>\r\n");
           $this->Graf->monta_grafico();
           $nm_saida->saida("</TD></TR></TABLE>\r\n");
       }
   }
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</HTML>\r\n");
 }
//--- 
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
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $nm_contr_album;
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </body>\r\n");
   $nm_saida->saida("   <script language=\"javascript\">\r\n");
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
   {
       $temp = array();
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
       {
           $temp[] = $NM_aplic;
       }
       $temp = array_unique($temp);
       foreach ($temp as $NM_aplic)
       {
           echo "   NM_tab_" . $NM_aplic . " = new Array();\r\n";
       }
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
       {
           foreach ($resto as $NM_ind => $NM_quebra)
           {
               foreach ($NM_quebra as $NM_nivel => $NM_tipo)
               {
                   echo "   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n";
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['opc_liga']['nav']))
       { 
           $nm_saida->saida("   document.getElementById('forward_top').src = \"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bavanca_off.gif\";\r\n");
           $nm_saida->saida("   document.getElementById('last_top').src = \"" . $this->Ini->path_botoes . "/nm_scriptcase3_green_bfinal_off.gif\";\r\n");
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- Formulário para controle de navegação
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida, $nm_contr_album;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"app_LiderResultado.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave_det\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . $this->Ini->sc_page . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"app_LiderResultado.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . $this->Ini->sc_page . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"app_LiderResultado_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . $this->Ini->sc_page . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <script language=\"javascript\">\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   function over_tr(obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = 'css_lin_over';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       obj.className = 'css_lin_break';\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      document.F4.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F4.rec.value = campo ;\r\n");
   $nm_saida->saida("      document.F4.nmgp_opcao.value = \"rec\" ;\r\n");
   $nm_saida->saida("      document.F4.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value = campo ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value = \"igual\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action           = \"app_LiderResultado.php\"  ;\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target           = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_ordem.value = campo ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value = \"ordem\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action           = \"app_LiderResultado.php\"  ;\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(campo, opc) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_chave_det.value = campo ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"app_LiderResultado.php\"  ;\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"app_LiderResultado.php\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null) \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "app_LiderResultado/app_LiderResultado_iframe.php?scsess=" . session_id() . "&script_case_init=" . $this->Ini->sc_page . "&pbfile=" . urlencode($str_pbfile) . "&jspath=" . urlencode($this->Ini->path_js) . "&sc_apbgcol=" . urlencode($this->Ini->cor_bg_grid) . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_graf_pdf=\" + g;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.submit();  \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      window.open('" . $this->Ini->path_link . "app_LiderResultado/app_LiderResultado_config_print.php?nm_opc=AM&nm_cor=AM&language=pt_br', '', 'location=no,menubar=no,resizable=yes,scrollbars=no,status=no,toolbar=no,width=350,height=250,top=150,left=300'); return false;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "app_LiderResultado/app_LiderResultado_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . $this->Ini->sc_page . "&opcao=print&tp_print=' + tp + '&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var contr_grafico = \"S\"; \r\n");
   $nm_saida->saida("   var contr_idioma  = \"pt_br\"; \r\n");
   $nm_saida->saida("   function nm_gp_pdf(x, y, z, p, o, b, l, cl, f, lpdf, apdf)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      window.open('" . $this->Ini->path_link . "app_LiderResultado/app_LiderResultado_config_pdf.php?nm_opc=' + x + '&nm_target=' + y + '&nm_cor=' + z + '&papel=' + p + '&lpapel=' + lpdf + '&apapel=' + apdf + '&orientacao=' + o + '&bookmarks=' + b + '&largura=' + l + '&conf_larg=' + cl + '&conf_fonte=' + f + '&grafico=' + contr_grafico + '&language=' + contr_idioma + '&conf_socor=S', '', 'location=no,menubar=no,resizable=yes,scrollbars=no,status=no,toolbar=no,width=300,height=300,top=150,left=300');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_sel_campos()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "app_LiderResultado/app_LiderResultado_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . $this->Ini->sc_page . "','NM','location=no,menubar=no,resizable,scrollbars=no,status=no,toolbar=no, width=200, height=265,top=150,left=300');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_order_campos()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "app_LiderResultado/app_LiderResultado_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . $this->Ini->sc_page . "','NM','location=no,menubar=no,resizable,scrollbars=no,status=no,toolbar=no, width=200, height=265,top=150,left=300');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (largura != 0) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           largura = parseInt(largura) + 20;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"\", \"\", \"height=\" + altura + \", width=\" + largura + \"location=no, menubar=no, resizable=yes, scrollbars=yes, status=no, toolbar=no ,top=150,left=300\");\r\n");
   $nm_saida->saida("       NovaJanela.document.open();\r\n");
   $nm_saida->saida("       NovaJanela.document.write (\"<html><body leftmargin='0' topmargin='0' marginheight='0' marginwidth='0'>\");\r\n");
   $nm_saida->saida("       NovaJanela.document.write (\"<IMG SRC='\" + imagem + \"'/>\");\r\n");
   $nm_saida->saida("       NovaJanela.document.write (\"</body></html>\");\r\n");
   $nm_saida->saida("       NovaJanela.document.close();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3, campo4)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"&\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"&\" , \"**Ecom**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"#\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"#\" , \"**Jvel**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo4 + \"?script_case_init=" . $this->Ini->sc_page . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campo_psq_ret']) && empty($this->nm_grid_sem_reg))
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      $nm_saida->saida("          Obj_Form = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderResultado']['campo_psq_ret'] . ";\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"app_LiderResultado_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_outra_window(apl_lig)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      parms = '';\r\n");
   $nm_saida->saida("      for (x=0; x < document.F3.elements.length; x++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          parmsx = escape(document.F3.elements[x].name) + '=' + escape(document.F3.elements[x].value);\r\n");
   $nm_saida->saida("          parms = (parms != '') ? parms + '&' + parmsx : parmsx;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("      window.open(apl_lig + '?' + parms,'','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
