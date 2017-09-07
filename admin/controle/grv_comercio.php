<?php

/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 06/05/2016
 * Time: 15:53
 */
require_once "../../app/model/comercio.php";
require_once "../class/WideImage.php";
require_once "../../app/frameworks/mensagens.php";

$comercio = new ComercioModel();

if(isset($_POST['data']['data'])) {
    $comercio->setData($_POST['data']['data']);
    $comercio->setDescricao($_POST['data']['descricao']);
    $comercio->setInicio($_POST['data']['inicio']);
    $comercio->setTermino($_POST['data']['termino']);

    try {
        if(isset($_POST['data']['id'])){
            $comercio->update($_POST['data']['id']);
        } else {
            $comercio->insert();
        }
        http_response_code(200);
        echo json_encode($comercio);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['falha' => $e]);
    }
}



