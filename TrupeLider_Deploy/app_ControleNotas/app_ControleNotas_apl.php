<?php
//
class app_ControleNotas_apl
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
   var $turma;
   var $turma1;
   var $etapa;
   var $etapa1;
   var $grupo;
   var $grupo1;
   var $votante;
   var $votante1;
   var $votado;
   var $votado1;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['etapa']))
          {
              $this->etapa = $this->NM_ajax_info['param']['etapa'];
          }
          if (isset($this->NM_ajax_info['param']['grupo']))
          {
              $this->grupo = $this->NM_ajax_info['param']['grupo'];
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
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['turma']))
          {
              $this->turma = $this->NM_ajax_info['param']['turma'];
          }
          if (isset($this->NM_ajax_info['param']['votado']))
          {
              $this->votado = $this->NM_ajax_info['param']['votado'];
          }
          if (isset($this->NM_ajax_info['param']['votante']))
          {
              $this->votante = $this->NM_ajax_info['param']['votante'];
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
      if (isset($this->global_etapa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_etapa'] = $this->global_etapa;
      }
      if (isset($this->global_grupo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_grupo'] = $this->global_grupo;
      }
      if (isset($this->global_turma) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_turma'] = $this->global_turma;
      }
      if (isset($this->global_votado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_votado'] = $this->global_votado;
      }
      if (isset($this->global_votante) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['global_votante'] = $this->global_votante;
      }
      if (isset($_POST["global_etapa"])) 
      {
          $_SESSION['global_etapa'] = $this->global_etapa;
      }
      if (isset($_POST["global_grupo"])) 
      {
          $_SESSION['global_grupo'] = $this->global_grupo;
      }
      if (isset($_POST["global_turma"])) 
      {
          $_SESSION['global_turma'] = $this->global_turma;
      }
      if (isset($_POST["global_votado"])) 
      {
          $_SESSION['global_votado'] = $this->global_votado;
      }
      if (isset($_POST["global_votante"])) 
      {
          $_SESSION['global_votante'] = $this->global_votante;
      }
      if (isset($_GET["global_etapa"])) 
      {
          $_SESSION['global_etapa'] = $this->global_etapa;
      }
      if (isset($_GET["global_grupo"])) 
      {
          $_SESSION['global_grupo'] = $this->global_grupo;
      }
      if (isset($_GET["global_turma"])) 
      {
          $_SESSION['global_turma'] = $this->global_turma;
      }
      if (isset($_GET["global_votado"])) 
      {
          $_SESSION['global_votado'] = $this->global_votado;
      }
      if (isset($_GET["global_votante"])) 
      {
          $_SESSION['global_votante'] = $this->global_votante;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_parms']);
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
             nm_limpa_str_app_ControleNotas($cadapar[1]);
             $this->$cadapar[0] = $cadapar[1];
             $ix++;
          }
          if (isset($this->global_etapa)) 
          {
              $_SESSION['global_etapa'] = $this->global_etapa;
          }
          if (isset($this->global_grupo)) 
          {
              $_SESSION['global_grupo'] = $this->global_grupo;
          }
          if (isset($this->global_turma)) 
          {
              $_SESSION['global_turma'] = $this->global_turma;
          }
          if (isset($this->global_votado)) 
          {
              $_SESSION['global_votado'] = $this->global_votado;
          }
          if (isset($this->global_votante)) 
          {
              $_SESSION['global_votante'] = $this->global_votante;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['parms']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app_ControleNotas_ini(); 
          $this->Ini->init();
      } 

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_ControleNotas.php" ; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      include_once ($this->Ini->path_libs . "/nm_valida.php") ;
      $teste_validade = new NM_Valida ;

      if ($this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['trial_version'] = 'N';
      }


      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['last']);
      }
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['first']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['back']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['forward'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['last']    = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['first']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['back']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['forward'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['last']    = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_ControleNotas']['last'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_ControleNotas", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['iframe_menu'])
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

      if (is_file($this->Ini->path_aplicacao . 'app_ControleNotas_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app_ControleNotas_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opcao'] = "" ;  
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
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['botoes'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'app_ControleNotas/app_ControleNotas_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app_ControleNotas_erro.class.php"); 
      }
      $this->Erro      = new app_ControleNotas_erro();
      $this->Erro->Ini = $this->Ini;
//
      if (!$this->Db)
      { 
          if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao']))
          { 
              $this->Db = db_conect_devel($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'SISTEMA'); 
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app_ControleNotas']['start']);
      }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = "";
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_ControleNotas.php" ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_select'];
     }
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();

//
//-----> Critica dos campos do formulário
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_turma' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'turma');
          }
          if ('validate_etapa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'etapa');
          }
          if ('validate_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'grupo');
          }
          if ('validate_votante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'votante');
          }
          if ('validate_votado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'votado');
          }
          app_ControleNotas_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              app_ControleNotas_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta) ; 
          $_SESSION['scriptcase']['app_ControleNotas']['contr_erro'] = 'off';
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
                  app_ControleNotas_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta) ; 
          $_SESSION['scriptcase']['app_ControleNotas']['contr_erro'] = 'off';
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
                  app_ControleNotas_pack_ajax_response();
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
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->turma = "" ;  
          $this->etapa = "" ;  
          $this->grupo = "" ;  
          $this->votante = "" ;  
          $this->votado = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          app_ControleNotas_pack_ajax_response();
          exit;
      }
      if ($Campos_Crit != "" || $Campos_Falta != "" || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && $Campos_Falta == "" && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos']))
              { 
                  $turma = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][0]; 
                  $etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][1]; 
                  $grupo = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][2]; 
                  $votante = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][3]; 
                  $votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][4]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][0] = $this->turma; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][1] = $this->etapa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][2] = $this->grupo; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][3] = $this->votante; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['campos'][4] = $this->votado; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['redir'] == "redir")
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("app_ControleNotas", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("app_ControleNotas_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
      }
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
      if ('' == $filtro || 'turma' == $filtro)
        $this->ValidateField_turma($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'etapa' == $filtro)
        $this->ValidateField_etapa($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'grupo' == $filtro)
        $this->ValidateField_grupo($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'votante' == $filtro)
        $this->ValidateField_votante($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'votado' == $filtro)
        $this->ValidateField_votado($Campos_Crit, $Campos_Falta);

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['app_ControleNotas']['contr_erro'] = 'on';
$sc_temp_global_votado = (isset($_SESSION['global_votado'])) ? $_SESSION['global_votado'] : "";
$sc_temp_global_votante = (isset($_SESSION['global_votante'])) ? $_SESSION['global_votante'] : "";
$sc_temp_global_grupo = (isset($_SESSION['global_grupo'])) ? $_SESSION['global_grupo'] : "";
$sc_temp_global_etapa = (isset($_SESSION['global_etapa'])) ? $_SESSION['global_etapa'] : "";
$sc_temp_global_turma = (isset($_SESSION['global_turma'])) ? $_SESSION['global_turma'] : "";
 $sc_temp_global_turma = $this->turma ;
$sc_temp_global_etapa = $this->etapa ;
$sc_temp_global_grupo = $this->grupo ;
$sc_temp_global_votante = $this->votante ;
$sc_temp_global_votado = $this->votado ;
$this->nmgp_redireciona_form($this->Ini->path_link . "app_Desempenhos/app_Desempenhos.php", $this->nm_location, "", "_self", "ret_self");;
if (isset($sc_temp_global_turma)) {  $_SESSION['global_turma'] = $sc_temp_global_turma;}
if (isset($sc_temp_global_etapa)) {  $_SESSION['global_etapa'] = $sc_temp_global_etapa;}
if (isset($sc_temp_global_grupo)) {  $_SESSION['global_grupo'] = $sc_temp_global_grupo;}
if (isset($sc_temp_global_votante)) {  $_SESSION['global_votante'] = $sc_temp_global_votante;}
if (isset($sc_temp_global_votado)) {  $_SESSION['global_votado'] = $sc_temp_global_votado;}
$_SESSION['scriptcase']['app_ControleNotas']['contr_erro'] = 'off'; 
      }
   }

    function ValidateField_turma(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
    } // ValidateField_turma

    function ValidateField_etapa(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
    } // ValidateField_etapa

    function ValidateField_grupo(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
    } // ValidateField_grupo

    function ValidateField_votante(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
    } // ValidateField_votante

    function ValidateField_votado(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
    } // ValidateField_votado
   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['turma'] = $this->turma;
    $this->nmgp_dados_form['etapa'] = $this->etapa;
    $this->nmgp_dados_form['grupo'] = $this->grupo;
    $this->nmgp_dados_form['votante'] = $this->votante;
    $this->nmgp_dados_form['votado'] = $this->votado;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
   }
   function nm_formatar_campos()
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
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

          //----- turma
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("turma", $this->nmgp_refresh_fields)))
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
          $sSelComp = "name=\"turma\"";
          if (isset($this->NM_ajax_info['select_html']['turma']) && !empty($this->NM_ajax_info['select_html']['turma']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['turma'];
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
          $this->NM_ajax_info['fldList']['turma'] = array(
               'type'    => 'select',
               'valList' => array($this->turma),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['turma']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['turma']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['turma']['labList'] = $aLabel;
          }

          //----- etapa
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("etapa", $this->nmgp_refresh_fields)))
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
          $sSelComp = "name=\"etapa\"";
          if (isset($this->NM_ajax_info['select_html']['etapa']) && !empty($this->NM_ajax_info['select_html']['etapa']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['etapa'];
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
          $this->NM_ajax_info['fldList']['etapa'] = array(
               'type'    => 'select',
               'valList' => array($this->etapa),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['etapa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['etapa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['etapa']['labList'] = $aLabel;
          }

          //----- grupo
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grupo", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO 
FROM GRUPOS 
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"grupo\"";
          if (isset($this->NM_ajax_info['select_html']['grupo']) && !empty($this->NM_ajax_info['select_html']['grupo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['grupo'];
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
          $this->NM_ajax_info['fldList']['grupo'] = array(
               'type'    => 'select',
               'valList' => array($this->grupo),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grupo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grupo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grupo']['labList'] = $aLabel;
          }

          //----- votante
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("votante", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES 
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"votante\"";
          if (isset($this->NM_ajax_info['select_html']['votante']) && !empty($this->NM_ajax_info['select_html']['votante']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['votante'];
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
          $this->NM_ajax_info['fldList']['votante'] = array(
               'type'    => 'select',
               'valList' => array($this->votante),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['votante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['votante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['votante']['labList'] = $aLabel;
          }

          //----- votado
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("votado", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
 
$nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nm_comando = "SELECT ID_PARTICIPE, NOME 
FROM PARTICIPANTES 
WHERE ID_GRUPO <> 0
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"votado\"";
          if (isset($this->NM_ajax_info['select_html']['votado']) && !empty($this->NM_ajax_info['select_html']['votado']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['votado'];
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
          $this->NM_ajax_info['fldList']['votado'] = array(
               'type'    => 'select',
               'valList' => array($this->votado),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['votado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['votado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['votado']['labList'] = $aLabel;
          }
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['run_iframe'] == "F")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['retorno_edit'] .= "&nmgp_opcao=edit&rec=fim";
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              $sJsParent .= 'parent';
              $this->NM_ajax_info['redir']['metodo'] = 'location';
              $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['retorno_edit'];
              $this->NM_ajax_info['redir']['target'] = $sJsParent;
             app_ControleNotas_pack_ajax_response();
              exit;
          }
?>
         <html><body>
         <script language=javascript>
            <?php echo $sJsParent; ?>parent.location = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['retorno_edit'] ?>";
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
    include_once("app_ControleNotas_form0.php");
 }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['sc_outra_jan'])
   {
       $nmgp_saida_form = "app_ControleNotas_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']);
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']           = 'post';
       $this->NM_ajax_info['redir']['action']           = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']           = '_self';
       $this->NM_ajax_info['redir']['script_case_init'] = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       app_ControleNotas_pack_ajax_response();
       exit;
   }
?>
   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $nmgp_saida_form; ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->nm_location; ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
   </FORM>
   <SCRIPT language="javascript">
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="")
{
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['app_ControleNotas']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           app_ControleNotas_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']   = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init'] = $this->Ini->sc_page;
       }
       app_ControleNotas_pack_ajax_response();
       exit;
   }
?>
   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $nm_apl_parms ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $nm_apl_retorno ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT language="javascript">
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
