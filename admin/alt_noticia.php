<?php
require_once "../app/model/Postagem.php";
require_once "../app/frameworks/mensagens.php";
$idpostagem = $_GET["id"];

$postagem = new Postagem();
$noticia = $postagem->find($idpostagem);

if (isset($_POST['submit'])) {
    try {
        $postagem->setTitulo($_POST['titulo']);
        $postagem->setConteudo($_POST['conteudo']);
        $postagem->update($idpostagem);
        echo alert(GREEN, "Postagem alterada com <b>Sucesso!</b>");
    } catch (Exception $e) {
        echo alert(RED, "<b>Falha</b> ao tentar gravar postagem! $e");
    }
}
?>

<form method='post' action='' enctype='multipart/form-data'>
    <div class='form-group'>
        <label>Titulo</label>
        <input class='form-control' type='text' name='titulo' value='<?= $noticia->DS_Titulo ?>'>
    </div>
    <div class="form-group">
        <label>Imagem</label>
        <div class="alert alert-info">
            <span class="glyphicon glyphicon-info-sign"></span> Clique na imagem para substituí-la.
        </div>
        <div class="panel panel-default" id="panel-foto">
            <div class="panel-body text-center">
                <label>
                    <img src="../img/fotos/<?= $noticia->Img_Postagem ?>.jpg" id="fotoPreview"
                         style="max-width: 400px; max-height: 400px">
                    <input type="file" id="foto" name="foto" style="display: none;" required>
                </label>
            </div>
        </div>
    </div>
    <div id="summernote"><?= $noticia->Conteudo ?></div>
    <textarea name='conteudo' id='hospedeira' hidden></textarea>
    <input type='submit' name='submit' class='btn btn-success' id='submit-btn'>
</form>

<script type="text/javascript" src="js/noticia.js"></script>
<script>
    $("#file").fileinput({
        language: "pt-BR",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
    $('#submit-btn').click(function () {
        $('#hospedeira').html(
            $("#editor").html()
        );
    });
    $("#foto").change(function () {
        readURL(this);
    });
    function readURL(input) {
        if (!input.files && !input.files[0]) {
            return
        }
        var reader = new FileReader();
        reader.onload = (function (file) {
            var image = new Image();
            image.src = file.target.result;

            image.onload = function () {
                $('#fotoPreview').attr('src', this.src);
            };
        });
        reader.readAsDataURL(input.files[0]);
    }

</script>










