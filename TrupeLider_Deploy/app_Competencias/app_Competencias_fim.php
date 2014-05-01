<?php
   include_once('app_Competencias_session.php');
   session_start();

//----- Limpa variável de segurança
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
   if (isset($_SESSION['session_sec_aplicacao']["SISTEMA_____app_Competencias"]))
   {
      unset($_SESSION['session_sec_aplicacao']["SISTEMA_____app_Competencias"]);
   }

   if (isset($_SESSION['session_sec_aplicacao']) && empty($_SESSION['session_sec_aplicacao']))
   {
      unset($_SESSION['session_sec_aplicacao']);
      unset($_SESSION['session_sec_usuario']);
   }
   $fecha_janela = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['app_Competencias']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['app_Competencias']['sc_outra_jan'])
   {
       $fecha_janela = true;
   }
   if ((isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_Competencias']['opc_psq']) && $_SESSION['sc_session'][$script_case_init]['app_Competencias']['opc_psq']) || $fecha_janela)
   {
       nm_limpa_arr_session();
       $saida_final = "window.close()";
?>
<HTML>
<HEAD>
 <TITLE>app_Competencias</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</HEAD>
<BODY>
<SCRIPT LANGUAGE="Javascript">
 <?php echo $saida_final; ?>;
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   elseif (empty($_SESSION['scriptcase']['sc_url_saida']))
   {
           nm_limpa_arr_session();
?>
<HTML>
<HEAD>
 <TITLE>app_Competencias</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</HEAD>
<BODY>
<SCRIPT LANGUAGE="Javascript">
  history.back();
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   else
   {
       nm_limpa_arr_session();
?>
<HTML>
<HEAD>
 <TITLE>app_Competencias</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</HEAD>
<BODY>
<form name="fsai" method="post" action="<?php echo $_SESSION['scriptcase']['sc_url_saida']; ?>">
<input type=hidden name="script_case_init" value="<?php  echo $script_case_init; ?>"> 
</form>
<SCRIPT LANGUAGE="Javascript">
   nm_ver_saida = "<?php echo $_SESSION['scriptcase']['sc_url_saida']; ?>";
   nm_ver_saida = nm_ver_saida.toLowerCase();
   if (nm_ver_saida.substr(0, 4) != ".php" && (nm_ver_saida.substr(0, 7) == "http://" || nm_ver_saida.substr(0, 8) == "https://" || nm_ver_saida.substr(0, 3) == "../")) 
   { 
       window.location = ("<?php echo $_SESSION['scriptcase']['sc_url_saida']; ?>"); 
   } 
   else 
   { 
       document.fsai.submit();
   } 
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   function nm_limpa_arr_session()
   {
      global $script_case_init;
      $achou = false;
      if (!isset($_SESSION['sc_session'][$script_case_init]) || !isset($script_case_init))
      {
          return;
      }
      foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
      {
          if ($nome_apl == 'app_Competencias' || $achou)
          {
              unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
              $achou = true;
          }
      }
      if (empty($_SESSION['sc_session'][$script_case_init]))
      {
          unset($_SESSION['sc_session'][$script_case_init]);
      }
   }
?>
