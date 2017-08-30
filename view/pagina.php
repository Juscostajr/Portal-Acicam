<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <h2 class="sub-header"><?= $conteudo->DS_Titulo ?></h2>
    </div>
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <?php foreach ($pagina->loadMenu($conteudo->DS_URL) as $menu) : ?>
                    <?= ($menu->Pagina_DS_URL == $conteudo->DS_URL) ? '<li class="active">' : '<li>' ?>
                        <a href='/pagina/<?= $menu->Pagina_DS_URL ?>'><?= $menu->DS_Titulo ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="col-md-10">
            <?= $conteudo->Conteudo ?>
        </div>
    </div>


</div>