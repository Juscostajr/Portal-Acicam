<?php
require_once "controle/rem_local.php";
require_once "../app/model/Local.php";

$local = new Local();
$ref = isset( $_GET['ref'] ) ? $_GET['ref'] : 1;

$max = $ref*10;
$min = $max-10;
?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Comentario</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($local->findInterval("NM_Local",$min,$max) as $key=> $value): ?>
            <tr>
                <td><?php echo $value->ID_Local ?></td>
                <td><img src='../img/local/<?php echo $value->ID_Local ?>.jpg' width='300px'></td>
                <td><?php echo $value->NM_Local ?></td>
                <td><?php echo $value->DS_Endereco ?></td>
                <td><?php echo $value->DS_Comentario ?></td>
                <td>
                    <button type='button' class='btn btn-warning btn-xs' onClick='window.location = "./?pg=local&aba=alterar&id="'><span class='glyphicon glyphicon-edit'></span></button>
                    <form method='post'>
                        <input type='hidden' name='id' value='<?php echo $value->ID_Local ?>'>
                        <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <ul class="pagination">
        <li><a href='./?pg=local&aba=editar&ref=1'></a></li>
        <?php for ($i = $ref;$i <= $ref+9; $i++): ?>
            <li><a href='./?pg=local&aba=editar&ref=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php endfor ?>
    </ul>
</div>	