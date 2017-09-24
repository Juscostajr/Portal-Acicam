<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 06/05/2016
 * Time: 15:53
 */
require_once "../../app/model/menu.php";
ini_set("display_errors", 0);
$menu = new Menu();
$pai = new Menu();

if(isset($_POST['data']['url'])) {
    try {
    $menu->setUrl(empty($_POST['data']['url']) ? null : $_POST['data']['url']);
    $menu->setTitulo($_POST['data']['titulo']);
    $menu->setPai(empty($_POST['data']['pai']) ? null : $_POST['data']['pai']);

    if(!is_null($menu->getPai())){
        $obj = $pai->find($_POST['data']['pai']);
        $pai->setId($obj->ID_Menu);
        $pai->setTitulo($obj->DS_Titulo);
    }

        if(isset($_POST['data']['id'])){
            $menu->setId($_POST['data']['id']);
            $menu->update($_POST['data']['id']);
        } else {
            $menu->setId($menu->insert());
        }
        $menu->setPai($pai->jsonSerialize());

        http_response_code(200);
        echo json_encode($menu->jsonSerialize());
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['falha' => $e]);
    }
}



