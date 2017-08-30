<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 14:53
 */
require_once "controle/rem_topico.php";
require_once "../app/model/MenuServOnline.php";
$slider = new MenuServOnline();
include_once 'controle/grv_topico.php';
?>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<div class="modal fade" id="img-manager" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alterar Imagem</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <strong>Atenção!</strong> São permitidas apenas imagens no formato gif com dimensões 125x125 pixels.
                </div>

                Imagem
                <form id="form-data" enctype="multipart/form-data">
                    <div class='form-group'>
                        <input id="file" type="file" name="file" placeholder="tamanho ideal (263px X 365px)" class="file form-control" data-show-preview="true">
                    </div>              
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="alert alert-info">
    <span class="glyphicon glyphicon-info-sign"></span> Você poderá arrastar os itens para trocá-los de posição.
</div>
<div class="table-responsive">
    <form method="post" name="topicos">
    <table class="table table-striped table-hover table-sortable">
        <thead>
            <tr>
                <th>Título</th>
                <th>Link</th>
                <th>Imagem</th>
                <th>Ação</th>
            </tr>
        </thead>   
        <tbody>
            <?php foreach ($slider->read('../app/data/servicosOnline.json') as $key => $value): ?>

                <tr>
                    <td><input class="form-control select" type="text" name="titulo[]" value="<?php echo $value->titulo ?>">
                    </td>
                    <td><input class="form-control select" type="text" name="link[]" value="<?php echo $value->link ?>">
                    </td>
                    <td class="text-center">
                        <a class="img-button" data-toggle="modal" data-target="#img-manager">
                            <img src="<?= $value->imagem ?>" height="150" id="img-<?= $key ?>">
                        </a>
                        <input type="hidden" name="imagem[]" id="img-<?= $key ?>-input" value="<?= $value->imagem ?>">
                    </td>
                    <td>
                        <button type='button' class='btn btn-danger btn-xs remove form-control'><span
                                class='glyphicon glyphicon-trash'></span></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        
    </table>
</form>
    <button class="btn btn-success btn-block" onclick="document.topicos.submit()"><span class="glyphicon glyphicon-save"></span> Salvar</button>
</div>
<script type="text/javascript">
    var imgActive;
    var elements = 90;
    $("#file").fileinput({
        language: "pt-BR",
        uploadAsync: true,
        uploadUrl: "controle/upImgMenuServicosOnline.php",
        multiple: false,
        allowedFileExtensions: ["gif"],
        minImageHeight: 125,
        maxImageHeight: 125,
        minImageWidth: 125,
        maxImageWidth: 125
    });

    $('#file').on('fileuploaded', function (event,data) {   
        var img = '#' + imgActive;
        var imgInput = img + '-input'; 
        $(img).attr('src','/img/slider/' + data.filenames[0]);
        $(imgInput).attr('value','/img/slider/' + data.filenames[0]);
        $('#img-manager').modal('toggle');
    });

    $('.img-button').click(function (){
        imgActive = $(this).find('img').attr('id');
    });
    $(document).on('focus', '.select', function () {
        this.select();
    });

    $(document).on('click', '.remove', function () {
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.img-button', function () {
        $('#filename').val($(this).find('img').attr('src'));
    });

    $(document).ready(function () {

        // Sortable Code
        var fixHelperModified = function (e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();

            $helper.children().each(function (index) {
                $(this).width($originals.eq(index).width())
            });

            return $helper;
        };

        $(".table-sortable tbody").sortable({
            helper: fixHelperModified
        }).disableSelection();

        $(".table-sortable thead").disableSelection();


    });

    $("#add").click(function () {
        elements++;
        var line = $(".table-sortable tbody").first();
        line.append("<tr>" +
                "<td>" +
                "<input class='form-control' type='color' name='cor[]'>" +
                "</td>" +
                "<td><input class='form-control select' type='text' name='titulo[]' required> </td>" +
                "<td><input class='form-control select' type='text' name='link[]' required> </td>" +
                "<td class='text-center'><a class='img-button' data-toggle='modal' data-target='#img-manager'><img src='/img/slider/default.jpg' height='150' id=img-"+elements+"></a><input type='hidden' name='imagem[]' value='/img/slider/default.jpg'></td>" +
                "<td> <button type='button' class='btn btn-danger btn-xs remove form-control'><span class='glyphicon glyphicon-trash'></span></button> </td> </tr>");    
    });
</script>