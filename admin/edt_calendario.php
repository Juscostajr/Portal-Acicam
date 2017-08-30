<?php
require_once "controle/rem_calendario.php";
require_once "../app/model/Agenda.php";
require_once "class/Pagger.php";
$pagger = new Pagger('./?pg=calendario&aba=editar');
$agenda = new Agenda();
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Data</th>
            <th>Local</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($agenda->findInterval("DT_Agendamento",$pagger->getMin(),$pagger->getMax()) as $key => $value) : ?>
            <tr>
                <td><?php echo $value->ID_Agendamento?></td>
                <td><?php echo $value->DS_Agendamento?></td>
                <td><?php echo $value->DT_Agendamento?></td>
                <td><?php echo $value->IN_Local?></td>
                <td>
                    <button type='button' class='btn btn-warning btn-xs' onClick='window.location = "./?pg=calendario&aba=alterar&id="'><span class='glyphicon glyphicon-edit'></span></button>
                    <form method='post'>
                        <input type='hidden' name='id' value='<?php echo $value->ID_Agendamento?>'>
                        <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php echo $pagger->getPagger() ?>
</div>
