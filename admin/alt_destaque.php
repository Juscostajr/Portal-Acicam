<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 14:24
 */

require_once "../app/model/Slider.php";
require_once "../app/model/Postagem.php";
require_once "controle/grv_destaque.php";
$id = $_GET['id'];
$slider = new Slider();
$destaque = $slider->find($id);
$postagem = new Postagem();
if (isset($_POST['submit'])) {
    try {
        $slider->setPostagem($_POST['idpostagem']);
        $slider->setTitulo($_POST['titulo']);
        $slider->setSubtitulo($_POST['subtitulo']);
        $slider->update($id);
        echo alert(GREEN, "Postagem alterada com <b>Sucesso!</b>");
    } catch (Exception $e) {
        echo alert(RED, "<b>Falha</b> ao tentar gravar postagem! $e");
    }
}
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
        <input type="text" class="form-control" name="titulo" maxlength="38" value="<?= $destaque->DS_Titulo ?>">
    </div>
    Subtítulo
    <div class="form-group">
        <input type="text" class="form-control" name="subtitulo" value="<?= $destaque->DS_Subtitulo ?>">
    </div>
    ID da Postagem
    <div class="form-group">
        <div class="input-group">
            <input type="text" id="postagem" name="idpostagem" placeholder="Clique na lupa para consultar postagens"
                   class="form-control" value="<?= $destaque->Postagem_ID_Postagem ?>">
            <span class="input-group-btn">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#consulta">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success btn-block" id='submit-btn'>
    </div>
</form>