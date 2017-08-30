<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:30
 */

$pg = isset( $_GET['aba'] ) ? $_GET['aba'] : null; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Menus</h1>

    <ul class="nav nav-tabs">
        <li <?php if ($pg == "editar"  OR ($pg=="")){ echo "class='active'";} ?>><a href="./?pg=menu&aba=editar"><span class="glyphicon glyphicon-edit"></span> Editar Itens</a></li>
        <li <?php if ($pg == "nova"){ echo "class='active'";} ?>><a href="./?pg=menu&aba=nova"><span class="glyphicon glyphicon-plus"></span> Novo Item</a></li>
        <li <?php if ($pg == "online"){ echo "class='active'";} ?>><a href="./?pg=menu&aba=online"><span class="glyphicon glyphicon-edit"></span> Menu Serviços Online</a></li>
    </ul>
    <?php

    switch ($pg) {
        case "editar":
            include "edt_menu.php";
            break;
        case "nova":
            include "new_menu.php";
            break;
        case "alterar":
            include "alt_menu.php";
            break;
        case "online":
            include "edt_menu_serv_online.php";
            break;
        default:
            include "edt_menu.php";
            break;

    } ?>
</div>