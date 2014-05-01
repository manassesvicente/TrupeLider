<?php
//
class app_Desempenho_apl
{
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'       => '',
                                'param'        => array(),
                                'autoComp'     => '',
                                'rsSize'       => '',
                                'msgDisplay'   => '',
                                'errList'      => array(),
                                'fldList'      => array(),
                                'focus'        => '',
                                'navStatus'    => array(),
                                'redir'        => array(),
                                'blockDisplay' => array(),
                                'fieldDisplay' => array(),
                                'fieldLabel'   => array(),
                                'readOnly'     => array(),
                                'btnVars'      => array());
   var $Nav_permite_ava = true;
   var $Nav_permite_ret = true;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_desemp;
   var $cod_desemp;
   var $id_turma;
   var $id_turma1;
   var $id_grupo;
   var $id_votante;
   var $id_votado;
   var $id_etapa;
   var $id_competencia;
   var $id_habilidade;
   var $nota;
   var $peso;
   var $resultado;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- Controle da Aplicação
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cod_desemp']))
          {
              $this->cod_desemp = $this->NM_ajax_info['param']['cod_desemp'];
          }
          if (isset($this->NM_ajax_info['param']['id_competencia']))
          {
              $this->id_competencia = $this->NM_ajax_info['param']['id_competencia'];
          }
          if (isset($this->NM_ajax_info['param']['id_desemp']))
          {
              $this->id_desemp = $this->NM_ajax_info['param']['id_desemp'];
          }
          if (isset($this->NM_ajax_info['param']['id_etapa']))
          {
              $this->id_etapa = $this->NM_ajax_info['param']['id_etapa'];
          }
          if (isset($this->NM_ajax_info['param']['id_grupo']))
          {
              $this->id_grupo = $this->NM_ajax_info['param']['id_grupo'];
          }
          if (isset($this->NM_ajax_info['param']['id_habilidade']))
          {
              $this->id_habilidade = $this->NM_ajax_info['param']['id_habilidade'];
          }
          if (isset($this->NM_ajax_info['param']['id_turma']))
          {
              $this->id_turma = $this->NM_ajax_info['param']['id_turma'];
          }
          if (isset($this->NM_ajax_info['param']['id_votado']))
          {
              $this->id_votado = $this->NM_ajax_info['param']['id_votado'];
          }
          if (isset($this->NM_ajax_info['param']['id_votante']))
          {
              $this->id_votante = $this->NM_ajax_info['param']['id_votante'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nota']))
          {
              $this->nota = $this->NM_ajax_info['param']['nota'];
          }
          if (isset($this->NM_ajax_info['param']['peso']))
          {
              $this->peso = $this->NM_ajax_info['param']['peso'];
          }
          if (isset($this->NM_ajax_info['param']['resultado']))
          {
              $this->resultado = $this->NM_ajax_info['param']['resultado'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
      }

      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               $tmp_name     = $nmgp_campo . "_name";
               $tmp_type     = $nmgp_campo . "_type";
               $this->$nmgp_campo = $nmgp_valores['tmp_name'];
               $this->$tmp_type   = $nmgp_valores['type'];
               $this->$tmp_name   = $nmgp_valores['name'];
          }
      }
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app_Desempenho']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_Desempenho']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app_Desempenho']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("scriptcaseout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("scriptcasein", "?#?", $nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todo = explode("?@?", $nmgp_parms);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             nm_limpa_str_app_Desempenho($cadapar[1]);
             $this->$cadapar[0] = $cadapar[1];
             $ix++;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Desempenho']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_Desempenho']['parms']);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app_Desempenho_ini(); 
          $this->Ini->init();
      } 

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_Desempenho.php" ; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      include_once ($this->Ini->path_libs . "/nm_valida.php") ;
      $teste_validade = new NM_Valida ;

      if ($this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['trial_version'] = 'N';
      }


      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['last']);
      }
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['first']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['back']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['forward'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['last']    = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['first']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['back']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['forward'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['last']    = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Desempenho']['last'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_form'];
          if (!isset($this->id_desemp)){$this->id_desemp = $this->nmgp_dados_form['id_desemp'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_Desempenho", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['iframe_menu'])
      {
          $this->aba_iframe = true;
      }
      require_once($this->Ini->path_libs . "/nm_data.class.php");
      include_once ($this->Ini->path_libs . "/nm_gp_limpa.php") ;
      require_once($this->Ini->path_libs . "/nm_gc.php");
      include_once ($this->Ini->path_libs . "/nm_edit.php");  
      include_once ($this->Ini->path_libs . "/nm_conv_dados.php") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['pt_br']['int'] = array("Janeiro", "Fevereiro", "Mar&ccedil;o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
      $_SESSION['scriptcase']['sc_tab_meses']['pt_br']['abr'] = array("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
      $_SESSION['scriptcase']['sc_tab_dias']['pt_br']['int'] = array("Domingo", "Segunda", "Ter&ccedil;a", "Quarta", "Quinta", "Sexta", "S&aacute;bado");
      $_SESSION['scriptcase']['sc_tab_dias']['pt_br']['abr'] = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
      nm_gc($this->Ini->path_libs);
      $this->Ini->exec_magick = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $sc_info_GD = gd_info();
            $sc_GD_version ="";
            if(isset($sc_info_GD['GD Version']))
            {
               $pos_Temp = strpos($sc_info_GD['GD Version'], "(");
               if($pos_Temp)
               {
                   $sc_GD_version = substr($sc_info_GD['GD Version'], $pos_Temp + 1, 3);
               }
               elseif(!empty($sc_info_GD['GD Version']))
               {
                   $pos_Temp = strpos($sc_info_GD['GD Version'], " ");
                   $sc_GD_version = substr($sc_info_GD['GD Version'], 0, $pos_Temp);
               }
               if($sc_GD_version >= 2)
               {
                   include_once($this->Ini->path_libs . "/nm_trata_img.php");
                   $this->Ini->exec_magick = false;
               }
            }
         }
      }
      $this->nm_data = new nm_data("pt_br");

      if (is_file($this->Ini->path_aplicacao . 'app_Desempenho_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app_Desempenho_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao']))
         { 
             if ($this->id_desemp != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['botoes'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'app_Desempenho/app_Desempenho_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app_Desempenho_erro.class.php"); 
      }
      $this->Erro      = new app_Desempenho_erro();
      $this->Erro->Ini = $this->Ini;
//
      if (!$this->Db)
      { 
          if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_Desempenho']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_Desempenho']['glo_nm_conexao']))
          { 
              $this->Db = db_conect_devel($_SESSION['scriptcase']['app_Desempenho']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'SISTEMA'); 
          } 
          else 
          { 
             $this->Db = db_conect($this->Ini->nm_tpbanco, $this->Ini->nm_servidor, $this->Ini->nm_usuario, $this->Ini->nm_senha, $this->Ini->nm_banco, $glo_senha_protect); 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app_Desempenho']['start']);
      }
      if (isset($this->cod_desemp)) { $this->nm_limpa_alfa($this->cod_desemp); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = "";
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_Desempenho.php" ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_select'];
     }
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

//
//-----> Critica dos campos do formulário
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_cod_desemp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'cod_desemp');
          }
          if ('validate_id_turma' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_turma');
          }
          if ('validate_id_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_grupo');
          }
          if ('validate_id_etapa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_etapa');
          }
          if ('validate_id_votante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_votante');
          }
          if ('validate_id_votado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_votado');
          }
          if ('validate_id_competencia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_competencia');
          }
          if ('validate_peso' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'peso');
          }
          if ('validate_id_habilidade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_habilidade');
          }
          if ('validate_resultado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'resultado');
          }
          if ('validate_nota' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'nota');
          }
          app_Desempenho_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_id_grupo' == $this->NM_ajax_opcao)
          {
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO FROM GRUPOS WHERE COD_GRUPO LIKE '%" . $this->id_grupo . "%' ORDER BY ID_GRUPO";
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->NM_ajax_info['autoComp'] = "<ul class='contacts'>\n";
              $iOptCount = 0;
              $iOptLimit = 10;
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $iOptCount++;
                      if ($iOptCount > $iOptLimit)
                      {
                          break;
                      }
                      $this->NM_ajax_info['autoComp'] .= "<li class='contact'>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_busca'>" . utf8_encode($sLkpValue) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod' style='display: none'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          if ('autocomp_id_votante' == $this->NM_ajax_opcao)
          {
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE NOME LIKE '%" . $this->id_votante . "%' ORDER BY ID_PARTICIPE";
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->NM_ajax_info['autoComp'] = "<ul class='contacts'>\n";
              $iOptCount = 0;
              $iOptLimit = 10;
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $iOptCount++;
                      if ($iOptCount > $iOptLimit)
                      {
                          break;
                      }
                      $this->NM_ajax_info['autoComp'] .= "<li class='contact'>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_busca'>" . utf8_encode($sLkpValue) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod' style='display: none'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          if ('autocomp_id_votado' == $this->NM_ajax_opcao)
          {
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME FROM PARTICIPANTES WHERE NOME LIKE '" . $this->id_votado . "%' ORDER BY ID_PARTICIPE";
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->NM_ajax_info['autoComp'] = "<ul class='contacts'>\n";
              $iOptCount = 0;
              $iOptLimit = 10;
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $iOptCount++;
                      if ($iOptCount > $iOptLimit)
                      {
                          break;
                      }
                      $this->NM_ajax_info['autoComp'] .= "<li class='contact'>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_busca'>" . utf8_encode($sLkpValue) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod' style='display: none'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          if ('autocomp_id_etapa' == $this->NM_ajax_opcao)
          {
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_ETAPA, COD_ETAPA FROM ETAPAS WHERE COD_ETAPA LIKE '" . $this->id_etapa . "%' ORDER BY ID_ETAPA";
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->NM_ajax_info['autoComp'] = "<ul class='contacts'>\n";
              $iOptCount = 0;
              $iOptLimit = 10;
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $iOptCount++;
                      if ($iOptCount > $iOptLimit)
                      {
                          break;
                      }
                      $this->NM_ajax_info['autoComp'] .= "<li class='contact'>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_busca'>" . utf8_encode($sLkpValue) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod' style='display: none'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          if ('autocomp_id_competencia' == $this->NM_ajax_opcao)
          {
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_COMPETENCIA, COD_COMPETENCIA FROM COMPETENCIAS WHERE COD_COMPETENCIA LIKE '" . $this->id_competencia . "%' ORDER BY ID_COMPETENCIA";
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->NM_ajax_info['autoComp'] = "<ul class='contacts'>\n";
              $iOptCount = 0;
              $iOptLimit = 10;
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $iOptCount++;
                      if ($iOptCount > $iOptLimit)
                      {
                          break;
                      }
                      $this->NM_ajax_info['autoComp'] .= "<li class='contact'>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_busca'>" . utf8_encode($sLkpValue) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod' style='display: none'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          if ('autocomp_id_habilidade' == $this->NM_ajax_opcao)
          {
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_HABILIDADE, COD_HABILIDADE FROM HABILIDADES WHERE COD_HABILIDADE LIKE '%" . $this->id_habilidade . "%' ORDER BY ID_HABILIDADE";
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->NM_ajax_info['autoComp'] = "<ul class='contacts'>\n";
              $iOptCount = 0;
              $iOptLimit = 10;
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $iOptCount++;
                      if ($iOptCount > $iOptLimit)
                      {
                          break;
                      }
                      $this->NM_ajax_info['autoComp'] .= "<li class='contact'>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_busca'>" . utf8_encode($sLkpValue) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod' style='display: none'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          app_Desempenho_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              app_Desempenho_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta) ; 
          $_SESSION['scriptcase']['app_Desempenho']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = "Campos com erro: " . $Campos_Crit ; 
          }
          if ($Campos_Falta != "") 
          {
              $Campos_Falta = "Faltam Campos: " . $Campos_Falta ; 
          }
          if ($Campos_Crit != "" || $Campos_Falta != "" || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  app_Desempenho_pack_ajax_response();
                  exit;
              }
              $campos_erro  = $Campos_Crit; 
              $campos_erro .= (empty($campos_erro)) ? "" : "<BR>"; 
              $campos_erro .= $Campos_Falta; 
              $campos_erro .= (empty($campos_erro)) ? "" : "<BR>"; 
              $campos_erro .= $this->Campos_Mens_erro; 
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && $this->nmgp_opcao != "menu_link")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload();
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          app_Desempenho_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = 'Formul&aacute;rio atualizado com sucesso.';
          }
          app_Desempenho_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return strpos(strtolower($this->Ini->nm_tpbanco), "access") === false;
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
             $nm_browser;
//---------------------------------------------------------
      if ('' == $filtro || 'cod_desemp' == $filtro)
        $this->ValidateField_cod_desemp($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_turma' == $filtro)
        $this->ValidateField_id_turma($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_grupo' == $filtro)
        $this->ValidateField_id_grupo($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_etapa' == $filtro)
        $this->ValidateField_id_etapa($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_votante' == $filtro)
        $this->ValidateField_id_votante($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_votado' == $filtro)
        $this->ValidateField_id_votado($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_competencia' == $filtro)
        $this->ValidateField_id_competencia($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'peso' == $filtro)
        $this->ValidateField_peso($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_habilidade' == $filtro)
        $this->ValidateField_id_habilidade($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'resultado' == $filtro)
        $this->ValidateField_resultado($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'nota' == $filtro)
        $this->ValidateField_nota($Campos_Crit, $Campos_Falta);
   }

    function ValidateField_cod_desemp(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cod_desemp == "")  
          { 
              $Campos_Falta .=  "Código;" ; 
                  if (!isset($this->NM_ajax_info['errList']['cod_desemp']) || !is_array($this->NM_ajax_info['errList']['cod_desemp']))
                  {
                      $this->NM_ajax_info['errList']['cod_desemp'] = array();
                  }
                  $this->NM_ajax_info['errList']['cod_desemp'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->cod_desemp) > 30) 
          { 
              $Campos_Crit .= "Código aceita o m&aacute;ximo de 30 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['cod_desemp']) || !is_array($this->NM_ajax_info['errList']['cod_desemp']))
              {
                  $this->NM_ajax_info['errList']['cod_desemp'] = array();
              }
              $this->NM_ajax_info['errList']['cod_desemp'][] = "aceita o m&aacute;ximo de 30 caracteres";
          } 
      } 
    } // ValidateField_cod_desemp

    function ValidateField_id_turma(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->id_turma == "" && $this->nmgp_opcao != "excluir")
      {
          $Campos_Falta .= "Turma;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_turma']) || !is_array($this->NM_ajax_info['errList']['id_turma']))
                  {
                      $this->NM_ajax_info['errList']['id_turma'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_turma'][] = "dado obrigat&oacute;rio";
      }
    } // ValidateField_id_turma

    function ValidateField_id_grupo(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_grupo == "")  
          { 
              $Campos_Falta .=  "Grupo;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_grupo']) || !is_array($this->NM_ajax_info['errList']['id_grupo']))
                  {
                      $this->NM_ajax_info['errList']['id_grupo'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_grupo'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->id_grupo) > 10) 
          { 
              $Campos_Crit .= "Grupo aceita o m&aacute;ximo de 10 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['id_grupo']) || !is_array($this->NM_ajax_info['errList']['id_grupo']))
              {
                  $this->NM_ajax_info['errList']['id_grupo'] = array();
              }
              $this->NM_ajax_info['errList']['id_grupo'][] = "aceita o m&aacute;ximo de 10 caracteres";
          } 
      } 
    } // ValidateField_id_grupo

    function ValidateField_id_etapa(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_etapa == "")  
          { 
              $Campos_Falta .=  "Pista;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_etapa']) || !is_array($this->NM_ajax_info['errList']['id_etapa']))
                  {
                      $this->NM_ajax_info['errList']['id_etapa'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_etapa'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->id_etapa) > 10) 
          { 
              $Campos_Crit .= "Pista aceita o m&aacute;ximo de 10 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['id_etapa']) || !is_array($this->NM_ajax_info['errList']['id_etapa']))
              {
                  $this->NM_ajax_info['errList']['id_etapa'] = array();
              }
              $this->NM_ajax_info['errList']['id_etapa'][] = "aceita o m&aacute;ximo de 10 caracteres";
          } 
      } 
    } // ValidateField_id_etapa

    function ValidateField_id_votante(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_votante == "")  
          { 
              $Campos_Falta .=  "Votante;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_votante']) || !is_array($this->NM_ajax_info['errList']['id_votante']))
                  {
                      $this->NM_ajax_info['errList']['id_votante'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_votante'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->id_votante) > 10) 
          { 
              $Campos_Crit .= "Votante aceita o m&aacute;ximo de 10 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['id_votante']) || !is_array($this->NM_ajax_info['errList']['id_votante']))
              {
                  $this->NM_ajax_info['errList']['id_votante'] = array();
              }
              $this->NM_ajax_info['errList']['id_votante'][] = "aceita o m&aacute;ximo de 10 caracteres";
          } 
      } 
    } // ValidateField_id_votante

    function ValidateField_id_votado(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_votado == "")  
          { 
              $Campos_Falta .=  "Votado;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_votado']) || !is_array($this->NM_ajax_info['errList']['id_votado']))
                  {
                      $this->NM_ajax_info['errList']['id_votado'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_votado'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->id_votado) > 10) 
          { 
              $Campos_Crit .= "Votado aceita o m&aacute;ximo de 10 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['id_votado']) || !is_array($this->NM_ajax_info['errList']['id_votado']))
              {
                  $this->NM_ajax_info['errList']['id_votado'] = array();
              }
              $this->NM_ajax_info['errList']['id_votado'][] = "aceita o m&aacute;ximo de 10 caracteres";
          } 
      } 
    } // ValidateField_id_votado

    function ValidateField_id_competencia(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_competencia == "")  
          { 
              $Campos_Falta .=  "Competência;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_competencia']) || !is_array($this->NM_ajax_info['errList']['id_competencia']))
                  {
                      $this->NM_ajax_info['errList']['id_competencia'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_competencia'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->id_competencia) > 10) 
          { 
              $Campos_Crit .= "Competência aceita o m&aacute;ximo de 10 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['id_competencia']) || !is_array($this->NM_ajax_info['errList']['id_competencia']))
              {
                  $this->NM_ajax_info['errList']['id_competencia'] = array();
              }
              $this->NM_ajax_info['errList']['id_competencia'][] = "aceita o m&aacute;ximo de 10 caracteres";
          } 
      } 
    } // ValidateField_id_competencia

    function ValidateField_peso(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->peso) > 4) 
          { 
              $Campos_Crit .= "PESO aceita o m&aacute;ximo de 4 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['peso']) || !is_array($this->NM_ajax_info['errList']['peso']))
              {
                  $this->NM_ajax_info['errList']['peso'] = array();
              }
              $this->NM_ajax_info['errList']['peso'][] = "aceita o m&aacute;ximo de 4 caracteres";
          } 
      } 
    } // ValidateField_peso

    function ValidateField_id_habilidade(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_habilidade == "")  
          { 
              $Campos_Falta .=  "Habilidade;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_habilidade']) || !is_array($this->NM_ajax_info['errList']['id_habilidade']))
                  {
                      $this->NM_ajax_info['errList']['id_habilidade'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_habilidade'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->id_habilidade) > 10) 
          { 
              $Campos_Crit .= "Habilidade aceita o m&aacute;ximo de 10 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['id_habilidade']) || !is_array($this->NM_ajax_info['errList']['id_habilidade']))
              {
                  $this->NM_ajax_info['errList']['id_habilidade'] = array();
              }
              $this->NM_ajax_info['errList']['id_habilidade'][] = "aceita o m&aacute;ximo de 10 caracteres";
          } 
      } 
    } // ValidateField_id_habilidade

    function ValidateField_resultado(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->resultado) > 2) 
          { 
              $Campos_Crit .= "RESULTADO aceita o m&aacute;ximo de 2 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['resultado']) || !is_array($this->NM_ajax_info['errList']['resultado']))
              {
                  $this->NM_ajax_info['errList']['resultado'] = array();
              }
              $this->NM_ajax_info['errList']['resultado'][] = "aceita o m&aacute;ximo de 2 caracteres";
          } 
      } 
    } // ValidateField_resultado

    function ValidateField_nota(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nota == "")  
      { 
          $this->nota = 0 ; 
      } 
      nm_limpa_numero($this->nota) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->nota != '')  
          { 
              if (strlen($this->nota) > 2)  
              { 
                  $Campos_Crit .= "NOTA: tamanho inv&aacute;lido;" ; 
                  if (!isset($this->NM_ajax_info['errList']['nota']) || !is_array($this->NM_ajax_info['errList']['nota']))
                  {
                      $this->NM_ajax_info['errList']['nota'] = array();
                  }
                  $this->NM_ajax_info['errList']['nota'][] = "tamanho inv&aacute;lido";
              } 
              if ($teste_validade->Valor($this->nota, 2, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "NOTA;" ; 
                  if (!isset($this->NM_ajax_info['errList']['nota']) || !is_array($this->NM_ajax_info['errList']['nota']))
                  {
                      $this->NM_ajax_info['errList']['nota'] = array();
                  }
                  $this->NM_ajax_info['errList']['nota'][] = "dados inv&aacute;lidos";
              } 
          } 
      } 
    } // ValidateField_nota
   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['cod_desemp'] = $this->cod_desemp;
    $this->nmgp_dados_form['id_turma'] = $this->id_turma;
    $this->nmgp_dados_form['id_grupo'] = $this->id_grupo;
    $this->nmgp_dados_form['id_etapa'] = $this->id_etapa;
    $this->nmgp_dados_form['id_votante'] = $this->id_votante;
    $this->nmgp_dados_form['id_votado'] = $this->id_votado;
    $this->nmgp_dados_form['id_competencia'] = $this->id_competencia;
    $this->nmgp_dados_form['peso'] = $this->peso;
    $this->nmgp_dados_form['id_habilidade'] = $this->id_habilidade;
    $this->nmgp_dados_form['resultado'] = $this->resultado;
    $this->nmgp_dados_form['nota'] = $this->nota;
    $this->nmgp_dados_form['id_desemp'] = $this->id_desemp;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
      nm_limpa_numero($this->nota) ; 
      nm_limpa_numero($this->id_desemp) ; 
   }
   function nm_formatar_campos()
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->nota))
      {
          nmgp_Form_Num_Val($this->nota, ".", "", "0", "S") ; 
      }
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
   function nm_tira_mask(&$nm_campo, $nm_mask)
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
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

   function ajax_return_values()
   {

          //----- cod_desemp
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_desemp", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cod_desemp'] = array(
               'type'    => 'text',
               'valList' => array($this->cod_desemp),
              );
          }

          //----- id_turma
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_turma", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
 
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
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_turma\"";
          if (isset($this->NM_ajax_info['select_html']['id_turma']) && !empty($this->NM_ajax_info['select_html']['id_turma']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_turma'];
          }
          $sLookup = '<select ' . $sSelComp . '>';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $sLookup .= '</select>';
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_turma'] = array(
               'type'    => 'select',
               'valList' => array($this->id_turma),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_turma']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_turma']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_turma']['labList'] = $aLabel;
          }

          //----- id_grupo
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_grupo", $this->nmgp_refresh_fields)))
          {
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_grupo'] = array(
               'type'    => 'text',
               'valList' => array($this->id_grupo),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_grupo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_grupo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_grupo']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][$this->id_grupo]) ? $aLookup[0][htmlentities($this->id_grupo)] : "";
          $this->NM_ajax_info['fldList']['id_grupo_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }

          //----- id_etapa
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_etapa", $this->nmgp_refresh_fields)))
          {
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_etapa'] = array(
               'type'    => 'text',
               'valList' => array($this->id_etapa),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_etapa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_etapa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_etapa']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][$this->id_etapa]) ? $aLookup[0][htmlentities($this->id_etapa)] : "";
          $this->NM_ajax_info['fldList']['id_etapa_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }

          //----- id_votante
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_votante", $this->nmgp_refresh_fields)))
          {
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_votante'] = array(
               'type'    => 'text',
               'valList' => array($this->id_votante),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_votante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_votante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_votante']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][$this->id_votante]) ? $aLookup[0][htmlentities($this->id_votante)] : "";
          $this->NM_ajax_info['fldList']['id_votante_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }

          //----- id_votado
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_votado", $this->nmgp_refresh_fields)))
          {
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_votado'] = array(
               'type'    => 'text',
               'valList' => array($this->id_votado),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_votado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_votado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_votado']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][$this->id_votado]) ? $aLookup[0][htmlentities($this->id_votado)] : "";
          $this->NM_ajax_info['fldList']['id_votado_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }

          //----- id_competencia
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_competencia", $this->nmgp_refresh_fields)))
          {
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_competencia'] = array(
               'type'    => 'text',
               'valList' => array($this->id_competencia),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_competencia']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_competencia']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_competencia']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][$this->id_competencia]) ? $aLookup[0][htmlentities($this->id_competencia)] : "";
          $this->NM_ajax_info['fldList']['id_competencia_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }

          //----- peso
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("peso", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['peso'] = array(
               'type'    => 'text',
               'valList' => array($this->peso),
              );
          }

          //----- id_habilidade
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_habilidade", $this->nmgp_refresh_fields)))
          {
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_habilidade'] = array(
               'type'    => 'text',
               'valList' => array($this->id_habilidade),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_habilidade']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_habilidade']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_habilidade']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][$this->id_habilidade]) ? $aLookup[0][htmlentities($this->id_habilidade)] : "";
          $this->NM_ajax_info['fldList']['id_habilidade_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }

          //----- resultado
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resultado", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['resultado'] = array(
               'type'    => 'text',
               'valList' => array($this->resultado),
              );
          }

          //----- nota
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nota", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nota'] = array(
               'type'    => 'text',
               'valList' => array($this->nota),
              );
          }
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_desemp']['keyVal'] = htmlentities($this->nmgp_dados_form['id_desemp']);
          }
   } // ajax_return_values

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload()
  {
      $this->nm_guardar_campos();
      $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> Acessos a Base de Dados
//----------------------------------------------------
//----------- Atualização da base de dados

   function controle_navegacao()
   {
      global $sc_where;

          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total']))
          {
               $sc_where_pos = " WHERE ((ID_ETAPA < $this->id_etapa) OR (ID_ETAPA = $this->id_etapa AND ID_COMPETENCIA < $this->id_competencia) OR (ID_ETAPA = $this->id_etapa AND ID_COMPETENCIA = $this->id_competencia AND ID_HABILIDADE < $this->id_habilidade) OR (ID_ETAPA = $this->id_etapa AND ID_COMPETENCIA = $this->id_competencia AND ID_HABILIDADE = $this->id_habilidade AND ID_DESEMP < $this->id_desemp))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = &$this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Acesso a base de dados", $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->id_etapa && '' != $this->id_competencia && '' != $this->id_habilidade && '' != $this->id_desemp)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = &$this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Acesso a base de dados", $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = &$this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Acesso a base de dados", $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = &$this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo") 
      { 
          $this->sc_evento = ""; 
      } 
      if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      if ($this->id_desemp == "")  
      { 
          $this->id_desemp = 0 ; 
      } 
      if ($this->id_turma == "")  
      { 
          $this->id_turma = 0 ; 
      } 
      if ($this->id_grupo == "")  
      { 
          $this->id_grupo = 0 ; 
      } 
      if ($this->id_votante == "")  
      { 
          $this->id_votante = 0 ; 
      } 
      if ($this->id_votado == "")  
      { 
          $this->id_votado = 0 ; 
      } 
      if ($this->id_etapa == "")  
      { 
          $this->id_etapa = 0 ; 
      } 
      if ($this->id_competencia == "")  
      { 
          $this->id_competencia = 0 ; 
      } 
      if ($this->id_habilidade == "")  
      { 
          $this->id_habilidade = 0 ; 
      } 
      if ($this->nota == "")  
      { 
          $this->nota = 0 ; 
      } 
      if ($this->peso == "")  
      { 
          $this->peso = 0 ; 
      } 
      if ($this->resultado == "")  
      { 
          $this->resultado = 0 ; 
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_ibase;
      $NM_val_form['cod_desemp'] = $this->cod_desemp;
      $NM_val_form['id_turma'] = $this->id_turma;
      $NM_val_form['id_grupo'] = $this->id_grupo;
      $NM_val_form['id_etapa'] = $this->id_etapa;
      $NM_val_form['id_votante'] = $this->id_votante;
      $NM_val_form['id_votado'] = $this->id_votado;
      $NM_val_form['id_competencia'] = $this->id_competencia;
      $NM_val_form['peso'] = $this->peso;
      $NM_val_form['id_habilidade'] = $this->id_habilidade;
      $NM_val_form['resultado'] = $this->resultado;
      $NM_val_form['nota'] = $this->nota;
      $NM_val_form['id_desemp'] = $this->id_desemp;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cod_desemp = substr($this->Db->qstr($this->cod_desemp), 1, -1); 
          if ($this->cod_desemp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_desemp = "null"; 
              $NM_val_null[] = "cod_desemp";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['foreign_key'] as $sFKName => $sFKValue)
              {
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp ";
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp ";
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
          }  
          $bUpdateOk = true;
          if (!$rs1->fields[0] == 1)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", "Erro ao alterar a base de dados - Registro inexistente"); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
          } 
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET COD_DESEMP = '$this->cod_desemp', ID_TURMA = $this->id_turma, ID_GRUPO = $this->id_grupo, ID_VOTANTE = $this->id_votante, ID_VOTADO = $this->id_votado, ID_ETAPA = $this->id_etapa, ID_COMPETENCIA = $this->id_competencia, ID_HABILIDADE = $this->id_habilidade, NOTA = $this->nota, PESO = $this->peso, RESULTADO = $this->resultado";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET COD_DESEMP = '$this->cod_desemp', ID_TURMA = $this->id_turma, ID_GRUPO = $this->id_grupo, ID_VOTANTE = $this->id_votante, ID_VOTADO = $this->id_votado, ID_ETAPA = $this->id_etapa, ID_COMPETENCIA = $this->id_competencia, ID_HABILIDADE = $this->id_habilidade, NOTA = $this->nota, PESO = $this->peso, RESULTADO = $this->resultado";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET COD_DESEMP = '$this->cod_desemp', ID_TURMA = $this->id_turma, ID_GRUPO = $this->id_grupo, ID_VOTANTE = $this->id_votante, ID_VOTADO = $this->id_votado, ID_ETAPA = $this->id_etapa, ID_COMPETENCIA = $this->id_competencia, ID_HABILIDADE = $this->id_habilidade, NOTA = $this->nota, PESO = $this->peso, RESULTADO = $this->resultado";  
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID_DESEMP = $this->id_desemp ";  
              }  
              else  
              {
                  $comando .= " WHERE ID_DESEMP = $this->id_desemp ";  
              }  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              if ($SC_ex_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = &$this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao alterar a base de dados:", $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['foreign_key'] as $sFKName => $sFKValue)
              {
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
          }  
          $bInsertOk = true;
          if (!$rs1->fields[0] == 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", "Erro na inclus&atilde;o - Registro j&aacute; existe"); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
          } 
          if ($bInsertOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_DESEMP, COD_DESEMP, ID_TURMA, ID_GRUPO, ID_VOTANTE, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, NOTA, PESO, RESULTADO) VALUES ($this->id_desemp, '$this->cod_desemp', $this->id_turma, $this->id_grupo, $this->id_votante, $this->id_votado, $this->id_etapa, $this->id_competencia, $this->id_habilidade, $this->nota, $this->peso, $this->resultado)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_DESEMP, COD_DESEMP, ID_TURMA, ID_GRUPO, ID_VOTANTE, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, NOTA, PESO, RESULTADO) VALUES (" . $NM_seq_auto . "$this->id_desemp, '$this->cod_desemp', $this->id_turma, $this->id_grupo, $this->id_votante, $this->id_votado, $this->id_etapa, $this->id_competencia, $this->id_habilidade, $this->nota, $this->peso, $this->resultado)"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = &$this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao incluir na base de dados:", $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->NM_rollback_db(); 
                          exit; 
                      }  
                  }  
              }  
              $this->sc_evento = "insert"; 
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total']);
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_desemp = substr($this->Db->qstr($this->id_desemp), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp"; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp"; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
          }  
          if (!$rs1->fields[0] == 1)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", "Erro ao excluir na base de dados - Registro inexistente"); 
              $this->nmgp_opcao = "nada"; 
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "; 
                  $rs = &$this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "; 
                  $rs = &$this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_DESEMP = $this->id_desemp "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao excluir na base de dados:", $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      exit; 
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total']);
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      foreach ($NM_val_null as $NM_cada_null)
      {
          $$NM_cada_null = "";
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['parms'] = "id_desemp?#?$this->id_desemp?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_desemp = substr($this->Db->qstr($this->id_desemp), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['where_filter'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['where_filter'];
      }
//------------ Navegação dentro da base de dados
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_desemp)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id_desemp) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and ' . $sc_where_filter : ' where ' . $sc_where_filter;
      }
      if ($this->nmgp_opcao == "avanca" || $this->nmgp_opcao == "final") 
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = &$this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_app_Desempenho = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $rt->Close(); 
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] > $qt_geral_reg_app_Desempenho)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] = $qt_geral_reg_app_Desempenho; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] = $qt_geral_reg_app_Desempenho; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] = 0;
      }
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- Acesso a base de dados
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID_DESEMP, COD_DESEMP, ID_TURMA, ID_GRUPO, ID_VOTANTE, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, NOTA, PESO, RESULTADO from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID_DESEMP, COD_DESEMP, ID_TURMA, ID_GRUPO, ID_VOTANTE, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, NOTA, PESO, RESULTADO from " . $this->Ini->nm_tabela ; 
          } 
          $sc_where = ('' != $sc_where_filter) ? ' AND ' . $sc_where_filter : '';
          if ($this->nmgp_opcao == "igual") 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $nmgp_select .= " WHERE  ID_DESEMP = $this->id_desemp " . $sc_where . ' '; 
              }  
              else  
              {
                  $nmgp_select .= " WHERE  ID_DESEMP = $this->id_desemp " . $sc_where . ' '; 
              }  
          } 
          $sc_order_by = "ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = &$this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start'] . ")" ; 
              $rs = &$this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = &$this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro acesso a base de dados - Registro inexistente", $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty = true;
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", "Erro acesso a base de dados - Registro inexistente"); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id_desemp = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_desemp'] = $this->id_desemp;
              $this->cod_desemp = $rs->fields[1] ; 
              $this->nmgp_dados_select['cod_desemp'] = $this->cod_desemp;
              $this->id_turma = $rs->fields[2] ; 
              $this->nmgp_dados_select['id_turma'] = $this->id_turma;
              $this->id_grupo = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_grupo'] = $this->id_grupo;
              $this->id_votante = $rs->fields[4] ; 
              $this->nmgp_dados_select['id_votante'] = $this->id_votante;
              $this->id_votado = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_votado'] = $this->id_votado;
              $this->id_etapa = $rs->fields[6] ; 
              $this->nmgp_dados_select['id_etapa'] = $this->id_etapa;
              $this->id_competencia = $rs->fields[7] ; 
              $this->nmgp_dados_select['id_competencia'] = $this->id_competencia;
              $this->id_habilidade = $rs->fields[8] ; 
              $this->nmgp_dados_select['id_habilidade'] = $this->id_habilidade;
              $this->nota = $rs->fields[9] ; 
              $this->nmgp_dados_select['nota'] = $this->nota;
              $this->peso = $rs->fields[10] ; 
              $this->nmgp_dados_select['peso'] = $this->peso;
              $this->resultado = $rs->fields[11] ; 
              $this->nmgp_dados_select['resultado'] = $this->resultado;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_desemp = (string)$this->id_desemp; 
              $this->id_turma = (string)$this->id_turma; 
              $this->id_grupo = (string)$this->id_grupo; 
              $this->id_votante = (string)$this->id_votante; 
              $this->id_votado = (string)$this->id_votado; 
              $this->id_etapa = (string)$this->id_etapa; 
              $this->id_competencia = (string)$this->id_competencia; 
              $this->id_habilidade = (string)$this->id_habilidade; 
              $this->nota = (string)$this->nota; 
              $this->peso = (string)$this->peso; 
              $this->resultado = (string)$this->resultado; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['parms'] = "id_desemp?#?$this->id_desemp?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['dados_select'] = $this->nmgp_dados_select;
          $this->controle_navegacao();
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $this->nm_formatar_campos();
          $this->id_desemp = "" ;  
          $this->cod_desemp = "" ;  
          $this->id_turma = "" ;  
          $this->id_grupo = "" ;  
          $this->id_votante = "" ;  
          $this->id_votado = "" ;  
          $this->id_etapa = "" ;  
          $this->id_competencia = "" ;  
          $this->id_habilidade = "" ;  
          $this->nota = "" ;  
          $this->peso = "" ;  
          $this->resultado = "" ;  
          $this->formatado = false;
      }  
//
//
//-- Formata Campos
      if ($this->nmgp_opcao != "novo") 
      {
      }
      $this->nm_proc_onload();
  }
// 
//-- Função retorna
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP < $this->id_desemp" . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP < $this->id_desemp" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP < $this->id_desemp" . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP < $this->id_desemp" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_desemp = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- Função avança
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP > $this->id_desemp" . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP > $this->id_desemp" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP > $this->id_desemp" . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " where ID_DESEMP > $this->id_desemp" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_desemp = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- Função início
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela; 
     $rs = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id_desemp = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- Função final
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_DESEMP) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id_desemp = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['run_iframe'] == "F")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['retorno_edit'] .= "&nmgp_opcao=edit&rec=fim";
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              $sJsParent .= 'parent';
              $this->NM_ajax_info['redir']['metodo'] = 'location';
              $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['retorno_edit'];
              $this->NM_ajax_info['redir']['target'] = $sJsParent;
             app_Desempenho_pack_ajax_response();
              exit;
          }
?>
         <html><body>
         <script language=javascript>
            <?php echo $sJsParent; ?>parent.location = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_Desempenho']['retorno_edit'] ?>";
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("app_Desempenho_form0.php");
 }
}
?>
