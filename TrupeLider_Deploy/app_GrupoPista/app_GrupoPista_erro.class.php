<?php

class app_GrupoPista_erro
{
   var $Ini;

   var $script;
   var $linha;
   var $tipo;
   var $mensagem;
   var $complemento;
   var $msg_final;

   //----- Construtor
   function app_GrupoPista_erro()
   {
      $this->script      = "";
      $this->linha       = "";
      $this->tipo        = "";
      $this->mensagem    = "";
      $this->complemento = "";
      $this->msg_final   = "";
   }

   //----- Exibe mensagem de erro
   function mensagem($script, $linha, $tipo, $mensagem, $complemento = "", $exibe = true)
   {
      $this->script      = $script;
      $this->linha       = $linha;
      $this->tipo        = strtolower($tipo);
      $this->mensagem    = trim($mensagem);
      $this->complemento = trim($complemento);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN' && $this->tipo == 'banco' && empty($this->complemento))
      {
          return false;
      }
      $this->monta_mensagem();
      return scriptcase_error_handler(E_USER_ERROR, $this->msg_final, $script, $linha, $exibe);
   }

   //----- Exibe mensagem de erro
   function monta_mensagem()
   {
      $mensagem = $this->mensagem;
      if ("banco" == $this->tipo)
      {
         $mensagem .= "<BR>" . $this->complemento;
      $mensagem .= "<BR>" . $_SESSION['scriptcase']['sc_sql_ult_comando'];
      }
      $this->msg_final = $mensagem;
   }

}

?>
