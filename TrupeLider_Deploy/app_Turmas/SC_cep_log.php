<?php
/**
 * $Id: nm_gp_gera_cep_log.php,v 1.1.1.1 2007/05/11 19:45:27 diogo Exp $
 */
?>
<html>
<HEAD>
 <TITLE>NetMake :: CEP</TITLE>
 <STYLE TYPE="text/css">
 <!--
 .nm_botao {font-family: Tahoma, Arial, sans-serif; font-size: 12px; color: #000000}
 .nm_input {font-family: Tahoma, Arial, sans-serif; font-size: 12px; color: #000000}
 -->
 </STYLE>
</HEAD>
<BODY BGCOLOR="#FFFFFF" MARGINWIDTH="0" LEFTMARGIN="0" RIGHTMARGIN="0" MARGINHEIGHT="0" TOPMARGIN="0">
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%">
 <TR BGCOLOR="#000000">
  <TD>
   <TABLE BORDER="0" CELLPADDING="3" CELLSPACING="0" WIDTH="100%">
    <TR>
     <TD WIDTH="35" ALIGN="center"><IMG SRC="<?php echo $_SESSION['scriptcase']['nm_path_cep']; ?>/images/nm_logo.gif" BORDER="0" WIDTH="30" HEIGHT="30" ALIGN="absmiddle"></TD>
     <TD ALIGN="left"><FONT FACE="Verdana, Arial, sans-serif" SIZE="5" COLOR="#FFFFFF">&nbsp;<B><I>CEP</I></B>&nbsp;</FONT></TD>
    </TR>
   </TABLE>
  </TD>
 </TR>
</TABLE>
<script Language="JavaScript">
function CriticaCampos()
{
  if (document.Geral.UF.value == "")
  {
    alert("Selecione um Estado (UF) !!");
    document.Geral.UF.focus();
    return (false);
  }
  if (document.Geral.Localidade.value == "")
  {
    alert("Informe o nome completo da Localidade (Cidade, Distrito, Povoado, etc) !!");
    document.Geral.Localidade.focus();
    return (false);
  }
  else
  {
   var Branco = " ";
   var Posic, Carac;
   var Temp = document.Geral.Localidade.value.length;
   var Cont = 0;
   for (var i=0; i < Temp; i++)
   {
   Carac =  document.Geral.Localidade.value.charAt (i);
   Posic  = Branco.indexOf (Carac);
   if (Posic == -1)
      Cont++;
   }
   if (Cont <= 0)
   {
        alert("Informe o nome completo da Localidade (Cidade, Distrito, Povoado, etc) !!");
        document.Geral.Localidade.focus();
        return (false);
   }
  }
  if (document.Geral.Logradouro.value == "")
  {
    alert("Informe o nome da avenida, alameda, beco, passagem, pra�a, rua, travessa etc. N�o informe o n�mero da casa/lote/apartamento.");
    document.Geral.Logradouro.focus();
    return (false);
  }
   var Branco = " ";
   var Posic, Carac;
   var Temp = document.Geral.Logradouro.value.length;
   var Cont = 0;
   for (var i=0; i < Temp; i++)
   {
   Carac =  document.Geral.Logradouro.value.charAt (i);
   Posic  = Branco.indexOf (Carac);
   if (Posic == -1)
      Cont++;
   }
   if (Cont <= 0)
   {
        alert("Informe o nome da avenida, alameda, beco, passagem, pra�a, rua, travessa etc. N�o informe o n�mero da casa/lote/apartamento.");
        document.Geral.Logradouro.focus();
        return (false);
   }
   else
   {
       if (Cont <= 2)
       {
          if (document.Geral.Opcao[1].checked)
          {
             alert("Na op��o COME�ANDO COM, informe no m�nimo 3 caracteres !!");
             document.Geral.Logradouro.focus();
             return (false);
          }
          else
             if (document.Geral.Opcao[2].checked)
             {
                alert("Na op��o CONTENHA, informe no m�nimo 3 caracteres !!");
                document.Geral.Logradouro.focus();
                return (false);
             }
             else
                if (document.Geral.Opcao[3].checked)
                {
                   alert("Na op��o TERMINADO EM, informe no m�nimo 3 caracteres !!");
                   document.Geral.Logradouro.focus();
                   return (false);
                }
       }
  }
}
</script>
<script Language="JavaScript">
 function RetiraAcentos(Campo)
 {
/*
   var Acentos = "���������������������������abcdefghijklmnopqrstuvxwyz";
   var Traducao ="AAAAAAAAAEEEEIIOOOOOOUUUUCCABCDEFGHIJKLMNOPQRSTUVXWYZ";
   var Posic, Carac;
   var TempLog = "";
   for (var i=0; i < Campo.length; i++)
   {
   Carac = Campo.charAt (i);
   Posic  = Acentos.indexOf (Carac);
   if (Posic > -1)
      TempLog += Traducao.charAt (Posic);
   else
      TempLog += Campo.charAt (i);
   }
   return (TempLog);
*/
   return (Campo);
}
</script>
<script Language="JavaScript">
 function AjudaLocalidade()
 {
//   DocRemote = window.open ('http://www.correios.com.br/servicos/cep/AjudaLocalidade.cfm','Localidade','scrollbars,resizable,width=410,height=180');
     alert("Informe o nome completo da Localidade (Cidade, Distrito, Povoado, etc) !!");
     document.Geral.Localidade.focus();
 }
</script>

<script Language="JavaScript">
 function AjudaLogradouro()
 {
//   DocRemote = window.open ('http://www.correios.com.br/servicos/cep/AjudaLogradouro.cfm','Logradouro','scrollbars,resizable,width=410,height=220');
     alert("Informe o nome da avenida, alameda, beco, passagem, pra�a, rua, travessa etc. N�o informe o n�mero da casa/lote/apartamento. N�o informe o tipo (avenida, rua, etc) nem o t�tulo ou patente (coronel, tenente, doutor, etc.)");
     document.Geral.Logradouro.focus();
 }

</script>

<TABLE BORDER="0" CELLPADDING="5" CELLSPACING="0" WIDTH="100%">
 <TR>
  <TD ALIGN="center">

<form name="Geral" method="get" onSubmit="return CriticaCampos();">
 <input type=hidden name="form_origem" value="<?php echo $form_origem ?>">

<table width="392" height="190" background="">
</tr>
  <tr>
    <td width="88" height="21"><b><font face="Tahoma, Arial, sans-serif" size="2">UF:</font></b></td>
      <td width="293" height="21"><b><font face="Tahoma, Arial, sans-serif" size="2">Localidade:</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:AjudaLocalidade()"><img border="0" src="<?php echo $_SESSION['scriptcase']['nm_path_cep']; ?>/images/ajuda.gif" width="15" height="15" ></a WIDTH="15" HEIGHT="15"></b></td>
    <td></td>
    </tr>
  <tr>
    <td width="88" height="25"><select name="UF" class="nm_input">
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MG">MG</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="PR">PR</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="RS">RS</option>
                    <option value="SC">SC</option>
                    <option value="SE">SE</option>
                    <option value="SP">SP</option>
                    <option value="TO">TO</option>
                    </select></td>
    <td width="293" height="25"><input align="left" maxLength="40" name="Localidade" size="40" class="nm_input" title="Informe o nome completo da Localidade (Cidade, Distrito, Povoado, etc)" onBlur="document.Geral.Localidade.value = RetiraAcentos(document.Geral.Localidade.value)" ;></td>
    </tr>
  <tr>
    <td width="88" height="21"><b><font face="Tahoma, Arial, sans-serif" size="2">Tipo:</font></b></td>
      <td width="293" height="21"><b><font face="Tahoma, Arial, sans-serif" size="2">Logradouro:</font><font face="Arial" size="2">&nbsp;&nbsp;</font>&nbsp;&nbsp;<a href="javascript:AjudaLogradouro()"><img border="0" src="<?php echo $_SESSION['scriptcase']['nm_path_cep']; ?>/images/ajuda.gif" width="15" height="15" ></a WIDTH="15" HEIGHT="15"></b></td>
    </tr>
  <tr>
    <td width="88" height="25"><select name="Tipo" class="nm_input">
        <option value></option>
        <option value="Avenida">Avenida</option>
        <option value="Bloco">Bloco</option>
        <option value="Pra�a">Pra�a</option>
        <option value="Quadra">Quadra</option>
        <option value="Rua">Rua</option>
        <option value="Outros">Outros</option>
        </select></td>
   <td width="293" height="25"><input align="left" maxLength="60" name="Logradouro" size="40" class="nm_input" title="Informe o nome da avenida, alameda, beco, passagem, pra�a, rua, travessa etc.
N�o informe o n�mero da casa/lote/apartamento." onBlur="document.Geral.Logradouro.value = RetiraAcentos(document.Geral.Logradouro.value)" ;></TD>
   </tr>
</table>
<table>
  <tr>
    <td width="88" height="42"><b><font face="Tahoma, Arial, sans-serif" size="2">Op��es:</font></b></td>
    <td width="293" height="42">
      <input  CHECKED name="Opcao" type="radio" value="Exatamente" title="Pesquisar os logradouros que sejam exatamente iguais ao argumento informado."> <b><font face="Tahoma, Arial, sans-serif" size="2">Exatamente</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input  name="Opcao" type="radio" value="Comecando" title="Pesquisar os logradouros que comecem com o argumento fornecido."> <b><font face="Tahoma, Arial, sans-serif" size="2">Come�ando por</font></b>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
      <input  name="Opcao" type="radio" value="Contenha" title="Pesquisar os logradouros que contenham o argumento informado."> <b><font face="Tahoma, Arial, sans-serif" size="2">Que Contenha</font></b>&nbsp;
      <input  name="Opcao" type="radio" value="Terminando" title="Pesquisar os logradouros que terminem com o argumento fornecido."> <b><font face="Tahoma, Arial, sans-serif" size="2">Terminando em</font></b>
    </td>
  </tr>
</table>
        <input align="middle" name="BUSCAR" type="submit" value="Pesquisar" class="nm_botao">&nbsp;&nbsp;&nbsp;&nbsp;<b><font size="2" color="#FF0000">
        <input align="middle" name="fechar" type="button" value="Sair" class="nm_botao" onClick="window.close()">&nbsp;&nbsp;&nbsp;&nbsp;<b><font size="2" color="#FF0000">
<br>
  </font></b>
<input type="hidden" name="form_origem" value="<?php echo $form_origem; ?>">
</form>

  </TD>
 </TR>
</TABLE>
<script Language="JavaScript">
   opc_ant = "<?php echo $Opcao ?>";
   document.Geral.UF.value = "<?php echo $Est ?>";
   document.Geral.Localidade.value = "<?php echo $Localidade ?>";
   document.Geral.Tipo.value = "<?php echo $Tipo ?>";
   document.Geral.Logradouro.value = "<?php echo $Logradouro ?>";
   if (opc_ant == "Exatamente")
   {
       document.Geral.Opcao[0].checked = true;
   }
   if (opc_ant == "Comecando")
   {
       document.Geral.Opcao[1].checked = true;
   }
   if (opc_ant == "Contenha")
   {
       document.Geral.Opcao[2].checked = true;
   }
   if (opc_ant == "Terminando")
   {
       document.Geral.Opcao[3].checked = true;
   }
</script>
</body>

</html>