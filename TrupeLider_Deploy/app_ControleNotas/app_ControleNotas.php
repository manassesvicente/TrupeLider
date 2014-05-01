<?php
//
   include_once('app_ControleNotas_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil']          = "TRUPE";
   $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_prod']       = "/trupe/prod";
   $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_imagens']    = "/trupe/file/img";
   $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_imag_temp']  = "/trupe/tmp";
   $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_doc']        = "/home/manassesvicente/www/trupe/file/doc";
//
class app_ControleNotas_ini
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
      $_SESSION['sc_session'][$this->sc_page]['app_ControleNotas']['decimal_db'] = "."; 

      $this->nm_cod_apl    = "app_ControleNotas"; 
      $this->nm_nome_apl   = "Facilitar o lançamento de Notas"; 
      $this->nm_seguranca  = ""; 
      $this->nm_grupo      = "SISTEMA"; 
      $this->nm_autor      = "admin"; 
      $this->nm_versao_sc  = "4.00.0008"; 
      $this->nm_tp_lic_sc  = "pr_bronze"; 
      $this->nm_dt_criacao = "20121208"; 
      $this->nm_hr_criacao = "011201"; 
      $this->nm_autor_alt  = "admin"; 
      $this->nm_dt_ult_alt = "20121208"; 
      $this->nm_hr_ult_alt = "023958"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/app_ControleNotas';
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
      $_SESSION['sc_session'][$this->sc_page]['app_ControleNotas']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] != 'app_ControleNotas')) 
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
              if (isset($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao']) && $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil']) && $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['app_ControleNotas']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['app_ControleNotas']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      perfil_lib($this->path_libs);
      $con_devel          =  $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao']; 
      $perfil_trab        = ""; 
      $this->nm_falta_var = ""; 
      $nm_crit_perfil     = false;
      if (isset($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'SISTEMA', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['app_ControleNotas']['glo_nm_perfil'];
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
         $_SESSION['sc_session'][$this->sc_page]['app_ControleNotas']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
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
          $this->nm_tabela = ""; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] != 'app_ControleNotas')) 
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
      $_SESSION['scriptcase']['nm_bases_security']  = "D9NwDQJsHAN7HQBOHuvsZSFKDWF/VoFGHkJUZ1BqDSrwVWBOHuveHEJ3V5X/HIFaHkXOVIFGDSBOHuJsHgrwVIB/DWBmVENUHQNmVIFaD1rwHuXGDEvsHAB/DuX7ZuJwDcJwH9FGHSBeD5JeHgNaVIJqHEXCHIBqD9BsZSJeDSvmV5BODEzGDkrCDWB7VoBqDkXOH9X7HAzGZMFGHuvmVIJqHEF/HIBqDcXOZSJwDSrwV5X7HuBOVkBsHEFqDoBiHQXOH9rqDSrwV5FaDEzGVkrCHEF/VoB/HkJUZ1BqDSrwVWBOHuveHEJ3DuXCHIBOD9FYZ9FaHIrwV5FGHgvCZSJ3V5FYVEX7HkXOZkFaDSvOV5B/DMvCDkFCDWB7VoBqDkXOH9X7HAzGHQJeDuBODkBOV5FqHMrqVQBsZkBOHSveHQXGDMrKHENiH5XKHIFGDkJmDQXGHAN7HQBqDMrwDkJ3DEr/HIraVQBqZ1BiZ1vmHuBqDuNKVkJqDurGDoX7DkXODQJwZ1vOHuBiDMrwDkXeV5FqHIFGDkJKZ1XGD1NaZMJwVgBeHAFCDEJeHIBiVQJKZSrqD1vOHuJeVgN7V9JqV5F/HMXGHQBiZ1XGHSrwV5FaDErYDkFKDEFYHIrqVQFYZSFGD1NaHQXGDMrwV9XeDEr/HMJeHQNmZ1JsZ1vsHQX7DuNaHEFiH5BmZuXGHQBiZSFGHSrKHQJwDMNOV9BUDWFaHIJeDcNGZSFaHSrwV5BqDMN7ZSXeV5B7ZuB/VQBiZSFUZ1BOVWJsDuzGVcBsHEFqZuF7HkNmZ1BqHIzGHuB/HgvCDkFeV5XKDoBOHkBwZ9XGZ1NaV5F7HgNaVIFCDEFqDorqDcNGZkB/HAvsHuBODMBeHAFKH5XKVuFGHQNwVIBiHABYHuX7HgzGVcFeH5FqHIXGDcXGZ1BqDSrwVWBOHuveHEJ3V5B3VErqVQJw";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_not_suport))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"#FFFFFF\">";
          echo "       <b><font size=\"4\">Conex&atilde;o para banco de dados n&atilde;o suportado por esta aplica&ccedil;&atilde;o, contate o administrador do sistema. Conex&atilde;o:</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] != 'app_ControleNotas')) 
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
class app_ControleNotas_edit
{
    var $contr_app_ControleNotas;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("app_ControleNotas_apl.php");
        $this->contr_app_ControleNotas = new app_ControleNotas_apl();
    }
}
//
//----------------  Controle da Aplicação
//
    $_SESSION['scriptcase']['app_ControleNotas']['contr_erro'] = 'off';
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
        if ('ajax_app_ControleNotas_validate_turma' == $_POST['rs'])
        {
            $turma = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
        }
        if ('ajax_app_ControleNotas_validate_etapa' == $_POST['rs'])
        {
            $etapa = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
        }
        if ('ajax_app_ControleNotas_validate_grupo' == $_POST['rs'])
        {
            $grupo = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
        }
        if ('ajax_app_ControleNotas_validate_votante' == $_POST['rs'])
        {
            $votante = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
        }
        if ('ajax_app_ControleNotas_validate_votado' == $_POST['rs'])
        {
            $votado = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
        }
        if ('ajax_app_ControleNotas_submit_form' == $_POST['rs'])
        {
            $turma = $_POST['rsargs'][0];
            $etapa = $_POST['rsargs'][1];
            $grupo = $_POST['rsargs'][2];
            $votante = $_POST['rsargs'][3];
            $votado = $_POST['rsargs'][4];
            $nm_form_submit = $_POST['rsargs'][5];
            $nmgp_url_saida = $_POST['rsargs'][6];
            $nmgp_opcao = $_POST['rsargs'][7];
            $nmgp_ancora = $_POST['rsargs'][8];
            $nmgp_num_form = $_POST['rsargs'][9];
            $nmgp_parms = $_POST['rsargs'][10];
            $script_case_init = $_POST['rsargs'][11];
        }
        if ('ajax_app_ControleNotas_navigate_form' == $_POST['rs'])
        {
            $nm_form_submit = $_POST['rsargs'][0];
            $nmgp_opcao = $_POST['rsargs'][1];
            $script_case_init = $_POST['rsargs'][2];
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
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_parms']))
    { 
        $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_parms']);
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
           nm_limpa_str_app_ControleNotas($cadapar[1]);
           $$cadapar[0] = $cadapar[1];
           $ix++;
        }
        if (isset($global_etapa)) 
        {
            $_SESSION['global_etapa'] = $global_etapa;
        }
        if (isset($global_grupo)) 
        {
            $_SESSION['global_grupo'] = $global_grupo;
        }
        if (isset($global_turma)) 
        {
            $_SESSION['global_turma'] = $global_turma;
        }
        if (isset($global_votado)) 
        {
            $_SESSION['global_votado'] = $global_votado;
        }
        if (isset($global_votante)) 
        {
            $_SESSION['global_votante'] = $global_votante;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe']);
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
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "app_ControleNotas";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'app_ControleNotas' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['iframe_menu'] = $salva_iframe;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['first_time'] = true;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'app_ControleNotas')
    {
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] = true;
    }
    $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/app_ControleNotas_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["global_etapa"])) 
        {
            $_SESSION['global_etapa'] = $_POST["global_etapa"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_etapa']);
        }
        if (isset($_GET["global_etapa"])) 
        {
            $_SESSION['global_etapa'] = $_GET["global_etapa"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_etapa']);
        }
        if (isset($_POST["global_grupo"])) 
        {
            $_SESSION['global_grupo'] = $_POST["global_grupo"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_grupo']);
        }
        if (isset($_GET["global_grupo"])) 
        {
            $_SESSION['global_grupo'] = $_GET["global_grupo"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_grupo']);
        }
        if (isset($_POST["global_turma"])) 
        {
            $_SESSION['global_turma'] = $_POST["global_turma"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_turma']);
        }
        if (isset($_GET["global_turma"])) 
        {
            $_SESSION['global_turma'] = $_GET["global_turma"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_turma']);
        }
        if (isset($_POST["global_votado"])) 
        {
            $_SESSION['global_votado'] = $_POST["global_votado"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_votado']);
        }
        if (isset($_GET["global_votado"])) 
        {
            $_SESSION['global_votado'] = $_GET["global_votado"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_votado']);
        }
        if (isset($_POST["global_votante"])) 
        {
            $_SESSION['global_votante'] = $_POST["global_votante"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_votante']);
        }
        if (isset($_GET["global_votante"])) 
        {
            $_SESSION['global_votante'] = $_GET["global_votante"];
             nm_limpa_str_app_ControleNotas($_SESSION['global_votante']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_redirect_tp'] = "";
            $nm_url_saida = "app_ControleNotas_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "app_ControleNotas_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'] . "?script_case_init=" .$script_case_init ;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'] = $nm_url_saida; 
                $nm_url_saida = "app_ControleNotas_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'])) ? $_SESSION['scriptcase']['sc_url_saida'] : "";
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'] = true;
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_ControleNotas']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_app_ControleNotas = new app_ControleNotas_edit();
    $inicial_app_ControleNotas->inicializa();

    $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['select_html'] = array();
    $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['select_html']['turma'] = "class=\"scFormObjectOdd\" name=\"turma\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1";
    $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['select_html']['etapa'] = "class=\"scFormObjectOdd\" name=\"etapa\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1";
    $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['select_html']['grupo'] = "class=\"scFormObjectOdd\" name=\"grupo\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1";
    $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['select_html']['votante'] = "class=\"scFormObjectOdd\" name=\"votante\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1";
    $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['select_html']['votado'] = "class=\"scFormObjectOdd\" name=\"votado\"  onBlur=\"scCssBlur(this);\"  onFocus=\"scCssFocus(this);\"  onChange=\"\"  size=1";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/app_ControleNotas_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/app_ControleNotas_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_app_ControleNotas_validate_turma");
    sajax_export("ajax_app_ControleNotas_validate_etapa");
    sajax_export("ajax_app_ControleNotas_validate_grupo");
    sajax_export("ajax_app_ControleNotas_validate_votante");
    sajax_export("ajax_app_ControleNotas_validate_votado");
    sajax_export("ajax_app_ControleNotas_submit_form");
    sajax_export("ajax_app_ControleNotas_navigate_form");
    sajax_handle_client_request();

    $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
//
    function nm_limpa_str_app_ControleNotas(&$str)
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

    function ajax_app_ControleNotas_validate_turma($turma, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'validate_turma';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'turma' => $turma,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_validate_turma

    function ajax_app_ControleNotas_validate_etapa($etapa, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'validate_etapa';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'etapa' => $etapa,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_validate_etapa

    function ajax_app_ControleNotas_validate_grupo($grupo, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'validate_grupo';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'grupo' => $grupo,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_validate_grupo

    function ajax_app_ControleNotas_validate_votante($votante, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'validate_votante';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'votante' => $votante,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_validate_votante

    function ajax_app_ControleNotas_validate_votado($votado, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'validate_votado';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'votado' => $votado,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_validate_votado

    function ajax_app_ControleNotas_submit_form($turma, $etapa, $grupo, $votante, $votado, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'submit_form';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'turma' => $turma,
                  'etapa' => $etapa,
                  'grupo' => $grupo,
                  'votante' => $votante,
                  'votado' => $votado,
                  'nm_form_submit' => $nm_form_submit,
                  'nmgp_url_saida' => $nmgp_url_saida,
                  'nmgp_opcao' => $nmgp_opcao,
                  'nmgp_ancora' => $nmgp_ancora,
                  'nmgp_num_form' => $nmgp_num_form,
                  'nmgp_parms' => $nmgp_parms,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_submit_form

    function ajax_app_ControleNotas_navigate_form($nm_form_submit, $nmgp_opcao, $script_case_init)
    {
        global $inicial_app_ControleNotas;
        //register_shutdown_function("app_ControleNotas_pack_ajax_response");
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_flag          = true;
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_opcao         = 'navigate_form';
        $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param'] = array(
                  'nm_form_submit' => $nm_form_submit,
                  'nmgp_opcao' => $nmgp_opcao,
                  'script_case_init' => $script_case_init,
                  'buffer_output' => true,
                 );
        if ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_app_ControleNotas->contr_app_ControleNotas->controle();
        exit;
    } // ajax_navigate_form


   function app_ControleNotas_pack_ajax_response()
   {
      global $inicial_app_ControleNotas;
      $aResp = array();
      if ('' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['newline'];
      }
      else
//-----
      {
         if ('ERROR' == $aResp['result'])
         {
            app_ControleNotas_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            app_ControleNotas_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            app_ControleNotas_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = htmlentities($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['tableRefresh']);
         }
         elseif ('OK' == $aResp['result'])
         {
            app_ControleNotas_pack_ajax_ok($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['focus']) && '' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['focus'];
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['closeLine']) && '' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['masterValue']) && '' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['masterValue'])
         {
            app_ControleNotas_pack_master_value($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['redir']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['redir']))
         {
            app_ControleNotas_pack_ajax_redir($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['blockDisplay']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['blockDisplay']))
         {
            app_ControleNotas_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fieldDisplay']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fieldDisplay']))
         {
            app_ControleNotas_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fieldLabel']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fieldLabel']))
         {
            app_ControleNotas_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['readOnly']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['readOnly']))
         {
            app_ControleNotas_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']))
         {
            app_ControleNotas_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['btnVars']) && !empty($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['btnVars']))
         {
            app_ControleNotas_pack_ajax_btn_vars($aResp);
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output']) && $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = app_ControleNotas_pack_protect_string(ob_get_contents());
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
   } // app_ControleNotas_pack_ajax_response

   function app_ControleNotas_pack_ajax_errors(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['errList'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_app_ControleNotas' != $sField)
                       ? $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => app_ControleNotas_pack_protect_string($sMsg),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // app_ControleNotas_pack_ajax_errors

   function app_ControleNotas_pack_ajax_ok(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $iNumLinha = (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => app_ControleNotas_pack_protect_string($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // app_ControleNotas_pack_ajax_ok

   function app_ControleNotas_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $iNumLinha = (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fldList'] as $sField => $aData)
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
               $aValue['label'] = app_ControleNotas_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? app_ControleNotas_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => app_ControleNotas_pack_protect_string($sOpt),
                                                  'label' => app_ControleNotas_pack_protect_string($sLabel));
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
   } // app_ControleNotas_pack_ajax_set_fields

   function app_ControleNotas_pack_ajax_redir(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['redir'][$sTag];
         }
      }
   } // app_ControleNotas_pack_ajax_redir

   function app_ControleNotas_pack_master_value(&$aResp)
   {
      global $inicial_app_ControleNotas;
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                          'value' => $sValue);
      }
   } // app_ControleNotas_pack_master_value

   function app_ControleNotas_pack_ajax_block_display(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // app_ControleNotas_pack_ajax_block_display

   function app_ControleNotas_pack_ajax_field_display(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // app_ControleNotas_pack_ajax_field_display

   function app_ControleNotas_pack_ajax_field_label(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, app_ControleNotas_pack_protect_string($sFieldLabel));
      }
   } // app_ControleNotas_pack_ajax_field_label

   function app_ControleNotas_pack_ajax_readonly(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['readOnly'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // app_ControleNotas_pack_ajax_readonly

   function app_ControleNotas_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['navStatus'] = array();
      if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']['ret']) && '' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']['ava']) && '' != $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['navStatus']['ava'];
      }
   } // app_ControleNotas_pack_ajax_nav_status

   function app_ControleNotas_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_app_ControleNotas;
      $aResp['btnVars'] = array();
      foreach ($inicial_app_ControleNotas->contr_app_ControleNotas->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, app_ControleNotas_pack_protect_string($sBtnValue));
      }
   } // app_ControleNotas_pack_ajax_btn_vars

   function app_ControleNotas_pack_protect_string($sString)
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
   } // app_ControleNotas_pack_protect_string
?>
