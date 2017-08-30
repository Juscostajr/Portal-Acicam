<div id="sliderlouder"> 
     <div class="spinner"></div>
</div>
<div id="destaques" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php foreach($slider as $key => $value):
            $class = $key == 0 ? "class='active'" : "";  ?>
            <li data-target="#destaques" data-slide-to="<?= $key ?>" <?= $class ?>></li>
        <?php endforeach ?>
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php foreach($slider as $key => $value) :
            $class = ($key==0) ?  "item active" : "item"; ?>
            <div class='<?= $class ?>'>
                <a href='/noticia/<?= $value->Postagem_ID_Postagem ?>'>
                    <img data-src='/img/destaques/<?= $value->Imagem ?>'>
                    <?php if(!empty($value->DS_Titulo) && !empty($value->DS_Subtitulo)): ?>
                    <div class="carousel-caption">
                        <h1><?= $value->DS_Titulo ?></h1>
                        <p><?= $value->DS_Subtitulo ?></p>
                    </div>
                    <?php endif ?>
                </a>
            </div>
        <?php endforeach ?>
    </div>

    <a class="left carousel-control" href="#destaques" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#destaques" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>


