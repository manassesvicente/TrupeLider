<form name="F2" method=post 
               action="app_Turmas.php" 
               target="_self"> 
<input type=hidden name="id_turma" value="<?php  echo $this->nmgp_dados_form['id_turma'] ?>">
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="master_nav" value="off">
<input type=hidden name="script_case_init" value="<?php  echo $this->Ini->sc_page; ?>"> 
</form> 
<form name="F5" method="post" 
                  action="app_Turmas.php" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value="igual"/>
  <input type="hidden" name="nmgp_parms" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_Turmas']['parms'] ?>"/>
  <input type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page ?>"/> 
</form> 
<form name="F6" method="post" 
                  action="app_Turmas.php" 
                  target="_self"> 
  <input type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page ?>"/> 
</form> 
<div id="id_div_process" style="display: none; position: absolute"><table class="scFormTable"><tr><td class="scFormLabelOdd">Processando...</td></tr></table></div>
<script language=javascript> 
 NM_tp_critica(1);
function NM_critica (form, campo, label, mask, tipo, intr, dec, min, max)
{
    this.form = form;
    this.campo = campo;
    this.label = label;
    this.mask = mask;
    this.tipo = tipo;
    this.intr = intr;
    this.dec = dec;
    this.min = min;
    this.max = max;
}
 NM_tab_crit = new NM_critica(14);
 NM_tab_crit[1] = new NM_critica('F1', 'cod_turma', 'Código da Turma', 'naomask', 'lista', 'cxab', 20, 'TUDO');
 NM_tab_crit[2] = new NM_critica('F1', 'descricao', 'Descrição', 'naomask', 'lista', 'cxab', 120, 'TUDO');
 NM_tab_crit[3] = new NM_critica('F1', 'cep', 'CEP', 'naomask', 'cep');
 NM_tab_crit[4] = new NM_critica('F1', 'estado', 'Estado', 'naomask', 'lista', 'cxab', 30, 'TUDO');
 NM_tab_crit[5] = new NM_critica('F1', 'cidade', 'Cidade', 'naomask', 'lista', 'cxab', 35, 'TUDO');
 NM_tab_crit[6] = new NM_critica('F1', 'bairro', 'Bairro', 'naomask', 'lista', 'cxab', 25, 'TUDO');
 NM_tab_crit[7] = new NM_critica('F1', 'logradouro', 'Endereço', 'naomask', 'lista', 'cxab', 200, 'TUDO');
 NM_tab_crit[8] = new NM_critica('F1', 'numero', 'Número', 'naomask', 'lista', 'cxab', 6, 'TUDO');
 NM_tab_crit[9] = new NM_critica('F1', 'complemento', 'Complemento', 'naomask', 'lista', 'cxab', 50, 'TUDO');
 NM_tab_crit[10] = new NM_critica('F1', 'email', 'E-mail', 'naomask', 'email', 50);
 NM_tab_crit[11] = new NM_critica('F1', 'telefax', 'Telefone / Fax', 'naomask', 'lista', 'cxab', 40, '0123456789 ');
 NM_tab_crit[12] = new NM_critica('F1', 'tel', 'Celular', 'naomask', 'lista', 'cxab', 40, '0123456789 ');
 NM_tab_crit[13] = new NM_critica('F1', 'obs', 'Observações', 'naomask', 'lista', 'cxab', 250, 'TUDO');
 NM_tab_crit[14] = new NM_critica('NM_final');
 NM_tab_crit_1 = new NM_critica(14);
 NM_tab_crit_1[1] = new NM_critica('F1', 'cod_turma', 'Código da Turma', 'naomask', 'lista', 'cxab', 20, 'TUDO');
 NM_tab_crit_1[2] = new NM_critica('F1', 'descricao', 'Descrição', 'naomask', 'lista', 'cxab', 120, 'TUDO');
 NM_tab_crit_1[3] = new NM_critica('F1', 'cep', 'CEP', 'naomask', 'cep');
 NM_tab_crit_1[4] = new NM_critica('F1', 'estado', 'Estado', 'naomask', 'lista', 'cxab', 30, 'TUDO');
 NM_tab_crit_1[5] = new NM_critica('F1', 'cidade', 'Cidade', 'naomask', 'lista', 'cxab', 35, 'TUDO');
 NM_tab_crit_1[6] = new NM_critica('F1', 'bairro', 'Bairro', 'naomask', 'lista', 'cxab', 25, 'TUDO');
 NM_tab_crit_1[7] = new NM_critica('F1', 'logradouro', 'Endereço', 'naomask', 'lista', 'cxab', 200, 'TUDO');
 NM_tab_crit_1[8] = new NM_critica('F1', 'numero', 'Número', 'naomask', 'lista', 'cxab', 6, 'TUDO');
 NM_tab_crit_1[9] = new NM_critica('F1', 'complemento', 'Complemento', 'naomask', 'lista', 'cxab', 50, 'TUDO');
 NM_tab_crit_1[10] = new NM_critica('F1', 'email', 'E-mail', 'naomask', 'email', 50);
 NM_tab_crit_1[11] = new NM_critica('F1', 'telefax', 'Telefone / Fax', 'naomask', 'lista', 'cxab', 40, '0123456789 ');
 NM_tab_crit_1[12] = new NM_critica('F1', 'tel', 'Celular', 'naomask', 'lista', 'cxab', 40, '0123456789 ');
 NM_tab_crit_1[13] = new NM_critica('F1', 'obs', 'Observações', 'naomask', 'lista', 'cxab', 250, 'TUDO');
 NM_tab_crit_1[14] = new NM_critica('NM_final');

function nm_move(x) 
{ 
    if (("inicio" == x || "retorna" == x) && "S" != Nav_permite_ret)
    {
        return;
    }
    if (("avanca" == x || "final" == x) && "S" != Nav_permite_ava)
    {
        return;
    }
    document.F2.nmgp_opcao.value = x; 
    if ("apl_detalhe" == x)
    {
        document.F2.nmgp_opcao.value = 'igual'; 
        document.F2.master_nav.value = 'on'; 
        document.F2.submit();
        return;
    }
    if ("novo" == x || "edit_novo" == x)
    {
        document.F2.submit();
    }
    else
    {
        do_ajax_app_Turmas_navigate_form();
    }
} 
function nm_atualiza(x, y) 
{ 
    if (!scAjaxDetailProc())
    {
        return;
    }
    document.F1.nmgp_parms.value = "";
    document.F1.target = "_self";
    if (x == "muda_form") 
    { 
       document.F1.nmgp_num_form.value = y; 
    } 
    if (x == "excluir") 
    { 
       if (confirm ("Deseja realmente excluir o registro??"))  
       { 
           document.F1.nmgp_opcao.value = x; 
           document.F1.submit(); 
       } 
       else 
       { 
          return; 
       } 
    } 
    else 
    { 
       document.F1.nmgp_opcao.value = x; 
       if ("incluir" == x || "muda_form" == x)
       {
           document.F1.submit();
       }
       else
       {
           do_ajax_app_Turmas_submit_form();
       }
    } 
} 
function nm_mostra_img(imagem, altura, largura)
{
    if (largura != 0) 
    {
        largura = parseInt(largura) + 20;
    }
    NovaJanela = window.open ("", "", "height=" + altura + ", width=" + largura + "location=no, menubar=no, resizable=yes, scrollbars=yes, status=no, toolbar=no");
    NovaJanela.document.open();
    NovaJanela.document.write("<html>");
    NovaJanela.document.write("<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0>");
    NovaJanela.document.write("<img src='" + imagem + "' id='id_img'>");
    NovaJanela.document.write("<" + "script>");
    NovaJanela.document.write(" function resizingWindowIsIE() {");
    NovaJanela.document.write("  if (navigator.appName == 'Microsoft Internet Explorer') return true;");
    NovaJanela.document.write("  return false;");
    NovaJanela.document.write(" }");
    NovaJanela.document.write(" function resizingWindowIsOpera() {");
    NovaJanela.document.write("  if (navigator.appName == 'Opera') return true;");
    NovaJanela.document.write("  return false;");
    NovaJanela.document.write(" }");
    NovaJanela.document.write(" var resizingWindowMaxResizes = 3;");
    NovaJanela.document.write(" var rsizingWindowResizes = 0;");
    NovaJanela.document.write(" var dwidth;");
    NovaJanela.document.write(" var dheight;");
    NovaJanela.document.write(" function resizingWindowLoaded(width, height) {");
    NovaJanela.document.write("  dwidth = width;");
    NovaJanela.document.write("  dheight = height;");
    NovaJanela.document.write("  resizingWindowResizes = 0;");
    NovaJanela.document.write("  resizingWindowGo();");
    NovaJanela.document.write(" }");
    NovaJanela.document.write(" function resizingWindowEndOfBody() {");
    NovaJanela.document.write("  document.write(\"<div \" +");
    NovaJanela.document.write("   \"id='resizingWindowTestSizeDiv' \" +");
    NovaJanela.document.write("   \"style='width: 100%; \" +");
    NovaJanela.document.write("   \"  height: 100%; \" +");
    NovaJanela.document.write("   \"  position: fixed; \" +");
    NovaJanela.document.write("   \"  left: 0; \" +");
    NovaJanela.document.write("   \"  top: 0; \" +");
    NovaJanela.document.write("   \"  visibility: hidden; \" +");
    NovaJanela.document.write("   \"  z-index: -1'></div>\");");
    NovaJanela.document.write(" }");
    NovaJanela.document.write(" function resizingWindowResized() {");
    NovaJanela.document.write("  resizingWindowGo();");
    NovaJanela.document.write(" }");
    NovaJanela.document.write(" function resizingWindowGo() {");
    NovaJanela.document.write("  var width;");
    NovaJanela.document.write("  var height;");
    NovaJanela.document.write("  var x, y, w, h;");
    NovaJanela.document.write("  if (resizingWindowResizes == resizingWindowMaxResizes) return;");
    NovaJanela.document.write("  resizingWindowResizes++;");
    NovaJanela.document.write("  if (resizingWindowIsIE()) {");
    NovaJanela.document.write("   width = parseInt(document.documentElement.clientWidth);");
    NovaJanela.document.write("   height = parseInt(document.documentElement.clientHeight);");
    NovaJanela.document.write("  } else if (resizingWindowIsOpera()) {");
    NovaJanela.document.write("   width = parseInt(window.innerWidth) - 16;");
    NovaJanela.document.write("   height = parseInt(window.innerHeight);");
    NovaJanela.document.write("  } else {");
    NovaJanela.document.write("   testsize = document.getElementById('resizingWindowTestSizeDiv');");
    NovaJanela.document.write("   width = testsize.scrollWidth;");
    NovaJanela.document.write("   height = testsize.scrollHeight;");
    NovaJanela.document.write("  }");
    NovaJanela.document.write("  if ((dwidth == width) && (dheight == height)) {");
    NovaJanela.document.write("   resizingWindowResizes = resizingWindowMaxResizes;");
    NovaJanela.document.write("   return;");
    NovaJanela.document.write("  }");
    NovaJanela.document.write("  var xchange = dwidth - width;");
    NovaJanela.document.write("  var ychange = dheight - height;");
    NovaJanela.document.write("  window.resizeBy(xchange, ychange);");
    NovaJanela.document.write(" }");
    NovaJanela.document.write(" resizingWindowEndOfBody();");
    NovaJanela.document.write(" resizingWindowLoaded(document.getElementById('id_img').width, document.getElementById('id_img').height);");
    NovaJanela.document.write("<" + "/script>");
    NovaJanela.document.write("</body>");
    NovaJanela.document.write("</html>");
    NovaJanela.document.close();
}
function nm_mostra_mens(campo)
{
    NovaJanela = window.open ("app_Turmas_help.php?nm_cod_campo=" + campo, "ScriptCase", "height=100, width=300, resizable, scrollbars");
}
function nm_recarga_form(nm_ult_ancora, nm_ult_page) 
{ 
    document.F1.target = "_self";
    document.F1.nmgp_parms.value = "";
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_opcao.value= "recarga"; 
    document.F1.action += "#" +  nm_ult_ancora;
    document.F1.submit(); 
} 
var CEP     = 0;
var RUA     = 1;
var TIPOEXT = 2;
var LOGRAD  = 3;
var BAIRRO  = 4;
var CIDADE  = 5;
var UF      = 6;
function cep_array(string)
{
   return string.split("#;#");
}
function cep_cep(num_cep, campos_cep)
{
   retorno_cep  = campos_cep;
   jsrsExecute("app_Turmas_cep.php?cep=" + num_cep + "&onchange=s", recebe_cep, "cep", num_cep, false);
}
function recebe_cep(string)
{
   if (string.substr(0, 3) == "nao")
   {
       alert ("CEP não encontrado");
       return;
   }
   if (string.substr(0, 4) == "scep")
   {
       alert (string.substr(4));
       return;
   }
   arr_dados  = cep_array(string);
   retorno_cep += ";";
   arr_campos = retorno_cep.split(";");
   ix = 1;
   while (arr_campos[ix] != "")
   {
       arr_cada_cmp = arr_campos[ix].split(",");
       if (arr_cada_cmp[0] == "CEP")    { ind = 0;}
       if (arr_cada_cmp[0] == "RUA")    { ind = 1;}
       if (arr_cada_cmp[0] == "TIPOEXT"){ ind = 2;}
       if (arr_cada_cmp[0] == "LOGRAD") { ind = 3;}
       if (arr_cada_cmp[0] == "BAIRRO") { ind = 4;}
       if (arr_cada_cmp[0] == "CIDADE") { ind = 5;}
       if (arr_cada_cmp[0] == "UF")     { ind = 6;}
       dado_saida = arr_dados[ind];
       xxx = eval("document.F1." + arr_cada_cmp[1] + ".value = " + 'dado_saida');
       Obj_Ret_Cep = 'id_read_on_' + arr_cada_cmp[1];
       if (document.getElementById(Obj_Ret_Cep))
       {
           document.getElementById(Obj_Ret_Cep).innerHTML = dado_saida;
       }
       Obj_Ret_Cep = 'id_ajax_label_' + arr_cada_cmp[1];
       if (document.getElementById(Obj_Ret_Cep))
       {
           document.getElementById(Obj_Ret_Cep).innerHTML = dado_saida;
       }
       ix++;
   }
}

function scCssFocus(oHtmlObj)
{
  oHtmlObj.className = "scFormObjectFocusOdd"
}

function scCssBlur(oHtmlObj)
{
  oHtmlObj.className = "scFormObjectOdd"
}

</script> 
