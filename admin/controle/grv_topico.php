<?php

if (isset($_POST['cor'])) {
    require_once "../app/frameworks/mensagens.php";
//header('Content-Type: application/json; charset=utf-8');
    $topico = array();
    foreach ($_POST['cor'] as $key => $value) {
        $cor = $_POST['cor'][$key];
        $titulo = $_POST['titulo'][$key];
        $link = $_POST['link'][$key];
        $imagem = $_POST['imagem'][$key];
        array_push($topico, ['cor' => $cor, 'titulo' => $titulo, 'link' => $link, 'imagem' => $imagem]);
    }

    try {
        $fp = fopen('../app/data/slider.json', 'w');
        fwrite($fp, json_encode(['itens' => $topico], JSON_UNESCAPED_UNICODE));
        fclose($fp);
        echo alert(GREEN, "Postagem efetuada com <b>Sucesso!</b>");
    } catch (Exception $e) {
        echo alert(RED, "<b>Falha</b> ao tentar gravar postagem!");
    }
}

