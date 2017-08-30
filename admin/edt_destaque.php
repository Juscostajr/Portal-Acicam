<?php
require_once "controle/rem_destaque.php";
require_once "../app/model/Slider.php";
$slider = new Slider();

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
            <th>ID_Postagem</th>
            <th>Título</th>
            <th>Subtítulo</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($slider->findInterval("ID_Slider",$min,$max) as $key => $value): ?>
            <tr>
                <td><?php echo $value->ID_Slider ?></td>
                <td><img src='../img/destaques/<?php echo $value->Imagem ?>' width='300px'></td>
                <td><?php echo $value->Postagem_ID_Postagem ?></td>
                <td><?php echo $value->DS_Titulo ?></td>
                <td><?php echo $value->DS_Subtitulo ?></td>
                <td>
                    <button type='button' class='btn btn-warning btn-xs' onClick='window.location = "./?pg=destaque&aba=alterar&id=<?= $value->ID_Slider ?>"'><span class='glyphicon glyphicon-edit'></span></button>
                    <form method='post'>
                        <input type='hidden' name='id' value='<?php echo $value->ID_Slider ?>'>
                        <button type='button' class='btn btn-danger btn-xs' onClick='this.parentNode.submit();'><span class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <ul class="pagination">
        <li><a href='./?pg=destaque&aba=editar&ref=1'></a></li>
        <?php for ($i = $ref;$i <= $ref+9; $i++): ?>
            <li><a href='./?pg=destaque&aba=editar&ref=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php endfor ?>
    </ul>
</div>	