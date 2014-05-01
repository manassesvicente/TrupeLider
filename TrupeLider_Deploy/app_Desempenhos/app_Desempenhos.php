<?php
//
   include_once('app_Desempenhos_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil']          = "TRUPE";
   $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_prod']       = "/trupe/prod";
   $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_imagens']    = "/trupe/file/img";
   $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_imag_temp']  = "/trupe/tmp";
   $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_doc']        = "/home/manassesvicente/www/trupe/file/doc";
//
class app_Desempenhos_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $path_magick;
   var $exec_magick;
   var $exec_linux;
   var $sc_site_ssl;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_falta_var;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_not_suport;
   var $nm_bases_access;
   var $nm_bases_mysql;
   var $nm_bases_ibase;
   var $nm_bases_sybase;
   var $nm_bases_sqlite;
   var $nm_bases_postgres;
   var $sc_page;
//
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      set_magic_quotes_runtime(0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['app_Desempenhos']['decimal_db'] = "."; 

      $this->nm_cod_apl    = "app_Desempenhos"; 
      $this->nm_nome_apl   = "Cadastro das notas para mensurar o desempenho dos Líderes"; 
      $this->nm_seguranca  = ""; 
      $this->nm_grupo      = "SISTEMA"; 
      $this->nm_autor      = "admin"; 
      $this->nm_versao_sc  = "4.00.0008"; 
      $this->nm_tp_lic_sc  = "pr_bronze"; 
      $this->nm_dt_criacao = "20121208"; 
      $this->nm_hr_criacao = "013759"; 
      $this->nm_autor_alt  = "admin"; 
      $this->nm_dt_ult_alt = "20121208"; 
      $this->nm_hr_ult_alt = "023542"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp  = (float) $NM_sec; 
// 
      $this->border_grid           = "0"; 
      $this->cor_bg_grid           = "#FFFFFF"; 
      $this->cor_bg_table          = "#990000"; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = "#189300"; 
      $this->cor_txt_pag           = "#000000"; 
      $this->cor_link_pag          = "#215800"; 
      $this->pag_fonte_tipo        = "Tahoma, Arial, sans-serif"; 
      $this->pag_fonte_tamanho     = "2"; 
      $this->cor_txt_cab_grid      = "#FFFFFF"; 
      $this->cab_fonte_tipo        = "Verdana, Arial, sans-serif"; 
      $this->cab_fonte_tamanho     = "2"; 
      $this->rod_fonte_tipo        = "Verdana, Arial, sans-serif"; 
      $this->rod_fonte_tamanho     = "2"; 
      $this->cor_rod_grid          = "#189300"; 
      $this->cor_txt_rod_grid      = "#FFFFFF"; 
      $this->cor_barra_nav         = "#eaF8E7"; 
      $this->cor_titulo            = "#45C42D"; 
      $this->cor_txt_titulo        = "#FFFFFF"; 
      $this->titulo_fonte_tipo     = "Arial, sans-serif"; 
      $this->titulo_fonte_tamanho  = "2"; 
      $this->cor_grid_impar        = "#FFFFFF"; 
      $this->cor_grid_par          = "#E2FFDC"; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = "#E2FFDC"; 
      $this->cor_txt_grupo         = "#45C42D"; 
      $this->grupo_fonte_tipo      = "Tahoma, Arial, sans-serif"; 
      $this->grupo_fonte_tamanho   = "4"; 
      $this->cor_lin_sub_tot       = "#FFFFFF"; 
      $this->cor_txt_sub_tot       = "#333333"; 
      $this->sub_tot_fonte_tipo    = "Verdana, Arial, sans-serif"; 
      $this->sub_tot_fonte_tamanho = "2"; 
      $this->cor_lin_tot           = "#45C42D"; 
      $this->cor_txt_tot           = "#FFFFFF"; 
      $this->tot_fonte_tipo        = "Tahoma, Arial, sans-serif"; 
      $this->tot_fonte_tamanho     = "3"; 
      $this->cor_link_cab          = "#FFFFFF"; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = "scriptcase/bgmiolo.gif"; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_path_doc'];
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server          = "";
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
          $str_path_sys          = str_replace('//', '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/app_Desempenhos';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['app_Desempenhos']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"#FFFFFF\">";
          echo "       <b><font size=\"4\">Diret&oacute;rio de produ&ccedil;&atilde;o n&atilde;o encontrado:</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] != 'app_Desempenhos')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase3_green_bvoltar.gif' alt='Voltar para o ScriptCase' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase3_green_bsair.gif' alt='Sair da aplica&ccedil;&atilde;o' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $this->path_magick = $this->path_third . "/imagemagick";
      $opsys = strtolower(php_uname());
      $this->exec_linux = (FALSE !== strpos($opsys, 'windows')) ? '' : './';
      if (!file_exists($this->path_magick . "/convert"))
      {
          $this->exec_linux = "";
      }

      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      include_once($this->path_libs . "/nm_sec_prod.php");
      include_once($this->path_libs . "/nm_ini_perfil.php");
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['app_Desempenhos']['glo_nm_conexao']) && $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil']) && $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['app_Desempenhos']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['app_Desempenhos']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      perfil_lib($this->path_libs);
      $con_devel          =  $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_conexao']; 
      $perfil_trab        = ""; 
      $this->nm_falta_var = ""; 
      $nm_crit_perfil     = false;
      if (isset($_SESSION['scriptcase']['app_Desempenhos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_Desempenhos']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'SISTEMA', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['app_Desempenhos']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['app_Desempenhos']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "DESEMPENHO"; 
      }
// 
      if (!empty($this->nm_falta_var) || $nm_crit_perfil)
      {
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (!empty($this->nm_falta_var))
          {
              echo "<tr>";
              echo "   <td bgcolor=\"#FFFFFF\">";
              echo "       <b><font size=\"4\">Falta defini&ccedil;&atilde;o das seguintes vari&aacute;veis de ambiente:</font>";
              echo "  " . $this->nm_falta_var;
              echo "   </b></td>";
              echo " </tr>";
          }
          if ($nm_crit_perfil)
          {
              echo "<tr>";
              echo "   <td bgcolor=\"#FFFFFF\">";
              echo "       <b><font size=\"4\">Conex&atilde;o com o banco de dados n&atilde;o localizada, contate o administrador do sistema. Conex&atilde;o:</font>";
              echo "  " . $perfil_trab;
              echo "   </b></td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] != 'app_Desempenhos')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase3_green_bvoltar.gif' alt='Voltar para o ScriptCase' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase3_green_bsair.gif' alt='Sair da aplica&ccedil;&atilde;o' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
      $_SESSION['scriptcase']['charset'] = "ISO-8859-1";
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_not_suport = array("mssql", "ado_mssql", "odbc_mssql", "oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "db2", "db2_odbc", "odbc_db2");
      $this->nm_bases_access     = array("access", "ado_access");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql");
      $this->nm_bases_ibase      = array("ibase", "firebird", "borland_ibase");
      $this->nm_bases_sybase     = array("sybase");
      $this->nm_bases_sqlite     = array("sqlite");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7");
      $_SESSION['scriptcase']['nm_bases_security']  = "D9BiH9NUD1zGHuJwHgvsV9JGDuB3HINUVQNmZ1BqDSrwVWBOHuveHEJ3V5X/HIFaHkXOVIFGDSBOHuJsHgveZSrCV5B3HIF7VQNGVIJwHIrwD5BiHuveZSBsHEFGHMJsDcBiDuBODSzGHuJsDErYVkFCHEB7HMNUHkJUZSJeD1N7D5JsHuBOVkBsHEFYDoXGD9FYDQBiDSBeZMXGDEvOVcBsDEJeVoBiHkJUZSJsD1N7HQX7DENOVkFKDuFGVoBOHkBwZ9FaDSBeV5FUDEvsVIFiDErmDoFGD9JKZSJsHAvOV5BODuNKVkXeDWB7DoFUDcJUH9FaHIBYV5XGHuN7DkB/DWX7VEF7HkBiH9JsDSBOD5BiDMvsHEJ3HEFYVEBqHkBiDQBiD1BOVWNUDuvODkFCDWB7VEFUHQFYZ9rqHAvmHQFGDMvmHAFKDWFaVEraDcBqDQF7D1N7HQJwDuvsVkrsH5FYVEX7DcBiH9JwD1NaVWBOHuvCDkFeDuXKVEBqDcJmZSFaHAvsHQJwDuvmDkFCH5F/ZuB/DcJmZkB/Z1vsZMJwHgBOVIBUDWFGZuJsVQJeDuFaHABOZMFUDMrKDkJqDWX7HIXGDcJmZ9FaDSrYD5F7DErKVIJGDWrGZuBiVQXODuBOD1BeHQJwDMvmVkrsDWFGHIrqDcJUH9XGHABeVWNUDMrwHABOV5XCHMBOVQXOVIJwD1BYHQB/DMBYVcXKH5FGHMNUHkNwZ9FaDSNaHQB/VgveZSJ3V5FqZuBOVQXGZSX7Z1zGVWrqHgNaVIFCDEFqDorqDcNGVIFUHIBeD5X7HuzGHEBUDWX7HIB/D9BqDuFaHANaHQXGDuNaZSBUDWX/DoF7DkNwZSB/HAvOHuBqDMBeHAJGDWBmHMX7HQNwHWBqD1NaZMJsHgrwVcrCDWFGHMJsHQNwZkBiHAzGHQB/HuNKVIJGHEX/HIFaVQJeVIJeZ1zG";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_not_suport))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"#FFFFFF\">";
          echo "       <b><font size=\"4\">Conex&atilde;o para banco de dados n&atilde;o suportado por esta aplica&ccedil;&atilde;o, contate o administrador do sistema. Conex&atilde;o:</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] != 'app_Desempenhos')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase3_green_bvoltar.gif' alt='Voltar para o ScriptCase' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase3_green_bsair.gif' alt='Sair da aplica&ccedil;&atilde;o' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
   }
// 
}
//===============================================================================
class app_Desempenhos_edit
{
    var $contr_app_Desempenhos;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("app_Desempenhos_apl.php");
        require_once("app_Desempenhos_form0.php");
        $this->contr_app_Desempenhos = new app_Desempenhos_form();
    }
}
//
//----------------  Controle da Aplicação
//
    $_SESSION['scriptcase']['app_Desempenhos']['contr_erro'] = 'off';
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             $tmp_name     = $nmgp_campo . "_name";
             $tmp_type     = $nmgp_campo . "_type";
             $$nmgp_campo = $nmgp_valores['tmp_name'];
             $$tmp_type   = $nmgp_valores['type'];
             $$tmp_name   = $nmgp_valores['name'];
        }
    }
    if (!empty($_POST))
    {
        foreach ($_POST as $nmgp_var => $nmgp_val)
        {
             $$nmgp_var = $nmgp_val;
        }
    }
    if (!empty($_GET))
    {
        foreach ($_GET as $nmgp_var => $nmgp_val)
        {
             $$nmgp_var = $nmgp_val;
        }
    }

    if (isset($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('ajax_app_Desempenhos_validate_cod_desemp' == $_POST['rs'])
        {
            $cod_desemp = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_turma' == $_POST['rs'])
        {
            $id_turma = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_grupo' == $_POST['rs'])
        {
            $id_grupo = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_etapa' == $_POST['rs'])
        {
            $id_etapa = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_votante' == $_POST['rs'])
        {
            $id_votante = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_votado' == $_POST['rs'])
        {
            $id_votado = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_competencia' == $_POST['rs'])
        {
            $id_competencia = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_peso' == $_POST['rs'])
        {
            $peso = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_id_habilidade' == $_POST['rs'])
        {
            $id_habilidade = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_resultado' == $_POST['rs'])
        {
            $resultado = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        if ('ajax_app_Desempenhos_validate_nota' == $_POST['rs'])
        {
            $nota = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
        }
        for ($iSeq = 1; $iSeq <= 30; $iSeq++)
        {
            if ('ajax_app_Desempenhos_autocomp_id_grupo' . $iSeq == $_POST['rs'])
            {
                $id_grupo = $_POST['rsargs'][0];
                $script_case_init = $_POST['rsargs'][1];
            }
        }
        for ($iSeq = 1; $iSeq <= 30; $iSeq++)
        {
            if ('ajax_app_Desempenhos_autocomp_id_votante' . $iSeq == $_POST['rs'])
            {
                $id_votante = $_POST['rsargs'][0];
                $script_case_init = $_POST['rsargs'][1];
            }
        }
        for ($iSeq = 1; $iSeq <= 30; $iSeq++)
        {
            if ('ajax_app_Desempenhos_autocomp_id_votado' . $iSeq == $_POST['rs'])
            {
                $id_votado = $_POST['rsargs'][0];
                $script_case_init = $_POST['rsargs'][1];
            }
        }
        for ($iSeq = 1; $iSeq <= 30; $iSeq++)
        {
            if ('ajax_app_Desempenhos_autocomp_id_etapa' . $iSeq == $_POST['rs'])
            {
                $id_etapa = $_POST['rsargs'][0];
                $script_case_init = $_POST['rsargs'][1];
            }
        }
        for ($iSeq = 1; $iSeq <= 30; $iSeq++)
        {
            if ('ajax_app_Desempenhos_autocomp_id_competencia' . $iSeq == $_POST['rs'])
            {
                $id_competencia = $_POST['rsargs'][0];
                $script_case_init = $_POST['rsargs'][1];
            }
        }
        for ($iSeq = 1; $iSeq <= 30; $iSeq++)
        {
            if ('ajax_app_Desempenhos_autocomp_id_habilidade' . $iSeq == $_POST['rs'])
            {
                $id_habilidade = $_POST['rsargs'][0];
                $script_case_init = $_POST['rsargs'][1];
            }
        }
        if ('ajax_app_Desempenhos_submit_form' == $_POST['rs'])
        {
            $cod_desemp = $_POST['rsargs'][0];
            $id_turma = $_POST['rsargs'][1];
            $id_grupo = $_POST['rsargs'][2];
            $id_etapa = $_POST['rsargs'][3];
            $id_votante = $_POST['rsargs'][4];
            $id_votado = $_POST['rsargs'][5];
            $id_competencia = $_POST['rsargs'][6];
            $peso = $_POST['rsargs'][7];
            $id_habilidade = $_POST['rsargs'][8];
            $resultado = $_POST['rsargs'][9];
            $nota = $_POST['rsargs'][10];
            $id_desemp = $_POST['rsargs'][11];
            $nmgp_refresh_row = $_POST['rsargs'][12];
            $nm_form_submit = $_POST['rsargs'][13];
            $nmgp_url_saida = $_POST['rsargs'][14];
            $nmgp_opcao = $_POST['rsargs'][15];
            $nmgp_ancora = $_POST['rsargs'][16];
            $nmgp_num_form = $_POST['rsargs'][17];
            $nmgp_parms = $_POST['rsargs'][18];
            $script_case_init = $_POST['rsargs'][19];
        }
        if ('ajax_app_Desempenhos_navigate_form' == $_POST['rs'])
        {
            $id_desemp = $_POST['rsargs'][0];
            $nm_form_submit = $_POST['rsargs'][1];
            $nmgp_opcao = $_POST['rsargs'][2];
            $script_case_init = $_POST['rsargs'][3];
        }
        if ('ajax_app_Desempenhos_add_new_line' == $_POST['rs'])
        {
            $sc_seq_vert = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
        }
        if ('ajax_app_Desempenhos_backup_line' == $_POST['rs'])
        {
            $id_desemp = $_POST['rsargs'][0];
            $nmgp_refresh_row = $_POST['rsargs'][1];
            $nm_form_submit = $_POST['rsargs'][2];
            $script_case_init = $_POST['rsargs'][3];
        }
        if ('ajax_app_Desempenhos_table_refresh' == $_POST['rs'])
        {
            $id_desemp = $_POST['rsargs'][0];
            $nm_form_submit = $_POST['rsargs'][1];
            $nmgp_opcao = $_POST['rsargs'][2];
            $script_case_init = $_POST['rsargs'][3];
        }
    }

    if (!empty($glo_perfil))  
    { 
        $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
    }   
    if (isset($glo_servidor)) 
    {
        $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
    }
    if (isset($glo_banco)) 
    {
        $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
    }
    if (isset($glo_tpbanco)) 
    {
        $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
    }
    if (isset($glo_usuario)) 
    {
        $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
    }
    if (isset($glo_senha)) 
    {
        $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
    }
    if (isset($glo_senha_protect)) 
    {
        $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
    }
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_parms']))
    { 
        $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_parms']);
    } 
    if (isset($nmgp_parms) && !empty($nmgp_parms)) 
    { 
        if (isset($_SESSION['nm_aba_bg_color'])) 
        { 
            unset($_SESSION['nm_aba_bg_color']);
        }   
        $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
        $nmgp_parms = str_replace("scriptcaseout", "?@?", $nmgp_parms);
        $nmgp_parms = str_replace("scriptcasein", "?#?", $nmgp_parms);
        $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
        $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
        $todo = explode("?@?", $nmgp_parms);
        $ix = 0;
        while (!empty($todo[$ix]))
        {
           $cadapar = explode("?#?", $todo[$ix]);
           nm_limpa_str_app_Desempenhos($cadapar[1]);
           $$cadapar[0] = $cadapar[1];
           $ix++;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['parms']);
            $ix = 0;
            while (!empty($todo[$ix]))
            {
               $cadapar = explode("?#?", $todo[$ix]);
               $$cadapar[0] = $cadapar[1];
               $ix++;
            }
        }
    } 
    if (!isset($script_case_init) || empty($script_case_init))
    {
        $script_case_init = rand(2, 1000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe']);
    }
    if (isset($nm_run_menu) && $nm_run_menu == 1)
    {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']) && $script_case_init == 1)
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        if ($script_case_init == 1)
        {
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "app_Desempenhos";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'app_Desempenhos' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['iframe_menu'] = $salva_iframe;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['first_time'] = true;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'app_Desempenhos')
    {
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] = true;
    }
    $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/app_Desempenhos_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_redirect_tp'] = "";
            $nm_url_saida = "app_Desempenhos_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "app_Desempenhos_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'] . "?script_case_init=" .$script_case_init ;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'] = $nm_url_saida; 
                $nm_url_saida = "app_Desempenhos_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'])) ? $_SESSION['scriptcase']['sc_url_saida'] : "";
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'] = true;
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_Desempenhos']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_app_Desempenhos = new app_Desempenhos_edit();
    $inicial_app_Desempenhos->inicializa();

    $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['select_html'] = array();
    $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['select_html']['id_turma'] = "class=\\\"scFormObjectOdd\\\" name=\\\"id_turma\" . \$sc_seq_vert . \"\\\"  onBlur=\\\"scCssBlur(this, \" . \$sc_seq_vert . \");\\\"  onFocus=\\\"scCssFocus(this, \" . \$sc_seq_vert . \");\\\"  onChange=\\\"nm_check_insert(\" . \$sc_seq_vert . \");\\\"  size=1";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/app_Desempenhos_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/app_Desempenhos_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_app_Desempenhos_validate_cod_desemp");
    sajax_export("ajax_app_Desempenhos_validate_id_turma");
    sajax_export("ajax_app_Desempenhos_validate_id_grupo");
    sajax_export("ajax_app_Desempenhos_validate_id_etapa");
    sajax_export("ajax_app_Desempenhos_validate_id_votante");
    sajax_export("ajax_app_Desempenhos_validate_id_votado");
    sajax_export("ajax_app_Desempenhos_validate_id_competencia");
    sajax_export("ajax_app_Desempenhos_validate_peso");
    sajax_export("ajax_app_Desempenhos_validate_id_habilidade");
    sajax_export("ajax_app_Desempenhos_validate_resultado");
    sajax_export("ajax_app_Desempenhos_validate_nota");
    for ($iSeq = 1; $iSeq <= 80; $iSeq++)
    {
        sajax_export("ajax_app_Desempenhos_autocomp_id_grupo" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 80; $iSeq++)
    {
        sajax_export("ajax_app_Desempenhos_autocomp_id_votante" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 80; $iSeq++)
    {
        sajax_export("ajax_app_Desempenhos_autocomp_id_votado" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 80; $iSeq++)
    {
        sajax_export("ajax_app_Desempenhos_autocomp_id_etapa" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 80; $iSeq++)
    {
        sajax_export("ajax_app_Desempenhos_autocomp_id_competencia" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 80; $iSeq++)
    {
        sajax_export("ajax_app_Desempenhos_autocomp_id_habilidade" . $iSeq);
    }
    sajax_export("ajax_app_Desempenhos_submit_form");
    sajax_export("ajax_app_Desempenhos_navigate_form");
    sajax_export("ajax_app_Desempenhos_add_new_line");
    sajax_export("ajax_app_Desempenhos_backup_line");
    sajax_export("ajax_app_Desempenhos_table_refresh");
    sajax_handle_client_request();

    $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
//
    function nm_limpa_str_app_Desempenhos(&$str)
    {
        if (get_magic_quotes_gpc())
        {
            if (is_array($str))
            {
                foreach ($str as $x => $cada_str)
                {
                    $str[$x] = stripslashes($str[$x]);
                }
            }
            else
            {
                $str = stripslashes($str);
            }
        }
    }

    function ajax_app_Desempenhos_validate_cod_desemp($cod_desemp, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_cod_desemp';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'cod_desemp' => $cod_desemp,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_cod_desemp

    function ajax_app_Desempenhos_validate_id_turma($id_turma, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_turma';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_turma' => $id_turma,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_turma

    function ajax_app_Desempenhos_validate_id_grupo($id_grupo, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_grupo';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_grupo

    function ajax_app_Desempenhos_validate_id_etapa($id_etapa, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_etapa';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_etapa

    function ajax_app_Desempenhos_validate_id_votante($id_votante, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_votante';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_votante

    function ajax_app_Desempenhos_validate_id_votado($id_votado, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_votado';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_votado

    function ajax_app_Desempenhos_validate_id_competencia($id_competencia, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_competencia';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_competencia

    function ajax_app_Desempenhos_validate_peso($peso, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_peso';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'peso' => $peso,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_peso

    function ajax_app_Desempenhos_validate_id_habilidade($id_habilidade, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_id_habilidade';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_id_habilidade

    function ajax_app_Desempenhos_validate_resultado($resultado, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_resultado';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'resultado' => $resultado,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_resultado

    function ajax_app_Desempenhos_validate_nota($nota, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'validate_nota';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'nota' => $nota,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_validate_nota

    function ajax_app_Desempenhos_autocomp_id_grupo1($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo1';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo1
    function ajax_app_Desempenhos_autocomp_id_grupo2($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo2';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo2
    function ajax_app_Desempenhos_autocomp_id_grupo3($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo3';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo3
    function ajax_app_Desempenhos_autocomp_id_grupo4($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo4';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo4
    function ajax_app_Desempenhos_autocomp_id_grupo5($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo5';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo5
    function ajax_app_Desempenhos_autocomp_id_grupo6($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo6';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo6
    function ajax_app_Desempenhos_autocomp_id_grupo7($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo7';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo7
    function ajax_app_Desempenhos_autocomp_id_grupo8($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo8';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo8
    function ajax_app_Desempenhos_autocomp_id_grupo9($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo9';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo9
    function ajax_app_Desempenhos_autocomp_id_grupo10($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo10';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo10
    function ajax_app_Desempenhos_autocomp_id_grupo11($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo11';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo11
    function ajax_app_Desempenhos_autocomp_id_grupo12($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo12';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo12
    function ajax_app_Desempenhos_autocomp_id_grupo13($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo13';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo13
    function ajax_app_Desempenhos_autocomp_id_grupo14($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo14';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo14
    function ajax_app_Desempenhos_autocomp_id_grupo15($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo15';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo15
    function ajax_app_Desempenhos_autocomp_id_grupo16($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo16';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo16
    function ajax_app_Desempenhos_autocomp_id_grupo17($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo17';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo17
    function ajax_app_Desempenhos_autocomp_id_grupo18($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo18';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo18
    function ajax_app_Desempenhos_autocomp_id_grupo19($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo19';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo19
    function ajax_app_Desempenhos_autocomp_id_grupo20($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo20';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo20
    function ajax_app_Desempenhos_autocomp_id_grupo21($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo21';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo21
    function ajax_app_Desempenhos_autocomp_id_grupo22($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo22';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo22
    function ajax_app_Desempenhos_autocomp_id_grupo23($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo23';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo23
    function ajax_app_Desempenhos_autocomp_id_grupo24($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo24';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo24
    function ajax_app_Desempenhos_autocomp_id_grupo25($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo25';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo25
    function ajax_app_Desempenhos_autocomp_id_grupo26($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo26';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo26
    function ajax_app_Desempenhos_autocomp_id_grupo27($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo27';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo27
    function ajax_app_Desempenhos_autocomp_id_grupo28($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo28';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo28
    function ajax_app_Desempenhos_autocomp_id_grupo29($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo29';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo29
    function ajax_app_Desempenhos_autocomp_id_grupo30($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo30';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo30
    function ajax_app_Desempenhos_autocomp_id_grupo31($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo31';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo31
    function ajax_app_Desempenhos_autocomp_id_grupo32($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo32';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo32
    function ajax_app_Desempenhos_autocomp_id_grupo33($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo33';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo33
    function ajax_app_Desempenhos_autocomp_id_grupo34($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo34';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo34
    function ajax_app_Desempenhos_autocomp_id_grupo35($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo35';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo35
    function ajax_app_Desempenhos_autocomp_id_grupo36($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo36';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo36
    function ajax_app_Desempenhos_autocomp_id_grupo37($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo37';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo37
    function ajax_app_Desempenhos_autocomp_id_grupo38($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo38';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo38
    function ajax_app_Desempenhos_autocomp_id_grupo39($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo39';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo39
    function ajax_app_Desempenhos_autocomp_id_grupo40($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo40';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo40
    function ajax_app_Desempenhos_autocomp_id_grupo41($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo41';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo41
    function ajax_app_Desempenhos_autocomp_id_grupo42($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo42';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo42
    function ajax_app_Desempenhos_autocomp_id_grupo43($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo43';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo43
    function ajax_app_Desempenhos_autocomp_id_grupo44($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo44';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo44
    function ajax_app_Desempenhos_autocomp_id_grupo45($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo45';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo45
    function ajax_app_Desempenhos_autocomp_id_grupo46($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo46';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo46
    function ajax_app_Desempenhos_autocomp_id_grupo47($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo47';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo47
    function ajax_app_Desempenhos_autocomp_id_grupo48($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo48';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo48
    function ajax_app_Desempenhos_autocomp_id_grupo49($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo49';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo49
    function ajax_app_Desempenhos_autocomp_id_grupo50($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo50';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo50
    function ajax_app_Desempenhos_autocomp_id_grupo51($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo51';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo51
    function ajax_app_Desempenhos_autocomp_id_grupo52($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo52';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo52
    function ajax_app_Desempenhos_autocomp_id_grupo53($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo53';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo53
    function ajax_app_Desempenhos_autocomp_id_grupo54($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo54';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo54
    function ajax_app_Desempenhos_autocomp_id_grupo55($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo55';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo55
    function ajax_app_Desempenhos_autocomp_id_grupo56($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo56';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo56
    function ajax_app_Desempenhos_autocomp_id_grupo57($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo57';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo57
    function ajax_app_Desempenhos_autocomp_id_grupo58($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo58';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo58
    function ajax_app_Desempenhos_autocomp_id_grupo59($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo59';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo59
    function ajax_app_Desempenhos_autocomp_id_grupo60($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo60';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo60
    function ajax_app_Desempenhos_autocomp_id_grupo61($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo61';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo61
    function ajax_app_Desempenhos_autocomp_id_grupo62($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo62';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo62
    function ajax_app_Desempenhos_autocomp_id_grupo63($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo63';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo63
    function ajax_app_Desempenhos_autocomp_id_grupo64($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo64';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo64
    function ajax_app_Desempenhos_autocomp_id_grupo65($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo65';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo65
    function ajax_app_Desempenhos_autocomp_id_grupo66($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo66';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo66
    function ajax_app_Desempenhos_autocomp_id_grupo67($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo67';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo67
    function ajax_app_Desempenhos_autocomp_id_grupo68($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo68';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo68
    function ajax_app_Desempenhos_autocomp_id_grupo69($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo69';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo69
    function ajax_app_Desempenhos_autocomp_id_grupo70($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo70';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo70
    function ajax_app_Desempenhos_autocomp_id_grupo71($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo71';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo71
    function ajax_app_Desempenhos_autocomp_id_grupo72($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo72';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo72
    function ajax_app_Desempenhos_autocomp_id_grupo73($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo73';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo73
    function ajax_app_Desempenhos_autocomp_id_grupo74($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo74';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo74
    function ajax_app_Desempenhos_autocomp_id_grupo75($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo75';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo75
    function ajax_app_Desempenhos_autocomp_id_grupo76($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo76';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo76
    function ajax_app_Desempenhos_autocomp_id_grupo77($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo77';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo77
    function ajax_app_Desempenhos_autocomp_id_grupo78($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo78';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo78
    function ajax_app_Desempenhos_autocomp_id_grupo79($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo79';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo79
    function ajax_app_Desempenhos_autocomp_id_grupo80($id_grupo, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_grupo80';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_grupo' => $id_grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_grupo']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_grupo80

    function ajax_app_Desempenhos_autocomp_id_votante1($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante1';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante1
    function ajax_app_Desempenhos_autocomp_id_votante2($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante2';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante2
    function ajax_app_Desempenhos_autocomp_id_votante3($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante3';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante3
    function ajax_app_Desempenhos_autocomp_id_votante4($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante4';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante4
    function ajax_app_Desempenhos_autocomp_id_votante5($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante5';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante5
    function ajax_app_Desempenhos_autocomp_id_votante6($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante6';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante6
    function ajax_app_Desempenhos_autocomp_id_votante7($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante7';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante7
    function ajax_app_Desempenhos_autocomp_id_votante8($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante8';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante8
    function ajax_app_Desempenhos_autocomp_id_votante9($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante9';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante9
    function ajax_app_Desempenhos_autocomp_id_votante10($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante10';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante10
    function ajax_app_Desempenhos_autocomp_id_votante11($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante11';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante11
    function ajax_app_Desempenhos_autocomp_id_votante12($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante12';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante12
    function ajax_app_Desempenhos_autocomp_id_votante13($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante13';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante13
    function ajax_app_Desempenhos_autocomp_id_votante14($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante14';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante14
    function ajax_app_Desempenhos_autocomp_id_votante15($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante15';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante15
    function ajax_app_Desempenhos_autocomp_id_votante16($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante16';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante16
    function ajax_app_Desempenhos_autocomp_id_votante17($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante17';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante17
    function ajax_app_Desempenhos_autocomp_id_votante18($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante18';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante18
    function ajax_app_Desempenhos_autocomp_id_votante19($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante19';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante19
    function ajax_app_Desempenhos_autocomp_id_votante20($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante20';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante20
    function ajax_app_Desempenhos_autocomp_id_votante21($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante21';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante21
    function ajax_app_Desempenhos_autocomp_id_votante22($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante22';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante22
    function ajax_app_Desempenhos_autocomp_id_votante23($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante23';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante23
    function ajax_app_Desempenhos_autocomp_id_votante24($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante24';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante24
    function ajax_app_Desempenhos_autocomp_id_votante25($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante25';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante25
    function ajax_app_Desempenhos_autocomp_id_votante26($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante26';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante26
    function ajax_app_Desempenhos_autocomp_id_votante27($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante27';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante27
    function ajax_app_Desempenhos_autocomp_id_votante28($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante28';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante28
    function ajax_app_Desempenhos_autocomp_id_votante29($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante29';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante29
    function ajax_app_Desempenhos_autocomp_id_votante30($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante30';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante30
    function ajax_app_Desempenhos_autocomp_id_votante31($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante31';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante31
    function ajax_app_Desempenhos_autocomp_id_votante32($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante32';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante32
    function ajax_app_Desempenhos_autocomp_id_votante33($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante33';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante33
    function ajax_app_Desempenhos_autocomp_id_votante34($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante34';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante34
    function ajax_app_Desempenhos_autocomp_id_votante35($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante35';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante35
    function ajax_app_Desempenhos_autocomp_id_votante36($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante36';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante36
    function ajax_app_Desempenhos_autocomp_id_votante37($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante37';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante37
    function ajax_app_Desempenhos_autocomp_id_votante38($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante38';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante38
    function ajax_app_Desempenhos_autocomp_id_votante39($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante39';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante39
    function ajax_app_Desempenhos_autocomp_id_votante40($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante40';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante40
    function ajax_app_Desempenhos_autocomp_id_votante41($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante41';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante41
    function ajax_app_Desempenhos_autocomp_id_votante42($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante42';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante42
    function ajax_app_Desempenhos_autocomp_id_votante43($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante43';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante43
    function ajax_app_Desempenhos_autocomp_id_votante44($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante44';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante44
    function ajax_app_Desempenhos_autocomp_id_votante45($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante45';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante45
    function ajax_app_Desempenhos_autocomp_id_votante46($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante46';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante46
    function ajax_app_Desempenhos_autocomp_id_votante47($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante47';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante47
    function ajax_app_Desempenhos_autocomp_id_votante48($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante48';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante48
    function ajax_app_Desempenhos_autocomp_id_votante49($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante49';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante49
    function ajax_app_Desempenhos_autocomp_id_votante50($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante50';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante50
    function ajax_app_Desempenhos_autocomp_id_votante51($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante51';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante51
    function ajax_app_Desempenhos_autocomp_id_votante52($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante52';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante52
    function ajax_app_Desempenhos_autocomp_id_votante53($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante53';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante53
    function ajax_app_Desempenhos_autocomp_id_votante54($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante54';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante54
    function ajax_app_Desempenhos_autocomp_id_votante55($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante55';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante55
    function ajax_app_Desempenhos_autocomp_id_votante56($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante56';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante56
    function ajax_app_Desempenhos_autocomp_id_votante57($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante57';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante57
    function ajax_app_Desempenhos_autocomp_id_votante58($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante58';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante58
    function ajax_app_Desempenhos_autocomp_id_votante59($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante59';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante59
    function ajax_app_Desempenhos_autocomp_id_votante60($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante60';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante60
    function ajax_app_Desempenhos_autocomp_id_votante61($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante61';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante61
    function ajax_app_Desempenhos_autocomp_id_votante62($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante62';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante62
    function ajax_app_Desempenhos_autocomp_id_votante63($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante63';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante63
    function ajax_app_Desempenhos_autocomp_id_votante64($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante64';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante64
    function ajax_app_Desempenhos_autocomp_id_votante65($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante65';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante65
    function ajax_app_Desempenhos_autocomp_id_votante66($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante66';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante66
    function ajax_app_Desempenhos_autocomp_id_votante67($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante67';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante67
    function ajax_app_Desempenhos_autocomp_id_votante68($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante68';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante68
    function ajax_app_Desempenhos_autocomp_id_votante69($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante69';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante69
    function ajax_app_Desempenhos_autocomp_id_votante70($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante70';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante70
    function ajax_app_Desempenhos_autocomp_id_votante71($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante71';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante71
    function ajax_app_Desempenhos_autocomp_id_votante72($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante72';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante72
    function ajax_app_Desempenhos_autocomp_id_votante73($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante73';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante73
    function ajax_app_Desempenhos_autocomp_id_votante74($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante74';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante74
    function ajax_app_Desempenhos_autocomp_id_votante75($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante75';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante75
    function ajax_app_Desempenhos_autocomp_id_votante76($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante76';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante76
    function ajax_app_Desempenhos_autocomp_id_votante77($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante77';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante77
    function ajax_app_Desempenhos_autocomp_id_votante78($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante78';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante78
    function ajax_app_Desempenhos_autocomp_id_votante79($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante79';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante79
    function ajax_app_Desempenhos_autocomp_id_votante80($id_votante, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votante80';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votante' => $id_votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votante']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votante80

    function ajax_app_Desempenhos_autocomp_id_votado1($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado1';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado1
    function ajax_app_Desempenhos_autocomp_id_votado2($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado2';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado2
    function ajax_app_Desempenhos_autocomp_id_votado3($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado3';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado3
    function ajax_app_Desempenhos_autocomp_id_votado4($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado4';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado4
    function ajax_app_Desempenhos_autocomp_id_votado5($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado5';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado5
    function ajax_app_Desempenhos_autocomp_id_votado6($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado6';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado6
    function ajax_app_Desempenhos_autocomp_id_votado7($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado7';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado7
    function ajax_app_Desempenhos_autocomp_id_votado8($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado8';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado8
    function ajax_app_Desempenhos_autocomp_id_votado9($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado9';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado9
    function ajax_app_Desempenhos_autocomp_id_votado10($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado10';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado10
    function ajax_app_Desempenhos_autocomp_id_votado11($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado11';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado11
    function ajax_app_Desempenhos_autocomp_id_votado12($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado12';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado12
    function ajax_app_Desempenhos_autocomp_id_votado13($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado13';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado13
    function ajax_app_Desempenhos_autocomp_id_votado14($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado14';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado14
    function ajax_app_Desempenhos_autocomp_id_votado15($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado15';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado15
    function ajax_app_Desempenhos_autocomp_id_votado16($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado16';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado16
    function ajax_app_Desempenhos_autocomp_id_votado17($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado17';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado17
    function ajax_app_Desempenhos_autocomp_id_votado18($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado18';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado18
    function ajax_app_Desempenhos_autocomp_id_votado19($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado19';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado19
    function ajax_app_Desempenhos_autocomp_id_votado20($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado20';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado20
    function ajax_app_Desempenhos_autocomp_id_votado21($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado21';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado21
    function ajax_app_Desempenhos_autocomp_id_votado22($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado22';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado22
    function ajax_app_Desempenhos_autocomp_id_votado23($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado23';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado23
    function ajax_app_Desempenhos_autocomp_id_votado24($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado24';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado24
    function ajax_app_Desempenhos_autocomp_id_votado25($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado25';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado25
    function ajax_app_Desempenhos_autocomp_id_votado26($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado26';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado26
    function ajax_app_Desempenhos_autocomp_id_votado27($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado27';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado27
    function ajax_app_Desempenhos_autocomp_id_votado28($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado28';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado28
    function ajax_app_Desempenhos_autocomp_id_votado29($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado29';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado29
    function ajax_app_Desempenhos_autocomp_id_votado30($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado30';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado30
    function ajax_app_Desempenhos_autocomp_id_votado31($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado31';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado31
    function ajax_app_Desempenhos_autocomp_id_votado32($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado32';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado32
    function ajax_app_Desempenhos_autocomp_id_votado33($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado33';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado33
    function ajax_app_Desempenhos_autocomp_id_votado34($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado34';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado34
    function ajax_app_Desempenhos_autocomp_id_votado35($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado35';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado35
    function ajax_app_Desempenhos_autocomp_id_votado36($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado36';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado36
    function ajax_app_Desempenhos_autocomp_id_votado37($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado37';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado37
    function ajax_app_Desempenhos_autocomp_id_votado38($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado38';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado38
    function ajax_app_Desempenhos_autocomp_id_votado39($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado39';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado39
    function ajax_app_Desempenhos_autocomp_id_votado40($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado40';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado40
    function ajax_app_Desempenhos_autocomp_id_votado41($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado41';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado41
    function ajax_app_Desempenhos_autocomp_id_votado42($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado42';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado42
    function ajax_app_Desempenhos_autocomp_id_votado43($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado43';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado43
    function ajax_app_Desempenhos_autocomp_id_votado44($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado44';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado44
    function ajax_app_Desempenhos_autocomp_id_votado45($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado45';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado45
    function ajax_app_Desempenhos_autocomp_id_votado46($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado46';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado46
    function ajax_app_Desempenhos_autocomp_id_votado47($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado47';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado47
    function ajax_app_Desempenhos_autocomp_id_votado48($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado48';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado48
    function ajax_app_Desempenhos_autocomp_id_votado49($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado49';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado49
    function ajax_app_Desempenhos_autocomp_id_votado50($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado50';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado50
    function ajax_app_Desempenhos_autocomp_id_votado51($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado51';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado51
    function ajax_app_Desempenhos_autocomp_id_votado52($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado52';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado52
    function ajax_app_Desempenhos_autocomp_id_votado53($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado53';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado53
    function ajax_app_Desempenhos_autocomp_id_votado54($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado54';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado54
    function ajax_app_Desempenhos_autocomp_id_votado55($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado55';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado55
    function ajax_app_Desempenhos_autocomp_id_votado56($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado56';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado56
    function ajax_app_Desempenhos_autocomp_id_votado57($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado57';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado57
    function ajax_app_Desempenhos_autocomp_id_votado58($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado58';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado58
    function ajax_app_Desempenhos_autocomp_id_votado59($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado59';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado59
    function ajax_app_Desempenhos_autocomp_id_votado60($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado60';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado60
    function ajax_app_Desempenhos_autocomp_id_votado61($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado61';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado61
    function ajax_app_Desempenhos_autocomp_id_votado62($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado62';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado62
    function ajax_app_Desempenhos_autocomp_id_votado63($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado63';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado63
    function ajax_app_Desempenhos_autocomp_id_votado64($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado64';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado64
    function ajax_app_Desempenhos_autocomp_id_votado65($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado65';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado65
    function ajax_app_Desempenhos_autocomp_id_votado66($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado66';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado66
    function ajax_app_Desempenhos_autocomp_id_votado67($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado67';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado67
    function ajax_app_Desempenhos_autocomp_id_votado68($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado68';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado68
    function ajax_app_Desempenhos_autocomp_id_votado69($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado69';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado69
    function ajax_app_Desempenhos_autocomp_id_votado70($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado70';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado70
    function ajax_app_Desempenhos_autocomp_id_votado71($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado71';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado71
    function ajax_app_Desempenhos_autocomp_id_votado72($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado72';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado72
    function ajax_app_Desempenhos_autocomp_id_votado73($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado73';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado73
    function ajax_app_Desempenhos_autocomp_id_votado74($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado74';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado74
    function ajax_app_Desempenhos_autocomp_id_votado75($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado75';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado75
    function ajax_app_Desempenhos_autocomp_id_votado76($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado76';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado76
    function ajax_app_Desempenhos_autocomp_id_votado77($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado77';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado77
    function ajax_app_Desempenhos_autocomp_id_votado78($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado78';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado78
    function ajax_app_Desempenhos_autocomp_id_votado79($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado79';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado79
    function ajax_app_Desempenhos_autocomp_id_votado80($id_votado, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_votado80';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_votado' => $id_votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_votado']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_votado80

    function ajax_app_Desempenhos_autocomp_id_etapa1($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa1';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa1
    function ajax_app_Desempenhos_autocomp_id_etapa2($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa2';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa2
    function ajax_app_Desempenhos_autocomp_id_etapa3($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa3';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa3
    function ajax_app_Desempenhos_autocomp_id_etapa4($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa4';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa4
    function ajax_app_Desempenhos_autocomp_id_etapa5($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa5';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa5
    function ajax_app_Desempenhos_autocomp_id_etapa6($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa6';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa6
    function ajax_app_Desempenhos_autocomp_id_etapa7($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa7';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa7
    function ajax_app_Desempenhos_autocomp_id_etapa8($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa8';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa8
    function ajax_app_Desempenhos_autocomp_id_etapa9($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa9';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa9
    function ajax_app_Desempenhos_autocomp_id_etapa10($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa10';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa10
    function ajax_app_Desempenhos_autocomp_id_etapa11($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa11';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa11
    function ajax_app_Desempenhos_autocomp_id_etapa12($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa12';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa12
    function ajax_app_Desempenhos_autocomp_id_etapa13($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa13';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa13
    function ajax_app_Desempenhos_autocomp_id_etapa14($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa14';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa14
    function ajax_app_Desempenhos_autocomp_id_etapa15($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa15';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa15
    function ajax_app_Desempenhos_autocomp_id_etapa16($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa16';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa16
    function ajax_app_Desempenhos_autocomp_id_etapa17($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa17';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa17
    function ajax_app_Desempenhos_autocomp_id_etapa18($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa18';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa18
    function ajax_app_Desempenhos_autocomp_id_etapa19($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa19';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa19
    function ajax_app_Desempenhos_autocomp_id_etapa20($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa20';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa20
    function ajax_app_Desempenhos_autocomp_id_etapa21($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa21';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa21
    function ajax_app_Desempenhos_autocomp_id_etapa22($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa22';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa22
    function ajax_app_Desempenhos_autocomp_id_etapa23($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa23';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa23
    function ajax_app_Desempenhos_autocomp_id_etapa24($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa24';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa24
    function ajax_app_Desempenhos_autocomp_id_etapa25($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa25';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa25
    function ajax_app_Desempenhos_autocomp_id_etapa26($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa26';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa26
    function ajax_app_Desempenhos_autocomp_id_etapa27($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa27';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa27
    function ajax_app_Desempenhos_autocomp_id_etapa28($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa28';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa28
    function ajax_app_Desempenhos_autocomp_id_etapa29($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa29';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa29
    function ajax_app_Desempenhos_autocomp_id_etapa30($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa30';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa30
    function ajax_app_Desempenhos_autocomp_id_etapa31($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa31';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa31
    function ajax_app_Desempenhos_autocomp_id_etapa32($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa32';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa32
    function ajax_app_Desempenhos_autocomp_id_etapa33($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa33';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa33
    function ajax_app_Desempenhos_autocomp_id_etapa34($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa34';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa34
    function ajax_app_Desempenhos_autocomp_id_etapa35($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa35';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa35
    function ajax_app_Desempenhos_autocomp_id_etapa36($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa36';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa36
    function ajax_app_Desempenhos_autocomp_id_etapa37($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa37';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa37
    function ajax_app_Desempenhos_autocomp_id_etapa38($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa38';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa38
    function ajax_app_Desempenhos_autocomp_id_etapa39($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa39';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa39
    function ajax_app_Desempenhos_autocomp_id_etapa40($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa40';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa40
    function ajax_app_Desempenhos_autocomp_id_etapa41($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa41';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa41
    function ajax_app_Desempenhos_autocomp_id_etapa42($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa42';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa42
    function ajax_app_Desempenhos_autocomp_id_etapa43($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa43';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa43
    function ajax_app_Desempenhos_autocomp_id_etapa44($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa44';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa44
    function ajax_app_Desempenhos_autocomp_id_etapa45($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa45';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa45
    function ajax_app_Desempenhos_autocomp_id_etapa46($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa46';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa46
    function ajax_app_Desempenhos_autocomp_id_etapa47($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa47';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa47
    function ajax_app_Desempenhos_autocomp_id_etapa48($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa48';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa48
    function ajax_app_Desempenhos_autocomp_id_etapa49($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa49';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa49
    function ajax_app_Desempenhos_autocomp_id_etapa50($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa50';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa50
    function ajax_app_Desempenhos_autocomp_id_etapa51($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa51';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa51
    function ajax_app_Desempenhos_autocomp_id_etapa52($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa52';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa52
    function ajax_app_Desempenhos_autocomp_id_etapa53($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa53';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa53
    function ajax_app_Desempenhos_autocomp_id_etapa54($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa54';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa54
    function ajax_app_Desempenhos_autocomp_id_etapa55($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa55';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa55
    function ajax_app_Desempenhos_autocomp_id_etapa56($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa56';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa56
    function ajax_app_Desempenhos_autocomp_id_etapa57($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa57';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa57
    function ajax_app_Desempenhos_autocomp_id_etapa58($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa58';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa58
    function ajax_app_Desempenhos_autocomp_id_etapa59($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa59';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa59
    function ajax_app_Desempenhos_autocomp_id_etapa60($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa60';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa60
    function ajax_app_Desempenhos_autocomp_id_etapa61($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa61';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa61
    function ajax_app_Desempenhos_autocomp_id_etapa62($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa62';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa62
    function ajax_app_Desempenhos_autocomp_id_etapa63($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa63';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa63
    function ajax_app_Desempenhos_autocomp_id_etapa64($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa64';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa64
    function ajax_app_Desempenhos_autocomp_id_etapa65($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa65';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa65
    function ajax_app_Desempenhos_autocomp_id_etapa66($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa66';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa66
    function ajax_app_Desempenhos_autocomp_id_etapa67($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa67';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa67
    function ajax_app_Desempenhos_autocomp_id_etapa68($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa68';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa68
    function ajax_app_Desempenhos_autocomp_id_etapa69($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa69';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa69
    function ajax_app_Desempenhos_autocomp_id_etapa70($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa70';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa70
    function ajax_app_Desempenhos_autocomp_id_etapa71($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa71';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa71
    function ajax_app_Desempenhos_autocomp_id_etapa72($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa72';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa72
    function ajax_app_Desempenhos_autocomp_id_etapa73($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa73';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa73
    function ajax_app_Desempenhos_autocomp_id_etapa74($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa74';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa74
    function ajax_app_Desempenhos_autocomp_id_etapa75($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa75';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa75
    function ajax_app_Desempenhos_autocomp_id_etapa76($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa76';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa76
    function ajax_app_Desempenhos_autocomp_id_etapa77($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa77';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa77
    function ajax_app_Desempenhos_autocomp_id_etapa78($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa78';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa78
    function ajax_app_Desempenhos_autocomp_id_etapa79($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa79';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa79
    function ajax_app_Desempenhos_autocomp_id_etapa80($id_etapa, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_etapa80';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_etapa' => $id_etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_etapa']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_etapa80

    function ajax_app_Desempenhos_autocomp_id_competencia1($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia1';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia1
    function ajax_app_Desempenhos_autocomp_id_competencia2($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia2';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia2
    function ajax_app_Desempenhos_autocomp_id_competencia3($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia3';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia3
    function ajax_app_Desempenhos_autocomp_id_competencia4($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia4';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia4
    function ajax_app_Desempenhos_autocomp_id_competencia5($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia5';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia5
    function ajax_app_Desempenhos_autocomp_id_competencia6($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia6';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia6
    function ajax_app_Desempenhos_autocomp_id_competencia7($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia7';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia7
    function ajax_app_Desempenhos_autocomp_id_competencia8($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia8';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia8
    function ajax_app_Desempenhos_autocomp_id_competencia9($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia9';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia9
    function ajax_app_Desempenhos_autocomp_id_competencia10($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia10';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia10
    function ajax_app_Desempenhos_autocomp_id_competencia11($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia11';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia11
    function ajax_app_Desempenhos_autocomp_id_competencia12($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia12';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia12
    function ajax_app_Desempenhos_autocomp_id_competencia13($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia13';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia13
    function ajax_app_Desempenhos_autocomp_id_competencia14($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia14';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia14
    function ajax_app_Desempenhos_autocomp_id_competencia15($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia15';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia15
    function ajax_app_Desempenhos_autocomp_id_competencia16($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia16';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia16
    function ajax_app_Desempenhos_autocomp_id_competencia17($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia17';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia17
    function ajax_app_Desempenhos_autocomp_id_competencia18($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia18';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia18
    function ajax_app_Desempenhos_autocomp_id_competencia19($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia19';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia19
    function ajax_app_Desempenhos_autocomp_id_competencia20($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia20';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia20
    function ajax_app_Desempenhos_autocomp_id_competencia21($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia21';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia21
    function ajax_app_Desempenhos_autocomp_id_competencia22($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia22';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia22
    function ajax_app_Desempenhos_autocomp_id_competencia23($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia23';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia23
    function ajax_app_Desempenhos_autocomp_id_competencia24($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia24';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia24
    function ajax_app_Desempenhos_autocomp_id_competencia25($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia25';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia25
    function ajax_app_Desempenhos_autocomp_id_competencia26($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia26';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia26
    function ajax_app_Desempenhos_autocomp_id_competencia27($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia27';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia27
    function ajax_app_Desempenhos_autocomp_id_competencia28($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia28';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia28
    function ajax_app_Desempenhos_autocomp_id_competencia29($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia29';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia29
    function ajax_app_Desempenhos_autocomp_id_competencia30($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia30';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia30
    function ajax_app_Desempenhos_autocomp_id_competencia31($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia31';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia31
    function ajax_app_Desempenhos_autocomp_id_competencia32($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia32';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia32
    function ajax_app_Desempenhos_autocomp_id_competencia33($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia33';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia33
    function ajax_app_Desempenhos_autocomp_id_competencia34($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia34';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia34
    function ajax_app_Desempenhos_autocomp_id_competencia35($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia35';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia35
    function ajax_app_Desempenhos_autocomp_id_competencia36($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia36';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia36
    function ajax_app_Desempenhos_autocomp_id_competencia37($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia37';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia37
    function ajax_app_Desempenhos_autocomp_id_competencia38($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia38';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia38
    function ajax_app_Desempenhos_autocomp_id_competencia39($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia39';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia39
    function ajax_app_Desempenhos_autocomp_id_competencia40($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia40';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia40
    function ajax_app_Desempenhos_autocomp_id_competencia41($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia41';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia41
    function ajax_app_Desempenhos_autocomp_id_competencia42($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia42';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia42
    function ajax_app_Desempenhos_autocomp_id_competencia43($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia43';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia43
    function ajax_app_Desempenhos_autocomp_id_competencia44($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia44';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia44
    function ajax_app_Desempenhos_autocomp_id_competencia45($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia45';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia45
    function ajax_app_Desempenhos_autocomp_id_competencia46($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia46';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia46
    function ajax_app_Desempenhos_autocomp_id_competencia47($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia47';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia47
    function ajax_app_Desempenhos_autocomp_id_competencia48($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia48';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia48
    function ajax_app_Desempenhos_autocomp_id_competencia49($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia49';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia49
    function ajax_app_Desempenhos_autocomp_id_competencia50($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia50';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia50
    function ajax_app_Desempenhos_autocomp_id_competencia51($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia51';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia51
    function ajax_app_Desempenhos_autocomp_id_competencia52($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia52';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia52
    function ajax_app_Desempenhos_autocomp_id_competencia53($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia53';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia53
    function ajax_app_Desempenhos_autocomp_id_competencia54($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia54';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia54
    function ajax_app_Desempenhos_autocomp_id_competencia55($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia55';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia55
    function ajax_app_Desempenhos_autocomp_id_competencia56($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia56';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia56
    function ajax_app_Desempenhos_autocomp_id_competencia57($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia57';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia57
    function ajax_app_Desempenhos_autocomp_id_competencia58($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia58';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia58
    function ajax_app_Desempenhos_autocomp_id_competencia59($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia59';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia59
    function ajax_app_Desempenhos_autocomp_id_competencia60($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia60';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia60
    function ajax_app_Desempenhos_autocomp_id_competencia61($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia61';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia61
    function ajax_app_Desempenhos_autocomp_id_competencia62($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia62';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia62
    function ajax_app_Desempenhos_autocomp_id_competencia63($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia63';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia63
    function ajax_app_Desempenhos_autocomp_id_competencia64($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia64';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia64
    function ajax_app_Desempenhos_autocomp_id_competencia65($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia65';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia65
    function ajax_app_Desempenhos_autocomp_id_competencia66($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia66';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia66
    function ajax_app_Desempenhos_autocomp_id_competencia67($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia67';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia67
    function ajax_app_Desempenhos_autocomp_id_competencia68($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia68';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia68
    function ajax_app_Desempenhos_autocomp_id_competencia69($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia69';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia69
    function ajax_app_Desempenhos_autocomp_id_competencia70($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia70';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia70
    function ajax_app_Desempenhos_autocomp_id_competencia71($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia71';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia71
    function ajax_app_Desempenhos_autocomp_id_competencia72($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia72';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia72
    function ajax_app_Desempenhos_autocomp_id_competencia73($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia73';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia73
    function ajax_app_Desempenhos_autocomp_id_competencia74($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia74';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia74
    function ajax_app_Desempenhos_autocomp_id_competencia75($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia75';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia75
    function ajax_app_Desempenhos_autocomp_id_competencia76($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia76';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia76
    function ajax_app_Desempenhos_autocomp_id_competencia77($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia77';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia77
    function ajax_app_Desempenhos_autocomp_id_competencia78($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia78';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia78
    function ajax_app_Desempenhos_autocomp_id_competencia79($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia79';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia79
    function ajax_app_Desempenhos_autocomp_id_competencia80($id_competencia, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_competencia80';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_competencia' => $id_competencia,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_competencia']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_competencia80

    function ajax_app_Desempenhos_autocomp_id_habilidade1($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade1';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade1
    function ajax_app_Desempenhos_autocomp_id_habilidade2($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade2';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade2
    function ajax_app_Desempenhos_autocomp_id_habilidade3($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade3';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade3
    function ajax_app_Desempenhos_autocomp_id_habilidade4($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade4';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade4
    function ajax_app_Desempenhos_autocomp_id_habilidade5($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade5';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade5
    function ajax_app_Desempenhos_autocomp_id_habilidade6($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade6';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade6
    function ajax_app_Desempenhos_autocomp_id_habilidade7($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade7';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade7
    function ajax_app_Desempenhos_autocomp_id_habilidade8($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade8';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade8
    function ajax_app_Desempenhos_autocomp_id_habilidade9($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade9';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade9
    function ajax_app_Desempenhos_autocomp_id_habilidade10($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade10';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade10
    function ajax_app_Desempenhos_autocomp_id_habilidade11($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade11';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade11
    function ajax_app_Desempenhos_autocomp_id_habilidade12($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade12';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade12
    function ajax_app_Desempenhos_autocomp_id_habilidade13($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade13';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade13
    function ajax_app_Desempenhos_autocomp_id_habilidade14($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade14';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade14
    function ajax_app_Desempenhos_autocomp_id_habilidade15($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade15';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade15
    function ajax_app_Desempenhos_autocomp_id_habilidade16($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade16';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade16
    function ajax_app_Desempenhos_autocomp_id_habilidade17($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade17';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade17
    function ajax_app_Desempenhos_autocomp_id_habilidade18($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade18';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade18
    function ajax_app_Desempenhos_autocomp_id_habilidade19($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade19';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade19
    function ajax_app_Desempenhos_autocomp_id_habilidade20($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade20';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade20
    function ajax_app_Desempenhos_autocomp_id_habilidade21($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade21';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade21
    function ajax_app_Desempenhos_autocomp_id_habilidade22($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade22';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade22
    function ajax_app_Desempenhos_autocomp_id_habilidade23($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade23';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade23
    function ajax_app_Desempenhos_autocomp_id_habilidade24($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade24';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade24
    function ajax_app_Desempenhos_autocomp_id_habilidade25($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade25';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade25
    function ajax_app_Desempenhos_autocomp_id_habilidade26($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade26';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade26
    function ajax_app_Desempenhos_autocomp_id_habilidade27($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade27';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade27
    function ajax_app_Desempenhos_autocomp_id_habilidade28($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade28';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade28
    function ajax_app_Desempenhos_autocomp_id_habilidade29($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade29';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade29
    function ajax_app_Desempenhos_autocomp_id_habilidade30($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade30';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade30
    function ajax_app_Desempenhos_autocomp_id_habilidade31($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade31';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade31
    function ajax_app_Desempenhos_autocomp_id_habilidade32($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade32';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade32
    function ajax_app_Desempenhos_autocomp_id_habilidade33($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade33';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade33
    function ajax_app_Desempenhos_autocomp_id_habilidade34($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade34';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade34
    function ajax_app_Desempenhos_autocomp_id_habilidade35($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade35';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade35
    function ajax_app_Desempenhos_autocomp_id_habilidade36($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade36';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade36
    function ajax_app_Desempenhos_autocomp_id_habilidade37($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade37';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade37
    function ajax_app_Desempenhos_autocomp_id_habilidade38($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade38';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade38
    function ajax_app_Desempenhos_autocomp_id_habilidade39($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade39';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade39
    function ajax_app_Desempenhos_autocomp_id_habilidade40($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade40';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade40
    function ajax_app_Desempenhos_autocomp_id_habilidade41($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade41';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade41
    function ajax_app_Desempenhos_autocomp_id_habilidade42($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade42';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade42
    function ajax_app_Desempenhos_autocomp_id_habilidade43($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade43';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade43
    function ajax_app_Desempenhos_autocomp_id_habilidade44($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade44';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade44
    function ajax_app_Desempenhos_autocomp_id_habilidade45($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade45';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade45
    function ajax_app_Desempenhos_autocomp_id_habilidade46($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade46';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade46
    function ajax_app_Desempenhos_autocomp_id_habilidade47($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade47';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade47
    function ajax_app_Desempenhos_autocomp_id_habilidade48($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade48';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade48
    function ajax_app_Desempenhos_autocomp_id_habilidade49($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade49';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade49
    function ajax_app_Desempenhos_autocomp_id_habilidade50($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade50';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade50
    function ajax_app_Desempenhos_autocomp_id_habilidade51($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade51';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade51
    function ajax_app_Desempenhos_autocomp_id_habilidade52($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade52';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade52
    function ajax_app_Desempenhos_autocomp_id_habilidade53($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade53';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade53
    function ajax_app_Desempenhos_autocomp_id_habilidade54($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade54';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade54
    function ajax_app_Desempenhos_autocomp_id_habilidade55($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade55';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade55
    function ajax_app_Desempenhos_autocomp_id_habilidade56($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade56';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade56
    function ajax_app_Desempenhos_autocomp_id_habilidade57($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade57';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade57
    function ajax_app_Desempenhos_autocomp_id_habilidade58($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade58';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade58
    function ajax_app_Desempenhos_autocomp_id_habilidade59($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade59';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade59
    function ajax_app_Desempenhos_autocomp_id_habilidade60($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade60';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade60
    function ajax_app_Desempenhos_autocomp_id_habilidade61($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade61';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade61
    function ajax_app_Desempenhos_autocomp_id_habilidade62($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade62';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade62
    function ajax_app_Desempenhos_autocomp_id_habilidade63($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade63';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade63
    function ajax_app_Desempenhos_autocomp_id_habilidade64($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade64';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade64
    function ajax_app_Desempenhos_autocomp_id_habilidade65($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade65';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade65
    function ajax_app_Desempenhos_autocomp_id_habilidade66($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade66';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade66
    function ajax_app_Desempenhos_autocomp_id_habilidade67($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade67';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade67
    function ajax_app_Desempenhos_autocomp_id_habilidade68($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade68';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade68
    function ajax_app_Desempenhos_autocomp_id_habilidade69($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade69';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade69
    function ajax_app_Desempenhos_autocomp_id_habilidade70($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade70';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade70
    function ajax_app_Desempenhos_autocomp_id_habilidade71($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade71';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade71
    function ajax_app_Desempenhos_autocomp_id_habilidade72($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade72';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade72
    function ajax_app_Desempenhos_autocomp_id_habilidade73($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade73';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade73
    function ajax_app_Desempenhos_autocomp_id_habilidade74($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade74';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade74
    function ajax_app_Desempenhos_autocomp_id_habilidade75($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade75';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade75
    function ajax_app_Desempenhos_autocomp_id_habilidade76($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade76';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade76
    function ajax_app_Desempenhos_autocomp_id_habilidade77($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade77';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade77
    function ajax_app_Desempenhos_autocomp_id_habilidade78($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade78';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade78
    function ajax_app_Desempenhos_autocomp_id_habilidade79($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade79';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade79
    function ajax_app_Desempenhos_autocomp_id_habilidade80($id_habilidade, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'autocomp_id_habilidade80';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_habilidade' => $id_habilidade,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade'] = utf8_decode(urldecode($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['id_habilidade']));
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_autocomp_id_habilidade80

    function ajax_app_Desempenhos_submit_form($cod_desemp, $id_turma, $id_grupo, $id_etapa, $id_votante, $id_votado, $id_competencia, $peso, $id_habilidade, $resultado, $nota, $id_desemp, $nmgp_refresh_row, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'submit_form';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'cod_desemp' => $cod_desemp,
                  'id_turma' => $id_turma,
                  'id_grupo' => $id_grupo,
                  'id_etapa' => $id_etapa,
                  'id_votante' => $id_votante,
                  'id_votado' => $id_votado,
                  'id_competencia' => $id_competencia,
                  'peso' => $peso,
                  'id_habilidade' => $id_habilidade,
                  'resultado' => $resultado,
                  'nota' => $nota,
                  'id_desemp' => $id_desemp,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'nm_form_submit' => $nm_form_submit,
                  'nmgp_url_saida' => $nmgp_url_saida,
                  'nmgp_opcao' => $nmgp_opcao,
                  'nmgp_ancora' => $nmgp_ancora,
                  'nmgp_num_form' => $nmgp_num_form,
                  'nmgp_parms' => $nmgp_parms,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_submit_form

    function ajax_app_Desempenhos_navigate_form($id_desemp, $nm_form_submit, $nmgp_opcao, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'navigate_form';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_desemp' => $id_desemp,
                  'nm_form_submit' => $nm_form_submit,
                  'nmgp_opcao' => $nmgp_opcao,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_navigate_form

    function ajax_app_Desempenhos_add_new_line($sc_seq_vert, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'add_new_line';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'sc_seq_vert' => $sc_seq_vert,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_add_new_line

    function ajax_app_Desempenhos_backup_line($id_desemp, $nmgp_refresh_row, $nm_form_submit, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'backup_line';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_desemp' => $id_desemp,
                  'nmgp_refresh_row' => $nmgp_refresh_row,
                  'nm_form_submit' => $nm_form_submit,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_backup_line

    function ajax_app_Desempenhos_table_refresh($id_desemp, $nm_form_submit, $nmgp_opcao, $script_case_init)
    {
        global $inicial_app_Desempenhos;
        //register_shutdown_function("app_Desempenhos_pack_ajax_response");
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_flag          = true;
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_opcao         = 'table_refresh';
        $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param'] = array(
                  'id_desemp' => $id_desemp,
                  'nm_form_submit' => $nm_form_submit,
                  'nmgp_opcao' => $nmgp_opcao,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_Desempenhos->contr_app_Desempenhos->controle();
        exit;
    } // ajax_table_refresh


   function app_Desempenhos_pack_ajax_response()
   {
      global $inicial_app_Desempenhos;
      $aResp = array();
      if ('' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['newline'];
      }
      else
//-----
      {
         if ('ERROR' == $aResp['result'])
         {
            app_Desempenhos_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            app_Desempenhos_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            app_Desempenhos_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = htmlentities($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['tableRefresh']);
         }
         elseif ('OK' == $aResp['result'])
         {
            app_Desempenhos_pack_ajax_ok($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['focus']) && '' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['focus'];
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['closeLine']) && '' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['masterValue']) && '' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['masterValue'])
         {
            app_Desempenhos_pack_master_value($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['redir']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['redir']))
         {
            app_Desempenhos_pack_ajax_redir($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['blockDisplay']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['blockDisplay']))
         {
            app_Desempenhos_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fieldDisplay']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fieldDisplay']))
         {
            app_Desempenhos_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fieldLabel']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fieldLabel']))
         {
            app_Desempenhos_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['readOnly']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['readOnly']))
         {
            app_Desempenhos_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']))
         {
            app_Desempenhos_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['btnVars']) && !empty($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['btnVars']))
         {
            app_Desempenhos_pack_ajax_btn_vars($aResp);
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output']) && $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = app_Desempenhos_pack_protect_string(ob_get_contents());
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // app_Desempenhos_pack_ajax_response

   function app_Desempenhos_pack_ajax_errors(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['errList'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_app_Desempenhos' != $sField)
                       ? $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => app_Desempenhos_pack_protect_string($sMsg),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // app_Desempenhos_pack_ajax_errors

   function app_Desempenhos_pack_ajax_ok(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $iNumLinha = (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => app_Desempenhos_pack_protect_string($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // app_Desempenhos_pack_ajax_ok

   function app_Desempenhos_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $iNumLinha = (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = $aData['imgFile'];
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = $aData['imgOrig'];
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = $aData['imgLink'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = $aData['docLink'];
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = $aData['docIcon'];
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = $aData['imgHtml'];
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = app_Desempenhos_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? app_Desempenhos_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => app_Desempenhos_pack_protect_string($sOpt),
                                                  'label' => app_Desempenhos_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // app_Desempenhos_pack_ajax_set_fields

   function app_Desempenhos_pack_ajax_redir(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['redir'][$sTag];
         }
      }
   } // app_Desempenhos_pack_ajax_redir

   function app_Desempenhos_pack_master_value(&$aResp)
   {
      global $inicial_app_Desempenhos;
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                          'value' => $sValue);
      }
   } // app_Desempenhos_pack_master_value

   function app_Desempenhos_pack_ajax_block_display(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // app_Desempenhos_pack_ajax_block_display

   function app_Desempenhos_pack_ajax_field_display(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // app_Desempenhos_pack_ajax_field_display

   function app_Desempenhos_pack_ajax_field_label(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, app_Desempenhos_pack_protect_string($sFieldLabel));
      }
   } // app_Desempenhos_pack_ajax_field_label

   function app_Desempenhos_pack_ajax_readonly(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['readOnly'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // app_Desempenhos_pack_ajax_readonly

   function app_Desempenhos_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['navStatus'] = array();
      if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']['ret']) && '' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']['ava']) && '' != $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['navStatus']['ava'];
      }
   } // app_Desempenhos_pack_ajax_nav_status

   function app_Desempenhos_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_app_Desempenhos;
      $aResp['btnVars'] = array();
      foreach ($inicial_app_Desempenhos->contr_app_Desempenhos->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, app_Desempenhos_pack_protect_string($sBtnValue));
      }
   } // app_Desempenhos_pack_ajax_btn_vars

   function app_Desempenhos_pack_protect_string($sString)
   {
      if (!empty($sString))
      {
         return htmlentities($sString);
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // app_Desempenhos_pack_protect_string
?>
