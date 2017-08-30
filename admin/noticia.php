<?php $pg = isset( $_GET['aba'] ) ? $_GET['aba'] : null; ?>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Aviso</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick=" window.open('https://servicos.spc.org.br/spc/controleacesso/autenticacao/entry.action','_blank');">Ir para SPC</button>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Notícias</h1>

    <ul class="nav nav-tabs">

        <li <?php if (($pg == "editar") OR ($pg=="")){ echo "class='active'";} ?>><a href="./?pg=noticia&aba=editar"><span class="glyphicon glyphicon-edit"></span> Editar Notícia</a></li>
        <li <?php if ($pg == "nova"){ echo "class='active'";} ?>><a href="./?pg=noticia&aba=nova"><span class="glyphicon glyphicon-plus"></span> Nova Notícia</a></li>
    </ul>
<?php

switch ($pg) {
    case "editar":
        include "edt_noticia.php";
        break;
    case "nova":
        include "new_noticia.php";
        break;
    case "alterar":
        include "alt_noticia.php";
        break;
    default:
        include "edt_noticia.php";

} ?>
</div>
