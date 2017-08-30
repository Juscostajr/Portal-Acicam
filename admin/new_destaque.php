<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 14:24
 */

require_once "../app/model/Postagem.php";
require_once "controle/grv_destaque.php";
$postagem = new Postagem();

?>
<div id="consulta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Consulta</h4>
            </div>
            <div class="modal-body">

                <div class="list-group" style="height: 60vh; overflow: auto">
                    <?php foreach ($postagem->findLast("DT_Postagem", 20) as $key => $value): ?>
                        <a onclick="selecionar(this,'<?php echo $value->ID_Postagem ?>')"
                           class="list-group-item"><?php echo $value->DS_Titulo ?></a>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="modal-footer form-inline">
                <input type="text" class="form-control" name="lname" id="nid" value="" disabled="">
                <button type="button" onclick="passarDados()" class="btn btn-default" data-dismiss="modal">Inserir
                </button>
            </div>
        </div>
    </div>
</div>
<form method="post" role="form" enctype="multipart/form-data">
    Título
    <div class="form-group">
        <input type="text" class="form-control" name="titulo" maxlength="38">
    </div>
    Subtítulo
    <div class="form-group">
        <input type="text" class="form-control" name="subtitulo">
    </div>
    ID da Postagem
    <div class="form-group">
        <div class="input-group">
            <input type="text" id="postagem" name="idpostagem" placeholder="Clique na lupa para consultar postagens"
                   class="form-control" required>
            <span class="input-group-btn">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consulta"><span
                        class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
    </div>
    Imagem
    <div class='form-group'>
        <div class="input-group">
            <input type="text" id="filename" name="nomefoto" class="form-control" required>
           <span class="input-group-btn">
           <label class="btn btn-primary btn-file">
               <span><i class="glyphicon glyphicon-folder-open"></i>. Procurar...</span>
               <input type="file" id="foto" name="foto" style="display: none;" required>
           </label>
           </span>
        </div>
        <div class="panel panel-default" id="panel-foto" style="display: none">
            <div class="panel-body">
                <div id="views"></div>
            </div>
        </div>
    </div>
    <input type="hidden" name="w" id="w">
    <input type="hidden" name="h" id="h">
    <input type="hidden" name="x" id="x">
    <input type="hidden" name="y" id="y">

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success btn-block" id='submit-btn'>
    </div>
</form>
<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {
            $("#loading").show();
            applyCrop();
        });
    });

    $("#file").fileinput({
        language: "pt-BR",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

    $("#foto").change(function () {
        var fileName = $(this).val().split('\\').pop().replace(/\s/g, "-");
        if (fileName.length >= 35) {
            fileName = fileName.substring(0, 25) + ".jpg";
        }

        $("#filename").val(fileName);
        loadImage(this);
        $("#panel-foto").show();

    });
    var jcrop_api;
    var canvas;
    var image;
    function loadImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            canvas = null;
            reader.onload = function (e) {
                image = new Image();
                image.onload = validateImage;
                image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    function validateImage() {
        if (canvas != null) {
            image = new Image();
            image.onload = restartJcrop;
            image.src = canvas.toDataURL('image/png');
        } else restartJcrop();
    }

    function restartJcrop() {
        if (jcrop_api != null) {
            jcrop_api.destroy();
        }
        var size = $("#views").width() - 14;
        $("#views").empty();
        $("#views").append("<canvas id=\"canvas\">");

        canvas = $("#canvas")[0];

        context = canvas.getContext("2d");
        canvas.width = image.width;
        canvas.height = image.height;
        context.drawImage(image, 0, 0);
        image.cropheight = image.width / 2;
        image.crop = (image.height - image.width / 2) / 2;
        image.crop = image.crop < 0 ? 0 : image.crop;
        $("#canvas").Jcrop({
            setSelect: [0, image.crop, image.width, image.cropheight],
            onSelect: selectcanvas,
            boxWidth: size,
            boxHeight: size,
            aspectRatio: 2,
            bgOpacity: 0.4
        }, function () {
            jcrop_api = this;
        });
    }


    function selectcanvas(coords) {
        prefsize = {
            x: Math.round(coords.x),
            y: Math.round(coords.y),
            w: Math.round(coords.w),
            h: Math.round(coords.h)
        };
    }

    function applyCrop() {
        $("#w").val(prefsize.w);
        $("#h").val(prefsize.h);
        $("#x").val(prefsize.x);
        $("#y").val(prefsize.y);

    }




</script>
