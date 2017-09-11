<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 06/05/2016
 * Time: 15:53
 */
require_once "../../app/model/menu.php";

$menu = new Menu();

if(isset($_POST['data']['url'])) {

    $menu->setUrl($_POST['data']['url']);
    $menu->setPai($_POST['data']['pai']);
    $menu->setTitulo($_POST['data']['titulo']);

    try {
        if(isset($_POST['data']['id'])){
            $menu->update($_POST['data']['id']);
        } else {
            $menu->insert();
        }
        http_response_code(200);
        echo json_encode($menu);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['falha' => $e]);
    }
}



