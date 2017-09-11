<?php
if (isset($_POST['titulo'])) {
    require_once "../app/frameworks/mensagens.php";
    $menu = array();
    foreach ($_POST['titulo'] as $key => $value) {
        $titulo = $_POST['titulo'][$key];
        $link = $_POST['link'][$key];
        $imagem = $_POST['imagem'][$key];
        array_push($menu, ['titulo' => $titulo, 'link' => $link, 'imagem' => $imagem]);
    }
    try {
        $fp = fopen('../app/data/servicosOnline.json', 'w');
        fwrite($fp, json_encode(['itens' => $menu], JSON_UNESCAPED_UNICODE));
        fclose($fp);
        echo alert(GREEN, "Postagem efetuada com <b>Sucesso!</b>");
    } catch (Exception $e) {
        http_response_code(500);
        echo alert(RED, "<b>Falha</b> ao tentar gravar postagem!");
    }
}