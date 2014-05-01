<?php

class app_LiderPista_grafico
{
   var $Db;
   var $Ini;
   var $Erro;
   var $Lookup;

   var $nm_data;
   var $total;
   var $sc_proc_grid; 
   var $sc_graf_sint = false;

   var $lider;

   var $array_total_lider;

   var $array_datay_geral;
   var $array_label_geral;
   var $array_datay;
   var $array_label;
   var $campo;
   var $comando;
   var $label;
   var $list_titulo;
   var $max_size_datay;
   var $max_size_label;
   var $total_datay;
   var $nivel;
   var $titulo;
   var $Decimais;
   var $graf_cor_fundo;
   var $graf_cor_margens;
   var $graf_cor_label;
   var $graf_cor_valores;
   var $graf_tipo_marcas;
   var $graf_angulo;

   //---- Construtor
   function app_LiderPista_grafico()
   {
      $this->nm_data = new nm_data("pt_br");
   }

   //---- Monta o gráfico
   function monta_grafico()
   {
      $this->inicializa_vars();
      $this->monta_arrays();
      if (!empty($this->total_datay))
      {
          $graf_tipo    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_tipo'];
          $graf_alt     = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_alt'];
          $graf_larg    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_larg'];
          $graf_marg    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_margem'];
          $graf_asp     = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_aspec'];
          $graf_preen   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_preencher'];
          $graf_ex_val  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_exibe_val'];
          $graf_ex_marc = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_exibe_marcas'];
          $this->graf_cor_fundo   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_cor_fundo'];
          $this->graf_cor_margens = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_cor_margens'];
          $this->graf_cor_label   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_cor_label'];
          $this->graf_cor_valores = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_cor_valores'];
          $this->graf_tipo_marcas = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_tipo_marcas'];
          $this->graf_angulo      = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_angulo'];
          $this->grafico_generico($graf_tipo, $graf_larg, $graf_alt, $graf_marg, $graf_asp, $graf_preen, $graf_ex_val, $graf_ex_marc, $this->array_datay, $this->array_label, $this->list_titulo[$this->campo], $this->label[$this->nivel], $this->titulo);
      }
   }

   //---- Inicializa variáveis
   function inicializa_vars()
   {
      global 
             $nivel_quebra, $campo, $lider;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['graf_opc_atual'] == 1)
      {
         $this->sc_graf_sint = true;
      }
      //---- Total
      require_once($this->Ini->path_aplicacao . "app_LiderPista_total.class.php"); 
      $this->total = new app_LiderPista_total($this->Ini->sc_page);
      $this->prep_modulos("total");
      //---- Parâmetros
      if (get_magic_quotes_gpc())
      {
         $lider = stripslashes($lider);
      }
      $lider = urldecode($lider);
      $this->campo = (isset($campo))        ? $campo        : 0;
      $this->nivel = (isset($nivel_quebra)) ? $nivel_quebra : 0;
      $this->lider = (isset($lider)) ? $lider : "";
      //---- Arrays de totais
      $this->array_total_lider = array();
      //---- Título
      $this->list_titulo      = array();
      $this->list_decimais    = array();
      $this->list_decimais[0] = 0;
      $this->list_titulo[0]   = "Registros";
      $this->list_decimais[1] = 0;
      $this->list_titulo[1]   = "Nota - Média";
      $this->list_decimais[2] = 0;
      $this->list_titulo[2]   = "Resultado - Média";
      $this->list_decimais[3] = 0;
      $this->list_titulo[3]   = "Nota - Total";
      $this->list_decimais[4] = 0;
      $this->list_titulo[4]   = "Resultado - Total";
      $this->titulo         = strtoupper($this->list_titulo[$this->campo]);
      $this->Decimais       = $this->list_decimais[$this->campo];
      //---- Label
      $this->label    = array();
      $this->label[0] = "Líder";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['contr_label_graf']['lider']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['contr_label_graf']['lider']))
      {
         $this->label[0] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['contr_label_graf']['lider'];
      }
   }

   //---- Preparação dos módulos
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //---- Monta arrays utilizados pelo gráfico
   function monta_arrays()
   {
      $this->array_datay = array();
      $this->total->resumo("gra", $this->array_total_lider);
      ksort($this->array_total_lider);
      $this->total->grafico($this->array_label_geral, $this->array_datay_geral, $this->array_total_lider);
      if ($this->nivel == 0)
      {
         $this->array_label = $this->array_label_geral[$this->nivel];
         $this->sc_graf_sint = true;
         $this->array_datay[0] = $this->array_datay_geral[$this->nivel][$this->campo];
      }
      $this->max_size_label = 0;
      for ($i = 0; $i < sizeof($this->array_label); $i++)
      {
         $size_label           = strlen("" . $this->array_label[$i]);
         $this->max_size_label = ($this->max_size_label < $size_label) ? $size_label : $this->max_size_label;
      }
      $this->max_size_datay = 0;
      $this->total_datay = 0;
      foreach ($this->array_datay as $legenda => $dadosY)
      {
          $tot_parcial = 0;
          for ($i = 0; $i < sizeof($dadosY); $i++)
          {
             $size_datay           = strlen("" . $dadosY[$i]);
             $this->max_size_datay = ($this->max_size_datay < $size_datay) ? $size_datay : $this->max_size_datay;
             $this->total_datay   += $dadosY[$i];
             $tot_parcial         += $dadosY[$i];
          }
          if ($tot_parcial == 0)
          {
              unset($this->array_datay[$legenda]);
          }
      }
   }

   function grafico_generico($tipo, $width, $height, $margem, $aspecto, $preenche, $exibe_val, $exibe_marc, $datay, $label, $tit_datay, $tit_label, $tit_graf, $tip_pizza = "ABS")
   {
      global $nm_saida, $nm_retorno_graf;
      DEFINE ("TTF_DIR", $this->Ini->path_grafico_fonts);
      $this->graf_angulo = (empty($this->graf_angulo)) ? 0 : $this->graf_angulo;
      if (empty($datay) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] == "pdf")
      {
         return;
      }
      if (!empty($this->Decimais))
      {
          $format_pie_abs = "%01." . $this->Decimais . "f";
      }
      else
      {
          $format_pie_abs = "%s";
      }
      $width  = (int)$width;
      $height = (int)$height;
      $orient_horiz = false;
      if ($tipo == 4)
      {
          $orient_horiz = true;
          $tipo     = 1;
      }
      if ($tipo == 5)
      {
          $orient_horiz = true;
          $tipo     = 2;
      }
      if ($tipo == 7)
      {
          $orient_horiz = true;
          $tipo     = 6;
      }
      $renda = false;
      if ($tipo == 6)
      {
          $renda = true;
          $tipo  = 2;
      }
      $pizza3d = false;
      if ($tipo == 3)
      {
          $tip_pizza = "ABS";
      }
      if ($tipo == 8)
      {
          $tip_pizza = "PER";
          $tipo  = 3;
      }
      if ($tipo == 20)
      {
          $tip_pizza = "ABS";
          $pizza3d   = true;
          $tipo      = 3;
      }
      if ($tipo == 21)
      {
          $tip_pizza = "PER";
          $pizza3d   = true;
          $tipo      = 3;
      }
      $impulse = false;
      if ($tipo == 26)
      {
          $impulse = true;
          $tipo    = 4;
      }
      if ($tipo == 27)
      {
          $orient_horiz = true;
          $impulse      = true;
          $tipo         = 4;
      }
      if ($tipo == 28)
      {
          $tipo    = 4;
      }
      if ($tipo == 29)
      {
          $orient_horiz = true;
          $tipo         = 4;
      }
      DEFINE("CACHE_DIR",        $this->Ini->root . $this->Ini->path_imag_temp);
      DEFINE("APACHE_CACHE_DIR", $this->Ini->path_imag_temp);
      DEFINE("TTF_DIR",          "");
      DEFINE("SC_GRAPH_BAR",  1);
      DEFINE("SC_GRAPH_LINE", 2);
      DEFINE("SC_GRAPH_PIE",  3);
      DEFINE("SC_GRAPH_SCATTER",  4);
      unset($GLOBALS['php_errormsg']);
      require_once($this->Ini->path_grafico . "/jpgraph.php"); 
      switch ($tipo)
      {
         case SC_GRAPH_PIE:
            require_once($this->Ini->path_grafico . "/jpgraph_pie.php"); 
            if ($pizza3d)
            {
                require_once($this->Ini->path_grafico . "/jpgraph_pie3d.php"); 
            }
         break;
         case SC_GRAPH_LINE:
            require_once($this->Ini->path_grafico . "/jpgraph_line.php"); 
         break;
         case SC_GRAPH_SCATTER:
            require_once($this->Ini->path_grafico . "/jpgraph_scatter.php"); 
         break;
         case SC_GRAPH_BAR:
         default:
            require_once($this->Ini->path_grafico . "/jpgraph_bar.php"); 
         break;
      }
      $this->graf_tipo_marcas = ($this->graf_tipo_marcas == "C") ? MARK_FILLEDCIRCLE : $this->graf_tipo_marcas;
      $this->graf_tipo_marcas = ($this->graf_tipo_marcas == "Q") ? MARK_SQUARE : $this->graf_tipo_marcas;
      $this->graf_tipo_marcas = ($this->graf_tipo_marcas == "U") ? MARK_UTRIANGLE : $this->graf_tipo_marcas;
      $this->graf_tipo_marcas = ($this->graf_tipo_marcas == "D") ? MARK_DTRIANGLE : $this->graf_tipo_marcas;
      $this->graf_tipo_marcas = ($this->graf_tipo_marcas == "L") ? MARK_DIAMOND : $this->graf_tipo_marcas;
      $this->graf_tipo_marcas = ($this->graf_tipo_marcas == "E") ? MARK_STAR : $this->graf_tipo_marcas;
      if (!is_integer($margem) || !is_numeric($margem) || 0 > $margem)
      {
         $margem = 10;
      }
      if (!is_integer($width) || !is_numeric($width) || 0 >= $width)
      {
         $width = 800;
      }
      if (!is_integer($height) || !is_numeric($height) || 0 >= $height)
      {
         $height = 600;
      }
      $max_size_label = 0;
      for ($i = 0; $i < sizeof($label); $i++)
      {
         $size_label     = strlen("" . $label[$i]);
         $max_size_label = ($max_size_label < $size_label) ? $size_label : $max_size_label;
      }
      $max_size_datay = 0;
      $max_larg_datay = 0;
      foreach ($datay as $legenda => $dadosY)
      {
          $max_larg_datay = ($max_larg_datay < sizeof($dadosY)) ?  sizeof($dadosY) : $max_larg_datay;
          for ($i = 0; $i < sizeof($dadosY); $i++)
          {
             $size_datay     = strlen("" . $dadosY[$i]);
             $max_size_datay = ($max_size_datay < $size_datay) ? $size_datay : $max_size_datay;
          }
      }
      if ("N" != strtoupper($aspecto))
      {
         $correcao_alt  = $max_size_label * 6;
         $correcao_larg = $max_size_datay * 6;
      }
      else
      {
         $correcao_alt  = 0;
         $correcao_larg = 0;
      }
      switch ($tipo)
      {
         case SC_GRAPH_PIE:
            $this->graf_cor_margens = $this->graf_cor_fundo;
            $img_width  = $width;
            $img_height = $height;
            $leg_height = 25 + (15 * sizeof($label));
            $leg_width  = 25 + ($max_size_label * 10);
            $img_height = ($leg_height > $img_height) ? ($leg_height + ($leg_height * 0.2)) : $img_height;
            $pie_size   = ($img_width  > $img_height) ? ($img_height / 2.5)                  : ($img_width / 2.5);
            $esp_val    = ("ABS" == $tip_pizza) ? $max_size_datay : 8;
            $img_width  += ($esp_val * 20);
            $img_height += ($esp_val * 10);
            if ($img_width < ((2 * $pie_size) + $leg_width))
            {
               $img_width  = (2 * $pie_size) + $leg_width;
            }
            if ($this->sc_graf_sint)
            {
                $pie_centerX = (($img_width - $leg_width) / 2) / $img_width;
                $pie_centerY = 0.5;
            }
            else
            {
                $qtd_col   = 0;
                $colunas   = 2;
                $leg_geral = false;
                $linhas    = ceil(sizeof($datay) / $colunas);
                $tmpW      = ($img_width - $leg_width - ($esp_val * 20)) / $colunas;
                $tmpH      = ($img_height / $linhas) - 50;
                $pie_size  = ($tmpW  > $tmpH) ? ($tmpH / 2.5) : ($tmpW / 2.5);
                $incr_col  = ($img_width - $leg_width) / $colunas;
                $ini_col   = $incr_col / 2;
                $atual_col = $ini_col;
                $incr_lin  = $img_height / $linhas;
                $ini_lin   = $incr_lin / 2;
                $atual_lin = $ini_lin;
            }
            $graph = new PieGraph($img_width, $img_height);
            $graph->img->SetMargin($margem, $margem, $margem, $margem);
         break;
         case SC_GRAPH_LINE:
         case SC_GRAPH_BAR:
         case SC_GRAPH_SCATTER:
         default:
            $margem_img = $margem;
            $margem_esq = 35 + $margem_img + ($max_size_datay * 6);
            $margem_dir = 10 + $margem_img;
            $margem_top = 29 + $margem_img;
            $margem_bot = 29 + $margem_img + ($max_size_label * 6);
            $img_width  = $width + $correcao_larg;
            $img_height = $height + $correcao_alt;
            $tmp_width = $margem_esq + $margem_dir + (9 * $max_larg_datay);
            if ($img_width < $tmp_width)
            {
               $img_width = $tmp_width;
            }
            if ($orient_horiz)
            {
                $graph = new Graph($img_width, $img_height);
                $graph->SetScale("textlin");
                $graph->Set90AndMargin($margem_bot, $margem_dir, $margem_top, $margem_esq);
                $graph->SetAngle(90);
                $graph->xaxis->SetTickLabels($label);
                $graph->xaxis->SetLabelAlign('right','center');
                $graph->xaxis->SetTitleMargin($max_size_label * 6);
                $graph->xaxis->SetTitle($tit_label,'middle');
                $graph->xaxis->title->SetAngle(90);
                $graph->xaxis->title->SetFont(FF_FONT1, FS_BOLD);
                $graph->yaxis->SetLabelAngle(90);
                $graph->yaxis->SetLabelAlign('center','top');
                $graph->yaxis->SetLabelSide(SIDE_RIGHT);
                $graph->yaxis->SetPos('max');
                $graph->yaxis->SetTitleMargin((20 + ($max_size_datay * 6)) * -1);
                $graph->yaxis->SetTitle($tit_datay);
                $graph->yaxis->title->SetAngle(0);
                $graph->yaxis->title->SetFont(FF_FONT1, FS_BOLD);
            }
            else
            {
                $graph = new Graph($img_width, $img_height);
                $graph->SetScale("textlin");
                $graph->img->SetMargin($margem_esq, $margem_dir, $margem_top, $margem_bot);
                $graph->xaxis->SetTickLabels($label);
                $graph->xaxis->SetLabelAngle(90);
                $graph->xaxis->SetTitleMargin($max_size_label * 6);
                $graph->xaxis->title->Set($tit_label);
                $graph->xaxis->title->SetFont(FF_FONT1, FS_BOLD);
                $graph->yaxis->SetTitleMargin(20 + ($max_size_datay * 6));
                $graph->yaxis->title->Set($tit_datay);
                $graph->yaxis->title->SetFont(FF_FONT1, FS_BOLD);
            }
            if (!empty($this->graf_cor_label))
            {
               $graph->xaxis->SetColor($this->graf_cor_label);
            }
            if (!empty($this->graf_cor_valores))
            {
               $graph->yaxis->SetColor($this->graf_cor_valores);
            }
         break;
      }
      if (!empty($this->graf_cor_fundo))
      {
          $graph->SetColor($this->graf_cor_fundo);
      }
      else
      {
          $graph->SetColor("white");
      }
      if (!empty($this->graf_cor_margens))
      {
          $graph->SetMarginColor($this->graf_cor_margens);
      }
      else
      {
          $graph->SetMarginColor("white");
      }
      if ("" != $tit_graf && $session_nmgp_opcao_cons != "pdf")
      {
         $graph->title->Set($tit_graf);
         $graph->title->SetFont(FF_FONT1, FS_BOLD);
         $graph->title->SetBox("white", "black", true);
      }
      $gerou_graf     = false;
      $goup_graf_bar  = array();
      $goup_graf_line = array();
      $cores = array('#0000ff','#ff0000','#00ff00','#fa00ff','#b5b1b1','#fffa00','#e5778d','#ff9900','#00fffa',
                     '#ba6f00','#800080','#bfbc00','#00aaa8','#65abbf','#9764B1','#511e1e','#a52a2a','#706c6c',
                     '#e2e2e2
#0707b2','#a50303','#027f02','#a34658','#ffc0cb','#6969b2','#add8e6','#656577','#ad5b5b',
                     '#000000');
      $ind_cor = 0;
      foreach ($datay as $legenda => $dadosY)
      {
          $total_datay = 0;
          for ($i = 0; $i < sizeof($dadosY); $i++)
          {
             $total_datay += $dadosY[$i];
          }
          if ($total_datay != 0)
          {
              $cor_line = $cores[$ind_cor];
              $ind_cor++;
              $ind_cor  = ($ind_cor == sizeof($cores)) ? 0 : $ind_cor;
              switch ($tipo)
              {
                 case SC_GRAPH_PIE:
                    if ($pizza3d)
                    {
                        $pieplot = new PiePlot3D($dadosY);
                    }
                    else
                    {
                        $pieplot = new PiePlot($dadosY);
                    }
                    if ($this->sc_graf_sint)
                    {
                        $pieplot->SetLegends($label);
                    }
                    else
                    {
                        if (!$leg_geral)
                        {
                            $pieplot->SetLegends($label);
                            $leg_geral = true;
                        }
                        $pieplot->title->Set($legenda);
                        if ($qtd_col == $colunas)
                        {
                            $atual_col = $ini_col;
                            $qtd_col = 0;
                            $atual_lin += $incr_lin;
                        }
                        $pie_centerX = $atual_col / $img_width;
                        $atual_col += $incr_col;
                        $pie_centerY = $atual_lin / $img_height;
                        $pieplot->SetLabelPos(0.6);
                        $qtd_col++;
                    }
                    $pieplot->SetCenter($pie_centerX, $pie_centerY);
                    $pieplot->SetSize($pie_size);
                    $pieplot->SetTheme("earth");
                    if ($exibe_val == "S")
                    {
                        $pieplot->value->Show();
                    }
                    if ("ABS" != $tip_pizza)
                    {
                        $pieplot->SetValueType(PIE_VALUE_PER);
                        $pieplot->value->SetFormat("%01.2f%%");
                    }
                    else
                    {
                        $pieplot->SetValueType(PIE_VALUE_ABS);
                        $pieplot->value->SetFormat($format_pie_abs);
                    }
                    $graph->Add($pieplot);
                    $gerou_graf = true;
                 break;
                 case SC_GRAPH_LINE:
                    if (sizeof($dadosY) < 2)
                    {
                        continue;
                    }
                    $graph->legend->Pos(0);
                    $lineplot = new LinePlot($dadosY);
                    $lineplot->SetColor($cor_line);
                    $lineplot->SetWeight(2);
                    if ($preenche == "S")
                    {
                        $lineplot->SetFillColor($cor_line);;
                    }
                    if ($exibe_val == "S")
                    {
                        $lineplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
                        $lineplot->value->SetColor($cor_line);
                        $lineplot->value->SetAngle($this->graf_angulo);
                        $lineplot->value->SetFormat($format_pie_abs);
                        $lineplot->value->SetMargin(2);
                        $lineplot->value->Show();
                    }
                    if ($exibe_marc == "S")
                    {
                       if (!empty($this->graf_tipo_marcas))
                       {
                           $lineplot->mark->SetType($this->graf_tipo_marcas);
                       }
                       else
                       {
                           $lineplot->mark->SetType(MARK_SQUARE);
                       }
                       $lineplot->mark->SetFillColor($cor_line);
                       $lineplot->mark->SetWidth(4);
                    }
                    if ($renda)
                    {
                        $lineplot->SetStepStyle();
                    }
                    if (!$this->sc_graf_sint)
                    {
                        $lineplot->SetLegend($legenda);
                        $goup_graf_line[] = $lineplot;
                    }
                    else
                    {
                        $graph->Add($lineplot);
                    }
                    $gerou_graf = true;
                 break;
                 case SC_GRAPH_SCATTER:
                    $graph->legend->Pos(0);
                    $scatterplot = new ScatterPlot($dadosY);
                    $scatterplot->SetColor($cor_line);
                    $scatterplot->SetWeight(2);
                    if ($exibe_val == "S")
                    {
                        $scatterplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
                        $scatterplot->value->SetFormat($format_pie_abs);
                        $scatterplot->value->SetColor($cor_line);
                        $scatterplot->value->SetAngle($this->graf_angulo);
                        $scatterplot->value->SetMargin(20);
                        $scatterplot->value->Show();
                    }
                    if (!empty($this->graf_tipo_marcas))
                    {
                        $scatterplot->mark->SetType($this->graf_tipo_marcas);
                    }
                    else
                    {
                        $scatterplot->mark->SetType(MARK_SQUARE);
                    }
                    $scatterplot->mark->SetFillColor($cor_line);
                    $scatterplot->mark->SetWidth(4);;
                    if ($impulse)
                    {
                        $scatterplot->SetImpuls();
                    }
                    if (!$this->sc_graf_sint)
                    {
                        $scatterplot->SetLegend($legenda);
                    }
                    $graph->Add($scatterplot);
                    $gerou_graf = true;
                 break;
                 case SC_GRAPH_BAR:
                 default:
                    $graph->legend->Pos(0);
                    $barplot = new BarPlot($dadosY);
                    $barplot->SetFillColor($cor_line);
                    $barplot->SetWeight(1);
                    if ($exibe_val == "S")
                    {
                        $barplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
                        $barplot->value->SetFormat($format_pie_abs);
                        $barplot->value->SetColor($cor_line);
                        $barplot->value->SetAngle($this->graf_angulo);
                        $barplot->value->SetMargin(2);
                        $barplot->value->Show();
                    }
                    if (!$this->sc_graf_sint)
                    {
                        $barplot->SetLegend($legenda);
                        $goup_graf_bar[] =$barplot;
                    }
                    else
                    {
                        $graph->Add($barplot);
                    }
                    $gerou_graf = true;
                 break;
              }
          }
      }
      if (!empty($goup_graf_line))
      {
          $lineplot = new AccLinePlot ($goup_graf_line);
          $graph->Add($lineplot);
      }
      if (!empty($goup_graf_bar))
      {
          $barplot = new GroupBarPlot ($goup_graf_bar);
          $graph->Add($barplot);
      }
      if (isset($GLOBALS["php_errormsg"]) && "" == $GLOBALS["php_errormsg"])
      {
         unset($GLOBALS["php_errormsg"]);
      }
      if ($gerou_graf)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_LiderPista']['opcao'] != "pdf")
          {
              $graph->Stroke();
          }
          else
          {
              $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
              $lixo_graf = $graph->Stroke($this->Ini->root . $this->Ini->path_imag_temp . "/sc_graf_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".jpg");
              $nm_saida->saida("<B><a name=\"$tit_graf\" LEVEL=\"2\">$tit_book_marks</a></B>\r\n");
              $nm_saida->saida("<img src=\"" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_graf_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".jpg\"/>\r\n");
              $_SESSION['scriptcase']['sc_num_img']++;
          }
      }
   }
//
}

?>
