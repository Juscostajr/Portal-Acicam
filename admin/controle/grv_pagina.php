<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 06/05/2016
 * Time: 15:53
 */
require_once "../app/model/pagina.php";
require_once "class/WideImage.php";
require_once "../app/frameworks/mensagens.php";

$pagina = new PaginaModel();
if (isset($_POST['titulo'])) {

    $pagina->setUrl($_POST['url']);
    $pagina->setTitulo($_POST['titulo']);
    $pagina->setConteudo($_POST['texto']);
    $pagina->setKeywords($_POST['keywords']);

    try {
        $pagina->insert();
        echo alert(GREEN, "Postagem efetuada com <b>Sucesso!</b>");
    } catch (Exception $e) {
        echo alert(RED, "<b>Falha</b> ao tentar gravar postagem!<br>" . $e);
    }
}


