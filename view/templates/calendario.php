<?php if(count($agenda) == 0) {echo 'Não há eventos para exibir';} ?>
<?php foreach ($agenda as $key => $value): ?>
    <?php list($dia, $mes) = Calendario::hoje($value->DataNumeral, $value->Dia, $value->Mes) ?>
    <a href='/noticia/<?= $value->Postagem_ID_Postagem ?>'>
        <div class='row' style='margin:0'>
            <div class='noticia'>
                <div class='square'>
                    <div class='<?= ($dia == "!") ? "block today" : "block" ?>'>
                        <div class='centered'>
                            <h2><?= $dia ?></h2>
                            <h5><?= $mes ?></h5>
                        </div>
                    </div>
                </div>
                <div class='noticia-descricao'>
                    <h5><?= $value->DS_Agendamento ?></h5>

                    <div class='marcador-agenda'>
                        <span class='glyphicon glyphicon-time'></span>
                        <?= $value->Horario ?>
                        <span class='glyphicon glyphicon-map-marker'></span>
                        <?= $value->Local ?>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php endforeach ?>

