<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 07/09/2017
 * Time: 21:16
 */
require_once '../../app/model/Popup.php';
try {
    $popup = new Popup('../../app/data/popup.json');
    $popup->read();
    $popup->setActive(true);
    $popup->save();
    http_response_code(200);
    echo json_encode($popup->jsonSerialize());
} catch (Exception $e){
    http_response_code(500);
    echo json_encode(['falha' => $e]);
}