<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

require_once "controle/rem_midia.php";
//require_once "../app/model/midia.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
//$midia = new PaginaModel();
$patch = '../assets/midia/';
$files = array_diff(scandir($patch), array('.', '..'));
?>
<div class="row">
    <div class="col-md-10"><div class='form-group'><input id='file' type='file' name='foto' class='file' data-show-preview='true'></div></div>
    <div class="col-md-2"><button type="button" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-upload"></span> Carregar</button></div>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome do Arquivo</th>
            <th>Tamanho</th>
            <th>Data de Modificação</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $key => $value) : ?>
            <?php $file = new SplFileInfo($patch.$value) ?>
            <tr>
                <td>
                    <span class="document-item" filetype="<?= $file->getExtension() ?>">
                        <span class="fileCorner"></span>
                        <?= $file->getFilename() ?>
                    </span>
                </td>
                <td>
                    <?= human_filesize($file->getSize())?>
                </td>
                <td><?= date ("d/m/Y H:i:s", $file->getCTime()) ?></td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='file' value='<?= $file->getFilename() ?>'>
                        <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

</div>
<script type="text/javascript" src="js/noticia.js"></script>