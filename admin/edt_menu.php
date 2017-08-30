<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

//require_once "controle/rem_menu.php";
require_once "../app/model/menu.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
$menu = new Menu();
?>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Submenu de:</th>
            <th>Url</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($menu->findMainMenu() as $avo): ?>
            <tr class="danger">
                <td data-label="titulo" data-type="text"><?= $avo->DS_Titulo ?></td>
                <td data-label="titulo-pai" data-type="text"></td>
                <td data-label="url" data-type="text"><?= $avo->Pagina_DS_URL ?></td>
                <td data-label="action">
                    <form method='post'>
                        <input type='hidden' name='id' value='<?= $avo->Pagina_DS_URL ?>'>
                        <button type='button' class='btn btn-warning btn-xs edit'><span class='glyphicon glyphicon-edit'></span></button>
                        <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
            <?php foreach ($menu->findChildMenu($avo->DS_Titulo) as $key => $pai): ?>
                <tr class="info">
                    <td data-label="titulo" data-type="text"><?= $pai->DS_Titulo ?></td>
                    <td data-label="titulo-pai" data-type="text"><?= $avo->DS_Titulo ?></td>
                    <td data-label="url" data-type="text"><?= $pai->Pagina_DS_URL ?></td>
                    <td data-label="action">
                        <form method='post'>
                            <input type='hidden' name='id' value='<?= $pai->Pagina_DS_URL ?>'>
                            <button type='button' class='btn btn-warning btn-xs edit'><span class='glyphicon glyphicon-edit'></span></button>
                            <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span></button>
                        </form>
                    </td>
                </tr>
                <?php foreach ($menu->findChildMenu($pai->DS_Titulo) as $filho): ?>
                    <tr>
                        <td data-label="titulo" data-type="text"><?= $filho->DS_Titulo ?></td>
                        <td data-label="titulo-pai" data-type="text"><?= $pai->DS_Titulo ?></td>
                        <td data-label="url" data-type="text"><?= $filho->Pagina_DS_URL ?></td>
                        <td data-label="action">
                            <form method='post'>
                                <input type='hidden' name='id' value='<?= $filho->Pagina_DS_URL ?>'>
                                <button type='button' class='btn btn-warning btn-xs edit'><span class='glyphicon glyphicon-edit'></span></button>
                                <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endforeach ?>
        </tbody>
    </table>
<script type="text/javascript">
    $('.edit').click(function () {
        $(this).closest('tr').find('td').each(function () {
            if ($(this).attr('data-label') != 'action') {
                $(this).html('<input type="' + $(this).attr('data-type') + '" class="form-control" value="' + $(this).html() + '">');
            } else {
                $(this).html('<button class="btn btn-xs btn-success confirm" type="button"><span class="glyphicon glyphicon-check"></span> Salvar</button>');
            }
        });
    });
</script>