<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 23/05/2016
 * Time: 09:44
 */


$pg = isset( $_GET['aba'] ) ? $_GET['aba'] : null; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Local</h1>

    <ul class="nav nav-tabs">
        <li <?php if ($pg == "editar" OR ($pg=="")){ echo "class='active'";} ?>><a href="./?pg=local&aba=editar"><span class="glyphicon glyphicon-edit"></span> Editar Local</a></li>
        <li <?php if ($pg == "nova"){ echo "class='active'";} ?>><a href="./?pg=local&aba=nova"><span class="glyphicon glyphicon-plus"></span> Novo Local</a></li>
    </ul>
    <?php

    switch ($pg) {
        case "editar":
            include "edt_local.php";
            break;
        case "nova":
            include "new_local.php";
            break;
        default:
            include "edt_local.php";
            break;

    } ?>
</div>