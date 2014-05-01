<?php

class app_Rel_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- Construtor
   function app_Rel_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (!empty($_SESSION['sc_session'][$this->sc_page]['app_Rel']['campos_busca']))
      { 
          $this->id_votado = $_SESSION['sc_session'][$this->sc_page]['app_Rel']['campos_busca']['id_votado']; 
          $tmp_pos = strpos($this->id_votado, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_votado = substr($this->id_votado, 0, $tmp_pos);
          }
          $this->id_etapa = $_SESSION['sc_session'][$this->sc_page]['app_Rel']['campos_busca']['id_etapa']; 
          $tmp_pos = strpos($this->id_etapa, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_etapa = substr($this->id_etapa, 0, $tmp_pos);
          }
          $this->id_competencia = $_SESSION['sc_session'][$this->sc_page]['app_Rel']['campos_busca']['id_competencia']; 
          $tmp_pos = strpos($this->id_competencia, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_competencia = substr($this->id_competencia, 0, $tmp_pos);
          }
          $this->id_habilidade = $_SESSION['sc_session'][$this->sc_page]['app_Rel']['campos_busca']['id_habilidade']; 
          $tmp_pos = strpos($this->id_habilidade, "##@@");
          if ($tmp_pos !== false)
          {
              $this->id_habilidade = substr($this->id_habilidade, 0, $tmp_pos);
          }
      } 
   }

   //---- Totalização na quebra geral
   function quebra_geral()
   {
      global $nada , $id_votado, $id_grupo, $id_votante, $id_etapa, $id_competencia, $id_habilidade;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral'][0] = "Total Geral" ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['contr_total_geral'] = "OK";
   } 

   //----- Quebra de id_votado
   function quebra_id_votado($id_votado, $arg_sum_id_votado) 
   {
      global $tot_id_votado , $id_grupo, $id_votante, $id_etapa, $id_competencia, $id_habilidade;  
      $tot_id_votado = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'])) 
      { 
         $nm_comando .= " where ID_VOTADO" . $arg_sum_id_votado ; 
      } 
      else 
      { 
         $nm_comando .= " and ID_VOTADO" . $arg_sum_id_votado ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_id_votado[0] = $id_votado ; 
      $tot_id_votado[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
      $tot_id_votado[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //----- Quebra de id_etapa
   function quebra_id_etapa($id_votado, $id_etapa, $arg_sum_id_votado, $arg_sum_id_etapa) 
   {
      global $tot_id_etapa , $id_grupo, $id_votante, $id_etapa, $id_competencia, $id_habilidade;  
      $tot_id_etapa = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'])) 
      { 
         $nm_comando .= " where ID_VOTADO" . $arg_sum_id_votado . " and ID_ETAPA" . $arg_sum_id_etapa ; 
      } 
      else 
      { 
         $nm_comando .= " and ID_VOTADO" . $arg_sum_id_votado . " and ID_ETAPA" . $arg_sum_id_etapa ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_id_etapa[0] = $id_etapa ; 
      $tot_id_etapa[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
      $tot_id_etapa[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //----- Quebra de id_competencia
   function quebra_id_competencia($id_votado, $id_etapa, $id_competencia, $arg_sum_id_votado, $arg_sum_id_etapa, $arg_sum_id_competencia) 
   {
      global $tot_id_competencia , $id_grupo, $id_votante, $id_etapa, $id_competencia, $id_habilidade;  
      $tot_id_competencia = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), avg(RESULTADO) as tot_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'])) 
      { 
         $nm_comando .= " where ID_VOTADO" . $arg_sum_id_votado . " and ID_ETAPA" . $arg_sum_id_etapa . " and ID_COMPETENCIA" . $arg_sum_id_competencia ; 
      } 
      else 
      { 
         $nm_comando .= " and ID_VOTADO" . $arg_sum_id_votado . " and ID_ETAPA" . $arg_sum_id_etapa . " and ID_COMPETENCIA" . $arg_sum_id_competencia ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_id_competencia[0] = $id_competencia ; 
      $tot_id_competencia[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
      $tot_id_competencia[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //----- Totalização dos arrays usados no resumo
   function resumo($destino_resumo, &$array_total_id_votado, &$array_total_id_etapa, &$array_total_id_competencia)
   {
      global $nada, $id_votado, $id_grupo, $id_votante, $id_etapa, $id_competencia, $id_habilidade;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']))
   { 
       $this->id_votado = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_votado']; 
       $tmp_pos = strpos($this->id_votado, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_votado = substr($this->id_votado, 0, $tmp_pos);
       }
       $this->id_etapa = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_etapa']; 
       $tmp_pos = strpos($this->id_etapa, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_etapa = substr($this->id_etapa, 0, $tmp_pos);
       }
       $this->id_competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_competencia']; 
       $tmp_pos = strpos($this->id_competencia, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_competencia = substr($this->id_competencia, 0, $tmp_pos);
       }
       $this->id_habilidade = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['campos_busca']['id_habilidade']; 
       $tmp_pos = strpos($this->id_habilidade, "##@@");
       if ($tmp_pos !== false)
       {
           $this->id_habilidade = substr($this->id_habilidade, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_Rel']['where_pesq_filtro'];
   $nmgp_order_by = " order by ID_VOTADO asc, ID_ETAPA asc, ID_COMPETENCIA asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), avg(RESULTADO) as tot_resultado, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by ID_VOTADO, ID_ETAPA, ID_COMPETENCIA $nmgp_order_by";
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $comando  = "select count(*), avg(RESULTADO) as tot_resultado, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by ID_VOTADO, ID_ETAPA, ID_COMPETENCIA $nmgp_order_by";
      } 
      else 
      { 
         $comando  = "select count(*), avg(RESULTADO) as tot_resultado, ID_VOTADO, ID_ETAPA, ID_COMPETENCIA from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by ID_VOTADO, ID_ETAPA, ID_COMPETENCIA $nmgp_order_by";
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $rt->GetArray();
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $id_votado      = $registro[2];
         $id_votado_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_id_votado($conteudo , $id_votado_orig) ; 
         $id_votado = $conteudo;
         $val_grafico_id_votado = $id_votado;
         $id_etapa      = $registro[3];
         $id_etapa_orig = $registro[3];
         $conteudo = $registro[3];
         $this->Lookup->lookup_id_etapa($conteudo , $id_etapa_orig) ; 
         $id_etapa = $conteudo;
         $val_grafico_id_etapa = $id_etapa;
         $id_competencia      = $registro[4];
         $id_competencia_orig = $registro[4];
         $conteudo = $registro[4];
         $this->Lookup->lookup_id_competencia($conteudo , $id_competencia_orig) ; 
         $id_competencia = $conteudo;
         $val_grafico_id_competencia = $id_competencia;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($id_votado))
         {
            //----- Cálculo do total para id_votado
            $id_votado      = $id_votado_orig;
            if (!isset($array_total_id_votado[$id_votado]))
            {
               $array_total_id_votado[$id_votado][0] = $registro[0];
               $array_total_id_votado[$id_votado][1] = $registro[1];
               $array_total_id_votado[$id_votado]['quant'] = 1;
               $array_total_id_votado[$id_votado][2] = $val_grafico_id_votado;
               $array_total_id_votado[$id_votado][3] = $id_votado_orig;
            }
            else
            {
               $array_total_id_votado[$id_votado][0] += $registro[0];
               $array_total_id_votado[$id_votado][1] += $registro[1];
               $array_total_id_votado[$id_votado]['quant']++;
            }
            if (isset($id_etapa))
            {
               //----- Cálculo do total para id_etapa
               $id_etapa      = $id_etapa_orig;
               if (!isset($array_total_id_etapa[$id_votado][$id_etapa]))
               {
                  $array_total_id_etapa[$id_votado][$id_etapa][0] = $registro[0];
                  $array_total_id_etapa[$id_votado][$id_etapa][1] = $registro[1];
                  $array_total_id_etapa[$id_votado][$id_etapa]['quant'] = 1;
                  $array_total_id_etapa[$id_votado][$id_etapa][2] = $val_grafico_id_etapa;
                  $array_total_id_etapa[$id_votado][$id_etapa][3] = $id_etapa_orig;
               }
               else
               {
                  $array_total_id_etapa[$id_votado][$id_etapa][0] += $registro[0];
                  $array_total_id_etapa[$id_votado][$id_etapa][1] += $registro[1];
                  $array_total_id_etapa[$id_votado][$id_etapa]['quant']++;
               }
               if (isset($id_competencia))
               {
                  //----- Cálculo do total para id_competencia
                  $id_competencia      = $id_competencia_orig;
                  if (!isset($array_total_id_competencia[$id_votado][$id_etapa][$id_competencia]))
                  {
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia][0] = $registro[0];
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia][1] = $registro[1];
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia]['quant'] = 1;
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia][2] = $val_grafico_id_competencia;
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia][3] = $id_competencia_orig;
                  }
                  else
                  {
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia][0] += $registro[0];
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia][1] += $registro[1];
                     $array_total_id_competencia[$id_votado][$id_etapa][$id_competencia]['quant']++;
                  }
               } // isset
            } // isset
         } // isset
      }
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

   //----- Montagem dos arrays para o gráfico
   function grafico(&$array_label, &$array_datay, $array_total_id_votado, $array_total_id_etapa, $array_total_id_competencia)
   {
      $array_label    = array();
      $array_label[0] = array();
      $array_label[1] = array();
      $array_label[2] = array();
      $array_datay    = array();
      $array_datay[0] = array();
      $array_datay[1] = array();
      $array_datay[2] = array();
      foreach ($array_total_id_votado as $xcampo_id_votado => $dados_id_votado)
      {
         //-- Label
         $campo_id_votado = $dados_id_votado[2];
         if (!in_array($campo_id_votado, $array_label[0]))
         {
            $array_label[0][] = $campo_id_votado;
         }
         if (!isset($array_datay[0][0]))
         {
            $array_datay[0][0] = array();
         }
         $array_datay[0][0][] = $dados_id_votado[0];
         if (!isset($array_datay[0][1]))
         {
            $array_datay[0][1] = array();
         }
         $array_datay[0][1][] = $dados_id_votado[1];
         foreach ($array_total_id_etapa[$xcampo_id_votado] as $xcampo_id_etapa => $dados_id_etapa)
         {
            //-- Label
            $campo_id_etapa = $dados_id_etapa[2];
            if (!isset($array_label[1][$campo_id_votado]))
            {
               $array_label[1][$campo_id_votado] = array();
            }
            if (!in_array($campo_id_etapa, $array_label[1][$campo_id_votado]))
            {
               $array_label[1][$campo_id_votado][] = $campo_id_etapa;
            }
            if (!isset($array_datay[1][0][$campo_id_votado]))
            {
               $array_datay[1][0][$campo_id_votado] = array();
            }
            $array_datay[1][0][$campo_id_votado][] = $dados_id_etapa[0];
            if (!isset($array_datay[1][1][$campo_id_votado]))
            {
               $array_datay[1][1][$campo_id_votado] = array();
            }
            $array_datay[1][1][$campo_id_votado][] = $dados_id_etapa[1];
            foreach ($array_total_id_competencia[$xcampo_id_votado][$xcampo_id_etapa] as $xcampo_id_competencia => $dados_id_competencia)
            {
               //-- Label
               $campo_id_competencia = $dados_id_competencia[2];
               if (!isset($array_label[2][$campo_id_votado][$campo_id_etapa]))
               {
                  $array_label[2][$campo_id_votado][$campo_id_etapa] = array();
               }
               if (!in_array($campo_id_competencia, $array_label[2][$campo_id_votado][$campo_id_etapa]))
               {
                  $array_label[2][$campo_id_votado][$campo_id_etapa][] = $campo_id_competencia;
               }
               if (!isset($array_datay[2][0][$campo_id_votado][$campo_id_etapa]))
               {
                  $array_datay[2][0][$campo_id_votado][$campo_id_etapa] = array();
               }
               $array_datay[2][0][$campo_id_votado][$campo_id_etapa][] = $dados_id_competencia[0];
               if (!isset($array_datay[2][1][$campo_id_votado][$campo_id_etapa]))
               {
                  $array_datay[2][1][$campo_id_votado][$campo_id_etapa] = array();
               }
               $array_datay[2][1][$campo_id_votado][$campo_id_etapa][] = $dados_id_competencia[1];
            }
         }
      }
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
