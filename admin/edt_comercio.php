<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:33
 */

//require_once "controle/rem_comercio.php";
require_once "../app/model/comercio.php";
require_once "class/Pagger.php";
require_once "../app/frameworks/strings.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
$comercio = new ComercioModel();
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
            <th>Hora de Início</th>
            <th>Hora de Término</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comercio->findAll() as $key => $value) : ?>
            <tr>
                <td data-label="data" data-type="date"><?php echo $value->DT_Comercio ?></td>
                <td data-label="descricao" data-type="text"><?php echo $value->DS_Comercio ?></td>
                <td data-label="hora-inicio" data-type="time"><?php echo $value->HR_Inicio ?></td>
                <td data-label="hora-termino" data-type="time"><?= $value->HR_Termino ?></td>
                <td data-label="action">
                    <button type='button' class='btn btn-warning btn-xs' id="edit"><span
                            class='glyphicon glyphicon-edit'></span></button>
                    <form method='post'>
                        <input type='hidden' name='id' value='<?php echo $value->DT_Comercio ?>'>
                        <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span
                                class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('#edit').click(function () {
        $(this).closest('tr').find('td').each(function () {
            if ($(this).attr('data-label') != 'action') {
                $(this).html('<input type="' + $(this).attr('data-type') + '" class="form-control" value="' + $(this).html() + '">');
            } else {
                $(this).html('<button class="btn btn-success confirm" type="button"><span class="glyphicon glyphicon-check"></span> Salvar</button>');
            }
        });
    });
</script>