<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 09/09/2016
 * Time: 11:38
 */

function limitarTexto( $texto , $tamanho ){
    $texto = strip_tags($texto);
    $texto = strlen( $texto ) > $tamanho ? mb_substr( $texto , 0 , $tamanho ) : $texto;
    return  $texto . "...";
}

function human_filesize($bytes, $decimals = 2) {
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}