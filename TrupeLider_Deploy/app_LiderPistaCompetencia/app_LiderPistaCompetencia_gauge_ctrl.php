<?php
$str_file = urldecode($_GET['pbfile']);
$arr_data = @file($str_file);
if ($arr_data && 5 <= sizeof($arr_data))
{
    $bol_load = TRUE;
    $str_type = trim($arr_data[0]);
    $str_js   = trim($arr_data[1]);
    $str_img  = trim($arr_data[2]);
    $int_size = trim($arr_data[3]);
    $str_data = trim($arr_data[sizeof($arr_data) - 1]);
    if ('off' == $str_data)
    {
        $bol_end = TRUE;
    }
    elseif ('HDOC_#NM#_' == substr($str_data, 0, 10))
    {
        $bol_end    = FALSE;
        $arr_partes = explode('_#NM#_', $str_data);
        if (3 == sizeof($arr_partes))
        {
            $str_msg  = ('F' == $arr_partes[1]) ? 'Formatando p&aacute;gina '   : 'Escrevendo p&aacute;gina ';
            $str_msg .= $arr_partes[2];
            $int_step = ('F' == $arr_partes[1]) ? floor($int_size * 0.9) : floor($int_size * 0.95);
        }
        else
        {
            $bol_load = FALSE;
        }
    }
    else
    {
        $bol_end    = FALSE;
        $arr_partes = explode('_#NM#_', $str_data);
        if (2 == sizeof($arr_partes))
        {
            $int_step = $arr_partes[0];
            $str_msg  = $arr_partes[1];
        }
        else
        {
            $bol_load = FALSE;
        }
    }
}
else
{
    $bol_end  = FALSE;
    $bol_load = FALSE;
}
?>
<HTML>
<HEAD>
 <TITLE>app_LiderPistaCompetencia :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s'); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
<?php
if (!$bol_end)
{
?>
 <META http-equiv="Refresh" content="2, url=app_LiderPistaCompetencia_gauge_ctrl.php?pbfile=<?php echo urlencode($_GET['pbfile']); ?>&sc_apbgcol=<?php echo urlencode($_GET['sc_apbgcol']) ?>">
<?php
}
?>
</HEAD>
<BODY bgcolor="<?php echo urldecode($_GET['sc_apbgcol']); ?>" leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<?php
if ($bol_load)
{
?>
<script>
if (parent && parent.nmIfrGauge && parent.nmIfrGauge.pb)
{
 var pbar = parent.nmIfrGauge.pb;
 if (!pbar.IsOk())
 {
  pbar.Init(<?php echo $int_size; ?>, '<?php echo $str_img; ?>');
 }
<?php
    if (!$bol_end)
    {
?>
 pbar.Step('<?php echo $str_msg; ?>', <?php echo $int_step; ?>);
<?php
    }
    else
    {
?>
 pbar.Finalize('PDF finalizado.');
<?php
    }
?>
}
</script>
<?php
}
?>
</BODY>
</HTML>
<?php
if ($bol_end)
{
    @unlink($str_file);
}
?>
