<?php

class app_LiderPistaCompetencia_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $arquivo;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- Construtor
   function app_LiderPistaCompetencia_xml()
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
      $this->nm_data    = new nm_data("pt_br");
      $this->arquivo    = "sc_xml";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_app_LiderPistaCompetencia";
      //$this->arquivo   .= "_" . session_id();
      $this->arquivo   .= ".xml";
   }

   //----- Grava XML com resultado da consulta
   function grava_arquivo()
   {
      global
             $nm_nada;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_LiderPistaCompetencia']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_LiderPistaCompetencia']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_LiderPistaCompetencia']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca']))
      { 
          $lider = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][lider]; 
          $tmp_pos = strpos($lider, "##@@");
          if ($tmp_pos !== false)
          {
              $lider = substr($lider, 0, $tmp_pos);
          }
          $pista = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][pista]; 
          $tmp_pos = strpos($pista, "##@@");
          if ($tmp_pos !== false)
          {
              $pista = substr($pista, 0, $tmp_pos);
          }
          $competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][competencia]; 
          $tmp_pos = strpos($competencia, "##@@");
          if ($tmp_pos !== false)
          {
              $competencia = substr($competencia, 0, $tmp_pos);
          }
          $nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][nota_media]; 
          $tmp_pos = strpos($nota_media, "##@@");
          if ($tmp_pos !== false)
          {
              $nota_media = substr($nota_media, 0, $tmp_pos);
          }
          $resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][resultado_medio]; 
          $tmp_pos = strpos($resultado_medio, "##@@");
          if ($tmp_pos !== false)
          {
              $resultado_medio = substr($resultado_medio, 0, $tmp_pos);
          }
          $total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][total_nota]; 
          $tmp_pos = strpos($total_nota, "##@@");
          if ($tmp_pos !== false)
          {
              $total_nota = substr($total_nota, 0, $tmp_pos);
          }
          $total_resultado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['campos_busca'][total_resultado]; 
          $tmp_pos = strpos($total_resultado, "##@@");
          if ($tmp_pos !== false)
          {
              $total_resultado = substr($total_resultado, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq_filtro'];
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT LIDER, PISTA, COMPETENCIA, NOTA_MEDIA, RESULTADO_MEDIO, TOTAL_NOTA, TOTAL_RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = &$this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg());
         exit;
      }

      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      while (!$rs->EOF)
      {
         $this->xml_registro = "<app_LiderPistaCompetencia";
         $this->lider = $rs->fields[0] ;  
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
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompetencia']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);

      $rs->Close();
   }
   //----- lider
   function NM_export_lider()
   {
         $this->xml_registro .= " lider =\"" . $this->trata_dados($this->lider) . "\"";
   }
   //----- pista
   function NM_export_pista()
   {
         $this->xml_registro .= " pista =\"" . $this->trata_dados($this->pista) . "\"";
   }
   //----- competencia
   function NM_export_competencia()
   {
         $this->xml_registro .= " competencia =\"" . $this->trata_dados($this->competencia) . "\"";
   }
   //----- nota_media
   function NM_export_nota_media()
   {
         $this->xml_registro .= " nota_media =\"" . $this->trata_dados($this->nota_media) . "\"";
   }
   //----- resultado_medio
   function NM_export_resultado_medio()
   {
         $this->xml_registro .= " resultado_medio =\"" . $this->trata_dados($this->resultado_medio) . "\"";
   }
   //----- total_nota
   function NM_export_total_nota()
   {
         $this->xml_registro .= " total_nota =\"" . $this->trata_dados($this->total_nota) . "\"";
   }
   //----- total_resultado
   function NM_export_total_resultado()
   {
         $this->xml_registro .= " total_resultado =\"" . $this->trata_dados($this->total_resultado) . "\"";
   }

   //----- Trata caracteres não aceitos pelo XML
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
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
 <TITLE>Relatório das Notas do Líder por Competência por Pista :: XML</TITLE>
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
<FORM name="F0" method=post action="app_LiderPistaCompetencia.php"> 
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
