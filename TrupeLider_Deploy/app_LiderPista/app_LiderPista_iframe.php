<?php
$parms_pdf = (isset($_GET['sc_parms_pdf'])) ? $_GET['sc_parms_pdf'] : "";
$graf_pdf  = (isset($_GET['sc_graf_pdf']))  ? $_GET['sc_graf_pdf']  : "";
?>
<html>
<head>
 <title>app_LiderPista :: PDF</title>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body bgcolor="<?php echo urldecode($_GET['sc_apbgcol']); ?>">
<iframe name="nmIfrGauge" height="100" width="610" frameborder="0" src="app_LiderPista_gauge.php?pbfile=<?php echo $_GET['pbfile'] ?>&sc_apbgcol=<?php echo urlencode($_GET['sc_apbgcol']) ?>&jspath=<?php echo urlencode($_GET['jspath']) ?>" style="background-color: <?php echo urldecode($_GET['sc_apbgcol']) ?>"></iframe>
<iframe name="nmIfrPdf" height="200" width="610" frameborder="0" src="app_LiderPista.php?nmgp_opcao=pdf&script_case_init=<?php echo $_GET['script_case_init'] ?>&pbfile=<?php echo $_GET['pbfile'] ?>&sc_apbgcol=<?php echo urlencode($_GET['sc_apbgcol']) ?>&nmgp_tipo_pdf=<?php echo $_GET['sc_tp_pdf'] ?>&nmgp_parms_pdf=<?php echo $parms_pdf ?>&nmgp_graf_pdf=<?php echo $graf_pdf ?>" style="background-color: <?php echo urldecode($_GET['sc_apbgcol']) ?>"></iframe>
<iframe name="nmIfrCtrl" height="1" width="1" frameborder="0" src="app_LiderPista_gauge_ctrl.php?pbfile=<?php echo $_GET['pbfile'] ?>&sc_apbgcol=<?php echo urlencode($_GET['sc_apbgcol']) ?>" style="display: none"></iframe>
</body>
</html>
