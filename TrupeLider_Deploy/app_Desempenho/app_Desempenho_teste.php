<?php  
  session_start() ;
?> 
<html> 
<HEAD>
 <title>app_Desempenho</title> 
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<body> 
<?php  
  $str_path_web = $_SERVER['PHP_SELF'];
  $str_path_web = str_replace("\\", '/', $str_path_web);
  $str_path_web = str_replace('//', '/', $str_path_web);
  $path_img     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
  $path_img     = substr($path_img, 0, strrpos($path_img, '/')) . '/';
  $path_img     = $path_img . "app_Desempenho/img";
  if (!isset($_SESSION['scriptcase']['sc_outra_jan']) || $_SESSION['scriptcase']['sc_outra_jan'] != 'app_Desempenho')
  {
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
      {
          echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $path_img . "/nm_scriptcase3_green_bvoltar.gif' alt='Voltar para o ScriptCase' align=absmiddle></a> \n" ; 
      }
      else 
      {
          echo "<a href='" . $_SERVER['HTTP_REFERER'] . "' target='_self'><img border='0' src='" . $path_img . "/nm_scriptcase3_green_bsair.gif' alt='Sair da aplica&ccedil;&atilde;o' align=absmiddle></a> \n" ; 
      }
  }
?> 
<br> 
<B><FONT SIZE="4">app_Desempenho</FONT></B> 
<br> 
<form name="Fedit" method=post 
               action="app_Desempenho.php" 
               target="_self"> 
<input type=hidden name="NM_contr_var_session" value="Yes"> 
<input type=submit value="app_Desempenho.php"> 
</form> 
<script language=javascript> 
</script> 
<br> 
</body> 
</html> 
