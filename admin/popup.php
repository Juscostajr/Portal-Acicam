<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 23/05/2016
 * Time: 09:44
 */
require_once '../app/model/Popup.php';
$pg = isset($_GET['aba']) ? $_GET['aba'] : null;


?>
<form method="post" name="form" enctype="multipart/form-data">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Popup</h1>
    <?php include_once 'controle/grv_popup.php';
    $popup = new Popup('../app/data/popup.json');
    $popup->read();?>
    <div class="alert alert-info">
        <div class="row">
            <div class="col-lg-8"><span class="glyphicon glyphicon-info-sign"></span> Somente será possível editar
                quando o popup estiver inativo
            </div>
            <div class="col-md-3 text-right"><strong>Popup Ativo?</strong></div>
            <div class="col-md-1" style="padding: 5px">
                <label class="switch">
                    <input type="checkbox" id="ativar">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="form-group">
            <label>Titulo</label>
            <input class="form-control" type="text" placeholder="Informe o título do Popup"
                   value="<?= $popup->getTitle() ?>" name="titulo">
        </div>
        <div class="form-group">
            <label>Imagem</label>
            <div class="alert alert-info">
                <span class="glyphicon glyphicon-info-sign"></span> Clique na imagem para substituí-la.
            </div>
            <div class="alert alert-warning" id="alert-image-preview">
                <strong>Atenção!</strong> Apenas imagens nas dimensões 600 x 450 pixels são permitidas.
            </div>
            <div class="panel panel-default" id="panel-foto">
                <div class="panel-body text-center">
                    <label>
                        <img src="../img/popups/<?= $popup->getImage() ?>" id="fotoPreview" width="600"
                             height="450">
                        <input type="file" id="foto" name="foto" style="display: none;">
                    </label>
                </div>
            </div>
        </div>
        <input type="hidden" name="oldfoto" value="<?= $popup->getImage() ?>">
        <div class="form-group">
            <label>Opções</label>
            <button class="btn btn-success" type="button" id="btn-add-option-bar"><span
                    class="glyphicon glyphicon-plus"></span> Adicionar Botão
            </button>
            <hr/>

            <div class="row">
                <div class="col-md-12" id="caixa-opcoes">
                    <?php foreach ($popup->getButtons() as $button): ?>
                        <div class="row option-bar">
                            <div class="col-md-2">
                                <label>Cor do Botão</label>
                                <select class="form-control btn-color" name="cor[]">
                                    <option value="<?= $button->color ?>" class="<?= $button->color ?>">Atual</option>
                                    <option value="btn-default" class="btn-default">Default</option>
                                    <option value="btn-primary" class="btn-primary">Primary</option>
                                    <option value="btn-warning" class="btn-warning">Warning</option>
                                    <option value="btn-danger" class="btn-danger">Danger</option>
                                    <option value="btn-info" class="btn-info">Info</option>
                                    <option value="btn-success" class="btn-success">Success</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Texto do Botão</label>
                                <input type="text" class="form-control texto" name="texto[]"
                                       value="<?= $button->text ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link[]" value="<?= $button->link ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Preview</label>
                                <button type="button"
                                        class="btn <?= $button->color ?> form-control preview"><?= $button->text ?></button>
                            </div>
                            <div class="col-md-1">
                                <label>Remover</label>
                                <button type="button" class="btn btn-danger form-control btn-del-option-bar"><span
                                        class="glyphicon glyphicon-trash"></span>
                                </button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <hr>
            <button class="btn btn-success btn-block" id="btn-salvar" onclick="document.form.submit()"><span
                    class="glyphicon glyphicon-save"></span> Salvar
            </button>
        </div>
    </div>
</div>
<div style="display: none; visibility: hidden;" id="hidden">
    <div class="row option-bar">
        <div class="col-md-2">
            <label>Cor do Botão</label>
            <select class="form-control btn-color" name="cor[]">
                <option value="btn-default" class="btn-default">Default</option>
                <option value="btn-primary" class="btn-primary">Primary</option>
                <option value="btn-warning" class="btn-warning">Warning</option>
                <option value="btn-danger" class="btn-danger">Danger</option>
                <option value="btn-info" class="btn-info">Info</option>
                <option value="btn-success" class="btn-success">Success</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Texto do Botão</label>
            <input type="text" class="form-control texto" name="texto[]">
        </div>
        <div class="col-md-3">
            <label>Link</label>
            <input type="text" class="form-control" name="link[]">
        </div>
        <div class="col-md-2">
            <label>Preview</label>
            <button type="button" class="btn btn-default form-control preview">Preview</button>
        </div>
        <div class="col-md-1">
            <label>Remover</label>
            <button type="button" class="btn btn-danger form-control btn-del-option-bar"><span
                    class="glyphicon glyphicon-trash"></span>
            </button>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">

    $.getJSON("/app/data/popup.json", function (result) {
        $('#ativar').prop('checked', result.itens.active);
        if (result.itens.active) {
            $('#content').hide();
        }
    });

    $("#file").fileinput({
        language: "pt-BR",
        uploadAsync: true,
        uploadUrl: "controle/upImgMenuServicosOnline.php",
        multiple: false,
        allowedFileTypes: ['image']
    });


    $('#btn-add-option-bar').click(function () {
        $('#hidden').children().first().clone().appendTo($('#caixa-opcoes'));
    });

    $('#caixa-opcoes').on('click', '.btn-del-option-bar', function () {
        $(this).parent().parent().remove();
        ;
    });

    $('#caixa-opcoes').on('change', '.btn-color', function () {
        $(this).parent().parent().find('button').first().attr('class', 'form-control btn preview ' + $(this).val());
    });

    $('#caixa-opcoes').on('keyup', '.texto', function () {
        $(this).parent().parent().find('button').first().html($(this).val());
    });

    $('#ativar').change(function () {
        showWhenUnchecked();
    });

    $("#foto").change(function () {
        readURL(this);
    });

    function showWhenUnchecked() {
        if ($('#ativar').is(':checked')) {
            $.ajax({
                url: "./controle/ativar_popup.php",
                type: 'get',
                dataType: 'json',
                success: function (result) {
                    $('#content').fadeOut();
                },
                error: function (xhr, status) {
                    $.notify('Falha ao tentar modificar o registro: ' + xhr.responseJSON.falha.errorInfo[2] + '', 'error');
                    console.log(xhr);
                    console.log(status);
                }
            });
        } else {
            $.ajax({
                url: "./controle/desativar_popup.php",
                type: 'get',
                dataType: 'json',
                success: function (result) {
                    $('#content').fadeIn('slow');
                },
                error: function (xhr, status) {
                    $.notify('Falha ao tentar modificar o registro: ' + xhr.responseJSON.falha.errorInfo[2] + '', 'error');
                    console.log(xhr);
                    console.log(status);
                }
            });
        }
    }

    function readURL(input) {
        if (!input.files && !input.files[0]) {
            return
        }
        var reader = new FileReader();
        reader.onload = (function (file) {
            var image = new Image();
            image.src = file.target.result;

            image.onload = function () {
                // access image size here
                console.log(this.width);
                if (this.width != 600 || this.height != 450) {
                    $('#alert-image-preview').attr('class', 'alert alert-danger');
                    return
                }
                $('#fotoPreview').attr('src', this.src);
            };
        });
        reader.readAsDataURL(input.files[0]);
    }


</script>