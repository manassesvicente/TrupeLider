<?php
   include_once('app_LiderPista_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil']          = "TRUPE";
   $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_prod']       = "/trupe/prod";
   $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_imagens']    = "/trupe/file/img";
   $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_imag_temp']  = "/trupe/tmp";
   $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_doc']        = "/home/manassesvicente/www/trupe/file/doc";
//
class app_LiderPista_ini
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
   var $nm_app_version;
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
   var $cor_txt_grid_impar;
   var $cor_txt_grid_par;
   var $texto_fonte_tipo;
   var $texto_fonte_tipo_impar;
   var $texto_fonte_tipo_par;
   var $texto_fonte_tamanho;
   var $texto_fonte_tamanho_impar;
   var $texto_fonte_tamanho_par;
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
   var $cor_link_dados_impar;
   var $cor_link_dados_par;
   var $cor_lin_grid;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_barra;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $img_linha;
   var $NM_pdf_bg_ok; 
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
   var $path_help;
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
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
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
   var $nm_bases_mssql;
   var $nm_bases_oracle;
   var $nm_bases_db2;
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
      $_SESSION['sc_session'][$this->sc_page]['app_LiderPista']['decimal_db'] = "."; 

      $this->nm_cod_apl    = "app_LiderPista"; 
      $this->nm_nome_apl   = "Relatório das Notas do Líder por Pista"; 
      $this->nm_seguranca  = ""; 
      $this->nm_grupo      = "SISTEMA"; 
      $this->nm_autor      = "admin"; 
      $this->nm_versao_sc  = "4.00.0008"; 
      $this->nm_tp_lic_sc  = "pr_bronze"; 
      $this->nm_dt_criacao = "20121208"; 
      $this->nm_hr_criacao = "172907"; 
      $this->nm_autor_alt  = "admin"; 
      $this->nm_dt_ult_alt = "20121208"; 
      $this->nm_hr_ult_alt = "172906"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp  = (float) $NM_sec; 
      $this->nm_app_version = "1.0.0";
// 
      $this->NM_pdf_bg_ok          = true; 
      $this->border_grid           = "0"; 
      $this->cor_bg_grid           = "#FFFFFF" ; 
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
      $this->cor_txt_grid_impar    = "#333333"; 
      $this->cor_txt_grid_par      = "#333333"; 
      $this->texto_fonte_tipo_impar = "Tahoma, Arial, sans-serif"; 
      $this->texto_fonte_tipo_par  = "Tahoma, Arial, sans-serif"; 
      $this->texto_fonte_tamanho_impar = "2"; 
      $this->texto_fonte_tamanho_par = "2"; 
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
      $this->cor_link_dados_impar  = "#189300"; 
      $this->cor_link_dados_par    = "#189300"; 
      $this->img_fun_pag           = "bgmiolo.gif"; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_barra         = "BgIconesVerde.gif"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['app_LiderPista']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/app_LiderPista';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
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
      $this->path_grafico_fonts  = $this->root . $this->path_prod . "/third/jpgraphfonts/";
      $_SESSION['sc_session'][$this->sc_page]['app_LiderPista']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan'])) 
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

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      include_once($this->path_libs . "/nm_sec_prod.php");
      include_once($this->path_libs . "/nm_ini_perfil.php");
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao']) && $_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil']) && $_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['app_LiderPista']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['app_LiderPista']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      perfil_lib($this->path_libs);
      $con_devel          = $_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao']; 
      $perfil_trab        = ""; 
      $this->nm_falta_var = ""; 
      $nm_crit_perfil     = false;
      if (isset($_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'SISTEMA', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['app_LiderPista']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['app_LiderPista']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['app_LiderPista']['embutida_init']) 
      {
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['app_LiderPista']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
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
          $this->nm_tabela = "LIDER_PISTA"; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan'])) 
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
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "odbc_mssql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2");
      $this->nm_bases_access     = array("access", "ado_access");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql");
      $this->nm_bases_ibase      = array("ibase", "firebird", "borland_ibase");
      $this->nm_bases_sybase     = array("sybase");
      $this->nm_bases_sqlite     = array("sqlite");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7");
      $_SESSION['scriptcase']['nm_bases_security']  = "D9XsDQraDSvCD5BOHgBOVIJGV5B7DoXGHkBiH9JwHArKHQXGDEveHEFKDuFaHIFaHkXOVIFGDSBOHuJsDurwV9BOV5XKVErqVQNwZ1B/Z1rKHuFaDuNaHEBsDWXKHIFUHQNwDQBqHSrKHuFGHgrKV9JqH5FYVEX7DkJKZkBOZ1vmHQX7VgBYHAXeDEFYVoB/D9JUZ9BOHSBeHuFUDuBOVcFKH5FYVEBiVQNwZkJsHSveHQJwHgveZSBOV5BmHMJwDkJmDQFaZ1NKVWBODMBOVcBODEr/HIFGVQJUZ1BiD1BeHQJwDuNKVkJqDurGDoX7DkXODQJeZ1vOVWXGDMzGV9FCH5FYHIBiDkJKZ1FUD1NaHQJeVgBeHErsDEJeHINUHQJKZSF7D1BOVWXGVgN7V9B/H5XCHIXGDcJwZkFUHAvOV5BODuNKVkXeDWB7VoBiDcBwDQX7HAvsD5JwDErYVcrsDWFYDoJsHkXGZkJeHAvsHQJwHgN7HEJ3HEFYVEBqHkBiDQBiHSNOV5FaDErKVIJqH5JeHIraD9BwVIBiHIzGV5JsHgzGDkFeHEXKVoFGD9JKVIJeDSN7V5FUDErKVcBsHEFqZuF7HkNmZ1BqHAvOV5BODuNKVkXeDWB7DoX7VQXsH9NUD1NKD5JeHurYVcFeHEXCVoBOHQNGZSJeDSvsHQX7HgvsHEFiDWB7VoBqDkXOH9X7HAzGD5BqDENOV9NiDuXCDoFUHkBqZSFaHINOD5FUDMN7VkJGDEFYVoBODcJwZSX7Z1zGVWJwDuvODkB/V5B7VENUVQXOZ1BqDSrwVWBOHuveHEJ3H5F/ZuJwD9XGZ9JwDSzGD5BqDMvmV9NiDWJeVENUHQBiZ1BqDSrwVWBOHuveHEJ3H5X/HIJsHQXODQNUD1NaHQrqH9BYV9FiDEX/HMraDcBwZ1FUHAzGHuBOHgvsHErCDWB7VoBqDkXOH9X7HAzGVWBOVgNKDkBs";
   }
// 
}
//===============================================================================
//
class app_LiderPista_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'     => '',
                                  'param'      => array(),
                                  'autoComp'   => '',
                                  'rsSize'     => '',
                                  'msgDisplay' => '',
                                  'errList'    => array(),
                                  'fldList'    => array());
   var $grid;
   var $det;
   var $pesq;
   var $pdf;
   var $xls;
   var $xml;
   var $csv;
   var $rtf;
//
//----- Preparação dos módulos
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }
//
//----- Controle da aplicação
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $NMSC_conf_apl, $NM_contr_var_session,
      $glo_senha_protect, $nmgp_opcao, $nm_call_php;

      if ($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
      { 
          if (!empty($GLOBALS["nmgp_parms"])) 
          { 
              $GLOBALS["nmgp_parms"] = str_replace("@aspass@", "'", $GLOBALS["nmgp_parms"]);
              $todo = explode("?@?", $GLOBALS["nmgp_parms"]);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   nm_limpa_str_app_LiderPista($cadapar[1]);
                   $$cadapar[0] = $cadapar[1];
              }
          } 
      } 
      if (!$this->Ini) 
      { 
          $this->Ini = new app_LiderPista_ini(); 
          $this->Ini->init();
      } 
      if ($this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['trial_version'] = 'N';
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "app_LiderPista.php" ; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
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
      $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['pdf_res'] = false;
      if ($nmgp_opcao == 'pdf_res')
      {
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['pdf_res'] = true;
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opcao'] = 'pdf';
          $nmgp_opcao = 'pdf';
      }
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_tipo']))
      {
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_tipo']        = 1;
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_larg']        = 512;
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_alt']         = 384;
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_margem']      = 10;
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_aspec']       = 'S';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_preencher']   = 'N';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_exibe_val']   = 'S';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_exibe_marcas'] = 'N';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_cor_fundo']   = '';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_cor_margens'] = '';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_cor_label']   = '';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_cor_valores'] = '';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_tipo_marcas'] = 'Q';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_permitidos']  = '1,4,2,5,3,8,6,7,20,21,26,27,28,29';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_opc_graf']    = '3';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_angulo']      = '45';
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['graf_opc_atual']   = '2';
      }
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_init']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_label']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida_treeview'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
      { 
          $_SESSION['scriptcase']['bg_cab_popup']    = "";
          $_SESSION['scriptcase']['bg_img_popup']    = "";
          $_SESSION['scriptcase']['bg_color_popup']  = $this->Ini->cor_bg_grid;
          $_SESSION['scriptcase']['bg_barra_popup']  = $this->Ini->cor_barra_nav;
          $_SESSION['scriptcase']['bg_txtcab_popup'] = "<FONT size=\"" . $this->Ini->titulo_fonte_tamanho . "\" color=\"" . $this->Ini->cor_txt_titulo . "\" face=\"" . $this->Ini->titulo_fonte_tipo . "\">";
          if ("" != $this->Ini->cor_titulo) 
          {
             $_SESSION['scriptcase']['bg_cab_popup'] = "bgcolor=\"" . $this->Ini->cor_titulo . "\""; 
          }
          if ("" != $this->Ini->img_fun_tit) 
          {
              $_SESSION['scriptcase']['bg_img_popup'] = "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_tit . "\""; 
          }
          $img_lin_popup = ("" != $this->Ini->img_fun_imp) ? ("background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_imp . "\"") : "";
          $_SESSION['scriptcase']['bg_linhaI_popup']   = $img_lin_popup . " bgcolor=\"" . $this->Ini->cor_grid_impar . "\""; 
          $_SESSION['scriptcase']['font_linhaI_popup'] = "<FONT size=\"" . $this->Ini->texto_fonte_tamanho_impar . "\" color=\"" . $this->Ini->cor_txt_grid_impar . "\" face=\"" . $this->Ini->texto_fonte_tipo_impar . "\">
"; 
          $img_lin_popup = ("" != $this->Ini->img_fun_par) ? ("background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_par . "\"") : "";
          $_SESSION['scriptcase']['bg_linhaP_popup']   = $img_lin_popup . " bgcolor=\"" . $this->Ini->cor_grid_par . "\""; 
          $_SESSION['scriptcase']['font_linhaP_popup'] = "<FONT size=\"" . $this->Ini->texto_fonte_tamanho_par . "\" color=\"" . $this->Ini->cor_txt_grid_par . "\" face=\"" . $this->Ini->texto_fonte_tipo_par . "\">
"; 
          $_SESSION['scriptcase']['bg_cssbtn_popup'] = "";
          $_SESSION['scriptcase']['bg_btn_popup'] = $this->Ini->path_botoes . "/nm_scriptcase3_green";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order'][] = "lider";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order'][] = "pista";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order'][] = "nota_media";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order'][] = "resultado_medio";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order'][] = "total_nota";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['field_order'][] = "total_resultado";
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderPista']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_LiderPista']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['scriptcase']['sc_apl_conf']['app_LiderPista']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      if (!class_exists("Services_JSON"))
      {
          include_once("app_LiderPista_json.php");
      }
      include_once($this->Ini->path_libs . "/nm_data.class.php");
      include_once($this->Ini->path_libs . "/nm_gc.php");
      nm_gc($this->Ini->path_libs);
      include_once($this->Ini->path_libs . "/nm_conv_dados.php") ; 
      include_once($this->Ini->path_libs . "/nm_edit.php");  
      $this->nm_data = new nm_data("pt_br");
      $_SESSION['scriptcase']['sc_tab_meses']['pt_br']['int'] = array("Janeiro", "Fevereiro", "Mar&ccedil;o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
      $_SESSION['scriptcase']['sc_tab_meses']['pt_br']['abr'] = array("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
      $_SESSION['scriptcase']['sc_tab_dias']['pt_br']['int'] = array("Domingo", "Segunda", "Ter&ccedil;a", "Quarta", "Quinta", "Sexta", "S&aacute;bado");
      $_SESSION['scriptcase']['sc_tab_dias']['pt_br']['abr'] = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
      $_SESSION['scriptcase']['sc_htmldoc_Version'] = "htmldocd";
      if(file_exists($this->Ini->path_third . "/htmldoc/htmldoc26") || file_exists($this->Ini->path_third . "/htmldoc/htmldoc26.exe"))
      {
         $_SESSION['scriptcase']['sc_htmldoc_Version'] = "htmldoc26";
      } 
      elseif(file_exists($this->Ini->path_third . "/htmldoc/htmldoc25") || file_exists($this->Ini->path_third . "/htmldoc/htmldoc25.exe"))
      {
         $_SESSION['scriptcase']['sc_htmldoc_Version'] = "htmldoc25";
      } 
      elseif(file_exists($this->Ini->path_third . "/htmldoc/htmldoc24") || file_exists($this->Ini->path_third . "/htmldoc/htmldoc24.exe"))
      {
         $_SESSION['scriptcase']['sc_htmldoc_Version'] = "htmldoc24";
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['pt_br'] = array('titulo' => "Configura&ccedil;&atilde;o do PDF", 'tp_imp' => "Tipo da impress&atilde;o", 'color' => "Colorida", 'econm' => "Economica", 'tp_pap' => "Tipo do papel", 'carta' => "Carta", 'oficio' => "Oficio", 'customiz' => "Customizado", 'alt_papel' => "Altura", 'larg_papel' => "Largura", 'orient' => "Orienta&ccedil;&atilde;o", 'retrato' => "Retrato", 'paisag' => "Paisagem", 'book' => "Gerar Book Marks", 'grafico' => "Exibir Gr&aacute;ficos", 'largura' => "Resolu&ccedil;&atilde;o da página em Pixels", 'fonte' => "Resolu&ccedil;&atilde;o da fonte", 'sim' => "Sim", 'nao' => "N&atilde;o", 'cancela' => "Cancelar");
      } 
      $_SESSION['scriptcase']['sc_idioma_graf'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf']['pt_br'] = array('titulo' => "Configura&ccedil;&atilde;o dos Gr&aacute;ficos", 'tipo_g' => "Tipo do Gr&aacute;fico", 'tp_barra' => "Barra/Vertical", 'tp_bar_horiz' => "Barra/Horizontal", 'tp_linha' => "Linha/Vertical", 'tp_lin_horiz' => "Linha/Horizontal", 'tp_pizza_abs' => "Pizza/Absoluto", 'tp_pizza_per' => "Pizza/Porcentagem", 'tp_renda' => "Renda/Vertical", 'tp_renda_horiz' => "Renda/Horizontal", 'tp_pizza3d_abs' => "Pizza 3D/Absoluto", 'tp_pizza3d_per' => "Pizza 3D/Porcentagem", 'tp_impulse' => "Impulsos/Vertical", 'tp_impulse_horiz' => "Impulsos/Horizontal", 'tp_scatter' => "Disperso/Vertical", 'tp_scatter_horiz' => "Disperso/Horizontal", 'largura' => "Largura em Pixels", 'altura' => "Altura em Pixels", 'margem' => "Margem em Pixels", 'aspecto' => "Manter Aspecto", 'preencher' => "Preencher espa&ccedil;os", 'exibe_val' => "Exibir valores", 'exibe_marcas' => "Exibir marcas", 'cor_fundo' => "Cor de fundo", 'cor_margens' => "Cor margens", 'cor_label' => "Cor labels", 'cor_valores' => "Cor valores", 'tipo_marcas' => "Tipo marcas", 'quadrado' => "Quadrado", 'circulo' => "Circulo", 'trianguloU' => "Triangulo acima", 'trianguloD' => "Triangulo abaixo", 'lozangulo' => "Lozangulo", 'estrela' => "Estrela", 'modo_gera' => "Modo gera&ccedil;&atilde;o", 'sintetico' => "Sint&eacute;tico", 'analitico' => "Anal&iacute;tico", 'angulo' => "Angulo dos valores", 'sim' => "Sim", 'nao' => "N&atilde;o", 'cancela' => "Cancelar");
      if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['pt_br'] = array('titulo' => "Configura&ccedil;&atilde;o da Impress&atilde;o", 'modoimp' => "Imprimir", 'curr' => "P&aacute;gina Corrente", 'total' => "Relat&oacute;rio Completo", 'cor' => "Tipo Cor", 'pb' => "Preto e Branco", 'color' => "Colorido", 'cancela' => "Cancelar");
      } 
      $this->Ini->exec_magick = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      $sc_GD_version = "";
      if (function_exists("gd_info"))
      {
          $sc_info_GD = gd_info();
          if (isset($sc_info_GD['GD Version']))
          {
             $pos_Temp = strpos($sc_info_GD['GD Version'], "(");
             if ($pos_Temp)
             {
                 $sc_GD_version = substr($sc_info_GD['GD Version'], $pos_Temp + 1, 3);
             }
             elseif (!empty($sc_info_GD['GD Version']))
             {
                 $pos_Temp = strpos($sc_info_GD['GD Version'], " ");
                 $sc_GD_version = substr($sc_info_GD['GD Version'], 0, $pos_Temp);
             }
             if ($sc_GD_version >= 2)
             {
                 include_once($this->Ini->path_libs . "/nm_trata_img.php");
                 $this->Ini->exec_magick = false;
             }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] = "inicio" ;  
      }   
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderPista']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_LiderPista']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] = "busca";
          }   
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opc_liga']['inicial'];
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['print_all'] = true;
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['trial_version'] = "N";
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if (!$this->Db)
      { 
          if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao']))
          { 
              $this->Db = db_conect_devel($_SESSION['scriptcase']['app_LiderPista']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'SISTEMA'); 
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
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->ini->nm_tpbanco), $this->ini->nm_bases_postgres))
      {
          $this->db->Execute("SET DATESTYLE TO ISO");
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_erro.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "app_LiderPista_erro.class.php"); 
      } 
      $this->Erro      = new app_LiderPista_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "app_LiderPista_lookup.class.php"); 
      } 
      $this->Lookup       = new app_LiderPista_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['prim_cons'] = false;  
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))  
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig'] = "";  
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_pesq_salvo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_pesq_filtro'] = "";
      } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['where_pesq_filtro'];
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
      {
         include_once($this->Ini->path_libs . "/nm_trata_saida.php");
         $nm_saida = new nm_trata_saida();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_app_LiderPista_html_" . session_id() . "_2.html";
            $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "_app_LiderPista";
            $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base . ".pdf";
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_app_LiderPista_html_" . session_id() . ".html";
            $nm_saida->seta_arquivo($nm_arquivo_de_saida);
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_xls.class.php"); 
          } 
          $this->xls  = new app_LiderPista_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "xls_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_res_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_res_xls.class.php"); 
          } 
          $this->xls  = new app_LiderPista_res_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_xml.class.php"); 
          } 
          $this->xml  = new app_LiderPista_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "xml_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_res_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_res_xml.class.php"); 
          } 
          $this->xml  = new app_LiderPista_res_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_csv.class.php"); 
          } 
          $this->csv  = new app_LiderPista_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "csv_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_res_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_res_csv.class.php"); 
          } 
          $this->csv  = new app_LiderPista_res_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_rtf.class.php"); 
          } 
          $this->rtf  = new app_LiderPista_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "rtf_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_res_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_res_rtf.class.php"); 
          } 
          $this->rtf  = new app_LiderPista_res_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_grafico.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "app_LiderPista_grafico.class.php"); 
          } 
          $this->Graf  = new app_LiderPista_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'], 8));
          }
          else
          { 
              $this->Graf->monta_grafico();
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] = "grid";
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "busca")  
      { 
          require_once($this->Ini->path_aplicacao . "app_LiderPista_pesq.class.php"); 
          $this->pesq  = new app_LiderPista_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->NM_ajax_retorno = $this->NM_ajax_retorno;
          $this->pesq->NM_ajax_info    = $this->NM_ajax_info;
          $this->pesq->monta_busca();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "print" && $nmgp_tipo_print == "RC")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "detalhe")  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_det.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "app_LiderPista_det.class.php"); 
              } 
              $this->det  = new app_LiderPista_det();
              $this->prep_modulos("det");
              $this->det->monta_det();
          } 
          else  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "app_LiderPista/app_LiderPista_grid.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "app_LiderPista_grid.class.php"); 
              } 
              $this->grid  = new app_LiderPista_grid();
              $this->prep_modulos("grid");
              $this->grid->monta_grid($linhas);
          } 
      }   
//--- Fecha Conexão
      if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
      {
           $this->Db->Close(); 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['embutida'])
      {
         $nm_saida->finaliza();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            chdir($this->Ini->path_third . "/htmldoc");
            $opsys  = strtolower(php_uname());
            $str_cl = (FALSE !== strpos($opsys, 'windows')) ? '' : './';
            $str_execcmd  = $str_cl . $_SESSION['scriptcase']['sc_htmldoc_Version'];
            $str_execcmd .= (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " -f \"$nm_arquivo_pdf_serv\"" : " -f $nm_arquivo_pdf_serv";
            $str_execcmd .= " --permissions modify --permissions print";
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_execcmd .= $nmgp_parms_pdf;
            }
            else
            {
                $str_execcmd .= "  -t pdf14 --book --tocomitted --no-title --quiet --header ... --charset iso-8859-1 --footer ..1 --portrait --browserwidth 800 --fontsize 10 --size letter";
            }
            if ($GLOBALS['nmgp_tipo_pdf'] != "pb")
            {
                $str_execcmd .= " --bodycolor \"" . $this->Ini->cor_bg_grid . "\" ";
            }
            else
            {
                $str_execcmd .= " --bodycolor \"#FFFFFF\" ";
            }
            if($_SESSION['scriptcase']['sc_htmldoc_Version'] != "htmldocd")
            {
               putenv ("HTMLDOC_NOCGI=yes");
               $str_execcmd .= " --getcurrentpath ";
            }
            if (isset($_GET['pbfile']))
            {
                $str_execcmd .= " --nmlog ";
                $str_execcmd .= (FALSE !== strpos($_GET['pbfile'],  ' ')) ? "\"" . $_GET['pbfile'] . "\"" : $_GET['pbfile'];
            }
            $str_execcmd .= (FALSE !== strpos($nm_arquivo_de_saida, ' ')) ? " \"$nm_arquivo_de_saida\"" : " $nm_arquivo_de_saida";
            if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
            {
                fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1) . "_#NM#_Gerando PDF...\n");
                fclose($this->grid->progress_fp);
            }
            exec($str_execcmd, $arr_execcmd);
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_pdf_base . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fclose($fp);
            }
            if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
            {
                $this->grid->progress_fp = fopen($_GET['pbfile'], 'a');
                if ($this->grid->progress_fp)
                {
                    fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_PDF finalizado....\n");
                    fwrite($this->grid->progress_fp, "off\n");
                    fclose($this->grid->progress_fp);
                }
            }
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if ($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['pdf_res'])
{
  $NM_volta  = "resumo";
  $NM_target = "_self";
?>
<HTML>
<HEAD>
 <TITLE>Relatório das Notas do Líder por Pista :: PDF</TITLE>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
</HEAD>
<BODY bgcolor="<?php echo $this->Ini->cor_bg_grid; ?>" <?php if ("" != $this->Ini->img_fun_pag) { echo "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_pag . "\""; } ?>>
<FONT face="<?php echo $this->Ini->pag_fonte_tipo; ?>" color="<?php echo $this->Ini->cor_txt_pag; ?>" size="<?php echo $this->Ini->pag_fonte_tamanho; ?>">
<?php
}
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <table><tr><td><font color="FF0000"><b>O Arquivo no formato pdf n&atilde;o pode ser gerado. Contate o administrador do sistema.<br>Para maiores informa&ccedil;&otilde;es, consulte: <a href="http://www.scriptcase.com.br/site/support/htmldoc_pt_br.html" target="_blank">www.scriptcase.com.br/site/support/htmldoc_pt_br.html</a> </b></font></td></tr></table>
<?php
}
else
{
?>
O arquivo contendo o PDF foi gerado em:
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank"><FONT color="<?php echo $this->Ini->cor_link_pag; ?>"><B><?php echo $nm_arquivo_pdf_url; ?></B></FONT></A>.
<BR>
Click no link para visualiza-lo ou use o bot&atilde;o direito, para salva-lo localmente.
<BR>
<?php
}
?>
<input type="image" name="sc_b_sai" onclick="document.F0.submit()" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bvoltar.gif" title="Retornar" align="absmiddle"/> 
<FORM name="F0" method=post action="app_LiderPista.php" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo $NM_volta; ?>"> 
</FORM>
</FONT>
</BODY>
</HTML>
<?php
         }
      }
   } 
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
} 
// 
//======= Controle inicial da aplicação=========================
    $_SESSION['scriptcase']['app_LiderPista']['contr_erro'] = 'off';
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            nm_limpa_str_app_LiderPista($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            nm_limpa_str_app_LiderPista($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }

    if (isset($_POST['rs']) && strpos($_POST['rs'], '_ajax_') !== false && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('app_LiderPista_ajax_save_filter' == $_POST['rs'])
        {
            $lider_cond = $_POST['rsargs'][0];
            $lider = $_POST['rsargs'][1];
            $pista_cond = $_POST['rsargs'][2];
            $pista = $_POST['rsargs'][3];
            $nota_media_cond = $_POST['rsargs'][4];
            $nota_media = $_POST['rsargs'][5];
            $resultado_medio_cond = $_POST['rsargs'][6];
            $resultado_medio = $_POST['rsargs'][7];
            $total_nota_cond = $_POST['rsargs'][8];
            $total_nota = $_POST['rsargs'][9];
            $total_resultado_cond = $_POST['rsargs'][10];
            $total_resultado = $_POST['rsargs'][11];
            $nmgp_save_name = $_POST['rsargs'][12];
            $NM_operador = $_POST['rsargs'][13];
            $script_case_init = $_POST['rsargs'][14];
            $bprocessa = $_POST['rsargs'][15];
        }
        if ('app_LiderPista_ajax_change_filter' == $_POST['rs'])
        {
            $NM_filters = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
            $bprocessa = $_POST['rsargs'][2];
        }
        if ('app_LiderPista_ajax_delete_filter' == $_POST['rs'])
        {
            $NM_filters_del = $_POST['rsargs'][0];
            $script_case_init = $_POST['rsargs'][1];
            $bprocessa = $_POST['rsargs'][2];
        }
        $nmgp_opcao = "busca";
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
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida']) && $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['app_LiderPista']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['app_LiderPista']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['app_LiderPista']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 1000);
   }
   $_POST['script_case_init'] = $script_case_init;
   $salva_emb    = false;
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
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
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "app_LiderPista";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'app_LiderPista' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
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
        $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'] = $salva_emb;
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" || !isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['b_sair']))
   {
       $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'app_LiderPista')
   {
       $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/app_LiderPista_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida = (isset($_SESSION['scriptcase']['sc_url_saida'])) ? $_SESSION['scriptcase']['sc_url_saida'] : "";
   if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opcao'] = $nmgp_opcao ;  
       }   
       if (!empty($nmgp_parms)) 
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
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                nm_limpa_str_app_LiderPista($cadapar[1]);
                $$cadapar[0] = $cadapar[1];
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['b_sair'] = false;
           }   
       } 
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan'] = true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'] = $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['volta_redirect_tp'] = "";
           $nm_url_saida = "app_LiderPista_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan'])
           {
               $nm_url_saida = "app_LiderPista_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['retorno_cons']  . "?script_case_init=" . $script_case_init;  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'] = $nm_url_saida; 
               $nm_url_saida = "app_LiderPista_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opcao'] != "pdf" ) 
       { 
            $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['menu_desenv'] = true;   
       } 
       if (isset($_GET["nmgp_parms_ret"])) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opc_psq'] = true ;   
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opc_psq'] = false ;   
       } 
       if ($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['opc_psq'])
       {
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_LiderPista']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_app_LiderPista = new app_LiderPista_apl();

      if (!isset($_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'])
      { 
          include_once(dirname(__FILE__) . '/app_LiderPista_sajax.php');
          $sajax_request_type = "POST";
          sajax_init();
      }
    //$sajax_debug_mode = 1;
    sajax_export("app_LiderPista_ajax_save_filter");
    sajax_export("app_LiderPista_ajax_change_filter");
    sajax_export("app_LiderPista_ajax_delete_filter");
    sajax_handle_client_request();

       $contr_app_LiderPista->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['app_LiderPista']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_app_LiderPista = new app_LiderPista_apl();
       $contr_app_LiderPista->controle();
   } 
//
   function nm_limpa_str_app_LiderPista(&$str)
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

    function app_LiderPista_ajax_save_filter($lider_cond, $lider, $pista_cond, $pista, $nota_media_cond, $nota_media, $resultado_medio_cond, $resultado_medio, $total_nota_cond, $total_nota, $total_resultado_cond, $total_resultado, $nmgp_save_name, $NM_operador, $script_case_init, $bprocessa)
    {
        global $contr_app_LiderPista;
        register_shutdown_function("app_LiderPista_nm_return_ajax");
        $contr_app_LiderPista->NM_ajax_flag          = true;
        $contr_app_LiderPista->NM_ajax_opcao         = 'save_filter';
        $contr_app_LiderPista->NM_ajax_info['param'] = array(
                  'lider_cond' => $lider_cond,
                  'lider' => $lider,
                  'pista_cond' => $pista_cond,
                  'pista' => $pista,
                  'nota_media_cond' => $nota_media_cond,
                  'nota_media' => $nota_media,
                  'resultado_medio_cond' => $resultado_medio_cond,
                  'resultado_medio' => $resultado_medio,
                  'total_nota_cond' => $total_nota_cond,
                  'total_nota' => $total_nota,
                  'total_resultado_cond' => $total_resultado_cond,
                  'total_resultado' => $total_resultado,
                  'nmgp_save_name' => $nmgp_save_name,
                  'NM_operador' => $NM_operador,
                  'script_case_init' => $script_case_init,
                  'bprocessa' => $bprocessa,
                 );
        $contr_app_LiderPista->controle();
        exit;
    } // ajax_save_filter

    function app_LiderPista_ajax_change_filter($NM_filters, $script_case_init, $bprocessa)
    {
        global $contr_app_LiderPista;
        register_shutdown_function("app_LiderPista_nm_return_ajax");
        $contr_app_LiderPista->NM_ajax_flag          = true;
        $contr_app_LiderPista->NM_ajax_opcao         = 'change_filter';
        $contr_app_LiderPista->NM_ajax_info['param'] = array(
                  'NM_filters' => $NM_filters,
                  'script_case_init' => $script_case_init,
                  'bprocessa' => $bprocessa,
                 );
        $contr_app_LiderPista->controle();
        exit;
    } // ajax_change_filter

    function app_LiderPista_ajax_delete_filter($NM_filters_del, $script_case_init, $bprocessa)
    {
        global $contr_app_LiderPista;
        register_shutdown_function("app_LiderPista_nm_return_ajax");
        $contr_app_LiderPista->NM_ajax_flag          = true;
        $contr_app_LiderPista->NM_ajax_opcao         = 'delete_filter';
        $contr_app_LiderPista->NM_ajax_info['param'] = array(
                  'NM_filters_del' => $NM_filters_del,
                  'script_case_init' => $script_case_init,
                  'bprocessa' => $bprocessa,
                 );
        $contr_app_LiderPista->controle();
        exit;
    } // ajax_delete_filter

    function app_LiderPista_nm_return_ajax()
    {
        global $contr_app_LiderPista;
        $contr_app_LiderPista->NM_ajax_flag    = $contr_app_LiderPista->pesq->NM_ajax_flag;
        $contr_app_LiderPista->NM_ajax_opcao   = $contr_app_LiderPista->pesq->NM_ajax_opcao;
        $contr_app_LiderPista->NM_ajax_retorno = $contr_app_LiderPista->pesq->NM_ajax_retorno;
        $contr_app_LiderPista->NM_ajax_info    = $contr_app_LiderPista->pesq->NM_ajax_info;
        app_LiderPista_pack_ajax_response();
    }

   function app_LiderPista_pack_ajax_response()
   {
      global $contr_app_LiderPista;
      $aResp = array();
      if ('' != $contr_app_LiderPista->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($contr_app_LiderPista->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($contr_app_LiderPista->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($contr_app_LiderPista->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($contr_app_LiderPista->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $contr_app_LiderPista->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $contr_app_LiderPista->NM_ajax_info['newline'];
      }
      else
//-----
      {
         if ('ERROR' == $aResp['result'])
         {
            app_LiderPista_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            app_LiderPista_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            app_LiderPista_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = htmlentities($contr_app_LiderPista->NM_ajax_info['tableRefresh']);
         }
         elseif ('OK' == $aResp['result'])
         {
            app_LiderPista_pack_ajax_ok($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['focus']) && '' != $contr_app_LiderPista->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $contr_app_LiderPista->NM_ajax_info['focus'];
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['closeLine']) && '' != $contr_app_LiderPista->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $contr_app_LiderPista->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['masterValue']) && '' != $contr_app_LiderPista->NM_ajax_info['masterValue'])
         {
            app_LiderPista_pack_master_value($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['redir']) && !empty($contr_app_LiderPista->NM_ajax_info['redir']))
         {
            app_LiderPista_pack_ajax_redir($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['blockDisplay']) && !empty($contr_app_LiderPista->NM_ajax_info['blockDisplay']))
         {
            app_LiderPista_pack_ajax_block_display($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['fieldDisplay']) && !empty($contr_app_LiderPista->NM_ajax_info['fieldDisplay']))
         {
            app_LiderPista_pack_ajax_field_display($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['fieldLabel']) && !empty($contr_app_LiderPista->NM_ajax_info['fieldLabel']))
         {
            app_LiderPista_pack_ajax_field_label($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['readOnly']) && !empty($contr_app_LiderPista->NM_ajax_info['readOnly']))
         {
            app_LiderPista_pack_ajax_readonly($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['navStatus']) && !empty($contr_app_LiderPista->NM_ajax_info['navStatus']))
         {
            app_LiderPista_pack_ajax_nav_status($aResp);
         }
         if (isset($contr_app_LiderPista->NM_ajax_info['btnVars']) && !empty($contr_app_LiderPista->NM_ajax_info['btnVars']))
         {
            app_LiderPista_pack_ajax_btn_vars($aResp);
         }
         $aResp['htmOutput'] = '';
    
         if (isset($contr_app_LiderPista->NM_ajax_info['param']['buffer_output']) && $contr_app_LiderPista->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = app_LiderPista_pack_protect_string(ob_get_contents());
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
   } // app_LiderPista_pack_ajax_response

   function app_LiderPista_pack_ajax_errors(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['errList'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($contr_app_LiderPista->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_app_LiderPista' != $sField)
                       ? $contr_app_LiderPista->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => app_LiderPista_pack_protect_string($sMsg),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // app_LiderPista_pack_ajax_errors

   function app_LiderPista_pack_ajax_ok(&$aResp)
   {
      global $contr_app_LiderPista;
      $iNumLinha = (isset($contr_app_LiderPista->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_app_LiderPista->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => app_LiderPista_pack_protect_string($contr_app_LiderPista->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // app_LiderPista_pack_ajax_ok

   function app_LiderPista_pack_ajax_set_fields(&$aResp)
   {
      global $contr_app_LiderPista;
      $iNumLinha = (isset($contr_app_LiderPista->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_app_LiderPista->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $contr_app_LiderPista->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $contr_app_LiderPista->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['fldList'] as $sField => $aData)
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
               $aValue['label'] = app_LiderPista_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? app_LiderPista_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => app_LiderPista_pack_protect_string($sOpt),
                                                  'label' => app_LiderPista_pack_protect_string($sLabel));
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
   } // app_LiderPista_pack_ajax_set_fields

   function app_LiderPista_pack_ajax_redir(&$aResp)
   {
      global $contr_app_LiderPista;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_app_LiderPista->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $contr_app_LiderPista->NM_ajax_info['redir'][$sTag];
         }
      }
   } // app_LiderPista_pack_ajax_redir

   function app_LiderPista_pack_master_value(&$aResp)
   {
      global $contr_app_LiderPista;
      foreach ($contr_app_LiderPista->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                          'value' => $sValue);
      }
   } // app_LiderPista_pack_master_value

   function app_LiderPista_pack_ajax_block_display(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['blockDisplay'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // app_LiderPista_pack_ajax_block_display

   function app_LiderPista_pack_ajax_field_display(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['fieldDisplay'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // app_LiderPista_pack_ajax_field_display

   function app_LiderPista_pack_ajax_field_label(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['fieldLabel'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, app_LiderPista_pack_protect_string($sFieldLabel));
      }
   } // app_LiderPista_pack_ajax_field_label

   function app_LiderPista_pack_ajax_readonly(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['readOnly'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // app_LiderPista_pack_ajax_readonly

   function app_LiderPista_pack_ajax_nav_status(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['navStatus'] = array();
      if (isset($contr_app_LiderPista->NM_ajax_info['navStatus']['ret']) && '' != $contr_app_LiderPista->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $contr_app_LiderPista->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($contr_app_LiderPista->NM_ajax_info['navStatus']['ava']) && '' != $contr_app_LiderPista->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $contr_app_LiderPista->NM_ajax_info['navStatus']['ava'];
      }
   } // app_LiderPista_pack_ajax_nav_status

   function app_LiderPista_pack_ajax_btn_vars(&$aResp)
   {
      global $contr_app_LiderPista;
      $aResp['btnVars'] = array();
      foreach ($contr_app_LiderPista->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, app_LiderPista_pack_protect_string($sBtnValue));
      }
   } // app_LiderPista_pack_ajax_btn_vars

   function app_LiderPista_pack_protect_string($sString)
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
   } // app_LiderPista_pack_protect_string
?>
