<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 24/09/2017
 * Time: 16:06
 */
require_once "../app/frameworks/mensagens.php";
if(!empty($_FILES['file']))
{
    $path = '../assets/midia/';
    $path = $path . basename( $_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        echo alert(GREEN,'O arquivo ' . basename( $_FILES['file']['name']) . ' foi salvo com <b>Sucesso!</b>');
    } else{
        echo alert(RED,'<b>Falha</b> ao tentar gravar arquivo!');
    }
}