<?php foreach ($postagem as $value): ?>
    <a href="/noticia/<?= $value->ID_Postagem ?>">
        <div class="row noticia-grande">
            <div class="col-md-5"><img width='100%' class="img-rounded" src='/img/fotos/<?= $value->Img_Postagem ?>-med.jpg'></div>
            <div class="col-md-7">
                <h2 style="margin-top: 0px;"><?= $value->DS_Titulo ?></h2>
                <p><?= limitarTexto($value->Conteudo,180) ?> veja mais.</p>
                <p><span class="label label-primary"><?= $value->data ?></span></p>
            </div>
        </div>
    </a>
    <hr>
<?php endforeach ?>