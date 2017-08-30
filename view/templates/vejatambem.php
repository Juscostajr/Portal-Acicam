<?php foreach ($postagem as $key => $value): ?>
    <a href='/noticia/<?= $value->ID_Postagem ?>'>
    <div class='row' style='margin: 0'>
        <div class='noticia'>
            <img width='100%' src='/img/fotos/<?= $value->Img_Postagem ?>-tumb.jpg'>
            <div class='noticia-descricao'>
                <h4><span class='glyphicon glyphicon-calendar'></span> <?= $value->data ?></h4>
                <h5><?= $value->DS_Titulo ?></h5>
            </div>
        </div>
    </div>
    </a>
<?php endforeach; ?>

