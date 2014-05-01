<?php
include_once('app_Menu_session.php');
session_start();
class app_Menu_form_php
{
      var $sc_script_name;
      var $nm_location;
   function init()
   {
      $Campos_Mens_erro = "";
      $_SESSION['scriptcase']['app_Menu']['contr_erro'] = 'off';
      $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
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
      $str_path_web  = $_SERVER['PHP_SELF'];
      $str_path_web  = str_replace("\\", '/', $str_path_web);
      $str_path_web  = str_replace('//', '/', $str_path_web);
      $str_root      = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $path_link     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $path_link     = substr($path_link, 0, strrpos($path_link, '/')) . '/';
      $this->nm_location  = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $this->nm_location  = substr($_SERVER['PHP_SELF'], 0, $this->nm_location + 1) ;  
      $this->nm_location .= "app_Menu.php"; 
      $path_imag_cab = $path_link . "_lib/img";
      $path_imag_apl = $str_root . $path_link . "_lib/img";
      $path_libs     = $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . "/lib/php";
      $path_third    = $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . "/third";
      $path_adodb    = $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . "/third/adodb";
      if (isset($_GET['sc_apl_menu']))
      {
          $_SESSION['scriptcase']['sc_usa_grupo']     = $_GET['sc_usa_grupo'];
          $_SESSION['scriptcase']['sc_item_menu']     = $_GET['sc_item_menu'];
          $_SESSION['scriptcase']['sc_apl_menu']      = $_GET['sc_apl_menu'];
          $_SESSION['scriptcase']['sc_apl_menu_link'] = urldecode($_GET['sc_apl_link']);
          $_SESSION['scriptcase']['sc_ult_apl_menu']  = array();
      }
      $this->sc_menu_item   = $_SESSION['scriptcase']['sc_item_menu'];
      $this->sc_script_name = $_SESSION['scriptcase']['sc_apl_menu'];
      $tab_grupo[0] = "SISTEMA/";
      if ($_SESSION['scriptcase']['sc_usa_grupo'] != "S")
      {
          $tab_grupo[0] = "";
      }
      $link_url = false;
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Turmas")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Turmas/app_Turmas.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Grupos")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Grupos/app_Grupos.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Participantes")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Participantes/app_Participantes.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Competencias")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Competencias/app_Competencias.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Habilidades")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Habilidades/app_Habilidades.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Etapas")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Etapas/app_Etapas.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Setup")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Setup/app_Setup.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_ControleNotas")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_ControleNotas/app_ControleNotas.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Desempenhos")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Desempenhos/app_Desempenhos.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Desempenho")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Desempenho/app_Desempenho.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_LiderCompetencias")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_LiderCompetencias/app_LiderCompetencias.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_GrupoCompetencia")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_GrupoCompetencia/app_GrupoCompetencia.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_LiderPista")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_LiderPista/app_LiderPista.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_GrupoPista")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_GrupoPista/app_GrupoPista.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_LiderPistaCompetencia")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_LiderPistaCompetencia/app_LiderPistaCompetencia.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_LiderPistaCompHab")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_LiderPistaCompHab/app_LiderPistaCompHab.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_ParticipantePistaCompetencia")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_ParticipantePistaCompetencia/app_ParticipantePistaCompetencia.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_PartPistaCompHab")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_PartPistaCompHab/app_PartPistaCompHab.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_LiderResultado")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_LiderResultado/app_LiderResultado.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if ($_SESSION['scriptcase']['sc_apl_menu'] == "app_Rel")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $tab_grupo[0] . "app_Rel/app_Rel.php?nm_run_menu=1&nm_apl_menu=app_Menu&script_case_init=1";
      }
      if (!$link_url)
      {
          $pos = strpos($apl_run, "?");
          if ($pos !== false)
          {
              $parms = "";
              $temp = explode("&", substr($apl_run, $pos + 1));
              foreach ($temp as $cada_parm)
              {
                  $parte_parm = explode("=", $cada_parm);
                  $parms .= (!empty($parms)) ? "?@?" . $parte_parm[0] . "?#?" : $parte_parm[0] . "?#?";
                  $parms .= (isset($parte_parm[1])) ? $parte_parm[1] : "";
              }
              $apl_run =  substr($apl_run, 0, $pos);
          }
      }
?>
      <html><body>
        <form name="fmenu" method="post" action="<?php echo $apl_run; ?>">
          <input type=hidden name="nmgp_parms" value="<?php  echo $parms; ?>"> 
          <input type=hidden name="script_case_init" value="1"> 
          <input type=hidden name="nm_run_menu" value="1"> 
          <input type=hidden name="nm_apl_menu" value="app_Menu"> 
        </form>
      <script>
<?php
      if ($link_url)
      {
?>
          window.location='<?php echo $apl_run; ?>'; 
<?php
      }
      else
      {
?>
          document.fmenu.submit();
<?php
      }
?>
      </script>
      </body></html>
<?php
   }
}
$controle = new app_Menu_form_php();
$controle->init();
?>
