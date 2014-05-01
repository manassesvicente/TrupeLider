<?php
 @session_start();
 $script_case_init = (isset($_GET['script_case_init'])) ? $_GET['script_case_init'] : "";
 $path_botoes      = (isset($_GET['path_botoes']))      ? $_GET['path_botoes']      : "";
 $apl_dependente   = (isset($_GET['apl_dependente']))   ? $_GET['apl_dependente']   : "";
 $apl_opcao        = (isset($_GET['opcao']))            ? $_GET['opcao']            : "print";
 $apl_tipo_print   = (isset($_GET['tp_print']))         ? $_GET['tp_print']         : "PC";
 $apl_cor_print    = (isset($_GET['cor_print']))        ? $_GET['cor_print']        : "PB";
 $apl_saida        = (isset($_GET['apl_saida']))        ? $_GET['apl_saida']        : "";
?>
<html>
 <head>
  <title>app_Rel :: PRINT</title>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 </head>
 <body bgcolor="#FFFFFF">
  <form name="Fini" method="post" 
        action="app_Rel.php" 
        target="_self"> 
    <input type="hidden" name="nmgp_opcao" value="<?php echo $apl_opcao;?>"/> 
    <input type="hidden" name="nmgp_tipo_print" value="<?php echo $apl_tipo_print;?>"/> 
    <input type="hidden" name="nmgp_cor_print" value="<?php echo $apl_cor_print;?>"/> 
    <input type="hidden" name="nmgp_navegator_print" value=""/> 
    <input type="hidden" name="script_case_init" value="<?php echo $script_case_init ?>"/> 
  </form> 
 <script>
    document.Fini.nmgp_navegator_print.value = navigator.appName;
    document.Fini.submit();
 </script>
 </body>
</html>
