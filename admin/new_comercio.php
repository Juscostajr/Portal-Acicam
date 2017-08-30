<?php
date_default_timezone_set('America/Sao_Paulo');
include_once "controle/grv_comercio.php";
$srcFoto = date("YmdHis");

?>


<br>

<form method='post' action='' enctype='multipart/form-data'>
    <div class='form-group'>
        <label>Data</label>
        <input class='form-control' id="data" type='date' name='data' required>
    </div>
    <div class='form-group'>
        <label>Descrição</label>
        <input class='form-control' id="descricao" type='text' name='descricao' placeholder='Escreva aqui uma breve descrição' maxlength="80" required>
    </div>
    <div class='form-group'>
        <label>Horário de Início</label>
        <input class='form-control' id="inicio" type='time' name='inicio' required>
    </div>
    <div class='form-group'>
        <label>Horário de Termino</label>
        <input class='form-control' id="termino" type='time' name='termino' required>
    </div>
    <div class='form-group'>
        <input type='submit' name='submit' class='btn btn-success btn-block' id='submit-btn'>
    </div>
</form>