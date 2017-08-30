<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#3c3d73"/>
        <title>ACICAM - Associação Comercial de Campo Mourão</title>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/custom.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Crete+Round|Orbitron:400,700" rel="stylesheet">

        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="/assets/js/map.js"></script>

        <script type="text/javascript" src="/assets/js/popular_formulario.js"></script>
        <script type="text/javascript" src="/assets/js/modal_ajax.js"></script>
        <script type="text/javascript">
            function ajax(url, resposta) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(resposta).innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", url, true);
                xhttp.send();
            }

            $(document).ready(function () {
                var carousel = $('.carousel').hide();
                var deferreds = [];
                var imgs = $('.carousel').find('img');

                // loop over each img
                imgs.each(function () {
                    var self = $(this);
                    var datasrc = self.attr('data-src');

                    if (datasrc) {
                        var d = $.Deferred();
                        self.one('load', d.resolve)
                                .attr("src", datasrc)
                                .attr('data-src', '');
                        deferreds.push(d.promise());
                    }
                });

                $.when.apply($, deferreds).done(function () {
                    $('#sliderlouder').hide();
                    carousel.fadeIn(1000);
                });

            });
        </script>
        <script type="text/javascript" src="/assets/js/analytics.js"></script>
        <?= $head ?>
    </head>
    <body>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" id="modal-form">

                <!-- modal ajax -->

            </div>
        </div>
        <header>
            <nav class="navbar-inverse hidden-xs" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/"><h6 style="color: #ffffff">Associação Comercial e Industrial
                                de Campo Mourão</h6></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="dropdown navbar-form">
                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><span
                                        class="glyphicon glyphicon-earphone"></span> Ligue
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu" aria-labelledby="drop1">
                                    <div class="sub-menu-grupo rosa">
                                        <h4>Comercial</h4>
                                        <ul>
                                            <li>(44)3518-8011</li>
                                            <li>(44)3518-8027</li>
                                            <li>(44)3518-8047</li>
                                        </ul>
                                    </div>
                                    <div class="sub-menu-grupo laranja">
                                        <h4>Outros</h4>
                                        <ul>
                                            <li><strong>Protesto F&aacute;cil</strong></li>
                                            <li>(44)3518-8031</li>
                                            <li><strong>Proe</strong></li>
                                            <li>(44)3518-8012</li>
                                            <li><strong>Certificado Digital</strong></li>
                                            <li>(44)3518-8004</li>
                                            <li><strong>Espa&ccedil;o MEI</strong></li>
                                            <li>(44)3518-8026</li>
                                            <li><strong>Junta Comercial</strong></li>
                                            <li>(44)3518-8003</li>
                                            <li>(44)3518-8013</li>
                                        </ul>
                                    </div>
                                    <div class="sub-menu-grupo verde">
                                        <h4>Administrativo</h4>
                                        <ul>
                                            <li>(44)3518-8014</li>
                                            <li>(44)3518-8015</li>
                                            <li>(44)3518-8016</li>
                                        </ul>
                                    </div>
                                    <div class="sub-menu-grupo azul">
                                        <h4>SPC</h4>
                                        <ul>
                                            <li>(44)3518-8005</li>
                                            <li>(44)3518-8006</li>
                                            <li>(44)3518-8007</li>
                                            <li>(44)3518-8008</li>
                                            <li>(44)3518-8009</li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <form class="navbar-form" action="/busca/" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="pesquisa" placeholder="Pesquisar neste site"
                                               class="form-control">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>


            <nav class=" navbar navbar-toggleable-md navbar-default">


                <button class="navbar-toggle navbar-toggle-right" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

                <button class="navbar-toggle" type="button" data-toggle="collapse" onclick="location = 'tel:04435188047'"><span
                        class="glyphicon glyphicon-earphone"></span>
                </button>

                <button class="navbar-toggle" type="button" data-toggle="collapse" onclick="location = '/busca/'"><span
                        class="glyphicon glyphicon-search"></span>
                </button>
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/"><img height="100%" src="/img/logo-acicam.png"></a>
                    </div>

                    <div class="navbar-right collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                            <!-- menu dinâmico -->
                            <?php foreach ($menu->findMainMenu() as $avo): ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                           <?= $avo->DS_Titulo ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="drop1">
                                        <?php foreach ($menu->findChildMenu($avo->DS_Titulo) as $key => $pai): ?>
                                            <div class="sub-menu-grupo <?= $color[$key] ?>">
                                                <h4><?= $pai->DS_Titulo ?></h4>
                                                <ul>
                                                    <?php foreach ($menu->findChildMenu($pai->DS_Titulo) as $filho): ?>
                                                        <li><a href="/pagina/<?= $filho->Pagina_DS_URL ?>"><?= $filho->DS_Titulo ?></a>
                                                        </li>
                                                    <?php endforeach ?>

                                                </ul>
                                            </div>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                            <?php endforeach ?>
                            <li><a href="/pagina/associe-se">Associe-se</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>