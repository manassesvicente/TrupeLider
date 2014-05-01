<?php

class app_LiderCompetencias_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $nmgp_botoes = array();
   var $ajax_return_fields = array();

   /**
    * Construtor da classe
    *
    * @access  public
    */
   function app_LiderCompetencias_pesq()
   {
   }

   /**
    * Verifica ação a realizar no Filtro
    *
    * @access  public
    * @global  string  $bprocessa  Flag indicativa para exibição ou processamento do formulário de filtro
    */
   function monta_busca()
   {
      global $bprocessa;
      if ($this->NM_ajax_flag)
      {
         $this->processa_ajax();
         $this->Db->Close(); 
         exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * Monta formulário do Filtro
    *
    * @access  public
    */
   function monta_formulario()
   {
      $this->init();
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * Inicializa variáveis do Filtro
    *
    * @access  public
    */
   function init()
   {
      $_SESSION['scriptcase']['sc_tab_meses']['pt_br']['int'] = array("Janeiro", "Fevereiro", "Mar&ccedil;o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
      $_SESSION['scriptcase']['sc_tab_meses']['pt_br']['abr'] = array("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
      $_SESSION['scriptcase']['sc_tab_dias']['pt_br']['int'] = array("Domingo", "Segunda", "Ter&ccedil;a", "Quarta", "Quinta", "Sexta", "S&aacute;bado");
      $_SESSION['scriptcase']['sc_tab_dias']['pt_br']['abr'] = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
      require_once($this->Ini->path_libs . "/nm_data.class.php");
      $this->nm_data = new nm_data("pt_br");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
   }

   function processa_ajax()
   {
      global 
      $lider_cond, $lider,
             $competencia_cond, $competencia,
             $nota_media_cond, $nota_media,
             $resultado_medio_cond, $resultado_medio,
             $total_nota_cond, $total_nota,
             $total_resultado_cond, $total_resultado,
      $NM_filters, $NM_filters_del, $nmgp_save_name, $NM_operador, $nmgp_save_option, $bprocessa, $Ajax_label, $Ajax_val, $Campo_bi, $Opc_bi;
      $this->init();
      if (isset($this->NM_ajax_info['param']['lider_cond']))
      {
          $lider_cond = $this->NM_ajax_info['param']['lider_cond'];
      }
      if (isset($this->NM_ajax_info['param']['lider']))
      {
          $lider = $this->NM_ajax_info['param']['lider'];
      }
      if (isset($this->NM_ajax_info['param']['competencia_cond']))
      {
          $competencia_cond = $this->NM_ajax_info['param']['competencia_cond'];
      }
      if (isset($this->NM_ajax_info['param']['competencia']))
      {
          $competencia = $this->NM_ajax_info['param']['competencia'];
      }
      if (isset($this->NM_ajax_info['param']['nota_media_cond']))
      {
          $nota_media_cond = $this->NM_ajax_info['param']['nota_media_cond'];
      }
      if (isset($this->NM_ajax_info['param']['nota_media']))
      {
          $nota_media = $this->NM_ajax_info['param']['nota_media'];
      }
      if (isset($this->NM_ajax_info['param']['resultado_medio_cond']))
      {
          $resultado_medio_cond = $this->NM_ajax_info['param']['resultado_medio_cond'];
      }
      if (isset($this->NM_ajax_info['param']['resultado_medio']))
      {
          $resultado_medio = $this->NM_ajax_info['param']['resultado_medio'];
      }
      if (isset($this->NM_ajax_info['param']['total_nota_cond']))
      {
          $total_nota_cond = $this->NM_ajax_info['param']['total_nota_cond'];
      }
      if (isset($this->NM_ajax_info['param']['total_nota']))
      {
          $total_nota = $this->NM_ajax_info['param']['total_nota'];
      }
      if (isset($this->NM_ajax_info['param']['total_resultado_cond']))
      {
          $total_resultado_cond = $this->NM_ajax_info['param']['total_resultado_cond'];
      }
      if (isset($this->NM_ajax_info['param']['total_resultado']))
      {
          $total_resultado = $this->NM_ajax_info['param']['total_resultado'];
      }
      if (isset($this->NM_ajax_info['param']['NM_filters']))
      {
          $NM_filters = $this->NM_ajax_info['param']['NM_filters'];
      }
      if (isset($this->NM_ajax_info['param']['NM_filters_del']))
      {
          $NM_filters_del = $this->NM_ajax_info['param']['NM_filters_del'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_save_name']))
      {
          $nmgp_save_name = $this->NM_ajax_info['param']['nmgp_save_name'];
      }
      if (isset($this->NM_ajax_info['param']['NM_operador']))
      {
          $NM_operador = $this->NM_ajax_info['param']['NM_operador'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_save_option']))
      {
          $nmgp_save_option = $this->NM_ajax_info['param']['nmgp_save_option'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
      {
          $nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
      }
      if (isset($this->NM_ajax_info['param']['bprocessa']))
      {
          $bprocessa = $this->NM_ajax_info['param']['bprocessa'];
      }
      if (isset($nmgp_refresh_fields))
      {
          $nmgp_refresh_fields = explode('_#fld#_', $nmgp_refresh_fields);
      }
      else
      {
          $nmgp_refresh_fields = array();
      }
//-- ajax metodos ---
      if (isset($bprocessa) && $bprocessa == "save_form")
      {
          $this->salva_filtro();
          $NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  htmlentities($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . htmlentities($Tipo_filter[0]) . "\">.." . htmlentities($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select = "<SELECT id=\"sel_recup_filters\" name=\"NM_filters\" onChange=\"nm_submit_filter(this)\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
          $Ajax_select = "<SELECT name=\"NM_filters_del\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_del'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
      }

      if (isset($bprocessa) && $bprocessa == "filter_delete")
      {
          $this->apaga_filtro();
          $NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  htmlentities($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . htmlentities($Tipo_filter[0]) . "\">.." . htmlentities($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select = "<SELECT id=\"sel_recup_filters\" name=\"NM_filters\" onChange=\"nm_submit_filter(this)\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
          $Ajax_select = "<SELECT name=\"NM_filters_del\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_del'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
      }

      if (isset($bprocessa) && $bprocessa == "filter_save")
      {
          $this->recupera_filtro();
          foreach ($this->ajax_return_fields as $cada_cmp => $cada_opt)
          {
              $this->NM_ajax_info['fldList'][$cada_cmp] = array(
                         'type'    => $cada_opt['obj'],
                         'valList' => $cada_opt['vallist'],
                         );
          }
      }

      if (isset($bprocessa) && $bprocessa == "proc_bi")
      {
          $this->process_cond_bi($Opc_bi, $BI_data1, $BI_data2);
          $this->NM_ajax_info['fldList'][$Campo_bi . "_dia"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 0, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_mes"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 2, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_ano"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 4)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_dia"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 0, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_mes"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 2, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_ano"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 4)));
      }
   }

   /**
    * Processa resultado do formulário e monta WHERE
    *
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          scriptcase_error_display($this->Campos_Mens_erro, ""); 
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * Concatena AND ou OR
    *
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where ";
         $this->comando_sum .= " and ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * Monta condição para um dado campo
    *
    * @access  public
    * @param  string  $nome  Nome interno do campo usado pela aplicação
    * @param  string  $condicao  Condição utilizada para o campo
    * @param  mixed  $campo  Valor informado no formulário de filtro para o campo
    * @param  mixed  $campo2  Valor informado no formulário quando a condição for entre dois valores
    * @param  string  $nome_campo  Label de exibição do campo
    * @param  string  $tp_campo  Tipo de dados do campo
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $nm_aspas = "'";
      $nm_numeric[] = "nota_media";$nm_numeric[] = "resultado_medio";$nm_numeric[] = "total_nota";$nm_numeric[] = "total_resultado";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $nm_numeric))
      {
         $nm_aspas = "";
         if ($campo == "")
         {
            $campo = 0;
         }
         if ($campo2 == "")
         {
            $campo2 = 0;
         }
      }
      if ($campo == "" && $condicao != "nu" && $condicao != "nn")
      {
         $this->comando        .= "";
         $this->comando_sum    .= "";
         $this->comando_filtro .= "";
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "LIDER_COMP.$nome";
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
         {
             $nome     = "str_replace (convert(char(10),$nome,102), '.', '-') + ' ' + convert(char(8),$nome,20)";
             $nome_sum = "str_replace (convert(char(10),$nome_sum,102), '.', '-') + ' ' + convert(char(8),$nome_sum,20)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $nome     = "convert(char(23),$nome,121)";
             $nome_sum = "convert(char(23),$nome_sum,121)";
         }
         switch (strtoupper($condicao))
         {
            case "EQ":     // Exatamente igual
               $this->comando        .= " " . $nome . " = " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " " . $nome_sum . " = " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " " . $nome . " = " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " igual a " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // In&iacute;cio igual
               $this->comando        .= " " . $nome . " like '" . $campo . "%'";
               $this->comando_sum    .= " " . $nome_sum . " like '" . $campo . "%'";
               $this->comando_filtro .= " " . $nome . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " iniciando por " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "QP":     // Qualquer parte
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cond    = "";
                   $NM_cmd     = "";
                   $NM_cmd_sum = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " e ";
                       $NM_cond    .= "ano igual a " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                       $NM_cmd_sum .= "year($nome_sum) = " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " e ";
                       $NM_cond    .= "mes igual a " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                       $NM_cmd_sum .= "month($nome_sum) = " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " e ";
                       $NM_cond    .= "dia igual a " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                       $NM_cmd_sum .= "day($nome_sum) = " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " que contenha " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= " " . $nome . " like '%" . $campo . "%'";
                   $this->comando_sum    .= " " . $nome_sum . " like '%" . $campo . "%'";
                   $this->comando_filtro .= " " . $nome . " like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " que contenha " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // Diferente
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF")
               {
                   $this->comando        .= " " . $nome . " not like '%" . $campo . "%'";
                   $this->comando_sum    .= " " . $nome_sum . " not like '%" . $campo . "%'";
                   $this->comando_filtro .= " " . $nome . " not like '%" . $campo . "%'";
               }
               else
               {
                   $this->comando        .= " " . $nome . " <> " . $nm_aspas . $campo . $nm_aspas;
                   $this->comando_sum    .= " " . $nome_sum . " <> " . $nm_aspas . $campo . $nm_aspas;
                   $this->comando_filtro .= " " . $nome . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " diferente de " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // Maior que
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " maior que " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // Maior ou igual
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " maior ou igual a " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // Menor que
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " menor que " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // Menor ou igual
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " menor ou igual a " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // Entre dois valores
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF")
               {
                   $this->comando        .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " diferente de " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
               else
               {
                   $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   if ($tp_campo == "DTEQ" || $tp_campo == "DATEEQ")
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " igual a " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   }
                   else
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " entre " . $this->cmp_formatado[$nome_campo] . " e " . $this->cmp_formatado[$nome_campo . "2"] . "##*@@";
                   }
               }
            break;
            case "IN":     // Entre v&aacute;rios valores
               $nm_sc_valores  = explode(",", $campo);
               $cond_str = "";
               $nm_cond  = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " ou ";
                      }
                      $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                   }
               }
               $this->comando        .= " " . $nome . " in (" . $cond_str . ")";
               $this->comando_sum    .= " " . $nome_sum . " in (" . $cond_str . ")";
               $this->comando_filtro .= " " . $nome . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " que contenha " . $nm_cond . "##*@@";
            break;
            case "NU":     // Conte&uacute;do nulo
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " Conte&uacute;do nulo " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "NN":     // Conte&uacute;do n&atilde;o nulo
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " Conte&uacute;do n&atilde;o nulo " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
         }
      }
   }

   /**
    * Prepara formato da data para ser usada no SQL
    *
    * @access  public
    * @param  array  $data_arr  Dados que compõem o campo data
    */
   function data_menor(&$data_arr)
   {
      $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0000" : $data_arr["ano"];
      $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
      $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
      $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
      $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
      $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   /**
    * Prepara formato da data para ser usada no SQL
    *
    * @access  public
    * @param  array  $data_arr  Dados que compõem o campo data
    */
   function data_maior(&$data_arr)
   {
      $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
      $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
      $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
      $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
      $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
      if ("__" == $data_arr["dia"])
      {
          $data_arr["dia"] = "31";
          if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
          {
              $data_arr["dia"] = 30;
          }
          elseif ($data_arr["mes"] == "02")
          { 
                  if  ($data_arr["ano"] % 4 == 0)
                  {
                       $data_arr["dia"] = 29;
                  }
                  else 
                  {
                       $data_arr["dia"] = 28;
                  }
          }
      }
   }

   /**
    * Prepara formato da data para ser usada no SQL
    *
    * @access  public
    * @param  string  $nm_data_hora  Dados que compõem o campo data hora
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * Retorna resultado para grid
    *
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "app_LiderCompetencias.php";
?>
<HTML>
<HEAD>
 <TITLE>Filtro para app_LiderCompetencias</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<BODY bgcolor="<?php echo $this->Ini->cor_bg_grid; ?>" <?php if ("" != $this->Ini->img_fun_pag) { echo "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_pag . "\""; } ?>>
<FORM name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT language="javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * Monta início do HTML do formulário
    *
    * @access  public
    */
   function monta_html_ini()
   {
?>
<HTML>
<HEAD>
 <TITLE>Filtro para app_LiderCompetencias</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<SCRIPT language="javascript" src="app_LiderCompetencias_digita.js" ?>">
</SCRIPT>
<SCRIPT language="javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>">
</SCRIPT>
<SCRIPT language="javascript" src="app_LiderCompetencias_tab_erro.js">
</SCRIPT>
 <SCRIPT language="javascript">
var NM_index = 0;
var NM_hidden = new Array();
var NM_IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
function NM_hitTest(o, l)
{
    function getOffset(o){
        for(var r = {l: o.offsetLeft, t: o.offsetTop, r: o.offsetWidth, b: o.offsetHeight};
            o = o.offsetParent; r.l += o.offsetLeft, r.t += o.offsetTop);
        return r.r += r.l, r.b += r.t, r;
    }
    for(var b, s, r = [], a = getOffset(o), j = isNaN(l.length), i = (j ? l = [l] : l).length; i;
        b = getOffset(l[--i]), (a.l == b.l || (a.l > b.l ? a.l <= b.r : b.l <= a.r))
        && (a.t == b.t || (a.t > b.t ? a.t <= b.b : b.t <= a.b)) && (r[r.length] = l[i]));
    return j ? !!r.length : r;
}
var tem_obj = false;
function NM_show_menu(nn)
{
    if (!NM_IE)
    {
         return;
    }
    x = document.getElementById(nn);
    x.style.display = "block";
    obj_sel = document.body;
    tem_obj = true;
    x.ieFix = NM_hitTest(x, obj_sel.getElementsByTagName("select"));
    for (i = 0; i <  x.ieFix.length; i++)
    {
      if (x.ieFix[i].style.visibility != "hidden")
      {
          x.ieFix[i].style.visibility = "hidden";
          NM_hidden[NM_index] = x.ieFix[i];
          NM_index++;
      }
    }
}
function NM_hide_menu()
{
    if (!NM_IE)
    {
         return;
    }
    obj_del = document.body;
    if (tem_obj && obj_del == obj_sel)
    {
        for(var i = NM_hidden.length; i; NM_hidden[--i].style.visibility = "visible");
    }
    NM_index = 0;
    NM_hidden = new Array();
}
 function nm_save_form()
 {
  if (document.F1.nmgp_save_name.value == '')
  {
      return;
  }
  document.F1.bprocessa.value = "save_form";
  app_LiderCompetencias_do_ajax_save_filter();
 }
 function nm_submit_filter(obj_sel)
 {
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_save";
  app_LiderCompetencias_do_ajax_change_filter();
 }
 function nm_submit_filter_del()
 {
  obj_sel = document.F1.elements['NM_filters_del'];
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_delete";
  app_LiderCompetencias_do_ajax_delete_filter();
 }
 </SCRIPT>
<?php
include_once("app_LiderCompetencias_sajax_js.php");
?>
</HEAD>
<BODY>
 <FORM name="F1" action="app_LiderCompetencias.php" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <style type="text/css">
  BODY { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#000000;background-color:#FFFFFF;background-image: url(<?php echo $this->Ini->path_img_modelo?>/bgmiolo.gif); }
  .css_tabela { border-collapse:collapse;border-width:1;border-color:#189300;border-style:solid; }
  .css_barra_nav { background-image: url(<?php echo $this->Ini->path_img_modelo?>/BgIconesVerde.gif); }
  .css_fun_cab { background-color:#189300; }
  .css_cabecalho { font-family:Verdana, Arial, sans-serif;font-size:14px;color:#FFFFFF; }
  .css_bloco { background-color:#45C42D;padding:2px;font-family:Verdana, Arial, sans-serif;font-size:14px;color:#FFFFFF;font-weight:bold;text-align:left;vertical-align:middle; }
  .css_bloco_cor { background-color:#45C42D;padding:2px; }
  .css_bloco_font { font-family:Verdana, Arial, sans-serif;font-size:14px;color:#FFFFFF;font-weight:bold;text-align:left;vertical-align:middle; }
  .css_titulo { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#333333;background-color:#FFFFFF;border-width:0;border-color:#990000;border-style:solid;padding:4px; }
  .css_lab_impar { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#333333;background-color:#E2FFDC;font-weight:bold;border-width:0;border-color:#990000;border-style:solid;padding:4px; }
  .css_lab_par { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#000000;background-color:#E2FFDC;font-weight:bold;border-width:0;border-color:#990000;border-style:solid;padding:4px; }
  .css_cmp_impar { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#333333;background-color:#FFFFFF;border-width:0;border-color:#990000;border-style:solid;padding:4px; }
  .css_cmp_par { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#333333;background-color:#FFFFFF;border-width:0;border-color:#990000;border-style:solid;padding:4px; }
  .css_font_impar { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#333333; }
  .css_font_par { font-family:Tahoma, Arial, sans-serif;font-size:12px;color:#333333; }
 </style>
 <div id="idJSSpecChar" style="display:none;"></div>
<TABLE align="center" valign="top" >
<?php
   }

   /**
    * Monta final do HTML do formulário
    *
    * @access  public
    * @global  string  $bprocessa  Flag indicativa para exibição ou processamento do formulário de filtro
    */
   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
   </FORM> 
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderCompetencias']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_LiderCompetencias']['start'] == 'filter')
   {
?>
   <FORM name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM name="form_cancel"  method="POST" action="app_LiderCompetencias.php" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
   <INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
   </FORM> 
<SCRIPT language="javascript">
function nm_tabula(obj, tam, cond)
{
   if (obj.value.length == tam)
   {
       for (i=0; i < document.F1.elements.length;i++)
       {
            if (document.F1.elements[i].name == obj.name)
            {
                i++;
                campo = document.F1.elements[i].name;
                campo2 = campo.lastIndexOf('_input_2');
                if (document.F1.elements[i].type == 'text' && (campo2 == -1 || cond == 'bw'))
                {
                    eval('document.F1.' + campo + '.focus()');
                }
                break;
            }
       }
   }
}
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   /**
    * Monta cabeçalho da página
    *
    * @access  public
    */
   function monta_cabecalho()
   {
?>
 <TR align="center">
  <TD>
   <TABLE width="100%" class="css_fun_cab" cellspacing="0" cellpadding="0">
    <TR align="center" class="css_cabecalho">
     <TD>
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%">
       <TR valign="middle">
        <TD align="left" rowspan="3" class="css_cabecalho">
          <IMG src="<?php echo $this->Ini->path_imag_cab; ?>/scriptcase__NM__LogoSchema1.gif" border="0">
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
          Filtro para app_LiderCompetencias
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
   </TABLE>  </TD>
 </TR>
<?php
   }

   /**
    * Monta linhas dos campos do formulário
    *
    * @access  public
    * @global  string  $nm_url_saida  URL de saída da aplicação
    * @global  integer  $nm_apl_dependente  Flag indicativa de aplicação rodando como subconsulta
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  Flag indicativa para exibição ou processamento do formulário de filtro
    */
   function monta_form()
   {
      global 
             $lider_cond, $lider,
             $competencia_cond, $competencia,
             $nota_media_cond, $nota_media,
             $resultado_medio_cond, $resultado_medio,
             $total_nota_cond, $total_nota,
             $total_resultado_cond, $total_resultado,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_LiderCompetencias", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['iframe_menu'])
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          $lider = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['lider']; 
          $lider_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['lider_cond']; 
          $competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['competencia']; 
          $competencia_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['competencia_cond']; 
          $nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['nota_media']; 
          $nota_media_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['nota_media_cond']; 
          $resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['resultado_medio']; 
          $resultado_medio_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['resultado_medio_cond']; 
          $total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_nota']; 
          $total_nota_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_nota_cond']; 
          $total_resultado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_resultado']; 
          $total_resultado_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_resultado_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['NM_operador']; 
      } 
      if (isset($nmgp_save_name) && !empty($nmgp_save_name) && $bprocessa == "save_form")
      { 
          $this->salva_filtro();
      } 
      if (isset($NM_filters) && !empty($NM_filters) && $bprocessa == "filter_save")
      { 
          $this->recupera_filtro();
      } 
      if (isset($NM_filters_del) && !empty($NM_filters_del) && $bprocessa == "filter_delete")
      { 
          $this->apaga_filtro();
      } 
      if (!isset($lider_cond) || empty($lider_cond))
      {
         $lider_cond = "eq";
      }
      if (!isset($competencia_cond) || empty($competencia_cond))
      {
         $competencia_cond = "eq";
      }
      if (!isset($nota_media_cond) || empty($nota_media_cond))
      {
         $nota_media_cond = "eq";
      }
      if (!isset($resultado_medio_cond) || empty($resultado_medio_cond))
      {
         $resultado_medio_cond = "eq";
      }
      if (!isset($total_nota_cond) || empty($total_nota_cond))
      {
         $total_nota_cond = "eq";
      }
      if (!isset($total_resultado_cond) || empty($total_resultado_cond))
      {
         $total_resultado_cond = "eq";
      }
      if (!isset($lider) || empty($lider))
      {
          $lider = "";
      }
      if (isset($lider) && !empty($lider))
      {
         $tmp_pos = strpos($lider, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $lider = substr($lider, 0, $tmp_pos);
         }
      }
      if (!isset($competencia) || empty($competencia))
      {
          $competencia = "";
      }
      if (isset($competencia) && !empty($competencia))
      {
         $tmp_pos = strpos($competencia, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $competencia = substr($competencia, 0, $tmp_pos);
         }
      }
      if (!isset($nota_media) || empty($nota_media))
      {
          $nota_media = "";
      }
      if (isset($nota_media) && !empty($nota_media))
      {
         $tmp_pos = strpos($nota_media, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $nota_media = substr($nota_media, 0, $tmp_pos);
         }
      }
      if (!isset($resultado_medio) || empty($resultado_medio))
      {
          $resultado_medio = "";
      }
      if (isset($resultado_medio) && !empty($resultado_medio))
      {
         $tmp_pos = strpos($resultado_medio, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $resultado_medio = substr($resultado_medio, 0, $tmp_pos);
         }
      }
      if (!isset($total_nota) || empty($total_nota))
      {
          $total_nota = "";
      }
      if (isset($total_nota) && !empty($total_nota))
      {
         $tmp_pos = strpos($total_nota, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $total_nota = substr($total_nota, 0, $tmp_pos);
         }
      }
      if (!isset($total_resultado) || empty($total_resultado))
      {
          $total_resultado = "";
      }
      if (isset($total_resultado) && !empty($total_resultado))
      {
         $tmp_pos = strpos($total_resultado, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $total_resultado = substr($total_resultado, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD>
   <TABLE border="0" cellpadding="0" cellspacing="0" width="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE valign="top" class="css_tabela" width="100%" height="100%" cellpadding="0" cellspacing="0">
   <tr>





     <TD class="css_lab_impar">
        <?php echo (isset($this->New_label['lider'])) ? $this->New_label['lider'] : "Líder"; ?>
     </TD>
     <TD class="css_cmp_impar"> 
      <SELECT style="font-family:Verdana, Arial, sans-serif;font-size:11px;color:#333333;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;" name="lider_cond">
       <OPTION value="eq" <?php if ("eq" == $lider_cond) { echo "selected"; } ?>>Exatamente igual</OPTION>
       <OPTION value="ii" <?php if ("ii" == $lider_cond) { echo "selected"; } ?>>In&iacute;cio igual</OPTION>
       <OPTION value="qp" <?php if ("qp" == $lider_cond) { echo "selected"; } ?>>Qualquer parte</OPTION>
       <OPTION value="df" <?php if ("df" == $lider_cond) { echo "selected"; } ?>>Diferente</OPTION>
      </SELECT>
       </TD>
     <TD  class="css_cmp_impar">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="css_font_impar">
           <?php
 $SC_Label = (isset($this->New_label['lider'])) ? $this->New_label['lider'] : "Líder";
 $nmgp_tab_label .= "lider?#?" . $SC_Label . "?@?";
?>
<INPUT  type="text" name="lider" value="<?php echo $lider ?>"   size="14" style="font-family:Verdana, Arial, sans-serif;font-size:11px;color:#333333;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





     <TD class="css_lab_par">
        <?php echo (isset($this->New_label['competencia'])) ? $this->New_label['competencia'] : "Competência"; ?>
     </TD>
     <TD class="css_cmp_par"> 
      <SELECT style="font-family:Verdana, Arial, sans-serif;font-size:11px;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;" name="competencia_cond">
       <OPTION value="eq" <?php if ("eq" == $competencia_cond) { echo "selected"; } ?>>Exatamente igual</OPTION>
       <OPTION value="ii" <?php if ("ii" == $competencia_cond) { echo "selected"; } ?>>In&iacute;cio igual</OPTION>
       <OPTION value="qp" <?php if ("qp" == $competencia_cond) { echo "selected"; } ?>>Qualquer parte</OPTION>
       <OPTION value="df" <?php if ("df" == $competencia_cond) { echo "selected"; } ?>>Diferente</OPTION>
      </SELECT>
       </TD>
     <TD  class="css_cmp_par">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="css_font_par">
           <?php
 $SC_Label = (isset($this->New_label['competencia'])) ? $this->New_label['competencia'] : "Competência";
 $nmgp_tab_label .= "competencia?#?" . $SC_Label . "?@?";
?>
<INPUT  type="text" name="competencia" value="<?php echo $competencia ?>"   size="35" style="font-family:Verdana, Arial, sans-serif;font-size:11px;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





     <TD class="css_lab_impar">
        <?php echo (isset($this->New_label['nota_media'])) ? $this->New_label['nota_media'] : "Nota - Média"; ?>
     </TD>
     <TD class="css_cmp_impar"> 
      <SELECT style="font-family:Verdana, Arial, sans-serif;font-size:11px;color:#333333;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;" name="nota_media_cond">
       <OPTION value="eq" <?php if ("eq" == $nota_media_cond) { echo "selected"; } ?>>Exatamente igual</OPTION>
       <OPTION value="ii" <?php if ("ii" == $nota_media_cond) { echo "selected"; } ?>>In&iacute;cio igual</OPTION>
       <OPTION value="qp" <?php if ("qp" == $nota_media_cond) { echo "selected"; } ?>>Qualquer parte</OPTION>
       <OPTION value="df" <?php if ("df" == $nota_media_cond) { echo "selected"; } ?>>Diferente</OPTION>
      </SELECT>
       </TD>
     <TD  class="css_cmp_impar">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="css_font_impar">
           <?php
 $SC_Label = (isset($this->New_label['nota_media'])) ? $this->New_label['nota_media'] : "Nota - Média";
 $nmgp_tab_label .= "nota_media?#?" . $SC_Label . "?@?";
?>
<INPUT  type="text" name="nota_media" value="<?php echo $nota_media ?>"   size="8" style="font-family:Verdana, Arial, sans-serif;font-size:11px;color:#333333;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





     <TD class="css_lab_par">
        <?php echo (isset($this->New_label['resultado_medio'])) ? $this->New_label['resultado_medio'] : "Resultado - Média"; ?>
     </TD>
     <TD class="css_cmp_par"> 
      <SELECT style="font-family:Verdana, Arial, sans-serif;font-size:11px;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;" name="resultado_medio_cond">
       <OPTION value="eq" <?php if ("eq" == $resultado_medio_cond) { echo "selected"; } ?>>Exatamente igual</OPTION>
       <OPTION value="ii" <?php if ("ii" == $resultado_medio_cond) { echo "selected"; } ?>>In&iacute;cio igual</OPTION>
       <OPTION value="qp" <?php if ("qp" == $resultado_medio_cond) { echo "selected"; } ?>>Qualquer parte</OPTION>
       <OPTION value="df" <?php if ("df" == $resultado_medio_cond) { echo "selected"; } ?>>Diferente</OPTION>
      </SELECT>
       </TD>
     <TD  class="css_cmp_par">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="css_font_par">
           <?php
 $SC_Label = (isset($this->New_label['resultado_medio'])) ? $this->New_label['resultado_medio'] : "Resultado - Média";
 $nmgp_tab_label .= "resultado_medio?#?" . $SC_Label . "?@?";
?>
<INPUT  type="text" name="resultado_medio" value="<?php echo $resultado_medio ?>"   size="8" style="font-family:Verdana, Arial, sans-serif;font-size:11px;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





     <TD class="css_lab_impar">
        <?php echo (isset($this->New_label['total_nota'])) ? $this->New_label['total_nota'] : "Nota - Total"; ?>
     </TD>
     <TD class="css_cmp_impar"> 
      <SELECT style="font-family:Verdana, Arial, sans-serif;font-size:11px;color:#333333;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;" name="total_nota_cond">
       <OPTION value="eq" <?php if ("eq" == $total_nota_cond) { echo "selected"; } ?>>Exatamente igual</OPTION>
       <OPTION value="ii" <?php if ("ii" == $total_nota_cond) { echo "selected"; } ?>>In&iacute;cio igual</OPTION>
       <OPTION value="qp" <?php if ("qp" == $total_nota_cond) { echo "selected"; } ?>>Qualquer parte</OPTION>
       <OPTION value="df" <?php if ("df" == $total_nota_cond) { echo "selected"; } ?>>Diferente</OPTION>
      </SELECT>
       </TD>
     <TD  class="css_cmp_impar">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="css_font_impar">
           <?php
 $SC_Label = (isset($this->New_label['total_nota'])) ? $this->New_label['total_nota'] : "Nota - Total";
 $nmgp_tab_label .= "total_nota?#?" . $SC_Label . "?@?";
?>
<INPUT  type="text" name="total_nota" value="<?php echo $total_nota ?>"   size="8" style="font-family:Verdana, Arial, sans-serif;font-size:11px;color:#333333;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





     <TD class="css_lab_par">
        <?php echo (isset($this->New_label['total_resultado'])) ? $this->New_label['total_resultado'] : "Resultado - Total"; ?>
     </TD>
     <TD class="css_cmp_par"> 
      <SELECT style="font-family:Verdana, Arial, sans-serif;font-size:11px;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;" name="total_resultado_cond">
       <OPTION value="eq" <?php if ("eq" == $total_resultado_cond) { echo "selected"; } ?>>Exatamente igual</OPTION>
       <OPTION value="ii" <?php if ("ii" == $total_resultado_cond) { echo "selected"; } ?>>In&iacute;cio igual</OPTION>
       <OPTION value="qp" <?php if ("qp" == $total_resultado_cond) { echo "selected"; } ?>>Qualquer parte</OPTION>
       <OPTION value="df" <?php if ("df" == $total_resultado_cond) { echo "selected"; } ?>>Diferente</OPTION>
      </SELECT>
       </TD>
     <TD  class="css_cmp_par">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="css_font_par">
           <?php
 $SC_Label = (isset($this->New_label['total_resultado'])) ? $this->New_label['total_resultado'] : "Resultado - Total";
 $nmgp_tab_label .= "total_resultado?#?" . $SC_Label . "?@?";
?>
<INPUT  type="text" name="total_resultado" value="<?php echo $total_resultado ?>"   size="8" style="font-family:Verdana, Arial, sans-serif;font-size:11px;background-color:#F0FEED;border-width:1;border-color:#189300;border-style:solid;">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR align="center">
  <TD>
<INPUT type="hidden" name="NM_operador" value="and">  </TD>
 </TR>
 <TR align="center">
  <TD class="css_barra_nav">
   <DIV align="center"> 
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo $nmgp_tab_label; ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
   <input type="image" name="sc_b_pesq" onclick="document.F1.bprocessa.value='pesq'; nm_submit_form(); return false;" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bpesquisa.gif" title="Pesquisar" align="absmiddle"/> 
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
       <input type="image" name="limpa_frm" onclick="limpa_form(); return false;"  border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_blimpar.gif" title="Limpar campos" align="absmiddle"/> 
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters">
       <SELECT id="sel_recup_filters" name="NM_filters" onChange="nm_submit_filter(this)" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . $Nome_filter . "</option>\r\n";
              }
?>
           <option value="<?php echo $Tipo_filter[0] . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
       <input type="image" name="Ativa_save" onclick="document.all.Salvar_filters.style.display = ''; document.F1.nmgp_save_name.focus(); return false;"  border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bedit_filter.gif" title="Editar/Salvar filtros" align="absmiddle"/> 
<?php
   }
?>
<?php
   if (is_file("app_LiderCompetencias_help.txt"))
   {
      $Arq_WebHelp = file("app_LiderCompetencias_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <input type="image" name="sc_b_help" onclick="javascript:window.open('<?php echo $this->Ini->path_help . $Tmp1[1] ?>', 'Ajuda', 'resizable, scrollbars'); return false;" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bhelp.gif" title="Ajuda" align="absmiddle"/> 
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderCompetencias']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_LiderCompetencias']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <input type="image" name="sc_b_cancel" onclick="document.form_cancel.submit(); return false;" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bsair.gif" title="Sair" align="absmiddle"/> 
<?php
   }
   else
   {
?>
       <input type="image" name="sc_b_cancel" onclick="document.form_cancel.submit(); return false;" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bvoltar.gif" title="Cancelar" align="absmiddle"/> 
<?php
   }
?>
   </DIV> 
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    <br></TD></TR><TR><TD>
    <DIV id="Salvar_filters" style="display:none">
     <TABLE align="center" class="css_tabela">
      <TR>
       <TD class="css_bloco">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="css_bloco_font">Regras</td>
          <td style="padding: 0px" align="right" valign="top">
           <input type="image" name="Cancel_frm" onclick="document.all.Salvar_filters.style.display = 'none'; return false;"  border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bcancelar.gif" title="Cancelar" align="absmiddle"/> 
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="css_cmp_impar">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input type="text" name="nmgp_save_name" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <input type="image" name="Save_frm" onclick="nm_save_form();return false;"  border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bsalvar.gif" title="Salvar filtro" align="absmiddle"/> 
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="css_cmp_par">
       <DIV id="Apaga_filters" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del">
           <SELECT name="NM_filters_del" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . $Nome_filter . "</option>\r\n";
              }
?>
            <option value="<?php echo $Tipo_filter[0] . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <input type="image" name="Exc_filtro" onclick="nm_submit_filter_del();return false;"  border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bexcluir.gif" title="Excluir filtro" align="absmiddle"/> 
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
 <script language="javascript">
<?php
   if (empty($NM_fil_ant))
   {
?>
      document.all.Apaga_filters.style.display = 'none';
      document.getElementById('sel_recup_filters').style.display = 'none';
<?php
   }
?>
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.all.Salvar_filters.style.display = 'none';
   document.F1.lider.value = "";
   document.F1.competencia.value = "";
   document.F1.nota_media.value = "";
   document.F1.resultado_medio.value = "";
   document.F1.total_nota.value = "";
   document.F1.total_resultado.value = "";
 }
 </script>
<?php
   }

   function gera_array_filtros()
   {
       $NM_fil_ant = array();
       $NM_patch   = "SISTEMA/app_LiderCompetencias";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                 $NM_fil_ant[$NM_arq][1] = "Público";
             }
           }
       }
       return $NM_fil_ant;
   }
   /**
    * Inicializa variáveis do Filtro
    *
    * @access  public
    * @param  string  $NM_operador  Operador de junção dos campos do filtro
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_LiderCompetencias.php";
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("pt_br");
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro()
   {
      global 
             $lider_cond, $lider,
             $competencia_cond, $competencia,
             $nota_media_cond, $nota_media,
             $resultado_medio_cond, $resultado_medio,
             $total_nota_cond, $total_nota,
             $total_resultado_cond, $total_resultado,
             $nmgp_save_name, $NM_operador, $nmgp_save_option;
      $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
      $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
      $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
      if (isset($nmgp_save_name) && !empty($nmgp_save_name))
      { 
          $NM_str_filter  = "";
          $NM_temp  = (isset($lider)) ? $lider : ""; 
          $NM_str_filter .= "lider#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($lider_cond)) ? $lider_cond : ""; 
          $NM_str_filter .= "lider_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($competencia)) ? $competencia : ""; 
          $NM_str_filter .= "competencia#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($competencia_cond)) ? $competencia_cond : ""; 
          $NM_str_filter .= "competencia_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($nota_media)) ? $nota_media : ""; 
          $NM_str_filter .= "nota_media#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($nota_media_cond)) ? $nota_media_cond : ""; 
          $NM_str_filter .= "nota_media_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($resultado_medio)) ? $resultado_medio : ""; 
          $NM_str_filter .= "resultado_medio#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($resultado_medio_cond)) ? $resultado_medio_cond : ""; 
          $NM_str_filter .= "resultado_medio_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($total_nota)) ? $total_nota : ""; 
          $NM_str_filter .= "total_nota#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($total_nota_cond)) ? $total_nota_cond : ""; 
          $NM_str_filter .= "total_nota_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($total_resultado)) ? $total_resultado : ""; 
          $NM_str_filter .= "total_resultado#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($total_resultado_cond)) ? $total_resultado_cond : ""; 
          $NM_str_filter .= "total_resultado_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_str_filter .= "NM_operador#NMF#" . $NM_operador; 
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0777);
              chmod($NM_patch, 0777);
          }
          $NM_patch .= "SISTEMA/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0777);
              chmod($NM_patch, 0777);
          }
          $NM_patch .= "app_LiderCompetencias/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0777);
              chmod($NM_patch, 0777);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
      } 
   }
   function recupera_filtro()
   {
      global 
      $lider_cond, $lider,
             $competencia_cond, $competencia,
             $nota_media_cond, $nota_media,
             $resultado_medio_cond, $resultado_medio,
             $total_nota_cond, $total_nota,
             $total_resultado_cond, $total_resultado,
      $NM_filters, $NM_operador;
      $Look_man = array();
      $tp_html['lider_cond'] = 'select';
      $tp_html['competencia_cond'] = 'select';
      $tp_html['nota_media_cond'] = 'select';
      $tp_html['resultado_medio_cond'] = 'select';
      $tp_html['total_nota_cond'] = 'select';
      $tp_html['total_resultado_cond'] = 'select';
      $tp_html['lider'] = 'text';
      $tp_html['competencia'] = 'text';
      $tp_html['nota_media'] = 'text';
      $tp_html['resultado_medio'] = 'text';
      $tp_html['total_nota'] = 'text';
      $tp_html['total_resultado'] = 'text';
      $tp_html['NM_operador'] = 'text';
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (is_file($NM_patch))
      {
          $this->ajax_return_fields = array();
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tp_html[$Cada_cmp[0]]))
              {
                  $this->ajax_return_fields[$Cada_cmp[0]]['obj'] = $tp_html[$Cada_cmp[0]];
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Cada_val_sv  = array();
                      $Cada_val_sv1 = array();
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                         $v_fim = explode("##@@", $Cada_val);
                         $Cada_val_sv[] = htmlentities(trim($v_fim[0]));
                         if (isset($Look_man[$Cada_cmp[0]][$v_fim[0]]))
                         {
                             $v_fim[0] = $v_fim[0] . "##@@" . $Look_man[$Cada_cmp[0]][$v_fim[0]];
                         }
                         $Cada_val_sv1[] = htmlentities(trim($v_fim[0]));
                      }
                      $$Cada_cmp[0] = $Cada_val_sv;
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = $Cada_val_sv1;
                  }
                  else
                  {
                      $$Cada_cmp[0] = trim($Cada_cmp[1]);
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = array(htmlentities(trim($Cada_cmp[1])));
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
          $this->NM_operador = $NM_operador;
          unset($this->ajax_return_fields['NM_operador']);
      }
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * Trata campos do formulário
    *
    * @access  public
    */
   function trata_campos()
   {
      global $lider_cond, $lider,
             $competencia_cond, $competencia,
             $nota_media_cond, $nota_media,
             $resultado_medio_cond, $resultado_medio,
             $total_nota_cond, $total_nota,
             $total_resultado_cond, $total_resultado, $nmgp_tab_label;

      require_once($this->Ini->path_libs . "/nm_gp_limpa.php"); 
      require_once($this->Ini->path_libs . "/nm_conv_dados.php"); 
      require_once($this->Ini->path_libs . "/nm_edit.php"); 
      $lider_cond_salva = $lider_cond; 
      if (!isset($lider_input_2) || $lider_input_2 == "")
      {
          $lider_input_2 = $lider;
      }
      $competencia_cond_salva = $competencia_cond; 
      if (!isset($competencia_input_2) || $competencia_input_2 == "")
      {
          $competencia_input_2 = $competencia;
      }
      $nota_media_cond_salva = $nota_media_cond; 
      if (!isset($nota_media_input_2) || $nota_media_input_2 == "")
      {
          $nota_media_input_2 = $nota_media;
      }
      $resultado_medio_cond_salva = $resultado_medio_cond; 
      if (!isset($resultado_medio_input_2) || $resultado_medio_input_2 == "")
      {
          $resultado_medio_input_2 = $resultado_medio;
      }
      $total_nota_cond_salva = $total_nota_cond; 
      if (!isset($total_nota_input_2) || $total_nota_input_2 == "")
      {
          $total_nota_input_2 = $total_nota;
      }
      $total_resultado_cond_salva = $total_resultado_cond; 
      if (!isset($total_resultado_input_2) || $total_resultado_input_2 == "")
      {
          $total_resultado_input_2 = $total_resultado;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['lider'] = $lider; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['lider_cond'] = $lider_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['competencia'] = $competencia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['competencia_cond'] = $competencia_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['nota_media'] = $nota_media; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['nota_media_cond'] = $nota_media_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['resultado_medio'] = $resultado_medio; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['resultado_medio_cond'] = $resultado_medio_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_nota'] = $total_nota; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_nota_cond'] = $total_nota_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_resultado'] = $total_resultado; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['total_resultado_cond'] = $total_resultado_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['campos_busca']['NM_operador'] = $this->NM_operador; 
      $Conteudo = $lider;
      $this->cmp_formatado['lider'] = $Conteudo;
      $Conteudo = $lider_input_2;
      $this->cmp_formatado['lider2'] = $Conteudo;
      $Conteudo = $competencia;
      $this->cmp_formatado['competencia'] = $Conteudo;
      $Conteudo = $competencia_input_2;
      $this->cmp_formatado['competencia2'] = $Conteudo;
      $Conteudo = $nota_media;
      $this->cmp_formatado['nota_media'] = $Conteudo;
      $Conteudo = $nota_media_input_2;
      $this->cmp_formatado['nota_media2'] = $Conteudo;
      $Conteudo = $resultado_medio;
      $this->cmp_formatado['resultado_medio'] = $Conteudo;
      $Conteudo = $resultado_medio_input_2;
      $this->cmp_formatado['resultado_medio2'] = $Conteudo;
      $Conteudo = $total_nota;
      $this->cmp_formatado['total_nota'] = $Conteudo;
      $Conteudo = $total_nota_input_2;
      $this->cmp_formatado['total_nota2'] = $Conteudo;
      $Conteudo = $total_resultado;
      $this->cmp_formatado['total_resultado'] = $Conteudo;
      $Conteudo = $total_resultado_input_2;
      $this->cmp_formatado['total_resultado2'] = $Conteudo;

      //----- $lider
      if (isset($lider) || $lider_cond == "nu" || $lider_cond == "nn")
      {
         $this->monta_condicao("LIDER", $lider_cond, $lider, "", "lider");
      }

      //----- $competencia
      if (isset($competencia) || $competencia_cond == "nu" || $competencia_cond == "nn")
      {
         $this->monta_condicao("COMPETENCIA", $competencia_cond, $competencia, "", "competencia");
      }

      //----- $nota_media
      if (isset($nota_media) || $nota_media_cond == "nu" || $nota_media_cond == "nn")
      {
         $this->monta_condicao("NOTA_MEDIA", $nota_media_cond, $nota_media, "", "nota_media");
      }

      //----- $resultado_medio
      if (isset($resultado_medio) || $resultado_medio_cond == "nu" || $resultado_medio_cond == "nn")
      {
         $this->monta_condicao("RESULTADO_MEDIO", $resultado_medio_cond, $resultado_medio, "", "resultado_medio");
      }

      //----- $total_nota
      if (isset($total_nota) || $total_nota_cond == "nu" || $total_nota_cond == "nn")
      {
         $this->monta_condicao("TOTAL_NOTA", $total_nota_cond, $total_nota, "", "total_nota");
      }

      //----- $total_resultado
      if (isset($total_resultado) || $total_resultado_cond == "nu" || $total_resultado_cond == "nn")
      {
         $this->monta_condicao("TOTAL_RESULTADO", $total_resultado_cond, $total_resultado, "", "total_resultado");
      }
   }

   /**
    * Monta e grava o resultado do Filtro
    *
    * @access  public
    */
   function finaliza_resultado()
   {

      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['where_pesq_lookup'] = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['where_pesq'] = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['where_pesq_salvo'] = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['contr_array_resumo'] = "NAO";
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['contr_total_geral'] = "NAO";
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['opcao'] = "pesq";
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['prim_vez'] = "N";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderCompetencias']['cond_pesq'] .= $this->NM_operador;
      }

      $this->retorna_pesq();
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

?>
