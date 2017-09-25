<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

require_once "controle/rem_midia.php";
include_once 'controle/grv_midia.php';
//require_once "../app/model/midia.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
//$midia = new PaginaModel();
$patch = '../assets/midia/';
$files = array_diff(scandir($patch), array('.', '..'));

?>

<div class="row">
    <form method="post" enctype="multipart/form-data" name="form">
    <div class="col-md-10">
        <div class='form-group'><input id='file' type='file' name='file' class='file' data-show-preview='true'></div>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-warning btn-block" onclick="form.submit()"><span class="glyphicon glyphicon-upload"></span>
            Carregar
        </button>
    </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome do Arquivo</th>
            <th>Tamanho</th>
            <th>Data de Modificação</th>
            <th>Link</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $key => $value) : ?>
            <?php $file = new SplFileInfo($patch . $value) ?>
            <tr>
                <td>
                    <span class="document-item" filetype="<?= $file->getExtension() ?>">
                        <span class="fileCorner"></span>
                        <?= $file->getFilename() ?>
                    </span>
                </td>
                <td>
                    <?= human_filesize($file->getSize()) ?>
                </td>
                <td><?= date("d/m/Y H:i:s", $file->getCTime()) ?></td>
                <td>
                    <form method='post'>
                        <div class="input-group">
                            <input type='text' name='file' value='/assets/midia/<?= $file->getFilename() ?>'
                                   class="file form-control">
                            <span class="input-group-btn">
                            <button class="btn btn-warning clipboard" type="button">
                                <span class="glyphicon glyphicon-copy"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                </td>
                <td>
                    <button type='button' class='btn btn-danger delete'><span
                            class='glyphicon glyphicon-trash'></span></button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

</div>
<script type="text/javascript" src="js/clipboard.min.js"></script>
<script type="text/javascript">


    var clipboard = new Clipboard('.clipboard', {
        target: function (trigger) {
            return trigger.parentNode.previousElementSibling;
        }
    });

    clipboard.on('success', function (e) {
        console.log(e);
    });

    clipboard.on('error', function (e) {
        console.log(e);
    });

    $(document).on("click", ".delete", function(e) {
        var line = $(this).closest('tr');
        bootbox.confirm("Tem certeza que deseja excluir este item?", function(confirm) {
            if(confirm){

                $.ajax({
                    url: "./controle/rem_midia.php",
                    type: 'post',
                    data: { file: line.find('input').val() },
                    dataType: 'json',
                    success: function(result){
                        $.notify('Item removido com sucesso!','success');
                        line.fadeOut();
                    },
                    error: function(xhr,status){
                        $.notify('Falha ao tentar remover o registro','error');
                        console.log(xhr);
                        console.log(status);
                    }
                });
            }
        });
    });

    $("#file").fileinput({
        language: "pt-BR",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "gif", "doc", "docx" , "ppt" , "pptx" , "pdf" , "xls", "xlsx"]
    });
</script>