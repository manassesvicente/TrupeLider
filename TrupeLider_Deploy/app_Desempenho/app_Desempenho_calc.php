<!--
Title: Tigra Calculator
URL: http://www.softcomplex.com/products/tigra_calculator/
Version: 1.0
Date: 04/14/2003 (mm/dd/yyyy)
Note: Permission given to use this script in ANY kind of applications if
   header lines are left unchanged.
Note: Script consists of two files: calculator.js and calculator.html
-->

<html>
<head>
        <title>app_Desempenho</title>
        </head>
<body topmargin="0" marginheight="0" leftmargin="0" marginwidth="0" onload="on_load()" onunload="T.t_load=false" bgcolor="#BDD7EF">
<form name="calc">
<table cellpadding="0" cellpadding="0" border="0" width="100%" align="center">
<tr>
        <td align="center">
        <input type="text" name="monitor" value="0" size="25" maxlength="25" dir="rtl" onfocus="document.body.focus()" style="border-top:1px solid #4682B4;border-bottom:1px solid #4682B4;border-left:1px solid #4682B4;border-right:1px solid #4682B4;width:170">
        </td>
</tr>
<tr>
        <td align="center">
        <table cellpadding="0" cellspacing="2" border="0">
        <tr align="center">
                <td><a href="#"><img src="../_lib/img/0_1.gif" border="0" alt="7" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/1_1.gif" border="0" alt="8" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/2_1.gif" border="0" alt="9" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/3_1.gif" border="0" alt="divide" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/4_1.gif" border="0" alt="clear" width="30" height="21"></a></td>
        </tr>
        <tr align="center">
                <td><a href="#"><img src="../_lib/img/5_1.gif" border="0" alt="4" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/6_1.gif" border="0" alt="5" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/7_1.gif" border="0" alt="6" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/8_1.gif" border="0" alt="multiply" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/9_1.gif" border="0" alt="extract square root" width="30" height="21"></a></td>
        </tr>
        <tr align="center">
                <td><a href="#"><img src="../_lib/img/10_1.gif" border="0" alt="1" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/11_1.gif" border="0" alt="2" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/12_1.gif" border="0" alt="3" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/13_1.gif" border="0" alt="substruct" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/14_1.gif" border="0" alt="show result" width="30" height="21"></a></td>
        </tr>
        <tr align="center">
                <td><a href="#"><img src="../_lib/img/15_1.gif" border="0" alt="0" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/16_1.gif" border="0" alt="change sign" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/17_1.gif" border="0" alt="decimal point" width="30" height="21"></a></td>
                <td><a href="#"><img src="../_lib/img/18_1.gif" border="0" alt="add" width="30" height="21"></a></td>
                <td>&nbsp;</td>
        </tr>
        </table>
        </td>
</tr>
</table>
</form>
<script language="JavaScript">
var arr_zn = ["7","8","9","/","C","4","5","6","*","sqr","1","2","3","-","=","0","z",".","+"],
T = self.opener.TCR, a_img = [], i, j, l;
function ch_img(v1, v2) {
        document.images[v1].src = '../_lib/img/'+v1+'_'+v2+'.gif';
}
function on_load() {
        T.TCRmntr('C');
        T.t_load = true;
        if (T.load_value == '') from_p = '0';
        else from_p = T.load_value;
        document.forms[0].elements[0].value = from_p;
}
for (i = 0; i < document.links.length; i++) {
        l = document.links[i];
        l.onmousedown = Function("ch_img(" + i + ",0)")
        l.onmouseout = Function("ch_img(" + i + ",1)")
        l.onmouseup = l.onmouseover = Function("ch_img(" + i + ",2)")
        l.onclick = l.ondblclick = Function("T.TCRmntr('" + arr_zn[i] + "')");
}
</script>
</body></html>
