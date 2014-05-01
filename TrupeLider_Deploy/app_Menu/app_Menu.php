<?php
include_once('app_Menu_session.php');
session_start();
$_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] = "/trupe/prod";
$_SESSION['scriptcase']['app_Menu']['glo_nm_perfil']    = "";
$_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] = "";

class app_Menu_class
{
  var $Db;

 function app_Menu_menu()
 {
    global $app_Menu_menuData;
$nm_versao_sc  = "4.00.0008" ; 
$_SESSION['scriptcase']['app_Menu']['contr_erro'] = 'off';
$Campos_Mens_erro = "";
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
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_imag_cab  = $path_link . "_lib/img";
$path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "app_Menu/img";
$nm_img_fun_menu = ""; 
if ($_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
include_once($path_libs . "/nm_data.class.php");
$this->nm_data = new nm_data("pt_br");
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['app_Menu']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['app_Menu']['init']))
{
    $_SESSION['sc_session'][1]['app_Menu']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['app_Menu']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = str_replace("scriptcaseout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("scriptcasein", "?#?", $nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todo = explode("?@?", $nmgp_parms);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       $$cadapar[0] = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . $script_case_init;
    }
}
if (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida']  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_app_Menu'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_app_Menu'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
include_once($path_libs . "/nm_ini_lib.php");
$tab_grupo[0] = "SISTEMA/";
if ($_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] != "S")
{
    $tab_grupo[0] = "";
}

/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['app_Menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'app_Menu')
{
    $_SESSION['sc_session'][1]['app_Menu']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
}
/* Variáveis de Configuração do Menu */
$app_Menu_menuData           = array();
$app_Menu_menuData['iframe'] = TRUE;

/* Cabeçalho HTML */
if ($app_Menu_menuData['iframe'])
{
    $app_Menu_menuData['height'] = '100%';
?>
<html>
<head>
 <title>app_Menu</title>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body style="margin: 0px" scroll="no">
<?php
}
else
{
    $app_Menu_menuData['height'] = '30px';
}

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
if (is_file($path_apls . $tab_grupo[0] . "app_Turmas/app_Turmas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Turmas/app_Turmas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Turmas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Turmas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Turmas'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Grupos/app_Grupos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Grupos/app_Grupos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Grupos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Grupos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Grupos'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Participantes/app_Participantes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Participantes/app_Participantes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Participantes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Participantes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Participantes'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Competencias/app_Competencias_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Competencias/app_Competencias_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Competencias']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Competencias'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Competencias'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Habilidades/app_Habilidades_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Habilidades/app_Habilidades_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Habilidades']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Habilidades'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Habilidades'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Etapas/app_Etapas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Etapas/app_Etapas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Etapas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Etapas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Etapas'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Setup/app_Setup_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Setup/app_Setup_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Setup']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Setup'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Setup'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_ControleNotas/app_ControleNotas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_ControleNotas/app_ControleNotas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_ControleNotas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_ControleNotas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_ControleNotas'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Desempenhos/app_Desempenhos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Desempenhos/app_Desempenhos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Desempenhos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Desempenhos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Desempenhos'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Desempenho/app_Desempenho_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Desempenho/app_Desempenho_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Desempenho']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Desempenho'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Desempenho'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_LiderCompetencias/app_LiderCompetencias_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_LiderCompetencias/app_LiderCompetencias_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderCompetencias']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_LiderCompetencias'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_LiderCompetencias'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_GrupoCompetencia/app_GrupoCompetencia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_GrupoCompetencia/app_GrupoCompetencia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_GrupoCompetencia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_GrupoCompetencia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_GrupoCompetencia'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_LiderPista/app_LiderPista_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_LiderPista/app_LiderPista_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPista']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_LiderPista'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_LiderPista'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_GrupoPista/app_GrupoPista_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_GrupoPista/app_GrupoPista_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_GrupoPista']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_GrupoPista'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_GrupoPista'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_LiderPistaCompetencia/app_LiderPistaCompetencia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_LiderPistaCompetencia/app_LiderPistaCompetencia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompetencia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompetencia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompetencia'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_LiderPistaCompHab/app_LiderPistaCompHab_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_LiderPistaCompHab/app_LiderPistaCompHab_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompHab']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompHab'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompHab'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_ParticipantePistaCompetencia/app_ParticipantePistaCompetencia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_ParticipantePistaCompetencia/app_ParticipantePistaCompetencia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_ParticipantePistaCompetencia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_ParticipantePistaCompetencia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_ParticipantePistaCompetencia'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_PartPistaCompHab/app_PartPistaCompHab_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_PartPistaCompHab/app_PartPistaCompHab_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_PartPistaCompHab']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_PartPistaCompHab'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_PartPistaCompHab'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_LiderResultado/app_LiderResultado_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_LiderResultado/app_LiderResultado_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderResultado']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_LiderResultado'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_LiderResultado'] = "on";
    } 
}
if (is_file($path_apls . $tab_grupo[0] . "app_Rel/app_Rel_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $tab_grupo[0] . "app_Rel/app_Rel_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Rel']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Rel'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Rel'] = "on";
    } 
}

/* Definição dos Caminhos */
$app_Menu_menuData['path']         = array();
$app_Menu_menuData['url']          = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $app_Menu_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $app_Menu_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $app_Menu_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $app_Menu_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$app_Menu_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$app_Menu_menuData['url']['web']   = str_replace("\\", '/', $app_Menu_menuData['url']['web']);
$app_Menu_menuData['url']['web']   = str_replace('//', '/', $app_Menu_menuData['url']['web']);
$app_Menu_menuData['path']['root'] = substr($app_Menu_menuData['path']['sys'],  0, -1 * strlen($app_Menu_menuData['url']['web']));
$app_Menu_menuData['path']['app']  = substr($app_Menu_menuData['path']['sys'],  0, strrpos($app_Menu_menuData['path']['sys'],  '/'));
$app_Menu_menuData['path']['link'] = substr($app_Menu_menuData['path']['app'],  0, strrpos($app_Menu_menuData['path']['app'],  '/'));
$app_Menu_menuData['path']['link'] = substr($app_Menu_menuData['path']['link'], 0, strrpos($app_Menu_menuData['path']['link'], '/')) . '/';
$app_Menu_menuData['path']['app'] .= '/';
$app_Menu_menuData['url']['app']   = substr($app_Menu_menuData['url']['web'],  0, strrpos($app_Menu_menuData['url']['web'],  '/'));
$app_Menu_menuData['url']['link']  = substr($app_Menu_menuData['url']['app'],  0, strrpos($app_Menu_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] == "S")
{
    $app_Menu_menuData['url']['link']  = substr($app_Menu_menuData['url']['link'], 0, strrpos($app_Menu_menuData['url']['link'], '/'));
}
$app_Menu_menuData['url']['link']  .= '/';
$app_Menu_menuData['url']['app']   .= '/';

/* Itens do Menu */
/* Arquivos JS */
?>
<script language="JavaScript" type="text/javascript" src="<?php echo $_SESSION['nm_menu']['url']; ?>coolmenupro_uncompressed.js"></script>
<?php

/* Folhas de Estilo */
?>
<style type="text/css">
BODY {  }
.css_tabela                      { background-color:#189300; }
.css_fun_cab                     { background-color:#189300; }
.css_cabecalho                   { font-family:Verdana, Arial, sans-serif;font-size:12px;color:#FFFFFF;font-weight:bold; }
.css_menu_item                   { padding:3px 10px 3px 3px;font-family:Verdana, Arial, sans-serif;font-size:12px;color:#FFFFFF;background-color:#189300; }
.css_menu_item_disabled          { padding:3px 10px 3px 3px;font-family:Verdana, Arial, sans-serif;font-size:12px;color:#C0C0C0;background-color:#189300; }
.css_menu_item_over              { padding:3px 10px 3px 3px;font-family:Verdana, Arial, sans-serif;font-size:12px;color:#189300;background-color:#F0FEED; }
.css_sub_menu_item               { padding:3px 10px 3px 3px;font-family:Verdana, Arial, sans-serif;font-size:12px;color:#FFFFFF;background-color:#45C42D; }
.css_sub_menu_item_disabled      { padding:3px 10px 3px 3px;font-family:Verdana, Arial, sans-serif;font-size:12px;color:#C0C0C0;background-color:#45C42D; }
.css_sub_menu_item_over          { padding:3px 10px 3px 3px;font-family:Verdana, Arial, sans-serif;font-size:12px;color:#189300;background-color:#F0FEED; }
</style>
<?php

$app_Menu_menuData['data'] = "";
$app_Menu_menuData['data'] .= "item_1|.|Cadastros|||scriptcase__NM__database.gif|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Turmas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Turmas']) == "on")
{
    $app_Menu_menuData['data'] .= "item_2|..|Turmas|app_Menu_form_php.php?sc_item_menu=item_2&sc_apl_menu=app_Turmas&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_2|..|Turmas||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Grupos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Grupos']) == "on")
{
    $app_Menu_menuData['data'] .= "item_3|..|Grupos|app_Menu_form_php.php?sc_item_menu=item_3&sc_apl_menu=app_Grupos&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_3|..|Grupos||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Participantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Participantes']) == "on")
{
    $app_Menu_menuData['data'] .= "item_4|..|Participantes|app_Menu_form_php.php?sc_item_menu=item_4&sc_apl_menu=app_Participantes&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_4|..|Participantes||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Competencias']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Competencias']) == "on")
{
    $app_Menu_menuData['data'] .= "item_5|..|Competências|app_Menu_form_php.php?sc_item_menu=item_5&sc_apl_menu=app_Competencias&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_5|..|Competências||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Habilidades']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Habilidades']) == "on")
{
    $app_Menu_menuData['data'] .= "item_6|..|Habilidades|app_Menu_form_php.php?sc_item_menu=item_6&sc_apl_menu=app_Habilidades&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_6|..|Habilidades||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Etapas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Etapas']) == "on")
{
    $app_Menu_menuData['data'] .= "item_7|..|Pistas|app_Menu_form_php.php?sc_item_menu=item_7&sc_apl_menu=app_Etapas&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_7|..|Pistas||||_self|disabled\n";
}
$app_Menu_menuData['data'] .= "item_8|.|Principal|||scriptcase__NM__brasil.gif|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Setup']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Setup']) == "on")
{
    $app_Menu_menuData['data'] .= "item_9|..|Líderes|app_Menu_form_php.php?sc_item_menu=item_9&sc_apl_menu=app_Setup&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_9|..|Líderes||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_ControleNotas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_ControleNotas']) == "on")
{
    $app_Menu_menuData['data'] .= "item_10|..|Avaliação|app_Menu_form_php.php?sc_item_menu=item_10&sc_apl_menu=app_ControleNotas&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_10|..|Avaliação||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Desempenhos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Desempenhos']) == "on")
{
    $app_Menu_menuData['data'] .= "item_11|..|Desempenhos|app_Menu_form_php.php?sc_item_menu=item_11&sc_apl_menu=app_Desempenhos&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_11|..|Desempenhos||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Desempenho']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Desempenho']) == "on")
{
    $app_Menu_menuData['data'] .= "item_12|..|Desempenho|app_Menu_form_php.php?sc_item_menu=item_12&sc_apl_menu=app_Desempenho&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_12|..|Desempenho||||_self|disabled\n";
}
$app_Menu_menuData['data'] .= "item_13|.|Relatórios||||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderCompetencias']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_LiderCompetencias']) == "on")
{
    $app_Menu_menuData['data'] .= "item_17|..|Líder - Competências|app_Menu_form_php.php?sc_item_menu=item_17&sc_apl_menu=app_LiderCompetencias&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_17|..|Líder - Competências||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_GrupoCompetencia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_GrupoCompetencia']) == "on")
{
    $app_Menu_menuData['data'] .= "item_15|..|Grupos - Competências|app_Menu_form_php.php?sc_item_menu=item_15&sc_apl_menu=app_GrupoCompetencia&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_15|..|Grupos - Competências||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPista']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPista']) == "on")
{
    $app_Menu_menuData['data'] .= "item_18|..|Líder - Pistas|app_Menu_form_php.php?sc_item_menu=item_18&sc_apl_menu=app_LiderPista&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_18|..|Líder - Pistas||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_GrupoPista']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_GrupoPista']) == "on")
{
    $app_Menu_menuData['data'] .= "item_16|..|Grupos - Pistas|app_Menu_form_php.php?sc_item_menu=item_16&sc_apl_menu=app_GrupoPista&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_16|..|Grupos - Pistas||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompetencia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompetencia']) == "on")
{
    $app_Menu_menuData['data'] .= "item_19|..|Líder - Competências - Pista|app_Menu_form_php.php?sc_item_menu=item_19&sc_apl_menu=app_LiderPistaCompetencia&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_19|..|Líder - Competências - Pista||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompHab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_LiderPistaCompHab']) == "on")
{
    $app_Menu_menuData['data'] .= "item_21|..|Líder - Competências - Habilidades - Pista|app_Menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=app_LiderPistaCompHab&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_21|..|Líder - Competências - Habilidades - Pista||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_ParticipantePistaCompetencia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_ParticipantePistaCompetencia']) == "on")
{
    $app_Menu_menuData['data'] .= "item_20|..|Participante - Competências - Pista|app_Menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=app_ParticipantePistaCompetencia&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_20|..|Participante - Competências - Pista||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_PartPistaCompHab']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_PartPistaCompHab']) == "on")
{
    $app_Menu_menuData['data'] .= "item_22|..|Participante - Competências - Habilidades - Pista|app_Menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=app_PartPistaCompHab&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_22|..|Participante - Competências - Habilidades - Pista||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_LiderResultado']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_LiderResultado']) == "on")
{
    $app_Menu_menuData['data'] .= "item_23|..|Líder - Resultado|app_Menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=app_LiderResultado&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_23|..|Líder - Resultado||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Rel']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Rel']) == "on")
{
    $app_Menu_menuData['data'] .= "item_14|..|Teste|app_Menu_form_php.php?sc_item_menu=item_14&sc_apl_menu=app_Rel&sc_apl_link=" . urlencode($app_Menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_Menu']['glo_nm_usa_grupo'] . "|||" . $this->app_Menu_target('_self') . "|" . "\n";
}
else
{
    $app_Menu_menuData['data'] .= "item_14|..|Teste||||_self|disabled\n";
}
if (is_file("app_Menu_help.txt"))
{
    $Arq_WebHelp = file("app_Menu_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
               $app_Menu_menuData['data'] .= "item_Help|.|Ajuda|" . $path_help . $Tmp1[1] . "|Ajuda||" . $this->app_Menu_target('_blank') . "|\n";
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['app_Menu']) && !empty($_SESSION['scriptcase']['sc_menu_del']['app_Menu']))
{
    $nivel = 0;
    $arr_saida = array();
    $exclui_menu = false;
    $arr_itens = explode("\n", $app_Menu_menuData['data']);
    foreach ($arr_itens as $cada_menu)
    {
      $parte = explode("|", $cada_menu);
       if (in_array($parte[0], $_SESSION['scriptcase']['sc_menu_del']['app_Menu']))
       {
          $nivel = strlen($parte[1]);
          $exclui_menu = true;
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < strlen($parte[1])))
       { }
       else
       {
          $exclui_menu = false;
          $arr_saida[] = $cada_menu;
       }
    }
    $app_Menu_menuData['data'] = "";
    foreach ($arr_saida as $cada_menu)
    {
        $app_Menu_menuData['data'] .= $cada_menu . "\n";
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['app_Menu']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['app_Menu']))
{
    $disable_menu = false;
    $arr_itens = explode("\n", $app_Menu_menuData['data']);
    $app_Menu_menuData['data'] = "";
    foreach ($arr_itens as $cada_menu)
    {
      $parte = explode("|", $cada_menu);
       if (in_array($parte[0], $_SESSION['scriptcase']['sc_menu_disable']['app_Menu']))
       {
          $nivel = strlen($parte[1]);
          $disable_menu = true;
          $app_Menu_menuData['data'] .= $parte[0] . "|" . $parte[1] . "|" . $parte[2] . "||" . $parte[4] . "|" . $parte[5] . "|_self|disabled\n";
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < strlen($parte[1]))
       { 
          $app_Menu_menuData['data'] .= $parte[0] . "|" . $parte[1] . "|" . $parte[2] . "||" . $parte[4] . "|" . $parte[5] . "|_self|disabled\n";
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
          $app_Menu_menuData['data'] .= $cada_menu . "\n";
       }
    }
}
$arr_itens = explode("\n", $app_Menu_menuData['data']);
$app_Menu_menuData['data'] = "";
foreach ($arr_itens as $cada_menu)
{
  if (!empty($cada_menu))
  {
      $parte = explode("|", $cada_menu);
      $app_Menu_menuData['data'] .= $parte[1] . "|" . $parte[2] . "|" . $parte[3] . "|" . $parte[4] . "|" . $parte[5] . "|" . $parte[6] . "|" . $parte[7] . "\n";
  }
}
/* Objeto do Menu */
?>
<script language="JavaScript">
var css_level_01           = { "ON":"css_menu_item",     "OVER":"css_menu_item_over"};
var css_level_02           = { "ON":"css_sub_menu_item", "OVER":"css_sub_menu_item_over"};
var css_level_03           = { "ON":"css_sub_menu_item", "OVER":"css_sub_menu_item_over"};
var color_level_01         = { "bgON":"#189300",    "bgOVER":"#F0FEED",     "ON":"css_menu_item",     "OVER":"css_menu_item_over"};
var color_level_02         = { "shadow":"#EDFFE1", "bgON":"#45C42D","bgOVER":"#F0FEED", "ON":"css_sub_menu_item", "OVER":"css_sub_menu_item_over"};
var color_level_03         = { "shadow":"#EDFFE1", "bgON":"#45C42D","bgOVER":"#F0FEED", "ON":"css_sub_menu_item", "OVER":"css_sub_menu_item_over"};
var STYLE_01               = { backgroundColor: ["#189300", "#F0FEED"], "color":color_level_01, "css":css_level_01};
var STYLE_02               = { backgroundColor: ["#45C42D", "#F0FEED"], "shadow":2, "color":color_level_02, "css":css_level_02, itemoff:[ '+previousItem-1px', 0 ], ifSeparator:{size:[ 2, '+maxItem' ],backgroundClass:""}};
var STYLE_03               = { backgroundColor: ["#45C42D", "#F0FEED"], "shadow":2, "color":color_level_03, "css":css_level_03, leveloff:[ 0, '+parentItem-1px' ]};
var color_level_01_disable = { "bgON":"#189300",    "bgOVER":"#189300",     "ON":"css_menu_item_disabled",     "OVER":"css_menu_item_disabled"};
var color_level_02_disable = { "shadow":"#EDFFE1", "bgON":"#45C42D","bgOVER":"#45C42D", "ON":"css_sub_menu_item_disabled", "OVER":"css_sub_menu_item_disabled"};
var css_level_01_disable   = { "ON":"css_menu_item_disabled",     "OVER":"css_menu_item_disabled"};
var css_level_02_disable   = { "ON":"css_sub_menu_item_disabled", "OVER":"css_sub_menu_item_disabled"};
var STYLE_01_DISABLE       = { backgroundColor: ["#189300", "#189300"], "color":color_level_01_disable, "css":css_level_01_disable};
var STYLE_02_DISABLE       = { backgroundColor: ["#45C42D", "#45C42D"], "shadow":2, "color":color_level_02_disable, "css":css_level_02_disable, itemoff:[ '+previousItem-1px', 0 ], ifSeparator:{size:[ 2, '+maxItem' ],backgroundClass:""}};
BLANK_IMAGE                = '<?php echo $path_imag_cab; ?>/transparent.png';
<?php
  echo $this->app_Menu_escreveMenu($app_Menu_menuData['data'], $path_imag_cab);
?>
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['pt_br']['int'] = array("Janeiro", "Fevereiro", "Mar&ccedil;o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
$_SESSION['scriptcase']['sc_tab_meses']['pt_br']['abr'] = array("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
$_SESSION['scriptcase']['sc_tab_dias']['pt_br']['int'] = array("Domingo", "Segunda", "Ter&ccedil;a", "Quarta", "Quinta", "Sexta", "S&aacute;bado");
$_SESSION['scriptcase']['sc_tab_dias']['pt_br']['abr'] = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
$nm_data_fixa = date("d/m/Y"); 
?>
<table align="left" class="css_tabela" style="border-collapse: collapse; border-width: 0px; height: 100%; width: 100%">
<tr>
  <td align="left" valign="middle" class="css_menu_item" style="width:100%; height:30">
<script language="JavaScript">
app_Menu_menuObj = new COOLjsMenuPRO("menu1", MENU_APL_01);
app_Menu_menuObj.initTop();
</script>
<?php
/* Controle de Iframe */
if ($app_Menu_menuData['iframe'])
{
?>
  </td>
</tr>
<tr>
  <td style="border-width: 0px; height: 100%; padding: 0px">
<iframe id="iframe_app_Menu" name="app_Menu_iframe" frameborder="0" style="border-width: 0px; height: 100%; background-color:#FFFFFF; width: 100%" src="app_Menu_pag_ini.htm"></iframe>
<?php
}
?>
</td></tr></table>
<?php

/* Rodapé HTML */
if ($app_Menu_menuData['iframe'])
{
?>
<script language="JavaScript">
app_Menu_menuObj.init();
app_Menu_menuObj.show();
</script> 
</body>
</html>
<?php
}

}

/* Controle de Target */
function app_Menu_escreveMenu($str_data, $path_imag_cab)
{
  $arr_data = explode("\n", $str_data);
  $str_menu  = "var MENU_APL_01 = [\n";
  $str_menu .= "{\"pos\":\"relative\", \"itemoff\":[0,'+previousItem+10px'], \"leveloff\":['+parentItem+2px',0], \"size\":[20, '+self'], style: [STYLE_01, STYLE_02 , STYLE_03 ], blankImage:BLANK_IMAGE},\n";
  $str_menu .= $this->app_Menu_escreveMenuRecursive($arr_data, 1, $path_imag_cab);
  $str_menu .= "];\n";
  return $str_menu;
}
function app_Menu_escreveMenuRecursive($arr_data, $nivel_ant, $path_imag_cab)
{
        $str_menu = "";
        $arr_data2 = $arr_data;
        foreach($arr_data as $key => $item)
        {
                //level, label, link, hint, logo, target
                $arr_item = explode("|", $item);
                unset($arr_data2[$key]);
                
                //check childs
                $tem_filhos = false;
                if(isset($arr_data[$key+1]))
                {
                        $arr_item2 = explode("|", $arr_data[$key+1]);
                        if(strlen($arr_item2[0]) > strlen($arr_item[0]))
                        {
                                $tem_filhos = true;
                        }
                }
                
                //same level, write the item
                if($nivel_ant == strlen($arr_item[0]))
                {
                        if(empty($arr_item[4]))
                        {
                            $str_img     = ", format: {\"image\": \"" . $path_imag_cab . "/transparent.png\", \"imgsize\": [16, 16]}";
                        }
                        else{
                            $str_img     = ", format: {\"image\": \"" . $path_imag_cab . "/" . $arr_item[4] . "\", \"imgsize\": [16, 16]}";
                        }
                        
                        if(empty($arr_item[4]))
                        {
                            $str_img_sub = "\"image\": \"" . $path_imag_cab . "/transparent.png\", \"imgsize\": [16, 16], ";
                        }
                        else{
                            $str_img_sub = "\"image\": \"" . $path_imag_cab . "/" . $arr_item[4] . "\", \"imgsize\": [16, 16], ";
                        }
                        
                        $str_link    = empty($arr_item[2])?"":", url:\"" . $arr_item[2] . "\"";
                        //parent, blank, self=iframe
                        $str_target  = empty($arr_item[5])?"":", target:\"" . $this->app_Menu_target($arr_item[5]) . "\"";
                        $str_target  = empty($str_link)?"":$str_target;
                        $str_style   = "";
                        $str_tip     = "";
                        if(isset($arr_item[6]) && $arr_item[6]=="disabled")
                        {
                          if(strlen($arr_item[0])>1)
                          {
                            $str_style   = ", style:STYLE_02_DISABLE";
                          }
                          else
                          {
                            $str_style   = ", style:STYLE_01_DISABLE";
                          }
                        }
                        if(isset($arr_item[3]) && !empty($arr_item[3]))
                        {
                          $str_tip   = ", tip:\"" . $arr_item[3] . "\"";
                        }
                        
                        if(!$tem_filhos)
                        {
                          if($arr_item[1] == "__LINE__")
                          {
                                  $str_menu .= "{},\n";
                          }
                          else
                          {
                                  $str_menu .= "{code:\"". $arr_item[1] ."\"". $str_link ."". $str_target ." ". $str_tip ." ". $str_img ." ". $str_style ."},\n";
                          }
                        }elseif($tem_filhos)
                        {
                                $str_menu .= "{code:\"". $arr_item[1] . "\"". $str_link ."". $str_target ." ". $str_tip .", \"format\":{".$str_img_sub."\"arrow\":\"" . $path_imag_cab . "/arrow_in_new.gif\", \"oarrow\":\"" . $path_imag_cab . "/arrow_out_new.gif\", \"arrsize\":[20,16]},\n";
                                $str_menu .= "sub:[\n";
                                $str_menu .= "{\"itemoff\":[20,0], \"size\":[20,'+maxItem']},\n";
                                $str_menu .= $this->app_Menu_escreveMenuRecursive($arr_data2, strlen($arr_item[0])+1, $path_imag_cab);
                                $str_menu .= "]\n";
                                $str_menu .= "},\n";
                        }
                }
                //change level, break
                elseif($nivel_ant > strlen($arr_item[0]))
                {
                        break;
                }
        }
        
        return $str_menu;
}
function app_Menu_target($str_target)
{
    global $app_Menu_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '';
    }
    elseif ($app_Menu_menuData['iframe'])
    {
        return 'app_Menu_iframe';
    }
    else
    {
        return $str_target;
    }
}

}
$contr_app_Menu = new app_Menu_class;
$contr_app_Menu->app_Menu_menu();

?>
