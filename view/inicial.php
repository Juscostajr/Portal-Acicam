<?php if ($popup->getActive()): ?>
    <div id="popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-gray">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?= $popup->getTitle() ?></h4>
                </div>
                <div class="modal-body">
                    <img src="/img/popups/<?= $popup->getImage() ?>" width="100%">
                </div>
                <div class="modal-footer">
                    <?php foreach ($popup->getButtons() as $button): ?>
                        <a href="<?= $button->link ?>">
                            <button type="button" class="btn <?= $button->color ?>"><?= $button->text ?></button>
                        </a>
                    <?php endforeach ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $('#popup').modal('show');
    </script>
<?php endif ?>

<!-- Sessão Destaques -->
<section>
    <div class="container">
        <div class="row">
            <!-- Slider Destaques -->
            <div class="col-lg-9 col-md-12">
                <?php $noticia->showSlider() ?>
            </div>
            <!-- Serviços Online -->
            <div class="col-lg-3">
                <h2 class="notop">Serviços <b>Online</b></h2>
                <div id="metro-menu">
                    <?php foreach ($menuServOnline->read() as $menu): ?>
                        <div class="hoverzoom">
                            <img src="<?= $menu->imagem ?>">
                            <a href="<?= $menu->link ?>"
                               target="_BLANK">
                                <div class="retina">
                                    <p><?= $menu->titulo ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2><span class="glyphicon glyphicon-list-alt"></span> Notícias</h2>

                <?php $noticia->showPrincipais(13) ?>
                <!--                <button type="button" class="btn btn-primary btn-block"><span-->
                <!--                        class="glyphicon glyphicon-option-horizontal"></span> Ver mais-->
                <!--                </button>-->
            </div>
            <div class="col-md-3">
                <!-- Agenda -->
                <div>
                    <h2><span class="glyphicon glyphicon-calendar"></span> Eventos</h2>
                    <?php $calendario->show(5) ?>
                </div>
                <div>
                    <?php $comercio->show(5) ?>
                </div>

                <div>
                    <?php foreach ($sliderSecundario->read() as $item): ?>
                        <h3><span class="glyphicon glyphicon-chevron-right"
                                  style="color:<?= $item->cor ?>"></span> <?= $item->titulo ?></h3>
                        <a href="<?= $item->link ?>"><img class="img-responsive" src="<?= $item->imagem ?>"
                                                          width="100%"></a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php //$cursos->show() ?>

