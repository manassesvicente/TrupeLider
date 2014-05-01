<?php  
  include_once('app_LiderPistaCompHab_session.php');
  session_start() ;
?> 
<html> 
<HEAD>
 <title>app_LiderPistaCompHab</title> 
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
  $path_img     = $path_img . "_lib/img";
  if (!isset($_SESSION['scriptcase']['sc_outra_jan']) || $_SESSION['scriptcase']['sc_outra_jan'] != 'app_LiderPistaCompHab')
  {
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
      {
          echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'>Voltar para o ScriptCase</a> \n" ; 
      }
      else 
      {
          echo "<a href='" . $_SERVER['HTTP_REFERER'] . "' target='_self'>Sair da aplica&ccedil;&atilde;o</a> \n" ; 
      }
  }
?> 
<br> 
<B><FONT SIZE="4">app_LiderPistaCompHab</FONT></B> 
<br> 
<br> 
<form name="FCons" method=post 
               action="app_LiderPistaCompHab.php" 
               target="_self"> 
<input type=hidden name="NM_contr_var_session" value="Yes"> 
<input type=submit value="app_LiderPistaCompHab.php"> 
</form> 
<script language=javascript> 
</script> 
</body> 
</html> 
