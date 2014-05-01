<?php

error_reporting(E_ALL);
$old_error_handler = set_error_handler("app_Turmas_scriptcase_error_handler");

function app_Turmas_scriptcase_error_handler($err_no, $err_msg, $err_file, $err_line, $exibe)
{
    $errors_handled = array(
                            E_ERROR,
                            E_PARSE,
                            E_CORE_ERROR,
                            E_CORE_WARNING,
                            E_COMPILE_ERROR,
                            E_COMPILE_WARNING,
                            E_USER_ERROR,
                            E_USER_WARNING,
                            E_USER_NOTICE
                           );
    if (isset($_SESSION['scriptcase']['app_Turmas']['contr_erro']) && $_SESSION['scriptcase']['app_Turmas']['contr_erro'] == 'on')
    {
        $errors_handled[] = E_WARNING;
        $errors_handled[] = E_NOTICE;
    }
    if (in_array($err_no, $errors_handled))
    {
        $msg      = "";
        $tmp_desc = "";
        $bol_flag = TRUE;
        // ADO
        if (FALSE !== strpos($err_msg, "Invoke() failed") && isset($_SESSION['scriptcase']['sc_sql_ult_conexao']->_connectionID))
        {
            $tmp_desc = $_SESSION['scriptcase']['sc_sql_ult_conexao']->ErrorMsg();
        }
        $msg .= ("" != $tmp_desc) ? trim($tmp_desc) : trim($err_msg);
        if (FALSE !== strpos($err_msg, "Invoke() failed") && "" != $_SESSION['scriptcase']['sc_sql_ult_comando'])
        {
            $msg .= "<BR>";
            $msg .= "<BR>";
            $msg .= "<B>SQL</B>: ";
            $msg .= $_SESSION['scriptcase']['sc_sql_ult_comando'];
        }
        // Application Roles
        if (FALSE !== strpos($err_msg, "The application role "))
        {
            $bol_flag = FALSE;
        }
        // DBF
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Optional feature not implemented"))
        {
            $bol_flag = FALSE;
        }
        // Sqlserver
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "The command(s) completed successfully"))
        {
            $bol_flag = FALSE;
        }
        // InterBase
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "InterBase: conversion error from string") && isset($GLOBALS["NM_ERRO_IBASE"]) && 1 == $GLOBALS["NM_ERRO_IBASE"])
        {
            $bol_flag = FALSE;
        }
        // PostGreSQL
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "pg_fetch_array(): Unable to jump to row"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Changed database context to "))
        {
            $bol_flag = FALSE;
        }
        // Arquivo
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "stat failed for"))
        {
            $bol_flag = FALSE;
        }
        // currency
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "currency type not supported by PHP"))
        {
            $bol_flag = FALSE;
        }
        // PHP4
        if (FALSE !== strpos($err_msg, "Assigning the return value of new by reference is deprecated"))
        {
            $bol_flag = FALSE;
        }
        if (FALSE !== strpos($err_msg, "var Deprecated Please use the"))
        {
            $bol_flag = FALSE;
        }
        if (FALSE !== strpos($err_msg, "var: Deprecated. Please use the"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Only variable references should be returned by reference"))
        {
            $bol_flag = FALSE;
        }
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "Only variables should be assigned by reference"))
        {
            $bol_flag = FALSE;
        }
        // Diretorio
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && FALSE !== strpos($err_msg, "MkDir"))
        {
            $bol_flag = FALSE;
        }
        // Formulas PHP
        if ((E_WARNING == $err_no || E_NOTICE == $err_no) && (FALSE !== strpos($err_msg, "sc_proc_quebra_") || FALSE !== strpos($err_msg, "sc_proc_grid")))
        {
            $bol_flag = FALSE;
        }
        // Geral
        if (FALSE !== strpos($err_msg, "set_time_limit"))
        {
            $bol_flag = FALSE;
        }
        // e-mail
        if (FALSE !== strpos($err_msg, "SSL: fatal protocol error"))
        {
            $bol_flag = FALSE;
        }
        if ($bol_flag && $exibe)
        {
            global $inicial_app_Turmas;
            if ($inicial_app_Turmas->contr_app_Turmas->NM_ajax_flag)
            {
                $inicial_app_Turmas->contr_app_Turmas->NM_ajax_info['errList']['geral_app_Turmas'][] = $msg;
                return;
            }
            app_Turmas_scriptcase_error_display($msg, $err_no);
        }
        $_SESSION['scriptcase']['erro_handler'] = $bol_flag;;
        return;
    }
}

function app_Turmas_scriptcase_error_display($err_msg, $err_no)
{
?>
<TABLE class="scErrorTable" align="center" id="id_error_display_fixed">
 <TR>
  <TD class="scErrorTitle" align="left">ERRO</TD>
 </TR>
 <TR>
  <TD class="scErrorMessage" align="center"><?php echo $err_msg; ?></TD>
 </TR>
</TABLE>
<?php
}

?>
