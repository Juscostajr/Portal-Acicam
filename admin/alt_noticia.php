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

<img src='../img/fotos/<?= $noticia->Img_Postagem ?>.jpg'>
<form method='post' action='' enctype='multipart/form-data'>
    <div class='form-group'>
        <input class='form-control' type='text' name='titulo' value='<?= $noticia->DS_Titulo ?>'>
    </div>
    <textarea name='conteudo' id='hospedeira' class='form-control' rows='15'><?= $noticia->Conteudo ?></textarea>
    <input type='submit' name='submit' class='btn btn-success' id='submit-btn'>
</form>


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

</script>










