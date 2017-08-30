<div id="fb-root"></div>
<div class="container">
    <div class="row" id="noticia">
        <div class="col-md-9" id="corpo-texto">
            <article>
                <header>
                    <h2><?= $value->DS_Titulo ?></h2>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" style="font-size:small"><span class="glyphicon glyphicon-time"></span> Publicado em:
                                    <time pubdate="pubdate"><?= date("d/m/y - H:i", strtotime($value->DT_Postagem)) ?></time>
                                </a>
                            </div>
                            <div class="navbar-text navbar-right">
                                <div class="fb-share-button navbar-right" style="margin-right:25px"
                                     data-href="http://acicam.com.br/noticia/<?= $id ?>"
                                     data-layout="button_count" data-mobile-iframe="true"><a
                                        class="fb-xfbml-parse-ignore" target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Facicam.com.br/noticia/<?= $id ?>&amp;src=sdkpreparse">Compartilhar</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                <img class="img-responsive" src='/img/fotos/<?= $value->Img_Postagem ?>.jpg'
                     style='float: left; margin-right: 20px;'><?= $value->Conteudo ?>
            </article>
            <?php if ($evento): ?>

                <h3>Informações do Evento</h3>
                <?php $msg = $evento->NM_Local ? '  <span class="glyphicon glyphicon-map-marker"></span> ' . $evento->NM_Local : null ?>
                <?php $msg .= $evento->DS_Comentario ? '  <span class="glyphicon glyphicon-info-sign"></span> ' . $evento->DS_Comentario : null ?>
                <?php $msg .= $evento->DT_Agendamento ? '  <span class="glyphicon glyphicon-calendar"></span> ' . $evento->DT_Agendamento : null ?>
                <?php $msg .= $evento->DT_Termino ? '  <span class="glyphicon glyphicon-time"></span> ' . $evento->DT_Termino : null ?>
                <?php $msg .= $evento->VL_Ingresso ? '  <span class="glyphicon glyphicon-usd"></span> ' . $evento->VL_Ingresso : null ?>
                <?php $msg .= $evento->DS_Contato ? '  <span class="glyphicon glyphicon-calendar"></span> ' . $evento->DS_Contato : null ?>
                <?php $msg .= $evento->DS_Link ? "  <a href='$evento->DS_Link'><button class='btn btn-info'>Inscrever-se</button> </a>" : null ?>

                <?= alert(BLUE, $msg) ?>



                <div style='overflow:hidden'><div id="info_local" style='height:400px;width:100%;'></div></div>

                <script type="text/javascript">
                    function initMap() {

                        var myLatLng = {lat: -24.0460049, lng: -52.3787175};

                        // Create a map object and specify the DOM element for display.
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: myLatLng,
                            scrollwheel: false,
                            zoom: 16
                        });

                        // Create a marker and set its position.
                        var marker = new google.maps.Marker({
                            map: map,
                            position: myLatLng
                        });

                        var infowindow = new google.maps.InfoWindow({
                            content: '<strong>ACICAM</strong><br>Av. Irmãos Pereira,963<br>'
                        });

                        var myLatLng2 = {lat: <?= $evento->Latitude ?>, lng: <?= $evento->Longitude ?>};

                        // Create a map object and specify the DOM element for display.
                        var map2 = new google.maps.Map(document.getElementById('info_local'), {
                            center: myLatLng2,
                            scrollwheel: false,
                            zoom: 16
                        });

                        // Create a marker and set its position.
                        var marker2 = new google.maps.Marker({
                            map: map2,
                            position: myLatLng2
                        });

                        var infowindow = new google.maps.InfoWindow({
                            content: '<strong><?= $evento->NM_Local ?></strong><br><?= $evento->DS_Endereco ?><br>'
                        });
                    }
                </script>

            <?php endif ?>

            <div class="fb-comments" data-href="http://acicam.com.br/noticia/<?php echo $id ?>"
                 data-numposts="5"></div>
        </div>

        <div class="col-md-3">
            <h3 style="margin-top: 0;">Facebook</h3>
            
            <iframe
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Facicamcm&tabs=timeline&width=340&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId"
                width="100%" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                allowTransparency="true">
            </iframe>

            <h3>Veja Também</h3>
            <div id="ajax_noticia"></div>
        </div>
    </div>
</div>
