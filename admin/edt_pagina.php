<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

require_once "controle/rem_pagina.php";
require_once "../app/model/pagina.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
$pagina = new PaginaModel();
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>URL</th>
            <th>Título</th>
            <th>Conteúdo</th>
            <th>Keywords</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($pagina->findAll() as $key => $value) : ?>
            <tr>
                <td><?php echo $value->ID_paginab?></td>
                <td><?php echo $value->DS_URL?></td>
                <td><?php echo $value->DS_Titulo?></td>
                <td><?= limitarTexto($value->Conteudo,150) ?></td>
                <td><?php echo $value->Keywords?></td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='id' value='<?php echo $value->DS_URL?>'>
                        <button type='button' class='btn btn-warning btn-xs' onClick='window.location = "./?pg=pagina&aba=alterar&id=<?= $value->DS_URL ?>"'><span class='glyphicon glyphicon-edit'></span></button>
                        <button type='button' class='btn btn-danger btn-xs delete'><span class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php echo $pagger->getPagger() ?>
</div>
<script type="text/javascript">
    $(document).on("click", ".delete", function(e) {
        const form = $(this).parent();
        bootbox.confirm("Tem certeza que deseja excluir este item?", function(confirm) {
            if(confirm) {
                form.submit();
            }
        });
    });
</script>
