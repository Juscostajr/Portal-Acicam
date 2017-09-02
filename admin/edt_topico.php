<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 14:53
 */
require_once "controle/rem_topico.php";
require_once "../app/model/sliderSecundario.php";
$slider = new SliderSecundario();
include_once 'controle/grv_topico.php';
?>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<div class="modal fade" id="img-manager" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">


                Imagem
                <form id="form-data" enctype="multipart/form-data">
                    <div class='form-group'>
                        <input id="file" type="file" name="file" placeholder="tamanho ideal (263px X 365px)"
                               class="file form-control" data-show-preview="true">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <form method="post" name="topicos">
        <table class="table table-striped table-hover table-sortable">
            <thead>
            <tr>
                <th>Cor</th>
                <th>Título</th>
                <th>Link</th>
                <th>Imagem</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody id="table">
            <?php foreach ($slider->read('../app/data/slider.json') as $key => $value): ?>

                <tr>
                    <td><input class="form-control" type="color" name="cor[]" value="<?= $value->cor ?>"></td>
                    <td><input class="form-control select" type="text" name="titulo[]"
                               value="<?php echo $value->titulo ?>">
                    </td>
                    <td><input class="form-control select" type="text" name="link[]" value="<?php echo $value->link ?>">
                    </td>
                    <td class="text-center">
                        <a class="img-button">
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
    <button class="btn btn-primary btn-block" id="add"><span class="glyphicon glyphicon-plus"></span> Adicionar</button>
    <button class="btn btn-success btn-block" onclick="document.topicos.submit()"><span
            class="glyphicon glyphicon-save"></span> Salvar
    </button>
</div>
<table style="display: none; visibility: hidden;" id="template">
    <tr>
        <td><input class="form-control" type="color" name="cor[]" value="<?= $value->cor ?>"></td>
        <td><input class="form-control select" type="text" name="titulo[]">
        </td>
        <td><input class="form-control select" type="text" name="link[]">
        </td>
        <td class="text-center">
            <a class="img-button">
                <img src="/img/slider/default.jpg" height="150">
            </a>
            <input type="hidden" name="imagem[]" value="/img/slider/default.jpg">
        </td>
        <td>
            <button type='button' class='btn btn-danger btn-xs remove form-control'><span
                    class='glyphicon glyphicon-trash'></span></button>
        </td>
    </tr>
</table>
<script type="text/javascript">
    var imgActive;
    var elements = 90;
    $("#file").fileinput({
        language: "pt-BR",
        uploadAsync: true,
        uploadUrl: "controle/upImagem.php",
        multiple: false,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

    $('#file').on('fileuploaded', function (event, data) {
        imgActive.find('img').attr('src', '/img/slider/' + data.filenames[0]);
        imgActive.next().attr('value', '/img/slider/' + data.filenames[0]);
        $('#img-manager').modal('toggle');

    });

    $(document).on('focus', '.select', function () {
        this.select();
    });

    $(document).on('click', '.remove', function () {
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.img-button', function () {
        $('#img-manager').modal('toggle');
        imgActive = $(this);
    });

    $("#add").click(function () {
        $('#template').find('tr').clone().appendTo($('#table'));
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


</script>