<?php
date_default_timezone_set('America/Sao_Paulo');
//include_once "controle/grv_pagina.php";
$srcFoto = date("YmdHis");

?>


<br>

<form method='post' action='' enctype='multipart/form-data' >
    <div class='form-group'>  <input class='form-control' id="url" type='text' name='url' maxlength="60" placeholder='Digite aqui link da página (ex: meu-link)' required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>  <input class='form-control' id="titulo" type='text' name='titulo' maxlength="60" placeholder='Digite aqui o título da notícia' required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>  <input class='form-control' id="keywords" type='text' name='keywords' maxlength="60" placeholder='Digite aqui os keywords' required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>
        <div id="summernote"><p></p></div>
        <textarea name='texto' id='hospedeira' hidden></textarea></div>
    <div class='form-group'><input type='submit' name='submit' class='btn btn-success btn-block' id='submit-btn'></form></div>
</form>

<script type="text/javascript" src="js/noticia.js"></script>