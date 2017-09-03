<?php
require_once "controle/rem_noticia.php";
require_once "../app/model/Postagem.php";
require_once "../app/frameworks/strings.php";

$ref = isset( $_GET['ref'] ) ? $_GET['ref'] : 1;

$postagem = new Postagem();

$max = $ref*10;
$min = $max-10;
?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Conteúdo</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($postagem->findInterval("DT_Postagem",$min,$max) as $key => $value): ?>
            <tr>
                <td><?php echo $value->ID_Postagem ?></td>
                <td><?php echo $value->DS_Titulo ?></td>
                <td><?php echo limitarTexto($value->Conteudo,50) ?></td>
                <td><?php echo $value->DT_Postagem ?></td>
                <td>
                    <button type='button' class='btn btn-warning btn-xs' onClick='window.location = "./?pg=noticia&aba=alterar&id=<?= $value->ID_Postagem ?>"'><span class='glyphicon glyphicon-edit'></span></button>
                    <form method='post'>
                        <input type='hidden' name='id' value='<?php echo $value->ID_Postagem ?>'>
                        <button type='button' class='btn btn-danger btn-xs delete'><span class='glyphicon glyphicon-trash'></span></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <ul class="pagination">
        <li><a href='./?pg=noticia&aba=editar&ref=1'></a></li>
        <?php for ($i = $ref;$i <= $ref+9; $i++): ?>
            <li><a href='./?pg=noticia&aba=editar&ref=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php endfor ?>
    </ul>
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