<?php

class app_ParticipantePistaCompetencia_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $texto_tag;
   var $arquivo;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- Construtor
   function app_ParticipantePistaCompetencia_rtf()
   {
      $this->nm_data   = new nm_data("pt_br");
      $this->texto_tag = "";
   }

   //---- Monta RTF
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- Inicializa variáveis da classe
   function inicializa_vars()
   {
      require_once($this->Ini->path_third      . "/rtf/nm_rtf_class.php"); 
      $this->arquivo    = "sc_rtf";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_app_ParticipantePistaCompetencia";
      //$this->arquivo   .= "_" . session_id();
      $this->arquivo   .= ".rtf";
   }

   //----- Gera texto com tags com resultado da consulta
   function gera_texto_tag()
   {
      global
             $nm_nada;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_ParticipantePistaCompetencia']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_ParticipantePistaCompetencia']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_ParticipantePistaCompetencia']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca']))
      { 
          $participante = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][participante]; 
          $tmp_pos = strpos($participante, "##@@");
          if ($tmp_pos !== false)
          {
              $participante = substr($participante, 0, $tmp_pos);
          }
          $pista = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][pista]; 
          $tmp_pos = strpos($pista, "##@@");
          if ($tmp_pos !== false)
          {
              $pista = substr($pista, 0, $tmp_pos);
          }
          $competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][competencia]; 
          $tmp_pos = strpos($competencia, "##@@");
          if ($tmp_pos !== false)
          {
              $competencia = substr($competencia, 0, $tmp_pos);
          }
          $nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][nota_media]; 
          $tmp_pos = strpos($nota_media, "##@@");
          if ($tmp_pos !== false)
          {
              $nota_media = substr($nota_media, 0, $tmp_pos);
          }
          $resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][resultado_medio]; 
          $tmp_pos = strpos($resultado_medio, "##@@");
          if ($tmp_pos !== false)
          {
              $resultado_medio = substr($resultado_medio, 0, $tmp_pos);
          }
          $total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][total_nota]; 
          $tmp_pos = strpos($total_nota, "##@@");
          if ($tmp_pos !== false)
          {
              $total_nota = substr($total_nota, 0, $tmp_pos);
          }
          $total_resultado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['campos_busca'][total_resultado]; 
          $tmp_pos = strpos($total_resultado, "##@@");
          if ($tmp_pos !== false)
          {
              $total_resultado = substr($total_resultado, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['where_pesq_filtro'];
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT PARTICIPANTE, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT PARTICIPANTE, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT PARTICIPANTE, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT PARTICIPANTE, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = &$this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg());
         exit;
      }

      $this->texto_tag .= "<table border=1 width=100%>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['participante'])) ? $this->New_label['participante'] : "Participante"; 
          if ($Cada_col == "participante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pista'])) ? $this->New_label['pista'] : "Pista"; 
          if ($Cada_col == "pista" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['competencia'])) ? $this->New_label['competencia'] : "Competência"; 
          if ($Cada_col == "competencia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nota_media'])) ? $this->New_label['nota_media'] : "Nota - Média"; 
          if ($Cada_col == "nota_media" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['resultado_medio'])) ? $this->New_label['resultado_medio'] : "Resultado - Média"; 
          if ($Cada_col == "resultado_medio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total_nota'])) ? $this->New_label['total_nota'] : "Nota - Total"; 
          if ($Cada_col == "total_nota" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total_resultado'])) ? $this->New_label['total_resultado'] : "Resultado - Total"; 
          if ($Cada_col == "total_resultado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->texto_tag .= "<tr>\r\n";
         $this->participante = $rs->fields[0] ;  
         $this->pista = $rs->fields[1] ;  
         $this->competencia = $rs->fields[2] ;  
         $this->nota_media = $rs->fields[3] ;  
         $this->nota_media = (string)$this->nota_media;
         $this->resultado_medio = $rs->fields[4] ;  
         $this->resultado_medio = (string)$this->resultado_medio;
         $this->total_nota = $rs->fields[5] ;  
         $this->total_nota = (string)$this->total_nota;
         $this->total_resultado = $rs->fields[6] ;  
         $this->total_resultado = (string)$this->total_resultado;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_ParticipantePistaCompetencia']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- participante
   function NM_export_participante()
   {
         $this->texto_tag .= "<td>" . $this->participante . "</td>\r\n";
   }
   //----- pista
   function NM_export_pista()
   {
         $this->texto_tag .= "<td>" . $this->pista . "</td>\r\n";
   }
   //----- competencia
   function NM_export_competencia()
   {
         $this->texto_tag .= "<td>" . $this->competencia . "</td>\r\n";
   }
   //----- nota_media
   function NM_export_nota_media()
   {
         $this->texto_tag .= "<td>" . $this->nota_media . "</td>\r\n";
   }
   //----- resultado_medio
   function NM_export_resultado_medio()
   {
         $this->texto_tag .= "<td>" . $this->resultado_medio . "</td>\r\n";
   }
   //----- total_nota
   function NM_export_total_nota()
   {
         $this->texto_tag .= "<td>" . $this->total_nota . "</td>\r\n";
   }
   //----- total_resultado
   function NM_export_total_resultado()
   {
         $this->texto_tag .= "<td>" . $this->total_resultado . "</td>\r\n";
   }

   //----- Grava RTF com resultado da consulta
   function grava_arquivo_rtf()
   {
      $rtf = new RTF($this->Ini->path_third . "/rtf/nm_rtf_config.inc.php");
      $rtf->parce_HTML($this->texto_tag);
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      fwrite($rtf_f, $rtf->get_rtf());
      fclose($rtf_f);
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
   //---- Monta HTML do RTF
   function monta_html()
   {
      global $nm_url_saida;
?>
<HTML>
<HEAD>
 <TITLE>Relatório das Notas do Participante por Competência e Pista :: RTF</TITLE>
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
O arquivo contendo o RTF foi gerado em:
<BR>
<A href="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo; ?>" target="_blank"><FONT color="<?php echo $this->Ini->cor_link_pag; ?>"><B><?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo; ?></B></FONT></A>.
<BR>
Click no link para visualiza-lo ou use o bot&atilde;o direito, para salva-lo localmente.
<BR>
<input type="image" name="sc_b_sai" onclick="document.F0.submit()" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bvoltar.gif" title="Retornar" align="absmiddle"/> 
<FORM name="F0" method=post action="app_ParticipantePistaCompetencia.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
