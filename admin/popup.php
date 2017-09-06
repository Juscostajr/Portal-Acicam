<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 23/05/2016
 * Time: 09:44
 */


$pg = isset($_GET['aba']) ? $_GET['aba'] : null; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Popup</h1>
    <div class="alert alert-info">
        <div class="row">
            <div class="col-lg-8"><span class="glyphicon glyphicon-info-sign"></span> Somente será possível editar
                quando o popup estiver inativo
            </div>
            <div class="col-md-3 text-right"><strong>Ativar Popup</strong></div>
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
            <input class="form-control" type="text" placeholder="Informe o título do Popup">
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
                        <img src="../img/popups/acicam+saude-lancamento_2.png" id="fotoPreview" width="600"
                             height="450">
                        <input type="file" id="foto" name="foto" style="display: none;" required>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Opções</label>
            <button class="btn btn-success" type="button" id="btn-add-option-bar"><span class="glyphicon glyphicon-plus"></span> Adicionar Botão
            </button>
            <hr/>

            <div class="row">
                <div class="col-md-12" id="caixa-opcoes">

                </div>
            </div>
        </div>
        <div class="form-group">
            <hr>
            <button class="btn btn-success btn-block" onclick="document.topicos.submit()"><span
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
<script type="text/javascript">
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

    $('#caixa-opcoes').on('click','.btn-del-option-bar',function () {
        $(this).parent().parent().remove();;
    });

    $('#caixa-opcoes').on('change','.btn-color',function () {
        $(this).parent().parent().find('button').first().attr('class', 'form-control btn preview ' + $(this).val());
    });

    $('#caixa-opcoes').on('keyup','.texto',function () {
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
            $('#content').fadeOut();
        } else {
            $('#content').fadeIn('slow');
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
                if(this.width != 600 || this.height != 450){
                    $('#alert-image-preview').attr('class','alert alert-danger');
                    return
                }
                $('#fotoPreview').attr('src', this.src);
            };
        });
        reader.readAsDataURL(input.files[0]);
    }



</script>