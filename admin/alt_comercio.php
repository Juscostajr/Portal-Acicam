<?php
require_once "../app/model/comercio.php";
require_once "../app/frameworks/strings.php";
date_default_timezone_set('America/Sao_Paulo');
include_once "controle/grv_comercio.php";
$srcFoto = date("YmdHis");

$comercio = new PaginaModel();
$value = $comercio->find($_GET['id']);
?>

    
    
    
    




<form method='post' action='' enctype='multipart/form-data' >
    <div class='form-group'>  <input class='form-control' id="url" type='text' name='url' maxlength="60" value="<?= $value->DS_URL ?>" required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>  <input class='form-control' id="titulo" type='text' name='titulo' maxlength="60" value="<?= $value->DS_Titulo ?>" required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>  <input class='form-control' id="keywords" type='text' name='keywords' maxlength="60" value="<?= $value->Keywords ?>" required>
        <div id="contador" class="text-right"></div>
    </div>
    <div class='form-group'>
        <div id="summernote"><?= $value->Conteudo ?></div>
        <textarea name='texto' id='hospedeira' hidden></textarea></div>
    <div class='form-group'><input type='submit' name='submit' class='btn btn-success btn-block' id='submit-btn'></form></div>
</form>

<script type="text/javascript" src="js/noticia.js"></script>

    