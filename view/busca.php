<div class="container">
    <h2>Resultados da Pesquisa</h2>
    <?php if($pagina) : ?>
    <h4>Páginas</h4>
    <ul class="list-group">
        <?php foreach ($pagina as $pg): ?>
        <li class='list-group-item list-group-item-info'><a href="/pagina/<?=$pg->DS_URL?>"><?= $pg->DS_Titulo ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php endif?>
    <?php if ($postagens) : ?>
    <h4>Notícias</h4>
    <ul class='list-group'>
        <?php foreach ($postagens as $ps): ?>
        <li class='list-group-item'><span class="glyphicon glyphicon-calendar"></span><strong><?= $postagem->formatDatePt($ps->DT_Postagem) ?></strong> | <a href="/noticia/<?=$ps->ID_Postagem?>"><?= $ps->DS_Titulo ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php endif?>
    <?php if(!$pagina && !$postagens): ?>
    <h4>Nenhum resultado encontrado</h4>
    <?php endif ?>
</div>