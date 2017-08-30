<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 20/05/2016
 * Time: 16:35
 */
require_once "class/WideImage.php";
require_once "../app/model/Local.php";
require_once "../app/frameworks/mensagens.php";

$local = new Local();

if (isset($_POST['submit'])){
    $imagem = $_FILES["foto"]["name"];
    $local->setComentario($_POST["comentario"]);
    $local->setEndereco($_POST["txtEndereco"]);
    $local->setLatitude($_POST["txtLatitude"]);
    $local->setLongitude($_POST["txtLongitude"]);
    $local->setNome($_POST["titulo"]);

    try {
        WideImage::loadFromUpload("foto")->saveToFile("../img/local/$imagem");
        $local->insert();
        echo alert(GREEN,"Local gravado com <b>Sucesso!</b>");
    } catch (Exception $e) { echo alert(RED,"<b>Falha</b> ao gravar local!<hr>$e");
    }
}

