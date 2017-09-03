<?php
date_default_timezone_set('America/Sao_Paulo');
include_once "controle/gvr_noticia.php";
$srcFoto = date("YmdHis");

?>


<br>

<form method='post' action='' enctype='multipart/form-data'>
    <div class='form-group'>
        <label>Título</label>
        <input class='form-control' id="titulo" type='text' name='titulo' maxlength="60"
                                   placeholder='Digite aqui o título da notícia' required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>
        <label>Imagem</label>
        <input id='file' type='file' name='foto' class='file' data-show-preview='true'></div>
    <input type='hidden' name='imag' value='<?= $srcFoto ?>'>
    <div class="alert alert-info">
        <span class="glyphicon glyphicon-info-sign"></span> Se você utiliza o Google Chrome, utilize CTRL+SHIFT+V para colar sem formatação.
    </div>
    <div class='form-group'>
        <div id="summernote"><p></p></div>
        <textarea name='texto' id='hospedeira' hidden></textarea></div>
    <div class='form-group'><input type='submit' name='submit' class='btn btn-success btn-block' id='submit-btn'>
</form></div>
</form>

<script type="text/javascript" src="js/noticia.js"></script>











      


