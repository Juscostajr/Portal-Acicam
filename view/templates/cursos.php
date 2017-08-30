<section style="background-color: #3c3d73">
    <div class="container" id='painel-cursos'>
        <h2 style=" margin-left: 40px;" class="espaco laranja"><span class="glyphicon glyphicon-briefcase"></span> Cursos Online (Capacitando.net)</h2>
        <div class="row">
            <div class="col-md-12">
                <div id="cursos" class="carousel slide">
                    <div class="carousel-inner">
                        <?php foreach (array_chunk($read, 4, true) as $key => $array): ?>
                            <div class="<?= $key == 0 ? 'item active' : 'item' ?>">
                                <div class="row">
                                    <?php foreach ($array as $data): ?>
                                        <div class="col-md-3">           
                                            <a href="<?= $data->getLink() ?>">
                                                <div  class="thumbnail height-md">
                                                    <img src="<?= $data->getImagem() ?>" style="width:100%;">
                                                    <div class="caption">
                                                        <p><?= $data->getTitulo() ?></p>
                                                        <p><span class="glyphicon glyphicon-hourglass"></span> <?= $data->getCarga() ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <a data-slide="prev" href="#cursos" class="left carousel-control">‹</a>
                    <a data-slide="next" href="#cursos" class="right carousel-control">›</a>
                </div>
            </div>
        </div>
    </div>
</section>