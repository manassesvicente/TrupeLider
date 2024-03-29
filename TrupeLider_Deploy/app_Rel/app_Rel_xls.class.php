<?php

class app_Rel_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $xls_dados;
   var $xls_workbook;
   var $xls_col;
   var $xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $arquivo;
   //---- Construtor
   function app_Rel_xls()
   {
   }

   //---- Monta XLS
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- Inicializa variáveis da classe
   function inicializa_vars()
   {
      require_once($this->Ini->path_third . "/excel/Worksheet.php"); 
      require_once($this->Ini->path_third . "/excel/Workbook.php"); 
      $this->xls_col    = 0;
      $this->xls_row    = 0;
      $this->nm_data    = new nm_data("pt_br");
      $this->arquivo    = "sc_xls";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_app_Rel";
      $this->arquivo   .= ".xls";
      $xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      $this->xls_workbook = new Workbook($xls_f);
      $this->xls_dados = &$this->xls_workbook->add_worksheet('');
   }

   //----- Grava XLS com resultado da consulta
   function grava_arquivo()
   {
      global
             $nm_nada;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_Rel']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_Rel']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_Rel']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']))
      { 
          $id_votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca'][id_votado]; 
          $tmp_pos = strpos($id_votado, "##@@");
          if ($tmp_pos !== false)
          {
              $id_votado = substr($id_votado, 0, $tmp_pos);
          }
          $id_etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca'][id_etapa]; 
          $tmp_pos = strpos($id_etapa, "##@@");
          if ($tmp_pos !== false)
          {
              $id_etapa = substr($id_etapa, 0, $tmp_pos);
          }
          $id_competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca'][id_competencia]; 
          $tmp_pos = strpos($id_competencia, "##@@");
          if ($tmp_pos !== false)
          {
              $id_competencia = substr($id_competencia, 0, $tmp_pos);
          }
          $id_habilidade = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca'][id_habilidade]; 
          $tmp_pos = strpos($id_habilidade, "##@@");
          if ($tmp_pos !== false)
          {
              $id_habilidade = substr($id_habilidade, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq_filtro'];
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT ID_VOTADO, ID_GRUPO, ID_VOTANTE, ID_ETAPA, ID_COMPETENCIA, ID_HABILIDADE, RESULTADO from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = &$this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg());
         exit;
      }

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_votado'])) ? $this->New_label['id_votado'] : "Votado"; 
          if ($Cada_col == "id_votado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['id_grupo'])) ? $this->New_label['id_grupo'] : "ID_GRUPO"; 
          if ($Cada_col == "id_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['id_votante'])) ? $this->New_label['id_votante'] : "ID_VOTANTE"; 
          if ($Cada_col == "id_votante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['id_etapa'])) ? $this->New_label['id_etapa'] : "Etapa"; 
          if ($Cada_col == "id_etapa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['id_competencia'])) ? $this->New_label['id_competencia'] : "Competência"; 
          if ($Cada_col == "id_competencia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['id_habilidade'])) ? $this->New_label['id_habilidade'] : "Habilidade"; 
          if ($Cada_col == "id_habilidade" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['resultado'])) ? $this->New_label['resultado'] : "RESULTADO"; 
          if ($Cada_col == "resultado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->xls_dados->write_string($this->xls_row, $this->xls_col, $SC_Label);
              $this->xls_col++;
          }
      } 
      while (!$rs->EOF)
      {
         $this->xls_col = 0;
         $this->xls_row++;
         $this->id_votado = $rs->fields[0] ;  
         $this->id_votado = (string)$this->id_votado;
         $this->id_grupo = $rs->fields[1] ;  
         $this->id_grupo = (string)$this->id_grupo;
         $this->id_votante = $rs->fields[2] ;  
         $this->id_votante = (string)$this->id_votante;
         $this->id_etapa = $rs->fields[3] ;  
         $this->id_etapa = (string)$this->id_etapa;
         $this->id_competencia = $rs->fields[4] ;  
         $this->id_competencia = (string)$this->id_competencia;
         $this->id_habilidade = $rs->fields[5] ;  
         $this->id_habilidade = (string)$this->id_habilidade;
         $this->resultado = $rs->fields[6] ;  
         $this->resultado =  str_replace(",", ".", $this->resultado);
         $this->resultado = (strpos(strtolower($this->resultado), "e")) ? (float)$this->resultado : $this->resultado; 
         $this->resultado = (string)$this->resultado;
         //----- lookup - id_votado
         $this->look_id_votado = $this->id_votado; 
         $this->Lookup->lookup_id_votado($this->look_id_votado, $this->id_votado) ; 
         $this->look_id_votado = ($this->look_id_votado == "&nbsp;") ? "" : $this->look_id_votado; 
         //----- lookup - id_grupo
         $this->look_id_grupo = $this->id_grupo; 
         $this->Lookup->lookup_id_grupo($this->look_id_grupo, $this->id_grupo) ; 
         $this->look_id_grupo = ($this->look_id_grupo == "&nbsp;") ? "" : $this->look_id_grupo; 
         //----- lookup - id_votante
         $this->look_id_votante = $this->id_votante; 
         $this->Lookup->lookup_id_votante($this->look_id_votante, $this->id_votante) ; 
         $this->look_id_votante = ($this->look_id_votante == "&nbsp;") ? "" : $this->look_id_votante; 
         //----- lookup - id_etapa
         $this->look_id_etapa = $this->id_etapa; 
         $this->Lookup->lookup_id_etapa($this->look_id_etapa, $this->id_etapa) ; 
         $this->look_id_etapa = ($this->look_id_etapa == "&nbsp;") ? "" : $this->look_id_etapa; 
         //----- lookup - id_competencia
         $this->look_id_competencia = $this->id_competencia; 
         $this->Lookup->lookup_id_competencia($this->look_id_competencia, $this->id_competencia) ; 
         $this->look_id_competencia = ($this->look_id_competencia == "&nbsp;") ? "" : $this->look_id_competencia; 
         //----- lookup - id_habilidade
         $this->look_id_habilidade = $this->id_habilidade; 
         $this->Lookup->lookup_id_habilidade($this->look_id_habilidade, $this->id_habilidade) ; 
         $this->look_id_habilidade = ($this->look_id_habilidade == "&nbsp;") ? "" : $this->look_id_habilidade; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $rs->MoveNext();
      }
      $rs->Close();
      $this->xls_workbook->close();
   }
   //----- id_votado
   function NM_export_id_votado()
   {
         $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->look_id_votado);
         $this->xls_col++;
   }
   //----- id_grupo
   function NM_export_id_grupo()
   {
         $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->look_id_grupo);
         $this->xls_col++;
   }
   //----- id_votante
   function NM_export_id_votante()
   {
         $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->look_id_votante);
         $this->xls_col++;
   }
   //----- id_etapa
   function NM_export_id_etapa()
   {
         $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->look_id_etapa);
         $this->xls_col++;
   }
   //----- id_competencia
   function NM_export_id_competencia()
   {
         $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->look_id_competencia);
         $this->xls_col++;
   }
   //----- id_habilidade
   function NM_export_id_habilidade()
   {
         $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->look_id_habilidade);
         $this->xls_col++;
   }
   //----- resultado
   function NM_export_resultado()
   {
         if (is_numeric($this->resultado))
         {
             $Format = &$this->xls_workbook->addformat();
             $Format->set_align('right');
             $Format->set_num_format('#,##0.00');
             $this->xls_dados->write_number($this->xls_row, $this->xls_col, $this->resultado, $Format);
         }
         else
         {
             $this->xls_dados->write_string($this->xls_row, $this->xls_col, $this->resultado);
         }
         $this->xls_col++;
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
   //---- Monta HTML do XLS
   function monta_html()
   {
      global $nm_url_saida;
?>
<HTML>
<HEAD>
 <TITLE>Consulta em app_Rel :: Excel</TITLE>
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
O arquivo contendo o XLS foi gerado em:
<BR>
<A href="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo; ?>" target="_blank"><FONT color="<?php echo $this->Ini->cor_link_pag; ?>"><B><?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo; ?></B></FONT></A>.
<BR>
Click no link para visualiza-lo ou use o bot&atilde;o direito, para salva-lo localmente.
<BR>
<input type="image" name="sc_b_sai" onclick="document.F0.submit()" accesskey="" border="0" src="<?php echo $this->Ini->path_botoes ?>/nm_scriptcase3_green_bvoltar.gif" title="Retornar" align="absmiddle"/> 
<FORM name="F0" method=post action="app_Rel.php"> 
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
