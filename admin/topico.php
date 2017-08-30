<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 25/01/2017
 * Time: 14:49
 */

$pg = isset( $_GET['aba'] ) ? $_GET['aba'] : null; ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Gerenciar Tópico</h1>
    <?php include "edt_topico.php"; ?>
</div>