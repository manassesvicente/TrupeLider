<?php

class app_ParticipantePistaCompetencia_res_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $resumo_campos;
   var $array_total_participante;
   var $array_total_pista;

   var $arquivo;
   var $sc_proc_grid; 

   //---- Construtor
   function app_ParticipantePistaCompetencia_xml()
   {
      $this->nm_data   = new nm_data("pt_br");
   }

   //---- Monta XML
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- Inicializa variáveis da classe
   function inicializa_vars()
   {
      require_once($this->Ini->path_aplicacao . "app_ParticipantePistaCompetencia_resumo.class.php"); 
      $this->nm_data    = new nm_data("pt_br");
      $this->arquivo    = "sc_xml";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_app_ParticipantePistaCompetencia";
      //$this->arquivo   .= "_" . session_id();
      $this->arquivo   .= ".xml";
      $this->Res       = new app_ParticipantePistaCompetencia_resumo("out");
      $this->prep_modulos("Res");
      $this->resumo_campos = array();
      $this->array_total_participante = array();
      $this->array_total_pista = array();
   }

   //---- Preparação dos módulos
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- Grava XML com resultado da consulta
   function grava_arquivo()
   {
      $xml_f      = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      $this->Res->resumo_export();
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['arr_total']['participante'] as $campo_participante => $dados_participante)
      {
         $this->resumo_campos = $dados_participante;
         $this->grava_linha($xml_f, $dados_participante[6], 0);
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['arr_total']['pista'][$campo_participante] as $campo_pista => $dados_pista)
         {
            $this->resumo_campos = $dados_pista;
            $this->grava_linha($xml_f, $dados_pista[6], 1);
         }
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
   }

   //----- Grava uma linha do XML no arquivo
   function grava_linha($xml_f, $campo, $nivel)
   {
      $xml_registro  = "<app_ParticipantePistaCompetencia";
      $xml_registro .= " Campo=\"" . str_repeat("   ", $nivel) . $this->trata_dados($campo) . "\"";
      $valor_campo   = $this->resumo_campos[0];
      nmgp_Form_Num_Val($valor_campo, ".", ",");
      $xml_registro .= " Registros=\"" . $this->trata_dados($valor_campo) . "\"";
      $valor_campo   = $this->resumo_campos[1];
      $xml_registro .= " Nota_-_Média=\"" . $this->trata_dados($valor_campo) . "\"";
      $valor_campo   = $this->resumo_campos[2];
      $xml_registro .= " Resultado_-_Média=\"" . $this->trata_dados($valor_campo) . "\"";
      $valor_campo   = $this->resumo_campos[3];
      $xml_registro .= " Nota_-_Total=\"" . $this->trata_dados($valor_campo) . "\"";
      $valor_campo   = $this->resumo_campos[4];
      $xml_registro .= " Resultado_-_Total=\"" . $this->trata_dados($valor_campo) . "\"";
      $xml_registro .= " />\r\n";
      fwrite($xml_f, $xml_registro);
   }

   //----- Trata caracteres não aceitos pelo XML
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =& str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      return ($str_temp);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- Monta HTML do XML
   function monta_html()
   {
      global $nm_url_saida;
?>
<HTML>
<HEAD>
 <TITLE>Relatório das Notas do Participante por Competência e Pista :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<BODY bgcolor="<?php echo $this->Ini->cor_bg_grid; ?>" <?php if ("" != $this->Ini->img_fun_pag) { echo "background=\"" . $this->Ini->path_img_modelo . "/"  . $this->Ini->img_fun_pag . "\""; } ?>>
 <style type="text/css">
 </style>
<FONT face="<?php echo $this->Ini->pag_fonte_tipo; ?>" color="<?php echo $this->Ini->cor_txt_pag; ?>" size="<?php echo $this->Ini->pag_fonte_tamanho; ?>">
O arquivo contendo o XML foi gerado em:
<BR>
<A href="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo; ?>" target="_blank"><FONT color="<?php echo $this->Ini->cor_link_pag; ?>"><B><?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo; ?></B></FONT></A>.
<BR>
Click no link para visualiza-lo ou use o bot&atilde;o direito, para salva-lo localmente.
<BR>
<input type="image" name="sc_b_sai" onclick="document.F0.submit()" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bvoltar.gif" title="Retornar" align="absmiddle"/> 
<FORM name="F0" method=post action="app_ParticipantePistaCompetencia.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="resumo"> 
</FORM> 
</FONT>
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
