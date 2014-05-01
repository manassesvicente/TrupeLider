/**
 * $Id: nm_dig_main.js,v 1.7 2008/04/15 20:16:33 sergio Exp $
 */
//<script language=JavaScript>

var nm_Ident = "NetMake - Solucoes em Informatica Ltda (www.netmake.com.br)" ;

var nmdg_nav = ""         ;  // navegador
var nmdg_linux = -1       ;  // Identificador de operacao no Linux
var nmdg_validar = ""     ;  // Identificador dos Browsers que validam no ONblur
var nmdg_Form = ""        ;  // Formulario
var nmdg_Campo = ""       ;  // Nome do Campo no formulario
var nmdg_Label = ""       ;  // Label do Campo no formulario
var nmdg_Tab = ""         ;  // Flag tabulação: 0 = não tabula ; 1 = tabula
var nmdg_TipoCampo = ""   ;  // Tipo do campo
var nmdg_NumInteiros = 0  ;  // Quantidade de Inteiros / Tipo da Data / Caixa Alta/Baixa ou Obj Rádio
var nmdg_NumDecimais = 0  ;  // Quantidade de decimais / Número máximo de Caracteres / Ano mínimo
var nmdg_ValMin = ""      ;  // Valor Mínimo a ser informado / Ano máximo / Caracteres Adicionais
var nmdg_ValMax = 0       ;  // Valor Máximo a ser informado

var nmdg_tipo_crit = "3"          ;
var nmdg_tipo_format = "1"        ;
var nmdg_mens_crit = ""           ;
var nmdg_ValOriginal = ""         ;
var nmdg_ValEditado = ""          ;
var nmdg_ValNaoEditado = ""       ;
var nmdg_simb_grupo = "."         ;
var nmdg_simb_grupo_format = "."  ;
var nmdg_simb_dec = ","           ;
var nmdg_Monta_Data = ""          ;
var nmdg_Monta_DataX = ""         ;
var nmdg_Monta_Hora = ""          ;
var nmdg_Monta_HoraX = ""         ;
var nmdg_TipoCart = ""            ;
var nmdg_ValorCampo = ""          ;
var nmdg_ValorSalvo = ""          ;
var nmdg_Focus_Set = 0            ;
var nmdg_Virgula = 0              ;
var nmdg_Negativo = 0             ;
var nmdg_Ponto = 0                ;
var nmdg_lixo = ""                ;
var nmdg_SeguraTecla = 0          ;
var nmdg_Controla_Evento = ""     ;
var nmdg_Cod_Tecla = 0            ;
var nmdg_Carater = ""             ;
var nmdg_Tecla_num = 0            ;
var nmdg_Alfabeto = "abcdefghijklmnopqrstuvwxyz"  ;
var nmdg_Numeros = "0123456789"   ;
var nmdg_Acentos = "àáãéêíóõúü"   ;
var nmdg_Car_Adicionais = ""      ;
var nmdg_Car_Texto = ""           ;
var nmdg_Car_Caixa = ""           ;
var nmdg_Car_Max = 0              ;
var nmdg_Radio = ""               ;
var nmdg_Mascara = ""             ;
var Xfocus = ""                   ;
var nm_dtm = ""                   ;
var nm_dta = ""                   ;
var nm_dtv = ""                   ;
var nm_tecla_ctrl = false         ;

//------------ Arma captura dos eventos em funcao do navegador
   nmdg_nav = navigator.appName  ;
   if (nmdg_nav.substr(0, 9) == "Microsoft")
   {
       nmdg_nav  = "Microsoft" ;
   }
   nmdg_ver = navigator.appVersion.substr(0,1)  ;
   nmdg_linux = navigator.appVersion.lastIndexOf("Linux")  ;
   if (nmdg_linux != -1)
   {
       nmdg_linux = "s" ;
   }
   if (nmdg_nav == "Microsoft" || nmdg_nav == "Netscape" || nmdg_nav == "Opera")
   {
       nmdg_validar =  1 ;
   }

   if (nmdg_nav == "Netscape")
   {
       document.captureEvents(Event.KEYPRESS);
       document.onkeypress        =      TestaValorDown;
       document.captureEvents(Event.KEYUP);
       document.onkeyup          =       NM_onkeyup;
       if (nmdg_ver < 5)
       {
           document.captureEvents(Event.BLUR);
           document.onblur           =       NM_onblur;
       }
   }
   if (nmdg_nav == "Microsoft")
   {
       document.attachEvent("onkeydown",  TestaValorDown) ;
       document.attachEvent("onkeyup",    NM_onkeyup)     ;
   }

//-------------- Define nível de critica
//   0 = sem critica
//   1 = só digitação (Campos numéricos e tamanho dos campos)
//   2 = Critica com obrigação de acerto (alert)
//   3 = Critica com opção de acerto ()confirm)
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}

//-------------- Define tipo de formatação (0 = sem formatação, 1 = com formatação)
function NM_tp_format(TP)
{
    if (TP == 0 || TP == 1)
    {
        nmdg_tipo_format = TP;
    }
}

//-------------- Trata evento ONFOCUS
function NM_onfocus(F, C, L, Tab, Msk, T, I, D, VM, VX)
{

    if (F == "")
    {
        alert (Nm_erro[501]) ;
        return false ;
    }
    if (C == "")
    {
        alert (Nm_erro[502]) ;
        return false ;
    }
    nmdg_Tab = Tab;
    nmdg_Mascara = "";
    if (Msk != "naomask")
    {
        nmdg_Mascara = Msk;
    }
    if (nmdg_tipo_format == 0)
    {
        nmdg_Mascara = "";
    }
    if (T == null)
    {
        nmdg_TipoCampo = "" ;
        return true ;
    }
    if (nmdg_Controla_Evento != "" &&  nmdg_Controla_Evento != C)
    {
        Xfocus = setTimeout("NM_focus()", 10) ;
        return false ;
    }
    Inicializa_campos(F, C, L, T, I, D, VM, VX);

    nmdg_Controla_Evento = "" ;

    //mudado por diogo para colocar forms e elements
    //devido a problema com javascript
    //2006/07/12
    //var Xblur = "" ;
    //if (nmdg_nav == "Microsoft")
    //{
        //Xblur = eval (nmdg_Form + '.' + nmdg_Campo + '.attachEvent("onblur", NM_onblur )') ;
    //}
    //if (nmdg_nav == "Netscape")
    //{
        //if (nmdg_ver > 4)
        //{
            //Xblur = eval ('document.' + nmdg_Form + '.' + nmdg_Campo + '.onblur = NM_onblur') ;
        //}
    //}

    if (nmdg_nav == "Microsoft")
    {
        //Xblur = document.forms[nmdg_Form].elements[nmdg_Campo].attachEvent("onblur", NM_onblur );
    }
    if (nmdg_nav == "Netscape")
    {
        if (nmdg_ver > 4)
        {
                //Xblur = document.forms[nmdg_Form].elements[nmdg_Campo].onblur = NM_onblur;
        }
    }
    nmdg_SeguraTecla = 0 ;

    switch (nmdg_TipoCampo)
    {
        case 'VALOR':
            DesformataValor("crit") ;
            break;
        case 'NUMERO':
            NM_lercampo() ;
            if (nmdg_Mascara != "")
            {
                NM_tira_mask(nmdg_ValorCampo);
                nmdg_ValorCampo = nmdg_ValNaoEditado;
            }
            nmdg_ValOriginal = nmdg_ValorCampo;
            NM_select() ;
            break;
        case 'NUMEROEDT':
            if (nmdg_Mascara != "")
            {
                DesformataMask() ;
            }
            else
            {
                DesformataValor("crit") ;
            }
            break;
        case 'CIC':
            nmdg_NumDecimais = 0 ;
            Onfocus_CIC() ;
            break;
        case 'CNPJ':
            nmdg_NumDecimais = 0 ;
            Onfocus_CNPJ() ;
            break;
        case 'CICCNPJ':
            nmdg_NumDecimais = 0 ;
            Onfocus_CICCNPJ() ;
            break;
        case 'DATA':
            nmdg_NumDecimais = 0 ;
            Onfocus_Data() ;
            break;
        case 'HORA':
            nmdg_NumDecimais = 0 ;
            Onfocus_Hora() ;
            break;
        case 'CEP':
            nmdg_NumDecimais = 0 ;
            Onfocus_CEP() ;
            break;
        case 'CARTAO':
            Onfocus_CARTAO() ;
            break;
       case 'ALFA':
            Onfocus_ALFA() ;
            break;
        case 'ALFANUM':
            Onfocus_ALFA() ;
            break;
        case 'LISTA':
            Onfocus_ALFA() ;
            break;
        case 'EMAIL':
            Onfocus_ALFA() ;
            break;
        default :
            return false;
    }
}
//---
function Inicializa_campos(F, C, L, T, I, D, VM, VX)
{
    nmdg_simb_grupo = ".";
    nmdg_simb_dec   = ",";
    nmdg_Form  = F;
    nmdg_Campo = C;
    nmdg_Label = L;
    nmdg_TipoCampo = T.toUpperCase();

    if (nmdg_TipoCampo == "DATA")
    {
        nmdg_Monta_Data = I.toUpperCase()  ;
        nmdg_Monta_DataX = nmdg_Monta_Data.replace("/" , "")  ;
        nmdg_Monta_DataX = nmdg_Monta_DataX.replace("/" , "") ;
        if (D == null)
        {
            nmdg_ValMin = 0 ;
        }
        else
        {
            nmdg_ValMin = D ;
        }
        if (VM == null)
        {
            nmdg_ValMax = 0 ;
        }
        else
        {
            nmdg_ValMax = VM ;
        }
     }
    if (nmdg_TipoCampo == "HORA")
     {
        nmdg_Monta_Hora = I.toUpperCase()  ;
        nmdg_Monta_HoraX = nmdg_Monta_Hora.replace(":" , "")  ;
        nmdg_Monta_HoraX = nmdg_Monta_HoraX.replace(":" , "") ;
        nmdg_Monta_HoraX = nmdg_Monta_HoraX.replace(":" , "") ;
    }
    if (nmdg_TipoCampo.substr(0, 5) == "TEXTO")
    {
        nmdg_Car_Texto = nmdg_TipoCampo.substr(5) ;
        nmdg_TipoCampo = "ALFANUM" ;
    }
    else
    {
        nmdg_Car_Texto = "" ;
    }
    if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA")
    {
        if (I == null)
        {
            nmdg_Car_Caixa = "CXAB" ;
        }
        else
        {
            nmdg_Car_Caixa = I ;
        }
        if (D == null)
        {
           nmdg_Car_Max = 9999 ;
        }
        else
        {
           nmdg_Car_Max = D ;
        }
        if (VM == null)
        {
            nmdg_Car_Adicionais = "" ;
        }
        else
        {
            nmdg_Car_Adicionais = VM ;
        }
    }
    if (nmdg_TipoCampo == "EMAIL")
    {
        if (I == null)
        {
            nmdg_Car_Max = 40 ;
        }
        else
        {
            nmdg_Car_Max = I ;
        }
    }
    if (nmdg_TipoCampo == "CIC" || nmdg_TipoCampo == "CNPJ")
    {
        nmdg_Radio = "" ;
    }
    if (nmdg_TipoCampo == "CICCNPJ")
    {   if (I == null)
        {
            nmdg_Radio = "" ;
        }
        else
        {
            nmdg_Radio = I ;
            if (document.forms[nmdg_Form].elements[nmdg_Radio][0].checked)
            {
                nmdg_TipoCampo = "CIC" ;
            }
            else
            {
                nmdg_TipoCampo = "CNPJ" ;
            }
        }
    }
    if (nmdg_TipoCampo == "VALOR" ||  nmdg_TipoCampo == "VALORVG" || nmdg_TipoCampo == "SVALOR" ||  nmdg_TipoCampo == "SVALORVG")
    {
        nmdg_NumInteiros = parseInt(I)    ;
        nmdg_NumDecimais = parseInt(D)    ;
        if (isNaN(nmdg_NumInteiros) )
        {
            nmdg_NumInteiros = 0 ;
        }
        if (isNaN(nmdg_NumDecimais) )
        {
            nmdg_NumDecimais = 0 ;
        }
        if (isNaN(parseFloat(VM)) )
        {
            nmdg_ValMin = 0 ;
        }
        else
        {
            nmdg_ValMin = parseFloat(VM) ;
        }
        if (isNaN(parseFloat(VX)) )
        {
            nmdg_ValMax = 0 ;
        }
        else
        {
            nmdg_ValMax = parseFloat(VX) ;
        }
        if (nmdg_TipoCampo == "SVALOR")
        {
            nmdg_simb_grupo_format = "" ;
            nmdg_TipoCampo = "VALOR" ;
        }
        if (nmdg_TipoCampo == "VALORVG" || nmdg_TipoCampo == "SVALORVG")
        {
            nmdg_simb_grupo = "," ;
            nmdg_simb_grupo_format = "," ;
            nmdg_simb_dec = "." ;
            if (nmdg_TipoCampo == "SVALORVG")
            {
                nmdg_simb_grupo_format = "" ;
            }
            nmdg_TipoCampo = "VALOR" ;
        }
    }
    if (nmdg_TipoCampo == "NUMERO" || nmdg_TipoCampo == "NUMEROEDT" || nmdg_TipoCampo == "NUMEROEDTVG")
    {
        nmdg_NumInteiros = parseInt(I)    ;
        nmdg_NumDecimais = 0    ;
        if (isNaN(nmdg_NumInteiros) )
        {
            nmdg_NumInteiros = 0 ;
        }
        if (isNaN(parseFloat(D)) )
        {
            nmdg_ValMin = 0 ;
        }
        else
        {
            nmdg_ValMin = parseFloat(D) ;
        }
        if (isNaN(parseFloat(VM)) )
        {
            nmdg_ValMax = 0 ;
        }
        else
        {
            nmdg_ValMax = parseFloat(VM) ;
        }
        if (nmdg_TipoCampo == "NUMEROEDTVG")
        {
            nmdg_simb_grupo = "," ;
            nmdg_simb_dec   = "." ;
            nmdg_TipoCampo  = "NUMEROEDT" ;
        }
    }
    if (nmdg_TipoCampo == "CARTAO")
    {
        nmdg_TipoCart = "" ;
        if (I != null && isNaN(parseInt(I)) )
        {
            nmdg_TipoCart = I.toUpperCase() ;
        }
    }
}

//-------------- Trata evento KEYUP
function NM_onkeyup(T)
{
    if (nmdg_linux == "s" || nmdg_tipo_crit == 0)
    {
        return true;
    }
    if (nmdg_nav == "Netscape" && nmdg_ver > 4 && T.eventPhase  != 3) //mudado de 2 para 3 em 05/12/2006
    {
        return true;
    }
    if (nmdg_TipoCampo == "")
    {
        return true ;
    }
    if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA" || nmdg_TipoCampo == "EMAIL")
    {
        nmdg_SeguraTecla = 0 ;
        nmdg_Focus_Set = 0 ;
        if (nmdg_ValorSalvo.length == nmdg_Car_Max)
        {
            NM_lercampo() ;
            if (nmdg_ValorCampo.length > nmdg_Car_Max)
            {
                NM_escreve(nmdg_ValorSalvo) ;
            }
        }
        return true ;
    }
    if (nmdg_Tecla_num == 0 )
    {
        nmdg_SeguraTecla = 0 ;
        return true ;
    }

    if (nmdg_SeguraTecla == 0 && nmdg_nav == "Netscape")
    {
        nmdg_Cod_Tecla = T.which ;
        if (nmdg_Cod_Tecla == 0 || nmdg_Cod_Tecla == 9)
        {
            nmdg_Focus_Set = 0 ;
            return true ;
        }
    }
    if (nmdg_SeguraTecla == 0 )    // Controla Teclado
    {
        return false ;
    }
    if (nmdg_TipoCampo != 'VALOR' )
    {
        nmdg_SeguraTecla = 0 ;
        return true ;
    }

    switch (nmdg_TipoCampo)
    {
        case 'VALOR':
            TestaValorUp() ;
            break;
        case 'CIC':
            TestaCICup() ;
            break;
        case 'CNPJ':
            TestaCNPJup() ;
            break;
        case 'DATA':
            TestaDataup() ;
            break;
        case 'HORA':
            TestaHoraup() ;
            break;
        case 'CEP':
            TestaCEPup() ;
            break;
        default :
            nmdg_SeguraTecla = 0  ;
            return true;
    }
}

//-------------- Trata evento Onblur
function NM_onblur()
{
    if (nmdg_TipoCampo == "")
    {
        return ;
    }
    if (nmdg_Controla_Evento != "")
    {
        return ;
    }

    switch (nmdg_TipoCampo)
    {
        case 'VALOR':
            NM_lercampo();
            DesformataValor("blur") ;
            nmdg_ValorCampo = nmdg_ValNaoEditado;
            FormataValor() ;
            break;
        case 'NUMERO':
            FormataValor() ;
            break;
        case 'NUMEROEDT':
            FormataValor() ;
            break;
        case 'CIC':
            TestaCICblur() ;
            break;
        case 'CNPJ':
            TestaCNPJblur() ;
            break;
        case 'CICCNPJ':
            TestaCICCNPJblur() ;
            break;
        case 'DATA':
            TestaDatablur() ;
            break;
        case 'HORA':
            TestaHorablur() ;
            break;
        case 'CEP':
            TestaCEPblur() ;
            break;
        case 'CARTAO':
            TestaCartaoblur() ;
            break;
        case 'ALFA':
            TestaAlfablur() ;
            break;
        case 'ALFANUM':
            TestaAlfablur() ;
            break;
        case 'LISTA':
            TestaAlfablur() ;
            break;
        case 'EMAIL':
            TestaEmailblur() ;
            break;
        default :
            nmdg_TipoCampo == "" ;
    }
}

//------------ Formatação de Mascara generica
function NM_gera_mask(nmdg_mask_dados)
{
    nmdg_mask_mask  = nmdg_Mascara;
    nmdg_mask_tam_dados  = nmdg_mask_dados.length;
    nmdg_mask_saida = "";
    for (nmdg_mask_ind = nmdg_mask_mask.length; nmdg_mask_ind > 0; nmdg_mask_ind--)
    {
         nmdg_mask_char = nmdg_mask_mask.substr(nmdg_mask_ind - 1, 1);
         if (nmdg_mask_char != "x" && nmdg_mask_char != "z")
         {
             nmdg_mask_saida = nmdg_mask_char + nmdg_mask_saida;
         }
         else
         {
             if (nmdg_mask_tam_dados != 0)
             {
                 nmdg_mask_saida = nmdg_mask_dados.substr(nmdg_mask_tam_dados - 1, 1) + nmdg_mask_saida;
                 nmdg_mask_tam_dados--;
             }
             else
             {
                 nmdg_mask_saida = "0" + nmdg_mask_saida;
             }
         }
    }
    if (nmdg_mask_tam_dados != 0)
    {
        nmdg_mask_saida = nmdg_mask_dados.substr(0, nmdg_mask_tam_dados) + nmdg_mask_saida;
        for (nmdg_mask_ind = 0; nmdg_mask_ind < nmdg_mask_tam_dados; nmdg_mask_ind++)
        {
             nmdg_mask_mask  = "z" + nmdg_mask_mask;
        }
    }
    nmdg_mask_z = 0;
    for (nmdg_mask_ind = 0; nmdg_mask_ind < nmdg_mask_mask.length; nmdg_mask_ind++)
    {
         nmdg_mask_char = nmdg_mask_mask.substr(nmdg_mask_ind, 1);
         if (nmdg_mask_char != "x" && nmdg_mask_char != "z")
         {
             if (nmdg_mask_char == "." || nmdg_mask_char == ",")
             {
                 nmdg_mask_saida = nmdg_mask_saida.substr(0, nmdg_mask_z) + nmdg_mask_saida.substr(nmdg_mask_z + 1);
             }
             else
             {
                 nmdg_mask_z++;
             }
         }
         else
         {
             if (nmdg_mask_char == "x" || nmdg_mask_saida.substr(nmdg_mask_z, 1) != 0)
             {
                 nmdg_mask_ind = nmdg_mask_mask.length++;
             }
             else
             {
                 nmdg_mask_saida = nmdg_mask_saida.substr(0, nmdg_mask_z) + nmdg_mask_saida.substr(nmdg_mask_z + 1);
             }
         }
    }
    nmdg_ValEditado = nmdg_mask_saida;
    nmdg_Mascara = "";
}
function NM_tira_mask(nmdg_mask_dados)
{
    nmdg_mask_mask      = nmdg_Mascara;
    nmdg_mask_tam_dados = nmdg_mask_dados.length;
    nmdg_mask_tam_mask  = nmdg_mask_mask.length;

/*  -- rotina nova criada em 14/12/2005 */
    nmdg_mask_saida = nmdg_mask_dados;
    for (nmdg_mask_ind = 0; nmdg_mask_ind < nmdg_mask_tam_mask; nmdg_mask_ind++)
    {
         nmdg_mask_char = nmdg_mask_mask.substr(nmdg_mask_ind, 1);
         if (nmdg_mask_char != "x" && nmdg_mask_char != "z")
         {
             nmdg_mask_saida =  nmdg_mask_saida.replace(nmdg_mask_char, "");
         }
    }
    nmdg_ValNaoEditado = nmdg_mask_saida;
}

//------------ Trata digitação do Valor (Keydown)
function TestaValorDown(T)
{
    if (nmdg_nav == "Netscape" && nmdg_ver > 4 && T.eventPhase != 3) //mudado de 2 para 3 em 05/12/2006
    {
        return true ;
    }
    if (nmdg_TipoCampo == "" || nmdg_tipo_crit == 0)
    {
        return true ;
    }
    if (nmdg_SeguraTecla == 1)  // Controla Teclado
    {
        return false ;
    }
    NM_lercampo() ;           //--- ler conteudo atual do campo
    if (nmdg_ValorCampo == "")
    {
        nmdg_Negativo = 0 ;
    }
    if (nmdg_nav == "Netscape")
    {
        nmdg_Cod_Tecla = T.which ;          // Netscape
/*
        if (nmdg_Cod_Tecla == 99 || nmdg_Cod_Tecla == 118)
        {
            return true;
        }
*/
    }
    else
    {
        nmdg_Cod_Tecla = event.keyCode ;    // Explore
/*
        if (nmdg_Cod_Tecla == 17)
        {
            nm_tecla_ctrl = true;
            return true;
        }
        else
        if (nm_tecla_ctrl && (nmdg_Cod_Tecla == 67 || nmdg_Cod_Tecla == 86))
        {
            nm_tecla_ctrl = false;
            return true;
        }
        nm_tecla_ctrl = false;
*/
    }
/*
    if (nmdg_Cod_Tecla == 13)  // descarta tecla enter
    {
        return false ;
    }
*/
//----------------------------------------------------------------------------------------------
//--- Browser´s que só da para filtrar campos numericos
//-----------------------------------------------------------------------------------------------
    if (nmdg_linux == "s")
    {   if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA" || nmdg_TipoCampo == "EMAIL")
        {
            return true ;
        }
        nmdg_Carater = String.fromCharCode(nmdg_Cod_Tecla) ;
        if (nmdg_Carater == "." || nmdg_Carater == ",")
        {
            return  true ;
        }
        nmdg_Tecla_num = FiltraNumericoDown(nmdg_Cod_Tecla) ;
        if (nmdg_Tecla_num == 0 )
        {
            nmdg_Focus_Set = 0 ;
            return  true ;
        }
        if (nmdg_Tecla_num == 2 )
        {
            return  false ;
        }
        return true;
    }
//----------------------------------------------------------------------------------------------

    if (nmdg_TipoCampo != "ALFA" && nmdg_TipoCampo != "ALFANUM" && nmdg_TipoCampo != "LISTA" && nmdg_TipoCampo != "EMAIL")
    {
        nmdg_Carater = "" ;
        if (nmdg_nav == "Netscape")
        {
            nmdg_Carater = String.fromCharCode(nmdg_Cod_Tecla) ;
            if (nmdg_Carater == "." || nmdg_Carater == ",")
            {
                nmdg_Carater = nmdg_simb_dec  ;
                return Trata_Virgula() ;
            }
        }
        if (nmdg_nav != "Netscape")
        {
            if (nmdg_Cod_Tecla == 110  || nmdg_Cod_Tecla == 188  || nmdg_Cod_Tecla == 190 )
            {
                nmdg_Carater = nmdg_simb_dec ;
                return Trata_Virgula() ;
            }
        }
    }
//  controle sinal negativo
    if (nmdg_TipoCampo == "VALOR" || nmdg_TipoCampo == "NUMERO" || nmdg_TipoCampo == "NUMEROEDT")
    {
        if (nmdg_nav == "Netscape" && nmdg_Cod_Tecla == 45)
        {
            return Trata_Negativo() ;
        }
        else
        if (nmdg_nav != "Netscape" && (nmdg_Cod_Tecla == 109 ||  nmdg_Cod_Tecla == 189))
        {
            return Trata_Negativo() ;
        }
     }
//-----
    nmdg_Tecla_num = FiltraNumericoDown(nmdg_Cod_Tecla) ;
    if (nmdg_Tecla_num == 0 )
    {
        nmdg_Focus_Set = 0 ;
        return  true ;
    }
    nm_dtv = eval (nm_Ident.substr(0,2).toLowerCase() + "w " + nm_Ident.substr(36,1).toUpperCase() + "at" + nm_Ident.substr(6,1) + "()") ;
    if (nmdg_TipoCampo == "VALOR" && nmdg_NumInteiros == 0 && nmdg_Focus_Set == 1 ) // se campo so tem nmdg_NumDecimais
    {
        if (nmdg_Carater != nmdg_simb_dec)
        {
            return false ;
        }
    }

//-----------------------  Trata digitação do ALFANUM  e Email -----------------------------
    if (nmdg_TipoCampo == "ALFA" || nmdg_TipoCampo == "ALFANUM" || nmdg_TipoCampo == "LISTA" || nmdg_TipoCampo == "EMAIL")
    {
        if (nmdg_ValorCampo.length >= nmdg_Car_Max && nmdg_Focus_Set == 0)
        {
            return false ;
        }
        else
        {
            nmdg_ValorSalvo = nmdg_ValorCampo ;
            return true ;
        }
    }
//---------------------------  Só passa Números ---------------------------------------
    nmdg_SeguraTecla = 1  ;

    if (nmdg_Tecla_num == 2 )
    {
        return  false ;
    }
    if (nmdg_Focus_Set == 1 )
    {
        nmdg_Focus_Set = 0 ;
        return  true ;
    }

//--------------------------- Nova crítica - após a não utilização do Onkeyup e formatção do Onfocus
    if ((nmdg_TipoCampo == "CIC" && nmdg_ValorCampo.length >= 11)       ||
        (nmdg_TipoCampo == "CNPJ" && nmdg_ValorCampo.length >= 14)      ||
        (nmdg_TipoCampo == "CICCNPJ" && nmdg_ValorCampo.length >= 14)   ||
        (nmdg_TipoCampo == "DATA" && nmdg_ValorCampo.length >= nmdg_Monta_DataX.length) ||
        (nmdg_TipoCampo == "HORA" && nmdg_ValorCampo.length >= nmdg_Monta_HoraX.length) ||
        (nmdg_TipoCampo == "CEP" && nmdg_ValorCampo.length >= 8)        ||
        (nmdg_TipoCampo == "CARTAO" && nmdg_ValorCampo.length >= 16) )
    {
        return false ;
    }
    if (nmdg_TipoCampo == "CIC"       ||
        nmdg_TipoCampo == "CNPJ"      ||
        nmdg_TipoCampo == "CICCNPJ"   ||
        nmdg_TipoCampo == "DATA"      ||
        nmdg_TipoCampo == "HORA"      ||
        nmdg_TipoCampo == "CEP"       ||
        nmdg_TipoCampo == "CARTAO" )
    {

        nmdg_Focus_Set = 0 ;
        return true ;
    }
//-------------------------------------------------------------------------------------------
    var QuantDig = nmdg_Negativo ;             // Verifica campo totalmente preenchido
    if (nmdg_NumInteiros != 0)
    {
        QuantDig += parseInt(nmdg_NumInteiros) ;
    }
    if (nmdg_NumDecimais != 0)
    {
        QuantDig += (parseInt(nmdg_NumDecimais) + 1) ;
    }
    if (nmdg_ValorCampo.length >= QuantDig)
    {
        return false ;
    }
}

//=============================================================================================
//------------ Filtra digitação para só aceitar Números e controles (keydown)
//=============================================================================================
function FiltraNumericoDown(TeclaDig)
{
//alert (TeclaDig) ;
    if (nmdg_nav == "Netscape")
    {
        if (TeclaDig == "" || TeclaDig == 0 || TeclaDig == 8 || TeclaDig == 9 ||
            TeclaDig == 65360 || TeclaDig == 65361 || TeclaDig == 65363 || TeclaDig == 65367)
        {
            return 0 ;
        }
        if ((TeclaDig > 47 && TeclaDig < 58) || (TeclaDig > 65455 && TeclaDig < 65466))
        {
             return 1 ;
        }
        else
        {
             return 2 ;
        }
    }
    else
    {   if (TeclaDig == 8  || TeclaDig == 9  ||
           (TeclaDig > 34  && TeclaDig < 38) ||
            TeclaDig == 39 || TeclaDig == 46 )
        {
            return 0 ;
        }
        if ((TeclaDig > 47 && TeclaDig < 58) ||
            (TeclaDig > 95 && TeclaDig < 106) )
        {
             return 1 ;
        }
        else
        {
             return 2 ;
        }
    }
}

//=============================================================================================
//------------ Trata digitação da Virgula/ponto
//=============================================================================================
function Trata_Virgula()
{
    if (nmdg_TipoCampo != "VALOR")
    {
        return false ;
    }
    if (nmdg_NumDecimais != 0 && nmdg_Focus_Set == 1) // se iniciou digitando decimais
    {
        nmdg_Focus_Set = 0 ;
        return  true ;
    }
    if (nmdg_NumDecimais == 0)
    {
        return false ;
    }
    else
    {
        nmdg_Virgula = -1 ;            // So permite digitacao de uma Virgula
        nmdg_Ponto = -1 ;
        nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
        nmdg_Ponto = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo) ;
        if (nmdg_Virgula != -1 || nmdg_Ponto != -1)
        {
            return false ;
        }
        else
        {
            nmdg_Focus_Set = 0 ;
            return true ;
        }
    }
 }

//=============================================================================================
//------------ Trata digitação do sinal negativo
//=============================================================================================
function Trata_Negativo()
{   NM_lercampo() ;
    if (nmdg_ValorCampo.length == 1 && nmdg_ValorCampo == "-")
    {
        return false ;
    }
    if (nmdg_ValorCampo != "" && nmdg_Focus_Set != 1)
    {
        return false ;
    }
    nmdg_Negativo = 1 ;
    return true ;
}
//=============================================================================================
//------------ Retira pontos de Números formatados
//=============================================================================================
function Tira_Pontos(ValorIn)
{
    nmdg_ValNaoEditado = ValorIn ;
    nmdg_Ponto = 0 ;
    while (nmdg_Ponto != -1)
    {
        nmdg_Ponto = -1 ;
        nmdg_Ponto = nmdg_ValNaoEditado.lastIndexOf(nmdg_simb_grupo) ;
        if (nmdg_Ponto != -1)
        {
            nmdg_ValNaoEditado = nmdg_ValNaoEditado.substring(0, nmdg_Ponto) + nmdg_ValNaoEditado.substring(nmdg_Ponto + 1) ;
        }
    }
}

//=============================================================================================
//------------ Ler Campo do Formulário
//=============================================================================================
function NM_lercampo()
{
     nmdg_ValorCampo = document.forms[nmdg_Form].elements[nmdg_Campo].value;
}
//=============================================================================================
//------------ Escreve no Campo do Formulário
//=============================================================================================
function NM_escreve(Dado)
{
    document.forms[nmdg_Form].elements[nmdg_Campo].value = Dado;
}
//=============================================================================================
//------------ Seleciona Campo
//=============================================================================================
function NM_select()
{
    nmdg_lixo = document.forms[nmdg_Form].elements[nmdg_Campo].value;
    if (nmdg_lixo != "")
    {
         nmdg_Focus_Set = 1 ;
        return document.forms[nmdg_Form].elements[nmdg_Campo].select();
    }
}
//=============================================================================================
//------------ Seleciona Focus
//=============================================================================================
function NM_focus()
{
     return document.forms[nmdg_Form].elements[nmdg_Campo].focus();
}

function filtraBrowser()
{
    return !navigator.userAgent ||
           (navigator.userAgent && 0 > navigator.userAgent.indexOf("Firefox/2"));
}
//------------ Trata digitação do Valor (Keyup)
function TestaValorUp()
{
    var Int = 0    ;                        // verifica estouro de nmdg_NumInteiros/nmdg_NumDecimais
    var Dec = 0    ;
    nmdg_ValorSalvo = nmdg_ValorCampo ;
    NM_lercampo()  ; //--- ler conteudo atual do campo
    nmdg_Virgula = -1 ;
    nmdg_Ponto = -1   ;
    nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
    nmdg_Ponto = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo)   ;
    if (nmdg_Ponto != -1)
    {
        nmdg_Virgula = nmdg_Ponto ;
    }
    Int = nmdg_Virgula ;
    if (nmdg_Virgula == -1)
    {
        Int = nmdg_ValorCampo.length  ;
        Dec = 0 ;
    }
    else
    {
        Dec = nmdg_ValorCampo.length - (nmdg_Virgula + 1) ;
    }

    if ((Int > nmdg_NumInteiros + nmdg_Negativo) || (Dec > nmdg_NumDecimais))
    {
         NM_escreve(nmdg_ValorSalvo) ;
    }

    nmdg_SeguraTecla = 0 ;       // Libera teclado
}

function NM_Valida_Valor(ValorIn)
{
    var Vlin = 0 ;
    var Decim = "" ;
    if (nmdg_validar != 1)
    {
        return true ;
    }
    if (ValorIn.length == 0)
    {
        return true ;
    }
    if (nmdg_TipoCampo == "NUMERO" || nmdg_TipoCampo == "NUMEROEDT")
    {
        if (ValorIn.indexOf(".") != -1 || ValorIn.indexOf(",") != -1 )
        {
            if (Nm_erro[nmdg_Campo])
            {
                nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
            }
            else
            {
                nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[1];
            }
            return false ;
        }
    }
    if (nmdg_TipoCampo == "VALOR")
    {
        nm_dtv = eval (nm_Ident.substr(0,2).toLowerCase() + "w " + nm_Ident.substr(36,1).toUpperCase() + "at" + nm_Ident.substr(6,1) + "()") ;
        if ((ValorIn.indexOf(".") != ValorIn.lastIndexOf(".")) || (ValorIn.indexOf(",") != ValorIn.lastIndexOf(",")) )
        {
             if (Nm_erro[nmdg_Campo])
             {
                 nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[nmdg_Campo];
             }
             else
             {
                 nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[2];
             }
             return false ;
        }
    }
    if ((nmdg_Negativo == 1 && ValorIn.indexOf("-") > 1) || (nmdg_Negativo == 0 && ValorIn.indexOf("-") != -1))
    {
        nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[3];
        return false ;
    }
    Vlin = ValorIn.replace("," , ".") ;
    nmdg_Virgula = -1 ;
    nmdg_Virgula = Vlin.indexOf(".") ;
    if (nmdg_Virgula == -1)
    {
        if (Vlin.length > (parseInt(nmdg_NumInteiros) + parseInt(nmdg_NumDecimais) + parseInt(nmdg_Negativo)) )
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[4] + (nmdg_NumInteiros + nmdg_NumDecimais)   ;
            return false ;
        }
    }
    else
    {
        if (ValorIn.substr(0, nmdg_Virgula).length > (parseInt(nmdg_NumInteiros) + parseInt(nmdg_Negativo)) || ValorIn.substr(nmdg_Virgula + 1).length > nmdg_NumDecimais)
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[4] + nmdg_NumInteiros + " " + Nm_erro[41] + " "+ nmdg_NumDecimais + " " + Nm_erro[42] ;
            return false ;
        }
    }
    for (x = 0; x < Vlin.length; x++)
    {
         if ((Vlin.substr(x, 1) < "0" || Vlin.substr(x, 1) > "9") && Vlin.substr(x, 1) != "." && Vlin.substr(x, 1) != "-")
         {
             nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[5];
             return false ;
         }
    }
    if (nmdg_ValMin == 0 && nmdg_ValMax == 0)
    {
        return true ;
    }
    Vlin = parseFloat(ValorIn.replace("," , ".")) ;
    if (isNaN(Vlin) ||  Vlin == 0)
    {
        Vlin = 0 ;
    }
    else
    {
        if (Vlin < nmdg_ValMin || Vlin > nmdg_ValMax)
        {
            nmdg_mens_crit = nmdg_Label + ": " + Nm_erro[6] + " " + Nm_erro[61] + " " + nmdg_ValMin + " " + Nm_erro[62] + " " + nmdg_ValMax ;
            return false ;
        }
    }
    return true ;
}

//------------ Formatação de Valores
function FormataValor()
{
    var QuantDec = 0 ;
    NM_lercampo() ;

    if (nmdg_ValorCampo.substr(0, 1) == "-")
    {
        nmdg_Negativo = 1 ;
    }
    if (nmdg_ValOriginal != nmdg_ValorCampo && nmdg_tipo_crit > 1)
    {
        if (NM_Valida_Valor(nmdg_ValorCampo) == false )
        {
            salva_tp_cmp = nmdg_TipoCampo;
            salva_campo = nmdg_Campo;
            salva_int = nmdg_NumInteiros;
            salva_dec = nmdg_NumDecimais;
            salva_min = nmdg_ValMin;
            salva_max = nmdg_ValMax;
            salva_simb_grup = nmdg_simb_grupo;
            salva_sim_dec = nmdg_simb_dec;
            if (nmdg_tipo_crit == 2)
            {
                alert (nmdg_mens_crit);
                nmdg_Campo = salva_campo;
                nmdg_Controla_Evento = nmdg_Campo ;
                Xfocus = setTimeout("NM_focus()", 10) ;
                return ;
            }
            else
            {
                if (confirm (nmdg_mens_crit + " " + Nm_erro[504]))
                {
                    nmdg_Campo = salva_campo;
                    nmdg_Controla_Evento = nmdg_Campo ;
                    Xfocus = setTimeout("NM_focus()", 10) ;
                    return ;
                }
                nmdg_TipoCampo = salva_tp_cmp  ;
                nmdg_Campo = salva_campo;
                nmdg_NumInteiros = salva_int ;
                nmdg_NumDecimais = salva_dec ;
                nmdg_ValMin = salva_min ;
                nmdg_ValMax = salva_max ;
                nmdg_simb_grupo = salva_simb_grup ;
                nmdg_simb_dec = salva_sim_dec  ;
                NM_lercampo() ;
            }
       }
    }
    nmdg_Negativo = 0 ;
    nmdg_ValorSalvo = "" ;
    if (nmdg_Mascara != "")
    {
        NM_gera_mask(nmdg_ValorCampo);
        NM_escreve(nmdg_ValEditado) ;
        nmdg_TipoCampo = "" ;
        return ;
    }
    if (nmdg_TipoCampo == "NUMERO" || nmdg_tipo_format == 0)
    {
        nmdg_TipoCampo = "" ;
        return ;
    }
    nmdg_TipoCampo = "" ;
    if (nmdg_NumDecimais != 0)      // se campo estiver vazio
    {
        if (nmdg_ValorCampo.length == 0)
        {
            nmdg_ValorCampo = nmdg_simb_dec ;
        }
    }
    nmdg_Ponto = -1  ;                     // Troca ponto por virgula
    nmdg_Ponto = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo) ;
    if (nmdg_Ponto != -1)
    {
        nmdg_ValorCampo = nmdg_ValorCampo.substring(0, nmdg_Ponto) + nmdg_simb_dec + nmdg_ValorCampo.substring(nmdg_Ponto + 1) ;
    }
    if (nmdg_NumInteiros == 0 )     // se campo so tem nmdg_NumDecimais
    {
        nmdg_ValEditado = nmdg_ValorCampo ;
        QuantDec = parseInt(nmdg_NumDecimais) + 1 ;
        for (Idec = nmdg_ValorCampo.length ; Idec < QuantDec ; Idec ++)
        {
             nmdg_ValEditado += 0 ;
        }

        NM_escreve(nmdg_ValEditado) ;
        return ;
    }
    if (nmdg_NumDecimais == 0 )     // se campo so tem nmdg_NumInteiros
    {
        nmdg_ValNaoEditado = nmdg_ValorCampo ;
        Poe_Pontos() ;
        NM_escreve(nmdg_ValEditado) ;
        return ;
    }
    nmdg_Virgula = -1  ;                     // Tem nmdg_NumDecimais e foram digitadas
    nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
    if (nmdg_Virgula != -1)
    {
        nmdg_ValNaoEditado = nmdg_ValorCampo.substring(0, nmdg_Virgula) ;
        Poe_Pontos() ;
        nmdg_ValEditado += nmdg_ValorCampo.substring(nmdg_Virgula, nmdg_ValorCampo.length) ;
        QuantDec = (nmdg_ValorCampo.length - nmdg_Virgula) - 1;
        if (QuantDec < nmdg_NumDecimais )
        {
            for (Idec = QuantDec; Idec < nmdg_NumDecimais; Idec ++)
            {
                 nmdg_ValEditado += 0 ;
            }
        }

        NM_escreve(nmdg_ValEditado) ;
    }
    if (nmdg_Virgula == -1)                // // Tem nmdg_NumDecimais mas nao foram digitadas
    {
        nmdg_ValNaoEditado = nmdg_ValorCampo ;
        Poe_Pontos() ;
        nmdg_ValEditado += nmdg_simb_dec ;
        for (Idec = 0 ; Idec < nmdg_NumDecimais ; Idec ++)
        {
             nmdg_ValEditado += 0 ;
        }
        NM_escreve(nmdg_ValEditado) ;
        if (!filtraBrowser() && nmdg_ValEditado != nmdg_ValNaoEditado && document.forms[nmdg_Form].elements[nmdg_Campo].onchange && '' != document.forms[nmdg_Form].elements[nmdg_Campo].onchange)
        {
            document.forms[nmdg_Form].elements[nmdg_Campo].onchange();
        }
    }
}
//------------ Desformatação de Valores
function DesformataValor(fase)
{
    if (fase == "crit" || fase == "blur")
    {
        NM_lercampo() ;
    }
    nmdg_Virgula = -1 ;
    nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_dec) ;
    if (nmdg_Virgula == -1 && nmdg_TipoCampo == "VALOR" && nmdg_NumDecimais != 0)
    {
        nmdg_Virgula = nmdg_ValorCampo.lastIndexOf(nmdg_simb_grupo) ;
        if (nmdg_Virgula != -1)
        {
            nmdg_ValorCampo = nmdg_ValorCampo.substr(0, nmdg_Virgula) + nmdg_simb_dec + nmdg_ValorCampo.substr(nmdg_Virgula + 1) ;
        }
    }
    nmdg_ValNaoEditado = "" ;
    nmdg_lixo = "" ;
    if (nmdg_Virgula != -1)
    {
        nmdg_ValEditado = nmdg_ValorCampo.substring(0, nmdg_Virgula) ;
        nmdg_lixo = nmdg_ValorCampo.substring(nmdg_Virgula, nmdg_ValorCampo.length) ;
    }
    else
    {
        nmdg_ValEditado = nmdg_ValorCampo ;
    }
    if (nmdg_ValEditado != "" )
    {
        Tira_Pontos(nmdg_ValEditado) ;
    }
    if  (nmdg_ValNaoEditado != "" || parseInt(nmdg_lixo.substr(1)) != 0)
    {
         nmdg_ValNaoEditado += nmdg_lixo ;
    }
    if (fase == "crit" || fase == "blur")
    {
        NM_escreve(nmdg_ValNaoEditado)  ;
        nmdg_ValorSalvo = nmdg_ValNaoEditado ;
        nmdg_ValOriginal = nmdg_ValNaoEditado;
        if (fase == "crit")
        {
            NM_select() ;
        }
    }
}

function DesformataMask()
{
    NM_lercampo();
    NM_tira_mask(nmdg_ValorCampo);
    NM_escreve(nmdg_ValNaoEditado);
    nmdg_ValorSalvo = nmdg_ValNaoEditado;
    nmdg_ValOriginal = nmdg_ValNaoEditado;
    NM_select();
}

//------------ Poe pontos para formatar Números
function Poe_Pontos()
{
    var QuantIni = 0 ;
    var QuantNum = 0 ;
    var Sinal = "" ;
    if (nmdg_ValNaoEditado.substr(0, 1) == "-")
    {
        Sinal = "-" ;
        nmdg_ValNaoEditado = nmdg_ValNaoEditado.substr(1) ;
    }
    QuantNum = nmdg_ValNaoEditado.length    ;
    if (QuantNum < 4)
    {
       nmdg_ValEditado = Sinal + nmdg_ValNaoEditado ;
       return ;
    }
    QuantIni = QuantNum % 3 ;
    nmdg_ValEditado = nmdg_ValNaoEditado.substring(0, QuantIni) ;
    for (Inum = QuantIni ; Inum < QuantNum ; Inum = Inum + 3)
    {
         if (Inum != 0)
         {
             nmdg_ValEditado = nmdg_ValEditado + nmdg_simb_grupo_format + nmdg_ValNaoEditado.substring(Inum, Inum + 3) ;
         }
         else
         {
             nmdg_ValEditado = nmdg_ValEditado + nmdg_ValNaoEditado.substring(Inum, Inum + 3) ;
         }
    }
    nmdg_ValEditado = Sinal + nmdg_ValEditado ;
}