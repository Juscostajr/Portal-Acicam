<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 15:30
 */

$pg = isset( $_GET['aba'] ) ? $_GET['aba'] : null; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Mídia</h1>
    
    <?php

    switch ($pg) {
        case "editar":
            include "edt_midia.php";
            break;
        case "nova":
            include "new_midia.php";
            break;
        case "alterar":
            include "alt_midia.php";
            break;
        default:
            include "edt_midia.php";
            break;

    } ?>
</div>