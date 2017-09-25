<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACICAM - Associação Comercial de Campo Mourão</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jcrop.min.js"></script>
    <link href="css/jcrop.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <link href="css/fileinput.css" rel="stylesheet">
    <script src="js/fileinput.min.js"></script>
    <script src="js/fileinput_locale_pt-BR.js"></script>
    <link href="css/principal.css" type="text/css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="external/jquery.hotkeys.js"></script>
    <script src="js/notify.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/loading.css" rel="stylesheet">
    <link href="css/loading-btn.css" rel="stylesheet">
    <script src="js/bootstrap-select.js"></script>
    <script src="js/hotkeys.js"></script>
    <script type="text/javascript">
        function passarDados(){
            nrId = document.getElementById('nid').value;
            document.getElementById('postagem').value = nrId;
        }
        function selecionar(novo,valorID){
            velho = document.getElementById("focus");
            if (velho!=null){
                velho.removeAttribute("id");
            }
            document.getElementById("nid").value = valorID;
            novo.setAttribute("id", "focus");
        }
        bootbox.setDefaults({locale: 'br'});
    </script>
</head>

<body>
<?php $pg= isset($_GET["pg"]) ? $_GET["pg"] : null;?>
<!-- loader -->
<div id="loading" style="display: none;">Loading&#8230;</div>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/cms.png" height="100%"></a>
        </div>

    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li <?php if ($pg == "principal" OR ($pg=="")){ echo "class='active'";} ?>><a href="./?pg=principal"><span class="glyphicon glyphicon-home"></span> Principal <span class="sr-only">(current)</span></a></li>
                <li <?php if ($pg == "noticia"){ echo "class='active'";} ?>><a href="./?pg=noticia"><span class="glyphicon glyphicon-font"></span> Notícias</a></li>
                <li <?php if ($pg == "calendario"){ echo "class='active'";} ?>><a href="./?pg=calendario"><span class="glyphicon glyphicon-calendar"></span> Eventos</a></li>
                <li <?php if ($pg == "destaque"){ echo "class='active'";} ?>><a href="./?pg=destaque"><span class="glyphicon glyphicon-fire"></span> Destaques</a></li>
                <li <?php if ($pg == "comercio"){ echo "class='active'";} ?>><a href="./?pg=comercio"><span class="glyphicon glyphicon-time"></span> Horários do Comércio</a></li>
                <li <?php if ($pg == "topico"){ echo "class='active'";} ?>><a href="./?pg=topico"><span class="glyphicon glyphicon-th-list"></span> Gerenciar Tópicos</a></li>
                <li <?php if ($pg == "pagina"){ echo "class='active'";} ?>><a href="./?pg=pagina"><span class="glyphicon glyphicon-file"></span> Gerenciar Páginas</a></li>
                <li <?php if ($pg == "menu"){ echo "class='active'";} ?>><a href="./?pg=menu"><span class="glyphicon glyphicon-menu-hamburger"></span> Gerenciar Menus</a></li>
                <li <?php if ($pg == "midia"){ echo "class='active'";} ?>><a href="./?pg=midia"><span class="glyphicon glyphicon-film"></span> Adicionar Midia</a></li>
                <li <?php if ($pg == "popup"){ echo "class='active'";} ?>><a href="./?pg=popup"><span class="glyphicon glyphicon-lamp"></span> Popups</a></li>
                <li <?php if ($pg == "local"){ echo "class='active'";} ?>><a href="./?pg=local"><span class="glyphicon glyphicon-map-marker"></span> Gerenciar Local</a></li>
            </ul>
        </div>



        <?php
        $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : null;
        switch ($pg) {
            case "noticia":
                include "noticia.php";
                break;
            case "calendario":
                include "calendario.php";
                break;
            case "destaque":
                include "destaque.php";
                break;
            case "comercio":
                include "comercio.php";
                break;
            case "topico":
                include "topico.php";
                break;
            case "pagina":
                include "pagina.php";
                break;
            case "menu":
                include "menu.php";
                break;
            case "midia":
                include "midia.php";
                break;
            case "popup":
                include "popup.php";
                break;
            case "principal":
                include "principal.php";
                break;
            case "local":
                include "local.php";
                break;
            default:
                include "principal.php";
                break;
        }

        ?>



    </div>
</div>
<!--<script type="text/javascript">-->
<!---->
<!--    var idContador;-->
<!--    var text_max;-->
<!--    $("input[type='text'],input[maxlength],input[name]").keyup(function() {-->
<!--        idContador = $(this).attr('name') + "contador";-->
<!--        if($("#" + idContador).length == 0) {-->
<!--            text_max = $(this).attr("maxlength");-->
<!--            $(this).after("<div id='" + idContador + "' class='text-right'>");-->
<!--        }-->
<!--        var text_length = $(this).val().length;-->
<!--        var text_remaining = text_max - text_length;-->
<!--        var hue = parseInt(text_remaining * 105 / text_max);-->
<!--        $('#' + idContador).html('Restam ' + text_remaining + ' caracteres');-->
<!--        $('#' + idContador).css("color", "hsl(" + hue + ", 95%, 40%)");-->
<!--    });-->
<!---->
<!--</script>-->
</body>
</html>
		