<?php

class app_LiderPistaCompHab_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- Construtor
   function app_LiderPistaCompHab_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (!empty($_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']))
      { 
          $this->lider = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['lider']; 
          $tmp_pos = strpos($this->lider, "##@@");
          if ($tmp_pos !== false)
          {
              $this->lider = substr($this->lider, 0, $tmp_pos);
          }
          $this->pista = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['pista']; 
          $tmp_pos = strpos($this->pista, "##@@");
          if ($tmp_pos !== false)
          {
              $this->pista = substr($this->pista, 0, $tmp_pos);
          }
          $this->competencia = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['competencia']; 
          $tmp_pos = strpos($this->competencia, "##@@");
          if ($tmp_pos !== false)
          {
              $this->competencia = substr($this->competencia, 0, $tmp_pos);
          }
          $this->habilidade = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['habilidade']; 
          $tmp_pos = strpos($this->habilidade, "##@@");
          if ($tmp_pos !== false)
          {
              $this->habilidade = substr($this->habilidade, 0, $tmp_pos);
          }
          $this->nota_media = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['nota_media']; 
          $tmp_pos = strpos($this->nota_media, "##@@");
          if ($tmp_pos !== false)
          {
              $this->nota_media = substr($this->nota_media, 0, $tmp_pos);
          }
          $this->resultado_medio = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['resultado_medio']; 
          $tmp_pos = strpos($this->resultado_medio, "##@@");
          if ($tmp_pos !== false)
          {
              $this->resultado_medio = substr($this->resultado_medio, 0, $tmp_pos);
          }
          $this->total_nota = $_SESSION['sc_session'][$this->sc_page]['app_LiderPistaCompHab']['campos_busca']['total_nota']; 
          $tmp_pos = strpos($this->total_nota, "##@@");
          if ($tmp_pos !== false)
          {
              $this->total_nota = substr($this->total_nota, 0, $tmp_pos);
          }
      } 
   }

   //---- Totaliza��o na quebra geral
   function quebra_geral()
   {
      global $nada ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'][0] = "Total Geral" ; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'][3] = $rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $rt->fields[3] = (string)$rt->fields[3]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'][4] = $rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $rt->fields[4] = (string)$rt->fields[4]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['tot_geral'][5] = $rt->fields[4]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['contr_total_geral'] = "OK";
   } 

   //----- Quebra de lider
   function quebra_lider($lider, $arg_sum_lider) 
   {
      global $tot_lider ;  
      $tot_lider = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq'])) 
      { 
         $nm_comando .= " where LIDER" . $arg_sum_lider ; 
      } 
      else 
      { 
         $nm_comando .= " and LIDER" . $arg_sum_lider ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_lider[0] = $lider ; 
      $tot_lider[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_lider[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_lider[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_lider[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_lider[5] = (string)$rt->fields[4]; 
      $rt->Close(); 
   } 

   //----- Quebra de pista
   function quebra_pista($lider, $pista, $arg_sum_lider, $arg_sum_pista) 
   {
      global $tot_pista ;  
      $tot_pista = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq'])) 
      { 
         $nm_comando .= " where LIDER" . $arg_sum_lider . " and PISTA" . $arg_sum_pista ; 
      } 
      else 
      { 
         $nm_comando .= " and LIDER" . $arg_sum_lider . " and PISTA" . $arg_sum_pista ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_pista[0] = $pista ; 
      $tot_pista[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_pista[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_pista[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_pista[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_pista[5] = (string)$rt->fields[4]; 
      $rt->Close(); 
   } 

   //----- Quebra de competencia
   function quebra_competencia($lider, $pista, $competencia, $arg_sum_lider, $arg_sum_pista, $arg_sum_competencia) 
   {
      global $tot_competencia ;  
      $tot_competencia = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq'])) 
      { 
         $nm_comando .= " where LIDER" . $arg_sum_lider . " and PISTA" . $arg_sum_pista . " and COMPETENCIA" . $arg_sum_competencia ; 
      } 
      else 
      { 
         $nm_comando .= " and LIDER" . $arg_sum_lider . " and PISTA" . $arg_sum_pista . " and COMPETENCIA" . $arg_sum_competencia ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = $this->Db;
      if (!$rt = &$this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", "Erro ao acessar o banco de dados", $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_competencia[0] = $competencia ; 
      $tot_competencia[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_competencia[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_competencia[3] = (string)$rt->fields[2]; 
      $rt->fields[3] = str_replace(",", ".", $rt->fields[3]);
      $tot_competencia[4] = (string)$rt->fields[3]; 
      $rt->fields[4] = str_replace(",", ".", $rt->fields[4]);
      $tot_competencia[5] = (string)$rt->fields[4]; 
      $rt->Close(); 
   } 

   //----- Totaliza��o dos arrays usados no resumo
   function resumo($destino_resumo, &$array_total_lider, &$array_total_pista, &$array_total_competencia)
   {
      global $nada;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']))
   { 
       $this->lider = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['lider']; 
       $tmp_pos = strpos($this->lider, "##@@");
       if ($tmp_pos !== false)
       {
           $this->lider = substr($this->lider, 0, $tmp_pos);
       }
       $this->pista = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['pista']; 
       $tmp_pos = strpos($this->pista, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pista = substr($this->pista, 0, $tmp_pos);
       }
       $this->competencia = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['competencia']; 
       $tmp_pos = strpos($this->competencia, "##@@");
       if ($tmp_pos !== false)
       {
           $this->competencia = substr($this->competencia, 0, $tmp_pos);
       }
       $this->habilidade = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['habilidade']; 
       $tmp_pos = strpos($this->habilidade, "##@@");
       if ($tmp_pos !== false)
       {
           $this->habilidade = substr($this->habilidade, 0, $tmp_pos);
       }
       $this->nota_media = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['nota_media']; 
       $tmp_pos = strpos($this->nota_media, "##@@");
       if ($tmp_pos !== false)
       {
           $this->nota_media = substr($this->nota_media, 0, $tmp_pos);
       }
       $this->resultado_medio = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['resultado_medio']; 
       $tmp_pos = strpos($this->resultado_medio, "##@@");
       if ($tmp_pos !== false)
       {
           $this->resultado_medio = substr($this->resultado_medio, 0, $tmp_pos);
       }
       $this->total_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['campos_busca']['total_nota']; 
       $tmp_pos = strpos($this->total_nota, "##@@");
       if ($tmp_pos !== false)
       {
           $this->total_nota = substr($this->total_nota, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPistaCompHab']['where_pesq_filtro'];
   $nmgp_order_by = " order by LIDER asc, PISTA asc, COMPETENCIA asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado, LIDER, PISTA, COMPETENCIA from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by LIDER, PISTA, COMPETENCIA $nmgp_order_by";
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $comando  = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado, LIDER, PISTA, COMPETENCIA from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by LIDER, PISTA, COMPETENCIA $nmgp_order_by";
      } 
      else 
      { 
         $comando  = "select count(*), sum(NOTA_MEDIA) as tot_nota_media, sum(RESULTADO_MEDIO) as tot_resultado_medio, sum(TOTAL_NOTA) as tot_total_nota, sum(TOTAL_RESULTADO) as tot_total_resultado, LIDER, PISTA, COMPETENCIA from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by LIDER, PISTA, COMPETENCIA $nmgp_order_by";
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
         $lider      = $registro[5];
         $lider_orig = $registro[5];
         $conteudo = $registro[5];
         $lider = $conteudo;
         $val_grafico_lider = $lider;
         $pista      = $registro[6];
         $pista_orig = $registro[6];
         $conteudo = $registro[6];
         $pista = $conteudo;
         $val_grafico_pista = $pista;
         $competencia      = $registro[7];
         $competencia_orig = $registro[7];
         $conteudo = $registro[7];
         $competencia = $conteudo;
         $val_grafico_competencia = $competencia;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $registro[2] = str_replace(",", ".", $registro[2]);
         $registro[2] = (strpos(strtolower($registro[2]), "e")) ? (float)$registro[2] : $registro[2]; 
         $registro[2] = (string)$registro[2];
         if ($registro[2] == "") 
         {
             $registro[2] = 0;
         }
         $registro[3] = str_replace(",", ".", $registro[3]);
         $registro[3] = (strpos(strtolower($registro[3]), "e")) ? (float)$registro[3] : $registro[3]; 
         $registro[3] = (string)$registro[3];
         if ($registro[3] == "") 
         {
             $registro[3] = 0;
         }
         $registro[4] = str_replace(",", ".", $registro[4]);
         $registro[4] = (strpos(strtolower($registro[4]), "e")) ? (float)$registro[4] : $registro[4]; 
         $registro[4] = (string)$registro[4];
         if ($registro[4] == "") 
         {
             $registro[4] = 0;
         }
         if (isset($lider))
         {
            //----- C�lculo do total para lider
            $lider      = $lider_orig;
            if (!isset($array_total_lider[$lider]))
            {
               $array_total_lider[$lider][0] = $registro[0];
               $array_total_lider[$lider][1] = $registro[1];
               $array_total_lider[$lider][2] = $registro[2];
               $array_total_lider[$lider][3] = $registro[3];
               $array_total_lider[$lider][4] = $registro[4];
               $array_total_lider[$lider][5] = $val_grafico_lider;
               $array_total_lider[$lider][6] = $lider_orig;
            }
            else
            {
               $array_total_lider[$lider][0] += $registro[0];
               $array_total_lider[$lider][1] += $registro[1];
               $array_total_lider[$lider][2] += $registro[2];
               $array_total_lider[$lider][3] += $registro[3];
               $array_total_lider[$lider][4] += $registro[4];
            }
            if (isset($pista))
            {
               //----- C�lculo do total para pista
               $pista      = $pista_orig;
               if (!isset($array_total_pista[$lider][$pista]))
               {
                  $array_total_pista[$lider][$pista][0] = $registro[0];
                  $array_total_pista[$lider][$pista][1] = $registro[1];
                  $array_total_pista[$lider][$pista][2] = $registro[2];
                  $array_total_pista[$lider][$pista][3] = $registro[3];
                  $array_total_pista[$lider][$pista][4] = $registro[4];
                  $array_total_pista[$lider][$pista][5] = $val_grafico_pista;
                  $array_total_pista[$lider][$pista][6] = $pista_orig;
               }
               else
               {
                  $array_total_pista[$lider][$pista][0] += $registro[0];
                  $array_total_pista[$lider][$pista][1] += $registro[1];
                  $array_total_pista[$lider][$pista][2] += $registro[2];
                  $array_total_pista[$lider][$pista][3] += $registro[3];
                  $array_total_pista[$lider][$pista][4] += $registro[4];
               }
               if (isset($competencia))
               {
                  //----- C�lculo do total para competencia
                  $competencia      = $competencia_orig;
                  if (!isset($array_total_competencia[$lider][$pista][$competencia]))
                  {
                     $array_total_competencia[$lider][$pista][$competencia][0] = $registro[0];
                     $array_total_competencia[$lider][$pista][$competencia][1] = $registro[1];
                     $array_total_competencia[$lider][$pista][$competencia][2] = $registro[2];
                     $array_total_competencia[$lider][$pista][$competencia][3] = $registro[3];
                     $array_total_competencia[$lider][$pista][$competencia][4] = $registro[4];
                     $array_total_competencia[$lider][$pista][$competencia][5] = $val_grafico_competencia;
                     $array_total_competencia[$lider][$pista][$competencia][6] = $competencia_orig;
                  }
                  else
                  {
                     $array_total_competencia[$lider][$pista][$competencia][0] += $registro[0];
                     $array_total_competencia[$lider][$pista][$competencia][1] += $registro[1];
                     $array_total_competencia[$lider][$pista][$competencia][2] += $registro[2];
                     $array_total_competencia[$lider][$pista][$competencia][3] += $registro[3];
                     $array_total_competencia[$lider][$pista][$competencia][4] += $registro[4];
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

   //----- Montagem dos arrays para o gr�fico
   function grafico(&$array_label, &$array_datay, $array_total_lider, $array_total_pista, $array_total_competencia)
   {
      $array_label    = array();
      $array_label[0] = array();
      $array_label[1] = array();
      $array_label[2] = array();
      $array_datay    = array();
      $array_datay[0] = array();
      $array_datay[1] = array();
      $array_datay[2] = array();
      foreach ($array_total_lider as $xcampo_lider => $dados_lider)
      {
         //-- Label
         $campo_lider = $dados_lider[5];
         if (!in_array($campo_lider, $array_label[0]))
         {
            $array_label[0][] = $campo_lider;
         }
         if (!isset($array_datay[0][0]))
         {
            $array_datay[0][0] = array();
         }
         $array_datay[0][0][] = $dados_lider[0];
         if (!isset($array_datay[0][1]))
         {
            $array_datay[0][1] = array();
         }
         $array_datay[0][1][] = $dados_lider[1];
         if (!isset($array_datay[0][2]))
         {
            $array_datay[0][2] = array();
         }
         $array_datay[0][2][] = $dados_lider[2];
         if (!isset($array_datay[0][3]))
         {
            $array_datay[0][3] = array();
         }
         $array_datay[0][3][] = $dados_lider[3];
         if (!isset($array_datay[0][4]))
         {
            $array_datay[0][4] = array();
         }
         $array_datay[0][4][] = $dados_lider[4];
         foreach ($array_total_pista[$xcampo_lider] as $xcampo_pista => $dados_pista)
         {
            //-- Label
            $campo_pista = $dados_pista[5];
            if (!isset($array_label[1][$campo_lider]))
            {
               $array_label[1][$campo_lider] = array();
            }
            if (!in_array($campo_pista, $array_label[1][$campo_lider]))
            {
               $array_label[1][$campo_lider][] = $campo_pista;
            }
            if (!isset($array_datay[1][0][$campo_lider]))
            {
               $array_datay[1][0][$campo_lider] = array();
            }
            $array_datay[1][0][$campo_lider][] = $dados_pista[0];
            if (!isset($array_datay[1][1][$campo_lider]))
            {
               $array_datay[1][1][$campo_lider] = array();
            }
            $array_datay[1][1][$campo_lider][] = $dados_pista[1];
            if (!isset($array_datay[1][2][$campo_lider]))
            {
               $array_datay[1][2][$campo_lider] = array();
            }
            $array_datay[1][2][$campo_lider][] = $dados_pista[2];
            if (!isset($array_datay[1][3][$campo_lider]))
            {
               $array_datay[1][3][$campo_lider] = array();
            }
            $array_datay[1][3][$campo_lider][] = $dados_pista[3];
            if (!isset($array_datay[1][4][$campo_lider]))
            {
               $array_datay[1][4][$campo_lider] = array();
            }
            $array_datay[1][4][$campo_lider][] = $dados_pista[4];
            foreach ($array_total_competencia[$xcampo_lider][$xcampo_pista] as $xcampo_competencia => $dados_competencia)
            {
               //-- Label
               $campo_competencia = $dados_competencia[5];
               if (!isset($array_label[2][$campo_lider][$campo_pista]))
               {
                  $array_label[2][$campo_lider][$campo_pista] = array();
               }
               if (!in_array($campo_competencia, $array_label[2][$campo_lider][$campo_pista]))
               {
                  $array_label[2][$campo_lider][$campo_pista][] = $campo_competencia;
               }
               if (!isset($array_datay[2][0][$campo_lider][$campo_pista]))
               {
                  $array_datay[2][0][$campo_lider][$campo_pista] = array();
               }
               $array_datay[2][0][$campo_lider][$campo_pista][] = $dados_competencia[0];
               if (!isset($array_datay[2][1][$campo_lider][$campo_pista]))
               {
                  $array_datay[2][1][$campo_lider][$campo_pista] = array();
               }
               $array_datay[2][1][$campo_lider][$campo_pista][] = $dados_competencia[1];
               if (!isset($array_datay[2][2][$campo_lider][$campo_pista]))
               {
                  $array_datay[2][2][$campo_lider][$campo_pista] = array();
               }
               $array_datay[2][2][$campo_lider][$campo_pista][] = $dados_competencia[2];
               if (!isset($array_datay[2][3][$campo_lider][$campo_pista]))
               {
                  $array_datay[2][3][$campo_lider][$campo_pista] = array();
               }
               $array_datay[2][3][$campo_lider][$campo_pista][] = $dados_competencia[3];
               if (!isset($array_datay[2][4][$campo_lider][$campo_pista]))
               {
                  $array_datay[2][4][$campo_lider][$campo_pista] = array();
               }
               $array_datay[2][4][$campo_lider][$campo_pista][] = $dados_competencia[4];
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
