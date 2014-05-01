<?php
//
class app_Setup_apl
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
   var $id_setup;
   var $cod_setup;
   var $id_mentor;
   var $id_mentor1;
   var $id_turma;
   var $id_turma1;
   var $id_grupo;
   var $id_grupo1;
   var $id_etapa;
   var $id_etapa1;
   var $id_lider;
   var $id_lider1;
   var $id_competencia;
   var $id_competencia1;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 60; 
   var $sc_max_reg_incl = 40; 
   var $form_vert_app_Setup = array();
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cod_setup']))
          {
              $this->cod_setup = $this->NM_ajax_info['param']['cod_setup'];
          }
          if (isset($this->NM_ajax_info['param']['id_etapa']))
          {
              $this->id_etapa = $this->NM_ajax_info['param']['id_etapa'];
          }
          if (isset($this->NM_ajax_info['param']['id_grupo']))
          {
              $this->id_grupo = $this->NM_ajax_info['param']['id_grupo'];
          }
          if (isset($this->NM_ajax_info['param']['id_lider']))
          {
              $this->id_lider = $this->NM_ajax_info['param']['id_lider'];
          }
          if (isset($this->NM_ajax_info['param']['id_setup']))
          {
              $this->id_setup = $this->NM_ajax_info['param']['id_setup'];
          }
          if (isset($this->NM_ajax_info['param']['id_turma']))
          {
              $this->id_turma = $this->NM_ajax_info['param']['id_turma'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['app_Setup']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_Setup']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app_Setup']['embutida_parms']);
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
             nm_limpa_str_app_Setup($cadapar[1]);
             $this->$cadapar[0] = $cadapar[1];
             $ix++;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Setup']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_Setup']['parms']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app_Setup_ini(); 
          $this->Ini->init();
      } 

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_Setup.php" ; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      include_once ($this->Ini->path_libs . "/nm_valida.php") ;
      $teste_validade = new NM_Valida ;

      if ($this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['trial_version'] = 'N';
      }


      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['last']);
      }
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['first']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['back']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['forward'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['last']    = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['first']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['back']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['forward'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['last']    = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Setup']['last'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_Setup", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['iframe_menu'])
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

      if (is_file($this->Ini->path_aplicacao . 'app_Setup_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app_Setup_help.txt');
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
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao']))
         { 
             if ($this->id_setup != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] = "" ;  
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
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['botoes'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'app_Setup/app_Setup_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app_Setup_erro.class.php"); 
      }
      $this->Erro      = new app_Setup_erro();
      $this->Erro->Ini = $this->Ini;
//
      if (!$this->Db)
      { 
          if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_Setup']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_Setup']['glo_nm_conexao']))
          { 
              $this->Db = db_conect_devel($_SESSION['scriptcase']['app_Setup']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'SISTEMA'); 
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['start']);
      }
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = "";
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_Setup.php" ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = htmlentities($this->New_Line);
         $this->NM_close_db();
         app_Setup_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         app_Setup_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         $this->controle_form_vert();
         if ($Campos_Crit != "" || $Campos_Falta != "" || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_app_Setup']) || !is_array($this->NM_ajax_info['errList']['geral_app_Setup']))
                  {
                      $this->NM_ajax_info['errList']['geral_app_Setup'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_app_Setup'][] = $Campos_Crit;
                  }
                  if ($Campos_Falta != "")
                  {
                      $this->NM_ajax_info['errList']['geral_app_Setup'][] = $Campos_Falta;
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_app_Setup'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         $this->NM_close_db();
         app_Setup_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit = "";
         $Campos_Falta = "";
          if ('validate_cod_setup' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'cod_setup');
          }
          if ('validate_id_turma' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_turma');
          }
          if ('validate_id_etapa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_etapa');
          }
          if ('validate_id_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_grupo');
          }
          if ('validate_id_lider' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_lider');
          }
          app_Setup_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit = "";
         $Campos_Falta = "";
         $this->cod_setup = $GLOBALS["cod_setup" . $sc_seq_vert]; 
         $this->id_turma = $GLOBALS["id_turma" . $sc_seq_vert]; 
         $this->id_etapa = $GLOBALS["id_etapa" . $sc_seq_vert]; 
         $this->id_grupo = $GLOBALS["id_grupo" . $sc_seq_vert]; 
         $this->id_lider = $GLOBALS["id_lider" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_form'][$sc_seq_vert];
             $this->id_setup = $this->nmgp_dados_form['id_setup']; 
             $this->id_mentor = $this->nmgp_dados_form['id_mentor']; 
             $this->id_competencia = $this->nmgp_dados_form['id_competencia']; 
         }
         if (isset($this->cod_setup)) { $this->nm_limpa_alfa($this->cod_setup); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || $Campos_Falta != "" || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= "<B>ERROS LINHA -" . $sc_seq_vert . "</B><BR>"; 
                 $sc_todas_Crit .= (empty($Campos_Crit)) ? "" : $Campos_Crit . "<BR>"; 
                 $sc_todas_Crit .= (empty($Campos_Falta)) ? "" : $Campos_Falta . "<BR>"; 
                 $sc_todas_Crit .= (empty($this->Campos_Mens_erro)) ? "" : $this->Campos_Mens_erro . "<BR>"; 
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_app_Setup[$sc_seq_vert]['cod_setup'] =  $this->cod_setup; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_turma'] =  $this->id_turma; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_etapa'] =  $this->id_etapa; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_grupo'] =  $this->id_grupo; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_lider'] =  $this->id_lider; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          app_Setup_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = $this->Table_refresh . $this->New_Line . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_app_Setup);
          $this->NM_ajax_info['fldList']['id_setup']['keyVal'] = htmlentities($this->nmgp_dados_form['id_setup']);
          $this->NM_close_db();
          app_Setup_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['recarga'] = $this->nmgp_opcao;
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> Critica dos campos do formulário
//
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              app_Setup_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta) ; 
          $_SESSION['scriptcase']['app_Setup']['contr_erro'] = 'off';
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
      if ('' == $filtro || 'cod_setup' == $filtro)
        $this->ValidateField_cod_setup($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_turma' == $filtro)
        $this->ValidateField_id_turma($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_etapa' == $filtro)
        $this->ValidateField_id_etapa($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_grupo' == $filtro)
        $this->ValidateField_id_grupo($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'id_lider' == $filtro)
        $this->ValidateField_id_lider($Campos_Crit, $Campos_Falta);
   }

    function ValidateField_cod_setup(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      $this->cod_setup = strtoupper($this->cod_setup) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cod_setup == "")  
          { 
              $Campos_Falta .=  "Código;" ; 
                  if (!isset($this->NM_ajax_info['errList']['cod_setup']) || !is_array($this->NM_ajax_info['errList']['cod_setup']))
                  {
                      $this->NM_ajax_info['errList']['cod_setup'] = array();
                  }
                  $this->NM_ajax_info['errList']['cod_setup'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->cod_setup) > 30) 
          { 
              $Campos_Crit .= "Código aceita o m&aacute;ximo de 30 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['cod_setup']) || !is_array($this->NM_ajax_info['errList']['cod_setup']))
              {
                  $this->NM_ajax_info['errList']['cod_setup'] = array();
              }
              $this->NM_ajax_info['errList']['cod_setup'][] = "aceita o m&aacute;ximo de 30 caracteres";
          } 
      } 
      $this->cod_setup = strtoupper($this->cod_setup) ; 
      $Teste_trab = strtoupper("abcdefghijklmnopqrstuvwxyz0123456789") ;  
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = strtoupper($this->cod_setup) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < strlen($this->cod_setup); $x++) 
          { 
               for ($y = 0; $y < strlen($Teste_trab); $y++) 
               { 
                    if (substr($Teste_compara, $x, 1) == substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (substr($Teste_compara, $x, 1) != substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "Código com caracteres inv&aacute;lidos;" ; 
              if (!isset($this->NM_ajax_info['errList']['cod_setup']) || !is_array($this->NM_ajax_info['errList']['cod_setup']))
              {
                  $this->NM_ajax_info['errList']['cod_setup'] = array();
              }
              $this->NM_ajax_info['errList']['cod_setup'][] = "com caracteres inv&aacute;lidos";
          } 
          if (strlen($this->cod_setup) > 30) 
          { 
              $Campos_Crit .= "Código aceita o m&aacute;ximo de 30 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['cod_setup']) || !is_array($this->NM_ajax_info['errList']['cod_setup']))
              {
                  $this->NM_ajax_info['errList']['cod_setup'] = array();
              }
              $this->NM_ajax_info['errList']['cod_setup'][] = "aceita o m&aacute;ximo de 30 caracteres";
          } 
      } 
    } // ValidateField_cod_setup

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

    function ValidateField_id_etapa(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->id_etapa == "" && $this->nmgp_opcao != "excluir")
      {
          $Campos_Falta .= "Pista;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_etapa']) || !is_array($this->NM_ajax_info['errList']['id_etapa']))
                  {
                      $this->NM_ajax_info['errList']['id_etapa'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_etapa'][] = "dado obrigat&oacute;rio";
      }
    } // ValidateField_id_etapa

    function ValidateField_id_grupo(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->id_grupo == "" && $this->nmgp_opcao != "excluir")
      {
          $Campos_Falta .= "Grupo;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_grupo']) || !is_array($this->NM_ajax_info['errList']['id_grupo']))
                  {
                      $this->NM_ajax_info['errList']['id_grupo'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_grupo'][] = "dado obrigat&oacute;rio";
      }
    } // ValidateField_id_grupo

    function ValidateField_id_lider(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->id_lider == "" && $this->nmgp_opcao != "excluir")
      {
          $Campos_Falta .= "Líder;" ; 
                  if (!isset($this->NM_ajax_info['errList']['id_lider']) || !is_array($this->NM_ajax_info['errList']['id_lider']))
                  {
                      $this->NM_ajax_info['errList']['id_lider'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_lider'][] = "dado obrigat&oacute;rio";
      }
    } // ValidateField_id_lider
   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['cod_setup'] = $this->cod_setup;
    $this->nmgp_dados_form['id_turma'] = $this->id_turma;
    $this->nmgp_dados_form['id_etapa'] = $this->id_etapa;
    $this->nmgp_dados_form['id_grupo'] = $this->id_grupo;
    $this->nmgp_dados_form['id_lider'] = $this->id_lider;
    $this->nmgp_dados_form['id_setup'] = $this->id_setup;
    $this->nmgp_dados_form['id_mentor'] = $this->id_mentor;
    $this->nmgp_dados_form['id_competencia'] = $this->id_competencia;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
      nm_limpa_numero($this->id_setup) ; 
   }
   function nm_formatar_campos()
   {
      global $nm_form_submit;
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
          if (isset($this->nmgp_refresh_fields))
          {
              $this->form_vert_app_Setup[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_app_Setup);
          foreach($this->form_vert_app_Setup as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_setup", $this->nmgp_refresh_fields)))
              {
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cod_setup' . $sc_seq_vert] = array(
                       'type'    => 'text',
                       'valList' => array($aRecData['cod_setup']),
                       );
              }
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
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_turma'] . "\";");
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
                  $this->NM_ajax_info['fldList']['id_turma' . $sc_seq_vert] = array(
                       'type'    => 'select',
                       'valList' => array($aRecData['id_turma']),
                       'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_turma' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_turma' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_turma' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_etapa", $this->nmgp_refresh_fields)))
              {
                  $aLookup = array();
 
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
          $sSelComp = "name=\"id_etapa\"";
          if (isset($this->NM_ajax_info['select_html']['id_etapa']) && !empty($this->NM_ajax_info['select_html']['id_etapa']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_etapa'] . "\";");
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
                  $this->NM_ajax_info['fldList']['id_etapa' . $sc_seq_vert] = array(
                       'type'    => 'select',
                       'valList' => array($aRecData['id_etapa']),
                       'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_etapa' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_etapa' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_etapa' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_grupo", $this->nmgp_refresh_fields)))
              {
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
   $this->id_turma = $this->form_vert_app_Setup[$sc_seq_vert]['id_turma'];
if ($this->id_turma != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS
WHERE ID_TURMA = '$this->id_turma' 
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_grupo\"";
          if (isset($this->NM_ajax_info['select_html']['id_grupo']) && !empty($this->NM_ajax_info['select_html']['id_grupo']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_grupo'] . "\";");
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
                  $this->NM_ajax_info['fldList']['id_grupo' . $sc_seq_vert] = array(
                       'type'    => 'select',
                       'valList' => array($aRecData['id_grupo']),
                       'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_grupo' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_grupo' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_grupo' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_lider", $this->nmgp_refresh_fields)))
              {
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
   $this->id_grupo = $this->form_vert_app_Setup[$sc_seq_vert]['id_grupo'];
if ($this->id_grupo != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES
WHERE ID_GRUPO = '$this->id_grupo' 
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_lider\"";
          if (isset($this->NM_ajax_info['select_html']['id_lider']) && !empty($this->NM_ajax_info['select_html']['id_lider']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_lider'] . "\";");
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
                  $this->NM_ajax_info['fldList']['id_lider' . $sc_seq_vert] = array(
                       'type'    => 'select',
                       'valList' => array($aRecData['id_lider']),
                       'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_lider' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_lider' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_lider' . $sc_seq_vert]['labList'] = $aLabel;
              }
          }
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_setup']['keyVal'] = htmlentities($this->nmgp_dados_form['id_setup']);
          }
   } // ajax_return_values

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
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

          if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total'])))
          {
               $sc_where_pos = " WHERE ((ID_SETUP < " . $this->nmgp_dados_form['id_setup'] . "))";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->nmgp_dados_form['id_setup'])
               {
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = &$this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Acesso a base de dados", $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = $rsc->fields[0] - 60;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['qt_reg_grid'] = sizeof($this->form_vert_app_Setup);
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opcao'] = '';

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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $SC_tem_cmp_update = true; 
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['cod_setup'] == $this->cod_setup &&
              $this->nmgp_dados_select['id_turma'] == $this->id_turma &&
              $this->nmgp_dados_select['id_etapa'] == $this->id_etapa &&
              $this->nmgp_dados_select['id_grupo'] == $this->id_grupo &&
              $this->nmgp_dados_select['id_lider'] == $this->id_lider)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
      }
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
      if ($this->id_setup == "")  
      { 
          $this->id_setup = 0 ; 
      } 
      if ($this->id_mentor == "")  
      { 
          $this->id_mentor = 0 ; 
      } 
      if ($this->id_turma == "")  
      { 
          $this->id_turma = 0 ; 
      } 
      if ($this->id_grupo == "")  
      { 
          $this->id_grupo = 0 ; 
      } 
      if ($this->id_etapa == "")  
      { 
          $this->id_etapa = 0 ; 
      } 
      if ($this->id_lider == "")  
      { 
          $this->id_lider = 0 ; 
      } 
      if ($this->id_competencia == "")  
      { 
          $this->id_competencia = 0 ; 
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_ibase;
      $NM_val_form['cod_setup'] = $this->cod_setup;
      $NM_val_form['id_turma'] = $this->id_turma;
      $NM_val_form['id_etapa'] = $this->id_etapa;
      $NM_val_form['id_grupo'] = $this->id_grupo;
      $NM_val_form['id_lider'] = $this->id_lider;
      $NM_val_form['id_setup'] = $this->id_setup;
      $NM_val_form['id_mentor'] = $this->id_mentor;
      $NM_val_form['id_competencia'] = $this->id_competencia;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cod_setup = substr($this->Db->qstr($this->cod_setup), 1, -1); 
          if ($this->cod_setup == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_setup = "null"; 
              $NM_val_null[] = "cod_setup";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key'] as $sFKName => $sFKValue)
              {
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup ";
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup ";
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
          }  
          $bUpdateOk = true;
          if (!$rs1->fields[0] == 1)  
          { 
              $this->Campos_Mens_erro = "Erro ao alterar a base de dados - Registro inexistente"; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
          } 
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET COD_SETUP = '$this->cod_setup', ID_TURMA = $this->id_turma, ID_GRUPO = $this->id_grupo, ID_ETAPA = $this->id_etapa, ID_LIDER = $this->id_lider";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET COD_SETUP = '$this->cod_setup', ID_TURMA = $this->id_turma, ID_GRUPO = $this->id_grupo, ID_ETAPA = $this->id_etapa, ID_LIDER = $this->id_lider";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET COD_SETUP = '$this->cod_setup', ID_TURMA = $this->id_turma, ID_GRUPO = $this->id_grupo, ID_ETAPA = $this->id_etapa, ID_LIDER = $this->id_lider";  
              } 
              if ($NM_val_form['id_mentor'] != $this->nmgp_dados_select['id_mentor']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ID_MENTOR = $this->id_mentor"; 
                  $comando_oracle .= " ID_MENTOR = $this->id_mentor"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if ($NM_val_form['id_competencia'] != $this->nmgp_dados_select['id_competencia']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " ID_COMPETENCIA = $this->id_competencia"; 
                  $comando_oracle .= " ID_COMPETENCIA = $this->id_competencia"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID_SETUP = $this->id_setup ";  
              }  
              else  
              {
                  $comando .= " WHERE ID_SETUP = $this->id_setup ";  
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
              $this->sc_teve_alt = true; 
              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['readOnly']['cod_setup' . $this->nmgp_refresh_row] = 'on';
                  $this->NM_ajax_info['fldList']['cod_setup' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cod_setup' . $this->nmgp_refresh_row]['valList'] = array($this->cod_setup);
                  $this->NM_ajax_info['fldList']['cod_setup' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cod_setup);

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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_turma)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_turma = $sLabelTemp;
                  $this->NM_ajax_info['readOnly']['id_turma' . $this->nmgp_refresh_row] = 'on';
                  $this->NM_ajax_info['fldList']['id_turma' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_turma' . $this->nmgp_refresh_row]['valList'] = array($this->id_turma);
                  $this->NM_ajax_info['fldList']['id_turma' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_turma);

                  $aLookup = array();
 
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_etapa)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_etapa = $sLabelTemp;
                  $this->NM_ajax_info['readOnly']['id_etapa' . $this->nmgp_refresh_row] = 'on';
                  $this->NM_ajax_info['fldList']['id_etapa' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_etapa' . $this->nmgp_refresh_row]['valList'] = array($this->id_etapa);
                  $this->NM_ajax_info['fldList']['id_etapa' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_etapa);

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if ($this->id_turma != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS
WHERE ID_TURMA = '$this->id_turma' 
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
} 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_grupo)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_grupo = $sLabelTemp;
                  $this->NM_ajax_info['readOnly']['id_grupo' . $this->nmgp_refresh_row] = 'on';
                  $this->NM_ajax_info['fldList']['id_grupo' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_grupo' . $this->nmgp_refresh_row]['valList'] = array($this->id_grupo);
                  $this->NM_ajax_info['fldList']['id_grupo' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_grupo);

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if ($this->id_grupo != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES
WHERE ID_GRUPO = '$this->id_grupo' 
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
} 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_lider)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_lider = $sLabelTemp;
                  $this->NM_ajax_info['readOnly']['id_lider' . $this->nmgp_refresh_row] = 'on';
                  $this->NM_ajax_info['fldList']['id_lider' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_lider' . $this->nmgp_refresh_row]['valList'] = array($this->id_lider);
                  $this->NM_ajax_info['fldList']['id_lider' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_lider);


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key'] as $sFKName => $sFKValue)
              {
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
          }  
          $bInsertOk = true;
          if (!$rs1->fields[0] == 0) 
          { 
              $this->Campos_Mens_erro = "Erro na inclus&atilde;o - Registro j&aacute; existe"; 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
          } 
          if ($bInsertOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_SETUP, COD_SETUP, ID_MENTOR, ID_TURMA, ID_GRUPO, ID_ETAPA, ID_LIDER, ID_COMPETENCIA) VALUES ($this->id_setup, '$this->cod_setup', $this->id_mentor, $this->id_turma, $this->id_grupo, $this->id_etapa, $this->id_lider, $this->id_competencia)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_SETUP, COD_SETUP, ID_MENTOR, ID_TURMA, ID_GRUPO, ID_ETAPA, ID_LIDER, ID_COMPETENCIA) VALUES (" . $NM_seq_auto . "$this->id_setup, '$this->cod_setup', $this->id_mentor, $this->id_turma, $this->id_grupo, $this->id_etapa, $this->id_lider, $this->id_competencia)"; 
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
              $this->sc_teve_incl = true; 
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['cod_setup' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cod_setup' . $this->nmgp_refresh_row]['valList'] = array($this->cod_setup);
                  $this->NM_ajax_info['fldList']['cod_setup' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cod_setup);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_setup' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_setup' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_setup' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_setup' . $this->nmgp_refresh_row] = "on";
                      }
                  }

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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_turma)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_turma = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_turma' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_turma' . $this->nmgp_refresh_row]['valList'] = array($this->id_turma);
                  $this->NM_ajax_info['fldList']['id_turma' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_turma);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_turma' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_turma' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_turma' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_turma' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_etapa)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_etapa = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_etapa' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_etapa' . $this->nmgp_refresh_row]['valList'] = array($this->id_etapa);
                  $this->NM_ajax_info['fldList']['id_etapa' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_etapa);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_etapa' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_etapa' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_etapa' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_etapa' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if ($this->id_turma != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS
WHERE ID_TURMA = '$this->id_turma' 
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
} 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_grupo)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_grupo = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_grupo' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_grupo' . $this->nmgp_refresh_row]['valList'] = array($this->id_grupo);
                  $this->NM_ajax_info['fldList']['id_grupo' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_grupo);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_grupo' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_grupo' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_grupo' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_grupo' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if ($this->id_grupo != "")
{ 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES
WHERE ID_GRUPO = '$this->id_grupo' 
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
} 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == $this->id_lider)
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_lider = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_lider' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_lider' . $this->nmgp_refresh_row]['valList'] = array($this->id_lider);
                  $this->NM_ajax_info['fldList']['id_lider' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_lider);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_lider' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_lider' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_lider' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_lider' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total']);
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_setup = substr($this->Db->qstr($this->id_setup), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup"; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup"; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
          }  
          if (!$rs1->fields[0] == 1)  
          { 
              $this->Campos_Mens_erro = "Erro ao excluir na base de dados - Registro inexistente"; 
              $this->nmgp_opcao = "nada"; 
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "; 
                  $rs = &$this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "; 
                  $rs = &$this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_SETUP = $this->id_setup "); 
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
              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['parms'] = "id_setup?#?$this->id_setup?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_setup = substr($this->Db->qstr($this->id_setup), 1, -1); 
      } 
   }
//---------- Acesso a base de dados
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['app_Setup']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['embutida_liga_qtd_reg'];
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->db; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_app_Setup = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] -= $this->sc_max_reg;
      }
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['where_filter'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['where_filter'];
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and ' . $sc_where_filter : ' where ' . $sc_where_filter;
      }
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          if ('' == $sc_where)
          {
              $sc_where = " where (";
          }
          else
          {
              $sc_where .= " and (";
          }
          $sc_where .= "ID_SETUP = " . $this->id_setup;
          $sc_where .= ")";
      }
      if ('total' != $this->form_paginacao)
      {
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
          $qt_geral_reg_app_Setup = isset($rt->fields[0]) ? $rt->fields[0] : 0; 
          $rt->Close(); 
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] >= $qt_geral_reg_app_Setup)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = $qt_geral_reg_app_Setup - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = $qt_geral_reg_app_Setup - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] = 0; 
          }
      } 
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT ID_SETUP, COD_SETUP, ID_MENTOR, ID_TURMA, ID_GRUPO, ID_ETAPA, ID_LIDER, ID_COMPETENCIA from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT ID_SETUP, COD_SETUP, ID_MENTOR, ID_TURMA, ID_GRUPO, ID_ETAPA, ID_LIDER, ID_COMPETENCIA from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = &$this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = &$this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = &$this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start'] . ")" ; 
                  $rs = &$this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = &$this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['reg_start']) ;  
                  } 
              } 
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
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          $sc_seq_vert = 1; 
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_setup = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_setup'] = $this->id_setup;
              $this->cod_setup = $rs->fields[1] ; 
              $this->nmgp_dados_select['cod_setup'] = $this->cod_setup;
              $this->id_mentor = $rs->fields[2] ; 
              $this->nmgp_dados_select['id_mentor'] = $this->id_mentor;
              $this->id_turma = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_turma'] = $this->id_turma;
              $this->id_grupo = $rs->fields[4] ; 
              $this->nmgp_dados_select['id_grupo'] = $this->id_grupo;
              $this->id_etapa = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_etapa'] = $this->id_etapa;
              $this->id_lider = $rs->fields[6] ; 
              $this->nmgp_dados_select['id_lider'] = $this->id_lider;
              $this->id_competencia = $rs->fields[7] ; 
              $this->nmgp_dados_select['id_competencia'] = $this->id_competencia;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_setup = (string)$this->id_setup; 
              $this->id_mentor = (string)$this->id_mentor; 
              $this->id_turma = (string)$this->id_turma; 
              $this->id_grupo = (string)$this->id_grupo; 
              $this->id_etapa = (string)$this->id_etapa; 
              $this->id_lider = (string)$this->id_lider; 
              $this->id_competencia = (string)$this->id_competencia; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['parms'] = "id_setup?#?$this->id_setup?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- Formata Campos
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_app_Setup[$sc_seq_vert]['cod_setup'] =  $this->cod_setup; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_turma'] =  $this->id_turma; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_etapa'] =  $this->id_etapa; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_grupo'] =  $this->id_grupo; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_lider'] =  $this->id_lider; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_app_Setup); 
          $rs->Close(); 
          $this->controle_navegacao();
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->cod_setup = "";  
              $this->id_turma = "";  
              $this->id_grupo = "";  
              $this->id_etapa = "";  
              $this->id_lider = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_app_Setup[$sc_seq_vert]['cod_setup'] =  $this->cod_setup; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_turma'] =  $this->id_turma; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_etapa'] =  $this->id_etapa; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_grupo'] =  $this->id_grupo; 
             $this->form_vert_app_Setup[$sc_seq_vert]['id_lider'] =  $this->id_lider; 
              $sc_seq_vert++; 
          } 
      }  
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['run_iframe'] == "F")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['retorno_edit'] .= "&nmgp_opcao=edit&rec=fim";
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              $sJsParent .= 'parent';
              $this->NM_ajax_info['redir']['metodo'] = 'location';
              $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['retorno_edit'];
              $this->NM_ajax_info['redir']['target'] = $sJsParent;
             app_Setup_pack_ajax_response();
              exit;
          }
?>
         <html><body>
         <script language=javascript>
            <?php echo $sJsParent; ?>parent.location = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_Setup']['retorno_edit'] ?>";
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }
}
?>
