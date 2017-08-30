<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:30
 */

$pg = isset( $_GET['aba'] ) ? $_GET['aba'] : null; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Horários de Funcionamento do Comércio</h1>

    <ul class="nav nav-tabs">
        <li <?php if ($pg == "editar"  OR ($pg=="")){ echo "class='active'";} ?>><a href="./?pg=comercio&aba=editar"><span class="glyphicon glyphicon-edit"></span> Editar Evento</a></li>
        <li <?php if ($pg == "nova"){ echo "class='active'";} ?>><a href="./?pg=comercio&aba=nova"><span class="glyphicon glyphicon-plus"></span> Novo Evento</a></li>
    </ul>
    <?php

    switch ($pg) {
        case "editar":
            include "edt_comercio.php";
            break;
        case "nova":
            include "new_comercio.php";
            break;
        case "alterar":
            include "alt_comercio.php";
            break;
        default:
            include "edt_comercio.php";
            break;

    } ?>
</div>