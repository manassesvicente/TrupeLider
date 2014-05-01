<?php
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
if ($nm_cod_campo ==  "complemento")
{
?>
    <b>Complemento</b><br>Digitar o complemento do endereço da Turma realizada.<br><br> 
<?php
}
?>
