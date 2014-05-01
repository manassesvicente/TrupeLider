<?php
//
class app_Participantes_apl
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
   var $id_grupo;
   var $id_participe;
   var $nome;
   var $sobrenome;
   var $estado;
   var $cidade;
   var $bairro;
   var $logradouro;
   var $numero;
   var $complemento;
   var $cep;
   var $email;
   var $telefax;
   var $tel;
   var $obs;
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
          if (isset($this->NM_ajax_info['param']['bairro']))
          {
              $this->bairro = $this->NM_ajax_info['param']['bairro'];
          }
          if (isset($this->NM_ajax_info['param']['cep']))
          {
              $this->cep = $this->NM_ajax_info['param']['cep'];
          }
          if (isset($this->NM_ajax_info['param']['cidade']))
          {
              $this->cidade = $this->NM_ajax_info['param']['cidade'];
          }
          if (isset($this->NM_ajax_info['param']['complemento']))
          {
              $this->complemento = $this->NM_ajax_info['param']['complemento'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['estado']))
          {
              $this->estado = $this->NM_ajax_info['param']['estado'];
          }
          if (isset($this->NM_ajax_info['param']['id_grupo']))
          {
              $this->id_grupo = $this->NM_ajax_info['param']['id_grupo'];
          }
          if (isset($this->NM_ajax_info['param']['id_participe']))
          {
              $this->id_participe = $this->NM_ajax_info['param']['id_participe'];
          }
          if (isset($this->NM_ajax_info['param']['logradouro']))
          {
              $this->logradouro = $this->NM_ajax_info['param']['logradouro'];
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
          if (isset($this->NM_ajax_info['param']['nome']))
          {
              $this->nome = $this->NM_ajax_info['param']['nome'];
          }
          if (isset($this->NM_ajax_info['param']['numero']))
          {
              $this->numero = $this->NM_ajax_info['param']['numero'];
          }
          if (isset($this->NM_ajax_info['param']['obs']))
          {
              $this->obs = $this->NM_ajax_info['param']['obs'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sobrenome']))
          {
              $this->sobrenome = $this->NM_ajax_info['param']['sobrenome'];
          }
          if (isset($this->NM_ajax_info['param']['tel']))
          {
              $this->tel = $this->NM_ajax_info['param']['tel'];
          }
          if (isset($this->NM_ajax_info['param']['telefax']))
          {
              $this->telefax = $this->NM_ajax_info['param']['telefax'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['app_Participantes']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_Participantes']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app_Participantes']['embutida_parms']);
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
             nm_limpa_str_app_Participantes($cadapar[1]);
             $this->$cadapar[0] = $cadapar[1];
             $ix++;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Participantes']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_Participantes']['parms']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app_Participantes_ini(); 
          $this->Ini->init();
      } 

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_Participantes.php" ; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      include_once ($this->Ini->path_libs . "/nm_valida.php") ;
      $teste_validade = new NM_Valida ;

      if ($this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['trial_version'] = 'N';
      }


      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['last']);
      }
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['first']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['back']    = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['forward'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['last']    = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['first']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['back']    = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['forward'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['last']    = 'on';
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_Participantes']['last'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_form'];
          if (!isset($this->id_participe)){$this->id_participe = $this->nmgp_dados_form['id_participe'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_Participantes", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['iframe_menu'])
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

      if (is_file($this->Ini->path_aplicacao . 'app_Participantes_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app_Participantes_help.txt');
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
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao']))
         { 
             if ($this->id_participe != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] = "" ;  
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
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['botoes'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'app_Participantes/app_Participantes_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app_Participantes_erro.class.php"); 
      }
      $this->Erro      = new app_Participantes_erro();
      $this->Erro->Ini = $this->Ini;
//
      if (!$this->Db)
      { 
          if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_Participantes']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_Participantes']['glo_nm_conexao']))
          { 
              $this->Db = db_conect_devel($_SESSION['scriptcase']['app_Participantes']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'SISTEMA'); 
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app_Participantes']['start']);
      }
      if (isset($this->nome)) { $this->nm_limpa_alfa($this->nome); }
      if (isset($this->sobrenome)) { $this->nm_limpa_alfa($this->sobrenome); }
      if (isset($this->estado)) { $this->nm_limpa_alfa($this->estado); }
      if (isset($this->cidade)) { $this->nm_limpa_alfa($this->cidade); }
      if (isset($this->bairro)) { $this->nm_limpa_alfa($this->bairro); }
      if (isset($this->logradouro)) { $this->nm_limpa_alfa($this->logradouro); }
      if (isset($this->numero)) { $this->nm_limpa_alfa($this->numero); }
      if (isset($this->complemento)) { $this->nm_limpa_alfa($this->complemento); }
      if (isset($this->cep)) { $this->nm_limpa_alfa($this->cep); }
      if (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
      if (isset($this->telefax)) { $this->nm_limpa_alfa($this->telefax); }
      if (isset($this->tel)) { $this->nm_limpa_alfa($this->tel); }
      if (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = "";
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_Participantes.php" ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_select'];
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
          if ('validate_id_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'id_grupo');
          }
          if ('validate_nome' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'nome');
          }
          if ('validate_sobrenome' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'sobrenome');
          }
          if ('validate_cep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'cep');
          }
          if ('validate_estado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'estado');
          }
          if ('validate_cidade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'cidade');
          }
          if ('validate_bairro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'bairro');
          }
          if ('validate_logradouro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'logradouro');
          }
          if ('validate_numero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'numero');
          }
          if ('validate_complemento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'complemento');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'email');
          }
          if ('validate_telefax' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'telefax');
          }
          if ('validate_tel' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'tel');
          }
          if ('validate_obs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, 'obs');
          }
          app_Participantes_pack_ajax_response();
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
   $nm_comando = "SELECT ID_GRUPO, COD_GRUPO FROM GRUPOS WHERE COD_GRUPO LIKE '" . $this->id_grupo . "%' ORDER BY ID_GRUPO";
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
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
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
                      $this->NM_ajax_info['autoComp'] .= "<div class='nm_ac_cod'>" . utf8_encode($sLkpIndex) . "</div>";
                      $this->NM_ajax_info['autoComp'] .= "</li>\n";
                  }
              }
              $this->NM_ajax_info['autoComp'] .= "</ul>\n";
          }
          app_Participantes_pack_ajax_response();
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
              app_Participantes_pack_ajax_response();
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
          $_SESSION['scriptcase']['app_Participantes']['contr_erro'] = 'off';
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
                  app_Participantes_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          app_Participantes_pack_ajax_response();
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
          app_Participantes_pack_ajax_response();
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
      if ('' == $filtro || 'id_grupo' == $filtro)
        $this->ValidateField_id_grupo($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'nome' == $filtro)
        $this->ValidateField_nome($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'sobrenome' == $filtro)
        $this->ValidateField_sobrenome($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'cep' == $filtro)
        $this->ValidateField_cep($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'estado' == $filtro)
        $this->ValidateField_estado($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'cidade' == $filtro)
        $this->ValidateField_cidade($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'bairro' == $filtro)
        $this->ValidateField_bairro($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'logradouro' == $filtro)
        $this->ValidateField_logradouro($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'numero' == $filtro)
        $this->ValidateField_numero($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'complemento' == $filtro)
        $this->ValidateField_complemento($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'telefax' == $filtro)
        $this->ValidateField_telefax($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'tel' == $filtro)
        $this->ValidateField_tel($Campos_Crit, $Campos_Falta);
      if ('' == $filtro || 'obs' == $filtro)
        $this->ValidateField_obs($Campos_Crit, $Campos_Falta);
   }

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

    function ValidateField_nome(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->nome == "")  
          { 
              $Campos_Falta .=  "Nome Participante;" ; 
                  if (!isset($this->NM_ajax_info['errList']['nome']) || !is_array($this->NM_ajax_info['errList']['nome']))
                  {
                      $this->NM_ajax_info['errList']['nome'] = array();
                  }
                  $this->NM_ajax_info['errList']['nome'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->nome) > 20) 
          { 
              $Campos_Crit .= "Nome Participante aceita o m&aacute;ximo de 20 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['nome']) || !is_array($this->NM_ajax_info['errList']['nome']))
              {
                  $this->NM_ajax_info['errList']['nome'] = array();
              }
              $this->NM_ajax_info['errList']['nome'][] = "aceita o m&aacute;ximo de 20 caracteres";
          } 
      } 
    } // ValidateField_nome

    function ValidateField_sobrenome(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->sobrenome == "")  
          { 
              $Campos_Falta .=  "Sobrenome;" ; 
                  if (!isset($this->NM_ajax_info['errList']['sobrenome']) || !is_array($this->NM_ajax_info['errList']['sobrenome']))
                  {
                      $this->NM_ajax_info['errList']['sobrenome'] = array();
                  }
                  $this->NM_ajax_info['errList']['sobrenome'][] = "dado obrigat&oacute;rio";
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->sobrenome) > 120) 
          { 
              $Campos_Crit .= "Sobrenome aceita o m&aacute;ximo de 120 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['sobrenome']) || !is_array($this->NM_ajax_info['errList']['sobrenome']))
              {
                  $this->NM_ajax_info['errList']['sobrenome'] = array();
              }
              $this->NM_ajax_info['errList']['sobrenome'][] = "aceita o m&aacute;ximo de 120 caracteres";
          } 
      } 
    } // ValidateField_sobrenome

    function ValidateField_cep(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      nm_limpa_cep($this->cep) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->cep) != "")  
          { 
              if (strlen($this->cep) != 8  || (int)$this->cep == 0)
              { 
                  $Campos_Crit .= "CEP;" ; 
                  if (!isset($this->NM_ajax_info['errList']['cep']) || !is_array($this->NM_ajax_info['errList']['cep']))
                  {
                      $this->NM_ajax_info['errList']['cep'] = array();
                  }
                  $this->NM_ajax_info['errList']['cep'][] = "dados inv&aacute;lidos";
              } 
          } 
      } 
    } // ValidateField_cep

    function ValidateField_estado(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->estado) > 30) 
          { 
              $Campos_Crit .= "Estado aceita o m&aacute;ximo de 30 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['estado']) || !is_array($this->NM_ajax_info['errList']['estado']))
              {
                  $this->NM_ajax_info['errList']['estado'] = array();
              }
              $this->NM_ajax_info['errList']['estado'][] = "aceita o m&aacute;ximo de 30 caracteres";
          } 
      } 
    } // ValidateField_estado

    function ValidateField_cidade(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->cidade) > 35) 
          { 
              $Campos_Crit .= "Cidade aceita o m&aacute;ximo de 35 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['cidade']) || !is_array($this->NM_ajax_info['errList']['cidade']))
              {
                  $this->NM_ajax_info['errList']['cidade'] = array();
              }
              $this->NM_ajax_info['errList']['cidade'][] = "aceita o m&aacute;ximo de 35 caracteres";
          } 
      } 
    } // ValidateField_cidade

    function ValidateField_bairro(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->bairro) > 25) 
          { 
              $Campos_Crit .= "Bairro aceita o m&aacute;ximo de 25 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['bairro']) || !is_array($this->NM_ajax_info['errList']['bairro']))
              {
                  $this->NM_ajax_info['errList']['bairro'] = array();
              }
              $this->NM_ajax_info['errList']['bairro'][] = "aceita o m&aacute;ximo de 25 caracteres";
          } 
      } 
    } // ValidateField_bairro

    function ValidateField_logradouro(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->logradouro) > 200) 
          { 
              $Campos_Crit .= "Endereço aceita o m&aacute;ximo de 200 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['logradouro']) || !is_array($this->NM_ajax_info['errList']['logradouro']))
              {
                  $this->NM_ajax_info['errList']['logradouro'] = array();
              }
              $this->NM_ajax_info['errList']['logradouro'][] = "aceita o m&aacute;ximo de 200 caracteres";
          } 
      } 
    } // ValidateField_logradouro

    function ValidateField_numero(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->numero) > 6) 
          { 
              $Campos_Crit .= "Número aceita o m&aacute;ximo de 6 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['numero']) || !is_array($this->NM_ajax_info['errList']['numero']))
              {
                  $this->NM_ajax_info['errList']['numero'] = array();
              }
              $this->NM_ajax_info['errList']['numero'][] = "aceita o m&aacute;ximo de 6 caracteres";
          } 
      } 
    } // ValidateField_numero

    function ValidateField_complemento(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->complemento) > 50) 
          { 
              $Campos_Crit .= "Complemento aceita o m&aacute;ximo de 50 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['complemento']) || !is_array($this->NM_ajax_info['errList']['complemento']))
              {
                  $this->NM_ajax_info['errList']['complemento'] = array();
              }
              $this->NM_ajax_info['errList']['complemento'][] = "aceita o m&aacute;ximo de 50 caracteres";
          } 
      } 
    } // ValidateField_complemento

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->email) != "")  
          { 
              if ($teste_validade->Email($this->email) == false)  
              { 
                      $Campos_Crit .= "E-mail;" ; 
                      if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                      {
                          $this->NM_ajax_info['errList']['email'] = array();
                      }
                      $this->NM_ajax_info['errList']['email'][] = "dados inv&aacute;lidos";
              } 
          } 
      } 
    } // ValidateField_email

    function ValidateField_telefax(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->telefax) > 40) 
          { 
              $Campos_Crit .= "Telefone / Fax aceita o m&aacute;ximo de 40 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['telefax']) || !is_array($this->NM_ajax_info['errList']['telefax']))
              {
                  $this->NM_ajax_info['errList']['telefax'] = array();
              }
              $this->NM_ajax_info['errList']['telefax'][] = "aceita o m&aacute;ximo de 40 caracteres";
          } 
      } 
    } // ValidateField_telefax

    function ValidateField_tel(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->tel) > 40) 
          { 
              $Campos_Crit .= "Celular aceita o m&aacute;ximo de 40 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['tel']) || !is_array($this->NM_ajax_info['errList']['tel']))
              {
                  $this->NM_ajax_info['errList']['tel'] = array();
              }
              $this->NM_ajax_info['errList']['tel'][] = "aceita o m&aacute;ximo de 40 caracteres";
          } 
      } 
    } // ValidateField_tel

    function ValidateField_obs(&$Campos_Crit, &$Campos_Falta)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (strlen($this->obs) > 250) 
          { 
              $Campos_Crit .= "Observações aceita o m&aacute;ximo de 250 caracteres;" ; 
              if (!isset($this->NM_ajax_info['errList']['obs']) || !is_array($this->NM_ajax_info['errList']['obs']))
              {
                  $this->NM_ajax_info['errList']['obs'] = array();
              }
              $this->NM_ajax_info['errList']['obs'][] = "aceita o m&aacute;ximo de 250 caracteres";
          } 
      } 
    } // ValidateField_obs
   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id_grupo'] = $this->id_grupo;
    $this->nmgp_dados_form['nome'] = $this->nome;
    $this->nmgp_dados_form['sobrenome'] = $this->sobrenome;
    $this->nmgp_dados_form['cep'] = $this->cep;
    $this->nmgp_dados_form['estado'] = $this->estado;
    $this->nmgp_dados_form['cidade'] = $this->cidade;
    $this->nmgp_dados_form['bairro'] = $this->bairro;
    $this->nmgp_dados_form['logradouro'] = $this->logradouro;
    $this->nmgp_dados_form['numero'] = $this->numero;
    $this->nmgp_dados_form['complemento'] = $this->complemento;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['telefax'] = $this->telefax;
    $this->nmgp_dados_form['tel'] = $this->tel;
    $this->nmgp_dados_form['obs'] = $this->obs;
    $this->nmgp_dados_form['id_participe'] = $this->id_participe;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
      nm_limpa_cep($this->cep) ; 
      nm_limpa_numero($this->id_participe) ; 
   }
   function nm_formatar_campos()
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->cep))
      {
          nmgp_Form_Cep($this->cep) ; 
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
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
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

          //----- nome
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nome", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nome'] = array(
               'type'    => 'text',
               'valList' => array($this->nome),
              );
          }

          //----- sobrenome
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sobrenome", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sobrenome'] = array(
               'type'    => 'text',
               'valList' => array($this->sobrenome),
              );
          }

          //----- cep
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cep", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cep'] = array(
               'type'    => 'text',
               'valList' => array($this->cep),
              );
          }

          //----- estado
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estado", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estado'] = array(
               'type'    => 'text',
               'valList' => array($this->estado),
              );
          }

          //----- cidade
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cidade", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cidade'] = array(
               'type'    => 'text',
               'valList' => array($this->cidade),
              );
          }

          //----- bairro
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bairro", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bairro'] = array(
               'type'    => 'text',
               'valList' => array($this->bairro),
              );
          }

          //----- logradouro
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("logradouro", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['logradouro'] = array(
               'type'    => 'text',
               'valList' => array($this->logradouro),
              );
          }

          //----- numero
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero'] = array(
               'type'    => 'text',
               'valList' => array($this->numero),
              );
          }

          //----- complemento
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("complemento", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['complemento'] = array(
               'type'    => 'text',
               'valList' => array($this->complemento),
              );
          }

          //----- email
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
               'type'    => 'text',
               'valList' => array($this->email),
              );
          }

          //----- telefax
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefax", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telefax'] = array(
               'type'    => 'text',
               'valList' => array($this->telefax),
              );
          }

          //----- tel
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tel", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tel'] = array(
               'type'    => 'text',
               'valList' => array($this->tel),
              );
          }

          //----- obs
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obs", $this->nmgp_refresh_fields)))
          {
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obs'] = array(
               'type'    => 'text',
               'valList' => array($this->obs),
              );
          }
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_participe']['keyVal'] = htmlentities($this->nmgp_dados_form['id_participe']);
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

          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total']))
          {
               $sc_where_pos = " WHERE ((ID_PARTICIPE < $this->id_participe))";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->id_participe)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = &$this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Acesso a base de dados", $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opcao'] = '';

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
      if ($this->id_grupo == "")  
      { 
          $this->id_grupo = 0 ; 
      } 
      if ($this->id_participe == "")  
      { 
          $this->id_participe = 0 ; 
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_ibase;
      $NM_val_form['id_grupo'] = $this->id_grupo;
      $NM_val_form['nome'] = $this->nome;
      $NM_val_form['sobrenome'] = $this->sobrenome;
      $NM_val_form['cep'] = $this->cep;
      $NM_val_form['estado'] = $this->estado;
      $NM_val_form['cidade'] = $this->cidade;
      $NM_val_form['bairro'] = $this->bairro;
      $NM_val_form['logradouro'] = $this->logradouro;
      $NM_val_form['numero'] = $this->numero;
      $NM_val_form['complemento'] = $this->complemento;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['telefax'] = $this->telefax;
      $NM_val_form['tel'] = $this->tel;
      $NM_val_form['obs'] = $this->obs;
      $NM_val_form['id_participe'] = $this->id_participe;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->nome = substr($this->Db->qstr($this->nome), 1, -1); 
          if ($this->nome == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nome = "null"; 
              $NM_val_null[] = "nome";
          } 
          $this->sobrenome = substr($this->Db->qstr($this->sobrenome), 1, -1); 
          if ($this->sobrenome == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sobrenome = "null"; 
              $NM_val_null[] = "sobrenome";
          } 
          $this->estado = substr($this->Db->qstr($this->estado), 1, -1); 
          if ($this->estado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->estado = "null"; 
              $NM_val_null[] = "estado";
          } 
          $this->cidade = substr($this->Db->qstr($this->cidade), 1, -1); 
          if ($this->cidade == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cidade = "null"; 
              $NM_val_null[] = "cidade";
          } 
          $this->bairro = substr($this->Db->qstr($this->bairro), 1, -1); 
          if ($this->bairro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bairro = "null"; 
              $NM_val_null[] = "bairro";
          } 
          $this->logradouro = substr($this->Db->qstr($this->logradouro), 1, -1); 
          if ($this->logradouro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->logradouro = "null"; 
              $NM_val_null[] = "logradouro";
          } 
          $this->numero = substr($this->Db->qstr($this->numero), 1, -1); 
          if ($this->numero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numero = "null"; 
              $NM_val_null[] = "numero";
          } 
          $this->complemento = substr($this->Db->qstr($this->complemento), 1, -1); 
          if ($this->complemento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->complemento = "null"; 
              $NM_val_null[] = "complemento";
          } 
          $this->cep = substr($this->Db->qstr($this->cep), 1, -1); 
          if ($this->cep == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cep = "null"; 
              $NM_val_null[] = "cep";
          } 
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          if ($this->email == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email = "null"; 
              $NM_val_null[] = "email";
          } 
          $this->telefax = substr($this->Db->qstr($this->telefax), 1, -1); 
          if ($this->telefax == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telefax = "null"; 
              $NM_val_null[] = "telefax";
          } 
          $this->tel = substr($this->Db->qstr($this->tel), 1, -1); 
          if ($this->tel == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tel = "null"; 
              $NM_val_null[] = "tel";
          } 
          $this->obs = substr($this->Db->qstr($this->obs), 1, -1); 
          if ($this->obs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obs = "null"; 
              $NM_val_null[] = "obs";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['foreign_key'] as $sFKName => $sFKValue)
              {
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe ";
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe ";
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_GRUPO = $this->id_grupo, NOME = '$this->nome', SOBRENOME = '$this->sobrenome', ESTADO = '$this->estado', CIDADE = '$this->cidade', BAIRRO = '$this->bairro', LOGRADOURO = '$this->logradouro', NUMERO = '$this->numero', COMPLEMENTO = '$this->complemento', CEP = '$this->cep', EMAIL = '$this->email', TELEFAX = '$this->telefax', TEL = '$this->tel', OBS = '$this->obs'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_GRUPO = $this->id_grupo, NOME = '$this->nome', SOBRENOME = '$this->sobrenome', ESTADO = '$this->estado', CIDADE = '$this->cidade', BAIRRO = '$this->bairro', LOGRADOURO = '$this->logradouro', NUMERO = '$this->numero', COMPLEMENTO = '$this->complemento', CEP = '$this->cep', EMAIL = '$this->email', TELEFAX = '$this->telefax', TEL = '$this->tel', OBS = '$this->obs'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_GRUPO = $this->id_grupo, NOME = '$this->nome', SOBRENOME = '$this->sobrenome', ESTADO = '$this->estado', CIDADE = '$this->cidade', BAIRRO = '$this->bairro', LOGRADOURO = '$this->logradouro', NUMERO = '$this->numero', COMPLEMENTO = '$this->complemento', CEP = '$this->cep', EMAIL = '$this->email', TELEFAX = '$this->telefax', TEL = '$this->tel', OBS = '$this->obs'";  
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID_PARTICIPE = $this->id_participe ";  
              }  
              else  
              {
                  $comando .= " WHERE ID_PARTICIPE = $this->id_participe ";  
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
          if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['foreign_key'] as $sFKName => $sFKValue)
              {
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_GRUPO, ID_PARTICIPE, NOME, SOBRENOME, ESTADO, CIDADE, BAIRRO, LOGRADOURO, NUMERO, COMPLEMENTO, CEP, EMAIL, TELEFAX, TEL, OBS) VALUES ($this->id_grupo, $this->id_participe, '$this->nome', '$this->sobrenome', '$this->estado', '$this->cidade', '$this->bairro', '$this->logradouro', '$this->numero', '$this->complemento', '$this->cep', '$this->email', '$this->telefax', '$this->tel', '$this->obs')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_GRUPO, ID_PARTICIPE, NOME, SOBRENOME, ESTADO, CIDADE, BAIRRO, LOGRADOURO, NUMERO, COMPLEMENTO, CEP, EMAIL, TELEFAX, TEL, OBS) VALUES (" . $NM_seq_auto . "$this->id_grupo, $this->id_participe, '$this->nome', '$this->sobrenome', '$this->estado', '$this->cidade', '$this->bairro', '$this->logradouro', '$this->numero', '$this->complemento', '$this->cep', '$this->email', '$this->telefax', '$this->tel', '$this->obs')"; 
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total']);
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_participe = substr($this->Db->qstr($this->id_participe), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe"; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe"; 
              $rs1 = &$this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "; 
                  $rs = &$this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "; 
                  $rs = &$this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_PARTICIPE = $this->id_participe "); 
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
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['parms'] = "id_participe?#?$this->id_participe?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_participe = substr($this->Db->qstr($this->id_participe), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['where_filter'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['where_filter'];
      }
//------------ Navegação dentro da base de dados
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_participe)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id_participe) === "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = ('' != $sc_where_filter) ? $sc_where_filter : '';
      if ($this->nmgp_opcao == "retorna") 
      { 
          $this->nm_db_retorna($sc_where) ; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $this->nm_db_avanca($sc_where) ; 
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $this->nm_db_inicio($sc_where) ; 
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $this->nm_db_final($sc_where) ; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['reg_start'] = 0;
      }
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- Acesso a base de dados
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID_GRUPO, ID_PARTICIPE, NOME, SOBRENOME, ESTADO, CIDADE, BAIRRO, LOGRADOURO, NUMERO, COMPLEMENTO, CEP, EMAIL, TELEFAX, TEL, OBS from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID_GRUPO, ID_PARTICIPE, NOME, SOBRENOME, ESTADO, CIDADE, BAIRRO, LOGRADOURO, NUMERO, COMPLEMENTO, CEP, EMAIL, TELEFAX, TEL, OBS from " . $this->Ini->nm_tabela ; 
          } 
          $sc_where = ('' != $sc_where_filter) ? ' AND ' . $sc_where_filter : '';
          if ($this->nmgp_opcao == "igual") 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $nmgp_select .= " WHERE  ID_PARTICIPE = $this->id_participe " . $sc_where . ' '; 
              }  
              else  
              {
                  $nmgp_select .= " WHERE  ID_PARTICIPE = $this->id_participe " . $sc_where . ' '; 
              }  
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = &$this->Db->Execute($nmgp_select) ; 
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
              $this->id_grupo = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_grupo'] = $this->id_grupo;
              $this->id_participe = $rs->fields[1] ; 
              $this->nmgp_dados_select['id_participe'] = $this->id_participe;
              $this->nome = $rs->fields[2] ; 
              $this->nmgp_dados_select['nome'] = $this->nome;
              $this->sobrenome = $rs->fields[3] ; 
              $this->nmgp_dados_select['sobrenome'] = $this->sobrenome;
              $this->estado = $rs->fields[4] ; 
              $this->nmgp_dados_select['estado'] = $this->estado;
              $this->cidade = $rs->fields[5] ; 
              $this->nmgp_dados_select['cidade'] = $this->cidade;
              $this->bairro = $rs->fields[6] ; 
              $this->nmgp_dados_select['bairro'] = $this->bairro;
              $this->logradouro = $rs->fields[7] ; 
              $this->nmgp_dados_select['logradouro'] = $this->logradouro;
              $this->numero = $rs->fields[8] ; 
              $this->nmgp_dados_select['numero'] = $this->numero;
              $this->complemento = $rs->fields[9] ; 
              $this->nmgp_dados_select['complemento'] = $this->complemento;
              $this->cep = $rs->fields[10] ; 
              $this->nmgp_dados_select['cep'] = $this->cep;
              $this->email = $rs->fields[11] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->telefax = $rs->fields[12] ; 
              $this->nmgp_dados_select['telefax'] = $this->telefax;
              $this->tel = $rs->fields[13] ; 
              $this->nmgp_dados_select['tel'] = $this->tel;
              $this->obs = $rs->fields[14] ; 
              $this->nmgp_dados_select['obs'] = $this->obs;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_grupo = (string)$this->id_grupo; 
              $this->id_participe = (string)$this->id_participe; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['parms'] = "id_participe?#?$this->id_participe?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['dados_select'] = $this->nmgp_dados_select;
          $this->controle_navegacao();
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $this->nm_formatar_campos();
          $this->id_grupo = "" ;  
          $this->id_participe = "" ;  
          $this->nome = "" ;  
          $this->sobrenome = "" ;  
          $this->estado = "" ;  
          $this->cidade = "" ;  
          $this->bairro = "" ;  
          $this->logradouro = "" ;  
          $this->numero = "" ;  
          $this->complemento = "" ;  
          $this->cep = "" ;  
          $this->email = "" ;  
          $this->telefax = "" ;  
          $this->tel = "" ;  
          $this->obs = "" ;  
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE < $this->id_participe" . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE < $this->id_participe" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE < $this->id_participe" . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE < $this->id_participe" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_participe = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE > $this->id_participe" . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE > $this->id_participe" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE > $this->id_participe" . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " where ID_PARTICIPE > $this->id_participe" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_participe = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select min(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->id_participe = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = &$this->Db->Execute("select max(ID_PARTICIPE) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->id_participe = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['run_iframe'] == "F")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['retorno_edit'] .= "&nmgp_opcao=edit&rec=fim";
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              $sJsParent .= 'parent';
              $this->NM_ajax_info['redir']['metodo'] = 'location';
              $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['retorno_edit'];
              $this->NM_ajax_info['redir']['target'] = $sJsParent;
             app_Participantes_pack_ajax_response();
              exit;
          }
?>
         <html><body>
         <script language=javascript>
            <?php echo $sJsParent; ?>parent.location = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_Participantes']['retorno_edit'] ?>";
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("app_Participantes_form0.php");
 }
}
?>
